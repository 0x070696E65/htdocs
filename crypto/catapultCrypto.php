<?php
namespace crypto;
require_once('naclCatapult.php');
use crypto\naclCatapult;

class catapultCrypto
{
    const KEY_SIZE = 32;

    function clamp($d) {
        $d[0] = $d[0] & 248;
        $d[31] = $d[31] & 127;
        $d[31] = $d[31] | 64;
        return $d;
    }

    function prepareForScalarMult($sk) {
        $chars = array_map("chr", $sk);
        $bin = join($chars);
        $hex = bin2hex($bin);
        $hash = hash('sha512', hex2bin($hex));
        
        $hashArray = array_map('hexdec', str_split($hash, 2));
        $d = array_chunk($hashArray, 32)[0];
        $a = array_fill(0, 32, 0);
        return array_merge($this->clamp($d), $a);
    }

    function deriveSharedKey($privateKey, $publicKey) {
        $sharedSecret = $this->deriveSharedSecret($privateKey, $publicKey);
        $packed = pack("c*", ...$sharedSecret);
        $info = 'catapult';
        $hash = 'sha256';
        $salt = "0000000000000000000000000000000000000000000000000000000000000000";
        return hash_hkdf($hash, $packed, 32, $info, hex2bin($salt));
    }

    function deriveSharedSecret($privateKey, $publicKey) {
        $c = new naclCatapult;
        $d = $this->prepareForScalarMult($privateKey);
        
        $q = [$c->gf(), $c->gf(), $c->gf(), $c->gf()];
        $p = [$c->gf(), $c->gf(), $c->gf(), $c->gf()];
        $sharedSecret = array();
        $q = $c->unpack($q, $publicKey);      
        $p = $c->scalarmult($p, $q, $d);
        $sharedSecret = $c->pack($sharedSecret, $p);
        return $sharedSecret;
    }

    function binToHex($sk) {
        $chars = array_map("chr", $sk);
        $bin = join($chars);
        $hex = bin2hex($bin);
        return $hex;
    }
}
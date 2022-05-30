<?php
namespace crypto;
require_once('crypto/catapultCrypto.php');
require_once('format/base32.php');
use crypto\catapultCrypto;
use crypto\Base32;
$b32 = new Base32;
$catapultCrypto = new catapultCrypto;

class snipets {
    function addressToString($decoded) {
        global $b32;
        $zero = array(0);
        $arr = array_merge($decoded, $zero);
        $packed = pack("c*", ...$arr);
        $encoded = bin2hex($packed);
        $decoded = pack('H*', $encoded);
        return substr((string)$b32->encode($decoded), 0, 39);
    }

    function publicKeyToAddress($pubKey, $network) {
        $publicKeyHash = hash('sha3-256', hex2bin($pubKey));
        $rimped160 = hash('ripemd160', hex2bin($publicKeyHash));
        $rimpedArr = array_map('hexdec', str_split($rimped160, 2));
        $network = array($network);
        $arr1 = array_merge($network, $rimpedArr);
        $hash = hash('sha3-256', pack("c*", ...$arr1));
        $arr2 = array_map('hexdec', str_split($hash, 2));
        return array_merge($arr1, array_slice($arr2, 0, 3));
    }

    function decryptMessage($privateKey, $publicKey, $encrypted){
        global $catapultCrypto;
        $cipher = "aes-256-gcm";
        $encKey = $catapultCrypto->deriveSharedKey(array_map('hexdec', str_split($privateKey, 2)), array_map('hexdec', str_split($publicKey, 2)));
        $payload = substr(hex2bin($encrypted), 16 + 12);
        $iv = substr(hex2bin($encrypted), 16, 12);
        $tag = substr(hex2bin($encrypted), 0, 16);
        return openssl_decrypt($payload, $cipher, $encKey, 1, $iv, $tag);
    }
}
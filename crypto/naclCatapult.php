<?php

namespace crypto;

class naclCatapult
{
    public function gf($init = null)
    {
        $r = array_fill(0, 16, 0);
        if ($init != null) {
            for ($i = 0; $i < count($init); $i++) {
                $r[$i] = $init[$i];
            }
        }
        return $r;
    }

    private $gf0;
    public $gf1;
    private $D;
    private $D2;
    private $X;
    private $I;

    public function __construct()
    {
        $this->gf0 = $this->gf();
        $this->gf1 = $this->gf(array(1));
        $this->D = $this->gf(array(
            0x78a3,
            0x1359,
            0x4dca,
            0x75eb,
            0xd8ab,
            0x4141,
            0x0a4d,
            0x0070,
            0xe898,
            0x7779,
            0x4079,
            0x8cc7,
            0xfe73,
            0x2b6f,
            0x6cee,
            0x5203
        ));
        $this->D2 = $this->gf(array(
            0xf159,
            0x26b2,
            0x9b94,
            0xebd6,
            0xb156,
            0x8283,
            0x149a,
            0x00e0,
            0xd130,
            0xeef3,
            0x80f2,
            0x198e,
            0xfce7,
            0x56df,
            0xd9dc,
            0x2406
        ));
        $this->X = $this->gf(array(
            0xd51a,
            0x8f25,
            0x2d60,
            0xc956,
            0xa7b2,
            0x9525,
            0xc760,
            0x692c,
            0xdc5c,
            0xfdd6,
            0xe231,
            0xc0a4,
            0x53fe,
            0xcd6e,
            0x36d3,
            0x2169
        ));
        $this->I = $this->gf(array(
            0xa0b0,
            0x4a0e,
            0x1b27,
            0xc4ee,
            0xe478,
            0xad2f,
            0x1806,
            0x2f43,
            0xd7a7,
            0x3dfb,
            0x0099,
            0x2b4d,
            0xdf0b,
            0x4fc1,
            0x2480,
            0x2b83
        ));
    }

    public function A($o, $a, $b)
    {
        for ($i = 0; $i < 16; $i++) {
            $o[$i] = $a[$i] + $b[$i];
        }
        return $o;
    }

    public function Z($o, $a, $b)
    {
        for ($i = 0; $i < 16; $i++) {
            $o[$i] = $a[$i] - $b[$i];
        }
        return $o;
    }

    function M($o, $a, $b)
    {
        $t0 = 0;
        $t1 = 0;
        $t2 = 0;
        $t3 = 0;
        $t4 = 0;
        $t5 = 0;
        $t6 = 0;
        $t7 = 0;
        $t8 = 0;
        $t9 = 0;
        $t10 = 0;
        $t11 = 0;
        $t12 = 0;
        $t13 = 0;
        $t14 = 0;
        $t15 = 0;
        $t16 = 0;
        $t17 = 0;
        $t18 = 0;
        $t19 = 0;
        $t20 = 0;
        $t21 = 0;
        $t22 = 0;
        $t23 = 0;
        $t24 = 0;
        $t25 = 0;
        $t26 = 0;
        $t27 = 0;
        $t28 = 0;
        $t29 = 0;
        $t30 = 0;

        $b0 = $b[0];
        $b1 = $b[1];
        $b2 = $b[2];
        $b3 = $b[3];
        $b4 = $b[4];
        $b5 = $b[5];
        $b6 = $b[6];
        $b7 = $b[7];
        $b8 = $b[8];
        $b9 = $b[9];
        $b10 = $b[10];
        $b11 = $b[11];
        $b12 = $b[12];
        $b13 = $b[13];
        $b14 = $b[14];
        $b15 = $b[15];

        $v = $a[0];
        $t0 += $v * $b0;
        $t1 += $v * $b1;
        $t2 += $v * $b2;
        $t3 += $v * $b3;
        $t4 += $v * $b4;
        $t5 += $v * $b5;
        $t6 += $v * $b6;
        $t7 += $v * $b7;
        $t8 += $v * $b8;
        $t9 += $v * $b9;
        $t10 += $v * $b10;
        $t11 += $v * $b11;
        $t12 += $v * $b12;
        $t13 += $v * $b13;
        $t14 += $v * $b14;
        $t15 += $v * $b15;
        $v = $a[1];
        $t1 += $v * $b0;
        $t2 += $v * $b1;
        $t3 += $v * $b2;
        $t4 += $v * $b3;
        $t5 += $v * $b4;
        $t6 += $v * $b5;
        $t7 += $v * $b6;
        $t8 += $v * $b7;
        $t9 += $v * $b8;
        $t10 += $v * $b9;
        $t11 += $v * $b10;
        $t12 += $v * $b11;
        $t13 += $v * $b12;
        $t14 += $v * $b13;
        $t15 += $v * $b14;
        $t16 += $v * $b15;
        $v = $a[2];
        $t2 += $v * $b0;
        $t3 += $v * $b1;
        $t4 += $v * $b2;
        $t5 += $v * $b3;
        $t6 += $v * $b4;
        $t7 += $v * $b5;
        $t8 += $v * $b6;
        $t9 += $v * $b7;
        $t10 += $v * $b8;
        $t11 += $v * $b9;
        $t12 += $v * $b10;
        $t13 += $v * $b11;
        $t14 += $v * $b12;
        $t15 += $v * $b13;
        $t16 += $v * $b14;
        $t17 += $v * $b15;
        $v = $a[3];
        $t3 += $v * $b0;
        $t4 += $v * $b1;
        $t5 += $v * $b2;
        $t6 += $v * $b3;
        $t7 += $v * $b4;
        $t8 += $v * $b5;
        $t9 += $v * $b6;
        $t10 += $v * $b7;
        $t11 += $v * $b8;
        $t12 += $v * $b9;
        $t13 += $v * $b10;
        $t14 += $v * $b11;
        $t15 += $v * $b12;
        $t16 += $v * $b13;
        $t17 += $v * $b14;
        $t18 += $v * $b15;
        $v = $a[4];
        $t4 += $v * $b0;
        $t5 += $v * $b1;
        $t6 += $v * $b2;
        $t7 += $v * $b3;
        $t8 += $v * $b4;
        $t9 += $v * $b5;
        $t10 += $v * $b6;
        $t11 += $v * $b7;
        $t12 += $v * $b8;
        $t13 += $v * $b9;
        $t14 += $v * $b10;
        $t15 += $v * $b11;
        $t16 += $v * $b12;
        $t17 += $v * $b13;
        $t18 += $v * $b14;
        $t19 += $v * $b15;
        $v = $a[5];
        $t5 += $v * $b0;
        $t6 += $v * $b1;
        $t7 += $v * $b2;
        $t8 += $v * $b3;
        $t9 += $v * $b4;
        $t10 += $v * $b5;
        $t11 += $v * $b6;
        $t12 += $v * $b7;
        $t13 += $v * $b8;
        $t14 += $v * $b9;
        $t15 += $v * $b10;
        $t16 += $v * $b11;
        $t17 += $v * $b12;
        $t18 += $v * $b13;
        $t19 += $v * $b14;
        $t20 += $v * $b15;
        $v = $a[6];
        $t6 += $v * $b0;
        $t7 += $v * $b1;
        $t8 += $v * $b2;
        $t9 += $v * $b3;
        $t10 += $v * $b4;
        $t11 += $v * $b5;
        $t12 += $v * $b6;
        $t13 += $v * $b7;
        $t14 += $v * $b8;
        $t15 += $v * $b9;
        $t16 += $v * $b10;
        $t17 += $v * $b11;
        $t18 += $v * $b12;
        $t19 += $v * $b13;
        $t20 += $v * $b14;
        $t21 += $v * $b15;
        $v = $a[7];
        $t7 += $v * $b0;
        $t8 += $v * $b1;
        $t9 += $v * $b2;
        $t10 += $v * $b3;
        $t11 += $v * $b4;
        $t12 += $v * $b5;
        $t13 += $v * $b6;
        $t14 += $v * $b7;
        $t15 += $v * $b8;
        $t16 += $v * $b9;
        $t17 += $v * $b10;
        $t18 += $v * $b11;
        $t19 += $v * $b12;
        $t20 += $v * $b13;
        $t21 += $v * $b14;
        $t22 += $v * $b15;
        $v = $a[8];
        $t8 += $v * $b0;
        $t9 += $v * $b1;
        $t10 += $v * $b2;
        $t11 += $v * $b3;
        $t12 += $v * $b4;
        $t13 += $v * $b5;
        $t14 += $v * $b6;
        $t15 += $v * $b7;
        $t16 += $v * $b8;
        $t17 += $v * $b9;
        $t18 += $v * $b10;
        $t19 += $v * $b11;
        $t20 += $v * $b12;
        $t21 += $v * $b13;
        $t22 += $v * $b14;
        $t23 += $v * $b15;
        $v = $a[9];
        $t9 += $v * $b0;
        $t10 += $v * $b1;
        $t11 += $v * $b2;
        $t12 += $v * $b3;
        $t13 += $v * $b4;
        $t14 += $v * $b5;
        $t15 += $v * $b6;
        $t16 += $v * $b7;
        $t17 += $v * $b8;
        $t18 += $v * $b9;
        $t19 += $v * $b10;
        $t20 += $v * $b11;
        $t21 += $v * $b12;
        $t22 += $v * $b13;
        $t23 += $v * $b14;
        $t24 += $v * $b15;
        $v = $a[10];
        $t10 += $v * $b0;
        $t11 += $v * $b1;
        $t12 += $v * $b2;
        $t13 += $v * $b3;
        $t14 += $v * $b4;
        $t15 += $v * $b5;
        $t16 += $v * $b6;
        $t17 += $v * $b7;
        $t18 += $v * $b8;
        $t19 += $v * $b9;
        $t20 += $v * $b10;
        $t21 += $v * $b11;
        $t22 += $v * $b12;
        $t23 += $v * $b13;
        $t24 += $v * $b14;
        $t25 += $v * $b15;
        $v = $a[11];
        $t11 += $v * $b0;
        $t12 += $v * $b1;
        $t13 += $v * $b2;
        $t14 += $v * $b3;
        $t15 += $v * $b4;
        $t16 += $v * $b5;
        $t17 += $v * $b6;
        $t18 += $v * $b7;
        $t19 += $v * $b8;
        $t20 += $v * $b9;
        $t21 += $v * $b10;
        $t22 += $v * $b11;
        $t23 += $v * $b12;
        $t24 += $v * $b13;
        $t25 += $v * $b14;
        $t26 += $v * $b15;
        $v = $a[12];
        $t12 += $v * $b0;
        $t13 += $v * $b1;
        $t14 += $v * $b2;
        $t15 += $v * $b3;
        $t16 += $v * $b4;
        $t17 += $v * $b5;
        $t18 += $v * $b6;
        $t19 += $v * $b7;
        $t20 += $v * $b8;
        $t21 += $v * $b9;
        $t22 += $v * $b10;
        $t23 += $v * $b11;
        $t24 += $v * $b12;
        $t25 += $v * $b13;
        $t26 += $v * $b14;
        $t27 += $v * $b15;
        $v = $a[13];
        $t13 += $v * $b0;
        $t14 += $v * $b1;
        $t15 += $v * $b2;
        $t16 += $v * $b3;
        $t17 += $v * $b4;
        $t18 += $v * $b5;
        $t19 += $v * $b6;
        $t20 += $v * $b7;
        $t21 += $v * $b8;
        $t22 += $v * $b9;
        $t23 += $v * $b10;
        $t24 += $v * $b11;
        $t25 += $v * $b12;
        $t26 += $v * $b13;
        $t27 += $v * $b14;
        $t28 += $v * $b15;
        $v = $a[14];
        $t14 += $v * $b0;
        $t15 += $v * $b1;
        $t16 += $v * $b2;
        $t17 += $v * $b3;
        $t18 += $v * $b4;
        $t19 += $v * $b5;
        $t20 += $v * $b6;
        $t21 += $v * $b7;
        $t22 += $v * $b8;
        $t23 += $v * $b9;
        $t24 += $v * $b10;
        $t25 += $v * $b11;
        $t26 += $v * $b12;
        $t27 += $v * $b13;
        $t28 += $v * $b14;
        $t29 += $v * $b15;
        $v = $a[15];
        $t15 += $v * $b0;
        $t16 += $v * $b1;
        $t17 += $v * $b2;
        $t18 += $v * $b3;
        $t19 += $v * $b4;
        $t20 += $v * $b5;
        $t21 += $v * $b6;
        $t22 += $v * $b7;
        $t23 += $v * $b8;
        $t24 += $v * $b9;
        $t25 += $v * $b10;
        $t26 += $v * $b11;
        $t27 += $v * $b12;
        $t28 += $v * $b13;
        $t29 += $v * $b14;
        $t30 += $v * $b15;

        $t0 += 38 * $t16;
        $t1 += 38 * $t17;
        $t2 += 38 * $t18;
        $t3 += 38 * $t19;
        $t4 += 38 * $t20;
        $t5 += 38 * $t21;
        $t6 += 38 * $t22;
        $t7 += 38 * $t23;
        $t8 += 38 * $t24;
        $t9 += 38 * $t25;
        $t10 += 38 * $t26;
        $t11 += 38 * $t27;
        $t12 += 38 * $t28;
        $t13 += 38 * $t29;
        $t14 += 38 * $t30;

        $c = 1;
        $v = $t0 + $c + 65535;
        $c = floor($v / 65536);

        $t0 = $v - $c * 65536;
        $v = $t1 + $c + 65535;
        $c = floor($v / 65536);
        $t1 = $v - $c * 65536;
        $v = $t2 + $c + 65535;
        $c = floor($v / 65536);
        $t2 = $v - $c * 65536;
        $v = $t3 + $c + 65535;
        $c = floor($v / 65536);
        $t3 = $v - $c * 65536;
        $v = $t4 + $c + 65535;
        $c = floor($v / 65536);
        $t4 = $v - $c * 65536;
        $v = $t5 + $c + 65535;
        $c = floor($v / 65536);
        $t5 = $v - $c * 65536;
        $v = $t6 + $c + 65535;
        $c = floor($v / 65536);
        $t6 = $v - $c * 65536;
        $v = $t7 + $c + 65535;
        $c = floor($v / 65536);
        $t7 = $v - $c * 65536;
        $v = $t8 + $c + 65535;
        $c = floor($v / 65536);
        $t8 = $v - $c * 65536;
        $v = $t9 + $c + 65535;
        $c = floor($v / 65536);
        $t9 = $v - $c * 65536;
        $v = $t10 + $c + 65535;
        $c = floor($v / 65536);
        $t10 = $v - $c * 65536;
        $v = $t11 + $c + 65535;
        $c = floor($v / 65536);
        $t11 = $v - $c * 65536;
        $v = $t12 + $c + 65535;
        $c = floor($v / 65536);
        $t12 = $v - $c * 65536;
        $v = $t13 + $c + 65535;
        $c = floor($v / 65536);
        $t13 = $v - $c * 65536;
        $v = $t14 + $c + 65535;
        $c = floor($v / 65536);
        $t14 = $v - $c * 65536;
        $v = $t15 + $c + 65535;
        $c = floor($v / 65536);
        $t15 = $v - $c * 65536;
        $t0 += $c - 1 + 37 * ($c - 1);

        // se$cond $car
        $c = 1;
        $v = $t0 + $c + 65535;
        $c = floor($v / 65536);
        $t0 = $v - $c * 65536;
        $v = $t1 + $c + 65535;
        $c = floor($v / 65536);
        $t1 = $v - $c * 65536;
        $v = $t2 + $c + 65535;
        $c = floor($v / 65536);
        $t2 = $v - $c * 65536;
        $v = $t3 + $c + 65535;
        $c = floor($v / 65536);
        $t3 = $v - $c * 65536;
        $v = $t4 + $c + 65535;
        $c = floor($v / 65536);
        $t4 = $v - $c * 65536;
        $v = $t5 + $c + 65535;
        $c = floor($v / 65536);
        $t5 = $v - $c * 65536;
        $v = $t6 + $c + 65535;
        $c = floor($v / 65536);
        $t6 = $v - $c * 65536;
        $v = $t7 + $c + 65535;
        $c = floor($v / 65536);
        $t7 = $v - $c * 65536;
        $v = $t8 + $c + 65535;
        $c = floor($v / 65536);
        $t8 = $v - $c * 65536;
        $v = $t9 + $c + 65535;
        $c = floor($v / 65536);
        $t9 = $v - $c * 65536;
        $v = $t10 + $c + 65535;
        $c = floor($v / 65536);
        $t10 = $v - $c * 65536;
        $v = $t11 + $c + 65535;
        $c = floor($v / 65536);
        $t11 = $v - $c * 65536;
        $v = $t12 + $c + 65535;
        $c = floor($v / 65536);
        $t12 = $v - $c * 65536;
        $v = $t13 + $c + 65535;
        $c = floor($v / 65536);
        $t13 = $v - $c * 65536;
        $v = $t14 + $c + 65535;
        $c = floor($v / 65536);
        $t14 = $v - $c * 65536;
        $v = $t15 + $c + 65535;
        $c = floor($v / 65536);
        $t15 = $v - $c * 65536;
        $t0 += $c - 1 + 37 * ($c - 1);

        $o[0] = $t0;
        $o[1] = $t1;
        $o[2] = $t2;
        $o[3] = $t3;
        $o[4] = $t4;
        $o[5] = $t5;
        $o[6] = $t6;
        $o[7] = $t7;
        $o[8] = $t8;
        $o[9] = $t9;
        $o[10] = $t10;
        $o[11] = $t11;
        $o[12] = $t12;
        $o[13] = $t13;
        $o[14] = $t14;
        $o[15] = $t15;
        return $o;
    }

    function S($o, $a)
    {
        $o = $this->M($o, $a, $a);
        return $o;
    }

    function Vn($x, $xi, $y, $yi, $n)
    {
        $d = 0;
        for ($i = 0; $i < $n; $i++) {
            $d = $d | $x[$xi + $i] ^ $y[$yi + $i];
        }
        return (1 & (($d - 1) >> 8)) - 1;
    }

    function Pow2523($o, $i)
    {
        $c = $this->gf();
        for ($a = 0; $a < 16; $a++) {
            $c[$a] = $i[$a];
        }
        for ($a = 250; $a >= 0; $a--) {
            $c = $this->S($c, $c);
            if ($a != 1) {
                $c = $this->M($c, $c, $i);
            }
        }
        for ($a = 0; $a < 16; $a++) {
            $o[$a] = $c[$a];
        }
        return $o;
    }

    function Inv25519($o, $i)
    {
        $c = $this->gf();
        for ($a = 0; $a < 16; $a++) {
            $c[$a] = $i[$a];
        }
        for ($a = 253; $a >= 0; $a--) {
            $c = $this->S($c, $c);
            if ($a != 2 && $a != 4) {
                $c = $this->M($c, $c, $i);
            }
        }
        for ($a = 0; $a < 16; $a++) {
            $o[$a] = $c[$a];
        }
        return $o;
    }

    function Set25519($r, $a)
    {
        for ($i = 0; $i < 16; $i++) {
            $r[$i] = $a[$i] | 0;
        }
        return $r;
    }

    function Car25519($o)
    {
        $c = 1;
        for ($i = 0; $i < 16; $i++) {
            $v = $o[$i] + $c + 65535;
            $c = floor($v / 65536);
            $o[$i] = $v - $c * 65536;
        }
        $o[0] += $c - 1 + 37 * ($c - 1);
        return $o;
    }

    function Sel25519($p, $q, $b, $z)
    {
        $c = ~($b - 1);
        for ($i = 0; $i < 16; $i++) {
            $t = $c & ($p[$i] ^ $q[$i]);
            $p[$i] = $p[$i] ^ $t;
            $q[$i] = $q[$i] ^ $t;
        }
        //if($z == 254)print_r($p);
        return [$p, $q];
    }

    function Pack25519($o, $n)
    {
        $m = $this->gf();
        $t = $this->gf();
        for ($i = 0; $i < 16; $i++) {
            $t[$i] = $n[$i];
        }
        $t = $this->Car25519($t);
        $t = $this->Car25519($t);
        $t = $this->Car25519($t);
        for ($j = 0; $j < 2; $j++) {
            $m[0] = $t[0] - 0xffed;
            for ($i = 1; $i < 15; $i++) {
                $m[$i] = $t[$i] - 0xffff - (($m[$i - 1] >> 16) & 1);
                $m[$i - 1] = $m[$i - 1] & 0xffff;
            }
            $m[15] = $t[15] - 0x7fff - (($m[14] >> 16) & 1);
            $b = ($m[15] >> 16) & 1;
            $m[14] = $m[14] & 0xffff;
            [$t, $m] = $this->Sel25519($t, $m, 1 - $b, $j);
        }
        for ($i = 0; $i < 16; $i++) {
            $o[2 * $i] = $t[$i] & 0xff;
            $o[2 * $i + 1] = $t[$i] >> 8;
        }
        return $o;
    }

    function Cswap($p, $q, $b, $z)
    {
        for ($i = 0; $i < 4; $i++) {
           [$p[$i], $q[$i]] = $this->Sel25519($p[$i], $q[$i], $b, $z);
        }
        return [$p, $q];
    }

    function Neq25519($a, $b)
    {
        $c = array();
        $d = array();
        $c = $this->Pack25519($c, $a);
        $d = $this->Pack25519($d, $b);
        return $this->CryptoVerify32($c, 0, $d, 0);
    }

    function CryptoVerify32($x, $xi, $y, $yi)
    {
        return $this->Vn($x, $xi, $y, $yi, 32);
    }

    function Par25519($a)
    {
        $d = array();
        $d = $this->Pack25519($d, $a);
        return $d[0] & 1;
    }

    function Unpack25519($o, $n)
    {
        for ($i = 0; $i < 16; $i++) {
            $o[$i] = $n[2 * $i] + ($n[2 * $i + 1] << 8);
        }
        $o[15] = $o[15] & 0x7fff;
        return $o;
    }

    function Add($p, $q)
    {
        $a = $this->gf();
        $b = $this->gf();
        $c = $this->gf();
        $d = $this->gf();
        $e = $this->gf();
        $f = $this->gf();
        $g = $this->gf();
        $h = $this->gf();
        $t = $this->gf();

        $a = $this->Z($a, $p[1], $p[0]);
        $t = $this->Z($t, $q[1], $q[0]);
        $a = $this->M($a, $a, $t);
        $b = $this->A($b, $p[0], $p[1]);
        $t = $this->A($t, $q[0], $q[1]);
        $b = $this->M($b, $b, $t);
        $c = $this->M($c, $p[3], $q[3]);
        $c = $this->M($c, $c, $this->D2);
        $d = $this->M($d, $p[2], $q[2]);
        $d = $this->A($d, $d, $d);
        $e = $this->Z($e, $b, $a);
        $f = $this->Z($f, $d, $c);
        $g = $this->A($g, $d, $c);
        $h = $this->A($h, $b, $a);

        $p[0] = $this->M($p[0], $e, $f);
        $p[1] = $this->M($p[1], $h, $g);
        $p[2] = $this->M($p[2], $g, $f);
        $p[3] = $this->M($p[3], $e, $h);
        return $p;
    }

    function Pack($r, $p)
    {
        $tx = $this->gf();
        $ty = $this->gf();
        $zi = $this->gf();
        $zi = $this->Inv25519($zi, $p[2]);
        $tx = $this->M($tx, $p[0], $zi);
        $ty = $this->M($ty, $p[1], $zi);
        $r = $this->Pack25519($r, $ty);
        $r[31] = $r[31] ^ $this->Par25519($tx) << 7;
        return $r;
    }

    function Scalarmult($p, $q, $s)
    {
        $p[0] = $this->Set25519($p[0], $this->gf0);
        $p[1] = $this->Set25519($p[1], $this->gf1);
        $p[2] = $this->Set25519($p[2], $this->gf1);
        $p[3] = $this->Set25519($p[3], $this->gf0);
        
        for ($i = 255; $i >= 0; --$i) {
            $b = ($s[($i / 8) | 0] >> ($i & 7)) & 1;
            [$p, $q] = $this->Cswap($p, $q, $b, $i);
            $q = $this->Add($q, $p);
            $p = $this->Add($p, $p);
            [$p, $q] = $this->Cswap($p, $q, $b, $i);
        }
        return $p;
    }

    function unpack($r, $p)
    {
        $t = $this->gf();
        $chk = $this->gf();
        $num = $this->gf();
        $den = $this->gf();
        $den2 = $this->gf();
        $den4 = $this->gf();
        $den6 = $this->gf();

        $r[2] = $this->set25519($r[2], $this->gf1);        
        $r[1] = $this->unpack25519($r[1], $p);

        // num = u = y^2 - 1
        // den = v = d * y^2 + 1
        $num = $this->S($num, $r[1]);

        $den = $this->M($den, $num, $this->D);
        $num = $this->Z($num, $num, $r[2]);
        $den = $this->A($den, $r[2], $den);

        // r[0] = x = sqrt(u / v)
        $den2 = $this->S($den2, $den);
        $den4 = $this->S($den4, $den2);
        $den6 = $this->M($den6, $den4, $den2);
        $t = $this->M($t, $den6, $num);
        $t = $this->M($t, $t, $den);

        $t = $this->Pow2523($t, $t);
        $t = $this->M($t, $t, $num);
        $t = $this->M($t, $t, $den);
        $t = $this->M($t, $t, $den);

        $r[0] = $this->M($r[0], $t, $den);

        $chk = $this->S($chk, $r[0]);
        $chk = $this->M($chk, $chk, $den);
        if ($this->Neq25519($chk, $num) != 0) {
            $r[0] = $this->M($r[0], $r[0], $this->I);
        }

        $chk = $this->S($chk, $r[0]);
        $chk = $this->M($chk, $chk, $den);
        /*if ($this->Neq25519($chk, $num) != 0) {
            return -1;
        }*/

        if ($this->Par25519($r[0]) != $p[31] >> 7) {
            $r[0] = $this->Z($r[0], $this->gf0, $r[0]);
        }

        $r[3] = $this->M($r[3], $r[0], $r[1]);
        return $r;
    }
}

<?php
require_once('snipets.php');
use crypto\snipets;

$snipets = new snipets;

$pubKey = "43CC385CF37318D022336624C8A56CBEB60360712D70163B554BA23EABF2D10E";
$address = $snipets->addressToString($snipets->publicKeyToAddress($pubKey, 152));
echo($address);
echo PHP_EOL;

$privatekey = "5E73378E058339952B13D65297C294884C03C83DECDAB2B9B3E33AFC8F89AA22";
$encrypted = "1D14FBC75D99B2F1F5CA5AFD04B420898375A781E8E2435C5AFE4EAFE3FED855";
$payload = $snipets->decryptMessage($privatekey, $pubKey, $encrypted);
echo($payload);

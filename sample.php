<?php
require_once('snipets.php');
use crypto\snipets;

$snipets = new snipets;

$pubKey = "PUBLIC_KEY";
$address = $snipets->addressToString($snipets->publicKeyToAddress($pubKey, 152));
echo($address);
echo PHP_EOL;

$privatekey = "PRIVATE_KEY";
$encrypted = "SSSなどで発行された暗号化済ペイロード";
$payload = $snipets->decryptMessage($privatekey, $pubKey, $encrypted);
echo($payload);

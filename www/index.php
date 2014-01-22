<?php
$string = 'Some Secret thing I want to encrypt';
$iv = '12345678';
$passphrase = '8chrsLng';

$encryptedString = encryptString($string, $passphrase, $iv);
// Expect: 7DjnpOXG+FrUaOuc8x6vyrkk3atSiAf425ly5KpG7lOYgwouw2UATw==


function encryptString($unencryptedText, $passphrase, $iv) {
    $enc = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $passphrase, $unencryptedText, MCRYPT_MODE_CBC, $iv);
    return base64_encode($enc);
}

<?php 

$str = "/6G6F;WvK7;s{au/6G6F;WvK7;s{au";
    $key = md5($str);

function encryptData($data, $key, $str){
    $encryption_key = base64_decode($key);
    $ivlength = substr(md5($str."admin_registration"),1, 16);
    $encryptedData = openssl_encrypt($data, "aes-256-cbc", $encryption_key, 0, $ivlength);

    return base64_encode($encryptedData.'::'.$ivlength);
}

echo encryptData("Arjun", $key, $str) ;
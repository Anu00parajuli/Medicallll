<?php

/*

    * For basic protection
    *@param [data from the form]
    *@return [protected data]

*/
function protect($data){
  return trim(strip_tags(addslashes($data)));
}

/*

    * For encrypting the sensitive datas
    *@param [to be encrypted data, key, and a string as sort of salt]
    *@return [encrypted data]

*/
function encryptData($data, $key, $str){
  $encryption_key = base64_decode($key);
  $ivlength = substr(md5($str."users"),1, 16);
  $encryptedData = openssl_encrypt($data, "aes-256-cbc", $encryption_key, 0, $ivlength);

  return base64_encode($encryptedData.'::'.$ivlength);
}

/*

    * For decrypting the encryted data
    *@param [encrypted data to be decrypted, key]
    *@return [decrypted data]

*/
function decryptData($data, $key){
    $encryption_key = base64_decode($key);
    list($encrypted_data, $iv) = array_pad(explode('::', base64_decode($data), 2),2,null);
    $decryptedData = openssl_decrypt($encrypted_data, "aes-256-cbc", $encryption_key, 0, $iv);

    return $decryptedData;
}

?>
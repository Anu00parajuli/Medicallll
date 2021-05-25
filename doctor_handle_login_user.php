<?php
include('./tables_columns_name.php');
require "./connection.php";
// include("./encryption.php");


function protect($data){
    return trim(strip_tags(addslashes($data)));
}

function encryptData($data, $key, $str){
    $encryption_key = base64_decode($key);
    $ivlength = substr(md5($str."doctor_registration"),1, 16);
    $encryptedData = openssl_encrypt($data, "aes-256-cbc", $encryption_key, 0, $ivlength);

    return base64_encode($encryptedData.'::'.$ivlength);
}

if(isset($_POST['login'])){
    require "./connection.php";

    $user = protect($_POST['nmc_no']);
    $Password = protect($_POST['password']);

    $str = "/6G6F;WvK7;s{au/6G6F;WvK7;s{au";
    $key = md5($str);

    $username_sql = "SELECT $password_column, $emailVerification_column , $email_verified_column  FROM doctor_registration WHERE $nmc_no_column = '$user';";
    $result = mysqli_query($con, $username_sql);
    
    if(mysqli_num_rows($result) > 0){
        // $row = mysqli_fetch_assoc($result);
        $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
        var_dump($row); 
        die();
        foreach($row as $data){
            // checking if the email is verified or not
            if($data[$email_verified_column] == "not verified"){
                header("location: ./doctor_login.php?error=EmailNotVerified#loginForm");
                die();
            }

            if(password_verify($Password,$data[$password_column])){
                session_start();
                $_SESSION['nmc_no'] = $data['nmc_no'];
                header("location: ./doctor_homepage.php?Logged");
                die();
            }else{
                // echo("hi");
                header("location: ./doctor_homepage.php?inputError=WrongPass#loginForm");
            }
        }
    }else{
        $user = encryptData($user, $key, $str);    
        $email_sql = "SELECT $password_column, $emailVerification_column FROM doctor_registration WHERE $emailVerification_column = '$user';";
        $result = mysqli_query($con, $email_sql);
        
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);

            // checking if the email is verified or not
            if($row[$emailVerification_column] == "not verified"){
                header("location: ./doctor_login.php?error=EmailNotVerified#loginForm");
                die();
            }

            session_start();
            $_SESSION['nmc_no'] = $row['nmc_no'];

            if(password_verify($Password,$row[$password_column])){
                header("location: ./doctor_homepage.php?Logged");
                die();
            }else{
                //echo("hi");
                header("location: ./doctor_login.php?inputError=WrongNmcNumberORPass#loginForm");
            }
        }else{
            // echo("hi");
            //  die();
            header("location: ./doctor_login.php?inputError=WrongNmcNumberOrUser#loginForm");
        }
    }

}else{
   // echo("hi") ;
    header("location:./doctor_login.php?error=IllegalWay");
}

?>
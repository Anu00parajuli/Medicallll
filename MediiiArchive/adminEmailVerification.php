<?php
session_start() ;
include('./tables_columns_name.php ');
require "./connection.php ";

$str = "/6G6F;WvK7;s{au/6G6F;WvK7;s{au";
    $key = md5($str);

// function encryptData($data, $key, $str){
//    $encryption_key = base64_decode($key);
//     $ivlength = substr(md5($str."admin_registration"),1, 16);
//     $encryptedData = openssl_encrypt($data, "aes-256-cbc", $encryption_key, 0, $ivlength);

//     return base64_encode($encryptedData.'::'.$ivlength);
// }
// var_dump($_SESSION['formdata']) ;


// print_r($_SESSION['formdata']) ;
// print_r($_SESSION['formdata']) ;

// die() ;
function protect($data){
    return trim(strip_tags(addslashes($data)));
}

function encryptData($data, $key, $str){
    $encryption_key = base64_decode($key);
    $ivlength = substr(md5($str."admin_registration"),1, 16);
    $encryptedData = openssl_encrypt($data, "aes-256-cbc", $encryption_key, 0, $ivlength);

    return base64_encode($encryptedData.'::'.$ivlength);
}

$registration_no = $_SESSION['formdata']['registration_no'];
$first_name = $_SESSION['formdata']['first_name'];
$last_name = $_SESSION['formdata']['last_name'];
$email = $_SESSION['formdata']['email'];
$password = $_SESSION['formdata']['password'];
$confirm_password = $_SESSION['formdata']['confirm_password'];
$address = $_SESSION['formdata']['address'];
$contact_number = $_SESSION['formdata']['contact_number'];
$encrypted_email = encryptData( $_SESSION['formdata']['email'], $key, $str);
// $encrypted_email = $_SESSION['formdata']['email'];


$sql = "SELECT $activation_code_column FROM admin_registration WHERE email = '$encrypted_email'";
// echo $sql ;
// die();
$query = mysqli_query($con, $sql);
//var_dump(mysqli_query($con, $sql)) ;
$row = mysqli_fetch_assoc($query);
// var_dump($row) ;
$activeCode = $row[$activation_code_column];
var_dump(mysqli_num_rows($query)) ;
// 
// die() ;
if(mysqli_num_rows($query)){
    echo "Sending mail from here" ;
    require './PHPMailer/PHPMailerAutoload.php';
    
    $url = "http://".$_SERVER['HTTP_HOST']."/MedicalArchive/MediiiArchive/adminVerifyUser.php?activation_code=$activeCode";
    // echo($url);
    // die();

    $adminEmail = 'medicalarchive2021@gmail.com';

    $mssg = "
    <h2>Hi, $first_name </h2>
    <p>Thank you for registeration</p>
    <p>
        Click $url link to verify and log in into your account.
        
    </p>
    ";

    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = $adminEmail;
    $mail->Password = 'Medical2021Archive';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;

    include("./PHPMailer_fix.php");

    $mail->setFrom($adminEmail, 'Medical Archive');

    $mail->addAddress($email, $first_name);

    $mail->Subject = 'Email Verification';

    $mail->isHTML(true);

    $mail->SMTPDebug = 2;

    $mail->Body = $mssg;

    if($mail->send()){
        // print_r($mail->ErrorInfo);
        // die();
        header("location: ./admin_signup.php?mssg=CheckEmail");
    }else{
        header("location: ./admin_signup.php?error=SendMailError&infoBack=full&registration_noB=$registration_no&first_nameB=$first_name&last_nameB=$last_name&contact_numberB=$contact_number&emailB=$email&addressB=$address");
    }
}else{
    //  echo "hi";
     header("location: ./admin_signup.php?error=NotUser");
}

?>
<?php
include('./tables_columns_name.php');
require "./connection.php";

$registration_no = $_GET['registration_no'];
$first_name = $_GET['first_name'];
$last_name = $_GET['last_name'];
$email = $_GET['email'];
$password = $_GET['password'];
$confirm_password = $_GET['confirm_password'];
$address = $_GET['address'];
$contact_number = $_GET['contact_number'];


$encrypted_email = $_GET['email'];

$sql = "SELECT $activation_code_column FROM admin_registration WHERE $email = '$encrypted_email'";
$query = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($query);
$activeCode = $row[$activation_code_column];

if(mysqli_num_rows($query)){
    require '../PHPMailer/PHPMailerAutoload.php';

    $url = "http://localhost/MedicalArchive/adminVerifyUser.php?activation_code=$activeCode";

    $adminEmail = 'medicalarchive2021@gmail.com';

    $mssg = "
    <h2>Hi, $first_name </h2>
    <p>Thank you for registeration</p>
    <p>
        Click this link to verify and log in into your account
        $url
    </p>
    ";
    //creating a PHPMailer instance
    $mail = new PHPMailer(true);

    //configuring the PHPMailer to SMTP for gmail
    $mail->isSMTP();
    $mail->Host = "smtp.gmail.com";
    $mail->SMTPAuth = true;
    $mail->Username = $adminEmail;
    $mail->Password = 'Medical2021Archive';
    $mail->SMTPSecure = 'tls';
    $mail->Port = 587;
     
    include("./PHPMailer_fix.php");

    //setting the email address and name of sender
    $mail->setFrom($adminEmail, 'Medical Archive');

    //setting email address and name of receiver
    $mail->addAddress($email, $first_name);

    //setting subject of the email
    $mail->Subject = 'Email Verification';

    //defining the body message contains HTML
    $mail->isHTML(true);
    
    //for debugging
    $mail->SMTPDebug = 2;

    //setting the body of the email
    $mail->Body = $mssg;

    //sending the email and checking error
    if($mail->send()){
        // print_r($mail->ErrorInfo);
        // die();
        header("location: ./admin_verification_link.php?mssg=CheckEmail");
    }else{
        header("location: ./admin_signup.php?error=SendMailError&infoBack=full&registration_noB=$registration_no&first_nameB=$first_name&last_nameB=$last_name&contact_numberB=$contact_number&emailB=$email&addressB=$address");
    }
}else{
    header("location: ./admin_signup.php");
}

?>
<?php
session_start() ;
include ('./tables_columns_name.php');
require ('./connection.php');
function protect($data){
    return trim(strip_tags(addslashes($data)));
}

function encryptData($data, $key, $str){
    $encryption_key = base64_decode($key);
    $ivlength = substr(md5($str."doctor_registration"),1, 16);
    $encryptedData = openssl_encrypt($data, "aes-256-cbc", $encryption_key, 0, $ivlength);

    return base64_encode($encryptedData.'::'.$ivlength);
}

if(isset($_POST['signup'])){

    $_SESSION['formdata'] = $_POST ;

    // data from the signup form
    $nmc_no =$_POST['nmc_no'];
    $first_name = protect($_POST['first_name']);
    $last_name = protect($_POST['last_name']);
    $email = protect($_POST['email']);
    $password =  protect($_POST['password']);
    $confirmpassword =  protect($_POST['confirm_password']);
    $address = protect($_POST['address']);
    $contact_number = protect($_POST['contact_number']);
    // $email_verified = protect($_POST['email_verified']);
    $activation_code = md5(rand());
  
    // checking if the password's match or not 
    if($password == $confirmpassword){
        require "./connection.php";

        $str = "/6G6F;WvK7;s{au/6G6F;WvK7;s{au";
        $key = md5($str);
        $EncryptedNmc_no = encryptData($nmc_no, $key, $str);
        $EncryptedEmail = encryptData($email, $key, $str);
        $EncryptedPhonenumber = encryptData($contact_number, $key, $str);

        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $sql_nmc_no_check = "SELECT * FROM doctor_registration WHERE $nmc_no_column = '$EncryptedNmc_no';";
        $sql_email_check = "SELECT * FROM doctor_registration WHERE $email_column = '$EncryptedEmail';";
        $sql_phn_check = "SELECT * FROM doctor_registration WHERE $contact_number_column = '$EncryptedPhonenumber';";
            $query_nmc_no_check = mysqli_query($con, $sql_nmc_no_check);
            $query_email_check = mysqli_query($con, $sql_email_check);
            $query_phn_check = mysqli_query($con, $sql_phn_check);
            // checking if the email is already used
            
            if(mysqli_num_rows($query_email_check) > 0 ){
                header("location: ./doctor_signup.php?inputError=AlreadyUserEmail&infoBack=noEmail&first_nameB=$first_name&contact_numberB=$contact_number&addressB=$address");
            }
            // checking if the phone number already exits
            else if(mysqli_num_rows($query_phn_check) > 0){
                header("location: ./doctor_signup.php?inputError=AlreadyUserContactNumber&infoBack=noEmail&first_nameB=$first_name&contact_numberB=$contact_number&addressB=$address");
            }
            else if(mysqli_num_rows($query_nmc_no_check) > 0){
                header("location: ./doctor_signup.php?inputError=AlreadyUserNmcNumber&infoBack=noEmail&first_nameB=$first_name&contact_numberB=$contact_number&addressB=$address");
            }


            else{
            
                $sql = 
                    "INSERT INTO doctor_registration($nmc_no_column,$first_name_column,$last_name_column, email, $password_column, $activation_code_column, $email_verified_column, $contact_number_column, $address_column) VALUES('$nmc_no','$first_name','$last_name', '$EncryptedEmail', '$hashedPassword', '$activation_code', 'not verified', '$EncryptedPhonenumber','$address')";
                        // echo $sql ;
                        // die();
                mysqli_query($con, $sql);
                if(mysqli_affected_rows($con)){
                    // $registration_no = "SELECT registration_no FROM admin_registration WHERE $email_column = '$EncryptedEmail'";
                    // $execute = mysqli_query($con, $registration_no);
                    // $row = mysqli_fetch_assoc($execute);
                    // $registration_no = $row['registration_no'];
                       if(mysqli_affected_rows($con)){
                            //  echo "haai";
                            //  die();
                            header("location: ./doctorEmailVerification.php?Email=$email&first_name=$first_name&contact_numberB=$contact_number&addressB=$address&$email=$EncryptedEmail");
                    }else{
                        header("location: ./doctor_signup.php?error=NotInserted&infoBack=full&first_nameB=$first_name&contact_numberB=$contact_number&addressB=$address");
                    }
                }
                else{
                    header("location: ./doctor_signup.php?error=NotInserted&infoBack=full&first_nameB=$first_name&contact_numberB=$contact_number&addressB=$address");
                }

           }
    }
    else{
         header("location: ./doctor_signup.php?inputError=PasswordNotSame&infoBack=full&first_nameB=$first_name&last_nameB=$last_name&contact_numberB=$contact_number&emailB=$email&addressB=$address");
    }
   }         
else{
    header("location:./doctor_signup.php?error=IllegalWay");
}
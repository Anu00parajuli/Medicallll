<?php
include('./tables_columns_name.php');
include('./encryption.php');
require "./connection.php";
function protect($data){
    return trim(strip_tags(addslashes($data)));
}

function encryptData($data, $key, $str){
    $encryption_key = base64_decode($key);
    $ivlength = substr(md5($str."admin_registration"),1, 16);
    $encryptedData = openssl_encrypt($data, "aes-256-cbc", $encryption_key, 0, $ivlength);

    return base64_encode($encryptedData.'::'.$ivlength);
}

if(isset($_POST['login'])){
    require "./connection.php";
    $user = protect($_POST['registration_no']);
    $Password = protect($_POST['password']);

    $str = "/6G6F;WvK7;s{au/6G6F;WvK7;s{au";
    $key = md5($str);

    $username_sql = "SELECT $password_column, $emailVerification_column , $registration_no_column FROM admin_registration WHERE $first_name_column = '$user';";
    $result = mysqli_query($con, $username_sql);
    
    if(mysqli_num_rows($result) > 0){
        // $row = mysqli_fetch_assoc($result);
        $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
            
        foreach($row as $data){
            // checking if the email is verified or not
            if($data[$emailVerification_column] == "not verified"){
                header("location: ./admin_login.php?error=EmailNotVerified#loginForm");
                die();
            }
            // checking if the password is correct or not
            if(password_verify($Password,$data[$password_column])){
                session_start();
                $_SESSION['registration_no'] = $data['registration_no']
                //header("location: ./admin_homepage.php?Logged");
                echo("hello");
                die();
            }else{
                header("location: ./admin_login.php?inputError=WrongPass#loginForm");
            }
        }
    }else{
        $user = encryptData($user, $key, $str);    
        $email_sql = "SELECT $password_column, $emailVerification_column, $registration_no  FROM admin_registration WHERE $email_column = '$user';";
        $result = mysqli_query($connect, $email_sql);
        
        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_assoc($result);

            // checking if the email is verified or not
            if($row[$emailVerification_column] == "not verified"){
                header("location: ./admin_login.php?error=EmailNotVerified#loginForm");
                die();
            }
            session_start();
            $_SESSION['registration_no'] = $row['registration_no'];
            //checking if the password is correct is correct or not
            if(password_verify($Password,$row[$password_column])){
                //header("location: ./admin_homepage.php?Logged");
                echo("hi");
            }else{
                header("location: ./admin_login.php?inputError=WrongRegistrationNumberORPass#loginForm");
            }
        }else{
            header("location: ./admin_login.php?inputError=WrongRegistrationNumberOrUser#loginForm");
        }
    }

}else{
    header("location:./admin_login.php?error=IllegalWay");
}

?>
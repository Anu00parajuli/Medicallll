<?php
include('./tables_columns_name.php');
// include('./connection.php');


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
    $_SESSION['formdata'] = $_POST ;
    $user = protect($_POST['registration_no']);
    $Password = protect($_POST['password']);

    $str = "/6G6F;WvK7;s{au/6G6F;WvK7;s{au";
    $key = md5($str);

    $username_sql = "SELECT $password_column, $email_verified_column  FROM admin_registration WHERE $registration_no_column = '$user';";
    $result = mysqli_query($con, $username_sql);
    
    if(mysqli_num_rows($result) > 0){
        // $row = mysqli_fetch_assoc($result);
        $row = mysqli_fetch_all($result, MYSQLI_ASSOC);
            
        foreach($row as $data){
            // checking if the registration no is verified or not
            if($data[$email_verified_column] == "not verified"){
                echo("hiiiiiiiii admin_handle_login_user.php line 37");
                // header("location: ./admin_login.php?error=EmailNotVerified#loginForm");
                die();
            }

            if(password_verify($Password,$data[$password_column])){
                session_start();
                header("location: ./admin_homepage.php?Logged");
                $_SESSION['registration_no'] = $data['registration_no'];
                die();
            }else{
                // echo("hi");
                header("location: ./admin_login.php?inputError=WrongPass#loginForm");
            }
        }
    }else{
        header("location:./admin_login.php?error=NoSuchUser");
    }

}else{
    header("location:./admin_login.php?error=IllegalWay");
}

?>
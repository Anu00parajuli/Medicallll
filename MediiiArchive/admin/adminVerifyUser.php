<?php

if(isset($_GET['activation_code'])){
    $activateCode = $_GET['activation_code'];

    require "./connection.php";
    

    $sql = "SELECT * FROM admin_registration WHERE $activation_column = '$activateCode'";
    $query = mysqli_query($con, $sql);

    if(mysqli_affected_rows($con)){
        $sql_update = "UPDATE admin_registration SET $emailVerification_column = 'verified' WHERE $activation_column = '$activateCode'";
        $query_update = mysqli_query($con,$sql_update);

        if(mysqli_affected_rows($con)){
            header("location: ./admin_verifiedEmail.html");
        }else{
            header("location: ./admin_login.php?mssg=AlreadyVerified#loginForm");
        }
    }else{
        header("location: ./admin_login.php?error=NotActivationCode#signupForm");
    }

}else{
    header("location: ./admin_login.php?error=WrongLink#signupForm");
}

?>
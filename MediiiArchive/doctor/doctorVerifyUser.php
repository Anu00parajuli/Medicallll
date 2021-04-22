<?php

if(isset($_GET['activation_code'])){
    $activateCode = $_GET['activation_code'];

    require "./connection.php";
    

    $sql = "SELECT * FROM doctor_registration WHERE $activation_column = '$activateCode'";
    $query = mysqli_query($con, $sql);

    if(mysqli_affected_rows($con)){
        $sql_update = "UPDATE doctor_registration SET $emailVerification_column = 'verified' WHERE $activation_column = '$activateCode'";
        $query_update = mysqli_query($con,$sql_update);

        if(mysqli_affected_rows($con)){
            header("location: ./doctor_verifiedEmail.html");
        }else{
            header("location: ../doctor_login.php?mssg=AlreadyVerified#loginForm");
        }
    }else{
        header("location: ./doctor_signup.php?error=NotActivationCode#signupForm");
    }

}else{
    header("location: ./doctor_signup.php?error=WrongLink#signupForm");
}

?>
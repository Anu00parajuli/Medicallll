<?php

// Starting and destroying session variables before logging out
session_start();

session_destroy();

header("location:./index.php?LoggedOut");

?>
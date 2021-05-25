<?php 
if(isset($_POST['password'])){

	 $requiredPassword = "MedicalArchive2021";
	 $Password = $_POST['password'];

	 if ($Password == $requiredPassword) {
	 	header("location: ./firstpage.php?loggedin");
	 }
    else{
    	
    	header("location: ./index.php?passworddoesnotmatch");
 	}
 }
 
 ?>
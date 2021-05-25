<?php
    session_start();
    ?>
<!DOCTYPE html>
<html>
<head>
	<title>Learning for email verification</title>
</head>
<body>
	<?php 
	  include 'dbcon_email.php';

	  if(isset($_POST['submit'])){
	  	$id_no = mysqli_real_escape_string($conn , $_POST) ['id_no'];
	  	$first_name = mysqli_real_escape_string($conn, $_POST) ['first_name'];
	  	$middle_name = mysqli_real_escape_string($conn , $_POST) ['middle_name'];
	  	$last_name = mysqli_real_escape_string($conn , $_POST) ['last_name'];
	  	$email = mysqli_real_escape_string($conn , $_POST) ['email'];
	  	$password = mysqli_real_escape_string($conn , $_POST) ['password'];
	  	$confirm_password = mysqli_real_escape_string($conn , $_POST) ['confirm_password'];
	  	$contact_number = mysqli_real_escape_string($conn , $_POST) ['contact_number'];
	  	

	  	$address = mysqli_real_escape_string($conn , $_POST) ['address'];

	  	$pass = password_hash($password, PASSWORD_BCRYPT);  //hast to encrypt password
	  	$c_pass = password_hash($confirm_password, PASSWORD_BCRYPT);
	  	$token = bin2hex(random_bytes(15));

	  	$emailquery =  "select *  from email_try where email = '$email'";
	  	$query = mysqli_query($conn , $emailquery );
	  	$emailcount = mysqli_num_rows($query);
	  	if ($emailcount > 0) {
	  		echo "email already exists";
	  		# code...
	  	} else{
	  		if ($password === $confirm_password) {
	  			$insertquery = "insert into email_try(id_no, first_name , middle_name, last_name, email, password, confirm_password, contact_number,address, status, token) values('$id_no',' $first_name' ,'$middle_name', '$last_name', '$email', '$pass' , '$c_pass', '$contact_number', '$address', '$token' ,'inactive' )";
	  			$iquery = mysqli_query($conn , $insertquery);
	  			if ($iquery) {
	  				 ?>
	  				 <script type="text/javascript">
	  				 	alert("Inserted Successfully");
	  				 </script>
                     <?php 
                 }else{
                 	?>
                 	<script type="text/javascript">
                 		alert("No Inserted");
                 	</script>
                 	<?php
                 }
	  		}else{
	  			?>
	  			<script type="text/javascript">
	  				alert("Password are not matching");
	  			</script>
	  			<?php
	  		}
	  	}
	  }

	  ?>
	  			}
	  		}
	  			
	  		}
	  	}




	  } ?>
	<form action="<?php echo htmlentities($_SERVER)['PHP_SELF']; ?>" method = "POST" >
		<label for="id_number"> <b>Identification no. <b></label> 
		<input type="number" name="id" required>
		<label for="first_name"><b>First Name</b></label>
      <input type="text" placeholder="Enter your first name" name="text" required>
      <label for="middle_name"><b>Middle Name</b></label>
      <input type="text" placeholder="Enter your middle name (optional)" name="text" >
      <label for="last_name"><b>Last Name</b></label>
      <input type="text" placeholder="Enter your last name" name="text" required>
      <label for="email"><b>Email</b></label>
      <input type="text" placeholder="Enter Email" name="email" required>
      <label for="password"><b>Password</b></label>
      <input type="password"  name="password" required>
      <label for="confirm_password"><b> Confirm Password</b></label>
      <input type="password" name="confirm_password" required>
      <label for="address"><b> Address</b></label>
      <input type="text" name="address" required>

      <label>Contact Number</label>
      <input type="text" name="phone number" required>

      <br>
      <input type="submit" name="Submit">
	</form>

</body>
</html>
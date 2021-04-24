<?php 
if (isset($_POST['submit'])) {
	require 'connection.php';
}
 ?>

<!DOCTYPE html>

<html>
<head>
	<title>Passcode page  </title>
</head>
<body >
   <!-- saving this passcodee.php as index.php -->
	<center>
		<h2>Passcode please!</h2>
		<img src="img_avatar2.png" height="5%" width="10%">
		<form  action="./loguser.php" method="POST">
			<label for="password">Password:</label><br>
		  	<input type="password" id="pass" name="password">

		  	<input type="submit" name="Submit">
		</form>
  </center>
</body>
</html>


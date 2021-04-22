<?php

$username = "root";
$password = "";
$server = 'localhost';
$db = 'medicalarchive';

$con = mysqli_connect($server , $username , $password , $db);

 if ($con) {
  //echo "Connection Succesful";
 	?>
 	<script type="text/javascript">
 		alert('Connection Succesful');
 	</script>
 	<?php

 } else {
 	?>
 	 <script type="text/javascript">
 	 	alert('No Connection');
 	 </script>
 	<?php
 }

 ?>

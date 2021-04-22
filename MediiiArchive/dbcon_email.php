<?php
  $server = 'localhost';
  $username = 'root';
  $password ='';
  $db = 'try';

  $conn = mysqli_connect($server , $username , $password , $db);

 if ( $conn ) {
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
 
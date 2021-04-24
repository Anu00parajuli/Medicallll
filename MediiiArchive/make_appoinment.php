<!DOCTYPE html>
<html>
<head>
	<title>Make Appointment</title>
</head>
<body>
	<fieldset><h1> Make an appoinment </h1>
<div class="table-responsive">
	 		<table id="myTable">
	 			
	 			<thead>
	 				<tr>
	 					<th>Patient's Id</th>
	 					<th> First Name</th>
	 					<th>Last Name</th>
	 					<th>Age</th>
	 					<th>Gender</th>
	 					<th>Address</th>
	 					<!--<th>Citizenship No.</th>
	 					<th>Father's Name</th>
	 					<th>Email Address</th>
	 					<th>Phone Number</th> -->
	 					
	 					<th>Consultant Doctor</th>
	 					<th>Department</th>
	 				
	 				</tr>
	 			</thead>
	 			<tbody>
	 				<?php
               include 'connection.php';
               $selectquery = "select * from patient where hospital_registration_number = 10 ";
               $query = mysqli_query($con, $selectquery);
               $nums = mysqli_num_rows($query);
               //$res = mysqli_fetch_array($query);
               while ($res = mysqli_fetch_array($query)) {
               ?>
	 					<td><?php echo $res['hospital_registration_number']; ?></td>
	 					<td><?php echo $res['first_name']; ?></td>
	 					<td><?php echo $res['last_name']; ?></td>
	 					<td><?php echo $res['age']; ?></td>
	 					<td><?php echo $res['gender']; ?></td>
	 					<td><?php echo $res['address']; ?></td>

	 					<!--<td><?php echo $res['citizenship_number']; ?></td>
	 					<td><?php echo $res['father_name']; ?></td>
	 					<td><?php echo $res['email_address']; ?></td>
	 					<td><?php echo $res['phone_number']; ?></td> -->
	 					
	 					<td><?php echo $res['consultant_doctor']; ?></td>
	 					<td><?php echo $res['department']; ?></td> 

	 					<?php

                        }
               
	 				?>
	 				</tbody>
	 			</table>

</fieldset>
</body>
</html>
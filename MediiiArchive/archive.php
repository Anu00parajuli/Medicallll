<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" integrity="sha512-SfTiTlX6kk+qitfevl/7LibUOeJWlt9rbyDn92a1DqWOw9vWG2MFoays0sgObmWazO5BQPiFucnnEAjpAB+/Sw==" crossorigin="anonymous>
</head>
<body>
	<p> This page is going to display all the information of the registered patients.</p>
	 <!-- <h3>Search using patient's Registration Number</h3> -->
	 <div class="main-div" style="visibility: hidden;" >
	 	<h1> List of the registered patients</h1>
	 	<input type="number" name="" id="userId" placeholder="Search Patient's Registration Number" onkeyup="searchFun()">
	 	<div class="table-responsive" style="visibility: hidden;">
	 		<table id="myTable">
	 			
	 			<thead>
	 				<tr>
	 					<th>Hospital Registration Number (Patient's Id)</th>
	 					<th> First Name</th>
	 					<th>Last Name</th>
	 					<th>Age</th>
	 					<th>Gender</th>
	 					<th>Address</th>
	 					<th>Citizenship No.</th>
	 					<th>Father's Name</th>
	 					<th>Email Address</th>
	 					<th>Phone Number</th>
	 					<th>Department</th>
	 					<th>Consultant Doctor</th>
	 					<th colspan="2">Operation</th>
	 				</tr>
	 			</thead>
	 			<tbody>
	 				<?php
               include 'connection.php';
               $selectquery = "select * from patient";
               $query = mysqli_query($con, $selectquery);
               $nums = mysqli_num_rows($query);
               //$res = mysqli_fetch_array($query);
               while ($res = mysqli_fetch_array($query)) {
               ?>
               <tr>
	 					<td><?php echo $res['hospital_registration_number']; ?></td>
	 					<td><?php echo $res['first_name']; ?></td>
	 					<td><?php echo $res['last_name']; ?></td>
	 					<td><?php echo $res['age']; ?></td>
	 					<td><?php echo $res['gender']; ?></td>
	 					<td><?php echo $res['address']; ?></td>

	 					<td><?php echo $res['citizenship_number']; ?></td>
	 					<td><?php echo $res['father_name']; ?></td>
	 					<td><?php echo $res['email_address']; ?></td>
	 					<td><?php echo $res['phone_number']; ?></td>
	 					<td><?php echo $res['department']; ?></td>
	 					<td><?php echo $res['consultant_doctor']; ?></td>
	 					
	 					<td><a href="#update">Update</a> <a href="#delete">Delete</a></td>
	 					<!--<td><i href="#update" class="fa fa-pencil-square-o" aria-hidden="true"></i> <i  href="#delete" class="fa fa-trash" aria-hidden="true"></i> -->

</td>

	 				</tr>

	 				<?php

                        }
               
	 				?>
	 			</tbody>
	 		</table>
	 		
	 	</div>

	 </div>
	 <script type="text/javascript">
	 	var i = 0;
	 	const searchFun = () =>{
	 		let filter = document.getElementById('userId').value;
	 		filter.addEventListner("keyup". function(event) {
	 			if(event.keyCode === 13){
	 				let myTable = document.getElementById('myTable');
	 		       let tr = document.getElementsByTagName('tr');

	 				for(i = 0; i < tr.length; i++){
	 			let td = tr[i].getElementsByTagName('td')[0];
	 			if(td){
	 				let textvalue = td.textContent || td.innerHTML;
	 				if (textvalue.indexOf(filter) > -1) {
	 					tr[i].style.display = "";
	 				} else {
	 					tr[i].style.display = "none";
	 				}
	 			}
	 		}

	 			}
	 		})

	 	}
	 		
	 		
	 		
	 	
	 </script>


</body>
</html>



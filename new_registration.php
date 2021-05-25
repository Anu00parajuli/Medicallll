<!DOCTYPE html>
<html>
<head>
	<title>patient's registration page</title>
	<script type="text/javascript">
		function showDoctor() {
			var selectBox = document.getElementById('department');
			var userInput = selectBox.options[selectBox.selectedIndex].value;
			if(userInput== 'Paedracition'){
				document.getElementById('select_paedracition').style.visibility= 'visible';
				document.getElementById('select_physician').style.visibility= 'hidden';	
			    document.getElementById('select_gynaecologist').style.visibility= 'hidden';
			    document.getElementById('select_nephrologist').style.visibility= 'hidden';
			    document.getElementById('select_neurologist').style.visibility= 'hidden';
			}
			else if (userInput == 'Physician'){
			    document.getElementById('select_physician').style.visibility= 'visible';
			    document.getElementById('select_paedracition').style.visibility= 'hidden';	
			    document.getElementById('select_gynaecologist').style.visibility= 'hidden';
			    document.getElementById('select_nephrologist').style.visibility= 'hidden';
			    document.getElementById('select_neurologist').style.visibility= 'hidden';
			}
			else if (userInput == 'Gynaecologist'){
			    document.getElementById('select_gynaecologist').style.visibility= 'visible';	
			    document.getElementById('select_nephrologist').style.visibility= 'hidden';
			    document.getElementById('select_neurologist').style.visibility= 'hidden';
			    document.getElementById('select_paedracition').style.visibility= 'hidden';
			    document.getElementById('select_physician').style.visibility= 'hidden';	
			}
			else if (userInput == 'Nephrologist'){
			    document.getElementById('select_nephrologist').style.visibility= 'visible';	
			    document.getElementById('select_paedracition').style.visibility= 'hidden';
			    document.getElementById('select_physician').style.visibility= 'hidden';	
			    document.getElementById('select_gynaecologist').style.visibility= 'hidden';
			     document.getElementById('select_neurologist').style.visibility= 'hidden';
			}
			else if (userInput == 'Neurologist'){
			    document.getElementById('select_neurologist').style.visibility= 'visible';	
			    document.getElementById('select_paedracition').style.visibility= 'hidden';
			    document.getElementById('select_physician').style.visibility= 'hidden';	
			    document.getElementById('select_gynaecologist').style.visibility= 'hidden';
			    document.getElementById('select_nephrologist').style.visibility= 'hidden';
			}
			else {
				document.getElementById('select_paedracition').style.visibility= 'hidden';
			    document.getElementById('select_physician').style.visibility= 'hidden';	
			    document.getElementById('select_gynaecologist').style.visibility= 'hidden';
			    document.getElementById('select_nephrologist').style.visibility= 'hidden';
			    document.getElementById('select_neurologist').style.visibility= 'hidden';
			}
			return false;
		}
	</script>
</head>
<body >
	<center>
	<h2> Registration Form</h2>
	<form  action="" method="POST">
		<label>First Name</label>
		<input type="text" name="first_name" required>
		<br/>
		<label>Last Name</label>
		<input type="text" name="last_name" required>
		<br/>
		<label>Age</label>
		<input type="number" name="age" required>
		<br/>
		<label>Gender</label>
	    <input type="radio" id="male" name="gender" value="Male">
        <label for="male">Male</label>
        <input type="radio" id="female" name="gender" value="Female">
        <label for="female">Female</label>
		<br/>
		<label>Address</label>
		<input type="text" name="address">
		<br/>
        <label>Citizenship Number</label>
        <input type="text" name="citizenshipnumber" required>
        <br>
        <label for="email">Email Address</label>
        <input type="text" name="email" required>
        <br>
        <label>Contact Number</label>
        <input type="text" name="phonenumber" required>
        <br>
        <label>Father's Name</label>
		<input type="text" name="father_name" required>
		<br/>
		<!--<label>Patient's Registrayion Number</label>
		<input type="text" name="patient_registration_no" required>
		<br/> -->
		<div>
		<label>Department</label>
		<select name="department" id="department" onchange="return showDoctor();">
			<option value="Paedracition"> Paedracition </option>
			<option value="Physician"> Physician </option>
			<option value="Gynaecologist"> Gynaecologist </option>
			<option value="Nephrologist"> Nephrologist</option>
			<option value="Neurologist"> Neurologist</option>
		</select>
	</div>
        <br>
        <div id="select_paedracition" style="visibility: hidden;">
		<label >Consultant Doctor</label>
		<select name="consultant_doctor" id="consultant_paedracition">
			<option value= "doctor_a"> Dr. Paedratic A </option>
			<option value="doctor_b"> DR. Paedratic B </option>
			<option value= "doctor_c"> Dr. Paedratic C</option>
			<option value="doctor_d"> DR.Paedratic D </option>
			

			
		</select>
	</div>
	<br>
        <div id="select_physician" style="visibility: hidden;">
        
		<label >Consultant Doctor</label>
		<select name="consultant_doctor" id="consultant_physician">
			<option value= "doctor_a"> Dr. A Physician</option>
			<option value="doctor_b"> DR. B Physician</option>
			<option value= "doctor_c"> Dr. C Physician</option>
			<option value="doctor_d"> DR. D Physician</option>
			

			
		</select>
	</div>
	<br>
        <div id="select_gynaecologist" style="visibility: hidden;">
		<label >Consultant Doctor</label>
		<select name="consultant_doctor" id="consultant_gynaecologist">
			<option value= "doctor_a"> Dr. A Paudel gynaecologist</option>
			<option value="doctor_b"> DR. B Paudel gynaecologist</option>
			<option value= "doctor_c"> Dr. C Paudel gynaecologist</option>
			<option value="doctor_d"> DR. D Paudel gynaecologist</option>
			

			
		</select>
	</div>
	<br>
        <div id="select_nephrologist" style="visibility: hidden;">
		<label >Consultant Doctor</label>
		<select name="consultant_doctor" id="consultant_nephrologist">
			<option value= "doctor_a"> Dr. A Paudel nephrologist</option>
			<option value="doctor_b"> DR. B Paudel nephrologist</option>
			<option value= "doctor_c"> Dr. C Paudel nephrologist</option>
			<option value="doctor_d"> DR. D Paudel nephrologist</option>
			

			
		</select>
	</div>
	<br>
        <div id="select_neurologist" style="visibility: hidden;">
		<label >Consultant Doctor</label>
		<select name="consultant_doctor" id="consultant_neurologist">
			<option value= "doctor_a"> Dr. A Paudel neurologist</option>
			<option value="doctor_b"> DR. B Paudel neurologist</option>
			<option value= "doctor_c"> Dr. C Paudel neurologist</option>
			<option value="doctor_d"> DR. D Paudel neurologist</option>
			

			
		</select>
	</div>

		 <button type="reset">Reset</button>
		 <button type="submit" class="registration_btn" name="registration_submit" onclick="ValidateEmail()">Submit</button>



	</form>
</center>
<script type="text/javascript">
	function ValidateEmail(email)
{
var mailformat = /^w+([.-]?w+)*@w+([.-]?w+)*(.w{2,3})+$/;
if(inputText.value.match(mailformat))
{
alert("You have entered a valid email address!");    //The pop up alert for a valid email address
document.form1.text1.focus();
return true;
}
else
{
alert("You have entered an invalid email address!");    //The pop up alert for an invalid email address
document.form1.text1.focus();
return false;
}
}
</script>

</body>
</html>


<?php

include 'connection.php';

if (isset($_POST['registration_submit'])) {
	$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];
	$age = $_POST['age'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $citizenship_number = $_POST['citizenshipnumber'];
    $father_name = $_POST['father_name'];
    $email_address = $_POST['email'];
    
    //$hospital_registration_number = $_POST['patient_registration_no'];
    $department = $_POST['department'];
    $consultant_doctor = $_POST['consultant_doctor'];
    $phone_number = $_POST['phonenumber'];


  $insertquery = "insert into patient(first_name, last_name, age, gender, address, citizenship_number, father_name, email_address, department, consultant_doctor, phone_number) values('$first_name', '$last_name', '$age', '$gender', '$address', '$citizenship_number', '$father_name','$email_address', '$department', '$consultant_doctor','$phone_number')";

  $res = mysqli_query($con,$insertquery);
  if ($res){
  	?>
  	 <script type="text/javascript">
  	 	alert("Data inserted properly");
  	 </script>

  	<?php
  }else{
  	?>
  	 <script type="text/javascript">
  	 	alert("Data  not inserted");
  	 </script>

  	<?php

  }
}

?>
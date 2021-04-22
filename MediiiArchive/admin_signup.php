<?php

    if(isset($_GET['error'])){
        $error = $_GET['error'];
        $title = "Error";
        
            if($error == 'IllegalWay'){
                $mssg = "Please ! Enter through proper way.";                
            }else if($error == 'NotInserted'){
                $mssg = "Some error occured. Please retry.";
            }else if($error == 'NotUser'){
                $mssg = "No such user found.";
            }else if($error == 'SendMailError'){
                $mssg = "Some technical issue detected. Please report.";
            }else if($error == 'WrongLink'){
                $mssg = "The link must have been expired.";
            }else if($error == 'NotActivationCode'){
                $mssg = "No such activation code found.";
            }
    }

    if(isset($_GET['inputError'])){
        $inputError = $_GET['inputError'];
    }

    if(isset($_GET['mssg'])){
        $successMssg = $_GET['mssg'];
        $title = "Hurray!";

        if($successMssg == 'CheckEmail'){
            $mssg = "Please check your email for verification";
        }
    }

    if(isset($_GET['infoBack'])){
        $infoBackLength = $_GET['infoBack'];
        $registration_no = '';
        $first_name = $_GET['first_nameB'];
        $last_name = '';
        $address = '';
        $email = '';
        $contact_number = '';

            if($infoBackLength == "noPhone"){
                $email = $_GET['emailB'];
            }else if($infoBackLength == "noEmail"){
                $contact_number = $_GET['contact_numberB'];
                // $registration_no=$_GET['registration_noB'];
          
            }else if($infoBackLength == "full"){
                // $email = $_GET['emailB'];
                $contact_number = $_GET['contact_numberB'];
            }
    }

?>
<!DOCTYPE html>
<html>
<title> account create garni page</title>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

/* Add a background color when the inputs get focus */
input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for all buttons */
button {
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
  padding: 14px 20px;
  background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
  padding: 16px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: #474e5d;
  padding-top: 50px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
}

/* Style the horizontal ruler */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 25px;
}
 
/* The Close Button (x) */
.close {
  position: absolute;
  right: 35px;
  top: 15px;
  font-size: 40px;
  font-weight: bold;
  color: #f1f1f1;
}

.close:hover,
.close:focus {
  color: #f44336;
  cursor: pointer;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
     width: 100%;
  }
}
</style>
<body>

<!--<h2>Modal Signup Form</h2>

<button onclick="document.getElementById('id01').style.display='block'" style="width:auto;"> Admin's Sign Up Page</button>

<div id="id01" class="modal">
  <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
-->
  <form  method= "POST" class="modal-content" action="./handle_admin_user.php">
    <div class="container">
      <h1>Sign Up</h1>

      <p>Please fill in this form to create an account.</p>
    
      <hr>
      <br><label for="registration_no">Hospital's Registration Number</label>
      <input type="text" name="registration_no" required <?php if (isset($_GET['infoBack'])) { echo "value='$registration_no'";} ?>>
       <br>
      <label for="first_name"><b>First Name</b></label>
      <input type="text" placeholder="Enter your first name" name="first_name" required <?php if (isset($_GET['infoBack'])) { echo "value='$first_name'";} ?> >
      
      <label for="last_name"><b>Last Name</b></label>
      <input type="text" placeholder="Enter your last name" name="last_name" required <?php if (isset($_GET['infoBack'])) { echo "value='$last_name'";} ?> >
      <label for="email"><b>Email</b></label>
      <input type="email" placeholder="Enter Email" name="email" required <?php if (isset($_GET['infoBack'])) { echo "value='$email'";} ?> > 
      <label for="password"><b>Password</b></label>
      <input type="password" placeholder="Enter password"name="password" required > 
      <br>
      <label for="confirm_password"><b> Confirm Password</b></label>
      <input type="password"  placeholder="Enter Password Again" name="confirm_password" required > <br>

      <label>Contact Number</label>
      <input type="text" name="contact_number" required <?php if (isset($_GET['infoBack'])) { echo "value='$contact_number'";} ?>>
      <br>
       
      <label>Address</label>
      <input type="text" name="address" required <?php if (isset($_GET['infoBack'])) { echo "value='$address'";} ?>>
      
      
      <button type="reset">Reset</button>
       <input type="submit" name="signup" value="signup">
      

  

      
    </div>
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');
var value1 = document.getElementById('doctor');
var value2 = document.getElementById('admin');
// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}

</script>

</body>
</html>

<?php
require_once 'db_connect.php';
$success='';
$error='';
//This is the script to register employees of the company.
if(isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['phone'])&& isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['cpassword'])){
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $phone=$_POST['phone'];
        $username=$_POST['username'];
        $email=$_POST['email'];
        $password=$_POST['password'];
        $cpassword=$_POST['cpassword'];

//check if the user exists in the database
$selectuser="SELECT username FROM alpha_employees WHERE username='$username'";
$result=$conn->query($selectuser);

if($result->num_rows==1){
    echo 'The Username is already Taken';
    
}
 else {
     //Test if the passwords match.
     if($password!=$cpassword){
         $error= 'Your Passwords Does Not Match';
         
     }
 else {
      //Do the registration
      $insertuser="INSERT INTO alpha_employees(f_name,l_name,phone,username,email,password) VALUES('$fname','$lname','$phone','$username','$email','$password')";
     $result=$conn->query($insertuser);
     if($result==TRUE){
         $success= 'Client Registered Suuceefully';
         
     }
     else{
         $error= 'There was a problem Registreing you.Try Again Later';
         
     }
         
     }
    

    
}
    
    
    
    
}




       

?>



<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Register | Homes Management</title>
  
  
  
      <link rel="stylesheet" href="../register-css/style.css">

  
</head>
<style>
body {
    background-image: url("../img/background_image.jpg");
   
	background-repeat:no-repeat;
   background-size: 1366px 768px;;
}
h1 {
margin-top: -2%;
	font-size: 140%;
	margin-bottom: 50px;
	
}

</style>

<body >
  <hgroup>
 <h1><font color="#2a3f54">Homes Management </font>Registration</h1>
 <h4>This is Where Error Messages are Displayed</h4>
  
</hgroup>
    <form  style="margin-left: 36%;" method="post" action="register.php">

  <div class="group" >
  
      <input class="input-custom" type="text" name="fname"><span class="highlight"></span><span class="bar"></span>
    <label>First Name</label>
  </div>
  <div class="group" >
  
      <input class="input-custom" type="text" name="lname"><span class="highlight"></span><span class="bar"></span>
    <label>Last Name</label>
  </div>
  <div class="group" >
  
      <input class="input-custom" type="text" name="phone"><span class="highlight"></span><span class="bar"></span>
    <label>Phone Number</label>
  </div>
  <div class="group" >
  
      <input class="input-custom" type="text" name="usernanme"><span class="highlight"></span><span class="bar"></span>
    <label>Userame</label>
  </div>
  <div class="group" >
  
      <input class="input-custom" type="text" name="email"><span class="highlight"></span><span class="bar"></span>
    <label>Email Address</label>
  </div>
  <div class="group">
      <input class="input-custom" class="input-custom" type="password" name="password"><span class="highlight"></span><span class="bar"></span>
    <label>Password</label>
	<!--<br><input type="checkbox" name="vehicle" value="Car" checked> <font style="color: rgb(140, 140, 140); font-size: small;">Remember me</font>-->
  </div>
     <div class="group">
         <input class="input-custom" class="input-custom" type="password" name="cpassword"><span class="highlight"></span><span class="bar"></span>
    <label>Confirm Password</label>
	<!--<br><input type="checkbox" name="vehicle" value="Car" checked> <font style="color: rgb(140, 140, 140); font-size: small;">Remember me</font>-->
     </div>  
        <button type="submit" class="button buttonBlue" align="center" name="register">REGISTER
            <div class="ripples buttonRipples"><span class="ripplesCircle"></span></div>
        </button>
  <br><br>
  

 </form>

 


  
  <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

    <script  src="../register-js/index.js"></script>

</body>

</html>

<?php
include('connect.php');
$address=$_POST['selection'];

//$query = "select name from home where h_address = '$address'";
if($run=mysqli_query($con,"SELECT h_name FROM homes WHERE h_address='$address'")){
	while ($row=mysqli_fetch_array($run)){
		echo "<option>" . $row['h_name'] . "</option>";
		
	}
}
//This is the second script.
$myaddress=$_POST['address'];
if($query=mysqli_query($con,"SELECT rent FROM homes WHERE h_address='$myaddress'")){
	while ($row=mysqli_fetch_array($query)){
		echo "<option>" . $row['rent'] . "</option>";
		
	}
}



?>
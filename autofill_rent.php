<?php
require 'connect.php';
$home_details=array();

$addresspassed=$_POST['paddress'];

//$query = "select name from home where h_address = '$address'";
if($run=mysqli_query($con,"SELECT description,rent FROM homes WHERE h_address='$addresspassed'")){
	while ($row=mysqli_fetch_array($run)){
                echo $row['rent'];
		
	}
}


?>
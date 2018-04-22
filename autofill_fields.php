<?php
include('connect.php');
$home_details = array();
$address=$_POST['selection'];

//$query = "select name from home where h_address = '$address'";
if($run=mysqli_query($con,"SELECT h_name,rent FROM homes WHERE h_address='$address'")){
	while ($row=mysqli_fetch_array($run)){
		
               
                echo $row['h_name'];
		
	}
}





?>
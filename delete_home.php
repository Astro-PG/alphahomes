<?php
include('connect.php');

$address=$_POST['address'];

//$query = "select name from home where h_address = '$address'";

if($run=mysqli_query($con,"DELETE FROM homes WHERE  h_address='$address'")){
	
    echo "The Home Has Been Deleted Successfully";
}
 else {
    echo 'There was a problem Deleting the home'. mysqli_error($con);
    
}





?>
<?php
require 'connect.php';
//This is the code assign a client a home.

$id=$_POST['id'];
$homeaddress=$_POST['address'];
$sql="UPDATE homes SET client_id='$id' WHERE h_address='$homeaddress'";
if(mysqli_query($con, $sql)){
    echo '<h2 style="color:green">The Client Has Been Assigned a Home Successfully</h2>';
}
 else {
        echo 'The above client has already been assigned a Home';
        
}




?>

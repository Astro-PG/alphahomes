<?php
require 'connect.php';
$p_id=$_POST['client_id'];
$amount=$_POST['amount'];


$sql="SELECT name from multi_form_data WHERE id='$p_id' ";
$query= mysqli_query($con, $sql);
if(mysqli_num_rows($query)==1){    
    //Let us Save the Payments
    if(mysqli_query($con, "INSERT INTO received_payments(client_id,amount_payed) VALUES('$p_id','$amount')")){
        echo 'The Payement Has been Successfully Saved';
       
       
    }
 else {
        echo 'There was a problem Saving the Records';
        header("Refresh:0");
        
    }
    
    
}
 else {
     echo 'That User You are trying to save payment is not Registered';
    
    
}


?>
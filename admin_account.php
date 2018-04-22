<?php
require 'connect.php';
include 'alpha_employees/session.php';
$number=0;

$combinedarray=array();
$total_clients=0;
$total_homes=0;
$approved_clients=0;

//This is the query count the number of approved cleints
$sqlclients="SELECT id FROM multi_form_data";
if($result= mysqli_query($con, $sqlclients)){
    $total_clients= mysqli_num_rows($result);
}


$combinedarray[0]=mysqli_num_rows(mysqli_query($con, $sqlclients));

//Let us get the number of homes and insert them to array
$sqlhomes="SELECT h_address FROM homes";
if($result= mysqli_query($con, $sqlhomes)){
    $total_homes= mysqli_num_rows($result);
}

//Let us get the total number of clients approved.
$sqlclientsapproved="SELECT id FROM multi_form_data WHERE status='Approved'";
if($result= mysqli_query($con, $sqlclientsapproved)){
    $approved_clients= mysqli_num_rows($result);
}






$sql="SELECT name FROM multi_form_data INNER JOIN received_payments on multi_form_data.id=received_payments.client_id 
WHERE client_id not in (SELECT client_id FROM received_payments WHERE   month(month_payed)=(MONTH(CURRENT_DATE()))) GROUP BY id";                            
 if($result=mysqli_query($con,$sql)){
     $number= mysqli_num_rows($result); 
     
 };

 
                              

?>

<!DOCTYPE html>
<head>
    <title>Administrator|Home Management</title>
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/accounts.css">
</head>
<body>
    <div class="wrapper">
        <nav id="sidebar">
           
            <div class="sidebar-content"><h3 align="center">
                <img src="images/10.jpg" class="img-circle" alt="house" width="100" height="100">
                </h3>
            </div>
            <div class="sidebar-content"><h3 align="center"><?php echo $login_session; ?></h3></div>
            <!--Sidebar Links--->
            <ul class="list-unstyled components">
                <li class="active" data-toggle="collapse" aria-expanded="false"><a href=""><i class="fa fa-dashboard fa-lg"></i> Dashboard</a></li> <!--link with dropdown items-->              
                <li>
                    <a href="#homesubmenu" data-toggle="collapse" ><span class="glyphicon glyphicon-home"></span> Homes  <span class="caret"></span></a>
                    <ul class="collapse list-unstyled" id="homesubmenu">
                        <li><a href="register_home.php">New Home</a></li>
                        <li><a href="update_homeListing.php">Update Existing</a></li>                       
                    </ul>
                </li>
                <li><!--link with dropdown items-->
                    <a href="#applicationsubmenu" data-toggle="collapse" aria-expanded="false">Applications</a>
                    <ul class="collapse list-unstyled" id="applicationsubmenu">
                        <li><a href="clients_approved.php">Approved</a></li>  
                        <li><a href="steps.php">New Application</a></li>  
                    </ul>
                </li>
                <!--Contract submenu-->
                <li>
                    <a href="#contractsubmenu" data-toggle="collapse" ><span class="glyphicon glyphicon-home"></span> Assign Home <span class="caret"></span></a>
                    <ul class="collapse list-unstyled" id="contractsubmenu">
                        <li><a href="unassigned_clients.php">Assign Home</a></li>
                        <li><a href="view_contract_status.php">View Client Details</a></li>                       
                    </ul>
                </li>  
                
                <li>
                    <a href="#financialssubmenu" data-toggle="collapse" ><span class="glyphicon glyphicon-usd"></span> Financials<span class="caret"></span></a>
                    <hr/>
                    <ul class="collapse list-unstyled" id="financialssubmenu">
                        <li class="text-center"><button type="button" class="btn btn-danger btn-sm" id="myBtn">Update Payment</button></li>
                        <li><a href="transaction_reports.php">View Payment Report</a></li>                       
                    </ul>
                </li> 
                              
                 
            </ul>    
        </nav> 
        <!--add a toggle button responsible for the sidebar--> 
        <div class="content">
           
                     <nav class="navbar navbar-dafault" id="custom-nav">
                      <div class="container">    
                        <ul class="nav navbar-nav navbar-right">
                            <li class="active"><a href="admin_account.php">Home</a></li>                     
                            <li class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-bell"></span>  Notications   <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                  <li><a href="track.php">Track Legal Files</a></li>
                                  <li><a href="late_paymentNotifications.php">Default Payment Notifications <span class="badge" style="background-color: red"><?php echo $number;?></span></a></li>          
                                </ul>
                            </li>               
                            <li><a href="alpha_employees/logout.php"><span class="glyphicon glyphicon-off"></span>Logout</a></li>
                        </ul>
                      </div>
                    </nav> 
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center">
                        <h2>Home Management Overview</h2>                        
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-4 text-center">
                        <button class="btn btn-lg btn-success"><?php echo $total_clients ;?> Registered Clients</button>
                    </div>
                    <div class="col-sm-4 text-center">
                        <button class="btn btn-lg btn-primary"><?php echo $total_homes ;?> Already Registered Homes</button>
                    </div>
                    <div class="col-sm-4 text-center">
                        <button class="btn btn-lg btn-danger"><?php echo $approved_clients ;?> Already Approved Clients</button>
                    </div>
                </div>
                <hr/>
                
                <div class="row">
                    <div class="col-sm-12">
                        <div class="row"><div class="col-sm-12"><strong>OUR REGISTERED HOMES</strong></div></div>
                        <div class="row">
                            <?php
                            $sql="SELECT * FROM homes";
                            $query= mysqli_query($con, $sql);
                            while($row= mysqli_fetch_array($query)){
                                echo "<div class='col-sm-4'><div class='card' style='width: 18rem;'><img class='card-img-top' src='./files/".$row['profile_name']."'  height='100' width='100' alt='Card image cap'><div class='card-body'><h5 class='card-title'>".$row['h_address']."</h5>\n
                                      <p class='card-text'>".$row['h_name']."</p><p>".$row['rent']."</p><p>".$row['description']."</div></div></div>";
                                
                            }
                            
                            
                            ?>  
                            
                            
                        </div>
                    </div>
                    
                </div>
            </div>
            <!--Beginning of modal-->
            <div class="container">
                  <!-- Modal -->
   <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header" style="padding:35px 50px;">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4><span class="glyphicon glyphicon-lock"></span> Update Payment Received</h4>
        </div>
        <div class="modal-body" style="padding:40px 50px;">
          <form role="form">
            <div class="form-group">
              <label for="client_id"><span class="glyphicon glyphicon-user"></span>Client ID</label>
              <input type="text" class="form-control" id="client_id" placeholder="Enter Client ID" name="client_id">
            </div>
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-money"></span> Amount Payed</label>
              <input type="text" class="form-control" id="amount_payed" placeholder="Enter Amount Payed">
            </div>
              <!--
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-time"></span> Month</label>
              <input type="text" class="form-control" id="month_payed" placeholder="Enter Month e.g 6 for June">
            </div>-->
              
            
           
              <button type="button"  id="btnsubmit" class="btn btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Update Payments</button>
          </form>
        </div>
        <div class="modal-footer">         
          <p class="text-center"> &copy 2018 Home Management.All Rights Reserved </p>
          
        </div>
      </div>
      
    </div>
  </div> 
                
                
                
                
                
            </div>
            <!-- end of the modal -->
            
        </div>
            
        
            
                    <div>
    
        
    
    </div>

    <!-- jQuery CDN -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap Js CDN -->
    <script src="js/bootstrap.min.js"></script>
        <script>
            $(document).ready(function(){
                $("#myBtn").click(function(){
                    $("#myModal").modal();
                });
            });
    </script>
    
    
    
    
    <!--This is the ajax to redirect to paymentscript-->
    <script>
        
        $("#btnsubmit").click(function (e){            
            e.preventDefault();
            var client_id=$("#client_id").val();
            var amount=$("#amount_payed").val();            
            //window.location.assign("updatePayment.php")
            $.ajax({
                type:"POST",
                url:"updatePayment.php",
                data:"client_id="+client_id+"&amount="+amount,
                success:function(result){
                    alert(result);
                }
                
            });
            
        });
        
    
    </script>
        
</body>
</html>






<?php
require 'connect.php';


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
             <div class="sidebar-content"><h3 align="center">Administrator</h3></div>
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
                          <li><a href="#"><span class="glyphicon glyphicon-off"></span>Logout</a></li>
                        </ul>
                      </div>
                    </nav> 
            
            <!--Beginning of modal-->
            <div class="container"> 
                <div class="row">
                    <div class="col-sm-12 text-success"><strong>ACTIVE PAYMENTS</strong></div>
                    <div class="col-sm-12"><p>These are payments that have been submitted for the current Month</p></div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                       <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Client Name</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>State</th>
                                    <th>Zip</th>
                                    <th>Home Address</th>
                                    <th>Home Name</th>
                                    <th>Rental Fees</th>                                    
                                    <th>Amount Payed</th>
                                    <th>Active Month</th>                             


                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                include('connect.php');
                                $sql="SELECT id,name,Phone,address,city,state,zip,h_address,h_name,homes.rent as 'rent' ,amount_payed,month_payed AS 'transaction_date'  FROM multi_form_data INNER JOIN homes  ON multi_form_data.id=homes.client_id INNER JOIN received_payments ON multi_form_data.id=received_payments.client_id WHERE month(month_payed)=month(CURRENT_DATE())";
                                
                               // $sql="SELECT * FROM multi_form_data t1 LEFT JOIN homes t2 ON t2.client_id = t1.id WHERE t2.client_id IS NULL AND t1.status='Approved'";
                                $result=mysqli_query($con,$sql);
                                while ($row=mysqli_fetch_array($result)) {
                                    echo "<tr>";
                                    echo "<td>".$row['id']."</td>";
                                    echo "<td>".$row['name']."</td>";
                                    echo "<td>".$row['Phone']."</td>";
                                    echo "<td>".$row['address']."</td>";
                                    echo "<td>".$row['city']."</td>";
                                    echo "<td>".$row['state']."</td>";
                                    echo "<td>".$row['zip']."</td>";
                                    echo "<td>".$row['h_address']."</td>";
                                    echo "<td>".$row['h_name']."</td>";
                                    echo "<td>".$row['rent']."</td>";                                    
                                    echo "<td>".$row['amount_payed']."</td>"; 
                                    echo "<td>".$row['transaction_date']."</td>"; 
                                    
                                    //echo "<td><a href='assign_home.php?id=".$row['id']."'"."><button class='btn btn-danger'><span class='glyphicon glyphicon-eye-open'></span> Assign Home</button></td>";

                                    echo  "</tr>";


                                }



                                 ?>




                            </tbody>
                            <tfoot>
                                <tr class="text-center">
                                    <td> </td>
                                </tr>

                            </tfoot>
                        </table>
                        
                    </div>
                </div>
                
                
                <div class="row">
                    <div class="col-sm-12 text-danger"><strong>INACTIVE CLIENTS</strong></div>
                    <div class="col-sm-12 text-danger"><p>These are Clients Who Have Not Payed For This Month</p></div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                         <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Client Name</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>State</th>
                                    <th>Zip</th>
                                    <th>Home Address</th>
                                    <th>Home Name</th>
                                    <th>Rental Fees</th>                                    
                                    <th>Amount Payed</th>
                                    <th>Active Month</th>                             


                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                include('connect.php');
                                $sql="SELECT id,name,Phone,address,city,state,zip, h_address,h_name,homes.rent ,SUM(amount_payed) AS 'amount',month(month_payed) as 'month'FROM multi_form_data INNER JOIN  homes on multi_form_data.id=homes.client_id INNER JOIN received_payments ON  multi_form_data.id=received_payments.client_id 
WHERE received_payments.client_id not in (SELECT client_id FROM received_payments WHERE   month(month_payed)=(MONTH(CURRENT_DATE()))) GROUP BY id";
                               // $sql="SELECT * FROM multi_form_data t1 LEFT JOIN homes t2 ON t2.client_id = t1.id WHERE t2.client_id IS NULL AND t1.status='Approved'";
                                $result=mysqli_query($con,$sql);
                                while ($row=mysqli_fetch_array($result)) {
                                    echo "<tr>";
                                    echo "<td>".$row['id']."</td>";
                                    echo "<td>".$row['name']."</td>";
                                    echo "<td>".$row['Phone']."</td>";
                                    echo "<td>".$row['address']."</td>";
                                    echo "<td>".$row['city']."</td>";
                                    echo "<td>".$row['state']."</td>";
                                    echo "<td>".$row['zip']."</td>";
                                    echo "<td>".$row['h_address']."</td>";
                                    echo "<td>".$row['h_name']."</td>";
                                    echo "<td>".$row['rent']."</td>";                                    
                                    echo "<td>".$row['amount']."</td>"; 
                                    echo "<td>".$row['month']."</td>"; 
                                    
                                    //echo "<td><a href='assign_home.php?id=".$row['id']."'"."><button class='btn btn-danger'><span class='glyphicon glyphicon-eye-open'></span> Assign Home</button></td>";

                                    echo  "</tr>";


                                }



                                 ?>




                            </tbody>
                            <tfoot>
                                <tr class="text-center">
                                    <td> </td>
                                </tr>

                            </tfoot>
                        </table>
                    </div>
                </div>
                
                
                
                
                
            </div>
            
            
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
            window.location.assign("updatePayment.php")
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






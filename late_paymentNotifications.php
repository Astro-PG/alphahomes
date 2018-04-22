<html !DOCTYPE>
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
                                  <li><a href="#">Default Payment Notifications <span class="badge">5</span></a></li>          
                                </ul>
                            </li>               
                          <li><a href="#"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
                        </ul>
                      </div>
                    </nav> 
            <!--Beginning of modal-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center">
                       
                                           <fieldset >
                        <legend class="text-center"> <strong>ALL CLIENTS WHO HAVE NOT MADE PAYMENTS FOR THE CURRENT MONTH</strong></legend>
                        <table id="example" class="table table-striped table-bordered" style="width:100%">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Full Name</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>City</th>
                                    <th>State</th>
                                    <th>Zip</th>
                                    <th>Action</th>


                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                include('connect.php');
                                $sql="SELECT * FROM multi_form_data INNER JOIN received_payments on multi_form_data.id=received_payments.client_id 
WHERE client_id not in (SELECT client_id FROM received_payments WHERE   month(month_payed)=(MONTH(CURRENT_DATE()))) GROUP BY id";
                                //$sql="SELECT * FROM multi_form_data INNER JOIN received_payments on multi_form_data.id=received_payments.client_id WHERE month(month_payed)!=(MONTH(CURRENT_DATE()))";
                                //$sql="SELECT * FROM multi_form_data t1 LEFT JOIN homes t2 ON t2.client_id = t1.id WHERE t2.client_id IS NULL AND t1.status='Approved'";
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
                                    echo "<td><a href='contract_details.php?id=".$row['id']."'"."><button class='btn btn-danger'><span class='glyphicon glyphicon-eye-open'></span> View Account Status</button></td>";

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
    <h5 class="text-center">&copy 2018 Home Management.All Clients Who Have Not Made Payment For the Current Month.</h5>
                    </fieldset>
                        
                        
                        
                        
                        
               </div>
                </div>
                <div class="row">
                    
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







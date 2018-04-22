

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
                                  <li><a href="#">Maintenance Requests</a></li>          
                                </ul>
                            </li>               
                          <li><a href="#"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
                        </ul>
                      </div>
                    </nav> 
            <p></p>
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 text-center">Contract Details For CLIENT ID:<strong><span class="glyphicon glyphicon-user"></span> <?php echo $_GET['id']; ?></strong> </div>
                </div>
                  <?php 
                include('connect.php');
               
                //declare vaiables Here 
                $clientname='';
                $clientPhone='';
                $clientaddress='';
                $clientcity='';
                $clientstate='';
                $clientzip='';
                $clientstatus='';
                $homeaddress='';
                $homename='';
                $homerent=0;
                $homedescription='';
                
                $p_id=$_GET['id'];
                $sql="SELECT * FROM multi_form_data t1 INNER JOIN homes t2 on t2.client_id=t1.id WHERE t2.client_id='$p_id'";
                
                $result=mysqli_query($con,$sql);
                
                if ($columns= mysqli_fetch_array($result)){                  
                    $clientname=$columns['name'];
                    $clientPhone=$columns['Phone'];
                    $clientaddress=$columns['address'];
                    $clientcity=$columns['city'];
                    $clientstate=$columns['state'];
                    $clientzip=$columns['zip'];
                    $clientstatus=$columns['status'];               
                    $homeaddress=$columns['h_address'];
                    $homename=$columns['h_name'];
                    $$homerent=$columns['rent'];
                    $homedescription=$columns['description'];
                    
                    
                    

                }
                ?>
                <fieldset>
                    <legend>CLIENT PERSONAL DETAILS</legend>
               
                <div class="row">
                    <div class="col-sm-3">
                        NAME:<strong><?php echo $clientname; ?></strong>
                        
                    </div>
                    <div class="col-sm-3">
                        Phone:<strong><?php echo $clientPhone; ?></strong>
                    </div>
                    <div class="col-sm-3">
                        Address:<strong><?php echo $clientaddress; ?></strong>
                    </div>
                    <div class="col-sm-3">
                        City:<strong><?php echo $clientcity; ?></strong>
                    </div>
                    
                </div>
                    <hr/>
                    
                    
                      <div class="row">
                    <div class="col-sm-4">
                        STATE:<strong><?php echo $clientstate; ?></strong>
                        
                    </div>
                    <div class="col-sm-4">
                        ZIP:<strong><?php echo $clientzip; ?></strong>
                    </div>
                    <div class="col-sm-4 text-success">
                        STATUS:<strong><span class="glyphicon glyphicon-ok"></span><?php echo $clientstatus; ?></strong>
                    </div>                   
                    
                </div>
                    
                    
                </fieldset>
                <fieldset>
                    <legend>HOME CLIENT OCCUPIES DETAILS</legend>
                    <div class="row">
                        <div class="col-sm-3">
                            HOME ADDRESS:<strong><?php echo $homeaddress; ?></strong>
                        </div>
                        <div class="col-sm-3">
                            HOME NAME:<strong><?php echo $homename; ?></strong>
                        </div>
                        <div class="col-sm-3">
                            RENTAL CHARGES:<strong><?php echo $homerent; ?></strong>
                        </div>
                        <div class="col-sm-3">
                            HOME DESCRIPTION:<strong><?php echo $homedescription; ?></strong>
                        </div>
                    </div>
                </fieldset>
                <hr/>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="row"><div class="col-sm-12"><strong>Financial Transactions</strong></div></div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example" class="table table-striped table-bordered"  style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Amount</th>
                                        <th>Month</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    include('connect.php');
                                    $sql="SELECT sum(amount_payed) AS 'total_amount',month(month_payed) AS 'month' from multi_form_data INNER JOIN received_payments ON multi_form_data.id=received_payments.client_id WHERE id=$p_id  GROUP BY month(month_payed)";
                                    //$sql="SELECT * FROM multi_form_data INNER JOIN received_payments on multi_form_data.id=received_payments.client_id WHERE month(month_payed)!=(MONTH(CURRENT_DATE()))";
                                    //$sql="SELECT * FROM multi_form_data t1 LEFT JOIN homes t2 ON t2.client_id = t1.id WHERE t2.client_id IS NULL AND t1.status='Approved'";
                                    $result=mysqli_query($con,$sql);
                                    while ($row=mysqli_fetch_array($result)) {
                                        echo "<tr>";                                       
                                        echo "<td>".$row['month']."</td>"; 
                                         echo "<td>".$row['total_amount']."</td>";
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
                            </div>
                            
                        </div>                         
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
        
</body>
</html>






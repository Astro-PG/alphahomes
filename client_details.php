<?php 
    include("connect.php");

    if(isset($_POST['id'])){
        
        $id = $_POST['id'];

        $sql = "UPDATE multi_form_data SET status = 'Approved' WHERE `id` = $id";
       
       if ($con->query($sql) === TRUE) {
           echo "<script type='text/javascript'>alert('UPDATED SUCCESSFULLY!')</script>";
           header("location:track.php");
       } else {
           echo "Error: " . $sql . "<br>" . $con->error;
       }

   }
   
   if(isset($_GET['id'])){
       
     $id = $_GET['id'];
    
     $finalArray = array();
                  
      $query = mysqli_query($con, "SELECT * FROM `multi_form_data` WHERE `id` = $id  ") or die(mysqli_error($con));
      if ($query) {
        $rows = mysqli_num_rows($query);
         $count = 0;
        if ($rows > 0) {
           while ($row = mysqli_fetch_array($query)) {
               $dataArray = $row;
              
               /*$dataArray['id'] = $row['id'];
               $dataArray['name'] = $row['name'];
               $dataArray['Phone'] = $row['Phone'];
               $dataArray['address'] = $row['address'];
               $dataArray['city'] = $row['city'];
               $dataArray['state'] = $row['state'];
               $dataArray['status'] = $row['status'];
               $dataArray['zip'] = $row['zip'];  */            
               
        }
        }
    }
   }
   
?>


<html>
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
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12" align="center">Details for :<strong style="align:center"><span class="glyphicon glyphicon-user"></span>  <?php echo $dataArray['p_fname'].' '.$dataArray['p_lname'] ;?></strong></div>
                </div>
                <hr/>
                
                
                <!--These are the details for a single employee-->
                <div class="container">
                    <fieldset>
                        <legend><h4>Prequel</h4></legend>
                    <div class="row">
                        <div class="col-sm-3" align="center"><strong>Full Name:</strong><?php echo $dataArray['p_fname'].' '.$dataArray['p_lname'] ; ?></div>
                        <div class="col-sm-3" align="center"><strong>First Question:</strong><?php echo $dataArray['p_question1'];?></div>
                        <div class="col-sm-3" align="center"><strong>Second Question:</strong><?php echo $dataArray['p_question2'];?></div>
                        <div class="col-sm-3" align="center"><strong>Third Question:</strong><?php echo $dataArray['p_question3'];?></div>
                    </div>                        
                    </fieldset>
                    <fieldset>
                        <legend><h4>Personal Details</h4></legend>
                    <div class="row">
                        <div class="col-sm-3" align="center"><strong>Name:</strong><?php echo $dataArray['name']; ?></div>
                        <div class="col-sm-3" align="center"><strong>Phone:</strong><?php echo $dataArray['Phone'];?></div>
                        <div class="col-sm-3" align="center"><strong>Address:</strong><?php echo $dataArray['address'];?></div>
                        <div class="col-sm-3" align="center"><strong>City:</strong><?php echo $dataArray['city'];?></div>
                    </div>
                        <hr/>
                        <div class="row">
                        <div class="col-sm-3" align="center"><strong>State:</strong><?php echo $dataArray['state'];?></div>
                        <div class="col-sm-3" align="center"><strong>Zip:</strong><?php echo $dataArray['zip'];?></div>
                        <div class="col-sm-3" align="center"><strong>Type:</strong><?php echo $dataArray['own'];?></div>
                        <div class="col-sm-3" align="center"><strong>Period:</strong><?php echo $dataArray['hlong'];?></div>
                    </div>
                    </fieldset>                    
                    
                    <fieldset>
                        <legend><h4>Residential Lease Agreement</h4></legend>
                    <div class="row">
                        <div class="col-sm-12" align="center"><strong>Status:</strong><span class="glyphicon glyphicon-ok" style="color:green"></span> <?php echo 'Verified'?></div>              
                    </div>                       
                    </fieldset>
                    
                    <fieldset>
                        <legend><h4>Residential Inspection</h4></legend>                       
                    <div class="row">                        
                        <div class="col-sm-6">1:Unit must be completely free of trash and all dust including closets, baseboards and cabinets. <button class="btn btn-success"><span class="glyphicon glyphicon-ok"></span><?php echo $dataArray['ri1'];?></button></div> 
                        <div class="col-sm-6">2:All window coverings must be straightened, washed, cleaned and dusted or replaced. <button class="btn btn-success"><span class="glyphicon glyphicon-ok"></span><?php echo $dataArray['ri2'];?></button><</div>  
                    </div> 
                        <div class="row">                        
                        <div class="col-sm-6">3:UAll bathrooms and kitchens must be thoroughly caulked and cleaned including behind commode. <button class="btn btn-success"><span class="glyphicon glyphicon-ok"></span><?php echo $dataArray['ri3'];?></button></div> 
                        <div class="col-sm-6">4:Fireplaces must be cleaned out and dust free. <button class="btn btn-success"><span class="glyphicon glyphicon-ok"></span><?php echo $dataArray['ri4'];?></button></div>   
                    </div> 
                        <div class="row">
                        <div class="col-sm-6">5: Patios, balconies and storage closets must be swept and free from debris and trash. <button class="btn btn-success"><span class="glyphicon glyphicon-ok"></span><?php echo $dataArray['ri5'];?></button></div> 
                        <div class="col-sm-6">6:All doorstoppers must work and any damages from previous problems corrected. Install if missing. <button class="btn btn-success"><span class="glyphicon glyphicon-ok"></span><?php echo $dataArray['ri6'];?></button></div>           
                    </div> 
                        <div class="row">
                        <div class="col-sm-6">7: Appliances must be thoroughly cleaned, washed, and sanitized, including drip pans and knobs. <button class="btn btn-success"><span class="glyphicon glyphicon-ok"></span><?php echo $dataArray['ri7'];?></button></div> 
                        <div class="col-sm-6">8:Light and plug switches must be replaced if cracked or stained. <button class="btn btn-success"><span class="glyphicon glyphicon-ok"></span><?php echo $dataArray['ri8'];?></button></div>                
                    </div> 
                        <div class="row">
                        <div class="col-sm-6">9: At least 75-watt bulbs in all fixtures in working order. <button class="btn btn-success"><span class="glyphicon glyphicon-ok"></span><?php echo $dataArray['ri9'];?></button></div> 
                        <div class="col-sm-6">10: Bath lights at 60 watts and all the same style bulb in place.<button class="btn btn-success"><span class="glyphicon glyphicon-ok"></span><?php echo $dataArray['ri10'];?></button></div>               
                    </div> 
                        
                    </fieldset>
                    <hr/>
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12" align="center"><form method="POST" action="client_details.php?id=<?php echo $id?>"><button class="ui btn button btn-success " type="submit" name="id" value="<?php echo $id;?>"><i class="icon repeat"></i>Approve</button> </form></div>
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






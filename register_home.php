<html !DOCTYPE>
<?php
error_reporting(E_ALL);

include("connect.php");

//This is the code to register a home.
?>
<head>
    <title>Administrator|Home Management</title>
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
     
    
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="css/accounts.css">
</head>
<body>

      <?php
      $response='';
      $error='';
      $valueset='';
      $myerror='';
      
      //let us handle   image upload here.
     
      //Check if the values are set 
       if( isset($_POST['haddress']) && isset($_POST['hname']) && isset($_POST['hrental']) && isset($_POST['hdescription'])){
            
            //set the values from the html form to php variables.
          
          $haddress=$_POST['haddress'];
          $homename=$_POST['hname'];         
          $rentalfee=$_POST['hrental'];
          $description=$_POST['hdescription'];
          
          //deal with file upload.
           $upload_image=$_FILES["hprofile"]["name"];
           $folder="files/";
           
           move_uploaded_file($_FILES["hprofile"]["tmp_name"], "$folder".$_FILES["hprofile"]["name"]);
          
        

          //Insert the values from php variables
          $sql="INSERT INTO homes(h_address,h_name,rent,description,profile_name) VALUES('$haddress','$homename','$rentalfee','$description','$upload_image')";
          if(mysqli_query($con,$sql)){
           $response="Home Registered Successfully";
           header('Refresh: 5; URL=admin_account.php');
              }
          else{
            $myerror="There was an error registering the home.Try Again Later";
            $error=mysqli_connect_error();
          }


          



       }
       else{
        $valueset= "Set Values";
       }
       
        
     
      
        
        ?>

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
        <!--This is the content Page--> 
        <div class="content">           
                     <nav class="navbar navbar-dafault" id="custom-nav">
                      <div class="container">    
                        <ul class="nav navbar-nav navbar-right">
                          <li class="active"><a href="admin_account.php"><span class="glyphicon glyphicon-home" style="color:green"></span> Home</a></li>                     
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
                    <div class="col-sm-12"><h3 align="center">New Home Registration Form</h3></div>
                </div>
                
                <form method="post" enctype="multipart/form-data" action="register_home.php">
                <div class="row">
                    <div class="col-sm-12 col-md-12 col-lg-12 text-center">
                    <div class="card" style="width: 80rem">
                    <h5 class="card-title"><span class="glyphicon glyphicon-home"></span> New Home Registration</h5>
                   <p class="card-text">
                    <form method="post" class="homeform" action="saveHome.php">
                        <div class="row">                           
                            <div class="col-sm-6">
                                 <div class="form-group">
                                    <label for="homeaddress">Home Address</label>
                                    <input class="form-control" id="homeaddress" name="haddress" placeholder="Address">
                                </div>
                            </div> 
                            
                             <div class="col-sm-6"> 
                                <div class="form-group">
                                    <label for="homename">Home Name</label>
                                    <input class="form-control" id="homename" name="hname" placeholder="Address">
                                </div>
                             </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="charges">Monthly Charges</label>
                                    <input class="form-control" id="charges" name="hrental" placeholder=" Rental Fees e.g $500">
                                </div>                      
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label for="picture">Upload Picture</label>
                                    <input class="form-control" type="file" id="picture" name="hprofile" >
                                </div>                      
                            </div>
                        </div> 
                        <div class="row">
                            <div class="col-sm-12">
                                 <div class="form-group">
                                    <label for="description">Description</label>
                                    <textarea class="form-control" id="description" name="hdescription" placeholder=" Rental Fees e.g $500">
                                    </textarea>
                                </div>
                            </div>
                        </div>
                        
                         <div class="row">
                            <div class="col-sm-12">
                                <button class="btn btn-success"  type="submit">Register Home</button>
                                
                            </div>
                        </div>
                        <p style="color:green"><?php echo $response;?></p>
                        <p style="color:red"><?php echo $myerror. $error;?></p>
                        <p style="color:red"><?php echo $valueset;?></p>
                       
                       
                        
                    </form>
                    </p>            
                </div>
                        
                        
                        
                        
                        
                        
                        
                    </div>
                        </div>            
                    
                    </form>
            </div>
            
            
           
                   
                        
         

    <!-- jQuery CDN -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap Js CDN -->
    <script src="js/bootstrap.min.js"></script>    
    <script src="js/semantic.min.js"></script>
       
</body>
</html>






<html !DOCTYPE>
<?php
error_reporting(E_ALL);

include("connect.php");
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
       
        $finalArray = array();
          
        if(isset($_POST['id'])){
             $id = $_POST['id'];
             $action = substr($id,0, 1);
             $id = substr($id,1,  sizeof($id));
            if($action == 'r'){
               $sql = "UPDATE multi_form_data SET status = 'Not Approved' WHERE `id` = $id";
            }else{
                $sql = "UPDATE multi_form_data SET status = 'Approved' WHERE `id` = $id";
            }
            if ($con->query($sql) === TRUE) {
                echo "<script type='text/javascript'>alert('UPDATED SUCCESSFULLY!')</script>";
            } else {
                echo "Error: " . $sql . "<br>" . $con->error;
            }
            
        }
        
      $query = mysqli_query($con, "SELECT * FROM `multi_form_data` WHERE `status` = 'Approved'  ") or die(mysqli_error($con));
      if ($query) {
        $rows = mysqli_num_rows($query);
         $count = 0;
        if ($rows > 0) {
           while ($row = mysqli_fetch_array($query)) {
               $dataArray = array();
              
               $dataArray['id'] = $row['id'];
               $dataArray['name'] = $row['name'];
               $dataArray['Phone'] = $row['Phone'];
               $dataArray['address'] = $row['address'];
               $dataArray['city'] = $row['city'];
               $dataArray['state'] = $row['state'];
               $dataArray['status'] = $row['status'];
               $dataArray['zip'] = $row['zip'];              
               $finalArray[$count] = $dataArray;
               $count++;
               
        }
        }
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
            <p><h3 align="center">Clients Who Have Been Approved</h3></p> 
             <table class="ui compact celled  table " >
                        <thead class="full-width">
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Phone</th>
                                <th>Address</th>
                                <th>City</th>
                                <th>State</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                          foreach ($finalArray as $data) { ?>
                            
                            <tr class="">
                                 <td><?php echo $data['id'];?></td>
                                <td><?php echo $data['name'];?></td>
                                  <td><?php echo $data['Phone'];?></td>
                                  <td><?php echo $data['address'];?></td>
                                  <td><?php echo $data['city'];?></td>
                                   <td><?php echo $data['state'];?></td>
                                   <td><span class="glyphicon glyphicon-ok-sign"  style="color:green"></span><?php echo $data['status'];?></td>                                   
                            </tr>
                          <?php } ?>
                        </tbody>
                    </table>
             
        <div>
    
        
    
    </div>

    <!-- jQuery CDN -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap Js CDN -->
    <script src="js/bootstrap.min.js"></script>    
    <script src="js/semantic.min.js"></script>
       
</body>
</html>






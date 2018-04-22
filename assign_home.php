<?php
include('connect.php');
$clientdetails=array(8);
$passedid=$_GET['id'];
//if(isset($_POST['retrieve'])){ 
//get results of the client
  if($query=mysqli_query($con,"SELECT * FROM multi_form_data WHERE id='$passedid'")){
      //check number of rows fiirst
      if(mysqli_num_rows($query)==1){         
          //let us fetch details based on SSN
          if($row=mysqli_fetch_array($query)){
            $clientdetails[0]=$row['name'];
            $clientdetails[1]=$row['Phone'];
            $clientdetails[2]=$row['address'];
            $clientdetails[3]=$row['city'];
            $clientdetails[4]=$row['state'];
            $clientdetails[5]=$row['zip'];
          }
      }    

  }
  else{
     echo '<script language="javascript">';
          echo 'alert("There was an error in your query")';
          echo '</script>';
  }
  

/*}
else{

}*/



//This is the php code to get the homes which are not occupied.
$homequery=mysqli_query($con,"SELECT h_address FROM homes WHERE client_id is NULL");
    
?>



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
                          <li class="active"><a href="#">Home</a></li>                     
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
                   <div class="col-xs-12 col-sm-12 text-center">
                       <h4 class="text-primary">Assign Approved Client a Home</h4>
                   </div>
               </div>
               <hr/>
               
              <div class="row">
                  
               </div>
               <div class="row">
                   <div class="col-xs-12 col-sm-12 col-lg-12">
                       <fieldset>
                           <legend>Client Personal Information</legend>
                       <div class="row">
                           <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">SSN:<strong>3947</strong></div>
                           <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">FULL NAME:<strong><?php echo $clientdetails[0];?></strong></div>
                           <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">PHONE:<strong><?php echo $clientdetails[1];?></strong></div>
                       </div>
                           <hr/>
                       <div class="row">
                           <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">ADDRESS:<strong><?php echo $clientdetails[2];?></strong></div>
                           <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">CITY:<strong><?php echo $clientdetails[3];?></strong></div>
                           <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">STATE:<strong><?php echo $clientdetails[4];?></strong></div>
                           <div class="col-xs-12 col-sm-12 col-md-4 col-lg-3">ZIP:<strong><?php echo $clientdetails[5];?></strong></div>
                       </div>
                       </fieldset>
                       
                   
                   </div>
               </div>
               <hr/>
               <fieldset>
                   <form method="post" action="sign_contract.php">
                   <legend>Home Details</legend>
                   <div class="row">
                       <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                          
                               <div class="form-group">                                 
                                  <select class="form-control" id="homeaddress" >
                                    <option>Select Home Address</option>                                   
                                     <?php while($data = mysqli_fetch_array($homequery)){
                                      $displayData = $data['h_address'];
                                       ?>
                                    <option value="<?php echo $displayData;?>" ><?php echo $displayData; ?></option>

                                       <?php } ?>                            
                                  </select>
                                </div>
                               
                          
                       </div> 
                       <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                           <select class="form-control" id="homename" disabled>                            
                                  <option value='1'>Select Name</option>
                            </select>


                               <!--<div class="input-group">
                                  <span class="input-group-addon"><i class="glyphicon glyphicon-home"></i></span>
                                  <input type="text" id="homename" class="form-control" aria-label="Amount (to the nearest dollar)" disabled>
                                 </div>-->
                       </div> 
                       
                          <div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                            <select class="form-control" id="price" disabled>                            
                                  <option value='1'>Select Price</option>
                            </select>
                          
                               <!--<div class="input-group">
                                  <span class="input-group-addon">$</span>
                                  <input type="text" class="form-control" aria-label="Amount (to the nearest dollar)" disabled>
                                  <span class="input-group-addon" >.00</span>
                                </div>-->
                               
                           
                       </div> 
                   </div>
                 
                </fieldset>
               <hr/>
               <div class="row">
                   <div class="col-xs-4 col-xs-offset-4">
                       <button class="btn btn-success" id="assign">Assign Home</button>
                   </div>               
               </div>
               </form>
                   <p id="response" class="text-center" style="color: goldenrod"></p>
           </div>
        </div>
        
            
        
            
                    <div>
    

        
    
    </div>
    </div>


    <!-- jQuery CDN -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap Js CDN -->
    <script src="js/bootstrap.min.js"></script>
    <script type="text/javascript">
      
      $('#homeaddress').on('change', function(){
        var mainselection = this.value; // get the selection value
        $.ajax({
          type: "POST",  // method of sending data
          url: "home_details.php", // name of PHP script
          data:'selection='+mainselection, // parameter name and value
          success: function(result){ // deal with the results
            $("#homename").html(result);
            
                        }
          });
        });
    </script>

    <script type="text/javascript">
      //This isi the second javascript to give us the price.
      $('#homeaddress').on('change', function(){
        var mainselection = this.value; // get the selection value
        $.ajax({
          type: "POST",  // method of sending data
          url: "home_details.php", // name of PHP script
          data:'address='+mainselection, // parameter name and value
          success: function(result){ // deal with the results            
             $("#price").html(result); // insert in div above
            }
          });
        });   



    </script>
    <script>
        $("#assign").click(function(e){
            e.preventDefault();
            var address=$("#homeaddress").val();
            
            function query_string(variable)
                    {
                       var query = window.location.search.substring(1);
                       var vars = query.split("&");
                       for (var i=0;i<vars.length;i++) {
                               var pair = vars[i].split("=");
                               if(pair[0] == variable){return pair[1];}
                       }
                       return(false);
                    }
            var id=query_string("id");   
             $.ajax({
            type: "POST",  // method of sending data
            url: "assignhome.php", // name of PHP script
            data:'address='+address + "&id="+id,// parameter name and value
            success: function(result){ // deal with the results            
               $("#response").html(result); // insert in div above
              }
            });
            
        });
    
    
    
    </script>
    
    
       
        
</body>
</html>






<!DOCTYPE html>

<?php
error_reporting(E_ALL);

include("connect.php");
?>
<html lang="en">
<head>
  <title>Rental Application Form</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/semantic.min.css">
  <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.1.8/components/icon.min.css'>

   
</head>
<body>
     <?php
       
        $finalArray = array();
          
        
        
      $query = mysqli_query($con, "SELECT * FROM `multi_form_data` WHERE `status` = 'Not Approved'  ") or die(mysqli_error($con));
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

    <div class="ui container">
            <div class="ui menu top fixed">
            <div class="header item">
                Rental Application 
              </div>
              <a class="item active" href="index">
                Track Legal Files
              </a>
             <div class="right menu">
             <div class=" item">
              <div class="ui icon input">
                <input placeholder="Search..." type="text">
                <i class="search icon"></i>
              </div>
            </div>
                 <a class="item " href="admin_account.php">
                Home
              </a>
              <div class="ui dropdown item">
                Notifications <i class="dropdown icon"></i>
                <div class="menu">
                    <a class="item" href="track.php">Track of legal files</a>
                  <a class="item">Maintenance Requests</a>
                </div>
              </div>
              <a class="item ">
                Logout
              </a>
            
             </div>
          </div>
       
        <div class="ui grid"  style="margin-top: 30px;">
        <div class="column sixteen wide">
                 <h5 class="ui   header">
                    <div class="content">
                      ALL USERS NOT APPROVED
                    </div>
              </h5>
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
                                <th>Approve</th>
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
                                   <td><?php echo $data['status'];?></td>
                                   <?php  if($data['status'] == "Not Approved"){?>
                                   <td ><form method="POST" action="track.php"><a class="ui button blue compact" type="submit" name="id" href="client_details.php?id=<?php echo $data['id'];?>"><i class="icon check"></i> View Details</a> </form></td>
                                   <?php }else{?>
                                    <td ><form method="POST" action="track.php"><button class="ui button red compact" type="submit" name="id" value="<?php echo 'r'.$data['id'];?>"><i class="icon repeat"></i> Reverse</button> </form></td>
                                   <?php } ?>
                            </tr>
                          <?php } ?>
                        </tbody>
                    </table>
            </div>
    </div>
    </div>
    
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/semantic.min.js"></script>
<script>
    $(function (){
        
        $('.dropdown').dropdown();
        $('.tabular.menu .item').tab();
       
        $(".btn_tab1").on("click",function(){
            $("#prequelTab").removeClass("active");
            $("#applyTab").addClass("active");
            $.tab('change tab', "applyTab");
        });
         $(".btn_tab2").on("click",function(){
            $("#applyTab").removeClass("active");
            $("#backgroundTab").addClass("active");
            $.tab('change tab', "backgroundTab");
        });
         $(".btn3").on("click",function(){
            $("#backgroundTab").removeClass("active");
            $("#residentialTab").addClass("active");
            $.tab('change tab', "residentialTab");
        });
         $(".btn4").on("click",function(){
            $("#residentialTab").removeClass("active");
            $("#rentalTab").addClass("active");
            $.tab('change tab', "rentalTab");
        });
        
    });
   
</script>
</body>
</html>
    

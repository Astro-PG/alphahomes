<!DOCTYPE html>

<?php
error_reporting(E_ALL);

include("connect.php");
?>
<html lang="en">
<head>
  <title>Application|Home Management</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/semantic.min.css">
  <link rel='stylesheet prefetch' href='css/icon.min.css'>

   <link rel="stylesheet" href="style.css">

        <style type="text/css">
            body {
                margin-top:30px;
            }
             
            .btn-circle {
                width: 30px;
                height: 30px;
                text-align: center;
                padding: 6px 0;
                font-size: 12px;
                line-height: 1.428571429;
                border-radius: 15px;
            }
            .iconColor
            {
                color:#red;
            }
        </style>
</head>
<body>
     <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $firstname = $_POST["p_fname"];
            $lastname = $_POST["p_lname"];
            $question1 = $_POST["p_question1"];
            $question2 = $_POST["p_question2"];
            $question3 = $_POST["p_question3"];



            $name = $_POST["name"];
            $Phone = $_POST["Phone"];
            $address = $_POST["address"];
            $city = $_POST["city"];
            $state = $_POST["state"];
            $zip = $_POST["zip"];
            $own = $_POST["own"];
            $rent = $_POST["rent"];
            $monthly = $_POST["month"];
            $hlong = $_POST["hlong"];

            $rdaf1 = $_POST["rdaf1"];
            $rdaf2 = $_POST["rdaf2"];
            $rdaf3 = $_POST["rdaf3"];
            $rdaf4 = $_POST["rdaf4"];
            $rdaf5 = $_POST["rdaf5"];

            $ri1 = $_POST["ri1"];
            $ri2 = $_POST["ri2"];
            $ri3 = $_POST["ri3"];
            $ri4 = $_POST["ri4"];
            $ri5 = $_POST["ri5"];
            $ri6 = $_POST["ri6"];
            $ri7 = $_POST["ri7"];
            $ri8 = $_POST["ri8"];
            $ri9 = $_POST["ri9"];
            $ri10 = $_POST["ri10"];

            $sql = "INSERT INTO multi_form_data(
                                                p_fname,
                                                p_lname,
                                                p_question1,
                                                p_question2,
                                                p_question3,
                                                name,
                                                Phone,
                                                address,
                                                city,
                                                state,
                                                zip,
                                                own,
                                                rent,
                                                month,
                                                hlong,
                                                rdaf1,
                                                rdaf2,
                                                rdaf3,
                                                rdaf4,
                                                rdaf5,
                                                ri1,
                                                ri2,
                                                ri3,
                                                ri4,
                                                ri5,
                                                ri6,
                                                ri7,
                                                ri8,
                                                ri9,
                                                ri10)

                                                VALUES ('$firstname', 
                                                '$lastname',
                                                '$question1', 
                                                '$question2', 
                                                '$question3',
                                                '$name',
                                                '$Phone',
                                                '$address',
                                                '$city',
                                                '$state',
                                                '$zip',
                                                '$own',
                                                '$own',
                                                '$rent',
                                                '$monthly',
                                                '$hlong'
                                                '$rdaf1',
                                                '$rdaf2',
                                                '$rdaf3',
                                                '$rdaf4',
                                                '$rdaf5',
                                                '$ri1',
                                                '$ri2',
                                                '$ri3',
                                                '$ri4',
                                                '$ri5',
                                                '$ri6',
                                                '$ri7',
                                                '$ri8',
                                                '$ri9',
                                                '$ri10')";


            if ($con->query($sql) === TRUE) {
                echo "<script type='text/javascript'>alert('Form submitted successfully!')</script>";
            } else {
                echo "Error: " . $sql . "<br>" . $con->error;
            }

            exit();
        }
        ?>

    <div class="ui container">
        <div class="ui menu top fixed">
            <div class="header item">
                Home Management
              </div>
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
                To Do <i class="dropdown icon"></i>
                <div class="menu">
                    <a class="item" href="steps.php">New Application</a>
                    <a class="item">Request a maintenance</a>
                </div>
              </div>
              <a class="item ">
                Logout
              </a>
            
             </div>
          </div>
       
        <div class="ui grid"  style="margin-top: 30px;">
            <div class="column four wide">
                <div class="ui vertical  menu ">
                 <a class="item ">
                   Download
                 </a>
                 <a class="item active">
                   Application
                 </a>
                 <a class="item">
                   Status
                 </a>
                 <a class="item ">
                   Repost Issue
                 </a>
                 <a class="item">
                   Settings
                 </a>
                 <a class="item">
                   Help
                 </a>
               </div>
            </div>
            <div class="column twelve wide">
                
            <div class="ui top attached  tabular menu ">
                <a class="active item" data-tab="prequelTab" id="prequelTab" >
                  Prequel
                </a>
                <a class="item " data-tab="applyTab" id="applyTab" >
                  Apply
                </a>
                <a class="item"data-tab="backgroundTab" id="backgroundTab" >
                  Background Check
                </a>
                <a class="item" data-tab="residentialTab" id="residentialTab">
                  Residential Lease Agreement
                </a>
                <a class="item" data-tab="rentalTab" id="rentalTab">
                  Rental Inspection
                </a>
              </div>
                <form role="form" action="" method="post"> 
               <div class="ui bottom attached tab segment active" data-tab="prequelTab">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">First Name</label>
                            <input  maxlength="100" type="text" id = "p_fname" name = "p_fname"  class="form-control" placeholder="Enter First Name"  />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Last Name</label>
                            <input maxlength="100" type="text" id= "p_lname" name= "p_lname"  class="form-control" placeholder="Enter Last Name" />
                        </div>
                        <div class="form-group">
                            <label class="control-label">Question 1</label>
                            <textarea  class="form-control" id= "p_question1" name= "p_question1" placeholder="Enter your question 1" ></textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Question 2</label>
                            <textarea  class="form-control" id= "p_question2" name= "p_question2" placeholder="Enter your question 2" ></textarea>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Question 3</label>
                            <textarea  class="form-control" id= "p_question3" name= "p_question3" placeholder="Enter your question 3" ></textarea>
                        </div>
                        <button class="btn ui button btn-primary nextBtn btn_tab1 btn-lg pull-right primary" type="button" >Submit</button>
                    </div>
               </div>
               <div class="ui bottom attached tab segment" data-tab="applyTab">
                    <div class="col-md-12">
                            <h4>Applicant Details:</h4>
                            <div class="form-group">
                                <label class="control-label">Name</label>
                                <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" >
                            </div>
                            <div class="form-group">
                                <label class="control-label">Phone</label>
                                <input type="text" class="form-control" id="Phone" placeholder="Enter phone" name="Phone" >
                            </div>
                            <div class="form-group">
                                <label class="control-label">Address</label>
                                <input type="text" class="form-control" id="address" placeholder="Enter address" name="address" >
                            </div>
                            <div class="form-group">
                                <label class="control-label">City</label>
                                <input type="text" class="form-control" id="city" placeholder="Enter city" name="city" >

                            </div>
                            <div class="form-group">
                                <label class="control-label">State</label>
                                <input type="text" class="form-control" id="state" placeholder="Enter state" name="state" >
                            </div>
                            <div class="form-group">
                                <label class="control-label">Zip Code</label>
                                <input type="text" class="form-control" id="zip" placeholder="Enter zip" name="zip" > 
                            </div>
                            <label align="left"><input type="checkbox" name="own" id="own">&nbsp;&nbsp;Own</label><br>
                            <label align="left"><input type="checkbox" name="month" id="month">&nbsp;&nbsp;Monthly Payment</label><br>	
                            <label align="left"><input type="checkbox" name="rent" id="rent">&nbsp;&nbsp;Rent</label><br><br>
                            <div class="form-group">
                                <label class="control-label">How Long</label>
                                <input type="text" class="form-control" id="hlong" placeholder="Enter time period" name="hlong" >
                            </div>


                            <button class="btn ui button nextBtn btn-lg pull-right btn_tab2 primary" type="button" >Submit</button>
                        </div>
               </div> 
              <div class="ui bottom attached tab segment " data-tab="backgroundTab">
                   <div class="col-md-12">
                        <h3>Background Check</h3>
                        <label>Credit Card History:</label><label>&nbsp;&nbsp;&nbsp;&nbsp;Status &nbsp;&nbsp;Verified</label>&nbsp;<span class="glyphicon glyphicon-ok iconColor"></span>
                        <br><button class="ui btn compact button nextBtn btn3 btn-lg pull-right primary" type="button" >Submit</button>
                    </div>
               </div>
               <div class="ui bottom attached tab segment" data-tab="residentialTab">
                   <div class="col-md-12">
                            <label>THIS AGREEMENT (here in after reffered to as "Aggreement") is made and entered into this <input maxlength="100" type="text" id= "rdaf1" name="rdaf1"  class="form-control"  />
                                day of <input maxlength="100" type="text" id= "rdaf2" name="rdaf2"  class="form-control"  />, 20 <input maxlength="100" type="text" id= "rdaf3" name="rdaf3"  class="form-control"  />,
                                by and between <input maxlength="100" type="text" id= "rdaf4" name="rdaf4"  class="form-control"  /> (here in after reffered to as "Landlord") and <input maxlength="100" type="text" id="rdaf5" name= "rdaf5"  class="form-control"  />
                                (here in after reffered to as "Tenant.") For and in consideration of the covenants and obligations contained here in and other good and valuable consideration, the reciept and sufficiency of which is 
                                hereby acknowledged, the parties here to hereby agree as follows:<br><br>
                                --Payable in advance on the first (1st) day of each month and is considered late if not paid on the day it is due by mail or at the dropbox, (cashier's check or money order only).</label>
                            <button class="btn ui compact primary btn4 button btn-lg pull-right" type="button" >Submit</button>
                        </div>
               </div> 
               <div class="ui bottom attached tab segment " data-tab="rentalTab">
                    <div class="col-md-12">
                            <h3>Rental Inspection</h3>
                            <label align="left"><input type="checkbox" name="ri1" id="ri1">&nbsp;&nbsp;Unit must be completely free of trash and all dust including closets, baseboards and cabinets.</label><br><br>
                            <label align="left"><input type="checkbox" name="ri2" id="ri2">&nbsp;&nbsp;All window coverings must be straightened, washed, cleaned and dusted or replaced.</label><br><br>
                            <label align="left"><input type="checkbox" name="ri3" id="ri3">&nbsp;&nbsp;All bathrooms and kitchens must be thoroughly caulked and cleaned including behind commode.</label><br><br>
                            <label align="left"><input type="checkbox" name="ri4" id="ri4">&nbsp;&nbsp;Fireplaces must be cleaned out and dust free.</label><br><br>
                            <label align="left"><input type="checkbox" name="ri5" id="ri5">&nbsp;&nbsp;Patios, balconies and storage closets must be swept and free from debris and trash.</label><br><br>
                            <label align="left"><input type="checkbox" name="ri6" id="ri6">&nbsp;&nbsp;All doorstoppers must work and any damages from previous problems corrected. Install if missing. </label><br><br>
                            <label align="left"><input type="checkbox" name="ri7" id="ri7">&nbsp;&nbsp;Appliances must be thoroughly cleaned, washed, and sanitized, including drip pans and knobs.</label><br><br>
                            <label align="left"><input type="checkbox" name="ri8" id="ri8">&nbsp;&nbsp;Light and plug switches must be replaced if cracked or stained.</label><br><br>
                            <label align="left"><input type="checkbox" name="ri9" id="ri9">&nbsp;&nbsp;At least 75-watt bulbs in all fixtures in working order.</label><br><br>
                            <label align="left"><input type="checkbox" name="ri10" id="ri10">&nbsp;&nbsp;Bath lights at 60 watts and all the same style bulb in place.</label><br><br>
                            <button class="btn green button ui btn-lg pull-right" type="submit">Submit</button>
                        </div>
               </div>
                </form>
              
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
    

<?php
session_start();

if(!isset($_SESSION['user_id'])){
header('location:../index.php');	
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>GYMBILOG CLUB</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="../css/bootstrap.min.css" />
<link rel="stylesheet" href="../css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="../css/fullcalendar.css" />
<link rel="stylesheet" href="../css/matrix-style.css" />
<link rel="stylesheet" href="../css/matrix-media.css" />
<link href="../font-awesome/css/fontawesome.css" rel="stylesheet" />
<link href="../font-awesome/css/all.css" rel="stylesheet" />
<link rel="stylesheet" href="../css/jquery.gritter.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
<link rel="shortcut icon" href="../img/gymbilog.png" type="image/x-icon">
</head>
<body>

<div id="header">
  <h1><a href="dashboard.html">GymBilog Admin</a></h1>
</div>

<?php include '../includes/header.php'?>
<?php $page='members-update'; include '../includes/sidebar.php'?>

<?php
include 'dbcon.php';
$id=$_GET['id'];
$qry= "select * from members where user_id='$id'";
$result=mysqli_query($conn,$qry);
while($row=mysqli_fetch_array($result)){
?> 

<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><img src="../img/iconhome.png" alt=""> Home</a> <a href="#" class="tip-bottom">Manage Members</a> <a href="#" class="current">Add Members</a> </div>
  <h1 class="text-center"><strong>Update Member Details</strong></h1>
</div>
<div class="container-fluid">
  <hr>
  <div class="row-fluid">
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <img src="../img/resume.png" alt=""> </span>
          <h5>Personal Information</h5>
        </div>
        <div class="widget-content nopadding">

          <form action="edit-member-req.php" method="POST" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Full Name :</label>
              <div class="controls">
                <input type="text" class="span11" name="fullname" value='<?php echo $row['fullname']; ?>' />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Username :</label>
              <div class="controls">
                <input type="text" class="span11" name="username" value='<?php echo $row['username']; ?>' />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Password :</label>
              <div class="controls">
                <input type="password"  class="span11" name="password" disabled=""  />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Gender :</label>
              <div class="controls">
              <select name="gender" required="required" id="select">
                  <option value="Male" selected="selected">Male</option>
                  <option value="Female">Female</option>
                  <option value="Other">Other</option>
                </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Date of Registration :</label>
              <div class="controls">
                <input type="date" name="dor" class="span11" value='<?php echo $row['dor']; ?>' />
               </div>
            </div>
            
          
        </div>
     
        
        <div class="widget-content nopadding">
          <div class="form-horizontal">
         
        </div>
        <div class="widget-content nopadding">
          <div class="form-horizontal">
            <div class="control-group">
              <label for="normal" class="control-label">Plans: </label>
              <div class="controls">
                <select name="plan" required="required" id="select">
                  <option value="30" selected="selected" >One Month</option>
                  <option value="90">Three Month</option>
                  <option value="180">Six Month</option>
                  <option value="365">One Year</option>

                </select>
              </div>

            </div>
            <div class="control-group">
              
              
            </div>
          </div>

          </div>



        </div>
      </div>
	  
	
    </div>

    
  
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <img src="../img/business-card.png" alt=""> </span>
          <h5>Contact Details</h5>
        </div>
        <div class="widget-content nopadding">
          <div class="form-horizontal">
            <div class="control-group">
              <label for="normal" class="control-label">Contact Number:</label>
              <div class="controls">
                <input type="number" id="mask-phone" name="contact" value='<?php echo $row['contact']; ?>' class="span8 mask text">
                </div>
            </div>
            <div class="control-group">
              <label class="control-label">Address :</label>
              <div class="controls">
                <input type="text" class="span11" name="address" value='<?php echo $row['address']; ?>' />
              </div>
            </div>
          </div>

              <div class="widget-title"> <span class="icon"> <img src="../img/report.png" alt=""> </span>
          <h5>Service Details</h5>
        </div>
        <div class="widget-content nopadding">
          <div class="form-horizontal">
            
            
            <div class="control-group">
              <label class="control-label">Services</label>
              <div class="controls" id="trls">
                <label>
                  <input type="radio" value="Fitness" name="services" />
                  Fitness <small>- ₱ 100 per month</small></label>
                <label>
                  <input type="radio" value="Sauna" name="services" />
                  Sauna <small>- ₱ 120 per month</small></label>
                <label>
                  <input type="radio" value="Cardio" name="services" />
                  Cardio <small>- ₱ 100 per month</small></label>
              </div>
            </div>

            <div class="control-group">
              <label class="control-label">Total Amount</label>
              <div class="controls">
                <div class="input-append">
                  <span class="add-on">₱</span> 
                  <input type="number" value='<?php echo $row['amount']; ?>' name="amount" class="span11">
                  </div>
              </div>
            </div>
            
          
            
            <div class="form-actions text-center">
             <input type="hidden" name="id" value="<?php echo $row['user_id'];?>">
              <button type="submit" class="btn bg_ng"><strong>Update</strong></button>
            </div>
            </form>

          </div>
<?php
}
?>


        </div>

        </div>
      </div>

	
  </div>
  
  
</div></div>

<div class="row-fluid">
  <div id="footer" class="span12"> <?php echo date("Y");?> GYMBILOG CLUB </a> </div>
</div>

<style>
#footer {
  color: white;
}
</style>

<script src="../js/excanvas.min.js"></script> 
<script src="../js/jquery.min.js"></script> 
<script src="../js/jquery.ui.custom.js"></script> 
<script src="../js/bootstrap.min.js"></script> 
<script src="../js/jquery.flot.min.js"></script> 
<script src="../js/jquery.flot.resize.min.js"></script> 
<script src="../js/jquery.peity.min.js"></script> 
<script src="../js/fullcalendar.min.js"></script> 
<script src="../js/matrix.js"></script> 
<script src="../js/matrix.dashboard.js"></script> 
<script src="../js/jquery.gritter.min.js"></script> 
<script src="../js/matrix.interface.js"></script> 
<script src="../js/matrix.chat.js"></script> 
<script src="../js/jquery.validate.js"></script> 
<script src="../js/matrix.form_validation.js"></script> 
<script src="../js/jquery.wizard.js"></script> 
<script src="../js/jquery.uniform.js"></script> 
<script src="../js/select2.min.js"></script> 
<script src="../js/matrix.popover.js"></script> 
<script src="../js/jquery.dataTables.min.js"></script> 
<script src="../js/matrix.tables.js"></script> 

<script type="text/javascript">
  function goPage (newURL) {
      if (newURL != "") {

          if (newURL == "-" ) {
              resetMenu();            
          }            
          else {  
            document.location.href = newURL;
          }
      }
  }

function resetMenu() {
   document.gomenu.selector.selectedIndex = 2;
}
</script>
</body>
</html>
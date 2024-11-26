<?php
session_start();
if(!isset($_SESSION['user_id'])){
header('location:../index.php');	
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>GymBilog Club</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="../css/bootstrap.min.css" />
<link rel="stylesheet" href="../css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="../css/fullcalendar.css" />
<link rel="stylesheet" href="../css/matrix-style.css" />
<link rel="stylesheet" href="../css/matrix-media.css" />
<link href="../font-awesome/css/font-awesome.css" rel="stylesheet" />
<link rel="stylesheet" href="../css/jquery.gritter.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
<link rel="shortcut icon" href="../img/gymbilog.png" type="image/x-icon">
</head>
<body>
<div id="header">
  <h1><a href="dashboard.html">GYM BILOG CLUB</a></h1>
</div>
<?php include '../includes/header.php'?>
<?php $page="staff"; include '../includes/sidebar.php'?>

<?php
include 'dbcon.php';
$id=$_GET['id'];
$qry= "select * from staffs where user_id='$id'";
$result=mysqli_query($conn,$qry);
while($row=mysqli_fetch_array($result)){
?> 
<?php

if(isset($_POST['submit'])) {
  
  $fullname = $_POST['fullname'];
  $username = $_POST['username'];
  $password = $_POST['password'];
  $gender = $_POST['gender'];
  $contact = $_POST['contact'];
  $address = $_POST['address'];
  $designation = $_POST['designation'];
  $destination = $_POST['destination'];

  if(isset($_FILES['imagefile'])) {
      $file = $_FILES['imagefile']['tmp_name'];
      $timestamp = date("Ymd-H-i-s");
      $destination = "img/profile/" . $timestamp . "." . pathinfo($_FILES['imagefile']['name'], PATHINFO_EXTENSION);

     
      if(move_uploaded_file($file, $destination)) {
        
          $update_query = "UPDATE staffs SET fullname='$fullname', username='$username', password='$password', gender='$gender', contact='$contact', address='$address', designation='$designation', profile_picture='$destination' WHERE user_id='$id'";
          
          if(mysqli_query($conn, $update_query)) {
              echo "<script>alert('Staff record updated successfully!');</script>";
              $URL = "staffs.php";
              echo "<script>location.href='$URL'</script>";
          } else {
              echo "<script>alert('Could not update staff record. Please contact support!');</script>";
          }
      } else {
          echo "<script>alert('Upload file failed!');</script>";
      }
  } else {
      echo "<script>alert('Please select an image file!');</script>";
  }
}
?>

<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <a href="index.php" title="Home" class="tip-bottom"><img src="../img/iconhome.png" alt="">  Home</a> <a href="staffs.php" class="tip-bottom">Staffs</a> <a href="edit-staff-form.php" class="current">Edit Staff Records</a> </div>
  <h1 class="text-center">Update Staff's Detail <i class="icon icon-briefcase"></i></h1>
</div>
<div class="container-fluid">
  <hr>
  <div class="row-fluid">
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Staff-Details</h5>
        </div>
        <div class="widget-content nopadding">

          <form action="edit-staff-req.php" method="POST" class="form-horizontal">
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
                <input type="password"  class="span11" name="password" disabled="" placeholder="**********"  />
                <span class="help-block">Note: Only the members are allowed to change their password until and unless it's an emergency.</span>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">Gender :</label>
              <div class="controls">
                <input type="text" class="span11" name="gender" value='<?php echo $row['gender']; ?>' />
              </div>
            </div>
           
            
          
        </div>
     
        
        <div class="widget-content nopadding">
          <div class="form-horizontal">
          
        </div>
        <div class="widget-content nopadding">
          
          </div>


        </div>
      </div>
	
    </div>

    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
          <h5>Staff-Details</h5>
        </div>
        <div class="widget-content nopadding">
          <div class="form-horizontal">
            <div class="control-group">
              <label for="normal" class="control-label">Contact Number</label>
              <div class="controls">
                <input type="number" id="mask-phone" name="contact" value='<?php echo $row['contact']; ?>' class="span8 mask text">
                <span class="help-block blue span8">(+63) 999-9999</span> 
                </div>
            </div>
            <div class="control-group">
              <label class="control-label">Address :</label>
              <div class="controls">
                <input type="text" class="span11" name="address" value='<?php echo $row['address']; ?>' />
              </div>
            </div>
			
            <div class="control-group">
                  <label class="control-label">Designation</label>
                  <div class="controls">
                  <select name="designation" id="designation">
                    <option value="Cashier">Cashier</option>
                    <option value="Trainer">Trainer</option>
                    <option value="GYM Assistant">GYM Assistant</option>
                    <option value="Front Desk Staff">Front Desk Staff</option>
                    <option value="Manager">Manager</option>
                    </select>
                  </div>
                </div>
			
			
          </div>

           

            <div class="form-actions text-center">
             <input type="hidden" name="id" value="<?php echo $row['user_id'];?>">
              <button type="submit" class="btn btn-success">Update Staff Details</button>
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
  
  <div class="row-fluid">
   
  </div>
</div>
<div class="row-fluid">
  <div id="footer" class="span12"> <?php echo date("Y");?> GYMBILOG CLUB</a> </div>
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
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
<link rel="stylesheet" href="../css/matrix-style.css" />
<link rel="stylesheet" href="../css/matrix-media.css" />
<link href="../font-awesome/css/fontawesome.css" rel="stylesheet" />
<link href="../font-awesome/css/all.css" rel="stylesheet" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
<link rel="shortcut icon" href="img/gymbilog.png" type="image/x-icon">
</head>
<body>
<div id="header">
  <h1><a href="dashboard.html">GYM BILOG CLUB</a></h1>
</div>
<?php include 'includes/topheader.php'?>
<?php $page='staff-management'; include 'includes/sidebar.php'?>
<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.php" title="Home" class="tip-bottom"><img src="img/iconhome.png" alt=""> Home</a> <a href="staffs.php">Staffs</a> <a href="staffs-entry.php" class="current">Staff Entry</a> </div>
    <h1 class="text-center">GYMBILOG's STAFF Entry Form <img src="img/job-application.png" alt=""></h1>
  </div>
  <div class="container-fluid"><hr>
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <img src="img/staff.png" alt=""></span>
            <h5>Staff Details</h5>
          </div>
          <div class="widget-content nopadding">
            <form id="form-wizard" action="added-staffs.php" class="form-horizontal" method="POST">
              <div id="form-wizard-1" class="step">

              <div class="control-group">
                  <label class="control-label">Enter Fullname:</label>
                  <div class="controls">
                    <input id="fullname" type="text" name="fullname" required/>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Enter a Username:</label>
                  <div class="controls">
                    <input id="username" type="text" name="username" />
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Password:</label>
                  <div class="controls">
                    <input id="password" type="password" name="password" />
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Confirm Password:</label>
                  <div class="controls">
                    <input id="password2" type="password" name="password2" />
                  </div>
                </div>
              </div>
              <div id="form-wizard-2" class="step">
                <div class="control-group">
                  <label class="control-label">Email:</label>
                  <div class="controls">
                    <input id="email" type="text" name="email" required/>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Address:</label>
                  <div class="controls">
                    <input id="address" type="text" name="address" required/>
                  </div>
                </div>

                <div class="control-group">
                  <label class="control-label">Designation:</label>
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
                <div class="control-group">
                  <label class="control-label">Gender:</label>
                  <div class="controls">
                    <select name="gender" id="gender">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    </select>
                  </div>
                </div>
                <div class="control-group">
                  <label class="control-label">Contact Number:</label>
                  <div class="controls">
                    <input id="contact" type="number" name="contact" required/>
                  </div>
                </div>

              </div>

              <div class="form-actions">
                <input id="back" class="btn btn-primary" type="reset" value="Back" />
                <input id="next" class="btn bg_ng" type="submit" value="Proceed Next Step" />
                <div id="status"></div>
              </div>
              <div id="submitted"></div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="row-fluid">
<div id="footer" class="span12"> <?php echo date("Y");?> GYMBILOG CLUB </a> </div>
</div>

<style>
#footer {
  color: white;
}
</style>
<script src="../js/jquery.min.js"></script> 
<script src="../js/jquery.ui.custom.js"></script> 
<script src="../js/bootstrap.min.js"></script> 
<script src="../js/jquery.validate.js"></script> 
<script src="../js/jquery.wizard.js"></script> 
<script src="../js/matrix.js"></script> 
<script src="../js/matrix.wizard.js"></script>
</body>
</html>

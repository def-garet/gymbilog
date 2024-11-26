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
<link rel="shortcut icon" href="img/gymbilog.png" type="image/x-icon">
</head>
<body>

<div id="header">
  <h1><a href="dashboard.html">GYM BILOG CLUB</a></h1>
</div>
<?php include 'includes/topheader.php'?>
<?php $page='manage-customer-progress'; include 'includes/sidebar.php'?>

<?php
include 'dbcon.php';
$id=$_GET['id'];
$qry= "select * from members where user_id='$id'";
$result=mysqli_query($conn,$qry);
while($row=mysqli_fetch_array($result)){
?> 

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.php" title="Home" class="tip-bottom"><img src="img/iconhome.png" alt=""> Home</a> <a href="customer-progress.php">Customer Progress</a> <a href="#" class="current">Update Progress</a> </div>
    <h1 class="text-center">Update Customer's Progress <img src="img/rising.png" alt=""></h1>
  </div>
  
  
  <div class="container-fluid" style="margin-top:-38px;">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <img src="img/status.png" alt=""> </span>
            <h5>Progress </h5>
          </div>
          <div class="widget-content">
            <div class="row-fluid">
              
			  <div class="span2"></div>
			  
              <div class="span8">
                <table class="table table-bordered table-invoice">
				
                  <tbody>
				  <form action="userprogress-req.php" method="POST">
                    <tr>
                    <tr>
                      <td class="width30" style="color:#fff; font-weight:700;">Member's Fullname:</td>
                      <td class="width70" style="color:#fff;"><strong><?php echo $row['fullname']; ?></strong></td>
                    </tr>
                    <tr>
                      <td style="color:#fff; font-weight:700;">Service Taken:</td>
                      <td style="color:#fff; font-weight:700;"><strong><?php echo $row['services']; ?></strong></td>
                    </tr>
                    <tr>
                      <td style="color:#fff; font-weight:700;">Initial Weight: (KG)</td>
                      <td><input id="weight" type="number" name="ini_weight" value='<?php echo $row['ini_weight']; ?>' /></td>
                    </tr>

                    <tr>
                      <td style="color:#fff; font-weight:700;">Current Weight: (KG)</td>
                      <td><input id="weight" type="number" name="curr_weight" value='<?php echo $row['curr_weight']; ?>' /></td>
                    </tr>
					
                    <tr>
                      <td style="color:#fff; font-weight:700;">Initial Body Type:</td>
                      <td><input id="ini_bodytype" type="text" name="ini_bodytype" value='<?php echo $row['ini_bodytype']; ?>' /></td>
                    </tr>
                  
              </div>			  
                      </td>					  
					  <tr>                     
                    </tr>
                    <tr>
                      <td style="color:#fff; font-weight:700;">Current Body Type:</td>
                      <td><input id="curr_bodytype" type="text" name="curr_bodytype" value='<?php echo $row['curr_bodytype']; ?>' /></td>
                    </tr>                  
              </div>
			  

                      </td>
                  </tr>
                    </tbody>
                  
                </table>
              </div>	  
            </div>
			
			
            <div class="row-fluid">
              <div class="span12">
                <div class="text-center">
             <input type="hidden" name="id" value="<?php echo $row['user_id'];?>">
                  <button class="btn bg_ng btn-large" type="SUBMIT" href=""><strong>Save Changes</strong></button> 
				</div>
				  
				  </form>
              </div>
            </div>
			
      <?php
}
      ?>
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


</body>
</html>
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

<?php $page="member-repo"; include 'includes/sidebar.php'?>


<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.php" title="Home" class="tip-bottom"><img src="img/iconhome.png" alt=""> Home</a> <a href="member-report.php" class="current">Member Reports</a> </div>
    <h1 class="text-center">Member's Report <img src="img/reports.png" alt=""></h1>
  </div>
  <div class="container-fluid print-container">
    <div class="row-fluid">
      <div class="span12">
	          <div class="widget-box">
      <?php
            include 'dbcon.php';
            $id=$_GET['id'];
            $qry= "select * from members where user_id='$id'";
            $result=mysqli_query($conn,$qry);
            while($row=mysqli_fetch_array($result)){
            ?> 
      
     <div class="widget-content" id="wgtc1">
            <div class="row-fluid">
              <div class="span4">
                <table class="">
                  <tbody>
                    <tr>
                      <td><h4>GymBilog Club</h4></td>
                    </tr>
                    <tr>
                      <td>Iloilo City, Philippines</td>
                    </tr>
                    
                    <tr>
                      <td>Tel: 123-4567</td>
                    </tr>
                    <tr>
                      <td >Email: gymbilog@gmail.com</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              
              <div class="span8">
                <table class="table table-bordered table-invoice-full">
                  <thead>
                    <tr>
                      <th class="head0">Membership ID</th>
                      <th class="head1">Services Taken</th>
                      <th class="head0 right">My Plans (Upto)</th>
                      <th class="head1 right">Address</th>
                      <th class="head0 right">Charge</th>
                      <th class="head0 right">Attendance Count</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td><div class="text-center">GBC-SS-<?php echo $row['user_id']; ?></div></td>
                      <td><div class="text-center"><?php echo $row['services']; ?></div></td>
                      <td><div class="text-center"><?php if($row['plan'] == 0) { echo 'NONE';} else {echo $row['plan'].' Month/s';} ?></div></td>
                      <td><div class="text-center"><?php echo $row['address']; ?></div></td>
                      <td><div class="text-center"><?php echo 'Php'.$row['amount']; ?></div></td>
                      <td><div class="text-center"><?php echo $row['attendance_count']; ?> Day/s</div></td>
                    </tr>
                  </tbody>
                </table>
                <table class="table table-bordered table-invoice-full">
                  <tbody>
                    <tr>
                      <td class="msg-invoice" width="55%"> <div class="text-center"><h4>Last Payment Done:  Php<?php echo $row['amount']; ?>/-</h4>
                        <em><a href="#" class="tip-bottom" title="Registration Date" style="font-size:15px;">Member Since: <?php echo $row['dor']; ?> </a></em> </td>
                        </div>
                    </tr>
                  </tbody>
                </table>
              </div>
              
            </div>

            <div class="row-fluid">
                <div class="pull-left">
                <h4>Member <?php echo $row['fullname']; ?>,<br/> <br/> Membership is currently <?php echo $row['status']; ?>! <br/></h4><p>Thank you for choosing our services.<br/>- on behalf of the whole team</p>
                </div>
                <div class="pull-right">
                  <h4><span>Approved By:</h4>
                  <img src="img/gymbilog.png" width="124px;" alt=""><p class="text-center">Note: AutoGenerated</p> </div>
                  
            </div>
          </div>
   
		</div>
	
      </div>
      <?php
}
      ?>
    </div>

  </div>

  <div class="text-center">
    <button class="btn bg_hp" onclick="window.print()"><strong>Print</strong></button>
  </div>

</div>

<div class="row-fluid">
  <div id="footer" class="span12"> <?php echo date("Y");?> GYMBILOG CLUB </a> </div>
</div>

<style>
#footer {
  color: white;
}

@media print {
  body * {
    visibility: hidden;
  }

  .print-container, .print-container * {
    visibility: visible;
  }

  .print-container {
    position: absolute;
    left: 0px;
    top: 0px;
    right: 0px;
  }
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

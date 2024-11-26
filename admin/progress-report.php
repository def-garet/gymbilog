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

<?php $page='c-p-r'; include 'includes/sidebar.php'?>

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.php" title="Home" class="tip-bottom"><img src="img/iconhome.png" alt=""> Home</a> <a href="progress-report.php" class="current">Progress Reports</a> </div>
    <h1 class="text-center">View Progress Reports <img src="img/reports.png" alt=""></h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">
      
      <div class='widget-box'>
      
          <div class='widget-title'> <span class='icon'> <img src="img/report.png" alt=""></i> </span>
            <h5>Report Section</h5>
          </div>
          <div class='widget-content nopadding'>
	  
	  <?php

      include "dbcon.php";
      $qry="select * from members";
      $cnt = 1;
        $result=mysqli_query($conn,$qry);

        
          echo"<table class='table table-bordered table-hover bg_sv'>
              <thead>
                <tr>
                  <th>#</th>
                  <th>Fullname</th>
                  <th>Choosen Service</th>
                  <th>Progress</th>
                </tr>
              </thead>";
              
            while($row=mysqli_fetch_array($result)){?>
            
           <tbody> 
               
                <td><div class='text-center'><?php echo $cnt;?></div></td>
                <td><div class='text-center'><?php echo $row['fullname'];?></div></td>
                <td><div class='text-center'><?php echo $row['services'];?></div></td>
                <td><div class='text-center bg_hp'><a href="view-progress-report.php?id= <?php echo $row['user_id'] ?>"><img src="img/report.png" alt=""> View Progress Report</a></div></td>
                
              </tbody>
          <?php
       $cnt++;   }
            ?>

            </table>
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

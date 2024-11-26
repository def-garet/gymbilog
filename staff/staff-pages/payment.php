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

<?php $page="payment"; include '../includes/sidebar.php'?>


<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.php" title="Home" class="tip-bottom"><img src="../img/iconhome.png" alt="">  Home</a> <a href="payment.php" class="current">Payments</a> </div>
    <h1 class="text-center">Registered Member's Payment <img src="../img/verified-user.png" alt=""></i></h1>
  </div>
  <div class="container-fluid">
    <hr>
    <div class="row-fluid">
      <div class="span12">

      <div class='widget-box'>
          <div class='widget-title'> <span class='icon'> <img src="../img/payment.png" alt=""> </span>
            <h5>Payment</h5>
            <form id="custom-search-form" role="search" method="POST" action="search-result.php" class="form-search form-horizontal pull-right">
                <div class="input-append span12">
                    <input type="text" class="search-query" placeholder="Search" name="search" required>
                    <button type="submit" class="btn"><img src="../img/search.png" alt=""></button>
                </div>
            </form>
          </div>
          <div class='widget-content nopadding'>
	  
          <?php

include "dbcon.php";
$qry="SELECT * FROM members";
$cnt = 1;
  $result=mysqli_query($conn,$qry);

  
    echo"<table class='table table-bordered data-table table-hover bg_sv'>
        <thead>
          <tr>
            <th>#</th>
            <th>Fullname</th>
            <th>Last Payment Date</th>
            <th>Amount</th>
            <th>Choosen Service</th>
            <th>Plan</th>
            <th>Payment</th>
            <th>Remind</th>
          </tr>
        </thead>";
        
      while($row=mysqli_fetch_array($result)){ ?>
      
      <tbody> 
         
          <td><div class='text-center'><?php echo $cnt;?></div></td>
          <td><div class='text-center'><?php echo $row['fullname']?></div></td>
          <td><div class='text-center'><?php echo($row['paid_date'] == 0 ? "New Member" : $row['paid_date'])?></div></td>
          
          <td><div class='text-center'><?php echo 'Php'.$row['amount']?></div></td>
          <td><div class='text-center'><?php echo $row['services']?></div></td>
          <td><div class='text-center'><?php echo $row['plan']." Month/s"?></div></td>
          <td><div class='text-center'><a href='user-payment.php?id=<?php echo $row['user_id']?>'><button class='btn bg_ng btn'><strong>Make Payment</strong></button></a></div></td>
          <td><div class='text-center'><a href='sendReminder.php?id=<?php echo $row['user_id']?>'><button class='btn bg_hp btn' <?php echo($row['reminder'] == 1 ? "disabled" : "")?>><strong>Alert</strong></button></a></div></td>
        </tbody>
    <?php $cnt++; }

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



<style>
    #custom-search-form {
        margin:0;
        margin-top: 5px;
        padding: 0;
    }
 
    #custom-search-form .search-query {
        padding-right: 3px;
        padding-right: 4px \9;
        padding-left: 3px;
        padding-left: 4px \9;
       
 
        margin-bottom: 0;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
    }
 
    #custom-search-form button {
        border: 0;
        background: none;
        
        padding: 2px 5px;
        margin-top: 2px;
        position: relative;
        left: -28px;
        
        margin-bottom: 0;
        -webkit-border-radius: 3px;
        -moz-border-radius: 3px;
        border-radius: 3px;
    }
 
    .search-query:focus + button {
        z-index: 3;   
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

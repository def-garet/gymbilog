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




<?php $page='payment'; include '../includes/sidebar.php'?>


<?php
include 'dbcon.php';
$id=$_GET['id'];
$qry= "select * from members where user_id='$id'";
$result=mysqli_query($conn,$qry);
while($row=mysqli_fetch_array($result)){
?> 

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.php" title="Home" class="tip-bottom"><img src="../img/iconhome.png" alt="">  Home</a> <a href="payment.php">Payments</a> <a href="#" class="current">Invoice</a> </div>
    <h1 class="text-center"><strong>Payment Form</strong></h1>
  </div>
  
  
  <div class="container-fluid" style="margin-top:-38px;">
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"> <img src="../img/payment.png" alt=""> </span>
            <h5>Payments</h5>
          </div>
          <div class="widget-content" id="wgyts">
            <div class="row-fluid">
              <div class="span5">
                <table class="">
                  <tbody>
                  <tr>
                      <td><img src="../img/gymbilog.png" alt="Gym Logo" width="175"></td>
                    </tr>
                    <tr>
                      <td><h4>GYM BILOG CLUB Club</h4></td>
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
			  
			  
              <div class="span7">
                <table class="table table-bordered table-invoice">
				
                  <tbody>
				  <form action="userpay.php" method="POST">
                    <tr>
                    <tr>
                      <td class="width30">Member's Fullname:</td>
                      <input type="hidden" name="fullname" value="<?php echo $row['fullname']; ?>">
                      <td class="width70"><strong><?php echo $row['fullname']; ?></strong></td>
                    </tr>
                    <tr>
                      <td>Service:</td>
                      <input type="hidden" name="services" value="<?php echo $row['services']; ?>">
                      <td><strong><?php echo $row['services']; ?></strong></td>
                    </tr>
                    <tr>
                      <td>Amount Per Month:</td>
                      <td><input id="amount" type="number" name="amount" value='<?php if($row['services'] == 'Fitness') { echo '55';} elseif ($row['services'] == 'Sauna') { echo '35';} else {echo '40';} ?>' /></td>
                    </tr>

                    <input type="hidden" name="paid_date" value="<?php echo $row['paid_date']; ?>">
					
                  <td class="width30">Plan:</td>
                    <td class="width70">
					<div class="controls">
                <select name="plan" required="required" id="select">
                  <option value="1" selected="selected" >One Month</option>
                  <option value="3">Three Month</option>
                  <option value="6">Six Month</option>
                  <option value="12">One Year</option>
                  <option value="0">None-Expired</option>

                </select>
              </div>

             
			  
                      </td>
					  
					  <tr>
                     
                    </tr>
                  <td class="width30">Member's Status:</td>
                    <td class="width70">
					<div class="controls">
                <select name="status" required="required" id="select">
                  <option value="Active" selected="selected" >Active</option>
                  <option value="Expired">Expired</option>

                </select>
              </div>
			  

                      </td>
                  </tr>
                    </tbody>
                  
                </table>
              </div>
			  
			  
            </div> 
			
			
            <div class="row-fluid">
              <div class="span12">
                
				
				<hr>
                <div class="text-center">
             <input type="hidden" name="id" value="<?php echo $row['user_id'];?>">
                  <button class="btn bg_ng btn-large" type="SUBMIT" href=""><strong>Make Payment</strong></button> 
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
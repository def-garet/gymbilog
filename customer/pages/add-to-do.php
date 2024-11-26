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
  <h1><a href="index.php">GYM BILOG CLUB</a></h1>
</div>


<?php include '../includes/topheader.php'?>
<?php $page="todo"; include '../includes/sidebar.php'?>

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.php" title="Hello! You are Here" class="tip-bottom"><img src="../img/iconhome.png" alt="">  Home</a></div>
  </div>


  <div class="container-fluid">  

    <div class="row-fluid">
	<form role="form" action="index.php" method="POST">  
    <?php 

        include 'session.php';

        if(isset($_POST['task_desc'])){   
        $task_status = $_POST["task_status"];
        $task_desc = $_POST["task_desc"];
        $user_id = $session_id;
        include 'dbcon.php';
        $qry = "insert into todo(task_status,task_desc,user_id) values ('$task_status','$task_desc','$user_id')";
        $result = mysqli_query($con,$qry); 

            if(!$result){
            echo"<div class='container-fluid'>";
                echo"<div class='row-fluid'>";
                echo"<div class='span12'>";
                echo"<div class='widget-box'>";
                echo"<div class='widget-title'> <span class='icon'> <i class='icon-info-sign'></i> </span>";
                    echo"<h5>Error Message</h5>";
                    echo"</div>";
                    echo"<div class='widget-content'>";
                        echo"<div class='error_ex'>";
                        echo"<h1 style='color:maroon;'>Error 404</h1>";
                        echo"<h3>Error occured while entering your details</h3>";
                        echo"<p>Please Try Again</p>";
                        echo"<a class='btn btn-warning btn-big'  href='index.php'>Go Back</a> </div>";
                    echo"</div>";
                    echo"</div>";
                echo"</div>";
                echo"</div>";
            echo"</div>";
            }else {

            echo"<div class='container-fluid'>";
                echo"<div class='row-fluid'>";
                echo"<div class='span12'>";
                echo"<div class='widget-box'>";
                echo"<div class='widget-title'> <span class='icon'> <i class='icon-info-sign'></i> </span>";
                    echo"<h5>Message</h5>";
                    echo"</div>";
                    echo"<div class='widget-content'>";
                        echo"<div class='error_ex'>";
                        echo"<h1>Success</h1>";
                        echo"<h3>Your task has been added!</h3>";
                        echo"<p>Please click the button to go back.</p>";
                        echo"<a class='btn btn-inverse btn-big'  href='index.php'>Go Back</a> </div>";
                    echo"</div>";
                    echo"</div>";
                echo"</div>";
                echo"</div>";
            echo"</div>";

            }

            }else{
                echo"<h3>YOU ARE NOT AUTHORIZED TO REDIRECT THIS PAGE. GO BACK to <a href='index.php'> DASHBOARD </a></h3>";
            }

?>                
       </form>   
    
	  
	  
	  
    </div>
  </div>
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

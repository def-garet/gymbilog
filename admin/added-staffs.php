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
    <h1 class="text-center">GYMBILOG's STAFF <i class="fas fa-users"></i></h1>
  </div>
  
  <form role="form" action="index.php" method="POST">
            <?php 
            if(isset($_POST['fullname'])) {
              $fullname = $_POST["fullname"];    
              $username = $_POST["username"];
              $password = $_POST["password"];
              $email = $_POST["email"];
              $address = $_POST["address"];
              $designation = $_POST["designation"];
              $gender = $_POST["gender"];
              $contact = $_POST["contact"];
              $destination = $_POST['destination'];
 
          
              include 'dbcon.php';
              // nagadd ko di destination para maka add picture
              $qry = "INSERT INTO staffs(fullname, username, password, email, address, designation, gender, contact, profile_picture) 
                      VALUES ('$fullname', '$username', '$password', '$email', '$address', '$designation', '$gender', '$contact','destination')";
              $result = mysqli_query($conn, $qry);

                    if(!$result){
                    echo"<div class='container-fluid'>";
                        echo"<div class='row-fluid'>";
                        echo"<div class='span12'>";
                        echo"<div class='widget-box'>";
                        echo"<div class='widget-title'> <span class='icon'> <i class='fas fa-info'></i> </span>";
                            echo"<h5>Error Message</h5>";
                            echo"</div>";
                            echo"<div class='widget-content'>";
                                echo"<div class='error_ex'>";
                                echo"<h1 style='color:maroon;'>Error 404</h1>";
                                echo"<h3>Error occured while submitting your details</h3>";
                                echo"<p>Please Try Again</p>";
                                echo"<a class='btn btn-warning btn-big'  href='edit-member.php'>Go Back</a> </div>";
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
                        echo"<div class='widget-title'> <span class='icon'> <i class='fas fa-info'></i> </span>";
                            echo"<h5>Message</h5>";
                            echo"</div>";
                            echo"<div class='widget-content'>";
                                echo"<div class='error_ex'>";
                                echo"<h1>Success</h1>";
                                echo"<h3>Staff details has been added!</h3>";
                                echo"<p>The requested staff details are added to database. Please click the button to go back.</p>";
                                echo"<a class='btn btn-inverse btn-big'  href='staffs.php'>Go Back</a> </div>";
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
</div></div>

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

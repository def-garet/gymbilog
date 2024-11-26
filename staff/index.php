<?php session_start();
include('dbcon.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
        <title>GYMBILOG CLUB</title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="css/staffIndex.css">
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
        <link rel="shortcut icon" href="img/gymbilog.png" type="image/x-icon">

    </head>
    
    <body>
    
        <div id="loginbox">            
            <form id="loginform" method="POST" class="form-vertical" action="#">
            <div class="control-group normal_text"> <h3>Staff Login</h3></div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><img src="img/user.png" alt=""></span><input type="text" name="user" placeholder="Username" required/>
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><img src="img/padlock.png" alt=""></span><input type="password" name="pass" placeholder="Password" required />
                        </div>
                    </div>
                </div>
                <div class="form-actions center">
                    <button type="submit" class="staffBtn" title="Log In" name="login" value="Admin Login">Staff Login</button>
                </div>
            </form>
            <?php
            if (isset($_POST['login'])) {
                $username = mysqli_real_escape_string($con, $_POST['user']);
                $password = mysqli_real_escape_string($con, $_POST['pass']);

                $query = "SELECT * FROM staffs WHERE username='$username'";
                $result = mysqli_query($con, $query);
            
                if ($result && mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);

                    if ($password === $row['password']) {
                        $_SESSION['user_id'] = $row['user_id'];
                        header('location: staff-pages/index.php');
                        exit;
                    } else {
                        echo "<script>alert('Invalid Username/Password or Account expired')</script>";
                    }
                } else {
                    echo "<script>alert('Invalid Username/Password or Account expired')</script>";
                }
            }
                
            ?>
            <div class="pullBTN">
                <div class="pull-left">
                <a href="../index.php"><h6>Admin Login</h6></a>
                </div>
    
                <div class="pull-right">
                <a href="../customer/index.php"><h6>Customer Login</h6></a>
                </div>
            </div>
            
        </div>
        
        <script src="js/jquery.min.js"></script>  
        <script src="js/matrix.login.js"></script> 
        <script src="js/bootstrap.min.js"></script> 
<script src="js/matrix.js"></script>
    </body>

</html>

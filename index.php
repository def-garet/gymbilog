<?php session_start();
 include('dbcon.php'); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
        <title>GYMBILOG CLUB</title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="stylesheet" href="css/index.css">
        <link rel="shortcut icon" href="img/gymbilog.png" type="image/x-icon">
    </head>
    
<body>
    
        <div id="loginbox">            
            <form id="loginform" method="POST" class="form-vertical" action="#">
            <div class="control-group normal_text">
                <h3 class="logoname">GYM<span>BILOG</span></h3></div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><img src="img/user.png" alt=""></span><input class="user" type="text" name="user" placeholder="Username" required/>
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><img src="img/padlock.png" alt=""></span><input class="pass" type="password" name="pass" placeholder="Password" required />
                        </div>
                    </div>
                </div>
                <div class="form-actions center">
                    <button type="submit" class="AdminBtn" title="Log In" name="login" value="Admin Login">Admin Login</button>
                </div>
            </form>
            <?php
            if (isset($_POST['login'])) {

                $username = $_POST['user'];
                $password = $_POST['pass'];

                $username_query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
                $result = mysqli_query($con, $username_query);
            
                if ($result && mysqli_num_rows($result) > 0) {
                    $row = mysqli_fetch_assoc($result);
                    $_SESSION['user_id'] = $row['user_id'];
                    header('location: admin/index.php');
                } else {
                    echo "<div class='alert alert-danger alert-dismissible' role='alert'>
                        Invalid Username and Password
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
                            <span aria-hidden='true'>&times;</span>
                        </button>
                        </div>";
                }
            }
            
            ?>
            
            <div class="pullBTN">
                <div class="pull-left">
                <a href="customer/index.php"><h6>Customer Login</h6></a>
                </div>
    
                <div class="pull-right">
                <a href="staff/index.php"><h6>Staff Login</h6></a>
                </div>
            </div>
            
        </div>
</body>

</html>

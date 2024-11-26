<?php session_start();
include('dbcon.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>        
        <title>GYMBILOG CLUB</title><meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="css/cusStyle.css">
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
        <link rel="shortcut icon" href="../img/gymbilog.png" type="image/x-icon">
    </head>
    
    <body>
    
    <div id="loginbox">            
            <form id="loginform" class="form-vertical" method="POST" action="#">
				 <div class="control-group normal_text"> <h3>Customer Login</h3></div>
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
                            <span class="add-on bg_ly"><img src="img/padlock.png" alt=""></span><input type="password" name="pass" placeholder="Password" required/>
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-info" id="to-recover">Join Now!</a></span>
                    <span class="pull-right"><button type="submit" name="login" class="btn btn-info" >Customer Login</button></span>
                </div>
                <div class="g">
                <a href="../index.php"><h6>Go Back</h6></a>
                </div>
                <?php
                if (isset($_POST['login'])) {
                    $username = mysqli_real_escape_string($con, $_POST['user']);
                    $password = mysqli_real_escape_string($con, $_POST['pass']);
                    $query = "SELECT * FROM members WHERE username='$username' AND status='Active'";
                    $result = mysqli_query($con, $query);
                
                    if ($result && mysqli_num_rows($result) > 0) {
                        $row = mysqli_fetch_assoc($result);

                        if ($password === $row['password']) {

                            $_SESSION['user_id'] = $row['user_id'];
                            header('location: pages/index.php');
                            exit;
                        } else {
                            echo "<script>alert('Invalid User/Password or Account expired')</script>";
                        }
                    } else {
                        echo "<script>alert('Invalid User/Password or Account expired')</script>";
                    }
                }
                ?>
            
            </form>
            <form id="recoverform" action="../customer/pages/register-cust.php" method="POST" class="form-vertical">
                <h1>Register</h1>
			

                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-pencil"></i></span><input type="text" name="fullname" placeholder="Fullname" required/>
                        </div>
                    </div>

                    <br>

                        <div class="controls">
                            <div class="main_input_box">
                                <span class="add-on bg_ly"><i class="icon-leaf"></i></span><input type="text" name="username" placeholder="@username" required/>
                            </div>
                        </div>

                    <br>

                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-asterisk"></i></span><input type="password" name="password" placeholder="Password" required/>
                        </div>
                    </div>

                <br>

                       <div class="controls">
                            <div class="main_input_box">
                                <span class="add-on bg_ly"><i class="icon-leaf"></i></span><input type="number" name="contact" placeholder="Contact" required/>
                            </div>
                        </div>

                    <br>

                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-asterisk"></i></span><input type="text" name="address" placeholder="Address" required/>
                        </div>
                    </div>

                        <br>

                        <div class="controls">
                            <div class="main_input_box">
                                <select name="gender" required="required" id="select">
                                    <option disabled selected hidden>Gender</option>
                                    <option value="Male" >Male</option>
                                    <option value="Female">Female</option>
                                    <option value="Other">Other</option>
                                </select>
                            </div>
                        </div>

                        <br>

                        <div class="controls">
                            <div class="main_input_box">
                            <select name="plan" required="required" id="select">
                            <option selected disabled hidden>Select Plans</option>
                                <option value="1" >One Month</option>
                                <option value="3">Three Month</option>
                                <option value="6">Six Month</option>
                                <option value="12">One Year</option>
                            </select>
                            </div>
                        </div>

                        <br>

                        <div class="controls">
                            <div class="main_input_box">
                            <select name="services" required="required" id="select">
                            <option selected disabled hidden>Select Service</option>
                                <option value="Fitness" >Fitness</option>
                                <option value="Sauna">Sauna</option>
                                <option value="Cardio">Cardio</option>
                            </select>
                            </div>
                        </div>

                    
               
                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="btn btn-info" id="to-login">&laquo; Back to login</a></span>
                    <span class="pull-right"><button class="btn btn-info" type="SUBMIT">Submit Details</button></span>
                </div>

                
            </form>
        </div>           
            
            
        
        <script src="js/jquery.min.js"></script>  
        <script src="js/matrix.login.js"></script> 
        <script src="js/bootstrap.min.js"></script> 
<script src="js/matrix.js"></script>
    </body>

</html>

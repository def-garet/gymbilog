<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header('location:../index.php');    
}
?>

<?php 
$servername="localhost";
$uname="root";
$pass="";
$db="gymnsb";
$conn=mysqli_connect($servername,$uname,$pass,$db);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$qry = "SELECT * FROM staffs";
$result = mysqli_query($conn, $qry);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>GYMBILOG CLUB</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="../css/bootstrap-responsive.min.css" />
    <link rel="stylesheet" href="../css/uniform.css" />
    <link rel="stylesheet" href="../css/select2.css" />
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
            <div id="breadcrumb"> <a href="index.php" title="Home" class="tip-bottom"><img src="img/iconhome.png" alt=""> Home</a> <a href="staffs.php" class="current">Staff Members</a> </div>
            <h1 class="text-center">GYMBILOG's STAFF LIST <img src="img/man.png" alt=""></h1>
        </div>
        <div class="container-fluid">
            <hr>
            <div class="row-fluid">
                <div class="span12">
                    <a href="staffs-entry.php"><button class="btn bg_ng"><strong>Add Staff Members</strong></button></a>
                    <div class='widget-box'>
                        <div class='widget-title'> <span class='icon'> <img src="img/staff.png" alt=""> </span>
                            <h5>Staffs</h5>
                        </div>
                        <div class='widget-content nopadding'>
                            <table class='table table-bordered table-hover bg_sv'>
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Fullname</th>
                                        <th>Username</th>
                                        <th>Gender</th>
                                        <th>Designation</th>
                                        <th>Email</th>
                                        <th>Address</th>
                                        <th>Contact</th>
                                        <th>Profile Picture</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $cnt = 1;
                                    while($row = mysqli_fetch_array($result)) {
                                        echo "<tr>";
                                        echo "<td>".$cnt."</td>";
                                        echo "<td>".$row['fullname']."</td>";
                                        echo "<td>@".$row['username']."</td>";
                                        echo "<td>".$row['gender']."</td>";
                                        echo "<td>".$row['designation']."</td>";
                                        echo "<td>".$row['email']."</td>";
                                        echo "<td>".$row['address']."</td>";
                                        echo "<td>".$row['contact']."</td>";
                                        echo "<td><img src='".$row['profile_picture']."' style='max-width: 100px; max-height: 100px;' /></td>";
                                        echo "<td><a href='edit-staff-form.php?id=".$row['user_id']."' style='color:#000; font-weight:700;'>Edit</a> | ";
                                        //nag add ko di pop up message para may confirmation kay admin if want ya idelete
                                        echo "<a href='remove-staff.php?id=".$row['user_id']."' style='color:#bc4749; font-weight:700;' onclick='return confirm(\"Are you sure you want to delete this staff member?\")'><i class='fas fa-trash'></i> Remove</a></td>";
                                        echo "</tr>";
                                        $cnt++;
                                    }
                                    ?>
                                </tbody>
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

    <script src="../js/jquery.min.js"></script> 
    <script src="../js/jquery.ui.custom.js"></script> 
    <script src="../js/bootstrap.min.js"></script> 
    <script src="../js/jquery.uniform.js"></script> 
    <script src="../js/select2.min.js"></script> 
    <script src="../js/jquery.dataTables.min.js"></script> 
    <script src="../js/matrix.js"></script> 
    <script src="../js/matrix.tables.js"></script>
</body>
</html>

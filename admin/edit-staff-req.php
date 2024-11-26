<?php
session_start();
if(!isset($_SESSION['user_id'])){
header('location:../index.php');	 //gin change ko loc ya 
}


include 'dbcon.php';
$servername="localhost";
$uname="root";
$pass="";
$db="gymnsb";

$conn=mysqli_connect($servername,$uname,$pass,$db);

if(isset($_POST['fullname'])) {
    
    $fullname = $_POST["fullname"];    
    $username = $_POST["username"];
    $gender = $_POST["gender"];
    $contact = $_POST["contact"];
    $address = $_POST["address"];
    $designation = $_POST["designation"];
    $id = $_POST["id"];

    // para masave ang image sa db using destination
    if(isset($_FILES['imagefile'])) {
        $file = $_FILES['imagefile']['tmp_name'];
        $timestamp = date("Ymd-H-i-s");
        $uploaddir = "img/profile/";
        if (!file_exists($uploaddir)) {
            mkdir($uploaddir, 0777, true);
        }
        $destination = $uploaddir . $timestamp . "." . pathinfo($_FILES['imagefile']['name'], PATHINFO_EXTENSION);

        if(move_uploaded_file($file, $destination)) {
            $update_query = "UPDATE staffs SET fullname='$fullname', username='$username', gender='$gender', contact='$contact', address='$address', designation='$designation', profile_picture='$destination' WHERE user_id='$id'";

            $result = mysqli_query($conn, $update_query);

            if($result) {
                echo "<script>alert('Staff record updated successfully!');</script>";
                $URL = "staffs.php";
                echo "<script>location.href='$URL'</script>";
                
            } else {
                echo "<script>alert('Could not update staff record. Please contact support!');</script>";
            }
        } else {
            echo "<script>alert('Upload file failed!');</script>";
        }
    } else {
        echo "<script>alert('Please select an image file!');</script>";
    }
}
?>
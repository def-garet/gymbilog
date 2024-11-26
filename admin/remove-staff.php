<?php

session_start();

if(!isset($_SESSION['user_id'])){
header('location:../index.php');	
}

if(isset($_GET['id'])){
$id=$_GET['id'];

include 'dbcon.php';

// idelete ya ni ang sa staffs base sa iya user id
$qry="delete from staffs where user_id=$id";
$result=mysqli_query($con,$qry);

if($result){
    echo"DELETED";
    header('Location:staffs.php');
}else{
    echo"ERROR!!";
}
}
?>
<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
if (!isset($_SESSION['user_id']) || empty($_SESSION['user_id'])) {
    header("location:../index.php");
    exit();
}
$session_id = $_SESSION['user_id'];
?>
<?php

$servername="localhost";
$uname="root";
$pass="";
$db="gymnsb";

$conn=mysqli_connect($servername,$uname,$pass,$db);

if(!$conn){
    die("Connection Failed");
}
// para macount ya ang announcement kay para mas hapos kay user/staff mabal an
$sql = "SELECT * FROM announcements";
                $query = $conn->query($sql);

                echo "$query->num_rows";
?>
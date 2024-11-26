<?php
if (session_status() == PHP_SESSION_NONE) {
  session_start();
}
if(isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    include 'dbcon.php';
    $qry_select_username = "SELECT username FROM members WHERE user_id = $user_id";
    $result_username = mysqli_query($con, $qry_select_username);

    if($result_username) {
        if(mysqli_num_rows($result_username) > 0) {
            $row = mysqli_fetch_assoc($result_username);
            $_SESSION['username'] = $row['username'];
        }
    } else {
        echo "Error executing query: " . mysqli_error($con);
    }
}
?>
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav right">
    <li  class="dropdown" id="profile-messages">
      <a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle">
        <i class="icon icon-user"></i>
        <span class="text">Welcome <?php echo isset($_SESSION['username']) ? $_SESSION['username'] : 'User'; ?></span>
        <b class="caret"></b>
      </a>
      <ul class="dropdown-menu">
        <li><a href="../pages/my-report.php"> My Report</a></li>
        <li class="divider"></li>
        <li><a href="to-do.php">My Tasks</a></li>
        <li class="divider "></li>
        <li><a href="../logout.php"> Log Out</a></li>
      </ul>
    </li>
    
    <li class=""><a title="" href="../logout.php"> <span class="text">Logout</span></a></li>
  </ul>
</div>

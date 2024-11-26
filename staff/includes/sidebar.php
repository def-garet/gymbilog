<div id="sidebar"><a href="#" class="visible-phone"></i> Dashboard</a>
  <ul>
    <li class="<?php if($page=='dashboard'){ echo 'active'; }?>"><a href="index.php"> <span>Dashboard</span></a> </li>
    <li class="<?php if($page=='member'){ echo 'submenu active'; } else { echo 'submenu';}?>"> <a href="#"> <span>Manage Members</span></a>
      <ul>
        <li><a href="members.php">List of All Members</a></li>
        <li><a href="member-entry.php">Member Entry Form</a></li>
        <li><a href="remove-member.php">Remove Member</a></li>
        <li><a href="edit-member.php">Update Member Details</a></li>
      </ul>
    <li class="<?php if($page=='membersts'){ echo 'active'; }?>"><a href="member-status.php"> <span>Member's Status</span></a></li>
    <li class="<?php if($page=='payment'){ echo 'active'; }?>"><a href="payment.php"> <span>Payments</span></a></li>
    <?php if($page=='attendance'){ echo 'active'; }?>

  </ul>
</div>

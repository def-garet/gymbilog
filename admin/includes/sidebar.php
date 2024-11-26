<div id="sidebar"><a href="#" class="visible-phone"> Dashboard</a>
  <ul>
    <li class="<?php if($page=='dashboard'){ echo 'active'; }?>"><a href="index.php"> <span>Dashboard</span></a> </li>
    <li class="submenu"> <a href="#"> <span>Manage Members</span> <span class="label label-important"><?php include 'dashboard-usercount.php';?> </span></a>
      <ul>
        <li class="<?php if($page=='members'){ echo 'active'; }?>"><a href="members.php"> List of All Members</a></li>
        <li class="<?php if($page=='members-entry'){ echo 'active'; }?>"><a href="member-entry.php"> Member Entry Form</a></li>
        <li class="<?php if($page=='members-remove'){ echo 'active'; }?>"><a href="remove-member.php"> Remove Member</a></li>
        <li class="<?php if($page=='members-update'){ echo 'active'; }?>"><a href="edit-member.php">  Update Member Details</a></li>
      </ul>
    </li>



    
    <li class="<?php if($page=='manage-customer-progress'){ echo 'active'; }?>"><a href="customer-progress.php"><span>Manage Customer Progress</span></a></li>
    <li class="<?php if($page=='member-status'){ echo 'active'; }?>"><a href="member-status.php"><span>Member's Status</span></a></li>
    <li class="<?php if($page=='payment'){ echo 'active'; }?>"><a href="payment.php"> <span>Payments</span></a></li>
    <li class="<?php if($page=='announcement'){ echo 'active'; }?>"><a href="announcement.php"> <span>Announcement</span></a></li>
    <li class="<?php if($page=='staff-management'){ echo 'active'; }?>"><a href="staffs.php"> <span>Staff Management</span></a></li>
    <li class="submenu"> <a href="#"> <span>Reports</span></a>
    <ul>
        <li class="<?php if($page=='member-repo'){ echo 'active'; }?>"><a href="members-report.php"> Members Report</a></li>
        <li class="<?php if($page=='c-p-r'){ echo 'active'; }?>"><a href="progress-report.php">Customer Progress Report</a></li>
      </ul>
    </li>

  
  </ul>
</div>
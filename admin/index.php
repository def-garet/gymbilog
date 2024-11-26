<?php
session_start();
if(!isset($_SESSION['user_id'])){
header('location:../index.php');	
}
include "dbcon.php";
$qry="SELECT services, count(*) as number FROM members GROUP BY services";
$result=mysqli_query($con,$qry);
$qry="SELECT gender, count(*) as enumber FROM members GROUP BY gender";
$result3=mysqli_query($con,$qry);
$qry="SELECT designation, count(*) as snumber FROM staffs GROUP BY designation";
$result5=mysqli_query($con,$qry);
?>

<!DOCTYPE html>

<html lang="en">
<head>
<title>GYMBILOG CLUB</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="../css/bootstrap.min.css" />
<link rel="stylesheet" href="../css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="../css/fullcalendar.css" />
<link rel="stylesheet" href="../css/matrix-style.css" />
<link rel="stylesheet" href="../css/matrix-media.css" />
<link href="../font-awesome/css/all.css" rel="stylesheet" />
<link href="../font-awesome/css/fontawesome.css" rel="stylesheet" />
<link rel="stylesheet" href="../css/jquery.gritter.css" />
<!-- <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'> -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
<link rel="shortcut icon" href="img/gymbilog.png" type="image/x-icon">



<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>  
           <script type="text/javascript">  
           google.charts.load('current', {'packages':['corechart']});  
           google.charts.setOnLoadCallback(drawChart);  
           function drawChart()  
           {  
                var data = google.visualization.arrayToDataTable([  
                          ['Services', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result))  
                          {  
                               echo "['".$row["services"]."', ".$row["number"]."],";  
                          }  
                          ?>  
                     ]);  
                var options = {  
                        
                      pieHole: 0.4 ,
                      
                     };  
                var chart = new google.visualization.PieChart(document.getElementById('piechart'));  
                chart.draw(data, options);  
           }  
           </script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Services', 'Total Numbers'],
  

          <?php
            $query="SELECT services, count(*) as number FROM members GROUP BY services";
            $res=mysqli_query($con,$query);
            while($data=mysqli_fetch_array($res)){
              $services=$data['services'];
              $number=$data['number'];
           ?>
           ['<?php echo $services;?>',<?php echo $number;?>],   
           <?php   
            }
           ?> 

          
        ]);

        var options = {
          width: 710,
          legend: { position: 'none' },
          bars: 'vertical', 
          axes: {
            x: {
              0: { side: 'top', label: 'Total'} 
            }
          },
          bar: { groupWidth: "100%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_x_div'));
        chart.draw(data, options);
      };


      
    </script>

<script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawStuff);

      function drawStuff() {
        var data = new google.visualization.arrayToDataTable([
          ['Terms', 'Total Amount',],
          
          <?php
          $query1 = "SELECT gender, SUM(amount) as numberone FROM members; ";

            $rezz=mysqli_query($con,$query1);
            while($data=mysqli_fetch_array($rezz)){
              $services='Earnings';
              $numberone=$data['numberone'];
           ?>
           ['<?php echo $services;?>',<?php echo $numberone;?>,],   
           <?php   
            }
           ?> 

      <?php
          $query10 = "SELECT quantity, SUM(amount) as numbert FROM equipment";
            $res1000=mysqli_query($con,$query10);
            while($data=mysqli_fetch_array($res1000)){
              $expenses='Expenses';
              $numbert=$data['numbert'];
              
           ?>
           ['<?php echo $expenses;?>',<?php echo $numbert;?>,],   
           <?php   
            }
           ?> 

          
        ]);

        var options = {         
          width: "1050",
          legend: { position: 'none' },          
          bars: 'horizontal', 
          axes: {
            x: {
              0: { side: 'top', label: 'Total'} 
            }
          },
          bar: { groupWidth: "100%" }
        };

        var chart = new google.charts.Bar(document.getElementById('top_y_div'));
        chart.draw(data, options);
      };


      
    </script>

<script type="text/javascript">
      google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([  
                          ['Gender', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result3))  
                          {  
                               echo "['".$row["gender"]."', ".$row["enumber"]."],";  
                          }  
                          ?>  
                     ]); 

        var options = {
          
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart'));
        chart.draw(data, options);
      }
    </script>

    <script>
       google.charts.load("current", {packages:["corechart"]});
      google.charts.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([  
                          ['Designation', 'Number'],  
                          <?php  
                          while($row = mysqli_fetch_array($result5))  
                          {  
                               echo "['".$row["designation"]."', ".$row["snumber"]."],";  
                          }  
                          ?>  
                     ]); 

        var options = {
          
          pieHole: 0.4,
        };

        var chart = new google.visualization.PieChart(document.getElementById('donutchart2022'));
        chart.draw(data, options);
      }
    </script>
</head>
<body>


<div id="header">
  <h1><a href="dashboard.html">GYM BILOG CLUB</a></h1>
</div>

<?php include 'includes/topheader.php'?>

  <?php $page='dashboard'; include 'includes/sidebar.php'?>

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="index.php" title="Hello! You are Here" class="tip-bottom"><img src="img/iconhome.png" alt=""> Home</a></div>
  </div>

  <div class="container-fluid" id="cfbg1">
    <div class="quick-actions_homepage">
      <ul class="quick-actions">
        <li class="bg_cy span"> <a href="member-status.php" style="font-size: 16px;"> <img src="img/verified-user.png" alt=""> <span class="label label-important"><?php include'actions/dashboard-activecount.php'?></span> <br> Active Members </a> </li>
        <li class="bg_hp span3"> <a href="members.php" style="font-size: 16px;"> <img src="img/verify.png" alt=""><span class="label label-important"><?php include'dashboard-usercount.php'?></span> <br> Registered Members</a> </li>
        <li class="bg_pp span3">
          <a href="payment.php" style="font-size: 16px;"> 
          <img src="img/earning.png" alt=""> <br> Total Earnings: ₱ <?php include 'income-count.php'; ?>
        </a>
      </li>
        <li class="bg_rd span2"> <a href="announcement.php" style="font-size: 16px;"> <img src="img/loudspeaker.png" alt=""><span class="label label-important"><?php include'actions/count-announcements.php'?></span>Announcements </a> </li>

      </ul>
    </div>

    <div class="row-fluid">
      <div class="span6">
        <div class="widget-box">
          <div class="widget-title bg_ly" data-toggle="collapse" href="#collapseG2"><span class="icon"><img src="img/motivation.png" alt=""></span>
            <h5>Gym Announcement</h5>
          </div>
          <div class="widget-content nopadding collapse in" id="collapseG2">
            <ul class="recent-posts">
              <li>

              <?php

                include "dbcon.php";
                $qry="SELECT * FROM announcements";
                $result=mysqli_query($conn,$qry);
                  
                while($row=mysqli_fetch_array($result)){
                  echo"<div class='user-thumb'> <img width='70' height='40' alt='User' src='img/loudspeaker.png'> </div>";
                  echo"<div class='article-post'>"; 
                  echo"<span class='user-info'> By: GymBilog Admin / Date: ".$row['date']." </span>";
                  echo"<p><a href='#'>".$row['message']."</a> </p>";
                 
                }

                echo"</div>";
                echo"</li>";
              ?>

              <a href="manage-announcement.php"><button class="btn bg_hp btn-mini">View All</button></a>
              </li>
            </ul>
          </div>
        </div><
       
         
      </div>
      <div class="span6">
       
      <div class="widget-box">
          <div class="widget-title"> <span class="icon"><img src="img/check-list.png" alt=""></span>
            <h5>Customer's To-Do Lists</h5>
          </div>
          <div class="widget-content">
            <div class="todo">
              <ul>
              <?php

                include "dbcon.php";
                $qry="SELECT * FROM todo";
                $result=mysqli_query($con,$qry);

                while($row=mysqli_fetch_array($result)){ ?>

                <li class='clearfix'> 
                                                                        
                    <div class='txt'> <?php echo $row["task_desc"]?> <?php if ($row["task_status"] == "Pending") { echo '<span class="by label bg_hp">Pending</span>';} else { echo '<span class="by label bg_ng">In Progress</span>'; }?></div>
                
               <?php }
                echo"</li>";
              echo"</ul>";
              ?>
            </div>
          </div>
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

#piechart {
  width: 800px; 
  height: 280px;  
  margin-left:auto; 
  margin-right:auto;
}
</style>


<script src="../js/excanvas.min.js"></script> 
<script src="../js/jquery.min.js"></script> 
<script src="../js/jquery.ui.custom.js"></script> 
<script src="../js/bootstrap.min.js"></script> 
<script src="../js/jquery.flot.min.js"></script> 
<script src="../js/jquery.flot.resize.min.js"></script> 
<script src="../js/jquery.peity.min.js"></script> 
<script src="../js/fullcalendar.min.js"></script> 
<script src="../js/matrix.js"></script> 
<script src="../js/matrix.dashboard.js"></script> 
<script src="../js/jquery.gritter.min.js"></script> 
<script src="../js/matrix.chat.js"></script> 
<script src="../js/jquery.validate.js"></script> 
<script src="../js/matrix.form_validation.js"></script> 
<script src="../js/jquery.wizard.js"></script> 
<script src="../js/jquery.uniform.js"></script> 
<script src="../js/select2.min.js"></script> 
<script src="../js/matrix.popover.js"></script> 
<script src="../js/jquery.dataTables.min.js"></script> 
<script src="../js/matrix.tables.js"></script> 

<script type="text/javascript">
  function goPage (newURL) {

      if (newURL != "") {
          if (newURL == "-" ) {
              resetMenu();            
          }         
          else {  
            document.location.href = newURL;
          }
      }
  }

function resetMenu() {
   document.gomenu.selector.selectedIndex = 2;
}
</script>
</body>
</html>

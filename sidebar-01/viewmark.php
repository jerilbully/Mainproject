<?php

use Mpdf\Tag\Table;

 session_start();
 if(!isset($_SESSION["LoginUser"])){
  header("Location:../login.php");
 }


    //Load Composer's autoloader
     require './vendor/autoload.php';
     $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "super_academy";
 
 // Create connection
$conn = new mysqli($servername,
    $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: "
        . $conn->connect_error);
}

?>
<html lang="en">
  <head>
  <title>Users list </title>  
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		<link rel="stylesheet" href="table.css"> 
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">
  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
    <?php include 'teachersidebar.php'; ?>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">

            <button type="button" id="sidebarCollapse" class="btn btn-primary">
              <i class="fa fa-bars"></i>
              <span class="sr-only">Toggle Menu</span>
            </button>
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="nav navbar-nav ml-auto">
              <li class="nav-item">
                    <a class="nav-link" href="teachermain.php">HOME</a>
                </li>  
              <li class="nav-item active">
                    <a class="nav-link" href="/smartacademy/logout.php">LOGOUT</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="#"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"></a>
                </li>  
              </ul>
            </div>
          </div>
        </nav>

        <!-- <h2 class="mb-4"></h2> -->


   

<!-- <a href="admin_dashboard.php"><button class="button-54">Dashboard</button></a> -->
  <h1 id="h1">MARKS</h1><br> <br>
  <button type="submit" class="btn btn-primary" name="submit" style="background-color: #29a329; color: white;" onclick="window.location.href = 'decm_excel.php';" > Download  </button>

    <?php
  $tname=$_REQUEST['id'];
$sql = "SELECT * FROM tbl_staff WHERE tname='$tname'";
    // Execute the SQL query
    $result = $conn->query($sql);
    $r = $result->fetch_assoc();
    $tid = $r['tid'];

    $sql0 = "SELECT * FROM tbl_subjteacher WHERE teacherid='$tid'";
    $result0 = $conn->query($sql0);
    $row=$result0->fetch_assoc();
    $subid=$row['subid'];
    $_SESSION['subid']="$subid";

    $sql2 = "SELECT * FROM tbl_subject WHERE sub_id='$subid'";
    $result2 = $conn->query($sql2);
    $row2=$result2->fetch_assoc();
    $batchid=$row2['batch_id'];

    $sql3 = "SELECT * FROM tbl_student WHERE batch_id='$batchid'";
    $result3 = $conn->query($sql3);
    // $row3=$result3->fetch_assoc();
 
?>
<table  id="registerTable" "style="margin-left:20px;" class="table table-hover" >
<thead>
<tr>
     <th>NAME</th>
     <th>SERIES 1</th>
     <th>SERIES 2</th>
     <th>Assignment 1</th>
     <th>Assignment 2</th>
     <th>Assignment 3</th>
     
  </tr>
</thead>
 
 <?php
 if ($result3->num_rows > 0) {
  // output data of each row
  while($row3 = $result3->fetch_assoc()) {
    $lid=$row3['log_id'];
    $sql4="SELECT * FROM `super_academy`.`tab_reg` WHERE `log_id` ='$lid'";
    $result4 = $conn->query($sql4);
    $row4=$result4->fetch_assoc();
    $stud_id=$row4['stud_id'];
  
    $sql8="SELECT * from tbl_series1 where stud_id='$stud_id' AND sub_id='$subid'";
    $result8 = $conn->query($sql8);
    $row8 = $result8->fetch_array();

  $sql9="SELECT * from tbl_series2 where stud_id='$stud_id' AND subj_id='$subid'";
  $result9 = $conn->query($sql9);
  $row9 = $result9->fetch_array();

  $sql5="SELECT * from tbl_assignment1 where stud_id='$stud_id' AND subj_id='$subid'";
  $result5 = $conn->query($sql5);
  $row5 = $result5->fetch_array();

  $sql6="SELECT * from tbl_assignment2 where stud_id='$stud_id' AND subj_id='$subid'";
  $result6 = $conn->query($sql6);
  $row6 = $result6->fetch_array();

  $sql7="SELECT * from tbl_assignment3 where stud_id='$stud_id' AND subj_id='$subid'";
  $result7 = $conn->query($sql7); 
  $row7 = $result7->fetch_array();

 ?>
  <tr>
<td><?php echo $row4['sname'] ?></td>
<td><?php if($result8->num_rows>0){echo $row8['mark'];} else{echo 'NA';}   ?></td>
<td><?php if($result9->num_rows>0){echo $row9['mark'];} else{echo 'NA';}   ?></td>
<td><?php if($result5->num_rows>0){echo $row5['mark'];} else{echo 'NA';} ?></td>
<td><?php if($result6->num_rows>0){echo $row6['mark'];} else{echo 'NA';} ?></td>
<td><?php if($result7->num_rows>0){echo $row7['mark'];} else{echo 'NA';} ?></td>
<!-- <a href=""><button style="color:white; background-color:green; width:80px; height:30px;">Documents</button></a> -->
</td>
  </tr>
 <?php
 }
 }
    ?>

</table>

<?php mysqli_close($conn);  // close connection ?>
<br><br>

     
</body>    
      </div>
		</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script>
      function check(){
        window.location("http://localhost/smartacademy/sidebar-01/registeruser.php");
        return true;
      }
    </script>
  </body>
</html>
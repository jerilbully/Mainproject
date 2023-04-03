<?php
 session_start();
 if(!isset($_SESSION["LoginUser"])){
  header("Location:../login.php");
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
        <nav id="sidebar">
				<div class="p-4 pt-5">
		  		<a href="#" class="img logo rounded-circle mb-5" style="background-image: url(adminavatar.jpg);"></a>
	        <ul class="list-unstyled components mb-5">
	          <li class="active">
	            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">USERS</a>
	            <ul class="collapse list-unstyled" id="homeSubmenu">
                <li>
                    <a href="registeruser.php">Registered Users</a>
                </li>
                <li>
                    <a href="hodteacher.php">Teachers</a>
                </li>
                <li>
                    <a href="studentview.php">Students</a>
                </li>
	            </ul>
	          </li>
          <li>  
	              <a href="leavestatus.php">Leave Managment</a>
	          </li>
	          <li>
              <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Academic</a>
              <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a href="subject.php">Subject</a>
                </li>
                <li>
                    <a href="schedule\index.php">academic calender</a>
                </li>
                <li>
                    <a href="batchdetails.php">Batch Details</a>
                </li>
              </ul>
	          </li>
            <li>
              <a href="#attendance" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Attendance</a>
              <ul class="collapse list-unstyled" id="attendance">
                <li>
                    <a href="teacher/takeattendenceplus2.php">Teacher Attendance</a>
                </li>
                <li>
                    <a href="#">Page 2</a>
                </li>
                <li>
                    <a href="#">Page 3</a>
                </li>
              </ul>
	          </li>
	          
	        </ul>

	        <div class="footer">
	        	<p></p>
	        </div>

	      </div>
    	</nav>

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
                    <a class="nav-link" href="index.php">HOME</a>
                </li>  
              <li class="nav-item active">
                    <a class="nav-link" href="/smartacademy/login.php">LOGOUT</a>
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

  
<?php    
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
$url_query = $_GET['id'];

$sql1="SELECT batch_name from tbl_batch where batch_id='$url_query'";
$result1 = $conn->query($sql1);
if ($result1->num_rows > 0) {
// output data of each row
while($row = $result1->fetch_assoc()) {
  $bname = $row['batch_name'];
  $_SESSION['bname']=$bname;
}}

$sql3="SELECT * from tbl_classteacher where batch_id='$url_query' ";
$result3 = $conn->query($sql3);
if ($result3->num_rows > 0) {
    // output data of each row
    while($row = $result3->fetch_assoc()) {
      $tid = $row['tid'];

    $sql4="SELECT *from tbl_staff s,tbl_classteacher c where c.tid ='$tid' and c.tid=s.tid and c.batch_id='$url_query'";
    $result4 = $conn->query($sql4);
    $row4 = $result4->fetch_array();
    $tname=$row4['tname'];
    $_SESSION['tname']=$tname;
      ?>   
 <?php 
    }}
 ?>
 <br> <br> <br>
 <style>
html {
  box-sizing: border-box;
}

*, *:before, *:after {
  box-sizing: inherit;
}

.column {
  float: left;
  width: relative;  
  margin-bottom: 8px;
  padding: 0 8px;
  width: 350px;
  height: 550px;
}

@media screen and (max-width: 650px) {
  .column {
    
    display: block;
  }
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  height:350px;
  width:300px;
}

.container {
  padding: 0 16px;
}

.container::after, .row::after {
  content: "";
  clear: both;
  display: table;
}

.title {
  color: grey;
}

.button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
}

.button:hover {
  background-color: #555;
}
.button1 {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 25%;
}

.button1:hover {
  background-color: #555;
}
</style>
</head>
<body>
    <div style="margin-top:-8%;margin-bottom:2%;">
<h1 class="h1">
        <?php
          echo $_SESSION['bname'];
?>
        </h1>
<br> 
<h4>Teacher-in-Charge:
<?php
          echo $_SESSION['tname'];
?>
</h4>

<h3 style="text-align: center;">Subject</h3>
</div>
<table style="margin-left:20px;">

<tr>
   <th>Subject ID</th>
   <th>Subject</th>
   <th>Semester</th>
   
  
   
</tr>
<?php
$sql1 = "SELECT * from tbl_subject WHERE batch_id ='$url_query' ";
$result1 = $conn->query($sql1);

if ($result1->num_rows > 0) {
// output data of each row
while($row = $result1->fetch_assoc()) {
  $subid = $row['sub_id']; 
  $subname= $row['sub_name']; 
  $sem= $row['sem']; 

 


?>
<tr>
<td><?php echo $subid?></td>
<td><?php echo $subname?></td>
<td><?php echo $sem?></td>

</tr>
<?php
}
}
  ?>
</table>
<h3 style="text-align: center;">Student Details</h3>
<table style="margin-left:20px;">

<tr>
   <th>Student ID</th>
   <th>Student name</th>
   
   
  
   
</tr>
<?php
$sql5 = "SELECT * from tbl_student WHERE batch_id ='$url_query' ";
$result5 = $conn->query($sql5);

if ($result5->num_rows > 0) {
// output data of each row
while($row5 = $result5->fetch_assoc()) {
  $studid = $row5['log_id']; 
  
$sql6="SELECT * from tab_reg where log_id ='$studid'";
$result6 = $conn->query($sql6);
  $row6 = $result6->fetch_array();
  $sname =  $row6['sname'];
?>
<tr>
<td><?php echo $studid?></td>

<td><a href="hodviewmark.php?id=<?php echo $sname ?>"<?php echo $sname ?>"><?php echo $sname ?></a></td>

</tr>
<?php
}
}
  ?>
</table>
</body>
</html>

      </div>
		</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
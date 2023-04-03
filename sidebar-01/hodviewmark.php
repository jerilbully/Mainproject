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
    <?php include 'hodsidebar.php'; ?>

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
  <h1 id="h1">Progress card</h1>
  
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
 $sql = "SELECT * from tbl_classteacher";
 $result = $conn->query($sql);
 ?>
 
 <h2 class="mb-4">
        <?php
        $url_query=$_REQUEST['id'];
          echo $url_query;
          $sname=$url_query;
        ?>
        </h2>
        <?php

$sql = "SELECT * from tab_reg where sname='$sname'";
$result = $conn->query($sql);
  $row = $result->fetch_array();
  $sid =  $row['stud_id'];
  $lid =  $row['log_id'];

$sql1 = "SELECT * from tbl_student  where log_id='$lid'";
$result1 = $conn->query($sql1);
$row1 = $result1->fetch_array();
$bid =  $row1['batch_id']; 

$sql2 = "SELECT * from tbl_subject  where batch_id='$bid'";
$result2 = $conn->query($sql2);
if ($result2->num_rows > 0) {
 $row2 = $result2->fetch_array();

?>

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

<!-- <h2>Responsive "Meet The Team" Section</h2>
<p>Resize the browser window to see the effect.</p> -->

<table style="margin-left:20px;">

 <tr>
    <th>Course</th>
    <th>SERIES 1</th>
    <th>SERIES 2</th>
    <th>ASSIGNMENT 1</th>
    <th>ASSIGNMENT 2</th>
    <th>ASSIGNMENT 3</th>
    

 </tr>
 <?php

  // output data of each row
  
 
    $subid= $row2['sub_id'];
    // echo $subid;
    // echo $sid;
  $sql8="SELECT * from tbl_series1 where stud_id='$sid' AND sub_id='$subid'";
  $result8 = $conn->query($sql8);
  $row8 = $result8->fetch_array();

  $sql4="SELECT * from tbl_series2 where stud_id='$sid' AND subj_id='$subid'";
  $result4 = $conn->query($sql4);
  
  $row4 = $result4->fetch_array();
  
  $sql5="SELECT * from tbl_assignment1 where stud_id='$sid' AND subj_id='$subid'";
  $result5 = $conn->query($sql5);
  
  $row5 = $result5->fetch_array();
  $sql6="SELECT * from tbl_assignment2 where stud_id='$sid' AND subj_id='$subid'";
  $result6 = $conn->query($sql6);
  
  $row6 = $result6->fetch_array();
  $sql7="SELECT * from tbl_assignment3 where stud_id='$sid' AND subj_id='$subid'";
  $result7 = $conn->query($sql7);
  
  $row7 = $result7->fetch_array();

  ?>
   <tr>
<td><?php echo $row2['sub_name'] ?></td>
<td><?php if($result8->num_rows>0){echo $row8['mark'];} else{echo 'NA';} ?></td>
<td><?php if($result4->num_rows>0){echo $row4['mark'];} else{echo 'NA';}   ?></td>
<td><?php if($result5->num_rows>0){echo $row5['mark'];} else{echo 'NA';} ?></td>
<td><?php if($result6->num_rows>0){echo $row6['mark'];} else{echo 'NA';} ?></td>
<td><?php if($result7->num_rows>0){echo $row7['mark'];} else{echo 'NA';} ?></td>
</tr><?php
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
<?php
session_start(); 
include './connection.php';
if(!isset($_SESSION["LoginUser"])){
 header("Location:../login.php");
}

?>
<html lang="en">
  <head>
  	<title>Smart Academy</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		<link rel="stylesheet" href="table.css"> 
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">
  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
    <?php include 'studentsidebar.php'; ?>

        <h2 class="mb-4">Welcome
        <?php
          echo $_SESSION['LoginUser'];
          $sname=$_SESSION['LoginUser'];
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
 

?>
<br> <br> <br>
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
  while($row2 = $result2->fetch_assoc()) {
  // output data of each row
  
 
    $subid= $row2['sub_id'];

  $sql3="SELECT * from tbl_series1 where stud_id='$sid' AND sub_id='$subid'";
  $result3 = $conn->query($sql3);
  
  $row3 = $result3->fetch_array();

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
  // $markk="";
  // $markk=;

  ?>
   <tr>
<td><?php echo $row2['sub_name'] ?></td>
<td><?php if($result3->num_rows>0){echo $row3['mark'];} else{echo 'NA';}   ?></td>
<td><?php if($result4->num_rows>0){echo $row4['mark'];} else{echo 'NA';}   ?></td>
<td><?php if($result5->num_rows>0){echo $row5['mark'];} else{echo 'NA';}   ?></td>
<td><?php if($result6->num_rows>0){echo $row6['mark'];} else{echo 'NA';}   ?></td>
<td><?php if($result7->num_rows>0){echo $row7['mark'];} else{echo 'NA';}   ?></td>

</tr><?php
}}
   ?>

</table>
      </div>
		</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
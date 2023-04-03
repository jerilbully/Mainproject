<?php
session_start(); 
include 'connection.php';
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
    <?php 
    $url_query = $_GET['id'];
    include 'studentsidebar.php'; 
    ?> 
 


    <table style="margin-left:20px;">

<tr>
   <th>Subject</th>
   <th>Title</th>
   <th>Question</th>
   <th>From time</th>
   <th>Close time</th>
   <th>Upload </th>
</tr>
<?php
  $sql = "SELECT * from tab_reg where sname='$url_query'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $id=$row['log_id'];

  $sql1 = "SELECT * from tbl_student where log_id='$id'";
  $result1 = $conn->query($sql1);
  $row1 = $result1->fetch_assoc();
  $bid=$row1['batch_id'];

  $sql2 = "SELECT * from tbl_subject where batch_id='$bid'";
  $result2 = $conn->query($sql2);
  if ($result2->num_rows > 0) {
        // output data of each row
        while($row2 = $result2->fetch_assoc()) {
      $sid=$row2['sub_id'];
      $subname=$row2['sub_name'];
    //  echo $sid;
      $sql3 = "SELECT * from tbl_assignment where subject_id='$sid'";
      $result3 = $conn->query($sql3);
    //   $row3 = $result3->fetch_assoc();
    if ($result3->num_rows > 0) {
        // output data of each row
        while($row3 = $result3->fetch_assoc()) {
          $aid=$row3['assig_id'];
     
  
 ?>

<tr>
<td><?php echo $row2['sub_name'] ?></td>
<td><?php echo $row3['title'] ?></td>
<td><a href="documents\<?php echo $row3['question'] ?>">Click here</a></td>
<td><?php echo $row3['fromtime'] ?></td> 
<td><?php echo $row3['totime'] ?></td>
<td><a href="uploadassign.php?id=<?php echo $aid;?>&studid=<?php echo $id;?>"><button style="color:white; background-color:green; width:80px; height:30px;">upload</button></td>

</tr>
<?php
 }}}
 }
    ?>
    </table>
    
    </div>
        
    <?php
//  }
//  }
    ?>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
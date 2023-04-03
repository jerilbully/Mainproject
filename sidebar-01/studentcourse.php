<?php
session_start(); 
 
// if(!isset($_SESSION["LoginUser"])){
//  header("Location:../login.php");
// }
include 'connection.php';

?>
<html lang="en">
  <head>
  	<title>Smart Academy</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		<link rel="stylesheet" href="table.css"> 
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">
  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
    <?php include 'studentsidebar.php'; ?>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5">


        <h2 class="mb-4">
            Course details
        </h2>
        <h4  class="mb-4"><ul>
            Your Teachers
        </h4>
        
        <table style="margin-left:20px;">

<tr>
   <th>Subject</th>
   <th>Teacher</th>
  
   
</tr>
<?php
$url_query = $_GET['id'];
$sql = "SELECT * from tab_reg WHERE sname='$url_query'";
$result = $conn->query($sql);
$row=$result->fetch_assoc();
  $id=$row['log_id'];

  $sql1="SELECT * from tbl_student WHERE log_id='$id'";
  $result1 = $conn->query($sql1);
  $row1=$result1->fetch_assoc();
  $bid = $row1['batch_id'];

  $sql2="SELECT * from tbl_subject WHERE batch_id ='$bid'";
  $result2 = $conn->query($sql2);
  if ($result2->num_rows > 0) {
    // output data of each row
    while($row2 = $result2->fetch_assoc()) {
 
  $subname = $row2['sub_name'];
  $subid = $row2['sub_id'];


  $sql3="SELECT * from tbl_subjteacher WHERE subid='$subid'";

  $result3 = $conn->query($sql3);
  if ($result3->num_rows > 0)
  {
    while($row3= $result3->fetch_assoc()) {
        $teachid=$row3['teacherid'];
//   echo $teachid;

  $sql4="SELECT * from tbl_staff WHERE tid = '$teachid'";
  $result4 = $conn->query($sql4);
  $row4=$result4->fetch_assoc();
  $tname=$row4['tname'];
?>
<tr>
  <td><?php echo $subname?></td>
  <td><?php echo $tname?></td>
 
  
</tr>
<?php
    }
}
}
}
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
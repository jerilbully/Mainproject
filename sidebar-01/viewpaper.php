<link rel="stylesheet" href="table.css">
<?php
session_start();

$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "super_academy";

$conn = new mysqli($servername,$username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: "
        . $conn->connect_error);
}
$url_query = $_GET['id'];
 $sql = "SELECT * from tbl_asignans WHERE assignid='$url_query' ";
 $result = $conn->query($sql);
 ?>

 <br> <br> <br>
 <h1><b>Student Uploads</b><h1>
 <table style="margin-left:20px;">

  <tr>
     <th>Student Name</th>
     <th>Answer</th>
  </tr>
 <?php



 if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $logid=$row['studid'];



    $sql1="SELECT * from tbl_login where log_id='$logid'";
    $result1 = $conn->query($sql1);
    $row1=$result1->fetch_assoc()



 ?>
  <tr>


<td><?php echo $row1['username'] ?></td>
<td><a href="documents\<?php echo $row['answer'] ?>">Click here</a></td>

</td>
  </tr>
 <?php
 }
 }
    ?>
    <a href="assignmentanswer.php">back</a>

</table>
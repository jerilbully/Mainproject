<?php
  session_start(); 
 
  if(!isset($_SESSION["LoginUser"])){
   header("Location:../login.php");
  }
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "super_academy";
 
 // Create connection
$conn = new mysqli($servername,$username,$password,$dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: "
        . $conn->connect_error);
}

header("Content-type: application/vnd.ms-excel");
  header("Content-Disposition: attachment; filename=Registered_Managers.xls" );
  header("Expires: 0");
  header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
  header("Pragma: public");
?>
<table>
  <thead>
    <tr>
      <th>Name</th>
      <th>Admission No</th>
      <th>-Address</th>

      
   
    </tr>
  </thead>
  <tbody>
    <?php
    $qryreport = mysqli_query($conn,"SELECT * from tab_reg ") or die(mysqli_error());

    $sqlrows=mysqli_num_rows($qryreport);
    WHILE ($reportdisp=mysqli_fetch_array($qryreport)) {
    ?>
    <tr>
      <td><?php echo $reportdisp['sname'] ?></td>
      <td><?php echo $reportdisp['admno'] ?></td>
      <td><?php echo $reportdisp['sadd'] ?></td>
      
    <?php 
    }
    ?>
  </tbody>
</table>
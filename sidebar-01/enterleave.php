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
}else{
    echo "Connected";
}

 $fromdate = $_REQUEST['fromdate'];
 $todate = $_REQUEST['todate'];
 $reason = $_REQUEST['reason'];
 $subteach = $_REQUEST['subteach'];
 $url_query = $_GET['id'];
$status="pending";
 $role="teacher";
  
$sql1="INSERT INTO `tbl_leave`( `username`, `fromdate`, `todate`,`subteach`, `leavereason`, `lstatus`, `role`)
 VALUES ('$url_query','$fromdate','$todate','$subteach','$reason','$status','$role')";
  
if($conn->query($sql1) === TRUE)
{
    
        echo "Successful updation";
    }
    else
   {
        echo "updation failed ";
   }
   header('Location:teachermain.php'); 
   echo "Successful inserted";

// else
// {
//     echo "Insertion failed";
// }

?>

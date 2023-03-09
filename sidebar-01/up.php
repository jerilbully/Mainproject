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




 if(isset($_GET['type']) && $_GET['type']!=''){
  $type=($_GET['type']);
  if($type=='status'){
    $operation=($_GET['operation']);
    $id=($_GET['id']);

    if($operation=='accept'){
      $status='0';
    }
    $update_status="UPDATE tab_reg set sstage='$status'where log_id='$id'";
    mysqli_query($conn,$update_status);
    $update_status1="UPDATE tbl_login set sstatus='$status'where log_id='$id'";
    mysqli_query($conn,$update_status1);

    $sql1="INSERT INTO `tbl_student`(`stud_id`, `log_id`, `batch_id`) VALUES ('','$id','1')";
    mysqli_query($conn,$sql1);
    header("location: http://localhost/smartacademy/sidebar-01/registeruser.php");
  }

}        
?>
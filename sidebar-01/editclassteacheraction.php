<?php include 'connection.php'?>

<?php
 $batch = $_REQUEST['batch'];
 $teacher = $_REQUEST['teacher'];


 $sql1="SELECT * FROM tbl_staff WHERE tname='$teacher'";
 $result1 = $conn->query($sql1);
 $row1 = $result1->fetch_array();
 $tid =  $row1['tid'];


 $sql2="SELECT * FROM tbl_batch WHERE batch_name='$batch'";
 $result2 = $conn->query($sql2);
 $row2 = $result2->fetch_array();
 $batchid=$row2['batch_id'];
 
 $sql="UPDATE tbl_classteacher SET tid = '$tid'  WHERE batch_id = '$batchid'";
if($conn->query($sql) === TRUE)
{
    echo "insertion sucessful";
}
header('Location:classteacher.php'); 


?>

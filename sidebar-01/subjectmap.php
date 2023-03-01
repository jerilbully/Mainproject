<?php include 'connection.php'?>

<?php
 $subject = $_REQUEST['subname'];
 $semester = $_REQUEST['semester'];
 $batch = $_REQUEST['batch'];
 $sql1="SELECT  batch_id FROM tbl_batch WHERE batch_name='$batch'";
 $result1 = $conn->query($sql1);
 $row1 = $result1->fetch_array();
 $bid =  $row1['batch_id'];
 $sql="INSERT INTO tbl_subject ( `sub_name`,`batch_id`,`sem`)VALUES('$subject',$bid,'$semester')";
 

if($conn->query($sql) === TRUE)
{
    echo "insertion sucessful";
}
header('Location:subject.php'); 


?>


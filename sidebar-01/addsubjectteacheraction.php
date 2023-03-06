<?php include 'connection.php'?>

<?php
 $subject = $_REQUEST['subject'];
 $teacher = $_REQUEST['teacher'];

 $sql1="SELECT  * FROM tbl_subject WHERE sub_name='$subject'";
 $result1 = $conn->query($sql1);
 $row1 = $result1->fetch_array();
 $subid =  $row1['sub_id'];

 $sql2="SELECT  * FROM tbl_staff WHERE tname='$teacher'";
 $result2 = $conn->query($sql2);
 $row2 = $result2->fetch_array();
 $teacherid =  $row2['tid'];

 $sql="INSERT INTO `tbl_subjteacher` (`subtid`, `subid`, `teacherid`) VALUES ('','$subid','$teacherid')";
 

if($conn->query($sql) === TRUE)
{
    echo "insertion sucessful";
}
header('Location:subjectteacher.php'); 


?>


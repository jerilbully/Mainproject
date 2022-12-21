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

 $subject = $_REQUEST['subject'];
 $teacher = $_REQUEST['teacher'];
                            

 
$result1="SELECT rsub_id FROM tbl_regsub where rsubname='$subject'";
$a=$conn->query($result1);
if($a->num_rows>0)
   {

foreach($a as $data)

{

   $rsub_id=$data['rsub_id'];
}

   }

$result2="SELECT tid FROM tbl_staff where tname='$teacher'";
$b=$conn->query($result2);
if($b->num_rows>0)
   {

foreach($b as $data)

{

   $tid=$data['tid'];
}

   }


$sql1 = "INSERT INTO tbl_teahersubmap( rsub_id,tid) VALUES ('$rsub_id','$tid')";
if($conn->query($sql1) === TRUE)
{
    echo "insertion sucessful";
}
header('Location:subject.php'); 


?>


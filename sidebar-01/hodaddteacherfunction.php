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

 $tname = $_REQUEST['tname'];
 $tadd = $_REQUEST['tadd'];
 $tphoneno = $_REQUEST['tphoneno'];
 $tdoj = $_REQUEST['tdoj'];
 $temail = $_REQUEST['temail'];
 $tqual = $_REQUEST['tqual'];
 $tpass = $_REQUEST['tpass'];
 $role = "teacher";

 $hash = md5($_REQUEST['tpass']);
 $tpass=$hash;
  
 $sql = "INSERT INTO tbl_login( log_id,username,password,role) VALUES ('','$tname','$tpass','$role')";
   
 $result=$conn->query($sql);
 
$sql2="SELECT log_id from tbl_login where username='$tname'";
$result=$conn->query($sql2);
if($result->num_rows>0)
{
echo "hey";
foreach($result as $data)

{

$log_id=$data['log_id'];
}

}
$sql1 ="INSERT INTO tbl_staff VALUES ('','$log_id','$tname','$tadd','$tphoneno','$tdoj','$temail','$tqual','$tpass','')";
    if($conn->query($sql1) === TRUE)
    {
        echo "Successful inserted login";
    }
    else
   {
        echo "Insertion failed in login";
   }
   header('Location:hodteacher.php'); 
   echo "Successful inserted";







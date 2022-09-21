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

 $sname = $_REQUEST['Sname'];
 $admno=$_REQUEST['admno'];
 $sadd=$_REQUEST['Saddr'];
 $sdob=$_REQUEST['Sdob'];
  $sphoneno=$_REQUEST['Sphone'];
 $semail=$_REQUEST['Semail'];
 $course=$_REQUEST["course"];
 $hostel=$_REQUEST["hostel"];
 $role = "student";

 $hash = md5($_REQUEST['Spassword']);
 $spass=$hash;
  
$sql = "INSERT INTO tab_reg VALUES ('','$sname','$admno','$sadd','$sdob','$sphoneno','$semail','$course','$hostel','$spass','')";
  
if($conn->query($sql) === TRUE)
{
    $sql1 = "INSERT INTO tbl_login( username,password,role) VALUES ('$sname','$spass','$role')";
    if($conn->query($sql1) === TRUE)
    {
        echo "Successful inserted login";
    }
    else
   {
        echo "Insertion failed in login";
   }
   header('Location:login.php'); 
   echo "Successful inserted";
}
else
{
    echo "Insertion failed";
}






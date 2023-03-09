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

 $email = $_REQUEST['email'];
 $add = $_REQUEST['addr'];
 $phoneno = $_REQUEST['phoneno'];
 $url_query = $_GET['id'];

 
  
$sql = "UPDATE tab_reg  SET semail='$email',sadd='$add',sphoneno='$phoneno' where sname='$url_query'";
  
if($conn->query($sql) === TRUE)
{
    
        echo "Successful updation";
    }
    else
   {
        echo "updation failed ";
   }
   echo"<script>alert('updated sucessfully'); window.location.href='studentmain.php'; </script>";
   echo "Successful inserted";

// else
// {
//     echo "Insertion failed";
// }

?>

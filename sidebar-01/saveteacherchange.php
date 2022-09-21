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
 $add = $_REQUEST['address'];
 $phoneno = $_REQUEST['phoneno'];
 $qual=$_REQUEST['qual'];
 $url_query = $_GET['id'];

 
  
$sql = "UPDATE tbl_staff  SET temail='$email',tadd='$add',tphoneno='$phoneno', tqual='$qual'where tname='$url_query'";
  
if($conn->query($sql) === TRUE)
{
    
        echo "Successful updation";
    }
    else
   {
        echo "updation failed ";
   }
   header('Location:teacherupdate.php?id='.$url_query); 
   echo "Successful inserted";

// else
// {
//     echo "Insertion failed";
// }

?>

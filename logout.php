<?php
  include('session.php');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "";
 
 // Create connection
$conn = new mysqli($servername,$username,$password,$dbname);
	
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " 
        . $conn->connect_error);
}




session_destroy();
header('location:../home.php');
?><?php
	session_start();
	session_destroy();

	header('location:login.php');
?>
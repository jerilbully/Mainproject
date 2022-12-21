<?php
include 'connection.php';
$id = $_GET['id']; // get id through query string
 
$del = mysqli_query($conn, "UPDATE `tbl_leave` SET `lstatus`='accepted' WHERE leave_id='$id'"); // update query

if($del)
{
    mysqli_close($conn); // Close connection
    header("location:leavestatus.php"); // redirects to all records page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete


    
}
?>  
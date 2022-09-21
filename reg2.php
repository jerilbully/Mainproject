<?php
include "connection.php"; 





if(isset($_POST["Sname"]) && isset($_POST["Saddr"]) && isset($_POST["Sphone"]) && isset($_POST["Semail"]) && isset($_POST["Spassword"]) )
{


//    $sname= $_POST["Sname"];
//    $sphone= $_POST["Sphone"];
//    $saddress= $_POST["Saddr"];
//    $semail=$_POST["Semail"];
//    $spassword= $_POST["Spassword"];
//    $role="student";  
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
   $verify_token=md5(rand());
  
  
   
   /*$result = mysqli_query($con,"INSERT INTO `jobseeker_details`(`JS_First_Name`, `JS_Last_Name`, `JS_Email`, `JS_Password`, `User_Type`) VALUES ('$firstname','$lastname','$email','$password','$uservalue')");
   $result2= mysqli_query($con,"INSERT INTO `login_details`(`Email`, `Password`, `User_Type`) VALUES ('$email','$password','$uservalue')");
 */
$check_email_query="SELECT semail FROM tab_reg WHERE semail='$semail' LIMIT 1";
$check_email_query_run=mysqli_query($conn,$check_email_query);

if(mysqli_num_rows($check_email_query_run)>0)
    {
    $_SESSION['status'] = "Email Id already Exists";
    header('Location:register.html');
    }
    else{
    $sql = "INSERT INTO tbl_login( log_id,username,password,role) VALUES ('','$sname','$spass','$role')";
   
    $result=$conn->query($sql);
    
   $sql2="SELECT log_id from tbl_login where username='$sname'";
   $result=$conn->query($sql2);
   if($result->num_rows>0)
   {
echo "hey";
foreach($result as $data)

{

   $log_id=$data['log_id'];
}

   }
   $sql1 = "INSERT INTO tab_reg VALUES ('','$log_id','$sname','$admno','$sadd','$sdob','$sphoneno','$semail','$course','$hostel','$spass','')"; 
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

    }

?>
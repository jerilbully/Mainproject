<?php
 session_start();
 require_once "sidebar-01\connection.php";
 $msg = "";
 $role="";
 if(isset($_POST["btn"]))
 {
	 $uname = $_POST["uname"];
	 $pass= md5($_POST["password"]);
     
	 
	$query = "SELECT * FROM tbl_login WHERE username='$uname' AND password='$pass'";
	$result = mysqli_query($conn,$query);
	//echo $result->error;
	//$result = $conn->query($query);
	if(mysqli_num_rows($result)>0)
	{
		echo $result->username;
		while($row = mysqli_fetch_assoc($result))
		{
			if($row["role"] == "hod")
			{
				$_SESSION['LoginUser'] = $row["username"];
				$_SESSION['LoginRole'] = $row["role"];
				header('Location:sidebar-01/index.php');
			}
			else if($row["role"] == "student")
			{

				 
				$_SESSION['LoginUser'] = $row["username"];
				$_SESSION['LoginRole'] = $row["role"];
				
				header('Location:sidebar-01/studentmain.php');
			}
			else if($row["role"] == "teacher")
			{
				$_SESSION['LoginUser'] = $row["username"];
				$_SESSION['LoginRole'] = $row["role"];
				header('Location:sidebar-01/teachermain.php');
				
			}
			
		}
	}
	else
	{
		header('Location: login.php');
		$_SESSION['error'] = "invalid Details";
	}
	 
 }
 
 echo $role;
 //echo $msg = "Invalid E-mail and Password";

?>
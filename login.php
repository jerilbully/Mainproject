
<?php
  session_start();
$servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "super_academy";
 
 // Create connection
$conn = new mysqli($servername,$username,$password,$dbname);
	
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " 
        . $conn->connect_error);
}


 require_once "sidebar-01\connection.php";
 $msg = "";
 $role="";

    if (isset($_GET['verification'])) {
        if (mysqli_num_rows(mysqli_query($conn, "SELECT * FROM tbl_login WHERE code='{$_GET['verification']}'")) > 0) {
            $query = mysqli_query($conn, "UPDATE tbl_login SET code='' WHERE code='{$_GET['verification']}'");
            
            if ($query) {
                $msg = "<div class='alert alert-success'>Account verification has been successfully completed.</div>";
            }
        } else {
            header("Location: login.php");
        }
    }
	
	
	
if (isset($_POST['btn'])){

 $uname = $_POST["uname"];
	 $pass= md5($_POST["password"]);
     
	 
	$query = "SELECT * FROM tbl_login WHERE username='$uname' AND password='$pass'";
	$result = mysqli_query($conn,$query);
	 if (mysqli_num_rows($query) > 0) {
	$sql2="SELECT code FROM tbl_login WHERE username='{$uname}'";
   
	
	 if ($result=$conn->query($sql2)== NULL) {
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
		$msg = "<div class='alert alert-info'>Invalid credentials</div>";
	}
	  
	 }
	 else{
		 $msg = "<div class='alert alert-info'>First verify your account and try again.</div>";
	
 }
 
}
else {
$msg = "<div class='alert alert-danger'>Invalid credentials</div>";
}
}

?>

<!DOCTYPE html>
<html lang="zxx">

<head>
   <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://codepen.io/skjha5993/pen/bXqWpR.css">
    <title>Smart Academy</title>
    <style>
      .border{
        padding:2rem 1rem;margin-bottom:4rem;background-color:#e9ecef;border-radius:.3rem;width: 550px;
      }
    </style>
</head>
<body>
<center>

<div class="alert">
                    <?php
                    if(isset($_SESSION['status']))
                    {
                        echo "<h4 style='color:#cccc00;''>".$_SESSION['status']."</h4>";
                        unset($_SESSION['status']);
                    }
                    ?>
                </div>


    <div class="container">
	<?php echo $msg; ?>
    <form action="log.php" method="post" >
            <h2 class="text-center">Welcome to Smart Academy</h2>
        <div class="border" >
            <div class="col-sm-6 form-group">
              
                <input type="text" class="form-control" name="uname" id="name-f" placeholder="username" required>
            </div>
            <div class="col-sm-6 form-group">
            
              
              
                <input type="password" class="form-control" name="password" id="name-l" placeholder="password" required>
            </div>
            
            <div class="col-sm-12">
              <p>Dont have account? <a href="register.php">Register here</a>.

            <div class="col-sm-6 form-group mb-0">
              <center>
              <input type="submit" name="btn" id="submit" value="LOGIN">
              <?php  if(isset($_POST['error'])){echo $_POST['error'];}?>
              </center>
               
            </div>
            
        </div>
      </div>
        </form>
    </div>
  </center>


</body>

</html>

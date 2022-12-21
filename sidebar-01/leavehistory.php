<?php
 session_start(); 
 


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
$sql = "SELECT * from tbl_staff where tname=''" ;
$result = $conn->query($sql);
?>
 
<html lang="en">
  <head>
  	<title>Smart Academy</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
    <link rel="stylesheet" href="table.css"> 
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">
  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="p-4 pt-5">
		  		<a href="#" class="img logo rounded-circle mb-5" style="background-image: url(adminavatar.jpg);"></a>
	        <ul class="list-unstyled components mb-5">
	          <li class="active">
	            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">USERS</a>
	            <ul class="collapse list-unstyled" id="homeSubmenu">
                <li>
                <a href="teacherupdate.php?id=<?php   echo $_SESSION['LoginUser'];?>">Update Profile </a>
                </li>
                <li>
                    <a href="#">Teachers</a>
                </li>
                <li>
                    <a href="#">Students</a>
                </li>
	            </ul>
	          </li>
	         
	          <li>
              <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Academic</a>
              <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a href="#">Page 1</a>
                </li>
                <li>
                    <a href="#">Page 2</a>
                </li>
                <li>
                    <a href="#">Page 3</a>
                </li>
              </ul>
	          </li>
	          <li>
              <a href="teacherleave.php?id=<?php   echo $_SESSION['LoginUser'];?> `">Leave</a>
	          </li>
	          <li>
              <a href="#">test</a>
	          </li>
	        </ul>

	        <div class="footer">
	        	<p></p>
	        </div>

	      </div>
    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">

            <button type="button" id="sidebarCollapse" class="btn btn-primary">
              <i class="fa fa-bars"></i>
              <span class="sr-only">Toggle Menu</span>
            </button>
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="nav navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="/smartacademy/login.php">LOGOUT</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#"></a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
             
        

        <h2 class="mb-4">YOUR LEAVE HISTORY
  
        </h2>
        <?php
$id = $_GET['id'];
 $sql = "SELECT * from tbl_leave where username='$id'";
 $result = $conn->query($sql);
 ?>
 <br> <br> <br>
 <table style="margin-left:20px;">

  <tr>
     <th>Reason</th>
     <th>From Date</th>
     <th>Todate</th>
     <th>Status</th>
     
  </tr>
 <?php
 if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
 ?>
  <tr>
    <td><?php echo $row['leavereason'] ?></td>
<td><?php echo $row['fromdate'] ?></td>
<td><?php echo $row['todate'] ?></td>
<td><?php echo $row['lstatus'] ?></td>

  </tr>
 <?php
 }
 }
    ?>
       
    </div>
		</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html> 


<?php
 session_start();
 if(!isset($_SESSION["LoginUser"])){
  header("Location:../login.php");
 }
?>
<html lang="en">
  <head>
  <title>Users list </title>  
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
                    <a href="registeruser.php">Registered Users</a>
                </li>
                <li>
                    <a href="hodteacher.php">Teachers</a>
                </li>
                <li>
                    <a href="#">Students</a>
                </li>
	            </ul>
	          </li>
	          <li>
	              <a href="#">About</a>
	          </li>
	          <li>
              <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Academic</a>
              <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a href="subject.php">Subject</a>
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
              <a href="#">test</a>
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
              <li class="nav-item">
                    <a class="nav-link" href="index.php">HOME</a>
                </li>  
              <li class="nav-item active">
                    <a class="nav-link" href="/smartacademy/logout.php">LOGOUT</a>
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

        <!-- <h2 class="mb-4"></h2> -->


   

<!-- <a href="admin_dashboard.php"><button class="button-54">Dashboard</button></a> -->
  <h1 id="h1">Student Detail</h1><br> <br>
  <button type="submit" class="btn btn-primary" name="submit" style="background-color: #29a329; color: white;" onclick="window.location.href = 'decm_excel.php';" > Download  </button>
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
}


 ?>
 <br> <br> <br>
 <table style="margin-left:20px;">

  <tr>
     <th>NAME</th>
     <th>COURSE</th>
     <th>BATCH</th>
     <th>CLASS TEACHER</th>
     
  </tr>
 <?php
$sql1 = "SELECT * from tbl_student";
$result1 = $conn->query($sql1);

 if ($result1->num_rows > 0) {
  // output data of each row
  while($row = $result1->fetch_assoc()) {
    $bid = $row['batch_id']; 
    $sname = $row['student_name']; 

    $sql2 = "SELECT * from tbl_batch where batch_id = '$bid'";
    $result2 = $conn->query($sql2);
    $row2 = $result2->fetch_array();
    $bname =  $row2['batch_name'];
    $cid = $row2['course_id'];
    $btid = $row2['batch_teacher'];

    $sql3 = "SELECT * from tbl_course where course_id = '$cid'";
    $result3 = $conn->query($sql3);
    $row3 = $result3->fetch_array();
    $cname =  $row3['cousrename'];

    $sql4 = "SELECT * from tbl_staff where tid = '$btid'";
    $result4 = $conn->query($sql4);
    $row4 = $result4->fetch_array();
    $tname =  $row4['tname'];


 ?>
  <tr>
    <td><?php echo $sname?></td>
    <td><?php echo $bname?></td>
    <td><?php echo $cname?></td>
    <td><?php echo $tname?></td>
    
  </tr>
 <?php
 }
 }
    ?>

</table><!-- <?php
session_start();
?>   -->


<?php mysqli_close($conn);  // close connection ?>
<br><br>
 
     
</body>    
      </div>
		</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
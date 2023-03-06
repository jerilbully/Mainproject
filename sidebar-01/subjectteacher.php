<?php
 session_start();
 if(!isset($_SESSION["LoginUser"])){
  header("Location:../login.php");
 }
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
                    <a href="registeruser.php">Registered Users</a>
                </li>
                <li>
                    <a href="hodteacher.php">Teachers</a>
                </li>
                <li>
                    <a href="studentview.php">Students</a>
                </li>
	            </ul>
	          </li>
          <li>  
	              <a href="leavestatus.php">Leave Managment</a>
	          </li>
	          <li>
              <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Academic</a>
              <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a href="subject.php">Subject</a>
                </li>
                <li>
                    <a href="schedule\index.php">academic calender</a>
                </li>
                <li>
                    <a href="batchdetails.php">Batch Details</a>
                </li>
              </ul>
	          </li>
            <li>
              <a href="#attendance" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Attendance</a>
              <ul class="collapse list-unstyled" id="attendance">
                <li>
                    <a href="teacher/takeattendenceplus2.php">Teacher Attendance</a>
                </li>
                <li>
                    <a href="#">Page 2</a>
                </li>
                <li>
                    <a href="#">Page 3</a>
                </li>
              </ul>
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
                    <a class="nav-link" href="/smartacademy/logout.php">LOGOUT</a>
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

        <h2 class="mb-4">Subject Details</h2>
        <button class="button1" ><a style="color:red;" href="addsubjectteacher.php"> Assign Teacher</a></button>
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
     <th>TEACHER NAME</th>
     <th>SUBJECT</th>
     <th>BATCH</th>
     <th>SEMESTER</th>
     
  </tr>
 

    <?php
    $sql1 = "SELECT * from tbl_subjteacher";
    $result1 = $conn->query($sql1);
    
    if ($result1->num_rows > 0) {
    // output data of each row
    while($row = $result1->fetch_assoc()) {
      $teachid = $row['teacherid']; 
      $subject= $row['subid']; 
      
      $sql2 = "SELECT * from tbl_subject where sub_id = '$subject'";
      $result2 = $conn->query($sql2);
      $row2 = $result2->fetch_array();
      $subjectname = $row2['sub_name']; 
      $batch = $row2['batch_id']; 
      $sem = $row2['sem']; 

      $sql3 = "SELECT * from tbl_staff where tid = '$teachid'";
      $result3 = $conn->query($sql3);
      $row3 = $result3->fetch_array();
      $teachername = $row3['tname'];

      $sql4 = "SELECT * from tbl_batch where batch_id = '$batch'";
      $result4 = $conn->query($sql4);
      $row4 = $result4->fetch_array();
      $batchname = $row4['batch_name'];
      
    ?>

 


<tr>
  <td><?php echo $teachername?></td>
  <td><?php echo $subjectname?></td>
  <td><?php echo $batchname?></td>
  <td><?php echo $sem?></td>
 
  
</tr>
<?php
}
}
  ?>



<?php mysqli_close($conn);  // close connection ?>
 
      </div>
		</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
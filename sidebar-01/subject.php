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
    <?php include 'hodsidebar.php'; ?>

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
        <button class="button1" ><a style="color:red;" href="addsubject.php"> ADD Subject</a></button>
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
 <table style="margin-left:20px;" id="subTable">

  <tr>
     <th>SUBJECT ID</th>
     <th>SUBJECT</th>
     <th>BATCH</th>
     <th>SEMESTER</th>
     
  </tr>
  <?php
    $sql1 = "SELECT * from tbl_subject";
    $result1 = $conn->query($sql1);
    
    if ($result1->num_rows > 0) {
    // output data of each row
    while($row = $result1->fetch_assoc()) {
      $subid= $row['sub_id']; 
      $subjectname = $row['sub_name']; 
      $batch=$row['batch_id'];
      $sem=$row['sem'];

      
      // $sql3 = "SELECT * from tbl_staff where tid = '$teachid'";
      // $result3 = $conn->query($sql3);
      // $row3 = $result3->fetch_array();
      // $teachername = $row3['tname'];

      $sql4 = "SELECT * from tbl_batch where batch_id = '$batch'";
      $result4 = $conn->query($sql4);
      $row4 = $result4->fetch_array();
      $batchname = $row4['batch_name'];
      
    ?>

 


<tr>
  <td><?php echo $subid?></td>
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
    <link rel="stylesheet" href="//cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
    <script>
        $(document).ready( function () {
            $('#subTable').DataTable();
        } );
    </script>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
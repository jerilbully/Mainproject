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
        <?php include 'teachersidebar.php'; ?>

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
                    <a class="nav-link" href="teachermain.php">HOME</a>
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
  <h1 id="h1">Assigment History</h1><br> <br>
  <!-- <button type="submit" class="btn btn-primary" name="submit" style="background-color: #29a329; color: white;" onclick="window.location.href = 'decm_excel.php';" > Download  </button> -->
<!-- <?php
session_start();
?>   -->
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
$url_query = $_GET['id'];

$sql1="SELECT * from tbl_staff WHERE tname='$url_query'";
$result1 = $conn->query($sql1);
$row1 = $result1->fetch_assoc();
$tid=$row1['tid'];

$sql2="SELECT * from tbl_subjteacher WHERE teacherid='$tid'";
$result2 = $conn->query($sql2);
$row2 = $result2->fetch_assoc();
if ($result2->num_rows >0){
// echo "No assigments have been assigned";

$subid=$row2['subid'];

 $sql = "SELECT * from tbl_assignment WHERE status='1' AND subject_id='$subid'";
 $result = $conn->query($sql);
 ?>
 <br> <br> <br>
 <table style="margin-left:20px;">

  <tr>
     <th>Title</th>
     <th>Question</th>
     <th>From date</th>
     <th>To date</th>
     
     <th colspan="2">Action</th>
  </tr>
 <?php
 if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $assid=$row['assig_id'];
 ?>
  <tr>
<td><?php echo $row['title'] ?></td>
<td><a href="documents\<?php echo $row['question'] ?>">Click here</a></td>
<td><?php echo $row['fromtime'] ?></td>
<td><?php echo $row['totime'] ?></td> 
<td><a href="assignupdate.php?id=<?php echo $assid;?>"><button style="color:white; background-color:green; width:80px; height:30px;">
Update
</button ></a>
<!-- <a href=""><button style="color:white; background-color:green; width:80px; height:30px;">Documents</button></a> -->
</td>
  </tr>
 <?php
 }
 }}
 else{
  echo "No assigments have been assigned";

 }
    ?>

</table>
<?php
 if(isset($_GET['type']) && $_GET['type']!=''){
  $type=($_GET['type']);
  if($type=='status'){
    $operation=($_GET['operation']);
    $id=($_GET['id']);

    if($operation=='accept'){
      $status='0';
    }
    $update_status="UPDATE tab_reg set sstage='$status'where log_id='$id'";
    mysqli_query($conn,$update_status);
    $update_status1="UPDATE tbl_login set sstatus='$status'where log_id='$id'";
    mysqli_query($conn,$update_status1);

    $sql1="INSERT INTO `tbl_student`(`stud_id`, `log_id`, `batch_id`) VALUES ('','$id','1')";
    mysqli_query($conn,$sql1);
    
  }

}        
?>

<?php mysqli_close($conn);  // close connection ?>
<br><br>

     
</body>    
      </div>
		</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <script>
      function check(){
        window.location("http://localhost/smartacademy/sidebar-01/registeruser.php");
        return true;
      }
    </script>
  </body>
</html>
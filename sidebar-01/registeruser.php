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
  <h1 id="h1">Users Detail</h1><br> <br>
  <button type="submit" class="btn btn-primary" name="submit" style="background-color: #29a329; color: white;" onclick="window.location.href = 'decm_excel.php';" > Download  </button>
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
 $sql = "SELECT * from tab_reg WHERE sstage='1' order by total desc";
 $result = $conn->query($sql);
 ?>
 <br> <br> <br>
 <table style="margin-left:20px;">

  <tr>
     <th>NAME</th>
     <th>EMAIL</th>
     <th>ADDRESS</th>
     <th>DOB</th>
     <th>MODE</th>
     <th>10th Mark</th>
     <th>12th Mark</th>
     <th colspan="2">Action</th>
  </tr>
 <?php
 if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
 ?>
  <tr>
<td><?php echo $row['sname'] ?></td>
<td><?php echo $row['semail'] ?></td>
<td><?php echo $row['sadd'] ?></td>
<td><?php echo $row['sdob'] ?></td> 
<td><?php echo $row['sstay'] ?></td>
<td><a href="documents\<?php echo $row['tenth_cer'] ?>"><?php echo $row['tenth'] ?></a></td>
<td><a href="documents\<?php echo $row['twelth_cer'] ?>"><?php echo $row['twelth'] ?></a></td>
<td><a href=""><button style="color:white; background-color:green; width:80px; height:30px;">
<?php if($row['sstage']==1){
echo "<span class='badge_active'><a  href='up.php?type=status&operation=accept&id=".$row['log_id']."' style='color:white;text-decoration:none;'>Accept</a></span>";
}  ?>
</button ></a>
<!-- <a href=""><button style="color:white; background-color:green; width:80px; height:30px;">Documents</button></a> -->
</td>
  </tr>
 <?php
 }
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
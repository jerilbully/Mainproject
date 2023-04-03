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
                    <a class="nav-link" href="/smartacademy/login.php">LOGOUT</a>
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
<button class="button1" ><a style="color:white;" href="editclassteacher.php"> EDIT LIST</a></button>

  <h1 id="h1">Class Teacher Detail          </h1>
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
 $sql = "SELECT * from tbl_classteacher";
 $result = $conn->query($sql);
 ?>
 <br> <br> <br>
 <style>
html {
  box-sizing: border-box;
}

*, *:before, *:after {
  box-sizing: inherit;
}

.column {
  float: left;
  width: relative;  
  margin-bottom: 8px;
  padding: 0 8px;
  width: 350px;
  height: 550px;
}

@media screen and (max-width: 650px) {
  .column {
    
    display: block;
  }
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  height:350px;
  width:300px;
}

.container {
  padding: 0 16px;
}

.container::after, .row::after {
  content: "";
  clear: both;
  display: table;
}

.title {
  color: grey;
}

.button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
}

.button:hover {
  background-color: #555;
}
.button1 {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 25%;
}

.button1:hover {
  background-color: #555;
}
</style>
</head>
<body>

<!-- <h2>Responsive "Meet The Team" Section</h2>
<p>Resize the browser window to see the effect.</p> -->
<br> 

<table style="margin-left:20px; margin: top 20px;">

<tr>
   <th>BATCH</th>
   <th>CLASS TEACHER</th>
   
   
</tr>
<?php
$sql1 = "SELECT * from tbl_classteacher";
$result1 = $conn->query($sql1);

if ($result1->num_rows > 0) {
// output data of each row
while($row = $result1->fetch_assoc()) {
  $bid = $row['batch_id']; 
  $ctid= $row['tid']; 

  $sql2 = "SELECT * from tbl_batch where batch_id = '$bid'";
  $result2 = $conn->query($sql2);
  $row2 = $result2->fetch_array();
  $bname =  $row2['batch_name'];
 


  $sql4 = "SELECT * from tbl_staff where tid = '$ctid'";
  $result4 = $conn->query($sql4);
  $row4 = $result4->fetch_array();
  $tname =  $row4['tname'];


?>
<tr>
  <td><?php echo $bname?></td>
  <td><?php echo $tname?></td>
 
  
</tr>
<?php
}
}
  ?>

</table>

  





</body>
</html>

      </div>
		</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
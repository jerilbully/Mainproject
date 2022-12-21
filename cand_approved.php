<?php
  include('session.php');
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ovs";
 
 // Create connection
$conn = new mysqli($servername,$username,$password,$dbname);
	
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " 
        . $conn->connect_error);
}



if (isset($_POST['print'])){
   require('mpdf/vendor/autoload.php');
    $query="SELECT * from tbl_candidate where Status=2";
    $queryRes=mysqli_query($conn, $query);
    if(mysqli_num_rows($queryRes)>0){
       
        $date=date("Y/m/d");
        $time=date("h:i:sa");
        
        $html='<style>
                    .heading{
                        font-size:25px; 
                        text-align:center;
                        margin-top:10px;
                        font-weight:bold;
                    }
                    .sub-head{
                        text-align:center;
                        margin-top:12px;
                    }
                    .sub-head span{
                        font-weight:bold;
                    }
                    .table{
                        margin-top:32px;
                        position: absolute;
                        margin-left:5%;
                        transform:translateX(-50%);
						
                    }
                    th,td{
                        padding:6px 10px;
                        font-size:20px;
                        text-align:left;
						
                    }
                </style>
				<img src="eci.jpg" width=100 height=100></img>
                <div class="heading">Approved Candidates</div>
                <div class="sub-head">Date: <span>'.$date.'</span></div>
                <div class="sub-head">Time: <span>'.$time.'</span></div>
                <table border=1 class="table">
                <tr>
                     <th>Name</th>
                     <th>Age</th>
                     <th>Gender</th>
	                 <th>Contact</th>
	                 <th>Address</th>
                </tr>';
        while($row=mysqli_fetch_assoc($queryRes)){
            $name=$row['first name']." ". $row['lastname'];
            $html.='<tr>
			            <td width=250>'.$name.'</td>
                        <td width=80>'.$row["Age"].'</td>
                        <td width=80>'.$row["gender"].'</td>
                         <td width=80>'.$row["contact"].'</td>
						 <td width=80>'.$row["address"].'</td>
                    </tr>';
        }
        $html.='</table>';

        // echo $html;
        $mpdf = new \Mpdf\Mpdf(['tempDir' => __DIR__ . '/tmp']);
        $mpdf->WriteHTML($html);
        $file=time().'.pdf';
        $mpdf->output($file,'I');
    }

}
?>



<html lang="en">
  <head>
  
    
	<link rel="icon" type="image/png" href="favicons/favicon-16x16.png" sizes="16x16">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css3/bootstrap.min.css" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
    />
    <link rel="stylesheet" href="css3/dataTables.bootstrap5.min.css" />
    <link rel="stylesheet" href="css3/style.css" />
    <title>Admin Dashboard</title>
  </head>
 <body onload=display_ct();>
    <!-- top navigation bar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
      <div class="container-fluid">
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="offcanvas"
          data-bs-target="#sidebar"
          aria-controls="offcanvasExample"
        >
          <span class="navbar-toggler-icon" data-bs-target="#sidebar"></span>
        </button>
       
        <div class="collapse navbar-collapse" id="topNavBar">
		<script type="text/javascript"> 
            function display_c(){
               var refresh=1000; // Refresh rate in milli seconds
                mytime=setTimeout('display_ct()',refresh)
                    }

                function display_ct() {
                  var x = new Date()
                  var x1=x.getMonth() + 1+ "/" + x.getDate() + "/" + x.getFullYear(); 
                  x1 = x1 + " - " +  x.getHours( )+ ":" +  x.getMinutes() + ":" +  x.getSeconds();
                  document.getElementById('ct').innerHTML = x1;
                  display_c();
                    }
					</script>
    <style>
  
 @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300;500&display=swap');

* {
    box-sizing: border-box;
}

body>div{
    min-height: 100vh;
    display: flex;
    font-family: 'Roboto', sans-serif;
}

.table_responsive {
   max-width: 900px;
    border: 1px solid #00bcd4;
    background-color: #efefef33;
    padding:10px;
    overflow: auto;
    margin: auto;
    border-radius:10px;
}

table {
    width:100%;
		overflow:hidden;
    font-size: 13px;
    color: #444;
    white-space: nowrap;
    border-collapse: collapse;
	align-items:center;
}

table>thead {
    background-color:green;
    color: #fff;
}

table>thead th {
   padding: 15px;
}

table th,
table td {
    border: 1px solid #00000017;
    padding:auto;
}

table>tbody>tr>td>img {
    display: inline-block;
    width: 50px;
    height: 50px;
    object-fit: cover;
    border-radius:30%;
    border: 2px solid #fff;
    box-shadow: 0 2px 6px #0003;
}

.deletebtn {
	font-family: Arial;
	color: #FFFFFF;
	font-size: 12px;
	text-decoration:none;
	border-radius: 5px;
	border: 1px #d83526 solid;
	background: linear-gradient(180deg, #fe1900 5%, #ce0000 100%);
	text-shadow: 1px 1px 1px #b23d35;
	box-shadow: inset 1px 1px 2px 0px #f29d93;
	cursor: pointer;
	display: inline-flex;
	align-items: center;
}
.deletebtn:hover {
		color: #FFFFFF;
	background: linear-gradient(180deg, #ce0000 5%, #fe1900 100%);
}
.deletebtn-icon {
	padding: 10px 0px;
}
.deletebtn-icon svg {
	vertical-align: middle;
	position: relative;
	top: -1px;
	left: 11px;
}
.deletebtn-text {
	padding: 10px 18px;
}

.editbtn {
	font-family: Arial;
	color: #FFFFFF;
	font-size: 12px;
	border-radius: 5px;
	text-decoration:none;
	border: 1px #3381ed solid;
	background: linear-gradient(180deg, #3d93f6 5%, #1e62d0 100%);
	text-shadow: 1px 1px 1px #1571cd;
	box-shadow: inset 1px 1px 2px 0px #97c4fe;
	cursor: pointer;
	display: inline-flex;
	align-items: center;
}
.editbtn:hover {
	background: linear-gradient(180deg, #1e62d0 5%, #3d93f6 100%);
	color: #FFFFFF;
}
.editbtn-icon {
	padding: 10px 7px;
}
.editbtn-icon svg {
	vertical-align: middle;
	position: relative;
	top: -1px;
	left: 11px;
}
.editbtn-text {
	padding: 10px 14px;
}


table>tbody>tr {
    background-color: #fff;
    transition: 0.3s ease-in-out;
}


table>tbody>tr:nth-child(even) {
    background-color: rgb(238, 238, 238);
}

table>tbody>tr:hover{
    filter: drop-shadow(0px 2px 6px #0002);
}


  input[type=text],input[type=email],input[type=number]select {
  width:30%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}

input[type=submit] {
  width:20%;
  background-color: #4CAF50;
  color: white;
  padding: 10px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}


input[type=reset] {
  width:20%;
  background-color:red;
  color: white;
  padding: 10px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
margin-left:25%;
}

input[type=reset]:hover {
  background-color:#DC143C;
}

#div {
  border-radius: 5px;
  padding: 20px;
  width:34%;
  height:45 %;
  margin-left:35%;
 background-color:#F0FFFF;
  margin-top:8%;
}
#h1{
	
	margin-left:30%;
	font-size:32px;
	color:blue;
	  font-family: "Times New Roman", Times, serif;
}

.css-button {
	font-family: Arial;
	color: #ffffff;
	text-decoration: none;
	font-size: 12px;
	padding:1px 5px;
	border-radius: 5px;
	border: 1px #74b807 solid;
	background: linear-gradient(180deg, #8ac403 5%, #78a809 100%);
	text-shadow: 1px 1px 1px #528009;
	box-shadow: inset 1px 1px 2px 0px #a4e271;
	cursor: pointer;
	display: inline-flex;
	align-items: center;
}
.css-button:hover {
	background: linear-gradient(180deg, #78a809 5%, #8ac403 100%);
	  color:#FFFFFF;
}
.css-button-icon {
	padding: 10px 10px;
	border-right: 1px solid rgba(255, 255, 255, 0.16);
	box-shadow: rgba(0, 0, 0, 0.14) -1px 0px 0px inset;
}
.css-button-icon svg {
	vertical-align: middle;
	position: relative;
}
.css-button-text {
	padding: 10px 18px;
}



.css-button2 {
	font-family: Arial;
	color: #ffffff;
	font-size: 12px;
	text-decoration: none;
	padding:1px 5px;
	border-radius: 5px;
	border: 1px #3381ed solid;
	background: linear-gradient(180deg, #0000cd 5%, #14149e 100%);



	text-shadow: 1px 1px 1px #1571cd;
	box-shadow: inset 1px 1px 2px 0px #97c4fe;
	cursor: pointer;
	display: inline-flex;
	align-items: center;
}
.css-button2:hover {
  background: linear-gradient(180deg, #14149e 5%, #0000cd 100%);
  color:#FFFFFF;
}
.css-button2-icon {
	padding: 10px 10px;
	border-right: 1px solid rgba(255, 255, 255, 0.16);
	box-shadow: rgba(0, 0, 0, 0.14) -1px 0px 0px inset;
}
.css-button2-text {
	padding: 10px 18px;
}

.css-button3{
	font-family: Arial;
	color: #FFFFFF;
	font-size: 12px;
	text-decoration: none;
	font-size: 12px;
	padding:1px 5px;
	border-radius: 5px;
	border: 1px #d83526 solid;
	background: linear-gradient(180deg, #fe1900 5%, #ce0000 100%);
	text-shadow: 1px 1px 1px #b23d35;
	box-shadow: inset 1px 1px 2px 0px #f29d93;
	cursor: pointer;
	display: inline-flex;
	align-items: center;
}
.css-button3:hover {
	background: linear-gradient(180deg, #ce0000 5%, #fe1900 100%);
	color: #FFFFFF;
}
.css-button3-icon {
	padding: 10px 10px;
	border-right: 1px solid rgba(255, 255, 255, 0.16);
	box-shadow: rgba(0, 0, 0, 0.14) -1px 0px 0px inset;
}
.css-button3-text {
	padding: 10px 18px;
}
#btngrp{
	margin-left:14.5%;
}
#a{
	text-decoration:none;
	color:black;
}
img {
    display: inline-block;
    width: 40px;
    height: 40px;
    object-fit: cover;
    border-radius:50%;
   
    box-shadow: 0 2px 6px #0003;
}



.editbtn-text {
	font-family: Arial;
	color: #ffffff;
	font-size: 13px;
	width:100px;
	text-decoration:none;
	border-radius: 5px;
	border: 1px #3381ed solid;
	background: linear-gradient(180deg, #3d93f6 5%, #1e62d0 100%);
	cursor: pointer;
	display: inline-flex;
	align-items: center;
}
.editbtn-text:hover {
	color: #ffffff;
	background: linear-gradient(180deg, #1e62d0 5%, #3d93f6 100%);
}
.editbtn-text-icon {
	padding: 8px 3px;
	color: #ffffff;
	text-shadow: none;
}
.print {
	font-family: Arial;
	color: #FFFFFF;
	font-size: 16px;
	float:right;
	margin-right:30%;
	text-decoration:none;
	border-radius: 5px;
	border: 0px #145f35 solid;
	background: linear-gradient(180deg, #2e8b56 5%, #145f35 100%);
	text-shadow: 1px 1px 1px #ffffff;
	box-shadow: 0px 10px 14px -7px #616174;
	cursor: pointer;
	display: inline-flex;
	align-items: center;
}
.print:hover {
	background: linear-gradient(180deg, #145f35 5%, #2e8b56 100%);
}
.print-icon {
	padding: 8px 10px;
	border-right: 1px solid rgba(255, 255, 255, 0.16);
	box-shadow: rgba(0, 0, 0, 0.14) -1px 0px 0px inset;
}
.print-text {
	padding: 8px 11px;
}
.print-text span{
	display: block;
	position: relative;
	left: -6px;
}
  </style>
<span id='ct' class="clock" ></span>

          <form class="d-flex ms-auto my-3 my-lg-0">
		  	 
           <div class="input-group">
              <div>
               <img width="60" height="50" src="<?php echo $_SESSION['img'];?>">&nbsp;
			   </div>
			   <h4 style=" color:#ffff;font-family:Garamond,serif;font-size:20px;margin:auto;"><?php echo $_SESSION['name']; ?></h4>
            </div>
          </form>
          <ul class="navbar-nav">
            <li class="nav-item dropdown">
              <a
                class="nav-link dropdown-toggle ms-2"
                href="#"
                role="button"
                data-bs-toggle="dropdown"
                aria-expanded="false"
              >
                <i class="bi bi-person-fill"></i>
              </a>
              <ul class="dropdown-menu dropdown-menu-end">
			   <li><a class="dropdown-item" href="adminprofile.php">Profile</a></li>
                <li><a class="dropdown-item" href="#">Change Password</a></li>
                <li><a class="dropdown-item" href="logout.php?id=<?php echo $_SESSION['id'];?>">Log Out</a></li>
          
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- top navigation bar -->
    <!-- offcanvas -->
    <div
      class="offcanvas offcanvas-start sidebar-nav bg-dark"
      tabindex="-1"
      id="sidebar"
    >
      <div class="offcanvas-body p-0">
        <nav class="navbar-dark">
          <ul class="navbar-nav">
           
            <li>
              <a href="#" class="nav-link px-3 active">
                <span class="me-2"><i class="bi bi-speedometer2"></i></span>
                <span>Admin Dashboard</span>
              </a>
            </li>
            <li class="my-4"><hr class="dropdown-divider bg-light" /></li>
            <li>
              <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
                Interface
              </div>
            </li>
            <li>
              <a
                class="nav-link px-3 sidebar-link"
                data-bs-toggle="collapse"
                href="#layouts"
              >
                <span class="me-2"><i class="bi bi-layout-split"></i></span>
                <span>Election</span>
                <span class="ms-auto">
                  <span class="right-icon">
                    <i class="bi bi-chevron-down"></i>
                  </span>
                </span>
              </a>
              <div class="collapse" id="layouts">
                <ul class="navbar-nav ps-3">
                  <li>
                    <a href="#" class="nav-link px-3">
                      <span class="me-2"
                        ><i class="bi bi-speedometer2"></i
                      ></span>
                      <span>Previous Elections</span>
                    </a>
                  </li>
				   <li>
                    <a href="nw_election.php" class="nav-link px-3">
                      <span class="me-2"
                        ><i class="bi bi-speedometer2"></i
                      ></span>
                      <span>New Election</span>
                    </a>
                  </li>
				  
                </ul>
              </div>
            </li>
            <li>
              <a href="reg_control.php" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-book-fill"></i></span>
                <span>Registrations</span>
              </a>
            </li>
            <li class="my-4"><hr class="dropdown-divider bg-light" /></li>
            <li>
              <div class="text-muted small fw-bold text-uppercase px-3 mb-3">
                Addons
              </div>
            </li>
            <li>
              <a href="#" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-graph-up"></i></span>
                <span>Charts</span>
              </a>
            </li>
            <li>
              <a href="#" class="nav-link px-3">
                <span class="me-2"><i class="bi bi-table"></i></span>
                <span>Tables</span>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </div>
    <!-- offcanvas -->
    <main class="mt-5 pt-3">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
           
          </div>
        </div>
        <div class="row">
          <div class="col-md-3 mb-3">
            <div class="card bg-primary text-white h-100">
              <div class="card-body py-5">Total users <?php  echo $_SESSION['count']; ?></div>
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <div class="card bg-warning text-dark h-100">
              <div class="card-body py-5">Verified List</div>
              <div class="card-footer d-flex">
         <a href="voters_list.php" style="color:black"> View Details</a>
                <span class="ms-auto">
                  <i class="bi bi-chevron-right"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <div class="card bg-success text-white h-100">
              <div class="card-body py-5">Candidate List</div>
              <div class="card-footer d-flex">
                 <a href="candidate_list.php" style="color:white"> View Details</a>
                <span class="ms-auto">
                  <i class="bi bi-chevron-right"></i>
                </span>
              </div>
            </div>
          </div>
          <div class="col-md-3 mb-3">
            <div class="card bg-danger text-white h-100">
              <div class="card-body py-5">Administrators</div>
              <div class="card-footer d-flex">
               <a href="subadmin.php" style="color:white"> View Details</a>
                <span class="ms-auto">
                  <i class="bi bi-chevron-right"></i>
                </span>
              </div>
            </div>
          </div>
        </div>
       
        </div>
        <div class="row">
          
        </div>
        <div class="row">
          <div class="col-md-12 mb-3">
            <div class="card">
              <div class="card-header">
                <span><i class="bi bi-table me-2"></i></span>Candidate List Approved
              </div>
              <div class="card-body">
			   <div id="btngrp">
			    <form action="" method="pOST">
			   <button class="print" type="submit" name="print">
	<span class="print-icon"><i class="fa fa-print" aria-hidden="true"></i></span>
	<span class="print-text"><span>Print</span></span>
</button></form>
<a class="css-button3" href="cand_rejected.php">
	<span class="css-button-icon"><i class="fa fa-ban" aria-hidden="true"></i></span>
	<span class="css-button-text">Rejected</span>
</a>
</div>
                <div class="table-responsive">
                  <table
                    id="example"
                    class="table table-striped data-table"
                    style="width: 100%"
                  >
                   <thead>
<tr><th>Photo</th>
    <th>Name</th>
	<th>Age</th>
	<th>Gender</th>
	<th>Address</th>
	<th>Party</th>
	<th>Symbol</th>
	
	
</tr>
</thead>
                    <tbody>

 <?php
 $sql = "SELECT * from tbl_candidate where status=2";
 $result = $conn->query($sql);
 if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
	  ?>
  <tr>
    <td align="center"><img width="60" height="50" src="<?php echo $row['img'];?>"> </td>
    <td><?php echo $row['first name']." ". $row['lastname'] ?></td>
	<td><?php echo $row['Age'] ?></td>
	<td><?php echo $row['gender'] ?></td>
	<td><?php echo $row['address'] ?></td>
	<td><?php echo $row['party'] ?></td>
    <td align="center"><img width="60" height="50" src="<?php echo $row['symbol'];?>"> </td>
	
	
  </tr>
 <?php
 }
 }
    ?> 
	 </tbody>
</table> 
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <script src="./js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.0.2/dist/chart.min.js"></script>
    <script src="./js/jquery-3.5.1.js"></script>
    <script src="./js/jquery.dataTables.min.js"></script>
    <script src="./js/dataTables.bootstrap5.min.js"></script>
    <script src="./js/script.js"></script>
  </body>
</html>

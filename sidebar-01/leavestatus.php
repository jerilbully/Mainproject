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
<style>
body {
    color: #566787;
    background: #f5f5f5;
    font-family: 'Varela Round', sans-serif;
    font-size: 13px;
    width: 90%;
}
.table-responsive {
    margin: 30px 0;
}
.table-wrapper {
    min-width: 1000px;
    background: #fff;
    padding: 20px 25px;
    border-radius: 3px;
    box-shadow: 0 1px 1px rgba(0,0,0,.05);
}
.table-title {
    padding-bottom: 15px;
    background: #299be4;
    color: #fff;
    padding: 16px 30px;
    margin: -20px -25px 10px;
    border-radius: 3px 3px 0 0;
}
.table-title h2 {
    margin: 5px 0 0;
    font-size: 24px;
}
.table-title .btn {
    color: #566787;
    float: right;
    font-size: 13px;
    background: #fff;
    border: none;
    min-width: 50px;
    border-radius: 2px;
    border: none;
    outline: none !important;
    margin-left: 10px;
}
.table-title .btn:hover, .table-title .btn:focus {
    color: #566787;
    background: #f2f2f2;
}
.table-title .btn i {
    float: left;
    font-size: 21px;
    margin-right: 5px;
}
.table-title .btn span {
    float: left;
    margin-top: 2px;
}
table.table tr th, table.table tr td {
    border-color: #e9e9e9;
    padding: 12px 15px;
    vertical-align: middle;
}
table.table tr th:first-child {
    width: 60px;
}
table.table tr th:last-child {
    width: 100px;
}
table.table-striped tbody tr:nth-of-type(odd) {
    background-color: #fcfcfc;
}
table.table-striped.table-hover tbody tr:hover {
    background: #f5f5f5;
}
table.table th i {
    font-size: 13px;
    margin: 0 5px;
    cursor: pointer;
}	
table.table td:last-child i {
    opacity: 0.9;
    font-size: 22px;
    margin: 0 5px;
}
table.table td a {
    font-weight: bold;
    color: #566787;
    display: inline-block;
    text-decoration: none;
}
table.table td a:hover {
    color: #2196F3;
}
table.table td a.settings {
    color: #2196F3;
}
table.table td a.delete {
    color: #F44336;
}
table.table td i {
    font-size: 19px;
}
table.table .avatar {
    border-radius: 50%;
    vertical-align: middle;
    margin-right: 10px;
}
.status {
    font-size: 30px;
    margin: 2px 2px 0 0;
    display: inline-block;
    vertical-align: middle;
    line-height: 10px;
}
.text-success {
    color: #10c469;
}
.text-info {
    color: #62c9e8;
}
.text-warning {
    color: #FFC107;
}
.text-danger {
    color: #ff5b5b;
}
.pagination {
    float: right;
    margin: 0 0 5px;
}
.pagination li a {
    border: none;
    font-size: 13px;
    min-width: 30px;
    min-height: 30px;
    color: #999;
    margin: 0 2px;
    line-height: 30px;
    border-radius: 2px !important;
    text-align: center;
    padding: 0 6px;
}
.pagination li a:hover {
    color: #666;
}	
.pagination li.active a, .pagination li.active a.page-link {
    background: #03A9F4;
}
.pagination li.active a:hover {        
    background: #0397d6;
}
.pagination li.disabled i {
    color: #ccc;
}
.pagination li i {
    font-size: 16px;
    padding-top: 6px
}
.hint-text {
    float: left;
    margin-top: 10px;
    font-size: 13px;
}
</style>
<script>
$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip();
});
</script>
</head>
<body>
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-5">
                        <h2> Leave applications</h2>
                    </div>
                  
                </div>
            </div>
            <table class="table table-striped table-hover">
            <thead>  
                          
            <tr>  
              
          
          
              <th>Teacher Name</th>
              <th>Description</th>
              <th>Date From</th>
              <th>Date To</th>
              <th>Stand-in Teacher</th>
              
            
              

            </tr>  
            </thead>  

<?php  
include("connection.php"); 

$view_users_query="SELECT * FROM `tbl_leave`  where lstatus='pending'";//select query for viewing users.  
$run=mysqli_query($conn,$view_users_query);//here run the sql query.  

while($row=mysqli_fetch_array($run))//while look to fetch the result and store in a array $row.  
{  


 
$user_tlname=$row['username'];
$user_batc=$row['leavereason'];  
$user_sub=$row['fromdate']; 
$user_email=$row['todate']; 
$user_subteach=$row['subteach'];   


?>  

<tr>  


 

<td><?php echo $user_tlname;  ?></td>  
<td><?php echo $user_batc;  ?></td> 
<td><?php echo $user_sub;  ?></td> 
<td><?php echo $user_email;  ?></td> 
<td><?php echo $user_subteach;  ?></td> 





<td><a href="accleave1.php?id=<?php echo $row['leave_id'];?>"><button style="color:white; background-color:green; width:80px height:30px;">Accept</button></a>

  
<td><a href="levdelete1.php?id=<?php echo $row['leave_id'];?>"><button style="color:white; background-color:red; width:80px height:30px;">Reject</button></a>

</td>
</tr>  

<?php } ?>  
</div>
<div>
</div>
</div>  

</container>
                   
</div> 
                </div>
            </div>
            <table class="table table-striped table-hover">
              
            <thead>  
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-5">
                        <h2>Rejected List</b></h2>
                    </div>
                  
                </div>
            </div>     
            <tr>  
            <th>Teacher Name</th>
              <th>Description</th>
              <th>Date From</th>
              <th>Date To</th>
              <th>Stand-in Teacher</th>
              
              

            </tr>  
            </thead>  

<?php  
include("connection.php"); 
$view_users_query="SELECT * FROM `tbl_leave` where lstatus='Rejected'";//select query for viewing users.  
$run=mysqli_query($conn,$view_users_query);//here run the sql query.  

while($row=mysqli_fetch_array($run))//while look to fetch the result and store in a array $row.  
{  
$id=$row['username'];

 
 
$user_tlname=$row['username'];
$user_batc=$row['leavereason'];  
$user_sub=$row['fromdate']; 
$user_email=$row['todate']; 
$user_subteach=$row['subteach'];    
  


?>  

<tr>  
<!--here showing results in the table -->  

 

<td><?php echo $user_tlname;  ?></td>  
<td><?php echo $user_batc;  ?></td> 
<td><?php echo $user_sub;  ?></td> 
<td><?php echo $user_email;  ?></td> 
<td><?php echo $user_subteach;  ?></td> 

<td><a href="accleave1.php?id=<?php echo $row['leave_id'];?>"><button style="color:white; background-color:green; width:80px height:30px;">Accept</button></a>





  
</td>
</tr>  

<?php } ?>  
</div>
</div>  


</container>
                   
</div> 
                </div>
            </div>
            <table class="table table-striped table-hover">
            <thead>  
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-5">
                        <h2>Accepted List</b></h2>
                    </div>
                  
                </div>
            </div>
                          
            <tr>  
            <th>Teacher Name</th>
              <th>Description</th>
              <th>Date From</th>
              <th>Date To</th>
              <th>Stand-in Teacher</th>
              
              

            </tr>  
            </thead>  


<?php  
include("connection.php");  
$view_users_query="SELECT * FROM `tbl_leave` WHERE lstatus='accepted'";//select query for viewing users.  
$run=mysqli_query($conn,$view_users_query);//here run the sql query.  

while($row=mysqli_fetch_array($run))//while look to fetch the result and store in a array $row.  
{  
$id=$row['username'];

 
 
$user_tlname=$row['username'];
$user_batc=$row['leavereason'];  
$user_sub=$row['fromdate']; 
$user_email=$row['todate']; 
$user_subteach=$row['subteach'];    


?>  

<tr>  
<!--here showing results in the table -->  

 

<td><?php echo $user_tlname;  ?></td>  
<td><?php echo $user_batc;  ?></td> 
<td><?php echo $user_sub;  ?></td> 
<td><?php echo $user_email;  ?></td> 
<td><?php echo $user_subteach;  ?></td> 







  
<td><a href="levdelete1.php?id=<?php echo $row['leave_id'];?>"><button style="color:white; background-color:red; width:80px height:30px;">Reject</button></a>

</td>
</tr>  

<?php } ?>  
</div>
</div>  
</body>
</html>
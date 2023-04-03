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
  


 
</head>
<body>

<!-- <h2>Responsive "Meet The Team" Section</h2>
<p>Resize the browser window to see the effect.</p> --

<!-- <div class="row"> -->
<div class="container">
        <form action="hodaddteacherfunction.php" method="post" id="form1">
            <h2 class="text-center">ADD A TEACHER</h2>
        <div class="row jumbotron">
            <div class="col-sm-6 form-group">
                <label for="Sname">Teachers Name</label>
                <input type="text" class="form-control" name="tname" id="name" placeholder="Enter full name." octavalidate="R,ALPHA_ONLY">
            </div>
           
            <div class="col-sm-6 form-group">
                <label for="address">Address</label>
                <input type="textarea" class="form-control" name="tadd" id="address" placeholder="Enter Address">
            </div>
            <div class="col-sm-6 form-group">
                <label for="tel">Phone</label>
                <input type="text" name="tphoneno" class="form-control" id="tel" placeholder="Enter Your Contact Number." minlength="10" maxlength="10" octavalidate="R,EMAIL">
            </div>
            <div class="col-sm-6 form-group">
                <label for="Date">Date Of joininng</label>
                <input type="Date" name="tdoj" class="form-control" id="Date" placeholder="" required>
            </div>
            <div class="col-sm-6 form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="temail" id="email" placeholder="Enter your email." octavalidate="R,DIGITS">
            </div>
            <!-- <div class="col-sm-6 form-group">
                <label for="address">Qualification</label>
                <input type="textarea" class="form-control" name="tqual" id="address" placeholder="Qualification" >
            </div> -->
            <div class="col-sm-6 form-group">
                <label for="address">Qualification</label>
                <input type="textarea" class="form-control" name="tqual" id="address" placeholder="Qualification" >
            </div>
            
          
            <div class="col-sm-6 form-group">
                <label for="pass">Password</label>
                <input type="Password" name="tpass" class="form-control" id="pass" default='1111'>
            </div>
           
            <div class="col-sm-12">
              <p>Back to Home page <a href="hodteacher.php">Click Here</a>.

            <div class="col-sm-12 form-group mb-0">
               <input type="submit" name="submit" id="submit" value="REGISTER">
            </div>
            
        </div>
        </form>
    </div>
    <script>
    //create new instance of the function
    const myForm = new octaValidate('form1');
    //listen for submit event
    document.getElementById('form1').addEventListener('submit', function(e){
        
        //invoke the method
        if(myForm.validate())
        { 
          //validation successful, process form data here
        } else {
          //validation failed
          e.preventDefault();
          return false;
        }
    })
</script>
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
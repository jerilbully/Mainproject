
<?php
session_start();
session_destroy();
include "log.php";

?>


<head>
   <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://codepen.io/skjha5993/pen/bXqWpR.css">
    <title>Smart Academy</title>
    <style>
      .border{
        padding:2rem 1rem;margin-bottom:4rem;background-color:#e9ecef;border-radius:.3rem;width: 550px;
      }
    </style>
</head>
<body>
<center>

<div class="alert">
                    <?php
                    if(isset($_SESSION['status']))
                    {
                        echo "<h4 style='color:#cccc00;''>".$_SESSION['status']."</h4>";
                        unset($_SESSION['status']);
                    }
                    ?>
                </div>


    <div class="container">
    <form action="log.php" method="post" >
            <h2 class="text-center">Welcome to Smart Academy</h2>
        <div class="border" >
            <div class="col-sm-6 form-group">
              
                <input type="text" class="form-control" name="uname" id="name-f" placeholder="username" required>
            </div>
            <div class="col-sm-6 form-group">
            
              
              
                <input type="password" class="form-control" name="password" id="name-l" placeholder="password" required>
            </div>
            
            <div class="col-sm-12">
              <p>Dont have account? <a href="register.html">Register here</a>.

            <div class="col-sm-6 form-group mb-0">
              <center>
              <input type="submit" name="btn" id="submit" value="LOGIN">
              <?php  if(isset($_POST['error'])){echo $_POST['error'];}?>
              </center>
               
            </div>
            
        </div>
      </div>
        </form>
    </div>
  </center>


</body>

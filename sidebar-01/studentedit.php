<?php
session_start();

?>  

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


 $sql = "SELECT * from tab_reg where sname ='$url_query'";
 $result = $conn->query($sql);
 ?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
       
    </head>
<style>
    
.account-settings .user-profile {
    margin: 0 0 1rem 0;
    padding-bottom: 1rem;
    text-align: center;
}
.account-settings .user-profile .user-avatar {
    margin: 0 0 1rem 0;
}
.account-settings .user-profile .user-avatar img {
    width: 90px;
    height: 90px;
    -webkit-border-radius: 100px;
    -moz-border-radius: 100px;
    border-radius: 100px;
}
.account-settings .user-profile h5.user-name {
    margin: 0 0 0.5rem 0;
}
.account-settings .user-profile h6.user-email {
    margin: 0;
    font-size: 0.8rem;
    font-weight: 400;
    color: #9fa8b9;
}
.account-settings .about {
    margin: 2rem 0 0 0;
    text-align: center;
}
.account-settings .about h5 {
    margin: 0 0 15px 0;
    color: #007ae1;
}
.account-settings .about p {
    font-size: 0.825rem;
}
.form-control {
    border: 1px solid #cfd1d8;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    border-radius: 2px;
    font-size: .825rem;
    background: #ffffff;
    color: #2e323c;
}

.card {
    background: #ffffff;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    border: 0;
    margin-bottom: 1rem;
}
.text-right{
    float: right;
    margin-top: 2%;
}


body {margin:0;font-family:Arial}

.topnav {
  overflow: hidden;
  background-color: #333;
}

.topnav a {
  float: left;
  display: block;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.active {
  background-color: #04AA6D;
  color: white;
}

.topnav .icon {
  display: none;
}

.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 17px;    
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font-family: inherit;
  margin: 0;
}

.dropdown-content {
  display: none;
  position: relative;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index:1;
}

.dropdown-content a {
  float: none;
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.topnav a:hover, .dropdown:hover .dropbtn {
  background-color: #555;
  color: white;
}

.dropdown-content a:hover {
  background-color: #ddd;
  color: black;
}

.dropdown:hover .dropdown-content {
  display: block;
  
}

@media screen and (max-width: 600px) {
  .topnav a:not(:first-child), .dropdown .dropbtn {
    display: none;
  }
  .topnav a.icon {
    float: right;
    display: block;
  }
}

@media screen and (max-width: 600px) {
  .topnav.responsive {position: relative;}
  .topnav.responsive .icon {
    position: absolute;
    right: 0;
    top: 0;
  }
  .topnav.responsive a {
    float: none;
    display: block;
    text-align: left;
  }
  .topnav.responsive .dropdown {float: none;}
  .topnav.responsive .dropdown-content {position: relative;}
  .topnav.responsive .dropdown .dropbtn {
    display: block;
    width: 100%;
    text-align: left;
  }
}

<?php
 if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
 ?>
 
</style>
<body style="background-image: linear-gradient( rgb(198, 201, 202),rgb(50, 147, 166));">
    <h1 style="text-align:center;font-family: 'Franklin Gothic Medium', Arial Narrow, 'Arial', sans-serif;font-weight: bolder; margin-top: 5%;"> PROFILE </h1>
    <P style="color: white;text-align:center;font-weight:bold;font-size:12px;">HOME >> PROFILE</P>
    <div class="container" style="height: 100%;">
        <div class="row gutters">
        <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
        <div class="card h-100">
            <div class="card-body">
                <div class="account-settings">
                    <div class="user-profile">
                        <div class="user-avatar">
                            <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Maxwell Admin">
                        </div>
                        
                        <h5 class="user-name"><?php echo $row['sname'] ?></h5>
                        <h6 class="user-email"></h6>
                    </div>
                    <div class="about">
                        <!-- <h5>A</h5>
                        <p>I'm a Full Stack Designer I enjoy creating user-centric, delightful and human experiences.</p> -->
                    </div>
                </div>
            </div>
        </div>
        </div>
        <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12" style="height:100% ;">
        <div class="card h-100">
            <div class="card-body">
                <div class="row gutters">

                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <h6 class="mb-2 text-primary">Personal Details</h6>
                    </div>
                    <form action="savestudentchange.php+
                     method="post">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                          <div class="form-group">
                          <label for="website">Email: </label>  <input type="text" id="form_email" name="email" required  style="float:right;" value =" <?php  echo $row['semail'] ?>">
                          <span class="error_form" id="email_error_message"></span>
                          </div>
                        </div>
                        <br>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                          <div class="form-group">
                              <label for="website">Phone Number:</label> <input type="text" id="form_pno" maxlength="10" minlength="10" name="phoneno" required  style="float:right;" value =" <?php  echo $row['sphoneno'] ?>">
                              <span class="error_form" id="pno_error_message"></span>
                          </div>
                        </div>
                        <BR>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                          <div class="form-group">
                              <label for="website">Address:     </label> <input type="text" name="addr" required style="float:right;" value =" <?php  echo $row['sadd'] ?>">
                          </div>
                        </div>`
                        
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                          <div class="form-group">
                              <label for="website">Date Of Birth:     </label>
                              <div style="float:right"> <?php echo $row['sdob'] ?></div>
                          </div>
                        </div>
                        <br>    
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                          <div class="form-group">
                              <label for="website">course:     </label>
                              <div style="float:right;"> <?php echo $row['scourse'] ?></div>
                          </div>
                        </div>

                        
                    </div>
                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="text-right">
                            
                               
                               
                               
                            <input type="submit" value="Save" name="submit" id="regbtn">
                               <a  href="studentmain.php"> Back</a>
                            </div>
                        </div>
                    </div>
                   </form>
                   <script type="text/javascript">
        function validateForm(){
            const btn = document.querySelector("#regbtn");
            check_fname();
            if(btn.hasAttribute('disabled')){
                return false;
            }
            check_email();
            if(btn.hasAttribute('disabled')){
                return false;
            }
            check_uname();
            if(btn.hasAttribute('disabled')){
                return false;
            }
            check_pno();
            if(btn.hasAttribute('disabled')){
                return false;
            }
            check_password();
            if(btn.hasAttribute('disabled')){
                return false;
            }
            check_retype_password();
            if(btn.hasAttribute('disabled')){
                return false;
            }
            
            
        }
        $(function() {

            $("#fname_error_message").hide();

            $("#email_error_message").hide();
            $("#uname_error_message").hide();
            $("#pno_error_message").hide();
            $("#password_error_message").hide();
            $("#retype_password_error_message").hide();

            var error_fname = false;

            var error_email = false;
            var error_uname = false;
            var error_pno = false;
            var error_password = false;
            var error_retype_password = false;

            $("#form_fname").focusout(function() {
                check_fname();
            });

            $("#form_email").focusout(function() {
                check_email();
            });
            $("#form_uname").focusout(function() {
                check_uname();
            });
            $("#form_pno").focusout(function() {
                check_pno();
            });
            $("#form_password").focusout(function() {
                check_password();
            });
            $("#form_retype_password").focusout(function() {
                check_retype_password();
            });

            function check_fname() {
                document.getElementById("regbtn").disabled = true;
                var pattern = /^[ a-zA-Z\s]*$/;
                var fname = $("#form_fname").val();
             
                if (pattern.test(fname) && fname !== '') {
                    document.getElementById("regbtn").disabled = false;
                    $("#fname_error_message").hide();
                    $("#form_fname").css("border-bottom", "2px solid #34F458");
                    

                } else {
                    document.getElementById("regbtn").disabled = true;
                    $("#fname_error_message").html("Should contain only Characters");
                    $("#fname_error_message").show();
                    $("#form_fname").css("border-bottom", "2px solid #F90A0A");
                    
                    error_fname = true;
                }
            }

 

            function check_uname() {
                document.getElementById("regbtn").disabled = true;
                var pattern = /^[a-zA-Z][a-zA-Z0-9-_]+$/;
                var uname = $("#form_uname").val()
                if (pattern.test(uname) && uname !== '') {
                    document.getElementById("regbtn").disabled = false;
                    $("#uname_error_message").hide();
                    $("#form_uname").css("border-bottom", "2px solid #34F458");
                } else {
                    document.getElementById("regbtn").disabled = true;
                    $("#uname_error_message").html("Should contain only Characters");
                    $("#uname_error_message").show();
                    $("#form_uname").css("border-bottom", "2px solid #F90A0A");
                    error_uname = true;
                }
            }

            function check_pno() {
                document.getElementById("regbtn").disabled = true;
                var pattern = /[0-9 -()+]+$/;
                var pno = $("#form_pno").val()
                if (pattern.test(pno) && pno.length == 10) {
                    document.getElementById("regbtn").disabled = false;
                    $("#pno_error_message").hide();
                    $("#form_pno").css("border-bottom", "2px solid #34F458");
                } else {
                    document.getElementById("regbtn").disabled = true;
                    $("#pno_error_message").html("Should contain only 10 digits");
                    $("#pno_error_message").show();
                    $("#form_pno").css("border-bottom", "2px solid #F90A0A");
                    error_pno = true;
                }
            }



            function check_password() {
                document.getElementById("regbtn").disabled = true;
                var pattern =/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!"#$%&'()*+,-.\/:;<=>?\\@[\]^_`{|}~]).{6,64}$/;
                var password = $("#form_password").val();
                if (pattern.test(password) && password !== '') {
                    document.getElementById("regbtn").disabled = false;
                    $("#password_error_message").hide();
                    $("#form_password").css("border-bottom", "2px solid #34F458");
                } else {
                    document.getElementById("regbtn").disabled = true;
                    $("#password_error_message").html("Password format is:User@1234");
                    $("#password_error_message").show();
                    $("#form_password").css("border-bottom", "2px solid #F90A0A");
                    error_password = true;
                }
            }


            function check_retype_password() {
                document.getElementById("regbtn").disabled = true;
                var password = $("#form_password").val();
                var retype_password = $("#form_retype_password").val();
                if (password !== retype_password) {
                    document.getElementById("regbtn").disabled = true;
                    $("#retype_password_error_message").html("Passwords Did not Matched");
                    $("#retype_password_error_message").show();
                    $("#form_retype_password").css("border-bottom", "2px solid #F90A0A");
                    error_retype_password = true;
                } else {
                    document.getElementById("regbtn").disabled = false;
                    $("#retype_password_error_message").hide();
                    $("#form_retype_password").css("border-bottom", "2px solid #34F458");
                }
            }

            function check_email() {
                document.getElementById("regbtn").disabled = true;
                var pattern = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
                var email = $("#form_email").val();
                if (pattern.test(email) && email !== '') {
                    document.getElementById("regbtn").disabled = false;
                    $("#email_error_message").hide();
                    $("#form_email").css("border-bottom", "2px solid #34F458");
                } else {
                    document.getElementById("regbtn").disabled = true;
                    $("#email_error_message").html("Invalid Email");
                    $("#email_error_message").show();
                    $("#form_email").css("border-bottom", "2px solid #F90A0A");
                    error_email = true;
                }
            }


        });
    </script>
          </div>
        </div>
        </div>
        </div>
        </div>
        <?php
 }
 }
    ?>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

        
      </body>
</html>
<?php
    //Import PHPMailer classes into the global namespace
    //These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
session_start();
    if (isset($_SESSION['SESSION_EMAIL'])) {
        header("Location: welcome.php");
        die();
    }
    //Load Composer's autoloader
    require 'vendor/autoload.php';

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

    $msg = "";

    if (isset($_POST['submit'])) {
       $sname = $_REQUEST['Sname'];
$admno=$_REQUEST['admno'];
$sadd=$_REQUEST['Saddr'];
$sdob=$_REQUEST['Sdob'];
$sphoneno=$_REQUEST['Sphone'];
$semail=$_REQUEST['Semail'];
$course=$_REQUEST["course"];
$hostel=$_REQUEST["hostel"];
$role = "student";

$hash = md5($_REQUEST['Spassword']);
$spass=$hash;
   $code=md5(rand());
        if (mysqli_num_rows(mysqli_query($conn, "SELECT semail FROM tab_reg WHERE semail='{$semail}'")) > 0) {
            $msg = "<div class='alert alert-danger'>{$email} - This email address has been already exists.</div>";
        } 
		
		else if (mysqli_num_rows(mysqli_query($conn, "SELECT semail FROM tab_reg WHERE sphoneno='{$sphoneno}'")) > 0) {
            $msg = "<div class='alert alert-danger'>{$sphone} - This number has been already exists.</div>";
        }
		
		
		else {
               $sql="INSERT INTO tbl_login( log_id,username,password,role,code) VALUES ('','$sname','$spass','$role','$code')";
				$result = mysqli_query($conn, $sql);

                if ($result) {
					$val="SELECT log_id from tbl_login where username='$sname'";
					if ($res=$conn->query($val)){
						foreach($res as $data)
						{
					$log_id=$data['log_id'];
						}
					    $sql2= "INSERT INTO tab_reg VALUES ('','$log_id','$sname','$admno','$sadd','$sdob','$sphoneno','$semail','$course','$hostel','$spass','')";
					   $result2 = mysqli_query($conn, $sql2);
					}
                    echo "<div style='display: none;'>";
                    //Create an instance; passing `true` enables exceptions
                    $mail = new PHPMailer(true);

                    try {
                        //Server settings
                        $mail->SMTPDebug = SMTP::DEBUG_SERVER;                      //Enable verbose debug output
                        $mail->isSMTP();                                            //Send using SMTP
                        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                        $mail->Username   = 'smartacademy416@gmail.com';                     //SMTP username
                        $mail->Password   = 'rtjmcxzfbtxuksoi';                                 //SMTP password
                        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
                        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

                        //Recipients
                        $mail->setFrom('smartacademy416@gmail.com');
                        $mail->addAddress($semail);

                        //Content
                        $mail->isHTML(true);                                  //Set email format to HTML
                        $mail->Subject = 'no reply';
                        $mail->Body    = 'Here is the verification link <b><a href="http://localhost/smartacademy/login.php?verification='.$code.'">http://localhost/smartacademy/login.php?verification='.$code.'</a></b>';
                        $mail->send();
                        echo 'Message has been sent';
                    } catch (Exception $e) {
                        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
                    }
                    echo "</div>";
                    $msg = "<div class='alert alert-info'>We've send a verification link on your email address.</div>";
                } else {
                    $msg = "<div class='alert alert-danger'>Something wrong went.</div>";
                }
            
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://codepen.io/skjha5993/pen/bXqWpR.css">
    <title>Smart Academy</title>
</head>
<body>
 
    <div class="container">
	   <?php echo $msg; ?>
        <form action="#" method="POST" id="form1">
            <h2 class="text-center">Join Smart Academy</h2>
        <div class="row jumbotron">
            <div class="col-sm-6 form-group">
                <label for="Sname">Username</label>
                <input type="text" class="form-control" name="Sname" id="form_fname" placeholder="Enter your full name." >
                <span class="error_form" id="fname_error_message"></span>
            </div>
            <div class="col-sm-6 form-group">
                <label for="admno">Admission Number</label>
                <input type="text" name="admno" class="form-control"  placeholder="Enter Admission Number" >
               
            </div>
            <div class="col-sm-6 form-group">
                <label for="address">Address</label>
                <input type="address" class="form-control" name="Saddr" id="address" placeholder="Locality/House/Street no." required>
            </div>
            
            <div class="col-sm-6 form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="Semail" id="form_email" placeholder="Enter your email. ">
                <span class="error_form" id="email_error_message"></span>
            </div>
            <div class="col-sm-6 form-group">
                <label for="tel">Phone</label>
                <input type="text" name="Sphone" class="form-control" id="form_pno" placeholder="Enter Your Contact Number." minlength="10" maxlength="10">
                <span class="error_form" id="pno_error_message"></span>
            </div>
            
            
            <div class="col-sm-6 form-group">
                <label for="Date">Date Of Birth</label>
                <input type="Date" name="Sdob" class="form-control" id="Date" placeholder="" required min='1899-01-01' max='2008-01-01'>
            </div>
            <div class="col-sm-6 form-group">
                <label for="tel">Course</label>
                <select name="course" id="crse" class="form-control" required>
                    <option value="Regular MCA(2 years)">Regular MCA</option>
                    <option value="Integrated MCA(5 years)">Integrated MCA</option>
                </select>
            </div>
            <div class="col-sm-6 form-group">
                <label for="tel">Mode</label>
                <select name="hostel" id="hostel" class="form-control" required>
                    <option value="Dayscholar"> Dayscholar</option>
                    <option value="Hostler">Hostler</option>
                </select>
            </div>
          
            <div class="col-sm-6 form-group">
                <label for="pass">Password</label>
                <input type="Password" name="Spassword" class="form-control" id="form_password" placeholder="Enter your password." >
                <span class="error_form" id="password_error_message"></span>
            </div>
            <div class="col-sm-6 form-group">
                <label for="pass2">Confirm Password</label>
                <input type="Password" name="cnf-password" class="form-control" id="form_retype_password" placeholder="Re-enter your password." >
                <span class="error_form" id="retype_password_error_message"></span>
            </div>
            <div class="col-sm-12">
              <p>Already  have an account? <a href="login.php">Login here</a>.

            <div class="col-sm-12 form-group mb-0">
               <input type="submit" name="submit" id="regbtn" value="REGISTER">
            </div>
            
        </div>
        </form>
    </div>
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
</body>
</html>


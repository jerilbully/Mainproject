<?php
 use PHPMailer\PHPMailer\PHPMailer;
 use PHPMailer\PHPMailer\SMTP;
 use PHPMailer\PHPMailer\Exception;
 
    //Load Composer's autoloader
    require './vendor/autoload.php';
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




 if(isset($_GET['type']) && $_GET['type']!=''){
  $mail_id=($_GET['mail_id']);
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
      $mail->addAddress($mail_id);

      //Content
      $mail->isHTML(true);                                  //Set email format to HTML
      $mail->Subject = 'no reply';
      $mail->Body    = 'your application has been accepted .You can try login now <a href="http://localhost/smartacademy/login.php?verification='.$code.'">http://localhost/smartacademy/login.php?verification='.$code.'</a>';
      $mail->send();
      echo 'Message has been sent';
  } catch (Exception $e) {
      echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
  }
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
    header("location: http://localhost/smartacademy/sidebar-01/registeruser.php");
  }

}        
?>
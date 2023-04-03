<?php
 session_start();
 if(!isset($_SESSION["LoginUser"])){
  header("Location:../login.php");
 }
 include 'connection.php';
 $url_query = $_GET['id'];


 
    
    if(isset($_POST['sub1'])){
        $stud_id=$_POST['student'];
        $mark=$_POST['mark'];
        $examname =$_SESSION['exam'];
        $subid=$_SESSION['subid'];
        foreach($mark as $key => $value){
          // if condition for updation
         
        if($examname=='series1'){
       $sql5 = "SELECT * FROM `tbl_series1` WHERE stud_id='$stud_id[$key]' AND sub_id='$subid'";
          $result5 = $conn->query($sql5);
          if ($result5->num_rows > 0 ) {
              if($mark[$key]) {
                $sql="UPDATE `tbl_series1` SET `mark`='$mark[$key]' WHERE stud_id='$stud_id[$key]'";
                $result = $conn->query($sql);
              }
            
          }else{
        $sql="INSERT INTO `tbl_series1`(`stud_id`,`sub_id`,`mark`) VALUES ('$stud_id[$key]','$subid','$mark[$key]')";
         $result = $conn->query($sql);
        }}}
       
        
        foreach($mark as $key => $value){
        if($examname=='series2'){
          
          $sql5 = "SELECT * FROM `tbl_series2` WHERE stud_id='$stud_id[$key]' AND subj_id='$subid'";
          $result5 = $conn->query($sql5);
          if ($result5->num_rows > 0) {
            if($mark[$key]) {
              $sql="UPDATE `tbl_series2` SET `mark`='$mark[$key]' WHERE stud_id='$stud_id[$key]'";
              $result = $conn->query($sql);
            }
          }else{
        $sql="INSERT INTO `tbl_series2`(`stud_id`,`subj_id`,`mark`) VALUES ('$stud_id[$key]','$subid','$mark[$key]')";
         $result = $conn->query($sql);
        }}}

        foreach($mark as $key => $value){ 
          if($examname=='assignment1'){
            
            $sql5 = "SELECT * FROM `tbl_assignment1` WHERE stud_id='$stud_id[$key]' AND subj_id='$subid'";
            $result5 = $conn->query($sql5);
            if ($result5->num_rows > 0) {
              if($mark[$key]>4){
                echo "<script>alert('Enter valid mark')</script>";
              }
              else{ 
                if($mark[$key]) {
                  $sql="UPDATE `tbl_assignment1` SET `mark`='$mark[$key]' WHERE stud_id='$stud_id[$key]'";
                  $result = $conn->query($sql);
                  
                }
             
            }
          }else{
              if($mark[$key]>4){
                echo "<script>alert('Enter valid mark')</script>";
              }else{
          $sql="INSERT INTO `tbl_assignment1`(`stud_id`,`subj_id`,`mark`) VALUES ('$stud_id[$key]','$subid','$mark[$key]')";
           $result = $conn->query($sql);
          }}}}



          foreach($mark as $key => $value){
            if($examname=='assignment2'){
              
              $sql5 = "SELECT * FROM `tbl_assignment2` WHERE stud_id='$stud_id[$key]' AND subj_id='$subid'";
              $result5 = $conn->query($sql5);
              if ($result5->num_rows > 0) {
                if($mark[$key]>4){
                  echo "<script>alert('Enter valid mark')</script>";
                }
                else{
                $sql="UPDATE `tbl_assignment2` SET `mark`='$mark[$key]' WHERE stud_id='$stud_id[$key]'";
                $result = $conn->query($sql);
              }}else{
                if($mark[$key]>4){
                  echo "<script>alert('Enter valid mark')</script>";
                }else{
            $sql="INSERT INTO `tbl_assignment2`(`stud_id`,`subj_id`,`mark`) VALUES ('$stud_id[$key]','$subid','$mark[$key]')";
             $result = $conn->query($sql);
            }}}}

            foreach($mark as $key => $value){
              if($examname=='assignment3'){
                
                $sql5 = "SELECT * FROM `tbl_assignment3` WHERE stud_id='$stud_id[$key]'AND subj_id='$subid'";
                $result5 = $conn->query($sql5);
                if ($result5->num_rows > 0) {
                  if($mark[$key]>4){
                    echo "<script>alert('Enter valid mark')</script>";
                  }
                  else{
                  $sql="UPDATE `tbl_assignment3` SET `mark`='$mark[$key]' WHERE stud_id='$stud_id[$key]'";
                  $result = $conn->query($sql);
                }}else{
                  if($mark[$key]>4){
                    echo "<script>alert('Enter valid mark')</script>";
                  }else{
              $sql="INSERT INTO `tbl_assignment3
              `(`stud_id`,`subj_id`,`mark`) VALUES ('$stud_id[$key]','$subid','$mark[$key]')";
               $result = $conn->query($sql);
              }}}}

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
  <h1 id="h1">Marks</h1><br> <br>
  <form action="" method="POST" id="data-form">
    <!-- <button type="submit" class="btn btn-primary" name="submit" style="background-color: #29a329; color: white;" onclick="window.location.href = 'decm_excel.php';" > Download  </button> -->
    <select type="text" name="d" id="d">
      <option value="">Select the exam</option>
      <option value="series1">Series 1</option>
      <option value="series2">Series 2</option>
      <option value="assignment1">Assignment 1</option>
      <option value="assignment2">Assignment 2</option>
      <option value="assignment3">Assignment 3</option>
    </select>
    <input type="submit" name="submit" id="submit" value="VIEW">
  </form>

 <br> <br> <br>
 <div id="data-container">
  <form action="#" method="POST" id="mark_form">
  
 </div>
  </form>


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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script>

$(document).ready(function() {
$('#data-form').submit(function(event) {
    event.preventDefault();
    
    var formData = $(this).serialize();
    
    $.ajax({
    url: 'get_examtable.php',
    method: 'POST',
    data: formData,
    success: function(response) 
    {
      $('#data-container').html(response);
    },
    error: function(xhr, status, error) 
    {
      console.log(xhr.responseText);
    }
    });
  });
});

</script>   
  </body>
</html>
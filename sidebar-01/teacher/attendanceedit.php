<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
   
    <link rel="stylesheet" href="dashbord.css"> -->
  
     <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'> 
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  





<?php
include('..\connection.php');



if (isset($_POST["submit"]))
{
    $id=$_POST['id'];
    $s=$_POST['status'];
    $d=$_POST['date'];
    $sql=mysqli_query($conn,"update tbl_attendance set status='$s' where id='$id'");
    header('location:editattendance.php');
}

  ?>

<link rel="stylesheet" href="timetable.css"> 

<div class="container" style="margin-top: 100px;"> 

  <form id="contact" action="" method="post">
 
  <h2>Attendance Details</h2>
  <?php
  include('../connection.php');
  $id=$_GET['id'];
  $sql=mysqli_query($conn,"select * from tbl_attendance where id='$id'");
  while($row=mysqli_fetch_array($sql))
  {
    ?>
  <input type="hidden" name="id" value="<?php echo $row['id'];?>">
    <fieldset>
       <h4><b> Name</b></h4>
    <input type="text" name="fname" id="" value="<?php echo $row['name'];?>" readonly>
</fieldset>
    <fieldset> <h4><b> Phoneno</b></h4>
    <input type="text" name="lname" id="" value="<?php echo $row['phoneno'];?>" readonly>
    </fieldset>
    <fieldset> <h4><b> Email</b></h4>
    <input type="text" name="email" id="" value="<?php echo $row['email'];?>" readonly>
    </fieldset>
    
    <fieldset><h4> Status</h4></fieldset>
   
        <select name="status" id="" value="<?php echo $row['status'];?>" >   
        <option value = "" selected> Select option </option>  
        <option value = "Present" > Present </option>  
        <option value = "Absent" > Absent </option>
  </select>
     
    
 
    <h4><b>Date</b></h4>
      <input type="date" id="" name="dte" value="<?php echo $row['date'];?>" min="<?php echo date('Y-m-d');?>" readonly>
    <?php 
      }
      ?>
  
 <br>
  <button name="submit" type="submit" id="submit" name="submit" onsubmit="alert('Add successfully')"data-submit="...Sending">EDIT</button>
</div>
</html>


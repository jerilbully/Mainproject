<!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <script src="validate.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="https://codepen.io/skjha5993/pen/bXqWpR.css">
    <title>Smart Academy</title>
</head>
<body>
<?php include 'connection.php'?>
<?php

$url_query = $_GET['id'];

$sql1="SELECT * from tbl_assignment WHERE assig_id='$url_query' ";
$result = $conn->query($sql1);
$row = $result->fetch_array();
$subid=$row['subject_id'];
$dateStr = $row['totime'];
$date = new DateTime($dateStr);
$newFormat = $date->format('Y-m-d\TH:i');

$dateStr = $row['fromtime'] ;
$date = new DateTime($dateStr);
$newFormat2 = $date->format('Y-m-d\TH:i');

 // Output: 2023-03-03T09:49

$sql2="SELECT * from tbl_subject WHERE sub_id='$subid' ";
$result1 = $conn->query($sql2);
$row1 = $result1->fetch_array();
$subname=$row1['sub_name'];

 
if (isset($_POST['submit'])) {
    $subject = $_REQUEST['subject'];
    $title = $_REQUEST['title'];
    $from = $_REQUEST['fromdate'];
    $to = $_REQUEST['todate'];
    
        echo $url_query;

        $sql3="UPDATE `tbl_assignment` SET `title`='$title',
        `fromtime`='$from',`totime`='$to' WHERE assig_id=$url_query";

        mysqli_query($conn,$sql3);
        // header('Location:assignmentsview.php');
        echo"<script>alert('Succesfully updated'); window.location.href='assignmentsview.php'; </script>";
        
}
?>


    <div class="container">
        <form enctype="multipart/form-data" action="" method="post" id="form1">
            <h2 class="text-center">Update Assignment</h2>
        <div class="row jumbotron">

        <div class="col-sm-6 form-group">
                <label for="Sname">Subject</label>
                <input type="text" class="form-control" name="subject" id="name" value =" <?php  echo $row1['sub_name']; ?>"octavalidate="R,ALPHA_ONLY">
            </div>
            <div class="col-sm-6 form-group">
                <label for="Sname">Title</label>
                <input type="text" class="form-control" name="title" id="name" value =" <?php  echo $row['title'] ?>"octavalidate="R,ALPHA_ONLY">
            </div>
           
            <!-- <div class="col-sm-6 form-group">
                <label for="address">Upload Question</label>
                <input type="file" class="form-control" name="question" id="question" value =" <?php  echo $row['title'] ?>"  >
            </div> -->
            <div class="col-sm-6 form-group">
                <label for="tel">from time</label>
                <input type="datetime-local" name="fromdate" class="form-control" id="tel"  minlength="10" maxlength="10" value ="<?php  echo $newFormat2; ?>" octavalidate="R,EMAIL">
            </div>
            <div class="col-sm-6 form-group">
                <label for="Date">to time</label>
                <input type="datetime-local" name="todate" class="form-control" id="Date" value ="<?php echo $newFormat; ?>" required>
            </div>
            
           
            <div class="col-sm-12">
              <p>Back to Home page <a href="assignmentsview.php">back</a>.

            <div class="col-sm-6 form-group mb-0">
               <input type="submit" name="submit" id="submit" value="UPDATE">
            </div>
            <div class="col-sm-6 form-group mb-0">
               <input type="submit" name="submit1" id="submit1" value="DELETE">
            </div>
            
        </div>
        </form>
    </div>
    <script>
        var today = new Date().toISOString().slice(0, 16);
        document.getElementsByName("fromdate")[0].min = today;
        document.getElementsByName("todate")[0].min = today;

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

</body></html>

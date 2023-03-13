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
$sql="SELECT *from tbl_staff where tname='$url_query' ";
$result = $conn->query($sql);
$row1 = $result->fetch_array();
$teachid=$row1['tid'];
$log=$row1['log_id'];

$sql1="SELECT * from tbl_subjteacher WHERE teacherid='$teachid' ";
$result = $conn->query($sql1);
$row = $result->fetch_array();
$subid=$row['subid'];



 
if (isset($_POST['submit'])) {
    $subject = $_REQUEST['subject'];
    $title = $_REQUEST['title'];
    $from = $_REQUEST['fromdate'];
    $to = $_REQUEST['todate'];
    $title = $_REQUEST['title'];

        $name1 = $_FILES['question']['name'];
        $temp1 = $_FILES['question']['tmp_name'];
    
        $location="documents/";
        $image1=$location.$name1;

        $target_dir="documents/";
        $finalImage1=$target_dir.$name1;

        move_uploaded_file($temp1,$finalImage1);

        $insert="INSERT INTO `tbl_assignment`(`assig_id`, `subject_id`, `title`, `question`, `teacher_id`, `fromtime`, `totime`, `status`)
     VALUES ('','$subid','$title','$name1','$log','$from','$to','1')";
     mysqli_query($conn,$insert);

}
?>


    <div class="container">
        <form enctype="multipart/form-data" action="" method="post" id="form1">
            <h2 class="text-center">Add Assignment</h2>
        <div class="row jumbotron">

        <div class="col-sm-6 form-group">
        <label for="subject">Subject</label>
										<select name="subject" class="form-control">
											
											
                                        <?php
											// $query="SELECT * from tbl_subjteacher WHERE teacherid='$teachid' ";
											// $run=mysqli_query($conn,$query);
                                            // if ($run->num_rows > 0) {
											// while($row=mysqli_fetch_array($run)) {
                                            //     $subid=$row['subid'];

                                            //     $sql2="SELECT * from tbl_subject WHERE sub_id='$subid' ";
                                            //     $result2=mysqli_query($conn,$sql2);
                                            //     $row2=mysqli_fetch_row($result2)
                                                
                                                $sql2="SELECT * from tbl_subject WHERE sub_id='$subid'";
                                                $result2=mysqli_query($conn,$sql2);
											while($row2=mysqli_fetch_array($result2)) {?>
                                            <option value="<?php echo $row2["sub_name"]; ?>">

                                            <?php echo $row2['sub_name'] ?>
                                            </option>
                                            <?php
                                            }
                                        
                                            ?>
                                            
										</select>
            </div>
            <div class="col-sm-6 form-group">
                <label for="Sname">Title</label>
                <input type="text" class="form-control" name="title" id="name" placeholder="Enter the TITLE" octavalidate="R,ALPHA_ONLY">
            </div>
           
            <div class="col-sm-6 form-group">
                <label for="address">Upload Question</label>
                <input type="file" class="form-control" name="question" id="question" >
            </div>
            <div class="col-sm-6 form-group">
                <label for="tel">from time</label>
                <input type="datetime-local" name="fromdate" class="form-control" id="tel" placeholder="Enter Your Contact Number." minlength="10" maxlength="10" octavalidate="R,EMAIL">
            </div>
            <div class="col-sm-6 form-group">
                <label for="Date">to time</label>
                <input type="datetime-local" name="todate" class="form-control" id="Date" placeholder="" required>
            </div>
            
           
            <div class="col-sm-12">
              <p>Back to Home page <a href="teachermain.php">back</a>.

            <div class="col-sm-12 form-group mb-0">
               <input type="submit" name="submit" id="submit" value="ASSIGN">
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

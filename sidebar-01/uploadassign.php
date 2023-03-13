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
$id=$_GET['studid'];



 
if (isset($_POST['submit'])) {
    

        $name1 = $_FILES['question']['name'];
        $temp1 = $_FILES['question']['tmp_name'];
    
        $location="documents/";
        $image1=$location.$name1;

        $target_dir="documents/";
        $finalImage1=$target_dir.$name1;

        move_uploaded_file($temp1,$finalImage1);

        $insert="INSERT INTO `tbl_asignans`(`ansid`, `studid`,`assignid`, `answer`, `status`)
         VALUES ('','$id','$url_query','$name1','1')";
     mysqli_query($conn,$insert);

}
?>

    <div class="container">
        <form enctype="multipart/form-data" action="" method="post" id="form1">
            <h2 class="text-center">Add Assignment</h2>
        <div class="row jumbotron">

       
            
            <div class="col-sm-6 form-group">
                <label for="address">Upload Question</label>
                <input type="file" class="form-control" name="question" id="question" >
            </div>
            
            
            
           
            <div class="col-sm-12">
              <p>Back to Home page <a href="studentmain.php">back</a>.

            <div class="col-sm-12 form-group mb-0">
               <input type="submit" name="submit" id="submit" value="upload">
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

</body></html>

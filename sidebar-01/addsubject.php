
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
 $sql = "SELECT * from tbl_staff";
 $result = $conn->query($sql);
 ?>
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
 
    <div class="container">
        <form action="subjectmap.php" method="post" id="form1">
            <h2 class="text-center">Add A Subject</h2>
        <div class="row jumbotron">
            
           
            <!-- <div class="col-sm-6 form-group">
                <label for="address">BatchId</label>
                <input type="textarea" class="form-control" name="tadd" id="address" placeholder="Enter Address">
            </div> -->
            
           
            <div class="col-sm-6 form-group">
                
                <label for="batch">BATCH</label>
										<select name="batch" class="form-control">
											
											<?php
											$query="SELECT  * from tbl_batch";
											$run=mysqli_query($conn,$query);
											while($row=mysqli_fetch_array($run)) {?>
                                            <option value="<?php echo $row["batch_name"]; ?>">
                                            <?php echo $row['batch_name'] ?>
                                            </option>
                                            <?php
                                            }
                                            ?>
										</select>
            </div>
            <div class="col-sm-6 form-group">
                <label for="subname">Subject Name</label>
                <input type="text" class="form-control" name="subname" id="address" placeholder="Subject Name." required>
            </div>

            <div class="col-sm-6 form-group">
                <label for="Semester">Semester</label>
                <input type="text" class="form-control" name="semester" id="address" placeholder="Enter The Semester." required>
            </div>
            
            

            <div class="col-sm-12">
              <p>Back to Home page <a href="subject.php">Click Here</a>.

            <div class="col-sm-12 form-group mb-0">
               <input type="submit" name="submit" id="submit" value="Add">
            </div>
            
        </div>
        </form>
    </div>
    

</body></html>

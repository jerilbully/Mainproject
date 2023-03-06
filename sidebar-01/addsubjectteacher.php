
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
        <form action="addsubjectteacheraction.php" method="post" id="form1">
            <h2 class="text-center">Assign Teacher</h2>
        <div class="row jumbotron">
            
           
            <!-- <div class="col-sm-6 form-group">
                <label for="address">BatchId</label>
                <input type="textarea" class="form-control" name="tadd" id="address" placeholder="Enter Address">
            </div> -->
            
           
            <div class="col-sm-6 form-group">
                
                <label for="subject">Subject</label>
										<select name="subject" class="form-control">
											
											<?php
											$query=" SELECT * FROM tbl_subject WHERE tbl_subject.sub_id NOT IN (SELECT subid FROM tbl_subjteacher)";
											$run=mysqli_query($conn,$query);
											while($row=mysqli_fetch_array($run)) {?>
                                            <option value="<?php echo $row["sub_name"]; ?>">
                                            <?php echo $row['sub_name'] ?>
                                            </option>
                                            <?php
                                            }
                                            ?>
										</select>
            </div>
            <div class="col-sm-6 form-group">
            <label for="teacher">Teacher</label>
										<select name="teacher" class="form-control">
											
											<?php
											$sql=" SELECT * FROM tbl_staff WHERE tbl_staff.tid NOT IN (SELECT teacherid FROM tbl_subjteacher)";
											$run1=mysqli_query($conn,$sql);
											while($row1=mysqli_fetch_array($run1)) {?>
                                            <option value="<?php echo $row1["tname"]; ?>">
                                            <?php echo $row1['tname'] ?>
                                            </option>
                                            <?php
                                            }
                                            ?>
										</select>
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

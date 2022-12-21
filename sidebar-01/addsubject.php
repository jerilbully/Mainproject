
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
                
                <label for="staff">Subject</label>
										<select name="subject" class="form-control">
											
											<?php
											$query="SELECT  * from tbl_regsub";
											$run=mysqli_query($conn,$query);
											while($row=mysqli_fetch_array($run)) {?>
                                            <option value="<?php echo $row["rsubname"]; ?>">
                                            <?php echo $row['rsubname'] ?>
                                            </option>
                                            <?php
                                            }
                                            ?>
										</select>
            </div>
            
           
            <div class="col-sm-6 form-group">
                
                <label for="staff">staff:</label>
										<select name="teacher" class="form-control">
											
											<?php
											$query="SELECT  * from tbl_staff";
											$run=mysqli_query($conn,$query);
											while($row=mysqli_fetch_array($run)) {?>
                                            <option value="<?php echo $row["tname"]; ?>">
                                            <?php echo $row['tname'] ?>
                                            </option>
                                            <?php
                                            }
                                            ?>
										</select>
            </div>
            
<!--              
            <div class="col-sm-6 form-group">
                <label for="tel">Mode</label>
                <select name="hostel" id="hostel" class="form-control" required>
                    <option value="Dayscholar"> Dayscholar</option>
                    <option value="Hostler">Hostler</option>
                </select>
            </div> --> 
          
            <!-- <div class="col-sm-6 form-group">
                <label for="pass">Password</label>
                <input type="Password" name="tpass" class="form-control" id="pass" default='1111'>
            </div> -->
            <!-- <div class="col-sm-6 form-group">
                <label for="pass2">Confirm Password</label>
                <input type="Password" name="cnf-password" class="form-control" id="pass2" placeholder="Re-enter your password." equalto="pass" ov-equalto:msg="Both passwords do not match">
            </div> -->
            <div class="col-sm-12">
              <p>Back to Home page <a href="subject.php">Click Here</a>.

            <div class="col-sm-12 form-group mb-0">
               <input type="submit" name="submit" id="submit" value="Add">
            </div>
            
        </div>
        </form>
    </div>
    <!-- <script>
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
</script> -->

</body></html>

<?php
session_start();
?>  
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

$url_query = $_GET['id'];


 ?>
  
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@300&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
  <link rel="stylesheet" href="css/style.css">
  <title>Leave Application</title>
  <style>
    h1 {
      text-align: center;
      font-size: 2.5em;
      font-weight: bold;
      padding-top: 1em;
      margin-bottom: -0.5em;
    }

    form {
      padding: 40px;
    }

    input,
    textarea {
      margin: 5px;
      font-size: 1.1em !important;
      outline: none;
    }

    label {
      margin-top: 2em;
      font-size: 1.1em !important;
    }

    label.form-check-label {
      margin-top: 0px;
    }

    #err {
      display: none;
      padding: 1.5em;
      padding-left: 4em;
      font-size: 1.2em;
      font-weight: bold;
      margin-top: 1em;
    }

    table{
      width: 90% !important;
      margin: 1.5rem auto !important;
      font-size: 1.1em !important;
    }

    .error{
      color: #FF0000;
    }
  </style>

  <script>
    const validate = () => {

      let desc = document.getElementById('leaveDesc').value;
      let checkbox = document.getElementsByClassName("form-check-input");
      let errDiv = document.getElementById('err');

      let checkedValue = [];
      for (let i = 0; i < checkbox.length; i++) {
        if(checkbox[i].checked === true)
          checkedValue.push(checkbox[i].id);
      }

      let errMsg = [];

      if (desc === "") {
        errMsg.push("Please enter the reason and date of leave");
      }

      if(checkedValue.length < 1){
        errMsg.push("Please select the type of Leave");
      }

      if (errMsg.length > 0) {
        errDiv.style.display = "block";
        let msgs = "";

        for (let i = 0; i < errMsg.length; i++) {
          msgs += errMsg[i] + "<br/>";
        }

        errDiv.innerHTML = msgs;
        scrollTo(0, 0);
        return;
      }
    }
  </script>

</head>

<body>
  <!--Navbar-->
  <nav class="navbar header-nav navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
     
      <ul class="nav justify-content-end">
           
          
               
            </li>
            <li class="nav-item">
            <a href="teachermain.php?id=<?php   echo $_SESSION['LoginUser'];?>">Back </a>
           <br>
           <br>
           
            </ul>

      
    </div>
  </nav>


  <h1>Leave Application</h1>

  <div class="container">
    <div class="alert alert-danger" id="err" role="alert">
    </div>
  
    <form action="enterleave.php?id=<?php  echo $_SESSION['LoginUser'];?>" method="POST" onsubmit="alert(' successfully applied')">
    
    <a href="leavehistory.php?id=<?php   echo $_SESSION['LoginUser'];?>">LEAVE HISTORY </a>
    
   
    
      <div class="mb-3 ">
        <label for="dates"><b>From -</b></label>
        <input type="date" name="fromdate">
  
        <label for="dates"><b>To -</b></label>
        <input type="date" name="todate">
      </div>
  
      <div class="mb-3">
        
        <label for="leaveDesc" class="form-label"><b>Please mention reasons for your leave days :</b></label>
        <!-- error message if reason of the leave is not given -->
         
        <textarea class="form-control" name="reason" id="leaveDesc" rows="4" placeholder="Enter Here..."></textarea>
      </div>
      <?php
      echo $url_query;
      ?>
      <div class="mb-3">
    <label for="staff">Stand-in Teacher</label>
										<select name="subteach" class="form-control">
											
											<?php
                      
											$query='SELECT tname from tbl_staff';
                       
                      $sname ="SELECT tname from tbl_staff where tname!='$url_query'";
											$run=mysqli_query($conn,$sname);
											while($row=mysqli_fetch_array($run)) {
                        ?>

                                            <option value="<?php echo $row["tname"]; ?>">
                                            <?php echo $row['tname'];
                                            
                                            ?>
                                            </option>
                                            <?php
                        }
                                            
                                            ?>
										</select>
    </div>
 
  
  
      <input type="submit" name="submit" value="Submit Leave Request" class="btn btn-success">
    </form>
  
    
  </div>


</body>

</html>


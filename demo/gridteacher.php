<div id="content" class="p-4 p-md-5">

   

<!-- <a href="admin_dashboard.php"><button class="button-54">Dashboard</button></a> -->
  

 <style>
html {
  box-sizing: border-box;
}

*, *:before, *:after {
  box-sizing: inherit;
}

.column {
  float: left;
  width: relative;  
  margin-bottom: 8px;
  padding: 0 8px;
  width: 350px;
  height: 550px;
}

@media screen and (max-width: 650px) {
  .column {
    
    display: block;
  }
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
  height:350px;
  width:300px;
}

.container {
  padding: 0 16px;
}

.container::after, .row::after {
  content: "";
  clear: both;
  display: table;
}

.title {
  color: grey;
}

.button {
  border: none;
  outline: 0;
  display: inline-block;
  padding: 8px;
  color: white;
  background-color: #000;
  text-align: center;
  cursor: pointer;
  width: 100%;
}

.button:hover {
  background-color: #555;
}
</style>

<div><h1 id="h1">Teacher Detail</h1></div> 
<!-- ------------------------------------------------------------------------------------------------------------- -->
<h2>Responsive "Meet The Team" Section</h2>
<p>Resize the browser window to see the effect.</p>
<br> 

<?php
    
$servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "super_academy";
 
 // Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
 $sql = "SELECT * from tbl_staff";
 $result = $conn->query($sql);
 ?>
<?php
 if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
 ?> 


<div class="row">
  <div class="column">
    <div class="card">
      <img src="teacherimage/gloriyamiss.jpg" alt="Jane" >
      <div class="container">
        <h2><?php echo $row['tname'] ?></h2>
        <p class="title">Asst Professor</p>
        <!-- <p></p> -->
        <p><?php echo $row['temail'] ?></p>
        <p><button class="button">More details</button></p>
      </div>
    </div>
  </div>

  <?php
 }
 }
    ?>
  
</div>

<?php
 $sql = "SELECT * from tbl_staff";
 $result = $conn->query($sql);
 if ($result->num_rows > 0) {

  while($row = $result->fetch_assoc()) {
    echo "<br> name: ". $row["tname"]. " - email: ". $row["temail"]. " " ."<br>";
    }  
  
 }
    ?>

<?php
 $sql = "SELECT * from tbl_staff";
 $result = $conn->query($sql);


 if ($result->num_rows > 0) 
 {
  echo "<table style='border: 1px solid;'><tr><th>NAME</th><th>EMAIL</th><th></th></tr>";
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["tname"]. "</td><td>" . $row["temail"].  "</td><td><button>submit</button></td></tr>";
    }
    echo "</table>"; 
 
 } 
 else {
    echo "0 results";
    } 
  
 

    ?>
<br>
<?php
 $sql = "SELECT * from tbl_staff";
 $result = $conn->query($sql);

echo "<div class='grid-container' style='display: grid;
grid-template-column:1fr 1fr 1fr;

  background-color: #2196F3;
  font-size: 30px;
  place-items:centre;'";
 if ($result->num_rows > 0) 
 {

  echo "<table style='border: 1px solid;'><tr><th>NAME</th><th>EMAIL</th><th></th></tr>";
  while($row = $result->fetch_assoc()) {

    <div class="row">
  <div class="column">
    <div class="card">
      <img src="teacherimage/gloriyamiss.jpg" alt="Jane" >
      <div class="container">
        <h2><?php echo $row['tname'] ?></h2>
        <p class="title">Asst Professor</p>
        <!-- <p></p> -->
        <p><?php echo $row['temail'] ?></p>
        <p><button class="button">More details</button></p>
      </div>
    </div>
  </div>

  <?php
 }
 }
    ?>
  
</div> 
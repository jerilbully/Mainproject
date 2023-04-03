<?php
session_start(); 
include './connection.php';
if(!isset($_SESSION["LoginUser"])){
 header("Location:../login.php");
}

?>
<html lang="en">
  <head>
  	<title>Smart Academy</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		<link rel="stylesheet" href="table.css"> 
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">
  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
   
        </h2>
        <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment-2</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">

    <h1>College Timetable</h1>
    
    <table class="table">


    <?php include 'studentsidebar.php'; ?>

<h2 class="mb-4">Welcome
<?php
  echo $_SESSION['LoginUser'];
  $sname=$_SESSION['LoginUser'];

  $sql = "SELECT * from tab_reg where sname='$sname'";
  $result = $conn->query($sql);
  $row = $result->fetch_array();
  $sid =  $row['stud_id'];
  $lid =  $row['log_id'];

  $sql1 = "SELECT * from tbl_student where log_id='$lid'";
  $result1 = $conn->query($sql1);
  $row1 = $result1->fetch_array();
  $bid= $row1['batch_id'];
  
  
?>
 <thead>
            <!-- <th></th> --><tr>
                <?php
          $sql4 = "SELECT * from tbl_days";
          $result4 = $conn->query($sql4);
          if ($result4->num_rows > 0) {


            while($row4 = $result4->fetch_assoc()) {
                $dayid= $row4['dayid'];
                 $day= $row4['day'];

                 ?>
                
            <th class="mon"><?php echo  $row4['day']; ?></th>
        <?php
        }}?></tr>

    </thead>
<?php
//
$sql2 = "SELECT * from tbl_timetable where batchid='$bid'";
$snames = array();
$result2 = $conn->query($sql2);
if ($result2->num_rows > 0) {
    while($row2 = $result2->fetch_assoc()) {

        $dayid= $row2['dayid'];
        $sub_d = $row2['subid'];
        $hrid= $row2['hrid'];

        $sql5 = "SELECT * from tbl_subject where batch_id='$bid' and sub_id ='$sub_d'";
        $result5 = $conn->query($sql5);
        if ($result5->num_rows > 0) {
            while($row5 = $result5->fetch_assoc()) {
                        array_push($snames,$row5['sub_name']);
            }
        }
    }
}
        

    echo "<tbody>";
    $x = 1;
    $ind1=0;
    $ind2=4;
    $ind3=8;
    $ind4=12;
    $ind5=16;

    while($x < 5) {
        echo '<tr>
            <td>'.$snames[$ind1++].'</td>
            <td>'.$snames[$ind2++].'</td>
            <td>'.$snames[$ind3++].'</td>
            <td>'.$snames[$ind4++].'</td>
            <td>'.$snames[$ind5++].'</td>
        </tr>';
        $x++;
        }
                

    ?>
           <!-- <tr>
            <td class="period">2nd period</td>
            <td class="mon">FOSS</td>
            <td>Data mining</td>
            <td  class="wed">Networking Fundamental</td>
            <td>Communication Skills</td>
            <td class="fri">C++ Lab</td>
            <td></td>
           </tr>
           <tr>
            <td class="period">3rd period</td>
            <td class="mon">DSA</td>
            <td>Minor-projects</td>
            <td  class="wed">Python</td>
            <td>Module-I</td>
            <td class="fri">Cyber Security</td>
            <td></td>
           </tr>
           <tr>
           <td class="period">4th period</td>
            <td class="mon">Software testing</td>
            <td>C++</td>
            <td  class="wed">Higher-maths</td>
            <td>Sports</td>
            <td class="fri">Module-II</td>
            <td></td>

           </tr> -->
          
        </tbody>
    </table>
</div>

</body>
</html>
<style>
*{
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: Arial, Helvetica, sans-serif;
}
/* body{  
  
        
} */

.container{
   margin:10.8rem 20rem ;
  
}
h1{
    text-align: center;
    margin: 1rem 0;
    border: 4px solid #000000;
    background-color: gold;
}
.period{
    font-weight: 600;
}
table{
    border: 2px solid red;
}

.table,th,td,tr{
    border: 2px solid #000000;
    border-collapse: collapse;
    padding: 1rem;
}
.mon{
    background:linear-gradient(to  right, rgb(10, 255, 121) , rgb(6, 87, 107));
    /* color: #fff; */
}
.wed{
    background-color: crimson;
    color: #fff;
}
.fri{
    background-color: yellowgreen;
}
</style>

      </div>
		</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
  </body>
</html>
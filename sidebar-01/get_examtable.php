
<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script>
      
      $(function () {

        $("#phone_error_message").hide();

        $("#form").keyup(function () {
        check_phone();
    });
    function check_phone() {
        var phone = $("#form").val();
        var pattern = /^[0-9]{0,9}$/;
        if (phone<=15 && pattern.test(phone)) {
            $("#phone_error_message").hide();
           
        } else if (phone == "") {
            $("#phone_error_message").html("This field cannot be blank");
            $("#phone_error_message").show();
            
            error_phone = true;
        } else {
            $("#phone_error_message").html("Enter valid mark.Mark should less than or equal to 15");
            $("#phone_error_message").show();
          
            error_phone = true;
        }
    }

    $("#mark_form").submit(function () {
        error_phone = false;
        check_phone();
        if (error_phone === false)
        {
            return true;
        } else {
            alert("Please fill the form Correctly");

            return false;
        }
    });
      });

        </script>

<?php
    include('connection.php');
    session_start();
    if(!isset($_SESSION["LoginUser"]))
    {
        header("Location:../login.php");
    }
    // $examname = $_POST['d'];
    // $_SESSION['exam']="$examname ";
    // if(isset($_POST['sub1'])){
    //     $stud_id=$_POST['student'];
    //     $mark=$_POST['mark'];
    //     $examname =$_SESSION['exam'];
    //     if($examname=='series1'){
    //     $sql="INSERT INTO `tbl_internal`( `stud_id`, `sub_id`, `series1`) 
    //     VALUES ('$stud_id','$subid','$mark')";
    //      $result = $conn->query($sql);
    //     }
         

    // }

    // Retrieve the selected options from the form data
    $examname = $_POST['d'];

    $_SESSION['exam']="$examname";
    $tname = $_SESSION['LoginUser'];

    // Build the SQL query based on the selected options
    $sql = "SELECT * FROM tbl_staff WHERE tname='$tname'";
    // Execute the SQL query
    $result = $conn->query($sql);
    $r = $result->fetch_assoc();
    $tid = $r['tid'];

    $sql0 = "SELECT * FROM tbl_subjteacher WHERE teacherid='$tid'";
    $result0 = $conn->query($sql0);
    $row=$result0->fetch_assoc();
    $subid=$row['subid'];
    $_SESSION['subid']="$subid";

    $sql2 = "SELECT * FROM tbl_subject WHERE sub_id='$subid'";
    $result2 = $conn->query($sql2);
    $row2=$result2->fetch_assoc();
    $batchid=$row2['batch_id'];

    $sql3 = "SELECT * FROM tbl_student WHERE batch_id='$batchid'";
    $result3 = $conn->query($sql3);
    // $row3=$result3->fetch_assoc();
    
    
    echo "<form action='' method='POST' id='mark_form'>";
    echo "<table>";
    echo "<tr><th>NAME</th><th>MARK</th></tr>";

    while($row3=mysqli_fetch_assoc($result3)) 
    {
        $logid=$row3['log_id'];
        $sql4 = "SELECT * FROM tab_reg WHERE log_id='$logid'";
        $result4 = $conn->query($sql4);
        $row4=$result4->fetch_assoc();
        // Build the HTML table based on the query results
        // if ($result4->num_rows > 0) 
        $rw=$row4['sname'];
        $stud_id=$row4['stud_id'];

        
            echo "<tr><td><input type='hidden' name='student[]' value='$stud_id'>" . $row4['sname'] . "</input></td><td><input type='number' id='form' class='' name='mark[]'><span id='phone_error_message'></span></td></tr>";
        
    }
     // echo "<tr><td colspan='4'>Students</td></tr>";
     echo "</table>";
      echo "<button type='submit' name='sub1' style='margin-left:550px;'>Submit</button>";
        
        echo "</form>";
?>
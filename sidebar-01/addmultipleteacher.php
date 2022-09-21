<?php

use SimpleExcel\SimpleExcel;
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "super_academy";
    
    // Create connection
    $conn = new mysqli($servername, 
        $username, $password, $dbname);
        
    // Check connection
    if ($conn->connect_error) 
    {
        die("Connection failed: " 
            . $conn->connect_error);
    }
    else
    {
        echo "Connected";
    }
    
    

    if(isset($_POST['submit']))
    {
        if(move_uploaded_file($_FILES['excel_file']['tmp_name'], $_FILES['excel_file']['name']))
        {
            require_once('SimpleExcel/SimpleExcel.php');                // load the main class file (if you're not using autoloader)

            $excel = new SimpleExcel('csv');                            // instantiate new object (will automatically construct the parser & writer type as XML)]
            $excel->parser->loadFile($_FILES['excel_file']['name']);    // load an XML file from server to be parsed

            $foo = $excel->parser->getField();                          // get complete array of the table
            // $bar = $excel->parser->getRow(3);                        // get specific array from the specified row (3rd row)
            // $baz = $excel->parser->getColumn(4);                     // get specific array from the specified column (4th row)
            // $qux = $excel->parser->getCell(2,1);                     // get specific data from the specified cell (2nd row in 1st column)

            // echo '<pre>';
            // print_r($foo);                                           // echo the array
            // echo '</pre>';

            $count = 1;
            while($count < (count($foo)))
            {
                $name = $foo[$count][0];
                $address = $foo[$count][1];
                $phone = $foo[$count][2];
                $doj = $foo[$count][3];
                $email = $foo[$count][4];
                $quali = $foo[$count][5];
                $tpass = "1212";
                $role = "teacher";

                // $hash = md5($_REQUEST['tpass']);
                // $tpass=$hash;
                
                $sql = "INSERT INTO tbl_login( log_id,username,password,role) VALUES ('','$name','$tpass','$role')";
   
                    $result=$conn->query($sql);
                    
                   $sql2="SELECT log_id from tbl_login where username='$name'";
                   $result=$conn->query($sql2);
                   if($result->num_rows>0)
                   {
                   echo "hey";
                   foreach($result as $data)
                   
                   {
                   
                   $log_id=$data['log_id'];
                   }
                   
                   }
                   $sql1 ="INSERT INTO tbl_staff VALUES ('','$log_id','$name','$address','$phone','$doj','$email','$quali','$tpass','')";
                    if($conn->query($sql1) === TRUE)
                    {
                        echo "Successful inserted login";
                    }
                    else
                {
                        echo "Insertion failed in login";
                }
                header('Location:hodteacher.php'); 
                echo "Successful inserted";
                }
        }
        ?>
            <script>
                alert("Data imported successfully");
            </script>
        <?php
        header("location: hodteacher.php");
    } 

    // echo "<script>window.location.href='addnewfaculty.php';</script>";
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
        <form action="" method="post" id="form1" enctype="multipart/form-data">
            <h2 class="text-center">ADD MULTIPLE TEACHERS</h2>
        <div class="row jumbotron">
            <p><b>Download the Excel sheet to fill in the details</b></p>
            <a href="download.php?file=Teachers.xlsx">
                <div class="download">
                    Download Excel file
                </div>
            </a>
            
            <p><b>  and  Save your Excel sheet in .csv format before uploading</b></p><br>
            <input type="file" placeholder="Upload the Excel file" id="excel_file" name="excel_file" accept=".csv" style="border: none;"><br>
                  
            <div class="col-sm-12 form-group mb-0">
               <input type="submit" name="submit" id="submit" value="IMPORT">
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

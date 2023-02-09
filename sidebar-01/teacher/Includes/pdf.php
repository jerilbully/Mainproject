<?php
require_once 'C:\xampp\htdocs\smartacademy\fpdf.php';


session_start();
$con=mysqli_connect("localhost","root","","super_academy");    
if($con===false){
   die("ERROR: Could not connect.".mysqli_connect_error());
}




$sql="select * from `tbl_attendance`";
$res=mysqli_query($con,$sql);

if(isset($_POST['btn_pdf']))
  {




 
    $pdf = new FPDF('p','mm','a3');
    $pdf->SetFont('arial','b',14);
    
    $pdf->AddPage();


   

    $pdf->Cell('250','30','Smart Academy','4','1','C');

    
    $pdf->Cell('40','10','Firstname','1','0','C');
    $pdf->Cell('40','10','Phone Number','1','0','C');
    $pdf->Cell('60','10','Email','1','0','C');
    $pdf->Cell('40','10','Status','1','0','C'); 
    $pdf->Cell('50','10','Date','1','1','C');
   

    while($row=mysqli_fetch_assoc($res)) {
        $pdf->Cell('40','10',$row['name'],'1','0','C');
        $pdf->Cell('40','10',$row['phoneno'],'1','0','C');
        $pdf->Cell('60','10',$row['email'],'1','0','C');
        $pdf->Cell('40','10',$row['status'],'1','0','C');
        $pdf->Cell('50','10',$row['date'],'1','1','C');
       
      


    }
    
    $pdf->Output();
  }



?>
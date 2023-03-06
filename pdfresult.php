<?php
require_once 'fpdf.php';
session_start();
$con=mysqli_connect("localhost","root","","super_academy");    
if($con===false){
   die("ERROR: Could not connect.".mysqli_connect_error());
}

$sql = "SELECT * from tab_reg WHERE sstage='0' order by total desc";
 
$res=mysqli_query($con,$sql);
if(isset($_POST['result']))
  {
    $pdf = new FPDF('p','mm','a4');
    $pdf->SetFont('arial','b',14);
    $pdf->AddPage();
    $pdf->Cell('150','10','Rank list for this Academic year 2023-28','0','1','C');
    $pdf->Cell('40','10','Rank','1','0','C');
    $pdf->Cell('50','10','Name','1','0','C');
    $pdf->Cell('60','10','Email','1','1','C');
    ;
    $i = 1;

    while($row=mysqli_fetch_assoc($res)) {
        // $a=$row['sname'];
        // $countt=count($a);
        
        // while($i <=$countt) {
            $pdf->Cell('40','10',$i,'1','0','C');
            $pdf->Cell('50','10',$row['sname'],'1','0','C');
            $pdf->Cell('60','10',$row['semail'],'1','1','C');
            
            $i++;
          }
       
       
      


    
    
    $pdf->Output();
  }

?>
<?php
include "db.php";
require "vendor/autoload.php";
$result=$conn->query ("select * from productS");
$pdf=new TCPDF();
$pdf->AddPage();
$pdf->setFont("times","I","12");
$html='<table border="1" style="background-color:yellow;">
    <tr>
    <td>Product ID</td>
    <td>Product Name</td>
    <td>Category</td>
    <td>Price</td>
    <td>Quantity</td>
    <td>Description</td>
    </tr>';
while($row=$result->fetch_assoc()){
    $html.='<tr>
    <td>'.$row ["pid"].'</td>
    <td>'.$row ["pname"].'</td>
    <td>'.$row ["category"].'</td>
    <td>'.$row ["price"].'</td>
    <td>'.$row ["quantity"].'</td>
    <td>'.$row ["description"].'</td>
    </tr>';

}
$html.='</table>';
$pdf->writehtml($html,true,false,true,false,'');
$pdf->Output("Products.pdf","D");
?>
<?php
$ideleve=$_GET["ideleve"];
$idfiche=$_GET["idfiche"];
function verif($id,$val){if ($id == $val){return 'Oui';}else{return 'Non';} }
require('sscolaire.php');
$pdf = new sscolaire( 'P', 'mm', 'A4',true,'UTF-8',false );
$pdf->setPrintHeader(false);$pdf->SetAutoPageBreak(TRUE, 0);$pdf->setPrintFooter(false);$pdf->SetFont('DejaVuSans','',8);
$pdf->mysqlconnect();
$query = "select * from eleve WHERE  id = '$ideleve'";
$resultat=mysql_query($query);
while($result=mysql_fetch_object($resultat))
{
$pdf->EXAMENPARA($ideleve,$result->SEX);
}
$pdf->Output();




?>



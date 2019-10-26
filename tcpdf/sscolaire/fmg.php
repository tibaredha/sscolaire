<?php
$id=$_GET["ideleve"];
$idfiche=$_GET["idfiche"];
$style = array(
    'position' => '',
    'align' => 'R',
    'stretch' => false,
    'fitwidth' => false,
    'cellfitalign' => '',
    'border' => false,
    'hpadding' => 'auto',
    'vpadding' => 'auto',
    'fgcolor' => array(0,0,0),
    'bgcolor' => false, //array(255,255,255),
    'text' => true,
    'font' => 'helvetica',
    'fontsize' => 8,
    'stretchtext' => 4
);
require('sscolaire.php');
$pdf = new sscolaire( 'P', 'mm', 'A4',true,'UTF-8',false );
$pdf->setPrintHeader(false);$pdf->SetAutoPageBreak(TRUE, 0);$pdf->setPrintFooter(false);
function verif($id,$val){if ($id == $val){return 'Oui';}else{return 'Non';} }
$pdf->SetFont('DejaVuSans','',8);
$pdf->mysqlconnect();
$query = "select * from examenemg WHERE IDELEVE= '$id'";
$resultat=mysql_query($query);
while($resultemg=mysql_fetch_object($resultat))
{
$data=array(
"DATE"      => $resultemg->DATESBD,
"CLASSE"    => $resultemg->NIVEAUS,
"ID"        => $id,
"OKRDV"     => verif($resultemg->OKRDV,"1"), 
"DATECSBD"  => $resultemg->DATECSBD,
"m1"        => verif($resultemg->m1,"1"), 
"m2"        => verif($resultemg->m2,"1"),  
"m3"        => verif($resultemg->m3,"1"),  
"m4"        => verif($resultemg->m4,"1"),  
"m5"        => verif($resultemg->m5,"1"),  
"m6"        => verif($resultemg->m6,"1"),  
"m7"        => verif($resultemg->m7,"1"),  
"m8"        => verif($resultemg->m8,"1"),  
"m9"        => verif($resultemg->m9,"1"),  
"m10"        => verif($resultemg->m10,"1"),  
"m11"        => verif($resultemg->m11,"1"),  
"m12"        => verif($resultemg->m12,"1"),  
"m13"        => verif($resultemg->m13,"1"),  
"m14"        => verif($resultemg->m14,"1"),  
"m15"        => verif($resultemg->m15,"1"),  
"m16"        => verif($resultemg->m16,"1"),  
"m17"        => verif($resultemg->m17,"1"),  
"m18"        => verif($resultemg->m18,"1"),  
"m19"        => verif($resultemg->m19,"1"),  
"m20"        => verif($resultemg->m20,"1"),  
"m21"        => verif($resultemg->m21,"1"), 
"m22"        => verif($resultemg->m22,"1"),  
"m23"        => verif($resultemg->m23,"1"),  
"m24"        => verif($resultemg->m24,"1"),  
"m25"        => verif($resultemg->m25,"1"),  
"m26"        => verif($resultemg->m26,"1"),  
"m27"        => verif($resultemg->m27,"1"),  
"m28"        => verif($resultemg->m28,"1"),  
"m29"        => verif($resultemg->m29,"1"),  
"m30"        => verif($resultemg->m30,"1"),  
"m31"        => verif($resultemg->m31,"1"), 
"m32"        => verif($resultemg->m32,"1"),  
"m33"        => verif($resultemg->m33,"1"),  
"m34"        => verif($resultemg->m34,"1"),  
"m35"        => verif($resultemg->m35,"1"),  
"m36"        => verif($resultemg->m36,"1"),  
"m37"        => verif($resultemg->m37,"1"),  
"m38"        => verif($resultemg->m38,"1"),  
"m39"        => verif($resultemg->m39,"1"),  
"m40"        => verif($resultemg->m40,"1"),  
"m41"        => verif($resultemg->m41,"1"), 
"m42"        => verif($resultemg->m42,"1"),  
"m43"        => verif($resultemg->m43,"1"),  
"m44"        => verif($resultemg->m44,"1"),  
"m45"        => verif($resultemg->m45,"1"),  
"m46"        => verif($resultemg->m46,"1"),  
"m47"        => verif($resultemg->m47,"1"),  
"m48"        => verif($resultemg->m48,"1"),  
"m49"        => verif($resultemg->m49,"1"),  
"m50"        => verif($resultemg->m50,"1"), 
"m51"        => verif($resultemg->m51,"1"), 
"m52"        => verif($resultemg->m52,"1"),  
"m53"        => verif($resultemg->m53,"1"),  
"m54"        => verif($resultemg->m54,"1")  
);
$pdf->EXAMENMEDICAL($data);
$pdf->Output();
}

?>



<?php
$id=$_GET["uc"];
require('deces.php');
$pdf = new deces( 'P', 'mm', 'A4',true,'UTF-8',false );
$pdf->setPrintHeader(false);$pdf->SetAutoPageBreak(TRUE, 0);$pdf->setPrintFooter(false);
$pdf->AddPage('P','A4');
$pdf->setRTL(false); 
$pdf->RoundedRect($x=5, $y=5, $w=200, $h=155, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->RoundedRect($x=5, $y=160, $w=200, $h=130, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$file = '../../public/images/mlegale/'.$id.'.jpg';
if (file_exists($file)){$pdf->Image('../../public/images/mlegale/'.$id.'.jpg', $x=6, $y=6, $w=198, $h=150, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=0, $fitbox=false, $hidden=false, $fitonpage=false, $alt=false, $altimgs=array()); }
else{$pdf->Image('../../public/images/mlegale.jpg', $x=6, $y=6, $w=198, $h=150, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=0, $fitbox=false, $hidden=false, $fitonpage=false, $alt=false, $altimgs=array()); }
$pdf->SetFont('aefurat', '', 14);

$pdf->mysqlconnect();
$query = "select * from deceshosp WHERE  id = '$id'    ";
$resultat=mysql_query($query);
while($result=mysql_fetch_object($resultat))
{

$pdf->SetXY(5,160);$pdf->Cell(200,5,"EXAMEN EXTERNE DU CORPS : ".$result->NOM.'_'.$result->PRENOM.'_ ('.$result->FILSDE.')',0,1,'L');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,"sexe : ".$result->SEX,0,1,'L');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,"taille (cm): -----, poids (kg) : ----- , index de masse corporelle : -----",0,1,'L');

$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,"âge : ".$result->Years." Ans ",0,1,'L');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,"cheveux, phanères",0,1,'L');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,"examen oculaire",0,1,'L');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,"coloration anormale de la peau, pigmentation, cyanose",0,1,'L');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,"éléments d'identification : tatouages, cicatrices",0,1,'L');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,"trace(s) de ponction veineuse récente",0,1,'L');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,"présence/absence d'une sonde d'intubation, sonde gastrique",0,1,'L');

$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,"description des phénomènes cadavériques",0,1,'L');

$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,"description de la tête",0,1,'L');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,"description du cou",0,1,'L');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,"description des membres supérieurs",0,1,'L');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,"description du thorax",0,1,'L');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,"description de l'abdomen",0,1,'L');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,"description des organes génitaux externe, du périnée et de la région anale",0,1,'L');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,"description des téguments du dos",0,1,'L');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,"description des membres inférieurs",0,1,'L');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,"description des éléments matériels",0,1,'L');
$pdf->AddPage('P','A4');
$pdf->SetFont('aefurat', '', 14);

$pdf->RoundedRect($x=5, $y=5, $w=200, $h=155+130, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,"AUTOPSIE description des incisions ",0,1,'L');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,"Crâne",0,1,'L');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,"Ouverture des cavités pleurales et péritonéale",0,1,'L');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,"Examen des organes du thorax ",0,1,'L');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,"Examen du cou et de la face",0,1,'L');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,"Examen des organes de l’abdomen ",0,1,'L');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,"reconstitution du corps",0,1,'L');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,"PRELEVEMENTS REALISES ",0,1,'L');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,"DISCUSSION",0,1,'L');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,"CONCLUSION ",0,1,'L');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,"",0,1,'L');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,"",0,1,'L');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,5,"",0,1,'L');
$pdf->Output('declaration.pdf');
}
?>



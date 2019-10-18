<?php
$id=$_GET["uc"];
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
function verif($id,$val){if ($id == $val){return 'Oui';}else{return 'Non';} }
require('sscolaire.php');
$pdf = new sscolaire( 'P', 'mm', 'A4',true,'UTF-8',false );
$pdf->setPrintHeader(false);$pdf->SetAutoPageBreak(TRUE, 0);$pdf->setPrintFooter(false);
$pdf->mysqlconnect();
$query = "select * from uds WHERE  id = '$id'";//
$resultat=mysql_query($query);
while($result=mysql_fetch_object($resultat))
{
$pdf->AddPage('P','A4');
$pdf->setRTL(FALSE); 
$pdf->RoundedRect($x=5, $y=5, $w=200, $h=285, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->SetFont('DejaVuSans','',11);
$pdf->SetXY(15,$pdf->GetY()+5); $pdf->Cell(180,6,"4-établissements scolaires",1,1,'L');
$pdf->SetXY(15,$pdf->GetY());   $pdf->Cell(89,4,"Nom établissements scolaires",1,0,'L');$pdf->Cell(22,5,"Commune",1,0,'C');$pdf->Cell(22,5,"***",1,0,'C');$pdf->Cell(47,5,"***",1,0,'C');
$pdf->mysqlconnect();
$query = "SELECT * from ecole  order by typeecole,ecole";//where iduds = $result->ids 
$resultat=mysql_query($query);
$totalmbr1=mysql_num_rows($resultat);
while($row=mysql_fetch_object($resultat))
{
	$pdf->SetXY(15,$pdf->GetY()+5);$pdf->SetFont('Times','B',7);
	
	$w=15;
	if($row->typeecole==1)
	{
	$pdf->SetFillColor(250);$pdf->cell(89,5,strtoupper($row->ecole),1,0,'L',1,0);$pdf->SetFont('Times','B',10);$pdf->Cell(32,5,$pdf->nbrtostring("com","IDCOM",$row->idcom,"COMMUNE"),1,0,'L');$pdf->Cell(22,5,"_",1,0,'C');$pdf->Cell(37,5,"_",1,0,'C');

	$pdf->SetFillColor(230);
	}
	
	if($row->typeecole==2)
	{
	$pdf->SetFillColor(230);$pdf->cell(89,5,strtoupper($row->ecole),1,0,'L',1,0);$pdf->SetFont('Times','B',10);$pdf->Cell(32,5,$pdf->nbrtostring("com","IDCOM",$row->idcom,"COMMUNE"),1,0,'L');$pdf->Cell(22,5,"_",1,0,'C');$pdf->Cell(37,5,"_",1,0,'C');

	$pdf->SetFillColor(230);
	}
	
	
	if($row->typeecole==3)
	{
	$pdf->SetFillColor(200);$pdf->cell(89,5,strtoupper($row->ecole),1,0,'L',1,0);$pdf->SetFont('Times','B',10);$pdf->Cell(32,5,$pdf->nbrtostring("com","IDCOM",$row->idcom,"COMMUNE"),1,0,'L');$pdf->Cell(22,5,"_",1,0,'C');$pdf->Cell(37,5,"_",1,0,'C');

	$pdf->SetFillColor(230);
	}
 
	
}






$pdf->Output();
}

?>



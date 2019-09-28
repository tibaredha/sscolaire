<?php
require('sscolaire.php');
$pdf = new sscolaire();$pdf->AliasNbPages();
$ID = $_GET["uc"];
$pdf->SetFont('Arial','B',9);
$pdf->mysqlconnect();
$query = "SELECT * FROM eleve where id='".$ID."'  ";
$resultat=mysql_query($query);
$pdf->SetFont('Arial','B',08);
while($row=mysql_fetch_object($resultat))
{
    $pdf->AddPage();$pdf->setSourceFile('ss.pdf');$tplIdx = $pdf->importPage(1);$pdf->useTemplate($tplIdx, 5, 5, 200);
	$pdf->SetFont('Arial','B',10);
	$pdf->SetTextColor(255,0,0);
	$pdf->EAN13(20,69,$ID,$h=6,$w=.35);
	$pdf->SetXY(80,69);$pdf->Write(0,"DJELFA");
	$pdf->SetXY(80,69+7);$pdf->Write(0,$pdf->nbrtostring('com','IDCOM',$pdf->nbrtostring('ecole','id',$row->ECOLE,'idcom'),'COMMUNE'));
	$pdf->SetXY(80,83);$pdf->Write(0,$pdf->nbrtostring('ecole','id',$row->ECOLE,'ecole'));
	$pdf->SetXY(80,142);$pdf->Write(0,$row->NOM.'_'.$row->PRENOM.'('.$row->FILSDE.')');
	$pdf->SetXY(50,150);$pdf->Write(0,$pdf->dateUS2FR($row->DATENS));
	$pdf->SetXY(85,156);$pdf->Write(0,$pdf->nbrtostring('com','IDCOM',$row->COMMUNER,'COMMUNE'));
	$pdf->SetXY(68,169+12);$pdf->Write(0,$pdf->nbrtostring('ecole','id',$row->ECOLE,'ecole'));

	
	for($i=2; $i < 18; $i++){
	$pdf->AddPage();$pdf->setSourceFile('ss.pdf');$tplIdx = $pdf->importPage($i);$pdf->useTemplate($tplIdx, 5, 5, 200);
	
	}
	
	
	
	
	
	$pdf->Output($row->NOM.'_'.$row->PRENOM.".pdf","I");
}

?>
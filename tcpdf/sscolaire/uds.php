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
$pdf = new sscolaire( 'P', 'mm', 'A4',true,'UTF-8',false );$pdf->setPrintHeader(false);$pdf->SetAutoPageBreak(TRUE, 0);$pdf->setPrintFooter(false);

$pdf->SetFont('Times','B',7);

$pdf->mysqlconnect();
$query = "select * from uds order by ids";
$resultat=mysql_query($query);
$xx=0;
while($result=mysql_fetch_object($resultat))
{
$pdf->AddPage('P','A4');$pdf->setRTL(FALSE);$pdf->RoundedRect($x=5, $y=5, $w=200, $h=285, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->SetXY(15,$pdf->GetY()+5);$pdf->SetFillColor(250);
$pdf->cell(10,5,($xx=$xx+1),1,0,'C',1,0);$pdf->cell(80,5,"UDS : ".strtoupper($result->uds),1,0,'L',1,0);$pdf->cell(90,5,"EPSP : ".$pdf->nbrtostring("structure","id",$result->ids,"structure"),1,0,'L',1,0);
    //***********************************************************************************************************//
	$querye = "SELECT * from ecole where iduds = $result->id  order by typeecole,ecole";$resultate=mysql_query($querye);$totalmbre=mysql_num_rows($resultate);
    $pdf->SetXY(15,$pdf->GetY()+10);$pdf->cell(10,5,"N°",1,0,'C',1,0);$pdf->cell(60,5,"Nom école(FR)",1,0,'C',1,0);$pdf->cell(60,5,"Nom école(AR)",1,0,'C',1,0);$pdf->Cell(25,5,"Commune",1,0,'C',1,0);$pdf->cell(25,5,"Type école",1,1,'C',1,0);
	$pdf->SetXY(15,$pdf->GetY());$pdf->SetFont('Times','B',7);$x=0;
	while($rowe=mysql_fetch_object($resultate))
    {
	$pdf->cell(10,5,$x=$x+1,1,0,'C',0,0);
	$pdf->cell(60,5,strtoupper($rowe->ecole),1,0,'L',0,0);$pdf->SetFont('DejaVuSans','',10);
	$pdf->cell(60,5,strtoupper($rowe->ecolear),1,0,'R',0,0);$pdf->SetFont('Times','B',7);
	$pdf->Cell(25,5,$pdf->nbrtostring("com","IDCOM",$rowe->idcom,"COMMUNE"),1,0,'C');
	if($rowe->typeecole==1){$pdf->cell(25,5,"primaire",1,0,'C',0,0);}
	if($rowe->typeecole==2){$pdf->cell(25,5,"moyenne",1,0,'C',0,0);}
	if($rowe->typeecole==3){$pdf->cell(25,5,"lycée",1,0,'C',0,0);}
	$pdf->SetXY(15,$pdf->GetY()+5);
	}
	$pdf->SetXY(15,$pdf->GetY());$pdf->cell(180,5,"Total uds : ".$totalmbre,1,0,'L',1,0);
	//***********************************************************************************************************//
$pdf->SetXY(15,$pdf->GetY()+5);
}


$pdf->mysqlconnect();
$query = 'select * from com where IDWIL= "17000" and yes="1" order by COMMUNE';
$resultat=mysql_query($query);
$xx=0;
while($result=mysql_fetch_object($resultat))
{
$pdf->AddPage('P','A4');$pdf->setRTL(FALSE);$pdf->RoundedRect($x=5, $y=5, $w=200, $h=285, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->SetXY(15,$pdf->GetY()+5);$pdf->SetFillColor(250);
$pdf->cell(10,5,($xx=$xx+1),1,0,'C',1,0);$pdf->cell(80,5,"Commune : ".strtoupper($result->COMMUNE),1,0,'L',1,0);$pdf->cell(90,5,"Wilaya de djelfa : ",1,0,'L',1,0);

    //***********************************************************************************************************//
	$querye = "SELECT * from ecole where idcom = $result->IDCOM  order by typeecole,ecole";$resultate=mysql_query($querye);$totalmbre=mysql_num_rows($resultate);
    $pdf->SetXY(15,$pdf->GetY()+10);$pdf->cell(10,5,"N°",1,0,'C',1,0);$pdf->cell(60,5,"Nom école(FR)",1,0,'C',1,0);$pdf->cell(60,5,"Nom école(AR)",1,0,'C',1,0);$pdf->Cell(25,5,"Commune",1,0,'C',1,0);$pdf->cell(25,5,"Type école",1,1,'C',1,0);
	$pdf->SetXY(15,$pdf->GetY());$pdf->SetFont('Times','B',7);$x=0;
	while($rowe=mysql_fetch_object($resultate))
    {
	$pdf->cell(10,5,$x=$x+1,1,0,'C',0,0);
	$pdf->cell(60,5,strtoupper($rowe->ecole),1,0,'L',0,0);$pdf->SetFont('DejaVuSans','',10);
	$pdf->cell(60,5,strtoupper($rowe->ecolear),1,0,'R',0,0);$pdf->SetFont('Times','B',7);
	$pdf->Cell(25,5,$pdf->nbrtostring("com","IDCOM",$rowe->idcom,"COMMUNE"),1,0,'C');
	if($rowe->typeecole==1){$pdf->cell(25,5,"primaire",1,0,'C',0,0);}
	if($rowe->typeecole==2){$pdf->cell(25,5,"moyenne",1,0,'C',0,0);}
	if($rowe->typeecole==3){$pdf->cell(25,5,"lycée",1,0,'C',0,0);}
	$pdf->SetXY(15,$pdf->GetY()+5);
	}
	$pdf->SetXY(15,$pdf->GetY());$pdf->cell(180,5,"Total uds : ".$totalmbre,1,0,'L',1,0);
	//***********************************************************************************************************//




$pdf->SetXY(15,$pdf->GetY()+5);
}





















$pdf->Output("Etablissement_uds.pdf","I");
?>



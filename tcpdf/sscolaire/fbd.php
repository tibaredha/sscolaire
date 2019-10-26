<?php
$ideleve=$_GET["ideleve"];
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
$pdf->mysqlconnect();
$query = "select * from eleve WHERE  id = '$ideleve'";
$resultat=mysql_query($query);
while($result=mysql_fetch_object($resultat))
{
	$pdf->SetFont('DejaVuSans','',8);
	$pdf->mysqlconnect();
	$querysbd = "select * from examensbd WHERE id= '$idfiche' ";
	$resultatsbd=mysql_query($querysbd);
	while($resultsbd=mysql_fetch_object($resultatsbd))
	{
		$data=array(
		"DATE"           => $resultsbd->DATESBD, 
		"CLASSE"         => $resultsbd->NIVEAUS, 
		"ID"             => $ideleve,
		"ETABLIS"        => $resultsbd->ETABLIS,
		"UDS"            => $resultsbd->UDS,
		"classep"        => $result->classep,
		"CPSO"           => $pdf->verif($resultsbd->OKRDV,"1"),
		"CPSN"           => $pdf->verif($resultsbd->OKRDV,"0"),
		"HBDNA"          => $pdf->verif($resultsbd->HYGIENE,"1"),
		"HBDA"           => $pdf->verif($resultsbd->HYGIENE,"0"),
		"GO"             => $pdf->verif($resultsbd->GINGIVITE,"1"),
		"GN"             => $pdf->verif($resultsbd->GINGIVITE,"0"),
		"ODFO"           => $pdf->verif($resultsbd->AODF,"1"),
		"ODFN"           => $pdf->verif($resultsbd->AODF,"0"),
		"C"              => $resultsbd->C,
		"A"              => $resultsbd->A,
		"O"              => $resultsbd->O,
		"c"              => $resultsbd->PC,
		"a"              => $resultsbd->PA,
		"o"              => $resultsbd->PO,
		"d11"            => $resultsbd->d11,
		"d12"            => $resultsbd->d12,
		"d13"            => $resultsbd->d13,
		"d14"            => $resultsbd->d14,
		"d15"            => $resultsbd->d15,
		"d16"            => $resultsbd->d16,
		"d17"            => $resultsbd->d17,
		"d18"            => $resultsbd->d18,
		"d21"            => $resultsbd->d21,
		"d22"            => $resultsbd->d22,
		"d23"            => $resultsbd->d23,
		"d24"            => $resultsbd->d24,
		"d25"            => $resultsbd->d25,
		"d26"            => $resultsbd->d26,
		"d27"            => $resultsbd->d27,
		"d28"            => $resultsbd->d28,
		"d31"            => $resultsbd->d31,
		"d32"            => $resultsbd->d32,
		"d33"            => $resultsbd->d33,
		"d34"            => $resultsbd->d34,
		"d35"            => $resultsbd->d35,
		"d36"            => $resultsbd->d36,
		"d37"            => $resultsbd->d37,
		"d38"            => $resultsbd->d38,
		"d41"            => $resultsbd->d41,
		"d42"            => $resultsbd->d42,
		"d43"            => $resultsbd->d43,
		"d44"            => $resultsbd->d44,
		"d45"            => $resultsbd->d45,
		"d46"            => $resultsbd->d46,
		"d47"            => $resultsbd->d47,
		"d48"            => $resultsbd->d48,
		"d51"            => $resultsbd->d51,
		"d52"            => $resultsbd->d52,
		"d53"            => $resultsbd->d53,
		"d54"            => $resultsbd->d54,
		"d55"            => $resultsbd->d55,
		"d61"            => $resultsbd->d61,
		"d62"            => $resultsbd->d62,
		"d63"            => $resultsbd->d63,
		"d64"            => $resultsbd->d64,
		"d65"            => $resultsbd->d65,
		"d71"            => $resultsbd->d71,
		"d72"            => $resultsbd->d72,
		"d73"            => $resultsbd->d73,
		"d74"            => $resultsbd->d74,
		"d75"            => $resultsbd->d75,
		"d81"            => $resultsbd->d81,
		"d82"            => $resultsbd->d82,
		"d83"            => $resultsbd->d83,
		"d84"            => $resultsbd->d84,
		"d85"            => $resultsbd->d85
		);
		$pdf->FICHEBUCCO($data);
    }


$pdf->Output();
}
?>



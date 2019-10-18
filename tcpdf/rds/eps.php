<?php
$id=$_GET["uc"];
require('naisance.php');
$pdf = new naisance( 'P', 'mm', 'A5',true,'UTF-8',false ); $pdf->setPrintHeader(false);$pdf->SetAutoPageBreak(TRUE, 0);$pdf->setPrintFooter(false);
$pdf->AddPage('p','A5');session_start();

$pdf->mysqlconnect();
$query = "select * from eleve WHERE  id = '$id'    ";
$resultat=mysql_query($query);
while($result=mysql_fetch_object($resultat))
{
$dateeuro=date('d/m/Y');
$pdf->SetFillColor(245);
$pdf->SetTextColor(0,0,255);
$pdf->SetDisplayMode('fullpage','single');//mode d affichage 
$pdf->SetFont('aefurat', '', 11);
$pdf->SetXY(5,5);$pdf->Cell(135,5,"المؤسسة العمومية "." ".$pdf->nbrtostring("structure","id",$result->STRUCTURE,"structurear"),0,1,'C',1,0);
$pdf->SetXY(5,12);$pdf->Cell(135,5,"ETABLISSEMENT PUBLIC DE SANTE DE PROXIMITE : ".$pdf->nbrtostring("structure","id",$result->STRUCTURE,"structure"),0,1,'C',1,0);
$pdf->Text(80,30,"A ".$pdf->nbrtostring("structure","id",$result->STRUCTURE,"com")." Le : ".$dateeuro);
$pdf->SetXY(5,19);$pdf->Cell(67.5,5,"UDS : ".$pdf->nbrtostring("uds","id",$result->UDS,"uds"),0,0,'L',1,0);$pdf->Cell(67.5,5,"ECOLE : ".$pdf->nbrtostring("ecole","id",$result->ECOLE,"ecole"),0,1,'L',1,0);
$pdf->SetFont('aefurat', '', 15);
$pdf->SetXY(5,40);$pdf->Cell(135,5,"Certificat médical d'inaptitude partielle",0,1,'C',1,0);
$pdf->SetXY(5,48);$pdf->Cell(135,5,"à la pratique de l'éducation physique et sportive",0,1,'C',1,0);
$pdf->SetFont('aefurat', '', 14);
$pdf->Text(5,60,"Je soussigné(e), Dr:_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ ");
$pdf->Text(5,70,"Certifie avoir examiné l'élève :_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _");$pdf->SetTextColor(255,0,0);
$pdf->Text(68,70,$result->NOM.'  '.$result->PRENOM);$pdf->SetTextColor(0,0,255);
$pdf->Text(5,80,"Agé(e) de : _ _ Ans");$pdf->SetTextColor(255,0,0);
$pdf->Text(28,80,$result->Years);$pdf->SetTextColor(0,0,255);
$pdf->Text(5,90,"Domicile :_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _");$pdf->SetTextColor(255,0,0);
$pdf->Text(26,90,$result->ADRESSE.'_'.$pdf->nbrtostring("com","IDCOM",$result->COMMUNER,"COMMUNE"));$pdf->SetTextColor(0,0,255);
$pdf->Text(5,100,"et constaté que son état de santé entraîne une inaptitude partielle");
$pdf->Text(5,110,"à la pratique de l'éducation physique et sportive (EPS):");
$pdf->Text(15,120,"-Pour l'année scolaire :");
$pdf->Text(15,130,"-Pour une durée de : _ _ _ _ _ _ _  à compter de ce jour");
$pdf->Text(5,140,"Afin de permettre une adaptation de l'enseignement d'EPS aux");
$pdf->Text(5,150,"possibilités de l'élève, il est nécessaire : ");
$pdf->Text(5,160,"d'aménager les activités physiques.");



$pdf->SetTextColor(0,0,255);
$pdf->SetFont('aefurat', '', 12);
$pdf->Text(100,160,"Le Medecin");
$pdf->Line(5 ,174+2 ,140 ,174+2 );
$pdf->SetXY(5,175+3);$pdf->Cell(135,5,"En application",0,1,'C',1,0);
$pdf->SetXY(5,182+3);$pdf->Cell(135,5,"Ne Laissez Jamais Les Medicaments à La Portée Des Enfants",0,1,'C',1,0);
$pdf->SetFont('aefurat', '', 10);
$style = array('position' => '','align' => 'L','stretch' => false,'fitwidth' => false,'cellfitalign' => '','border' => false,'hpadding' => 'auto','vpadding' => 'auto','fgcolor' => array(0,0,0),'bgcolor' => false, 'text' => true,'font' => 'helvetica','fontsize' => 8,'stretchtext' => 4);
$pdf->SetXY(10,24);$pdf->write1DBarcode($result->id, 'C39', '', '', '', 18, 0.4, $style, 'N');
}
$pdf->Output("EPS.PDF","I");
?>

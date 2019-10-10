<?php
$id=$_GET["uc"];
$rdv=$_GET["rdv"];
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
$pdf->SetXY(5,40);$pdf->Cell(135,5,"وصــفــة",0,1,'C',1,0);
$pdf->SetXY(5,48);$pdf->Cell(135,5,"ORDONNANCE",0,1,'C',1,0);
$pdf->SetFont('aefurat', '', 14);
$pdf->Text(5,60,"Delivrée par le Docteur :_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ ");
$pdf->Text(5,70,"A Mme/Melle :_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _");
$pdf->SetTextColor(255,0,0);$pdf->Text(40,70,$result->NOM.'  '.$result->PRENOM);$pdf->SetTextColor(0,0,255);
$pdf->Text(103,70,"Age : _ _ Ans");$pdf->SetTextColor(0,0,0);$pdf->Text(115,70,$result->Years);$pdf->SetTextColor(0,0,255);
$pdf->Text(5,80,"Domicile :_ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _ _");
$pdf->SetTextColor(255,0,0);$pdf->Text(26,80,$result->ADRESSE.'_'.$pdf->nbrtostring("com","IDCOM",$result->COMMUNER,"COMMUNE"));$pdf->SetTextColor(0,0,0);
$pdf->SetFont('aefurat', '', 14);
$pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(135,5,"RDV DE CONSULTATION",0,1,'C',1,0);

$pdf->SetXY(05,$pdf->GetY()+10);$pdf->cell(135,6,"le : ".$pdf->dateUS2FR($rdv) .'   A 08 H 00',0,1,'L',0,0);
$pdf->SetXY(05,$pdf->GetY()+10);$pdf->cell(135,6,"Pour suivi et controle ",0,1,'L',0,0);
$pdf->SetXY(05,$pdf->GetY()+10);$pdf->cell(135,6,"Au niveau du siège de l UDS ",0,1,'L',0,0);
$pdf->SetXY(05,$pdf->GetY()+10);$pdf->cell(135,6,"Acompagne du tuteur légale  ",0,1,'L',0,0);


 
// $nbArticles=count($_SESSION['ordonnace']['libelleProduit']);
// $pdf->SetXY(05,$pdf->GetY()+10);
// for ($i=0 ;$i < $nbArticles ; $i++)
// {
// $pdf->cell(15,6,$i+1,0,'C',0,0);
// $pdf->SetFont('aefurat','U', 11);
// $pdf->Cell(100,6,html_entity_decode(utf8_decode($pdf->nbrtostring('pha','id',$_SESSION['ordonnace']['libelleProduit'][$i],'mecicament').'  '.$pdf->nbrtostring('pha','id',$_SESSION['ordonnace']['libelleProduit'][$i],'pre'))),0,0,'L',0);
// $pdf->SetFont('aefurat','');
// $pdf->Cell(20,6,$_SESSION['ordonnace']['qteProduit'][$i]." Bte",0,0,'R',0);
// $pdf->SetXY(20,$pdf->GetY()+6);
// $pdf->Cell(100,6,$_SESSION['ordonnace']['doseparprise'][$i].' '.$_SESSION['ordonnace']['nbrdrfoisparjours'][$i].'x/j'.' pd'.$_SESSION['ordonnace']['nbrdejours'][$i].'jours',0,0,'L',0);
// $pdf->SetTextColor(0,0,0);
// $pdf->SetXY(05,$pdf->GetY()+10); 
// }
$pdf->SetTextColor(0,0,255);
$pdf->SetFont('aefurat', '', 12);
$pdf->Text(100,160,"Le Medecin");
$pdf->Line(5 ,174+2 ,140 ,174+2 );
$pdf->SetXY(5,175+3);$pdf->Cell(135,5,"لاتتركو ابدا الادوية فى متناول الاطفال",0,1,'C',1,0);
$pdf->SetXY(5,182+3);$pdf->Cell(135,5,"Ne Laissez Jamais Les Medicaments à La Portée Des Enfants",0,1,'C',1,0);
$pdf->SetFont('aefurat', '', 10);
$style = array('position' => '','align' => 'L','stretch' => false,'fitwidth' => false,'cellfitalign' => '','border' => false,'hpadding' => 'auto','vpadding' => 'auto','fgcolor' => array(0,0,0),'bgcolor' => false, 'text' => true,'font' => 'helvetica','fontsize' => 8,'stretchtext' => 4);
$pdf->SetXY(10,24);$pdf->write1DBarcode($result->id, 'C39', '', '', '', 18, 0.4, $style, 'N');
}
$pdf->Output();
?>

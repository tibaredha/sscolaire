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
$query = "select * from eleve WHERE  id = '$id'";
$resultat=mysql_query($query);
while($result=mysql_fetch_object($resultat))
{

$pdf->AddPage('P','A4');
$pdf->setRTL(FALSE); 
$pdf->RoundedRect($x=5, $y=5, $w=200, $h=285, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->SetFont('DejaVuSans','',10);
$pdf->SetXY(15,$pdf->GetY());$pdf->Cell(45,5,"Wilaya : DJELFA",1,0,'L'); $pdf->Cell(45,5,"الولاية: الجلفة",1,0,'R'); $pdf->Cell(45,5,"Commune : ".$pdf->nbrtostring("com","IDCOM",$pdf->nbrtostring("ecole","id",$result->ECOLE,"idcom"),"COMMUNE"),1,0,'L'); $pdf->Cell(45,5,"البلدية"	,1,1,'R');
$pdf->SetXY(15,$pdf->GetY());$pdf->Cell(45,5,"EPSP : ".$pdf->nbrtostring("structure","id",$result->STRUCTURE,"structure"),1,0,'L'); $pdf->Cell(45,5,"م. ع. ص .ج : ",1,0,'R'); $pdf->Cell(45,5,"UDS : ".$pdf->nbrtostring("uds","id",$result->UDS,"uds"),1,0,'L'); $pdf->Cell(45,5,"و. ك. م : ",1,1,'R');
$pdf->SetFont('DejaVuSans','B',19);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,6,"إستبيان خاص بالأولياء",0,1,'C');
$pdf->SetFont('DejaVuSans','B',14);
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,6,"QUESTIONNAIRE POUR LES PARENTS",0,1,'C');
$pdf->RoundedRect($x=15, $y=$pdf->GetY()+5, $w=180, $h=230, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->SetFont('DejaVuSans','',10);
$pdf->SetXY(15,$pdf->GetY()+5);$pdf->Cell(45,5,"Nom et prénom  : ".$result->NOM.'_'.$result->PRENOM,0,0,'L');                 $pdf->Cell(45,5,"الاسم و اللقب : ",0,0,'R');  $pdf->Cell(45,5,"Prénom du père : ".$result->FILSDE,0,0,'L');  $pdf->Cell(45,5,"اسم الاب : ",0,1,'R');
$pdf->SetXY(15,$pdf->GetY());  $pdf->Cell(45,5,"Né(e) le  : ".$pdf->dateUS2FR($result->DATENS),0,0,'L');                      $pdf->Cell(45,5,"المولود(ة) في: ",0,0,'R');  $pdf->Cell(45,5,"Commune  : ".$pdf->nbrtostring("com","IDCOM",$result->COMMUNEN,"COMMUNE"),0,0,'L');        $pdf->Cell(45,5,"البلدية : ",0,1,'R');
$pdf->SetXY(15,$pdf->GetY());  $pdf->Cell(90,5,"Adresse des parents : ".$result->ADRESSE,0,0,'L');                                                                                               $pdf->Cell(90,5,"عنوان الاولياء : ",0,1,'R');
$pdf->SetXY(15,$pdf->GetY());  $pdf->Cell(45,5,"Profession père  : ",0,0,'L');    $pdf->Cell(45,5,"مهنة الاب : ",0,0,'R');      $pdf->Cell(45,5,"Profession mère : ",0,0,'L'); $pdf->Cell(45,5,"مهنة الام : ",0,1,'R');

$pdf->SetFont('DejaVuSans','',12);
$pdf->SetXY(15,$pdf->GetY()+5); $pdf->Cell(22,6,"لا",1,0,'C');   $pdf->Cell(22,6,"نعم",1,0,'C');       $pdf->Cell(136,6,"سبق له علاج الإلتهابات داخل أو خارج المستشفى",1,1,'R');
$pdf->SetXY(15,$pdf->GetY());  $pdf->Cell(22,6,"لا",1,0,'C');   $pdf->Cell(22,6,"نعم",1,0,'C');        $pdf->Cell(136,6,"يأخذ حقن من 15 إلى 20 يوما",1,1,'R');
$pdf->SetXY(15,$pdf->GetY());  $pdf->Cell(22,6,"لا",1,0,'C');   $pdf->Cell(22,6,"نعم",1,0,'C');        $pdf->Cell(136,6,"نقص جسماني مفاجئ",1,1,'R');
$pdf->SetXY(15,$pdf->GetY());  $pdf->Cell(22,6,"لا",1,0,'C');   $pdf->Cell(22,6,"نعم",1,0,'C');        $pdf->Cell(136,6,"إضطراب في التنفس",1,1,'R');
$pdf->SetXY(15,$pdf->GetY());  $pdf->Cell(22,6,"لا",1,0,'C');   $pdf->Cell(22,6,"نعم",1,0,'C');        $pdf->Cell(136,6,"يعاود فقدان الوعي أو يصرع",1,1,'R');
$pdf->SetXY(15,$pdf->GetY());  $pdf->Cell(22,6,"لا",1,0,'C');   $pdf->Cell(22,6,"نعم",1,0,'C');        $pdf->Cell(136,6,"تشنج عضلي",1,1,'R');
$pdf->SetXY(15,$pdf->GetY());  $pdf->Cell(22,6,"لا",1,0,'C');   $pdf->Cell(22,6,"نعم",1,0,'C');        $pdf->Cell(136,6,"حالته النفسية مضطربة",1,1,'R');
$pdf->SetXY(15,$pdf->GetY());  $pdf->Cell(22,6,"لا",1,0,'C');   $pdf->Cell(22,6,"نعم",1,0,'C');        $pdf->Cell(136,6,"مشاغب-منعزل-كثير الهروب من المنزل",1,1,'R');
$pdf->SetXY(15,$pdf->GetY());  $pdf->Cell(22,6,"لا",1,0,'C');   $pdf->Cell(22,6,"نعم",1,0,'C');        $pdf->Cell(136,6,"صعوبات تعبيرية (التلعثم )",1,1,'R');
$pdf->SetXY(15,$pdf->GetY());  $pdf->Cell(22,6,"لا",1,0,'C');   $pdf->Cell(22,6,"نعم",1,0,'C');        $pdf->Cell(136,6,"إضطرابات سمعية",1,1,'R');
$pdf->SetXY(15,$pdf->GetY());  $pdf->Cell(22,6,"لا",1,0,'C');   $pdf->Cell(22,6,"نعم",1,0,'C');        $pdf->Cell(136,6,"نقص في الرؤية",1,1,'R');
$pdf->SetXY(15,$pdf->GetY());  $pdf->Cell(22,6,"لا",1,0,'C');   $pdf->Cell(22,6,"نعم",1,0,'C');        $pdf->Cell(136,6,"تأخر دراسي",1,1,'R');
$pdf->SetXY(15,$pdf->GetY());  $pdf->Cell(22,6,"لا",1,0,'C');   $pdf->Cell(22,6,"نعم",1,0,'C');        $pdf->Cell(136,6,"هل تلقى تلقيحا كاملا",1,1,'R');
$pdf->SetXY(15,$pdf->GetY());  $pdf->Cell(22,6,"لا",1,0,'C');   $pdf->Cell(22,6,"نعم",1,0,'C');        $pdf->Cell(136,6,"سيلان الأنف المستمر",1,1,'R');
$pdf->SetXY(15,$pdf->GetY());  $pdf->Cell(22,6,"لا",1,0,'C');   $pdf->Cell(22,6,"نعم",1,0,'C');        $pdf->Cell(136,6,"إحمرار مستمر للعين",1,1,'R');
$pdf->SetXY(15,$pdf->GetY());  $pdf->Cell(22,6,"لا",1,0,'C');   $pdf->Cell(22,6,"نعم",1,0,'C');        $pdf->Cell(136,6,"لاحظتم عنده ديدان باطنية",1,1,'R');
$pdf->SetXY(15,$pdf->GetY());  $pdf->Cell(22,6,"لا",1,0,'C');   $pdf->Cell(22,6,"نعم",1,0,'C');        $pdf->Cell(136,6,"هل يتبول في الفراش",1,1,'R');
$pdf->SetXY(15,$pdf->GetY());  $pdf->Cell(22,6,"لا",1,0,'C');   $pdf->Cell(22,6,"نعم",1,0,'C');        $pdf->Cell(136,6,"يحس بألم بقناة التبول أو الإحتياج للتبول الدائم",1,1,'R');
$pdf->SetXY(15,$pdf->GetY());  $pdf->Cell(22,6,"لا",1,0,'C');   $pdf->Cell(22,6,"نعم",1,0,'C');        $pdf->Cell(136,6,"هل يعاني الطفل من",1,1,'R');
$pdf->SetXY(15,$pdf->GetY());  $pdf->Cell(22,6,"لا",1,0,'C');   $pdf->Cell(22,6,"نعم",1,0,'C');        $pdf->Cell(136,6,"الروماتيزم",1,1,'R');
$pdf->SetXY(15,$pdf->GetY());  $pdf->Cell(22,6,"لا",1,0,'C');   $pdf->Cell(22,6,"نعم",1,0,'C');        $pdf->Cell(136,6,"السكر",1,1,'R');
$pdf->SetXY(15,$pdf->GetY());  $pdf->Cell(22,6,"لا",1,0,'C');   $pdf->Cell(22,6,"نعم",1,0,'C');        $pdf->Cell(136,6,"مرض الربو",1,1,'R');
$pdf->SetXY(15,$pdf->GetY());  $pdf->Cell(22,6,"لا",1,0,'C');   $pdf->Cell(22,6,"نعم",1,0,'C');        $pdf->Cell(136,6,"الصرع",1,1,'R');
$pdf->SetXY(15,$pdf->GetY());  $pdf->Cell(180,6,"إذا كان لديه مرض آخر أذكره",1,1,'R');
$pdf->SetXY(15,$pdf->GetY());  $pdf->Cell(180,6,".....................................",1,1,'R');
$pdf->SetXY(15,$pdf->GetY());  $pdf->Cell(180,6,".....................................",1,1,'R');
$pdf->SetXY(15,$pdf->GetY());  $pdf->Cell(180,6,".....................................",1,1,'R');


$pdf->Output();
}

?>



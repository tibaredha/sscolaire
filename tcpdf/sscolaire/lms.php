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
require('sscolaire.php');
$pdf = new sscolaire( 'P', 'mm', 'A4',true,'UTF-8',false );
$pdf->setPrintHeader(false);$pdf->SetAutoPageBreak(TRUE, 0);$pdf->setPrintFooter(false);
$pdf->mysqlconnect();
$query = "select * from eleve WHERE  id = '$id'";
$resultat=mysql_query($query);
while($result=mysql_fetch_object($resultat))
{
$pdf->AddPage('P','A4');
$pdf->setRTL(true); 
$pdf->RoundedRect($x=5, $y=5, $w=200, $h=285, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->SetFont('DejaVuSans','B',14);
$pdf->SetFillColor(152, 235, 251);
$pdf->SetTextColor(255, 255, 255);
$pdf->SetXY(5,5);$pdf->Cell(200,285,'',1,1,'C',1,0);
$pdf->SetXY(5,10);$pdf->Cell(200,6,$pdf->repar,0,1,'C');
$pdf->SetXY(5,20);$pdf->Cell(200,6,$pdf->mspar,0,1,'C');
$pdf->SetXY(5,30);$pdf->Cell(200,6,$pdf->dspar.'الجلفة',0,1,'C');
$pdf->SetFont('DejaVuSans','B',12);
$pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(100,6,"وحدة الكشف و المتابعة",0,0,'C');$pdf->Cell(100,6,"Unite de dépistage et de soins",0,1,'C');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(100,6,$pdf->nbrtostring("uds","id",$result->UDS,"udsar"),0,0,'C'); $pdf->Cell(100,6,$pdf->nbrtostring("uds","id",$result->UDS,"uds"),0,1,'C');
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(100,6,"المؤسسة التربوية",0,0,'C');      $pdf->Cell(100,6,"Etablissement scolaire",0,1,'C');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(100,6,$pdf->nbrtostring("ecole","id",$result->ECOLE,"ecolear"),0,0,'C'); $pdf->Cell(100,6,$pdf->nbrtostring("ecole","id",$result->ECOLE,"ecole"),0,1,'C');
$pdf->SetFont('DejaVuSans','B',34);
$pdf->SetXY(5,100);$pdf->Cell(200,6,"الملف الصحي المدرسي",0,1,'C');
$pdf->SetXY(5,105);$pdf->Cell(200,6,"_______________________",0,1,'C');
$pdf->SetFont('DejaVuSans','B',24);
$pdf->SetXY(5,122);$pdf->Cell(200,6,"DOSSIER MEDICAL SCOLAIRE",0,1,'C');
$pdf->SetFont('DejaVuSans','B',12);
$pdf->SetXY(15,140);$pdf->Cell(90,6," لقب و اسم التلميذ :",0,0,'R');$pdf->Cell(90,6,"Nom et prénom de l'élève : ".$result->NOM.'_'.$result->PRENOM,0,1,'L');
$pdf->SetXY(15,150);$pdf->Cell(90,6,"المولود (ة) :",0,0,'R');       $pdf->Cell(90,6,"Né(e) Le  : ".$pdf->dateUS2FR($result->DATENS),0,1,'L');
$pdf->SetXY(15,160);$pdf->Cell(90,6,"عنوان الاولياء : ",0,0,'R');    $pdf->Cell(90,6,"Adresse des parents  : ".$result->ADRESSE,0,1,'L');
$pdf->SetXY(15,170);$pdf->Cell(45,10,"السنة الدراسية",1,0,'C');      $pdf->Cell(90,10,"المدرسة التي يزاول بها الدراسة",1,0,'C');$pdf->Cell(45,10,"الملاحضات",1,1,'C');
$pdf->SetXY(15,180);$pdf->Cell(45,10,"Années scolaires",1,0,'C');    $pdf->Cell(90,10,"Etablissements fréquentés ",1,0,'C');$pdf->Cell(45,10,"Observations",1,1,'C');
$pdf->SetXY(15,$pdf->GetY());$pdf->Cell(45,10,"",1,0,'C');    $pdf->Cell(90,10,"",1,0,'C');$pdf->Cell(45,10,"",1,1,'C');
$pdf->SetXY(15,$pdf->GetY());$pdf->Cell(45,10,"",1,0,'C');    $pdf->Cell(90,10,"",1,0,'C');$pdf->Cell(45,10,"",1,1,'C');
$pdf->SetXY(15,$pdf->GetY());$pdf->Cell(45,10,"",1,0,'C');    $pdf->Cell(90,10,"",1,0,'C');$pdf->Cell(45,10,"",1,1,'C');
$pdf->SetXY(15,$pdf->GetY());$pdf->Cell(45,10,"",1,0,'C');    $pdf->Cell(90,10,"",1,0,'C');$pdf->Cell(45,10,"",1,1,'C');
$pdf->SetXY(15,$pdf->GetY());$pdf->Cell(45,10,"",1,0,'C');    $pdf->Cell(90,10,"",1,0,'C');$pdf->Cell(45,10,"",1,1,'C');
$pdf->SetXY(15,$pdf->GetY());$pdf->Cell(45,10,"",1,0,'C');    $pdf->Cell(90,10,"",1,0,'C');$pdf->Cell(45,10,"",1,1,'C');
$pdf->SetXY(15,$pdf->GetY());$pdf->Cell(45,10,"",1,0,'C');    $pdf->Cell(90,10,"",1,0,'C');$pdf->Cell(45,10,"",1,1,'C');
$pdf->SetXY(15,$pdf->GetY());$pdf->Cell(45,10,"",1,0,'C');    $pdf->Cell(90,10,"",1,0,'C');$pdf->Cell(45,10,"",1,1,'C');
$pdf->SetXY(15,$pdf->GetY());$pdf->Cell(45,10,"",1,0,'C');    $pdf->Cell(90,10,"",1,0,'C');$pdf->Cell(45,10,"",1,1,'C');
$pdf->SetTextColor(0, 0, 0);

$pdf->AddPage('P','A4');
$pdf->setRTL(FALSE); 
$pdf->RoundedRect($x=5, $y=5, $w=200, $h=285, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->SetFont('DejaVuSans','',10);
$pdf->SetXY(15,$pdf->GetY());$pdf->Cell(45,10,"Wilaya : DJELFA",1,0,'L'); $pdf->Cell(45,10,"الولاية: الجلفة",1,0,'R'); $pdf->Cell(45,10,"Commune : ".$pdf->nbrtostring("com","IDCOM",$pdf->nbrtostring("ecole","id",$result->ECOLE,"idcom"),"COMMUNE"),1,0,'L'); $pdf->Cell(45,10,"البلدية"	,1,1,'R');
$pdf->SetXY(15,$pdf->GetY());$pdf->Cell(45,10,"EPSP : ".$pdf->nbrtostring("structure","id",$result->STRUCTURE,"structure"),1,0,'L'); $pdf->Cell(45,10,"م. ع. ص .ج : ",1,0,'R'); $pdf->Cell(45,10,"UDS : ".$pdf->nbrtostring("uds","id",$result->UDS,"uds"),1,0,'L'); $pdf->Cell(45,10,"و. ك. م : ",1,1,'R');
$pdf->SetFont('DejaVuSans','B',19);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,6,"الملف الصحي المدرسي",0,1,'C');
$pdf->SetFont('DejaVuSans','B',14);
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,6,"DOSSIER MEDICAL SCOLAIRE",0,1,'C');
$pdf->RoundedRect($x=15, $y=$pdf->GetY()+5, $w=180, $h=230, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->SetFont('DejaVuSans','',8);
$pdf->SetXY(15,$pdf->GetY()+5);$pdf->Cell(45,10,"Nom et prénom  : ".$result->NOM.'_'.$result->PRENOM,0,0,'L');      $pdf->Cell(45,10,"الاسم و اللقب : ",0,0,'R');  $pdf->Cell(45,10,"Prénom du père : ".$result->FILSDE,0,0,'L');  $pdf->Cell(45,10,"اسم الاب : ",0,1,'R');
$pdf->SetXY(15,$pdf->GetY());  $pdf->Cell(45,10,"Né(e) le  : ".$pdf->dateUS2FR($result->DATENS),0,0,'L');           $pdf->Cell(45,10,"المولود(ة) في: ",0,0,'R');  $pdf->Cell(45,10,"Commune  : ".$pdf->nbrtostring("com","IDCOM",$result->COMMUNEN,"COMMUNE"),0,0,'L');        $pdf->Cell(45,10,"البلدية : ",0,1,'R');
$pdf->SetXY(15,$pdf->GetY());  $pdf->Cell(90,10,"Adresse des parents : ".$result->ADRESSE,0,0,'L');                                                                                               $pdf->Cell(90,10,"عنوان الاولياء : ",0,1,'R');
$pdf->SetXY(15,$pdf->GetY());  $pdf->Cell(45,10,"Profession père  : ",0,0,'L');    $pdf->Cell(45,10,"مهنة الاب : ",0,0,'R');      $pdf->Cell(45,10,"Profession mère : ",0,0,'L'); $pdf->Cell(45,10,"مهنة الام : ",0,1,'R');
$pdf->SetXY(15,$pdf->GetY());  $pdf->Cell(135,10,"المؤسسات المدرسية و المنتمي اليها ",1,0,'C');        $pdf->Cell(45,10,"السنوات الدراسية ",1,0,'C');      
$pdf->SetXY(15,$pdf->GetY()+10);  $pdf->Cell(135,10,"Établissements scolaires fréquentés  : ",1,0,'C');    $pdf->Cell(45,10,"Années scolaires",1,0,'C');      
$pdf->SetXY(15,$pdf->GetY()+10);  $pdf->Cell(135,10,"",1,0,'C');    $pdf->Cell(45,10,"",1,0,'C');      
$pdf->SetXY(15,$pdf->GetY()+10);  $pdf->Cell(135,10," ",1,0,'C');    $pdf->Cell(45,10,"",1,0,'C');      
$pdf->SetXY(15,$pdf->GetY()+10);  $pdf->Cell(135,10," ",1,0,'C');    $pdf->Cell(45,10,"",1,0,'C');      
$pdf->SetXY(15,$pdf->GetY()+10);  $pdf->Cell(135,10," ",1,0,'C');    $pdf->Cell(45,10,"",1,0,'C');
$pdf->SetXY(15,$pdf->GetY()+10); 
$pdf->SetFillColor(152, 235, 251 );$pdf->Cell(90,10,"Vaccination",1,0,'R',1,0);$pdf->Cell(90,10,"التلقيحات",1,1,'L',1,0);    
$pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(11, 193, 31 );$pdf->Cell(36,10,"",1,0,'L');$pdf->SetFillColor(253, 253, 9);$pdf->Cell(36,10,"Vaccins",1,0,'C',1,0);      $pdf->SetFillColor(253, 253, 9 );$pdf->Cell(36,10,"Fait le",1,0,'C',1,0); $pdf->SetFillColor(253, 253, 9 );$pdf->Cell(36,10,"A refaire le",1,0,'C',1,0);$pdf->SetFillColor(253, 253, 9 );$pdf->Cell(36,10,"Observation",1,1,'C',1,0);
$pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(11, 193, 31 );$pdf->Cell(36,10,"Naissance",1,0,'C',1,0);$pdf->SetFillColor(152, 235, 251);$pdf->Cell(36,10,"",1,0,'L',1,0);$pdf->Cell(36,10,"",1,0,'L');$pdf->Cell(36,10,"",1,0,'L');$pdf->Cell(36,10,"",1,1,'L');
$pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(11, 193, 31 );$pdf->Cell(36,10,"1er mois",1,0,'C',1,0);$pdf->SetFillColor(152, 235, 251);$pdf->Cell(36,10,"",1,0,'L',1,0);$pdf->Cell(36,10,"",1,0,'L');$pdf->Cell(36,10,"",1,0,'L');$pdf->Cell(36,10,"",1,1,'L');
$pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(11, 193, 31 );$pdf->Cell(36,10,"3eme mois",1,0,'C',1,0);$pdf->SetFillColor(152, 235, 251);$pdf->Cell(36,10,"",1,0,'L',1,0);$pdf->Cell(36,10,"",1,0,'L');$pdf->Cell(36,10,"",1,0,'L');$pdf->Cell(36,10,"",1,1,'L');
$pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(11, 193, 31 );$pdf->Cell(36,10,"4eme mois",1,0,'C',1,0);$pdf->SetFillColor(152, 235, 251);$pdf->Cell(36,10,"",1,0,'L',1,0);$pdf->Cell(36,10,"",1,0,'L');$pdf->Cell(36,10,"",1,0,'L');$pdf->Cell(36,10,"",1,1,'L');
$pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(11, 193, 31 );$pdf->Cell(36,10,"5eme mois",1,0,'C',1,0);$pdf->SetFillColor(152, 235, 251);$pdf->Cell(36,10,"",1,0,'L',1,0);$pdf->Cell(36,10,"",1,0,'L');$pdf->Cell(36,10,"",1,0,'L');$pdf->Cell(36,10,"",1,1,'L');
$pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(11, 193, 31 );$pdf->Cell(36,10,"9eme mois",1,0,'C',1,0);$pdf->SetFillColor(152, 235, 251);$pdf->Cell(36,10,"",1,0,'L',1,0);$pdf->Cell(36,10,"",1,0,'L');$pdf->Cell(36,10,"",1,0,'L');$pdf->Cell(36,10,"",1,1,'L');
$pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(11, 193, 31 );$pdf->Cell(36,10,"18eme mois",1,0,'C',1,0);$pdf->SetFillColor(152, 235, 251);$pdf->Cell(36,10,"",1,0,'L',1,0);$pdf->Cell(36,10,"",1,0,'L');$pdf->Cell(36,10,"",1,0,'L');$pdf->Cell(36,10,"",1,1,'L');
$pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(11, 193, 31 );$pdf->Cell(36,10,"1ere AP",1,0,'C',1,0);$pdf->SetFillColor(152, 235, 251);$pdf->Cell(36,10,"",1,0,'L',1,0);$pdf->Cell(36,10,"",1,0,'L');$pdf->Cell(36,10,"",1,0,'L');$pdf->Cell(36,10,"",1,1,'L');
$pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(11, 193, 31 );$pdf->Cell(36,10,"1ere AM",1,0,'C',1,0);$pdf->SetFillColor(152, 235, 251);$pdf->Cell(36,10,"",1,0,'L',1,0);$pdf->Cell(36,10,"",1,0,'L');$pdf->Cell(36,10,"",1,0,'L');$pdf->Cell(36,10,"",1,1,'L');
$pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(11, 193, 31 );$pdf->Cell(36,10,"1ere AS",1,0,'C',1,0);$pdf->SetFillColor(152, 235, 251);$pdf->Cell(36,10,"",1,0,'L',1,0);$pdf->Cell(36,10,"",1,0,'L');$pdf->Cell(36,10,"",1,0,'L');$pdf->Cell(36,10,"",1,1,'L');
$pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(11, 193, 31 );$pdf->Cell(36,10,"Tous les 10 ans ",1,0,'C',1,0);$pdf->SetFillColor(152, 235, 251);$pdf->Cell(36,10,"",1,0,'L',1,0);$pdf->Cell(36,10,"",1,0,'L');$pdf->Cell(36,10,"",1,0,'L');$pdf->Cell(36,10,"",1,1,'L');
$pdf->SetXY(15,33);$pdf->write1DBarcode($id, 'C39', '', '', '', 18, 0.4, $style, 'N');$pdf->Ln();
$pdf->mysqlconnect();
$querysbd = "select * from examensbd WHERE IDELEVE= '$id' ";
$resultatsbd=mysql_query($querysbd);
while($resultsbd=mysql_fetch_object($resultatsbd))
{
$data=array(
"DATE"           => $resultsbd->DATESBD, 
"CLASSE"         => $resultsbd->NIVEAUS, 
"AGE"            => "",
"HBDA"           => $pdf->verif($resultsbd->HYGIENE,"1"),
"HBDNA"          => $pdf->verif($resultsbd->HYGIENE,"0"),
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

"d31"            => $resultsbd->d21,
"d32"            => $resultsbd->d22,
"d33"            => $resultsbd->d23,
"d34"            => $resultsbd->d24,
"d35"            => $resultsbd->d25,
"d36"            => $resultsbd->d26,
"d37"            => $resultsbd->d27,
"d38"            => $resultsbd->d28,

"d41"            => $resultsbd->d41,
"d42"            => $resultsbd->d42,
"d43"            => $resultsbd->d43,
"d44"            => $resultsbd->d44,
"d45"            => $resultsbd->d45,
"d46"            => $resultsbd->d46,
"d47"            => $resultsbd->d47,
"d48"            => $resultsbd->d48



);
$pdf->FICHEBUCCO($data);
}

$pdf->SUIVIEMEDICAL();
$pdf->EXAMENMEDICAL();
$pdf->AddPage('P','A4');
$pdf->setRTL(FALSE); 
$pdf->RoundedRect($x=5, $y=5, $w=200, $h=285, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(253, 253, 9);$pdf->Cell(40,10,"DATE",1,0,'C',1,0);$pdf->SetFillColor(152, 245, 255 );$pdf->Cell(35,10,"",1,0,'C',1,0);$pdf->Cell(35,10,"",1,0,'C',1,0);$pdf->Cell(35,10,"",1,0,'C',1,0);$pdf->Cell(35,10,"",1,1,'C',1,0);
$pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(253, 253, 9);$pdf->Cell(40,10,"AGE",1,0,'C',1,0);$pdf->SetFillColor(152, 245, 255 );$pdf->Cell(35,10,"",1,0,'C',1,0);$pdf->Cell(35,10,"",1,0,'C',1,0);$pdf->Cell(35,10,"",1,0,'C',1,0);$pdf->Cell(35,10,"",1,1,'C',1,0);
$pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(253, 253, 9);$pdf->Cell(40,10,"POIDS",1,0,'C',1,0);$pdf->SetFillColor(152, 245, 255 );$pdf->Cell(35,10,"",1,0,'C',1,0);$pdf->Cell(35,10,"",1,0,'C',1,0);$pdf->Cell(35,10,"",1,0,'C',1,0);$pdf->Cell(35,10,"",1,1,'C',1,0);


// $pdf->FICHEBUCCO($data);
// $pdf->FICHEBUCCO($data);
// $pdf->FICHEBUCCO($data);
// $pdf->FICHEBUCCO($data);
$pdf->AddPage('P','A4');
$pdf->setRTL(FALSE); 
$pdf->RoundedRect($x=5, $y=5, $w=200, $h=285, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(253, 253, 9);$pdf->Cell(40,10,"DATE",1,0,'C',1,0);$pdf->SetFillColor(152, 245, 255 );$pdf->Cell(35,10,"",1,0,'C',1,0);$pdf->Cell(35,10,"",1,0,'C',1,0);$pdf->Cell(35,10,"",1,0,'C',1,0);$pdf->Cell(35,10,"",1,1,'C',1,0);
$pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(253, 253, 9);$pdf->Cell(40,10,"AGE",1,0,'C',1,0);$pdf->SetFillColor(152, 245, 255 );$pdf->Cell(35,10,"",1,0,'C',1,0);$pdf->Cell(35,10,"",1,0,'C',1,0);$pdf->Cell(35,10,"",1,0,'C',1,0);$pdf->Cell(35,10,"",1,1,'C',1,0);
$pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(253, 253, 9);$pdf->Cell(40,10,"TAILLE",1,0,'C',1,0);$pdf->SetFillColor(152, 245, 255 );$pdf->Cell(35,10,"",1,0,'C',1,0);$pdf->Cell(35,10,"",1,0,'C',1,0);$pdf->Cell(35,10,"",1,0,'C',1,0);$pdf->Cell(35,10,"",1,1,'C',1,0);
// $pdf->FICHEBUCCO($data);
// $pdf->FICHEBUCCO($data);
// $pdf->FICHEBUCCO($data);
$pdf->EXAMENMEDICAL();
$pdf->EXAMENMEDICAL();
$pdf->EXAMENPSYCHO();

$pdf->Output();


}

// 
// 
// 
// $pdf->SetXY(5,30);$pdf->Cell(200,6,$pdf->dspar.$pdf->nbrtostring("wil","IDWIL",$pdf->nbrtostring("structure","id",$result->STRUCTURED,"idwil"),"WILAYASAR"),0,1,'C');
// $pdf->SetFillColor(245);
// $pdf->SetXY(65+5,$pdf->GetY()+10);$pdf->Cell(140-10,10,'التصريح بالوفـــاة',1,1,'C',1,0);
// $pdf->SetXY(5+5,$pdf->GetY()-10);$pdf->Cell(50,10,'المؤسسـة العموميـة',1,1,'C',1,0);
// $pdf->SetFont('aefurat', '', 12);
// $pdf->SetXY(5+5,$pdf->GetY());$pdf->Cell(50,10,$pdf->nbrtostring("structure","id",$result->STRUCTURED,"structurear"),1,1,'C',1,0);
// $pdf->SetFont('aefurat', '', 14);
// $pdf->SetFont('aefurat', '', 13);$pdf->SetTextColor(255,0,0);$pdf->SetTextColor(0,0,0);
// $pdf->Text(65,$pdf->GetY()-5,$pdf->ANNEEAR($result->DINS));$pdf->Text(65+20,$pdf->GetY(),'....................................................................................................');
// $pdf->Text(65,$pdf->GetY()+10,$pdf->JOURAR($result->DINS));$pdf->Text(65+20,$pdf->GetY(),'....................................................................................................');
// $pdf->Text(65,$pdf->GetY()+10,$pdf->MOISAR($result->DINS));$pdf->Text(65+20,$pdf->GetY(),'....................................................................................................');
// $pdf->Text(65,$pdf->GetY()+10,"نحن مدير المؤسسة العمومية ".$pdf->nbrtostring("structure","id",$result->STRUCTURED,"structurear")  );

// $pdf->Text(65,$pdf->GetY()+10,"نشعر رئيس المجلس الشعبي البلدي ضابط الحالة المدنية ببلدية ".'.............................');

// $pdf->Text(168,$pdf->GetY(),$pdf->nbrtostring("structure","id",$result->STRUCTURED,"daira"));
// $pdf->Text(65,$pdf->GetY()+10," انه و قي هذا اليوم و على الساعة : ".$pdf->HEURSAR($result->HINS));$pdf->Text(60+55,$pdf->GetY(),".........................................................................");
// $pdf->Text(65,$pdf->GetY()+10," انه و في هذا اليوم و على الساعة : ".$pdf->HEURSAR($result->HINS));$pdf->Text(60+55,$pdf->GetY(),".........................................................................");

// $pdf->Text(65,$pdf->GetY()+10,"والدقيقة : ".$pdf->MINUTEAR($result->HINS));$pdf->Text(82,$pdf->GetY(),".....................................................................................................");
// $pdf->Text(65,$pdf->GetY()+10,"توفي (ت) المسمى (ة) : ".$result->NOMAR."  ".$result->PRENOMAR);$pdf->Text(102,$pdf->GetY(),"...................................................................................");
// $pdf->Text(65,$pdf->GetY()+10,"المولود (ة) : ".$result->DATENAISSANCE);$pdf->Text(85,$pdf->GetY(),"......................................");
// $pdf->Text(130,$pdf->GetY()," بـ : ".$pdf->nbrtostring("com","IDCOM",$result->COMMUNE,"communear")." ولاية ".$pdf->nbrtostring("wil","IDWIL",$result->WILAYA,"WILAYASAR") );$pdf->Text(138,$pdf->GetY(),"....................................................");
// $pdf->Text(65,$pdf->GetY()+10,"إبن (ة) : ".$result->FILSDEAR);$pdf->Text(85,$pdf->GetY(),"......................................");
// $pdf->Text(130,$pdf->GetY(),"و : ".$result->ETDEAR);$pdf->Text(138,$pdf->GetY(),"....................................................");
// $pdf->Text(65,$pdf->GetY()+10,"زوج (ة) : ".$result->NOMPRENOMAR);$pdf->Text(82,$pdf->GetY(),".....................................................................................................");
// $pdf->Text(65,$pdf->GetY()+10,"المهنة : ".$pdf->nbrtostring("profession","id",$result->Profession,"Professionar"));$pdf->Text(78,$pdf->GetY(),"..........................................");
// $pdf->Text(130,$pdf->GetY(),"عنوان الإقامة : ".$result->ADAR);$pdf->Text(158,$pdf->GetY(),"...................................");
// $pdf->Text(65,$pdf->GetY()+10,"دخل (ت) الى المستشفى يوم : ".$result->DATEHOSPI);$pdf->Text(114,$pdf->GetY(),".........................................................................");
// $pdf->Text(65,$pdf->GetY()+10,"و توفي (ت) يوم : ".$result->DINS);$pdf->Text(94,$pdf->GetY(),".............................");
// $pdf->Text(130,$pdf->GetY(),"على الساعة : ".$result->HINS);$pdf->Text(150,$pdf->GetY(),"..........................................");
// $pdf->Text(130,$pdf->GetY()+25,"في : ".$result->DINS);
// $pdf->Text(150,$pdf->GetY()+10,"امضاء المدير");
// $pdf->Text(25,$pdf->GetY()-10,"امضاء الطبيب");                             
// $pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(60,6,".......................................... ",0,1,'C');
// $pdf->setRTL(false); $pdf->Text(150,$pdf->GetY()-8,$result->MEDECINHOSPIT);$pdf->setRTL(true); 
// $pdf->Text(5,$pdf->GetY()+20,"الكتابة السابقة للاسم و اللقب :");
// $pdf->Text(7,$pdf->GetY()+10,"_____________________");
// $pdf->setRTL(false); $pdf->Text(150,$pdf->GetY(),$result->NOM);$pdf->setRTL(true); 
// $pdf->Text(7,$pdf->GetY()+10,"_____________________");
// $pdf->setRTL(false); $pdf->Text(150,$pdf->GetY(),$result->PRENOM);$pdf->setRTL(true); 
// $nec =$result->id;
// $pdf->SetXY(10,80);$pdf->Cell(50,15,'الرقم : '.date('Y').'/'.$nec,1,1,'C',1,0);
// $pdf->SetXY(10,120);$pdf->Cell(50,10,'دفتر عائلي رقم : ',1,1,'R',1,0);
// $pdf->SetXY(10,135);$pdf->Cell(50,10,'صادر بتاريخ : ',1,1,'R',1,0);
// $pdf->SetXY(10,150);$pdf->Cell(50,10,'ولاية :',1,1,'R',1,0);
// $pdf->SetFont('helvetica', '', 10);

// $pdf->Output($result->NOM.'_'.$result->PRENOM.'.pdf');
// }
// $pdf->AddPage('P','A4');
// $pdf->setRTL(true); 
// $pdf->RoundedRect($x=5, $y=5, $w=200, $h=285, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
// $pdf->RoundedRect($x=145, $y=46, $w=1, $h=244, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
// $pdf->SetFont('aefurat', '', 14);
// $pdf->SetXY(5,10);$pdf->Cell(200,6,$pdf->repar,0,1,'C');
// $pdf->SetXY(5,20);$pdf->Cell(200,6,$pdf->mspar,0,1,'C');
// $pdf->SetXY(5,30);$pdf->Cell(200,6,$pdf->dspar,0,1,'C');
// $pdf->SetFillColor(245);
// $pdf->mysqlconnect();
// $query = "select * from deceshosp WHERE  id = '$id'    ";
// $resultat=mysql_query($query);
// while($result=mysql_fetch_object($resultat))
// {
// $pdf->SetXY(65+5,$pdf->GetY()+10);$pdf->Cell(140-10,15,'رسالــــة تعزيــــــة',1,1,'C',1,0);
// $pdf->SetXY(5+5,$pdf->GetY()-15);$pdf->Cell(50,15,'الموسسة '.$pdf->nbrtostring("structure","id",$result->STRUCTURED,"structurear"),1,1,'C',1,0);
// $pdf->SetXY(5+5,$pdf->GetY());$pdf->Cell(50,15,'سعداوي المختار',1,1,'C',1,0);
// $pdf->Text(65,$pdf->GetY()+10,'سلام الله عليكم ورحمته تعالى وبركاته.');
// $pdf->Text(65,$pdf->GetY()+10,"نحن :".'...............');
// $pdf->Text(65+30,$pdf->GetY(),"مدير المؤسسة العمومية ".'................................................');
// $pdf->Text(140,$pdf->GetY(),$pdf->nbrtostring("structure","id",$result->STRUCTURED,"structurear"));
// $pdf->Text(65,$pdf->GetY()+10,"أبلغت هذا اليوم بوفاة المرحوم (ة) : ".$result->NOMAR.'_'.$result->PRENOMAR);
// $pdf->Text(65,$pdf->GetY()+10,"و بهذه المناسبة الأليمة أتقدم بعبارات العزاء لأخينا و كامل افراد عائلته  ");
// $pdf->Text(65,$pdf->GetY()+10,"داعين للمرحوم بالثواب و المغفرة و لأهله بالصبر و السلوان. ");
// $pdf->Text(65,$pdf->GetY()+10," مع أصدق عبارات الود و المحبة");
// $pdf->Text(129,$pdf->GetY()+25,"في : ".$result->DINS);
// $pdf->Text(150,$pdf->GetY()+10,"امضاء المدير");
// }



?>



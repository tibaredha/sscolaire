<?php
$id=$_GET["uc"];
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
$pdf->SetXY(15,$pdf->GetY());$pdf->Cell(45,10,"Wilaya :",1,0,'L'); $pdf->Cell(45,10,"الولاية",1,0,'R'); $pdf->Cell(45,10,"Commune : ",1,0,'L'); $pdf->Cell(45,10,"البلدية",1,1,'R');
$pdf->SetXY(15,$pdf->GetY());$pdf->Cell(45,10,"EPSP :",1,0,'L'); $pdf->Cell(45,10,"م. ع. ص .ج : ",1,0,'R'); $pdf->Cell(45,10,"UDS : ",1,0,'L'); $pdf->Cell(45,10,"و. ك. م : ",1,1,'R');

$pdf->SetFont('DejaVuSans','B',19);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,6,"الملف الصحي المدرسي",0,1,'C');
$pdf->SetFont('DejaVuSans','B',14);
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,6,"DOSSIER MEDICAL SCOLAIRE",0,1,'C');

$pdf->RoundedRect($x=15, $y=$pdf->GetY()+5, $w=180, $h=230, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());

$pdf->SetFont('DejaVuSans','',8);
$pdf->SetXY(15,$pdf->GetY()+5);$pdf->Cell(45,10,"Nom et prénom  : ",1,0,'L');      $pdf->Cell(45,10,"الاسم و اللقب : ",1,0,'R');  $pdf->Cell(45,10,"Prénom du père : ",1,0,'L');  $pdf->Cell(45,10,"اسم الاب : ",1,1,'R');
$pdf->SetXY(15,$pdf->GetY());  $pdf->Cell(45,10,"Né(e) le  : ",1,0,'L');           $pdf->Cell(45,10,"المولود(ة) في: ",1,0,'R');  $pdf->Cell(45,10,"Commune  : ",1,0,'L');        $pdf->Cell(45,10,"البلدية : ",1,1,'R');
$pdf->SetXY(15,$pdf->GetY());  $pdf->Cell(90,10,"Adresse des parents : ",1,0,'L');                                                                                               $pdf->Cell(90,10,"عنوان الاولياء : ",1,1,'R');
$pdf->SetXY(15,$pdf->GetY());  $pdf->Cell(45,10,"Profession père  : ",1,0,'L');    $pdf->Cell(45,10,"مهنة الاب : ",1,0,'R');      $pdf->Cell(45,10,"Profession mère : ",1,0,'L'); $pdf->Cell(45,10,"مهنة الام : ",1,1,'R');


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

$pdf->AddPage('P','A4');
$pdf->setRTL(FALSE); 
$pdf->RoundedRect($x=5, $y=5, $w=200, $h=285, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->SetXY(15,$pdf->GetY()+5); $pdf->SetFillColor(152, 235, 251 );$pdf->Cell(180,10,"FICHE SANTE BUCCO-DENTAIRE",1,0,'C',1,0);    
$pdf->SetXY(15,$pdf->GetY()+20);$pdf->Cell(45,10,"DATE",1,0,'L'); 
$pdf->SetXY(15,$pdf->GetY()+20);$pdf->Cell(45,10,"CLASSE",1,0,'L'); $pdf->Cell(90,10,"",0,0,'L');$pdf->Cell(45,10,"AGE",1,0,'L');
$pdf->RoundedRect($x=15, $y=$pdf->GetY()+20, $w=180, $h=20, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->SetXY(15,$pdf->GetY()+20);$pdf->Cell(45,10,"HYGIENNE BUCCO-DENTAIRE",0,0,'L'); $pdf->Cell(90,10,"",0,0,'L');$pdf->Cell(45,10,"O ACCEPTABLE",0,0,'L');
$pdf->SetXY(15,$pdf->GetY()+10);$pdf->Cell(45,10,"",0,0,'L');                        $pdf->Cell(90,10,"",0,0,'L');$pdf->Cell(45,10,"O NON ACCEPTABLE",0,0,'L');
$pdf->RoundedRect($x=15, $y=$pdf->GetY()+20, $w=180, $h=30, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->SetXY(15,$pdf->GetY()+20);$pdf->Cell(45,10,"GYNGIVITE",0,0,'L');               $pdf->Cell(90,10,"",0,0,'L');$pdf->Cell(45,10,"O LOCALISEE",0,0,'L');
$pdf->SetXY(15,$pdf->GetY()+10);$pdf->Cell(45,10,"",0,0,'L');                        $pdf->Cell(90,10,"",0,0,'L');$pdf->Cell(45,10,"O GENERALISEE",0,0,'L');
$pdf->SetXY(15,$pdf->GetY()+10);$pdf->Cell(45,10,"",0,0,'L');                        $pdf->Cell(90,10,"",0,0,'L');$pdf->Cell(45,10,"O TARTRE",0,0,'L');
$pdf->RoundedRect($x=15, $y=$pdf->GetY()+20, $w=60, $h=90, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->RoundedRect($x=15+60, $y=$pdf->GetY()+20, $w=60, $h=90, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->RoundedRect($x=15+120, $y=$pdf->GetY()+20, $w=60, $h=90, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->SetXY(15,$pdf->GetY()+20);$pdf->Cell(45,10,"INDICE DE CARIE",0,0,'L'); 
$pdf->Image("dents.jpg", $x=16, $y=$pdf->GetY()+10, $w=58, $h=70, $type='jpg', $link='', $align='C', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=0, $fitbox=false, $hidden=false, $fitonpage=false, $alt=false, $altimgs=array());
$pdf->Image("dents.jpg", $x=15+61, $y=$pdf->GetY()+10, $w=58, $h=70, $type='jpg', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=0, $fitbox=false, $hidden=false, $fitonpage=false, $alt=false, $altimgs=array());
$pdf->Image("dents.jpg", $x=15+121, $y=$pdf->GetY()+10, $w=58, $h=70, $type='jpg', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=0, $fitbox=false, $hidden=false, $fitonpage=false, $alt=false, $altimgs=array());
$pdf->SetXY(15,$pdf->GetY()+80);$pdf->Cell(60,5,"C : ",1,0,'L');$pdf->Cell(60,5,"A : ",1,0,'L');$pdf->Cell(60,5,"O : ",1,0,'L');
$pdf->SetXY(15,$pdf->GetY()+5);$pdf->Cell(60,5,"c : ",1,0,'L');$pdf->Cell(60,5,"a : ",1,0,'L');$pdf->Cell(60,5,"o : ",1,0,'L');
$pdf->RoundedRect($x=15, $y=$pdf->GetY()+10, $w=180, $h=15, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->SetXY(15,$pdf->GetY()+10);$pdf->Cell(45,5,"ANOMALIE DENTO-FACIALE",0,0,'L');              $pdf->Cell(90,5,"",0,0,'L');$pdf->Cell(45,5,"_______________________",0,0,'L');
$pdf->SetXY(15,$pdf->GetY()+5);$pdf->Cell(45,5,"Orientation vers un milieu specialisé",0,0,'L');$pdf->Cell(90,5,"",0,0,'L');$pdf->Cell(45,5,"_______________________",0,0,'L');
$pdf->RoundedRect($x=15, $y=$pdf->GetY()+15, $w=180, $h=15, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->SetXY(15,$pdf->GetY()+15);$pdf->Cell(45,5,"AUTRES PATHOLOGIES",0,0,'L');                  $pdf->Cell(90,5,"",0,0,'L');$pdf->Cell(45,5,"_______________________",0,0,'L');
$pdf->SetXY(15,$pdf->GetY()+5);$pdf->Cell(45,5,"Orientation vers un milieu specialisé",0,0,'L');$pdf->Cell(90,5,"",0,0,'L');$pdf->Cell(45,5,"_______________________",0,0,'L');

$pdf->AddPage('P','A4');
$pdf->setRTL(FALSE); 
$pdf->RoundedRect($x=5, $y=5, $w=200, $h=285, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->SetXY(15,$pdf->GetY()+5); $pdf->SetFillColor(152, 235, 251 );$pdf->Cell(180,10,"SUIVIE MEDICAL",1,0,'C',1,0);  

$pdf->SetXY(15,$pdf->GetY()+15);$pdf->SetFillColor(253, 253, 9 );$pdf->Cell(26,10,"DATE",1,0,'C',1,0);$pdf->Cell(26,10,"CLASSE",1,0,'C',1,0);      $pdf->Cell(26,10,"AGE",1,0,'C',1,0); $pdf->Cell(66,10,"RESULTAT ET CONCLUSION D'EXAMENS",1,0,'C',1,0);$pdf->Cell(36,10,"MEDECIN",1,1,'C',1,0);
$pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(152, 235, 251 );$pdf->Cell(26,10,"",1,0,'C',1,0);$pdf->Cell(26,10,"",1,0,'C',1,0);      $pdf->Cell(26,10,"",1,0,'C',1,0); $pdf->Cell(66,10,"",1,0,'C',1,0);$pdf->Cell(36,10,"",1,1,'C',1,0);
$pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(152, 235, 251 );$pdf->Cell(26,10,"",1,0,'C',1,0);$pdf->Cell(26,10,"",1,0,'C',1,0);      $pdf->Cell(26,10,"",1,0,'C',1,0); $pdf->Cell(66,10,"",1,0,'C',1,0);$pdf->Cell(36,10,"",1,1,'C',1,0);
$pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(152, 235, 251 );$pdf->Cell(26,10,"",1,0,'C',1,0);$pdf->Cell(26,10,"",1,0,'C',1,0);      $pdf->Cell(26,10,"",1,0,'C',1,0); $pdf->Cell(66,10,"",1,0,'C',1,0);$pdf->Cell(36,10,"",1,1,'C',1,0);
$pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(152, 235, 251 );$pdf->Cell(26,10,"",1,0,'C',1,0);$pdf->Cell(26,10,"",1,0,'C',1,0);      $pdf->Cell(26,10,"",1,0,'C',1,0); $pdf->Cell(66,10,"",1,0,'C',1,0);$pdf->Cell(36,10,"",1,1,'C',1,0);
$pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(152, 235, 251 );$pdf->Cell(26,10,"",1,0,'C',1,0);$pdf->Cell(26,10,"",1,0,'C',1,0);      $pdf->Cell(26,10,"",1,0,'C',1,0); $pdf->Cell(66,10,"",1,0,'C',1,0);$pdf->Cell(36,10,"",1,1,'C',1,0);
$pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(152, 235, 251 );$pdf->Cell(26,10,"",1,0,'C',1,0);$pdf->Cell(26,10,"",1,0,'C',1,0);      $pdf->Cell(26,10,"",1,0,'C',1,0); $pdf->Cell(66,10,"",1,0,'C',1,0);$pdf->Cell(36,10,"",1,1,'C',1,0);
$pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(152, 235, 251 );$pdf->Cell(26,10,"",1,0,'C',1,0);$pdf->Cell(26,10,"",1,0,'C',1,0);      $pdf->Cell(26,10,"",1,0,'C',1,0); $pdf->Cell(66,10,"",1,0,'C',1,0);$pdf->Cell(36,10,"",1,1,'C',1,0);
$pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(152, 235, 251 );$pdf->Cell(26,10,"",1,0,'C',1,0);$pdf->Cell(26,10,"",1,0,'C',1,0);      $pdf->Cell(26,10,"",1,0,'C',1,0); $pdf->Cell(66,10,"",1,0,'C',1,0);$pdf->Cell(36,10,"",1,1,'C',1,0);
$pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(152, 235, 251 );$pdf->Cell(26,10,"",1,0,'C',1,0);$pdf->Cell(26,10,"",1,0,'C',1,0);      $pdf->Cell(26,10,"",1,0,'C',1,0); $pdf->Cell(66,10,"",1,0,'C',1,0);$pdf->Cell(36,10,"",1,1,'C',1,0);
$pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(152, 235, 251 );$pdf->Cell(26,10,"",1,0,'C',1,0);$pdf->Cell(26,10,"",1,0,'C',1,0);      $pdf->Cell(26,10,"",1,0,'C',1,0); $pdf->Cell(66,10,"",1,0,'C',1,0);$pdf->Cell(36,10,"",1,1,'C',1,0);
$pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(152, 235, 251 );$pdf->Cell(26,10,"",1,0,'C',1,0);$pdf->Cell(26,10,"",1,0,'C',1,0);      $pdf->Cell(26,10,"",1,0,'C',1,0); $pdf->Cell(66,10,"",1,0,'C',1,0);$pdf->Cell(36,10,"",1,1,'C',1,0);
$pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(152, 235, 251 );$pdf->Cell(26,10,"",1,0,'C',1,0);$pdf->Cell(26,10,"",1,0,'C',1,0);      $pdf->Cell(26,10,"",1,0,'C',1,0); $pdf->Cell(66,10,"",1,0,'C',1,0);$pdf->Cell(36,10,"",1,1,'C',1,0);
$pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(152, 235, 251 );$pdf->Cell(26,10,"",1,0,'C',1,0);$pdf->Cell(26,10,"",1,0,'C',1,0);      $pdf->Cell(26,10,"",1,0,'C',1,0); $pdf->Cell(66,10,"",1,0,'C',1,0);$pdf->Cell(36,10,"",1,1,'C',1,0);
$pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(152, 235, 251 );$pdf->Cell(26,10,"",1,0,'C',1,0);$pdf->Cell(26,10,"",1,0,'C',1,0);      $pdf->Cell(26,10,"",1,0,'C',1,0); $pdf->Cell(66,10,"",1,0,'C',1,0);$pdf->Cell(36,10,"",1,1,'C',1,0);
$pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(152, 235, 251 );$pdf->Cell(26,10,"",1,0,'C',1,0);$pdf->Cell(26,10,"",1,0,'C',1,0);      $pdf->Cell(26,10,"",1,0,'C',1,0); $pdf->Cell(66,10,"",1,0,'C',1,0);$pdf->Cell(36,10,"",1,1,'C',1,0);
$pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(152, 235, 251 );$pdf->Cell(26,10,"",1,0,'C',1,0);$pdf->Cell(26,10,"",1,0,'C',1,0);      $pdf->Cell(26,10,"",1,0,'C',1,0); $pdf->Cell(66,10,"",1,0,'C',1,0);$pdf->Cell(36,10,"",1,1,'C',1,0);
$pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(152, 235, 251 );$pdf->Cell(26,10,"",1,0,'C',1,0);$pdf->Cell(26,10,"",1,0,'C',1,0);      $pdf->Cell(26,10,"",1,0,'C',1,0); $pdf->Cell(66,10,"",1,0,'C',1,0);$pdf->Cell(36,10,"",1,1,'C',1,0);
$pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(152, 235, 251 );$pdf->Cell(26,10,"",1,0,'C',1,0);$pdf->Cell(26,10,"",1,0,'C',1,0);      $pdf->Cell(26,10,"",1,0,'C',1,0); $pdf->Cell(66,10,"",1,0,'C',1,0);$pdf->Cell(36,10,"",1,1,'C',1,0);
$pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(152, 235, 251 );$pdf->Cell(26,10,"",1,0,'C',1,0);$pdf->Cell(26,10,"",1,0,'C',1,0);      $pdf->Cell(26,10,"",1,0,'C',1,0); $pdf->Cell(66,10,"",1,0,'C',1,0);$pdf->Cell(36,10,"",1,1,'C',1,0);
$pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(152, 235, 251 );$pdf->Cell(26,10,"",1,0,'C',1,0);$pdf->Cell(26,10,"",1,0,'C',1,0);      $pdf->Cell(26,10,"",1,0,'C',1,0); $pdf->Cell(66,10,"",1,0,'C',1,0);$pdf->Cell(36,10,"",1,1,'C',1,0);
$pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(152, 235, 251 );$pdf->Cell(26,10,"",1,0,'C',1,0);$pdf->Cell(26,10,"",1,0,'C',1,0);      $pdf->Cell(26,10,"",1,0,'C',1,0); $pdf->Cell(66,10,"",1,0,'C',1,0);$pdf->Cell(36,10,"",1,1,'C',1,0);
$pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(152, 235, 251 );$pdf->Cell(26,10,"",1,0,'C',1,0);$pdf->Cell(26,10,"",1,0,'C',1,0);      $pdf->Cell(26,10,"",1,0,'C',1,0); $pdf->Cell(66,10,"",1,0,'C',1,0);$pdf->Cell(36,10,"",1,1,'C',1,0);
$pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(152, 235, 251 );$pdf->Cell(26,10,"",1,0,'C',1,0);$pdf->Cell(26,10,"",1,0,'C',1,0);      $pdf->Cell(26,10,"",1,0,'C',1,0); $pdf->Cell(66,10,"",1,0,'C',1,0);$pdf->Cell(36,10,"",1,1,'C',1,0);
$pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(152, 235, 251 );$pdf->Cell(26,10,"",1,0,'C',1,0);$pdf->Cell(26,10,"",1,0,'C',1,0);      $pdf->Cell(26,10,"",1,0,'C',1,0); $pdf->Cell(66,10,"",1,0,'C',1,0);$pdf->Cell(36,10,"",1,1,'C',1,0);

$pdf->AddPage('P','A4');
$pdf->setRTL(FALSE); 
$pdf->RoundedRect($x=5, $y=5, $w=200, $h=285, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->SetXY(15,$pdf->GetY()+5); $pdf->SetFillColor(152, 235, 251 );$pdf->Cell(180,10,"EXAMEN MEDICAL DE DEPISTAGE",1,0,'C',1,0);  
$pdf->SetXY(15,$pdf->GetY()+10);$pdf->SetFillColor(253, 253, 9);$pdf->Cell(40,10,"DATE DE L'EXAMEN",1,0,'C',1,0);$pdf->SetFillColor(152, 245, 255 );$pdf->Cell(35,10,"",1,0,'C',1,0);$pdf->Cell(35,10,"",1,0,'C',1,0);$pdf->Cell(35,10,"",1,0,'C',1,0);$pdf->Cell(35,10,"",1,1,'C',1,0);
$pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(253, 253, 9);$pdf->Cell(40,10,"CLASSE FREQUENTE",1,0,'C',1,0);$pdf->SetFillColor(152, 245, 255 );$pdf->Cell(35,10,"",1,0,'C',1,0);$pdf->Cell(35,10,"",1,0,'C',1,0);$pdf->Cell(35,10,"",1,0,'C',1,0);$pdf->Cell(35,10,"",1,1,'C',1,0);
$pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(253, 253, 9);$pdf->Cell(40,10,"AGE DE L'ELEVE",1,0,'C',1,0);$pdf->SetFillColor(152, 245, 255 );$pdf->Cell(35,10,"",1,0,'C',1,0);$pdf->Cell(35,10,"",1,0,'C',1,0);$pdf->Cell(35,10,"",1,0,'C',1,0);$pdf->Cell(35,10,"",1,1,'C',1,0);
$pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(253, 253, 9);$pdf->Cell(40,10,"",1,0,'C',1,0);$pdf->SetFillColor(152, 245, 255 );$pdf->Cell(35,10,"",1,0,'C',1,0);$pdf->Cell(35,10,"",1,0,'C',1,0);$pdf->Cell(35,10,"",1,0,'C',1,0);$pdf->Cell(35,10,"",1,1,'C',1,0);
$pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(253, 253, 9);$pdf->Cell(40,10,"",1,0,'C',1,0);$pdf->SetFillColor(152, 245, 255 );$pdf->Cell(35,10,"",1,0,'C',1,0);$pdf->Cell(35,10,"",1,0,'C',1,0);$pdf->Cell(35,10,"",1,0,'C',1,0);$pdf->Cell(35,10,"",1,1,'C',1,0);
$pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(253, 253, 9);$pdf->Cell(40,10,"",1,0,'C',1,0);$pdf->SetFillColor(152, 245, 255 );$pdf->Cell(35,10,"",1,0,'C',1,0);$pdf->Cell(35,10,"",1,0,'C',1,0);$pdf->Cell(35,10,"",1,0,'C',1,0);$pdf->Cell(35,10,"",1,1,'C',1,0);
$pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(253, 253, 9);$pdf->Cell(40,10,"",1,0,'C',1,0);$pdf->SetFillColor(152, 245, 255 );$pdf->Cell(35,10,"",1,0,'C',1,0);$pdf->Cell(35,10,"",1,0,'C',1,0);$pdf->Cell(35,10,"",1,0,'C',1,0);$pdf->Cell(35,10,"",1,1,'C',1,0);





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
// define barcode style
// $style = array(
    // 'position' => '',
    // 'align' => 'R',
    // 'stretch' => false,
    // 'fitwidth' => false,
    // 'cellfitalign' => '',
    // 'border' => false,
    // 'hpadding' => 'auto',
    // 'vpadding' => 'auto',
    // 'fgcolor' => array(0,0,0),
    // 'bgcolor' => false, //array(255,255,255),
    // 'text' => true,
    // 'font' => 'helvetica',
    // 'fontsize' => 8,
    // 'stretchtext' => 4
// );
// $pdf->SetXY(10,99);$pdf->write1DBarcode($nec, 'C39', '', '', '', 18, 0.4, $style, 'N');
// $pdf->Ln();
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



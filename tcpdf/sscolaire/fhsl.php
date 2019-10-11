<?php
$id=$_GET["id"];

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
$query = "select * from hsl WHERE  id = '$id'";
$resultat=mysql_query($query);
while($result=mysql_fetch_object($resultat))
{
$pdf->AddPage('P','A4');
$pdf->setRTL(false); 
$pdf->RoundedRect($x=5, $y=5, $w=200, $h=285, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->SetFont('DejaVuSans','B',10);
// $pdf->SetFillColor(152, 235, 251);
// $pdf->SetTextColor(255, 255, 255);

$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,6,$pdf->repfr,0,0,'C',0,1);
$pdf->SetXY(5,$pdf->GetY()+6);$pdf->Cell(200,6,$pdf->mspfr,0,0,'C',0,1);
$pdf->SetXY(5,$pdf->GetY()+6);$pdf->Cell(200,6,$pdf->dspfr.'Djelfa',0,0,'C',0,1);

$pdf->SetFont('DejaVuSans','',10);
$pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(200,6,'Fiche d\'hygiene et salubrité des locaux d\'un établissement scolaire ',1,0,'C',0,1);
$pdf->SetXY(5,$pdf->GetY()+6);$pdf->Cell(200,6,"Nom de l'EPSP : ".$pdf->nbrtostring("structure","id",$result->STRUCTURE,"structure"),1,0,'L');
$pdf->SetXY(5,$pdf->GetY()+6);$pdf->Cell(200,6,"Nom de l'UDS : ".$pdf->nbrtostring("uds","id",$result->UDS,"uds"),1,0,'L');
$pdf->SetXY(5,$pdf->GetY()+6); $pdf->Cell(200,6,"Nom de l'établissement : ".$pdf->nbrtostring("ecole","id",$result->ETABLIS,"ecole"),1,0,'L');
$pdf->SetXY(5,$pdf->GetY()+6); $pdf->Cell(200,6,"Date de la visite : ".$pdf->dateUS2FR($result->DATEV),1,0,'L');
$pdf->SetXY(5,$pdf->GetY()+6);$pdf->Cell(50,6*8,"CLASSE",1,0,'C');$pdf->Cell(100,6,"Fréquence de néttoyage humide",1,0,'L');             $pdf->Cell(50,6,"...",1,0,'C');
$pdf->SetXY(55,$pdf->GetY()+6);                                   $pdf->Cell(100,6,"Propreté noter de 01 a 10 ",1,0,'L');                $pdf->Cell(50,6,"...",1,0,'C');
$pdf->SetXY(55,$pdf->GetY()+6);                                   $pdf->Cell(100,6,"Chauffage (modalité) ",1,0,'L');                     $pdf->Cell(50,6,"...",1,0,'C');
$pdf->SetXY(55,$pdf->GetY()+6);                                   $pdf->Cell(100,6,"Nombre d'appareils en bonne etat / Total ",1,0,'L');  $pdf->Cell(50,6,"...",1,0,'C');
$pdf->SetXY(55,$pdf->GetY()+6);                                   $pdf->Cell(100,6,"Nombre de porte mentaux par classe ",1,0,'L');       $pdf->Cell(50,6,"...",1,0,'C');
$pdf->SetXY(55,$pdf->GetY()+6);                                   $pdf->Cell(100,6,"Nombre de carreaux cassées ",1,0,'L');               $pdf->Cell(50,6,"...",1,0,'C');
$pdf->SetXY(55,$pdf->GetY()+6);                                   $pdf->Cell(100,6,"Eclairage ",1,0,'L');                                $pdf->Cell(50,6,"...",1,0,'C');
$pdf->SetXY(55,$pdf->GetY()+6);                                   $pdf->Cell(100,6,"Distance 1ère table tableau ",1,0,'L');              $pdf->Cell(50,6,"...",1,0,'C');

$pdf->SetXY(5,$pdf->GetY()+6);$pdf->Cell(50,6*6,"EAU",1,0,'C');   $pdf->Cell(100,6,"Approvisionnement en eau potable",1,0,'L');             $pdf->Cell(50,6,"...",1,0,'C');
$pdf->SetXY(55,$pdf->GetY()+6);                                   $pdf->Cell(100,6,"Traitement  (chaux-javel) fréquence ",1,0,'L');          $pdf->Cell(50,6,"...",1,0,'C');
$pdf->SetXY(55,$pdf->GetY()+6);                                   $pdf->Cell(100,6,"Date de prélevemnt  ",1,0,'L');     $pdf->Cell(50,6,"...",1,0,'C');
$pdf->SetXY(55,$pdf->GetY()+6);                                   $pdf->Cell(100,6,"Résultat bacteriologique (colimetrie) ",1,0,'L');                      $pdf->Cell(50,6,"...",1,0,'C');
$pdf->SetXY(55,$pdf->GetY()+6);                                   $pdf->Cell(100,6,"Controle de la cloration",1,0,'L');     $pdf->Cell(50,6,"...",1,0,'C');
$pdf->SetXY(55,$pdf->GetY()+6);                                   $pdf->Cell(100,6," Evacuation des eaux usées",1,0,'L');                 $pdf->Cell(50,6,"...",1,0,'C');

$pdf->SetXY(5,$pdf->GetY()+6);$pdf->Cell(50,6,"LAVABOS",1,0,'C'); $pdf->Cell(100,6,"Nombre de robinet fonctionnels / Total",1,0,'L');     $pdf->Cell(50,6,"...",1,0,'C');

$pdf->SetXY(5,$pdf->GetY()+6);$pdf->Cell(50,6*4,"TOILETTES",1,0,'C');$pdf->Cell(100,6,"Nombre de cabinets fonctionnels / Total",1,0,'L');   $pdf->Cell(50,6,"...",1,0,'C');
$pdf->SetXY(55,$pdf->GetY()+6);                                     $pdf->Cell(100,6,"Nombre d'urinoirs",1,0,'L');                        $pdf->Cell(50,6,"...",1,0,'C');
$pdf->SetXY(55,$pdf->GetY()+6);                                     $pdf->Cell(100,6,"Désinfection journalière  ",1,0,'L');               $pdf->Cell(50,6,"...",1,0,'C');
$pdf->SetXY(55,$pdf->GetY()+6);                                     $pdf->Cell(100,6,"Propreté noter de 01 a 10  ",1,0,'L');                  $pdf->Cell(50,6,"...",1,0,'C');

$pdf->SetXY(5,$pdf->GetY()+6);$pdf->Cell(50,6*3,"COUR",1,0,'C');   $pdf->Cell(100,6,"Sol",1,0,'L');                                       $pdf->Cell(50,6,"...",1,0,'C');
$pdf->SetXY(55,$pdf->GetY()+6);                                     $pdf->Cell(100,6,"Cloture",1,0,'L');                                   $pdf->Cell(50,6,"...",1,0,'C');
$pdf->SetXY(55,$pdf->GetY()+6);                                     $pdf->Cell(100,6,"Signalisation routiere  ",1,0,'L');                  $pdf->Cell(50,6,"...",1,0,'C');

$pdf->SetXY(5,$pdf->GetY()+6);$pdf->Cell(50,6*4,"CUISINE",1,0,'C');$pdf->Cell(100,6,"Etat du sol et des murs",1,0,'L');                   $pdf->Cell(50,6,"...",1,0,'C');
$pdf->SetXY(55,$pdf->GetY()+6);                                     $pdf->Cell(100,6,"Lavage journalier noter de 01 a 10",1,0,'L');        $pdf->Cell(50,6,"...",1,0,'C');
$pdf->SetXY(55,$pdf->GetY()+6);                                     $pdf->Cell(100,6,"Propreté ustensiles noter de 01 a 10  ",1,0,'L');    $pdf->Cell(50,6,"...",1,0,'C');
$pdf->SetXY(55,$pdf->GetY()+6);                                     $pdf->Cell(100,6,"Propreté du personnel  noter de 01 a 10  ",1,0,'L'); $pdf->Cell(50,6,"...",1,0,'C');

$pdf->SetXY(5,$pdf->GetY()+6);$pdf->Cell(50,6*2,"STOCKAGE DES ALIMENTS",1,0,'C');$pdf->Cell(100,6,"Propreté du local",1,0,'L');                      $pdf->Cell(50,6,"...",1,0,'C');
$pdf->SetXY(55,$pdf->GetY()+6);                                                    $pdf->Cell(100,6,"Condition (réfrigérateur-garde manger)",1,0,'L'); $pdf->Cell(50,6,"...",1,0,'C');

$pdf->SetXY(5,$pdf->GetY()+6);$pdf->Cell(50,6*4,"REFECTOIRE",1,0,'C');             $pdf->Cell(100,6,"Etat du local",1,0,'L');                         $pdf->Cell(50,6,"...",1,0,'C');
$pdf->SetXY(55,$pdf->GetY()+6);                                                     $pdf->Cell(100,6,"Propreté du sol",1,0,'L');                       $pdf->Cell(50,6,"...",1,0,'C');
$pdf->SetXY(55,$pdf->GetY()+6);                                                     $pdf->Cell(100,6,"Propreté des tables  ",1,0,'L');                 $pdf->Cell(50,6,"...",1,0,'C');
$pdf->SetXY(55,$pdf->GetY()+6);                                                     $pdf->Cell(100,6,"Propreté des couverts  ",1,0,'L');               $pdf->Cell(50,6,"...",1,0,'C');

$pdf->SetXY(5,$pdf->GetY()+6);$pdf->Cell(50,6*4,"DORTOIRE",1,0,'C');               $pdf->Cell(100,6,"Propreté des chambres",1,0,'L');                 $pdf->Cell(50,6,"...",1,0,'C');
$pdf->SetXY(55,$pdf->GetY()+6);                                                     $pdf->Cell(100,6,"Propreté des toilettes",1,0,'L');                $pdf->Cell(50,6,"...",1,0,'C');
$pdf->SetXY(55,$pdf->GetY()+6);                                                     $pdf->Cell(100,6,"Chauffage  ",1,0,'L');                           $pdf->Cell(50,6,"...",1,0,'C');
$pdf->SetXY(55,$pdf->GetY()+6);                                                     $pdf->Cell(100,6,"Espassement des lits  ",1,0,'L');                $pdf->Cell(50,6,"...",1,0,'C');

$pdf->SetXY(5,$pdf->GetY()+6);$pdf->Cell(150,6,"DESINFECTION ET DERATISATION",1,0,'C');$pdf->Cell(50,6,"...",1,0,'C');



// $pdf->SetXY(5,$pdf->GetY());$pdf->Cell(100,6,$pdf->nbrtostring("uds","id",$result->UDS,"udsar"),0,0,'C'); $pdf->Cell(100,6,$pdf->nbrtostring("uds","id",$result->UDS,"uds"),0,1,'C');
// $pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(100,6,"المؤسسة التربوية",0,0,'C');      $pdf->Cell(100,6,"Etablissement scolaire",0,1,'C');
// $pdf->SetXY(5,$pdf->GetY());$pdf->Cell(100,6,$pdf->nbrtostring("ecole","id",$result->ECOLE,"ecolear"),0,0,'C'); $pdf->Cell(100,6,$pdf->nbrtostring("ecole","id",$result->ECOLE,"ecole"),0,1,'C');
// $pdf->SetFont('DejaVuSans','B',34);
// $pdf->SetXY(5,100);$pdf->Cell(200,6,"الملف الصحي المدرسي",0,1,'C');
// $pdf->SetXY(5,105);$pdf->Cell(200,6,"_______________________",0,1,'C');
// $pdf->SetFont('DejaVuSans','B',24);
// $pdf->SetXY(5,122);$pdf->Cell(200,6,"DOSSIER MEDICAL SCOLAIRE",0,1,'C');
// $pdf->SetFont('DejaVuSans','B',12);
// $pdf->SetXY(15,140);$pdf->Cell(90,6," لقب و اسم التلميذ :",0,0,'R');$pdf->Cell(90,6,"Nom et prénom de l'élève : ".$result->NOM.'_'.$result->PRENOM,0,1,'L');
// $pdf->SetXY(15,150);$pdf->Cell(90,6,"المولود (ة) :",0,0,'R');       $pdf->Cell(90,6,"Né(e) Le  : ".$pdf->dateUS2FR($result->DATENS),0,1,'L');
// $pdf->SetXY(15,160);$pdf->Cell(90,6,"عنوان الاولياء : ",0,0,'R');    $pdf->Cell(90,6,"Adresse des parents  : ".$result->ADRESSE,0,1,'L');
// $pdf->SetXY(15,170);$pdf->Cell(45,10,"السنة الدراسية",1,0,'C');      $pdf->Cell(90,10,"المدرسة التي يزاول بها الدراسة",1,0,'C');$pdf->Cell(45,10,"الملاحضات",1,1,'C');
// $pdf->SetXY(15,180);$pdf->Cell(45,10,"Années scolaires",1,0,'C');    $pdf->Cell(90,10,"Etablissements fréquentés ",1,0,'C');$pdf->Cell(45,10,"Observations",1,1,'C');
// $pdf->SetXY(15,$pdf->GetY());$pdf->Cell(45,10,"",1,0,'C');    $pdf->Cell(90,10,"",1,0,'C');$pdf->Cell(45,10,"",1,1,'C');
// $pdf->SetXY(15,$pdf->GetY());$pdf->Cell(45,10,"",1,0,'C');    $pdf->Cell(90,10,"",1,0,'C');$pdf->Cell(45,10,"",1,1,'C');
// $pdf->SetXY(15,$pdf->GetY());$pdf->Cell(45,10,"",1,0,'C');    $pdf->Cell(90,10,"",1,0,'C');$pdf->Cell(45,10,"",1,1,'C');
// $pdf->SetXY(15,$pdf->GetY());$pdf->Cell(45,10,"",1,0,'C');    $pdf->Cell(90,10,"",1,0,'C');$pdf->Cell(45,10,"",1,1,'C');
// $pdf->SetXY(15,$pdf->GetY());$pdf->Cell(45,10,"",1,0,'C');    $pdf->Cell(90,10,"",1,0,'C');$pdf->Cell(45,10,"",1,1,'C');
// $pdf->SetXY(15,$pdf->GetY());$pdf->Cell(45,10,"",1,0,'C');    $pdf->Cell(90,10,"",1,0,'C');$pdf->Cell(45,10,"",1,1,'C');
// $pdf->SetXY(15,$pdf->GetY());$pdf->Cell(45,10,"",1,0,'C');    $pdf->Cell(90,10,"",1,0,'C');$pdf->Cell(45,10,"",1,1,'C');
// $pdf->SetXY(15,$pdf->GetY());$pdf->Cell(45,10,"",1,0,'C');    $pdf->Cell(90,10,"",1,0,'C');$pdf->Cell(45,10,"",1,1,'C');
// $pdf->SetXY(15,$pdf->GetY());$pdf->Cell(45,10,"",1,0,'C');    $pdf->Cell(90,10,"",1,0,'C');$pdf->Cell(45,10,"",1,1,'C');
// $pdf->SetTextColor(0, 0, 0);

// $pdf->AddPage('P','A4');
// $pdf->setRTL(FALSE); 
// $pdf->RoundedRect($x=5, $y=5, $w=200, $h=285, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
// $pdf->SetFont('DejaVuSans','',10);
// $pdf->SetXY(15,$pdf->GetY());$pdf->Cell(45,10,"Wilaya : DJELFA",1,0,'L'); $pdf->Cell(45,10,"الولاية: الجلفة",1,0,'R'); $pdf->Cell(45,10,"Commune : ".$pdf->nbrtostring("com","IDCOM",$pdf->nbrtostring("ecole","id",$result->ECOLE,"idcom"),"COMMUNE"),1,0,'L'); $pdf->Cell(45,10,"البلدية"	,1,1,'R');
// $pdf->SetXY(15,$pdf->GetY());$pdf->Cell(45,10,"EPSP : ".$pdf->nbrtostring("structure","id",$result->STRUCTURE,"structure"),1,0,'L'); $pdf->Cell(45,10,"م. ع. ص .ج : ",1,0,'R'); $pdf->Cell(45,10,"UDS : ".$pdf->nbrtostring("uds","id",$result->UDS,"uds"),1,0,'L'); $pdf->Cell(45,10,"و. ك. م : ",1,1,'R');
// $pdf->SetFont('DejaVuSans','B',19);
// $pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,6,"الملف الصحي المدرسي",0,1,'C');
// $pdf->SetFont('DejaVuSans','B',14);
// $pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,6,"DOSSIER MEDICAL SCOLAIRE",0,1,'C');
// $pdf->RoundedRect($x=15, $y=$pdf->GetY()+5, $w=180, $h=230, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
// $pdf->SetFont('DejaVuSans','',8);
// $pdf->SetXY(15,$pdf->GetY()+5);$pdf->Cell(45,10,"Nom et prénom  : ".$result->NOM.'_'.$result->PRENOM,0,0,'L');      $pdf->Cell(45,10,"الاسم و اللقب : ",0,0,'R');  $pdf->Cell(45,10,"Prénom du père : ".$result->FILSDE,0,0,'L');  $pdf->Cell(45,10,"اسم الاب : ",0,1,'R');
// $pdf->SetXY(15,$pdf->GetY());  $pdf->Cell(45,10,"Né(e) le  : ".$pdf->dateUS2FR($result->DATENS),0,0,'L');           $pdf->Cell(45,10,"المولود(ة) في: ",0,0,'R');  $pdf->Cell(45,10,"Commune  : ".$pdf->nbrtostring("com","IDCOM",$result->COMMUNEN,"COMMUNE"),0,0,'L');        $pdf->Cell(45,10,"البلدية : ",0,1,'R');
// $pdf->SetXY(15,$pdf->GetY());  $pdf->Cell(90,10,"Adresse des parents : ".$result->ADRESSE,0,0,'L');                                                                                               $pdf->Cell(90,10,"عنوان الاولياء : ",0,1,'R');
// $pdf->SetXY(15,$pdf->GetY());  $pdf->Cell(45,10,"Profession père  : ",0,0,'L');    $pdf->Cell(45,10,"مهنة الاب : ",0,0,'R');      $pdf->Cell(45,10,"Profession mère : ",0,0,'L'); $pdf->Cell(45,10,"مهنة الام : ",0,1,'R');
// $pdf->SetXY(15,$pdf->GetY());  $pdf->Cell(135,10,"المؤسسات المدرسية و المنتمي اليها ",1,0,'C');        $pdf->Cell(45,10,"السنوات الدراسية ",1,0,'C');      
// $pdf->SetXY(15,$pdf->GetY()+10);  $pdf->Cell(135,10,"Établissements scolaires fréquentés  : ",1,0,'C');    $pdf->Cell(45,10,"Années scolaires",1,0,'C');      
// $pdf->SetXY(15,$pdf->GetY()+10);  $pdf->Cell(135,10,"",1,0,'C');    $pdf->Cell(45,10,"",1,0,'C');      
// $pdf->SetXY(15,$pdf->GetY()+10);  $pdf->Cell(135,10," ",1,0,'C');    $pdf->Cell(45,10,"",1,0,'C');      
// $pdf->SetXY(15,$pdf->GetY()+10);  $pdf->Cell(135,10," ",1,0,'C');    $pdf->Cell(45,10,"",1,0,'C');      
// $pdf->SetXY(15,$pdf->GetY()+10);  $pdf->Cell(135,10," ",1,0,'C');    $pdf->Cell(45,10,"",1,0,'C');
// $pdf->SetXY(15,$pdf->GetY()+10); 
// $pdf->SetFillColor(152, 235, 251 );$pdf->Cell(90,10,"Vaccination",1,0,'R',1,0);$pdf->Cell(90,10,"التلقيحات",1,1,'L',1,0);    
// $pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(11, 193, 31 );$pdf->Cell(36,10,"",1,0,'L');                             $pdf->SetFillColor(253, 253, 9);  $pdf->Cell(36,10,"Vaccins",1,0,'C',1,0);            $pdf->Cell(36,10,"Fait le",1,0,'C',1,0);$pdf->Cell(36,10,"A refaire le",1,0,'C',1,0);$pdf->Cell(36,10,"Observation",1,1,'C',1,0);
// $pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(11, 193, 31 );$pdf->Cell(36,10,"Naissance",1,0,'C',1,0);                $pdf->SetFillColor(152, 235, 251);$pdf->Cell(36,10,"BCG-POLIO:O-HVB1",1,0,'C',1,0);   $pdf->Cell(36,10,"",1,0,'L');           $pdf->Cell(36,10,"",1,0,'L');                $pdf->Cell(36,10,"",1,1,'L');
// $pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(11, 193, 31 );$pdf->Cell(36,10,"1er mois",1,0,'C',1,0);                 $pdf->SetFillColor(152, 235, 251);$pdf->Cell(36,10,"HVB2",1,0,'C',1,0);               $pdf->Cell(36,10,"",1,0,'L');           $pdf->Cell(36,10,"",1,0,'L');                $pdf->Cell(36,10,"",1,1,'L');
// $pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(11, 193, 31 );$pdf->Cell(36,10,"3eme mois",1,0,'C',1,0);                $pdf->SetFillColor(152, 235, 251);$pdf->Cell(36,10,"DTCOQ-POLIO:O",1,0,'C',1,0);      $pdf->Cell(36,10,"",1,0,'L');           $pdf->Cell(36,10,"",1,0,'L');                $pdf->Cell(36,10,"",1,1,'L');
// $pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(11, 193, 31 );$pdf->Cell(36,10,"4eme mois",1,0,'C',1,0);                $pdf->SetFillColor(152, 235, 251);$pdf->Cell(36,10,"DTCOQ-POLIO:O",1,0,'C',1,0);      $pdf->Cell(36,10,"",1,0,'L');           $pdf->Cell(36,10,"",1,0,'L');                $pdf->Cell(36,10,"",1,1,'L');
// $pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(11, 193, 31 );$pdf->Cell(36,10,"5eme mois",1,0,'C',1,0);                $pdf->SetFillColor(152, 235, 251);$pdf->Cell(36,10,"DTCOQ-POLIO:O-HVB3",1,0,'C',1,0); $pdf->Cell(36,10,"",1,0,'L');           $pdf->Cell(36,10,"",1,0,'L');                $pdf->Cell(36,10,"",1,1,'L');
// $pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(11, 193, 31 );$pdf->Cell(36,10,"9eme mois",1,0,'C',1,0);                $pdf->SetFillColor(152, 235, 251);$pdf->Cell(36,10,"ROR",1,0,'C',1,0);                $pdf->Cell(36,10,"",1,0,'L');           $pdf->Cell(36,10,"",1,0,'L');                $pdf->Cell(36,10,"",1,1,'L');
// $pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(11, 193, 31 );$pdf->Cell(36,10,"18eme mois",1,0,'C',1,0);               $pdf->SetFillColor(152, 235, 251);$pdf->Cell(36,10,"DTCOQ-POLIO:O",1,0,'C',1,0);      $pdf->Cell(36,10,"",1,0,'L');           $pdf->Cell(36,10,"",1,0,'L');                $pdf->Cell(36,10,"",1,1,'L');
// $pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(11, 193, 31 );$pdf->Cell(36,10,"1ere AP",1,0,'C',1,0);                  $pdf->SetFillColor(152, 235, 251);$pdf->Cell(36,10,"DTE-POLIO:O-RR",1,0,'C',1,0);     $pdf->Cell(36,10,"",1,0,'L');           $pdf->Cell(36,10,"",1,0,'L');                $pdf->Cell(36,10,"",1,1,'L');
// $pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(11, 193, 31 );$pdf->Cell(36,10,"1ere AM",1,0,'C',1,0);                  $pdf->SetFillColor(152, 235, 251);$pdf->Cell(36,10,"DTA-POLIO:O",1,0,'C',1,0);        $pdf->Cell(36,10,"",1,0,'L');           $pdf->Cell(36,10,"",1,0,'L');                $pdf->Cell(36,10,"",1,1,'L');
// $pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(11, 193, 31 );$pdf->Cell(36,10,"1ere AS",1,0,'C',1,0);                  $pdf->SetFillColor(152, 235, 251);$pdf->Cell(36,10,"DTA-POLIO:O",1,0,'C',1,0);        $pdf->Cell(36,10,"",1,0,'L');           $pdf->Cell(36,10,"",1,0,'L');                $pdf->Cell(36,10,"",1,1,'L');
// $pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(11, 193, 31 );$pdf->Cell(36,10,"18 ans (Tous les 10 ans) ",1,0,'C',1,0);$pdf->SetFillColor(152, 235, 251);$pdf->Cell(36,10,"DTA",1,0,'C',1,0);                $pdf->Cell(36,10,"",1,0,'L');           $pdf->Cell(36,10,"",1,0,'L');                $pdf->Cell(36,10,"",1,1,'L');
// $pdf->SetXY(15,33);$pdf->write1DBarcode($id, 'C39', '', '', '', 18, 0.4, $style, 'N');$pdf->Ln();
// $pdf->SetFont('DejaVuSans','',8);
// $pdf->mysqlconnect();
// $querysbd = "select * from examensbd WHERE id= '$idfiche' ";
// $resultatsbd=mysql_query($querysbd);
// while($resultsbd=mysql_fetch_object($resultatsbd))
// {
// $data=array(
// "DATE"           => $resultsbd->DATESBD, 
// "CLASSE"         => $resultsbd->NIVEAUS, 
// "ID"             => $ideleve,
// "ETABLIS"        => $resultsbd->ETABLIS,
// "UDS"            => $resultsbd->UDS,

// "CPSO"            => $pdf->verif($resultsbd->OKRDV,"1"),
// "CPSN"            => $pdf->verif($resultsbd->OKRDV,"0"),

// "HBDNA"          => $pdf->verif($resultsbd->HYGIENE,"1"),
// "HBDA"           => $pdf->verif($resultsbd->HYGIENE,"0"),
// "GO"             => $pdf->verif($resultsbd->GINGIVITE,"1"),
// "GN"             => $pdf->verif($resultsbd->GINGIVITE,"0"),
// "ODFO"           => $pdf->verif($resultsbd->AODF,"1"),
// "ODFN"           => $pdf->verif($resultsbd->AODF,"0"),
// "C"              => $resultsbd->C,
// "A"              => $resultsbd->A,
// "O"              => $resultsbd->O,
// "c"              => $resultsbd->PC,
// "a"              => $resultsbd->PA,
// "o"              => $resultsbd->PO,
// "d11"            => $resultsbd->d11,
// "d12"            => $resultsbd->d12,
// "d13"            => $resultsbd->d13,
// "d14"            => $resultsbd->d14,
// "d15"            => $resultsbd->d15,
// "d16"            => $resultsbd->d16,
// "d17"            => $resultsbd->d17,
// "d18"            => $resultsbd->d18,
// "d21"            => $resultsbd->d21,
// "d22"            => $resultsbd->d22,
// "d23"            => $resultsbd->d23,
// "d24"            => $resultsbd->d24,
// "d25"            => $resultsbd->d25,
// "d26"            => $resultsbd->d26,
// "d27"            => $resultsbd->d27,
// "d28"            => $resultsbd->d28,
// "d31"            => $resultsbd->d31,
// "d32"            => $resultsbd->d32,
// "d33"            => $resultsbd->d33,
// "d34"            => $resultsbd->d34,
// "d35"            => $resultsbd->d35,
// "d36"            => $resultsbd->d36,
// "d37"            => $resultsbd->d37,
// "d38"            => $resultsbd->d38,
// "d41"            => $resultsbd->d41,
// "d42"            => $resultsbd->d42,
// "d43"            => $resultsbd->d43,
// "d44"            => $resultsbd->d44,
// "d45"            => $resultsbd->d45,
// "d46"            => $resultsbd->d46,
// "d47"            => $resultsbd->d47,
// "d48"            => $resultsbd->d48,

// "d51"            => $resultsbd->d51,
// "d52"            => $resultsbd->d52,
// "d53"            => $resultsbd->d53,
// "d54"            => $resultsbd->d54,
// "d55"            => $resultsbd->d55,
// "d61"            => $resultsbd->d61,
// "d62"            => $resultsbd->d62,
// "d63"            => $resultsbd->d63,
// "d64"            => $resultsbd->d64,
// "d65"            => $resultsbd->d65,
// "d71"            => $resultsbd->d71,
// "d72"            => $resultsbd->d72,
// "d73"            => $resultsbd->d73,
// "d74"            => $resultsbd->d74,
// "d75"            => $resultsbd->d75,
// "d81"            => $resultsbd->d81,
// "d82"            => $resultsbd->d82,
// "d83"            => $resultsbd->d83,
// "d84"            => $resultsbd->d84,
// "d85"            => $resultsbd->d85
// );
// $pdf->FICHEBUCCO($data);
// }

// $pdf->SUIVIEMEDICAL();
// $pdf->EXAMENMEDICAL();
// $pdf->EXAMENPSYCHO();


// $pdf->AddPage('P','A4');
// $pdf->setRTL(FALSE); 
// $pdf->RoundedRect($x=5, $y=5, $w=200, $h=285, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
// $pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(253, 253, 9);$pdf->Cell(40,10,"DATE",1,0,'C',1,0);$pdf->SetFillColor(152, 245, 255 );$pdf->Cell(35,10,"",1,0,'C',1,0);$pdf->Cell(35,10,"",1,0,'C',1,0);$pdf->Cell(35,10,"",1,0,'C',1,0);$pdf->Cell(35,10,"",1,1,'C',1,0);
// $pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(253, 253, 9);$pdf->Cell(40,10,"AGE",1,0,'C',1,0);$pdf->SetFillColor(152, 245, 255 );$pdf->Cell(35,10,"",1,0,'C',1,0);$pdf->Cell(35,10,"",1,0,'C',1,0);$pdf->Cell(35,10,"",1,0,'C',1,0);$pdf->Cell(35,10,"",1,1,'C',1,0);
// $pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(253, 253, 9);$pdf->Cell(40,10,"POIDS",1,0,'C',1,0);$pdf->SetFillColor(152, 245, 255 );$pdf->Cell(35,10,"",1,0,'C',1,0);$pdf->Cell(35,10,"",1,0,'C',1,0);$pdf->Cell(35,10,"",1,0,'C',1,0);$pdf->Cell(35,10,"",1,1,'C',1,0);


// $pdf->AddPage('P','A4');
// $pdf->setRTL(FALSE); 
// $pdf->RoundedRect($x=5, $y=5, $w=200, $h=285, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
// $pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(253, 253, 9);$pdf->Cell(40,10,"DATE",1,0,'C',1,0);$pdf->SetFillColor(152, 245, 255 );$pdf->Cell(35,10,"",1,0,'C',1,0);$pdf->Cell(35,10,"",1,0,'C',1,0);$pdf->Cell(35,10,"",1,0,'C',1,0);$pdf->Cell(35,10,"",1,1,'C',1,0);
// $pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(253, 253, 9);$pdf->Cell(40,10,"AGE",1,0,'C',1,0);$pdf->SetFillColor(152, 245, 255 );$pdf->Cell(35,10,"",1,0,'C',1,0);$pdf->Cell(35,10,"",1,0,'C',1,0);$pdf->Cell(35,10,"",1,0,'C',1,0);$pdf->Cell(35,10,"",1,1,'C',1,0);
// $pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(253, 253, 9);$pdf->Cell(40,10,"TAILLE",1,0,'C',1,0);$pdf->SetFillColor(152, 245, 255 );$pdf->Cell(35,10,"",1,0,'C',1,0);$pdf->Cell(35,10,"",1,0,'C',1,0);$pdf->Cell(35,10,"",1,0,'C',1,0);$pdf->Cell(35,10,"",1,1,'C',1,0);
$pdf->Output();


}

?>



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
$pdf->SetXY(5,$pdf->GetY()+10);$pdf->Cell(75,6,"وحدة الكشف و المتابعة",0,0,'C');                                  $pdf->Cell(75,6,"Unite de dépistage et de soins",0,1,'C');
$pdf->SetXY(5,$pdf->GetY());   $pdf->Cell(75,6,$pdf->nbrtostring("uds","id",$result->UDS,"udsar"),0,0,'C');       $pdf->Cell(75,6,$pdf->nbrtostring("uds","id",$result->UDS,"uds"),0,1,'C');
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->Cell(75,6,"المؤسسة التربوية",0,0,'C');                                       $pdf->Cell(75,6,"Etablissement scolaire",0,1,'C');
$pdf->SetXY(5,$pdf->GetY());   $pdf->Cell(75,6,$pdf->nbrtostring("ecole","id",$result->ECOLE,"ecolear"),0,0,'C'); $pdf->Cell(75,6,$pdf->nbrtostring("ecole","id",$result->ECOLE,"ecole"),0,1,'C');
$pdf->setRTL(false);
$fichier1="D:wamp/www/sscolaire/public/images/photos/sscolaire/".$result->id.".jpg";
if (file_exists($fichier1))
{
	$pdf->Image($fichier1, $x=10, $y=45, $w=40, $h=40, $type='jpg', $link='', $align='', $resize=false, $dpi=400, $palign='', $ismask=false, $imgmask=false, $border=0, $fitbox=false, $hidden=false, $fitonpage=false, $alt=false, $altimgs=array());

}
else 
{
	if($result->SEX=="M") 
	{
	$pdf->Image("D:wamp/www/sscolaire/public/images/photos/sscolaire/m.jpg", $x=10, $y=45, $w=40, $h=40, $type='png', $link='', $align='', $resize=false, $dpi=400, $palign='', $ismask=false, $imgmask=false, $border=0, $fitbox=false, $hidden=false, $fitonpage=false, $alt=false, $altimgs=array());
	} 
	else 
	{
	$pdf->Image("D:wamp/www/sscolaire/public/images/photos/sscolaire/f.jpg", $x=10, $y=45, $w=40, $h=40, $type='png', $link='', $align='', $resize=false, $dpi=400, $palign='', $ismask=false, $imgmask=false, $border=0, $fitbox=false, $hidden=false, $fitonpage=false, $alt=false, $altimgs=array());
	}
}

$pdf->setRTL(true);

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

$pdf->SetXY(15,$pdf->GetY()+10);  $pdf->SetFillColor(152, 235, 251 );$pdf->Cell(90,10,"Vaccination",1,0,'R',1,0);$pdf->Cell(90,10,"التلقيحات",1,1,'L',1,0);    

$pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(152, 235, 251);$pdf->Cell(20,10,"Age",1,0,'L',1,0);                               $pdf->SetFillColor(200 ); $pdf->Cell(20,10,"BCG",1,0,'C',1,0);               $pdf->SetFillColor(255, 185, 0);  $pdf->Cell(20,10,"HBV",1,0,'C',1,0);               $pdf->SetFillColor(255, 8, 0);$pdf->Cell(20,10,"VPO",1,0,'C',1,0);                $pdf->SetFillColor(8, 255, 0);  $pdf->Cell(20,10,"DTC",1,0,'C',1,0);                $pdf->Cell(20,10,"HIB",1,0,'C',1,0);               $pdf->SetFillColor(255, 0, 0); $pdf->Cell(20,10,"AR",1,0,'C',1,0);                $pdf->SetFillColor(0, 201, 255); $pdf->Cell(20,10,"DTE",1,0,'C',1,0);               $pdf->SetFillColor(0, 131, 167); $pdf->Cell(20,10,"DTA",1,1,'C',1,0);
$pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(152, 235, 251 );$pdf->Cell(20,10,"Naissance",1,0,'L',1,0);                        $pdf->SetFillColor(200 ); $pdf->Cell(20,10,$pdf->vaccin($id,1),1,0,'C',1,0); $pdf->SetFillColor(255, 185, 0);  $pdf->Cell(20,10,$pdf->vaccin($id,2),1,0,'C',1,0); $pdf->SetFillColor(255, 8, 0);$pdf->Cell(20,10,$pdf->vaccin($id,3),1,0,'C',1,0);  $pdf->SetFillColor(240 );       $pdf->Cell(20,10,"",1,0,'C',1,0);                   $pdf->Cell(20,10,"",1,0,'C',1,0);                  $pdf->SetFillColor(240 );      $pdf->Cell(20,10,"",1,0,'C',1,0);                   $pdf->SetFillColor(240 );        $pdf->Cell(20,10,"",1,0,'C',1,0);                  $pdf->SetFillColor(240 );        $pdf->Cell(20,10,"",1,1,'C',1,0); 
$pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(152, 235, 251 );$pdf->Cell(20,10,"1er mois",1,0,'L',1,0);                         $pdf->SetFillColor(240 ); $pdf->Cell(20,10,"",1,0,'C',1,0);                  $pdf->SetFillColor(255, 185, 0);  $pdf->Cell(20,10,$pdf->vaccin($id,4),1,0,'C',1,0); $pdf->SetFillColor(240 );     $pdf->Cell(20,10,"",1,0,'C',1,0);                   $pdf->SetFillColor(240 );       $pdf->Cell(20,10,"",1,0,'C',1,0);                   $pdf->Cell(20,10,"",1,0,'C',1,0);                  $pdf->SetFillColor(240 );      $pdf->Cell(20,10,"",1,0,'C',1,0);                   $pdf->SetFillColor(240 );        $pdf->Cell(20,10,"",1,0,'C',1,0);                  $pdf->SetFillColor(240 );        $pdf->Cell(20,10,"",1,1,'C',1,0); 
$pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(152, 235, 251 );$pdf->Cell(20,10,"3eme mois",1,0,'L',1,0);                        $pdf->SetFillColor(240 ); $pdf->Cell(20,10,"",1,0,'C',1,0);                  $pdf->SetFillColor(240 );         $pdf->Cell(20,10,"",1,0,'C',1,0);                  $pdf->SetFillColor(255, 8, 0);$pdf->Cell(20,10,$pdf->vaccin($id,7),1,0,'C',1,0);  $pdf->SetFillColor(8, 255, 0);  $pdf->Cell(20,10,$pdf->vaccin($id,5),1,0,'C',1,0);  $pdf->Cell(20,10,$pdf->vaccin($id,6),1,0,'C',1,0); $pdf->SetFillColor(240 );      $pdf->Cell(20,10,"",1,0,'C',1,0);                   $pdf->SetFillColor(240 );        $pdf->Cell(20,10,"",1,0,'C',1,0);                  $pdf->SetFillColor(240 );        $pdf->Cell(20,10,"",1,1,'C',1,0); 
$pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(152, 235, 251 );$pdf->Cell(20,10,"4eme mois",1,0,'L',1,0);                        $pdf->SetFillColor(240 ); $pdf->Cell(20,10,"",1,0,'C',1,0);                  $pdf->SetFillColor(240 );         $pdf->Cell(20,10,"",1,0,'C',1,0);                  $pdf->SetFillColor(255, 8, 0);$pdf->Cell(20,10,$pdf->vaccin($id,10),1,0,'C',1,0); $pdf->SetFillColor(8, 255, 0);  $pdf->Cell(20,10,$pdf->vaccin($id,8),1,0,'C',1,0);  $pdf->Cell(20,10,$pdf->vaccin($id,9),1,0,'C',1,0); $pdf->SetFillColor(240 );      $pdf->Cell(20,10,"",1,0,'C',1,0);                   $pdf->SetFillColor(240 );        $pdf->Cell(20,10,"",1,0,'C',1,0);                  $pdf->SetFillColor(240 );        $pdf->Cell(20,10,"",1,1,'C',1,0); 
$pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(152, 235, 251 );$pdf->Cell(20,10,"5eme mois",1,0,'L',1,0);                        $pdf->SetFillColor(240 ); $pdf->Cell(20,10,"",1,0,'C',1,0);                  $pdf->SetFillColor(255, 185, 0);  $pdf->Cell(20,10,$pdf->vaccin($id,13),1,0,'C',1,0);$pdf->SetFillColor(255, 8, 0);$pdf->Cell(20,10,$pdf->vaccin($id,14),1,0,'C',1,0); $pdf->SetFillColor(8, 255, 0);  $pdf->Cell(20,10,$pdf->vaccin($id,11),1,0,'C',1,0); $pdf->Cell(20,10,$pdf->vaccin($id,12),1,0,'C',1,0);$pdf->SetFillColor(240 );      $pdf->Cell(20,10,"",1,0,'C',1,0);                   $pdf->SetFillColor(240 );        $pdf->Cell(20,10,"",1,0,'C',1,0);                  $pdf->SetFillColor(240 );        $pdf->Cell(20,10,"",1,1,'C',1,0); 
$pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(152, 235, 251 );$pdf->Cell(20,10,"9eme mois",1,0,'L',1,0);                        $pdf->SetFillColor(240 ); $pdf->Cell(20,10,"",1,0,'C',1,0);                  $pdf->SetFillColor(240 );         $pdf->Cell(20,10,"",1,0,'C',1,0);                  $pdf->SetFillColor(240 );     $pdf->Cell(20,10,"",1,0,'C',1,0);                   $pdf->SetFillColor(240 );       $pdf->Cell(20,10,"",1,0,'C',1,0);                   $pdf->Cell(20,10,"",1,0,'C',1,0);                  $pdf->SetFillColor(255, 0, 0 );$pdf->Cell(20,10,$pdf->vaccin($id,15),1,0,'C',1,0); $pdf->SetFillColor(240 );        $pdf->Cell(20,10,"",1,0,'C',1,0);                  $pdf->SetFillColor(240 );        $pdf->Cell(20,10,"",1,1,'C',1,0); 
$pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(152, 235, 251 );$pdf->Cell(20,10,"18eme mois",1,0,'L',1,0);                       $pdf->SetFillColor(240 ); $pdf->Cell(20,10,"",1,0,'C',1,0);                  $pdf->SetFillColor(240 );         $pdf->Cell(20,10,"",1,0,'C',1,0);                  $pdf->SetFillColor(255, 8, 0);$pdf->Cell(20,10,$pdf->vaccin($id,18),1,0,'C',1,0); $pdf->SetFillColor(8, 255, 0);  $pdf->Cell(20,10,$pdf->vaccin($id,16),1,0,'C',1,0); $pdf->Cell(20,10,$pdf->vaccin($id,17),1,0,'C',1,0);$pdf->SetFillColor(240 );      $pdf->Cell(20,10,"",1,0,'C',1,0);                   $pdf->SetFillColor(240 );        $pdf->Cell(20,10,"",1,0,'C',1,0);                  $pdf->SetFillColor(240 );        $pdf->Cell(20,10,"",1,1,'C',1,0); 
$pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(152, 235, 251 );$pdf->Cell(20,10,"1ere AP",1,0,'L',1,0);                          $pdf->SetFillColor(240 ); $pdf->Cell(20,10,"",1,0,'C',1,0);                  $pdf->SetFillColor(240 );         $pdf->Cell(20,10,"",1,0,'C',1,0);                  $pdf->SetFillColor(255, 8, 0);$pdf->Cell(20,10,$pdf->vaccin($id,21),1,0,'C',1,0); $pdf->SetFillColor(240 );       $pdf->Cell(20,10,"",1,0,'C',1,0);                   $pdf->Cell(20,10,"",1,0,'C',1,0);                  $pdf->SetFillColor(255, 0, 0); $pdf->Cell(20,10,$pdf->vaccin($id,20),1,0,'C',1,0); $pdf->SetFillColor(0, 201, 255); $pdf->Cell(20,10,$pdf->vaccin($id,19),1,0,'C',1,0); $pdf->SetFillColor(240 );        $pdf->Cell(20,10,"",1,1,'C',1,0); 
$pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(152, 235, 251 );$pdf->Cell(20,10,"1ere AM",1,0,'L',1,0);                          $pdf->SetFillColor(240 ); $pdf->Cell(20,10,"",1,0,'C',1,0);                  $pdf->SetFillColor(240 );         $pdf->Cell(20,10,"",1,0,'C',1,0);                  $pdf->SetFillColor(255, 8, 0);$pdf->Cell(20,10,$pdf->vaccin($id,23),1,0,'C',1,0); $pdf->SetFillColor(240 );       $pdf->Cell(20,10,"",1,0,'C',1,0);                   $pdf->Cell(20,10,"",1,0,'C',1,0);                  $pdf->SetFillColor(240 );      $pdf->Cell(20,10,"",1,0,'C',1,0);                   $pdf->SetFillColor(240 );        $pdf->Cell(20,10,"",1,0,'C',1,0);                  $pdf->SetFillColor(0, 131, 167); $pdf->Cell(20,10,$pdf->vaccin($id,22),1,1,'C',1,0);
$pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(152, 235, 251 );$pdf->Cell(20,10,"1ere AS",1,0,'L',1,0);                          $pdf->SetFillColor(240 ); $pdf->Cell(20,10,"",1,0,'C',1,0);                  $pdf->SetFillColor(240 );         $pdf->Cell(20,10,"",1,0,'C',1,0);                  $pdf->SetFillColor(255, 8, 0);$pdf->Cell(20,10,$pdf->vaccin($id,25),1,0,'C',1,0); $pdf->SetFillColor(240 );       $pdf->Cell(20,10,"",1,0,'C',1,0);                   $pdf->Cell(20,10,"",1,0,'C',1,0);                  $pdf->SetFillColor(240 );      $pdf->Cell(20,10,"",1,0,'C',1,0);                   $pdf->SetFillColor(240 );        $pdf->Cell(20,10,"",1,0,'C',1,0);                  $pdf->SetFillColor(0, 131, 167); $pdf->Cell(20,10,$pdf->vaccin($id,24),1,1,'C',1,0);
$pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(152, 235, 251 );$pdf->Cell(20,10," /10 ans ",1,0,'L',1,0);                        $pdf->SetFillColor(240 ); $pdf->Cell(20,10,"",1,0,'C',1,0);                  $pdf->SetFillColor(240 );         $pdf->Cell(20,10,"",1,0,'C',1,0);                  $pdf->SetFillColor(240 );     $pdf->Cell(20,10,"",1,0,'C',1,0);                   $pdf->SetFillColor(240 );       $pdf->Cell(20,10,"",1,0,'C',1,0);                   $pdf->Cell(20,10,"",1,0,'C',1,0);                  $pdf->SetFillColor(240 );      $pdf->Cell(20,10,"",1,0,'C',1,0);                   $pdf->SetFillColor(240 );        $pdf->Cell(20,10,"",1,0,'C',1,0);                  $pdf->SetFillColor(0, 131, 167); $pdf->Cell(20,10,$pdf->vaccin($id,26),1,1,'C',1,0);

$pdf->SetXY(15,33);$pdf->write1DBarcode($id, 'C39', '', '', '', 18, 0.4, $style, 'N');$pdf->Ln();



$pdf->EXAMENPARA($id,$result->SEX);




$pdf->mysqlconnect();
$querysbd = "select * from examensbd WHERE IDELEVE= '$id' ";
$resultatsbd=mysql_query($querysbd);
while($resultsbd=mysql_fetch_object($resultatsbd))
{
$data=array(
"DATE"           => $resultsbd->DATESBD, 
"CLASSE"         => $resultsbd->NIVEAUS, 
"ID"             => $id,
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



$pdf->mysqlconnect();
$queryemg = "select * from examenemg WHERE IDELEVE= '$id' ";
$resultatemg=mysql_query($queryemg);
while($resultemg=mysql_fetch_object($resultatemg))
{
$data=array(
"DATE"      => $resultemg->DATESBD,
"CLASSE"    => $resultemg->NIVEAUS,
"ID"        => $id,
"OKRDV"     => verif($resultemg->OKRDV,"1"),
"DATECSBD"  => $resultemg->DATECSBD,
"m1"        => verif($resultemg->m1,"1"), 
"m2"        => verif($resultemg->m2,"1"),  
"m3"        => verif($resultemg->m3,"1"),  
"m4"        => verif($resultemg->m4,"1"),  
"m5"        => verif($resultemg->m5,"1"),  
"m6"        => verif($resultemg->m6,"1"),  
"m7"        => verif($resultemg->m7,"1"),  
"m8"        => verif($resultemg->m8,"1"),  
"m9"        => verif($resultemg->m9,"1"),  
"m10"        => verif($resultemg->m10,"1"),  
"m11"        => verif($resultemg->m11,"1"),  
"m12"        => verif($resultemg->m12,"1"),  
"m13"        => verif($resultemg->m13,"1"),  
"m14"        => verif($resultemg->m14,"1"),  
"m15"        => verif($resultemg->m15,"1"),  
"m16"        => verif($resultemg->m16,"1"),  
"m17"        => verif($resultemg->m17,"1"),  
"m18"        => verif($resultemg->m18,"1"),  
"m19"        => verif($resultemg->m19,"1"),  
"m20"        => verif($resultemg->m20,"1"),  
"m21"        => verif($resultemg->m21,"1"), 
"m22"        => verif($resultemg->m22,"1"),  
"m23"        => verif($resultemg->m23,"1"),  
"m24"        => verif($resultemg->m24,"1"),  
"m25"        => verif($resultemg->m25,"1"),  
"m26"        => verif($resultemg->m26,"1"),  
"m27"        => verif($resultemg->m27,"1"),  
"m28"        => verif($resultemg->m28,"1"),  
"m29"        => verif($resultemg->m29,"1"),  
"m30"        => verif($resultemg->m30,"1"),  
"m31"        => verif($resultemg->m31,"1"), 
"m32"        => verif($resultemg->m32,"1"),  
"m33"        => verif($resultemg->m33,"1"),  
"m34"        => verif($resultemg->m34,"1"),  
"m35"        => verif($resultemg->m35,"1"),  
"m36"        => verif($resultemg->m36,"1"),  
"m37"        => verif($resultemg->m37,"1"),  
"m38"        => verif($resultemg->m38,"1"),  
"m39"        => verif($resultemg->m39,"1"),  
"m40"        => verif($resultemg->m40,"1"),  
"m41"        => verif($resultemg->m41,"1"), 
"m42"        => verif($resultemg->m42,"1"),  
"m43"        => verif($resultemg->m43,"1"),  
"m44"        => verif($resultemg->m44,"1"),  
"m45"        => verif($resultemg->m45,"1"),  
"m46"        => verif($resultemg->m46,"1"),  
"m47"        => verif($resultemg->m47,"1"),  
"m48"        => verif($resultemg->m48,"1"),  
"m49"        => verif($resultemg->m49,"1"),  
"m50"        => verif($resultemg->m50,"1"), 
"m51"        => verif($resultemg->m51,"1"), 
"m52"        => verif($resultemg->m52,"1"),  
"m53"        => verif($resultemg->m53,"1"),  
"m54"        => verif($resultemg->m54,"1")  
);
$pdf->EXAMENMEDICAL($data);
}



$pdf->EXAMENPSYCHO(0);// reste a lier avec un data base table



$pdf->mysqlconnect();
$queryemg = "select * from  rdvsscolaire WHERE IDELEVE= '$id' ";
$resultatemg=mysql_query($queryemg);
$num_rows=mysql_num_rows($resultatemg);
$pdf->AddPage('P','A4');
$pdf->setRTL(FALSE); 
$pdf->RoundedRect($x=5, $y=5, $w=200, $h=285, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->SetXY(15,$pdf->GetY()+5); $pdf->SetFillColor(152, 235, 251 );$pdf->Cell(180,10,"SUIVIE MEDICAL",1,0,'C',1,0);  
$pdf->SetXY(15,$pdf->GetY()+15);$pdf->SetFillColor(253, 253, 9 );$pdf->Cell(26,10,"DATE",1,0,'C',1,0);$pdf->Cell(26,10,"PALIER",1,0,'C',1,0);      $pdf->Cell(26,10,"AGE",1,0,'C',1,0); $pdf->Cell(66,10,"RESULTAT ET CONCLUSION D'EXAMENS",1,0,'C',1,0);$pdf->Cell(36,10,"MEDECIN",1,1,'C',1,0);
while($resultsm=mysql_fetch_object($resultatemg))
{
$pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(152, 235, 251 );$pdf->Cell(26,10,$pdf->dateUS2FR($resultsm->DATEEXAMEN),1,0,'C',1,0);$pdf->Cell(26,10,$pdf->nbrtostring("palier","id",$pdf->nbrtostring("eleve","id",$resultsm->IDELEVE,"PALIER"),"nompalier"),1,0,'C',1,0);      $pdf->Cell(26,10,$pdf->dateUS2FR($pdf->nbrtostring("eleve","id",$resultsm->IDELEVE,"DATENS")),1,0,'C',1,0); $pdf->Cell(66,10,"***",1,0,'C',1,0);$pdf->Cell(36,10,$resultsm->PRATICIEN,1,1,'C',1,0);
}
$pdf->SUIVIEMEDICAL($num_rows);
$pdf->Output();
}

?>



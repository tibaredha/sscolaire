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
$query = "select * from uds WHERE  id = '$id'";//
$resultat=mysql_query($query);
while($result=mysql_fetch_object($resultat))
{

$pdf->AddPage('P','A4');
$pdf->setRTL(FALSE); 
$pdf->RoundedRect($x=5, $y=5, $w=200, $h=285, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->SetFont('DejaVuSans','',10);
$pdf->SetXY(15,$pdf->GetY());$pdf->Cell(45,5,"Wilaya : DJELFA",1,0,'L'); $pdf->Cell(45,5,"الولاية: الجلفة",1,0,'R'); $pdf->Cell(45,5,"Commune : ",1,0,'L'); $pdf->Cell(45,5,"البلدية"	,1,1,'R');
$pdf->SetXY(15,$pdf->GetY());$pdf->Cell(45,5,"EPSP : ".$pdf->nbrtostring("structure","id",$result->ids,"structure"),1,0,'L'); $pdf->Cell(45,5,"م. ع. ص .ج : ",1,0,'R'); $pdf->Cell(45,5,"UDS : ".$result->uds,1,0,'L'); $pdf->Cell(45,5,"و. ك. م : ",1,1,'R');
$pdf->SetFont('DejaVuSans','B',14);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->Cell(200,6,"بطاقة تقنية لوحدة الكشف و المتابعة",0,1,'C');
$pdf->SetFont('DejaVuSans','B',14);
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,6,"Fiche technique unité de dépistage et de suivi",0,1,'C');
$pdf->SetXY(5,$pdf->GetY());$pdf->Cell(200,6,"ref IIM N ° 144 DU 24/03/1997",0,1,'C');

// $pdf->RoundedRect($x=15, $y=$pdf->GetY()+5, $w=180, $h=230, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
// $pdf->SetFont('DejaVuSans','',10);
// $pdf->SetXY(15,$pdf->GetY()+5);$pdf->Cell(45,5,"Nom et prénom  : ".$result->NOM.'_'.$result->PRENOM,0,0,'L');                 $pdf->Cell(45,5,"الاسم و اللقب : ",0,0,'R');  $pdf->Cell(45,5,"Prénom du père : ".$result->FILSDE,0,0,'L');  $pdf->Cell(45,5,"اسم الاب : ",0,1,'R');
// $pdf->SetXY(15,$pdf->GetY());  $pdf->Cell(45,5,"Né(e) le  : ".$pdf->dateUS2FR($result->DATENS),0,0,'L');                      $pdf->Cell(45,5,"المولود(ة) في: ",0,0,'R');  $pdf->Cell(45,5,"Commune  : ".$pdf->nbrtostring("com","IDCOM",$result->COMMUNEN,"COMMUNE"),0,0,'L');        $pdf->Cell(45,5,"البلدية : ",0,1,'R');
// $pdf->SetXY(15,$pdf->GetY());  $pdf->Cell(90,5,"Adresse des parents : ".$result->ADRESSE,0,0,'L');                                                                                               $pdf->Cell(90,5,"عنوان الاولياء : ",0,1,'R');
// $pdf->SetXY(15,$pdf->GetY());  $pdf->Cell(45,5,"Profession père  : ",0,0,'L');    $pdf->Cell(45,5,"مهنة الاب : ",0,0,'R');      $pdf->Cell(45,5,"Profession mère : ",0,0,'L'); $pdf->Cell(45,5,"مهنة الام : ",0,1,'R');
$pdf->SetFont('DejaVuSans','',12);
$pdf->SetXY(15,$pdf->GetY()+5); $pdf->Cell(180,6,"1-Locaux",1,1,'L');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(45,6,"Locaux",1,0,'L');             $pdf->Cell(44,6,"Nombre",1,0,'C');$pdf->Cell(44,6,"Surface m2",1,0,'C');$pdf->Cell(47,6,"Aménagement",1,1,'C');

$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(45,6,"Cabinet médical",1,0,'L');    $pdf->Cell(22,6,"1",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"1x12",1,0,'L');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"",1,1,'L');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(45,6,"Vestiaires",1,0,'L');         $pdf->Cell(22,6,"2",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"2x2",1,0,'L');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"",1,1,'L');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(45,6,"Salle paramédicale",1,0,'L'); $pdf->Cell(22,6,"1",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"1x15",1,0,'L');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"",1,1,'L');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(45,6,"Salle d’attente",1,0,'L');    $pdf->Cell(22,6,"1",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"1x25",1,0,'L');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"",1,1,'L');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(45,6,"Blocs sanitaires ",1,0,'L');  $pdf->Cell(22,6,"2",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"2x6",1,0,'L');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"",1,1,'L');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(45,6,"Hall d’entrée",1,0,'L');      $pdf->Cell(22,6,"1",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"1x6",1,0,'L');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"",1,1,'L');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(45,6,"Cabinet dentaire",1,0,'L');   $pdf->Cell(22,6,"1",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"1x15",1,0,'L');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"",1,1,'L');

$pdf->SetXY(15,$pdf->GetY()+5); $pdf->Cell(180,6,"2-Mobilier, matériel et instrumentation médicaux",1,1,'L');
$pdf->SetXY(15,$pdf->GetY()+5); $pdf->Cell(180,6,"2.1-Cabinet médical",1,1,'L');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"Désignation",1,0,'L');                    $pdf->Cell(22,6,"Nbre T",1,0,'L');$pdf->Cell(22,6,"Nbre P",1,0,'L');$pdf->Cell(47,6,"Observation",1,1,'L');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"Bureau",1,0,'L');                         $pdf->Cell(22,6,"2",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"Chaise",1,0,'L');                         $pdf->Cell(22,6,"4",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"Paravent",1,0,'L');                       $pdf->Cell(22,6,"1",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"Classeur métallique",1,0,'L');            $pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"Portemanteaux",1,0,'L');                  $pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"Banc",1,0,'L');                           $pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"Tabouret à vis hauteur variable",1,0,'L');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"Guéridon roulant",1,0,'L');               $pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"armoire métallique",1,0,'L');             $pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"Pèse – personne",1,0,'L');                $pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"Table d’examen",1,0,'L');                 $pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"Toise",1,0,'L');                          $pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"Echelle optométrique",1,0,'L');           $pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"Armoire vitrée à pharmacie",1,0,'L');     $pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"Poupinel P.M",1,0,'L');                   $pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"Escabeau à 2 marches",1,0,'L');           $pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"Sceau à pédale",1,0,'L');                 $pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"Thermomètre",1,0,'L');                    $pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"Tensiomètre pour adulte",1,0,'L');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"Tensiomètre pour enfant",1,0,'L');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"Stéthoscope",1,0,'L');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"Otoscope",1,0,'L');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"Marteau à réflexe",1,0,'L');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"Spéculum nasal",1,0,'L');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"Boite à instruments P.M",1,0,'L');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"Ciseaux droits",1,0,'L');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"Pinces à griffes",1,0,'L');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');

$pdf->AddPage('P','A4');
$pdf->setRTL(FALSE); 
$pdf->RoundedRect($x=5, $y=5, $w=200, $h=285, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->SetFont('DejaVuSans','',12);
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"Désignation",1,0,'L');                    $pdf->Cell(22,6,"Nbre T",1,0,'L');$pdf->Cell(22,6,"Nbre P",1,0,'L');$pdf->Cell(47,6,"Observation",1,1,'L');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"Pinces sans griffes",1,0,'L');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"Tambour",1,0,'L');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"Haricot",1,0,'L');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"Abaisse-langue métallique",1,0,'L');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"Flacon pissette en plastique",1,0,'L');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');

$pdf->SetXY(15,$pdf->GetY()+5); $pdf->Cell(180,6,"2.2-Cabinet Dentaire",1,1,'L');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"Bureau",1,0,'L');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"Chaise",1,0,'L');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"Classeur métallique",1,0,'L');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"Armoire vitrée",1,0,'L');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"Sceau à pédale",1,0,'L');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"Fauteuil dentaire",1,0,'L');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"Unit dentaire",1,0,'L');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"Compresseur d’air",1,0,'L');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"Lampe dentaire (éclairage)",1,0,'L');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"Stérilisateur",1,0,'L');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"Siège opérateur",1,0,'L');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"Meuble dentaire (instruments)",1,0,'L');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"Radio dentaire",1,0,'L');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"Davier pour incisive du haut",1,0,'L');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"Davier pour canine du haut",1,0,'L');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"Davier pour prémolaire du haut",1,0,'L');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"Davier pour molaire du haut",1,0,'L');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"Davier pour molaire du haut",1,0,'L');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"Davier à racines",1,0,'L');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"Davier pour incisive du bas",1,0,'L');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"Davier pour canine du bas",1,0,'L');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"Davier pour prémolaire du bas",1,0,'L');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"Davier pour molaire du bas",1,0,'L');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"Davier pour molaire du bas",1,0,'L');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');

$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"Davier à racines",1,0,'L');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"syndesmotome droit",1,0,'L');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"syndesmotome coudé",1,0,'L');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"élévateur de Bernard",1,0,'L');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"élévateur droit",1,0,'L');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"élévateur américain droit",1,0,'L');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"élévateur américain gauche",1,0,'L');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"Miroir",1,0,'L');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"Excavateur",1,0,'L');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"Sonde",1,0,'L');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"Precelle",1,0,'L');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');


$pdf->AddPage('P','A4');
$pdf->setRTL(FALSE); 
$pdf->RoundedRect($x=5, $y=5, $w=200, $h=285, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->SetFont('DejaVuSans','',12);
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"Désignation",1,0,'L');                    $pdf->Cell(22,6,"Nbre T",1,0,'L');$pdf->Cell(22,6,"Nbre P",1,0,'L');$pdf->Cell(47,6,"Observation",1,1,'L');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"Plateau en inox",1,0,'L');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"Boite de pulpectomie",1,0,'L');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"Seringue métallique",1,0,'L');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"Fraise pour turbine boule",1,0,'L');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"Fraise pour turbine cylindrique",1,0,'L');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"Fraise pour turbine conique",1,0,'L');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"Amalgamateur",1,0,'L');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"Pistolet à amalgame",1,0,'L');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"Matrice",1,0,'L');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"Porte-matrice",1,0,'L');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"Spatule à bouche",1,0,'L');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"Brunissoir",1,0,'L');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"Fouloir",1,0,'L');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"Plaque en verre",1,0,'L');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"Tambour",1,0,'L');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');

$pdf->SetXY(15,$pdf->GetY()+5); $pdf->Cell(180,6,"3-PERSONNEL",1,1,'L');
$pdf->SetXY(15,$pdf->GetY()+5); $pdf->Cell(180,6,"3.1-Personnel médical",1,1,'L');
$pdf->SetXY(15,$pdf->GetY()+5); $pdf->Cell(180,6,"3.2-Personnel Personnel paramédical",1,1,'L');
$pdf->SetXY(15,$pdf->GetY()+5); $pdf->Cell(180,6,"3.3-Personnel spécialisé",1,1,'L');
$pdf->SetXY(15,$pdf->GetY()+5); $pdf->Cell(180,6,"3.3.1-chirurgien-dentiste",1,1,'L');
$pdf->SetXY(15,$pdf->GetY()+5); $pdf->Cell(180,6,"3.3.2-psychologue",1,1,'L');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"",1,0,'L');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"",1,0,'L');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"",1,0,'L');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');
$pdf->SetXY(15,$pdf->GetY()); $pdf->Cell(89,6,"",1,0,'L');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(22,6,"_",1,0,'C');$pdf->Cell(47,6,"_",1,1,'C');

$pdf->AddPage('P','A4');
$pdf->setRTL(FALSE); 
$pdf->RoundedRect($x=5, $y=5, $w=200, $h=285, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->SetFont('DejaVuSans','',12);
$pdf->SetXY(15,$pdf->GetY()+5); $pdf->Cell(180,6,"4-établissements scolaires",1,1,'L');
$pdf->SetXY(15,$pdf->GetY());   $pdf->Cell(89,4,"***",1,0,'L');$pdf->Cell(22,5,"***",1,0,'C');$pdf->Cell(22,5,"***",1,0,'C');$pdf->Cell(47,5,"***",1,0,'C');
$pdf->mysqlconnect();
$query = "SELECT * from ecole where iduds = $result->ids  order by typeecole,ecole";
$resultat=mysql_query($query);
$totalmbr1=mysql_num_rows($resultat);
while($row=mysql_fetch_object($resultat))
{
	$pdf->SetXY(15,$pdf->GetY()+5);$pdf->SetFont('Times','B',7);
	
	$w=15;
	if($row->typeecole==1)
	{
	$pdf->SetFillColor(250);$pdf->cell(89,5,strtoupper($row->ecole),1,0,'L',1,0);$pdf->SetFont('Times','B',10);$pdf->Cell(22,5,"_",1,0,'C');$pdf->Cell(22,5,"_",1,0,'C');$pdf->Cell(47,5,"_",1,0,'C');
	// for($i=1; $i< 7; $i+=1){$pdf->cell($w,5,$pdf->INSCRITSPE($i,$row->id,$datejour1,$datejour2,$UDS),1,0,'C',0,0);}
	// $pdf->cell($w,5,$pdf->TINSCRITSPE($row->id,$datejour1,$datejour2,$UDS),1,0,'C',1,0);
	// for($i=1; $i< 10; $i+=1){$pdf->cell($w,5,"",1,0,'C',1,0);}
	// $pdf->cell($w,5,$pdf->TINSCRITSPE($row->id,$datejour1,$datejour2,$UDS),1,0,'C',1,0);
	$pdf->SetFillColor(230);
	}
	
	if($row->typeecole==2)
	{
	$pdf->SetFillColor(230);$pdf->cell(89,5,strtoupper($row->ecole),1,0,'L',1,0);$pdf->SetFont('Times','B',10);$pdf->Cell(22,5,"_",1,0,'C');$pdf->Cell(22,5,"_",1,0,'C');$pdf->Cell(47,5,"_",1,0,'C');
	// for($i=1; $i< 8; $i+=1){$pdf->cell($w,5,"",1,0,'C',1,0);}
	// $pdf->SetXY(140,$pdf->GetY());
	// for($i=7; $i< 11; $i+=1){$pdf->cell($w,5,$pdf->INSCRITSPE($i,$row->id,$datejour1,$datejour2,$UDS),1,0,'C',0,0);}
	// $pdf->cell($w,5,$pdf->TINSCRITSPE($row->id,$datejour1,$datejour2,$UDS),1,0,'C',1,0);
	// for($i=1; $i< 5; $i+=1){$pdf->cell($w,5,"",1,0,'C',1,0);}
	// $pdf->cell($w,5,$pdf->TINSCRITSPE($row->id,$datejour1,$datejour2,$UDS),1,0,'C',1,0);
	$pdf->SetFillColor(230);
	}
	
	
	if($row->typeecole==3)
	{
	$pdf->SetFillColor(200);$pdf->cell(89,5,strtoupper($row->ecole),1,0,'L',1,0);$pdf->SetFont('Times','B',10);$pdf->Cell(22,5,"_",1,0,'C');$pdf->Cell(22,5,"_",1,0,'C');$pdf->Cell(47,5,"_",1,0,'C');
	// for($i=1; $i< 13; $i+=1){$pdf->cell($w,5,"",1,0,'C',1,0);}
	// $pdf->SetXY(140+75,$pdf->GetY());
	// for($i=11; $i< 14; $i+=1){$pdf->cell($w,5,$pdf->INSCRITSPE($i,$row->id,$datejour1,$datejour2,$UDS),1,0,'C',0,0);}
	// $pdf->cell($w,5,$pdf->TINSCRITSPE($row->id,$datejour1,$datejour2,$UDS),1,0,'C',1,0);
	// $pdf->cell($w,5,$pdf->TINSCRITSPE($row->id,$datejour1,$datejour2,$UDS),1,0,'C',1,0);
	$pdf->SetFillColor(230);
	}
 
	// $pdf->cell($w,5,$pdf->TINSCRITSPE($row->id,$datejour1,$datejour2,$UDS),1,0,'C',1,0);
}





// $pdf->SetXY(15,$pdf->GetY());  $pdf->Cell(22,6,"لا",1,0,'C');   $pdf->Cell(22,6,"نعم",1,0,'C');        $pdf->Cell(136,6,"يأخذ حقن من 15 إلى 20 يوما",1,1,'R');
// $pdf->SetXY(15,$pdf->GetY());  $pdf->Cell(22,6,"لا",1,0,'C');   $pdf->Cell(22,6,"نعم",1,0,'C');        $pdf->Cell(136,6,"نقص جسماني مفاجئ",1,1,'R');
// $pdf->SetXY(15,$pdf->GetY());  $pdf->Cell(22,6,"لا",1,0,'C');   $pdf->Cell(22,6,"نعم",1,0,'C');        $pdf->Cell(136,6,"إضطراب في التنفس",1,1,'R');
// $pdf->SetXY(15,$pdf->GetY());  $pdf->Cell(22,6,"لا",1,0,'C');   $pdf->Cell(22,6,"نعم",1,0,'C');        $pdf->Cell(136,6,"يعاود فقدان الوعي أو يصرع",1,1,'R');
// $pdf->SetXY(15,$pdf->GetY());  $pdf->Cell(22,6,"لا",1,0,'C');   $pdf->Cell(22,6,"نعم",1,0,'C');        $pdf->Cell(136,6,"تشنج عضلي",1,1,'R');
// $pdf->SetXY(15,$pdf->GetY());  $pdf->Cell(22,6,"لا",1,0,'C');   $pdf->Cell(22,6,"نعم",1,0,'C');        $pdf->Cell(136,6,"حالته النفسية مضطربة",1,1,'R');
// $pdf->SetXY(15,$pdf->GetY());  $pdf->Cell(22,6,"لا",1,0,'C');   $pdf->Cell(22,6,"نعم",1,0,'C');        $pdf->Cell(136,6,"مشاغب-منعزل-كثير الهروب من المنزل",1,1,'R');
// $pdf->SetXY(15,$pdf->GetY());  $pdf->Cell(22,6,"لا",1,0,'C');   $pdf->Cell(22,6,"نعم",1,0,'C');        $pdf->Cell(136,6,"صعوبات تعبيرية (التلعثم )",1,1,'R');
// $pdf->SetXY(15,$pdf->GetY());  $pdf->Cell(22,6,"لا",1,0,'C');   $pdf->Cell(22,6,"نعم",1,0,'C');        $pdf->Cell(136,6,"إضطرابات سمعية",1,1,'R');
// $pdf->SetXY(15,$pdf->GetY());  $pdf->Cell(22,6,"لا",1,0,'C');   $pdf->Cell(22,6,"نعم",1,0,'C');        $pdf->Cell(136,6,"نقص في الرؤية",1,1,'R');
// $pdf->SetXY(15,$pdf->GetY());  $pdf->Cell(22,6,"لا",1,0,'C');   $pdf->Cell(22,6,"نعم",1,0,'C');        $pdf->Cell(136,6,"تأخر دراسي",1,1,'R');
// $pdf->SetXY(15,$pdf->GetY());  $pdf->Cell(22,6,"لا",1,0,'C');   $pdf->Cell(22,6,"نعم",1,0,'C');        $pdf->Cell(136,6,"هل تلقى تلقيحا كاملا",1,1,'R');
// $pdf->SetXY(15,$pdf->GetY());  $pdf->Cell(22,6,"لا",1,0,'C');   $pdf->Cell(22,6,"نعم",1,0,'C');        $pdf->Cell(136,6,"سيلان الأنف المستمر",1,1,'R');
// $pdf->SetXY(15,$pdf->GetY());  $pdf->Cell(22,6,"لا",1,0,'C');   $pdf->Cell(22,6,"نعم",1,0,'C');        $pdf->Cell(136,6,"إحمرار مستمر للعين",1,1,'R');
// $pdf->SetXY(15,$pdf->GetY());  $pdf->Cell(22,6,"لا",1,0,'C');   $pdf->Cell(22,6,"نعم",1,0,'C');        $pdf->Cell(136,6,"لاحظتم عنده ديدان باطنية",1,1,'R');
// $pdf->SetXY(15,$pdf->GetY());  $pdf->Cell(22,6,"لا",1,0,'C');   $pdf->Cell(22,6,"نعم",1,0,'C');        $pdf->Cell(136,6,"هل يتبول في الفراش",1,1,'R');
// $pdf->SetXY(15,$pdf->GetY());  $pdf->Cell(22,6,"لا",1,0,'C');   $pdf->Cell(22,6,"نعم",1,0,'C');        $pdf->Cell(136,6,"يحس بألم بقناة التبول أو الإحتياج للتبول الدائم",1,1,'R');
// $pdf->SetXY(15,$pdf->GetY());  $pdf->Cell(22,6,"لا",1,0,'C');   $pdf->Cell(22,6,"نعم",1,0,'C');        $pdf->Cell(136,6,"هل يعاني الطفل من",1,1,'R');
// $pdf->SetXY(15,$pdf->GetY());  $pdf->Cell(22,6,"لا",1,0,'C');   $pdf->Cell(22,6,"نعم",1,0,'C');        $pdf->Cell(136,6,"الروماتيزم",1,1,'R');
// $pdf->SetXY(15,$pdf->GetY());  $pdf->Cell(22,6,"لا",1,0,'C');   $pdf->Cell(22,6,"نعم",1,0,'C');        $pdf->Cell(136,6,"السكر",1,1,'R');
// $pdf->SetXY(15,$pdf->GetY());  $pdf->Cell(22,6,"لا",1,0,'C');   $pdf->Cell(22,6,"نعم",1,0,'C');        $pdf->Cell(136,6,"مرض الربو",1,1,'R');
// $pdf->SetXY(15,$pdf->GetY());  $pdf->Cell(22,6,"لا",1,0,'C');   $pdf->Cell(22,6,"نعم",1,0,'C');        $pdf->Cell(136,6,"الصرع",1,1,'R');
// $pdf->SetXY(15,$pdf->GetY());  $pdf->Cell(180,6,"إذا كان لديه مرض آخر أذكره",1,1,'R');
// $pdf->SetXY(15,$pdf->GetY());  $pdf->Cell(180,6,".....................................",1,1,'R');
// $pdf->SetXY(15,$pdf->GetY());  $pdf->Cell(180,6,".....................................",1,1,'R');
// $pdf->SetXY(15,$pdf->GetY());  $pdf->Cell(180,6,".....................................",1,1,'R');

// $pdf->SetXY(15,$pdf->GetY());  $pdf->Cell(180,6,".....................................",1,1,'R');
$pdf->Output();
}

?>



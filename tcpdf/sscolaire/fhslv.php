<?php
$iduds=$_GET["iduds"];

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
$query = "select * from ecole WHERE iduds = $iduds ";
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
$pdf->SetXY(5,$pdf->GetY()+6);$pdf->Cell(200,6,"Nom de l'EPSP : ",1,0,'L');//.$pdf->nbrtostring("structure","id",$result->ids,"structure").$pdf->nbrtostring("structure","id",$result->ids,"structure")
$pdf->SetXY(5,$pdf->GetY()+6);$pdf->Cell(200,6,"Nom de l'UDS : ".$pdf->nbrtostring("uds","id",$result->iduds,"uds"),1,0,'L');//.$pdf->nbrtostring("uds","id",$result->iduds,"uds")
$pdf->SetXY(5,$pdf->GetY()+6); $pdf->Cell(200,6,"Nom de l'établissement : ".$result->ecole,1,0,'L');
$pdf->SetXY(5,$pdf->GetY()+6); $pdf->Cell(200,6,"Date de la visite : ",1,0,'L');
$pdf->SetXY(5,$pdf->GetY()+6);$pdf->Cell(50,6*8,"CLASSE",1,0,'C');$pdf->Cell(100,6,"Fréquence de néttoyage humide",1,0,'L');             $pdf->Cell(50,6,"",1,0,'C');
$pdf->SetXY(55,$pdf->GetY()+6);                                   $pdf->Cell(100,6,"Propreté noter de 01 a 10 ",1,0,'L');                $pdf->Cell(50,6,"",1,0,'C');
$pdf->SetXY(55,$pdf->GetY()+6);                                   $pdf->Cell(100,6,"Chauffage (modalité) ",1,0,'L');                     $pdf->Cell(50,6,"",1,0,'C');
$pdf->SetXY(55,$pdf->GetY()+6);                                   $pdf->Cell(100,6,"Nombre d'appareils en bonne etat / Total ",1,0,'L'); $pdf->Cell(50,6,"",1,0,'C');
$pdf->SetXY(55,$pdf->GetY()+6);                                   $pdf->Cell(100,6,"Nombre de porte mentaux par classe ",1,0,'L');       $pdf->Cell(50,6,"",1,0,'C');
$pdf->SetXY(55,$pdf->GetY()+6);                                   $pdf->Cell(100,6,"Nombre de carreaux cassées ",1,0,'L');               $pdf->Cell(50,6,"",1,0,'C');
$pdf->SetXY(55,$pdf->GetY()+6);                                   $pdf->Cell(100,6,"Eclairage ",1,0,'L');                                $pdf->Cell(50,6,"",1,0,'C');
$pdf->SetXY(55,$pdf->GetY()+6);                                   $pdf->Cell(100,6,"Distance 1ère table tableau ",1,0,'L');              $pdf->Cell(50,6,"",1,0,'C');

$pdf->SetXY(5,$pdf->GetY()+6);$pdf->Cell(50,6*6,"EAU",1,0,'C');   $pdf->Cell(100,6,"Approvisionnement en eau potable",1,0,'L');          $pdf->Cell(50,6,"",1,0,'C');
$pdf->SetXY(55,$pdf->GetY()+6);                                   $pdf->Cell(100,6,"Traitement  (chaux-javel) fréquence ",1,0,'L');      $pdf->Cell(50,6,"",1,0,'C');
$pdf->SetXY(55,$pdf->GetY()+6);                                   $pdf->Cell(100,6,"Date de prélevemnt  ",1,0,'L');                      $pdf->Cell(50,6,"",1,0,'C');
$pdf->SetXY(55,$pdf->GetY()+6);                                   $pdf->Cell(100,6,"Résultat bacteriologique (colimetrie) ",1,0,'L');    $pdf->Cell(50,6,"",1,0,'C');
$pdf->SetXY(55,$pdf->GetY()+6);                                   $pdf->Cell(100,6,"Controle de la cloration",1,0,'L');                  $pdf->Cell(50,6,"",1,0,'C');
$pdf->SetXY(55,$pdf->GetY()+6);                                   $pdf->Cell(100,6," Evacuation des eaux usées",1,0,'L');                $pdf->Cell(50,6,"",1,0,'C');

$pdf->SetXY(5,$pdf->GetY()+6);$pdf->Cell(50,6,"LAVABOS",1,0,'C'); $pdf->Cell(100,6,"Nombre de robinet fonctionnels / Total",1,0,'L');    $pdf->Cell(50,6,"",1,0,'C');

$pdf->SetXY(5,$pdf->GetY()+6);$pdf->Cell(50,6*4,"TOILETTES",1,0,'C');$pdf->Cell(100,6,"Nombre de cabinets fonctionnels / Total",1,0,'L');$pdf->Cell(50,6,"",1,0,'C');
$pdf->SetXY(55,$pdf->GetY()+6);                                     $pdf->Cell(100,6,"Nombre d'urinoirs",1,0,'L');                       $pdf->Cell(50,6,"",1,0,'C');
$pdf->SetXY(55,$pdf->GetY()+6);                                     $pdf->Cell(100,6,"Désinfection journalière  ",1,0,'L');              $pdf->Cell(50,6,"",1,0,'C');
$pdf->SetXY(55,$pdf->GetY()+6);                                     $pdf->Cell(100,6,"Propreté noter de 01 a 10  ",1,0,'L');             $pdf->Cell(50,6,"",1,0,'C');

$pdf->SetXY(5,$pdf->GetY()+6);$pdf->Cell(50,6*3,"COUR",1,0,'C');   $pdf->Cell(100,6,"Sol",1,0,'L');                                      $pdf->Cell(50,6,"",1,0,'C');
$pdf->SetXY(55,$pdf->GetY()+6);                                     $pdf->Cell(100,6,"Cloture",1,0,'L');                                 $pdf->Cell(50,6,"",1,0,'C');
$pdf->SetXY(55,$pdf->GetY()+6);                                     $pdf->Cell(100,6,"Signalisation routiere  ",1,0,'L');                $pdf->Cell(50,6,"",1,0,'C');

$pdf->SetXY(5,$pdf->GetY()+6);$pdf->Cell(50,6*4,"CUISINE",1,0,'C');$pdf->Cell(100,6,"Etat du sol et des murs",1,0,'L');                   $pdf->Cell(50,6,"",1,0,'C');
$pdf->SetXY(55,$pdf->GetY()+6);                                     $pdf->Cell(100,6,"Lavage journalier noter de 01 a 10",1,0,'L');       $pdf->Cell(50,6,"",1,0,'C');
$pdf->SetXY(55,$pdf->GetY()+6);                                     $pdf->Cell(100,6,"Propreté ustensiles noter de 01 a 10  ",1,0,'L');   $pdf->Cell(50,6,"",1,0,'C');
$pdf->SetXY(55,$pdf->GetY()+6);                                     $pdf->Cell(100,6,"Propreté du personnel  noter de 01 a 10  ",1,0,'L');$pdf->Cell(50,6,"",1,0,'C');

$pdf->SetXY(5,$pdf->GetY()+6);$pdf->Cell(50,6*2,"STOCKAGE DES ALIMENTS",1,0,'C');$pdf->Cell(100,6,"Propreté du local",1,0,'L');                      $pdf->Cell(50,6,"",1,0,'C');
$pdf->SetXY(55,$pdf->GetY()+6);                                                  $pdf->Cell(100,6,"Condition (réfrigérateur-garde manger)",1,0,'L'); $pdf->Cell(50,6,"",1,0,'C');

$pdf->SetXY(5,$pdf->GetY()+6);$pdf->Cell(50,6*4,"REFECTOIRE",1,0,'C');           $pdf->Cell(100,6,"Etat du local",1,0,'L');                          $pdf->Cell(50,6,"",1,0,'C');
$pdf->SetXY(55,$pdf->GetY()+6);                                                  $pdf->Cell(100,6,"Propreté du sol",1,0,'L');                        $pdf->Cell(50,6,"",1,0,'C');
$pdf->SetXY(55,$pdf->GetY()+6);                                                  $pdf->Cell(100,6,"Propreté des tables  ",1,0,'L');                  $pdf->Cell(50,6,"",1,0,'C');
$pdf->SetXY(55,$pdf->GetY()+6);                                                  $pdf->Cell(100,6,"Propreté des couverts  ",1,0,'L');                $pdf->Cell(50,6,"",1,0,'C');

$pdf->SetXY(5,$pdf->GetY()+6);$pdf->Cell(50,6*4,"DORTOIRE",1,0,'C');             $pdf->Cell(100,6,"Propreté des chambres",1,0,'L');                  $pdf->Cell(50,6,"",1,0,'C');
$pdf->SetXY(55,$pdf->GetY()+6);                                                  $pdf->Cell(100,6,"Propreté des toilettes",1,0,'L');                 $pdf->Cell(50,6,"",1,0,'C');
$pdf->SetXY(55,$pdf->GetY()+6);                                                  $pdf->Cell(100,6,"Chauffage  ",1,0,'L');                            $pdf->Cell(50,6,"",1,0,'C');
$pdf->SetXY(55,$pdf->GetY()+6);                                                  $pdf->Cell(100,6,"Espassement des lits  ",1,0,'L');                 $pdf->Cell(50,6,"",1,0,'C');

$pdf->SetXY(5,$pdf->GetY()+6);$pdf->Cell(150,6,"DESINFECTION ET DERATISATION",1,0,'C');$pdf->Cell(50,6,"...",1,0,'C');


}
$pdf->Output();
?>



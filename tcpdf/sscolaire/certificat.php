<?php
$id=$_GET["ideleve"];
// $idfiche=$_GET["idfiche"];
function verif($id,$val){if ($id == $val){return 'Oui';}else{return 'Non';} }
require('sscolaire.php');
$pdf = new sscolaire( 'P', 'mm', 'A4',true,'UTF-8',false );

$pdf->setPrintHeader(false);$pdf->SetAutoPageBreak(TRUE, 0);$pdf->setPrintFooter(false);$pdf->SetFont('DejaVuSans','',8);
$pdf->AddPage('P','A4');
$pdf->setRTL(true); 
$pdf->RoundedRect($x=5, $y=5, $w=200, $h=285, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$pdf->SetFont('aefurat','B',14);
$pdf->SetFillColor(152, 235, 251);
$pdf->SetTextColor(0);
$pdf->SetXY(5,$pdf->GetY()+6);$pdf->Cell(200,6,$pdf->repar,0,0,'C');
$pdf->SetXY(5,$pdf->GetY()+8);$pdf->Cell(200,6,$pdf->mspar,0,0,'C');
$pdf->SetXY(5,$pdf->GetY()+8);$pdf->Cell(200,6,$pdf->dspar.'الجلفة',0,0,'C');
$pdf->SetFont('aefurat','B',24);
$pdf->SetXY(5,$pdf->GetY()+20);$pdf->Cell(200,6,'شهـــــــــادة التلقيح',0,0,'C');
$pdf->SetFont('aefurat','B',14);
$pdf->SetXY(5,$pdf->GetY()+12);$pdf->Cell(200,6,'(للتسجيــــــــل المدرسي *)',0,0,'C');



$pdf->SetFont('aefurat','B',12);
$pdf->mysqlconnect();
$query = "select * from eleve WHERE  id = '$id'";
$resultat=mysql_query($query);
while($result=mysql_fetch_object($resultat))
{
$pdf->SetXY(5,$pdf->GetY()+12);$pdf->Cell(140,6,'انى الممضي اسفله : ',0,0,'R');$pdf->Cell(60,6,'وبعد الاطلاع على  الدفتر الصحي ',0,0,'R');
$pdf->SetXY(5,$pdf->GetY()+12);$pdf->Cell(140,6,'للطفل (ة) : '.$result->NOMAR.' '.$result->PRENOMAR.' ('.$result->FILSDEAR.')' ,0,0,'R');$pdf->Cell(60,6,'المسجل (ة) ببلدية : '.$pdf->nbrtostring("com","IDCOM",$result->COMMUNEN,"communear"),0,0,'R');
$pdf->SetXY(5,$pdf->GetY()+12);$pdf->Cell(140,6,'المولود (ة) في : '.$result->DATENS ,0,0,'R');$pdf->Cell(60,6,'تحت رقم  : '.$result->NEC,0,0,'R');
$pdf->SetXY(5,$pdf->GetY()+12);$pdf->Cell(140,6,'اشهد بانه (ها) لقح (ت) حسب الجدول التالي : ' ,0,0,'R');
$pdf->SetFont('aefurat','B',10);
$pdf->SetXY(15,$pdf->GetY()+15);  $pdf->SetFillColor(152, 235, 251 );$pdf->Cell(90,10,"Vaccination",1,0,'L',1,0);$pdf->Cell(90,10,"التلقيحات",1,1,'R',1,0);    
$pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(152, 235, 251);$pdf->Cell(20,10,"العمر",1,0,'R',1,0);                           $pdf->SetFillColor(200 ); $pdf->Cell(20,10,"BCG",1,0,'C',1,0);               $pdf->SetFillColor(255, 185, 0);  $pdf->Cell(20,10,"HBV",1,0,'C',1,0);               $pdf->SetFillColor(255, 8, 0);$pdf->Cell(20,10,"VPO",1,0,'C',1,0);                $pdf->SetFillColor(8, 255, 0);  $pdf->Cell(20,10,"DTC",1,0,'C',1,0);                $pdf->Cell(20,10,"HIB",1,0,'C',1,0);               $pdf->SetFillColor(255, 0, 0); $pdf->Cell(20,10,"AR",1,0,'C',1,0);                $pdf->SetFillColor(0, 201, 255); $pdf->Cell(20,10,"DTE",1,0,'C',1,0);               $pdf->SetFillColor(0, 131, 167); $pdf->Cell(20,10,"DTA",1,1,'C',1,0);
$pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(152, 235, 251 );$pdf->Cell(20,10,"الميلاد",1,0,'R',1,0);                         $pdf->SetFillColor(200 ); $pdf->Cell(20,10,$pdf->vaccin($id,1),1,0,'C',1,0); $pdf->SetFillColor(255, 185, 0);  $pdf->Cell(20,10,$pdf->vaccin($id,2),1,0,'C',1,0); $pdf->SetFillColor(255, 8, 0);$pdf->Cell(20,10,$pdf->vaccin($id,3),1,0,'C',1,0);  $pdf->SetFillColor(240 );       $pdf->Cell(20,10,"",1,0,'C',1,0);                   $pdf->Cell(20,10,"",1,0,'C',1,0);                  $pdf->SetFillColor(240 );      $pdf->Cell(20,10,"",1,0,'C',1,0);                   $pdf->SetFillColor(240 );        $pdf->Cell(20,10,"",1,0,'C',1,0);                  $pdf->SetFillColor(240 );        $pdf->Cell(20,10,"",1,1,'C',1,0); 
$pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(152, 235, 251 );$pdf->Cell(20,10,"الشهر 01",1,0,'R',1,0);                       $pdf->SetFillColor(240 ); $pdf->Cell(20,10,"",1,0,'C',1,0);                  $pdf->SetFillColor(255, 185, 0);  $pdf->Cell(20,10,$pdf->vaccin($id,4),1,0,'C',1,0); $pdf->SetFillColor(240 );     $pdf->Cell(20,10,"",1,0,'C',1,0);                   $pdf->SetFillColor(240 );       $pdf->Cell(20,10,"",1,0,'C',1,0);                   $pdf->Cell(20,10,"",1,0,'C',1,0);                  $pdf->SetFillColor(240 );      $pdf->Cell(20,10,"",1,0,'C',1,0);                   $pdf->SetFillColor(240 );        $pdf->Cell(20,10,"",1,0,'C',1,0);                  $pdf->SetFillColor(240 );        $pdf->Cell(20,10,"",1,1,'C',1,0); 
$pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(152, 235, 251 );$pdf->Cell(20,10,"الشهر 03",1,0,'R',1,0);                       $pdf->SetFillColor(240 ); $pdf->Cell(20,10,"",1,0,'C',1,0);                  $pdf->SetFillColor(240 );         $pdf->Cell(20,10,"",1,0,'C',1,0);                  $pdf->SetFillColor(255, 8, 0);$pdf->Cell(20,10,$pdf->vaccin($id,7),1,0,'C',1,0);  $pdf->SetFillColor(8, 255, 0);  $pdf->Cell(20,10,$pdf->vaccin($id,5),1,0,'C',1,0);  $pdf->Cell(20,10,$pdf->vaccin($id,6),1,0,'C',1,0); $pdf->SetFillColor(240 );      $pdf->Cell(20,10,"",1,0,'C',1,0);                   $pdf->SetFillColor(240 );        $pdf->Cell(20,10,"",1,0,'C',1,0);                  $pdf->SetFillColor(240 );        $pdf->Cell(20,10,"",1,1,'C',1,0); 
$pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(152, 235, 251 );$pdf->Cell(20,10,"الشهر 04",1,0,'R',1,0);                       $pdf->SetFillColor(240 ); $pdf->Cell(20,10,"",1,0,'C',1,0);                  $pdf->SetFillColor(240 );         $pdf->Cell(20,10,"",1,0,'C',1,0);                  $pdf->SetFillColor(255, 8, 0);$pdf->Cell(20,10,$pdf->vaccin($id,10),1,0,'C',1,0); $pdf->SetFillColor(8, 255, 0);  $pdf->Cell(20,10,$pdf->vaccin($id,8),1,0,'C',1,0);  $pdf->Cell(20,10,$pdf->vaccin($id,9),1,0,'C',1,0); $pdf->SetFillColor(240 );      $pdf->Cell(20,10,"",1,0,'C',1,0);                   $pdf->SetFillColor(240 );        $pdf->Cell(20,10,"",1,0,'C',1,0);                  $pdf->SetFillColor(240 );        $pdf->Cell(20,10,"",1,1,'C',1,0); 
$pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(152, 235, 251 );$pdf->Cell(20,10,"الشهر 05",1,0,'R',1,0);                       $pdf->SetFillColor(240 ); $pdf->Cell(20,10,"",1,0,'C',1,0);                  $pdf->SetFillColor(255, 185, 0);  $pdf->Cell(20,10,$pdf->vaccin($id,13),1,0,'C',1,0);$pdf->SetFillColor(255, 8, 0);$pdf->Cell(20,10,$pdf->vaccin($id,14),1,0,'C',1,0); $pdf->SetFillColor(8, 255, 0);  $pdf->Cell(20,10,$pdf->vaccin($id,11),1,0,'C',1,0); $pdf->Cell(20,10,$pdf->vaccin($id,12),1,0,'C',1,0);$pdf->SetFillColor(240 );      $pdf->Cell(20,10,"",1,0,'C',1,0);                   $pdf->SetFillColor(240 );        $pdf->Cell(20,10,"",1,0,'C',1,0);                  $pdf->SetFillColor(240 );        $pdf->Cell(20,10,"",1,1,'C',1,0); 
$pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(152, 235, 251 );$pdf->Cell(20,10,"الشهر 09",1,0,'R',1,0);                       $pdf->SetFillColor(240 ); $pdf->Cell(20,10,"",1,0,'C',1,0);                  $pdf->SetFillColor(240 );         $pdf->Cell(20,10,"",1,0,'C',1,0);                  $pdf->SetFillColor(240 );     $pdf->Cell(20,10,"",1,0,'C',1,0);                   $pdf->SetFillColor(240 );       $pdf->Cell(20,10,"",1,0,'C',1,0);                   $pdf->Cell(20,10,"",1,0,'C',1,0);                  $pdf->SetFillColor(255, 0, 0 );$pdf->Cell(20,10,$pdf->vaccin($id,15),1,0,'C',1,0); $pdf->SetFillColor(240 );        $pdf->Cell(20,10,"",1,0,'C',1,0);                  $pdf->SetFillColor(240 );        $pdf->Cell(20,10,"",1,1,'C',1,0); 
$pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(152, 235, 251 );$pdf->Cell(20,10,"الشهر 18",1,0,'R',1,0);                       $pdf->SetFillColor(240 ); $pdf->Cell(20,10,"",1,0,'C',1,0);                  $pdf->SetFillColor(240 );         $pdf->Cell(20,10,"",1,0,'C',1,0);                  $pdf->SetFillColor(255, 8, 0);$pdf->Cell(20,10,$pdf->vaccin($id,18),1,0,'C',1,0); $pdf->SetFillColor(8, 255, 0);  $pdf->Cell(20,10,$pdf->vaccin($id,16),1,0,'C',1,0); $pdf->Cell(20,10,$pdf->vaccin($id,17),1,0,'C',1,0);$pdf->SetFillColor(240 );      $pdf->Cell(20,10,"",1,0,'C',1,0);                   $pdf->SetFillColor(240 );        $pdf->Cell(20,10,"",1,0,'C',1,0);                  $pdf->SetFillColor(240 );        $pdf->Cell(20,10,"",1,1,'C',1,0); 
$pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(152, 235, 251 );$pdf->Cell(20,10,"01 ابتدائ",1,0,'R',1,0);                      $pdf->SetFillColor(240 ); $pdf->Cell(20,10,"",1,0,'C',1,0);                  $pdf->SetFillColor(240 );         $pdf->Cell(20,10,"",1,0,'C',1,0);                  $pdf->SetFillColor(255, 8, 0);$pdf->Cell(20,10,$pdf->vaccin($id,21),1,0,'C',1,0); $pdf->SetFillColor(240 );       $pdf->Cell(20,10,"",1,0,'C',1,0);                   $pdf->Cell(20,10,"",1,0,'C',1,0);                  $pdf->SetFillColor(255, 0, 0); $pdf->Cell(20,10,$pdf->vaccin($id,20),1,0,'C',1,0); $pdf->SetFillColor(0, 201, 255); $pdf->Cell(20,10,$pdf->vaccin($id,19),1,0,'C',1,0); $pdf->SetFillColor(240 );        $pdf->Cell(20,10,"",1,1,'C',1,0); 
$pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(152, 235, 251 );$pdf->Cell(20,10,"01 متوسط",1,0,'R',1,0);                       $pdf->SetFillColor(240 ); $pdf->Cell(20,10,"",1,0,'C',1,0);                  $pdf->SetFillColor(240 );         $pdf->Cell(20,10,"",1,0,'C',1,0);                  $pdf->SetFillColor(255, 8, 0);$pdf->Cell(20,10,$pdf->vaccin($id,23),1,0,'C',1,0); $pdf->SetFillColor(240 );       $pdf->Cell(20,10,"",1,0,'C',1,0);                   $pdf->Cell(20,10,"",1,0,'C',1,0);                  $pdf->SetFillColor(240 );      $pdf->Cell(20,10,"",1,0,'C',1,0);                   $pdf->SetFillColor(240 );        $pdf->Cell(20,10,"",1,0,'C',1,0);                  $pdf->SetFillColor(0, 131, 167); $pdf->Cell(20,10,$pdf->vaccin($id,22),1,1,'C',1,0);
$pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(152, 235, 251 );$pdf->Cell(20,10,"01 ثانوي",1,0,'R',1,0);                       $pdf->SetFillColor(240 ); $pdf->Cell(20,10,"",1,0,'C',1,0);                  $pdf->SetFillColor(240 );         $pdf->Cell(20,10,"",1,0,'C',1,0);                  $pdf->SetFillColor(255, 8, 0);$pdf->Cell(20,10,$pdf->vaccin($id,25),1,0,'C',1,0); $pdf->SetFillColor(240 );       $pdf->Cell(20,10,"",1,0,'C',1,0);                   $pdf->Cell(20,10,"",1,0,'C',1,0);                  $pdf->SetFillColor(240 );      $pdf->Cell(20,10,"",1,0,'C',1,0);                   $pdf->SetFillColor(240 );        $pdf->Cell(20,10,"",1,0,'C',1,0);                  $pdf->SetFillColor(0, 131, 167); $pdf->Cell(20,10,$pdf->vaccin($id,24),1,1,'C',1,0);
$pdf->SetXY(15,$pdf->GetY());$pdf->SetFillColor(152, 235, 251 );$pdf->Cell(20,10,"كل 10 سنوات",1,0,'R',1,0);                    $pdf->SetFillColor(240 ); $pdf->Cell(20,10,"",1,0,'C',1,0);                  $pdf->SetFillColor(240 );         $pdf->Cell(20,10,"",1,0,'C',1,0);                  $pdf->SetFillColor(240 );     $pdf->Cell(20,10,"",1,0,'C',1,0);                   $pdf->SetFillColor(240 );       $pdf->Cell(20,10,"",1,0,'C',1,0);                   $pdf->Cell(20,10,"",1,0,'C',1,0);                  $pdf->SetFillColor(240 );      $pdf->Cell(20,10,"",1,0,'C',1,0);                   $pdf->SetFillColor(240 );        $pdf->Cell(20,10,"",1,0,'C',1,0);                  $pdf->SetFillColor(0, 131, 167); $pdf->Cell(20,10,$pdf->vaccin($id,26),1,1,'C',1,0);
$pdf->SetXY(105,$pdf->GetY()+5);$pdf->Cell(50,6,'حرر ب   : ' ,0,0,'R'); $pdf->Cell(50,6,'في : '.date ('Y-m-d') ,0,0,'R');
}
$pdf->Output();




?>



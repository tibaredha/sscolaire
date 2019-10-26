<?php
require('sscolaire.php');
$pdf = new sscolaire('L', 'mm', 'A4');$pdf->AliasNbPages();
$datejour1=$pdf->dateFR2US($_POST['Datedebut']);
$datejour2=$pdf->dateFR2US($_POST['Datefin']);
if ($datejour1>$datejour2 or  $datejour1==$datejour2 ){header("Location: /sscolaire/dashboard/Evaluation/") ;}
$UDS=$_POST['uds'];
$structure=$_POST['structure'];
$login=$_POST['login'];
if ($_POST['ECOLE']==0){$ecole=null;} else {$ecole='='.$_POST['ECOLE'];} 
if ($_POST['PALIER']==0){$palier=null;} else {$palier='='.$_POST['PALIER'];} 




if ($_POST['SS']=='lnm') //liste nominative par medecin uds
{
	$pdf->AddPage('L','A4');$pdf->SetFont('Times','B',10);$pdf->SetFillColor(230);
	$pdf->entetel($UDS,$structure,$datejour1,$datejour2,"Liste nominative des élèves (Médecin) ",$palier);
	$x=45;$w=4.45;$h=42;$y=90;
	$pdf->listeaffection($x,$w,$h,$y);
	$pdf->SetXY(05,$y);
	$pdf->mysqlconnect();
	$query = "SELECT * FROM eleve where UDS=$UDS and ECOLE $ecole and PALIER $palier order by NOM";
	$resultat=mysql_query($query);
	$totalmbr1=mysql_num_rows($resultat);
	while($row=mysql_fetch_object($resultat))
	{	
		$pdf->SetFont('Times','',7);
		$pdf->cell(40,5,$row->NOM.'_'.strtolower($row->PRENOM).'('.strtolower($row->FILSDE).')',1,0,'L',1,0);
		for($i=0; $i< 54; $i+=1){$pdf->cell(4.45,5,'',1,0,'C',0,0);}$pdf->cell(4.45,5,'',1,0,'C',0,0);
		$pdf->SetFont('Times','B',10);
		$pdf->SetXY(5,$pdf->GetY()+5); 
	}
	$pdf->SetXY(05,$pdf->GetY());$pdf->cell(285,5,'Total : '.$totalmbr1.' élèves',1,0,'L',1,0);

}

if ($_POST['SS']=='lnd') //liste nominative dentiste par uds
{

	$pdf->AddPage('L','A4');$pdf->SetFont('Times','B',10);$pdf->SetFillColor(230);
	$pdf->entetel($UDS,$structure,$datejour1,$datejour2,"Liste nominative des élèves (Dentiste) ",$palier);
	$pdf->SetXY(05,$pdf->GetY()+10);$pdf->cell(45,5,'NOM_prénom (fils de)',1,0,'L',1,0);$pdf->cell(15,5,'HYNA',1,0,'C',1,0);$pdf->cell(15,5,'GING',1,0,'C',1,0);$pdf->cell(15,5,'AODF',1,0,'C',1,0);$pdf->cell(26,5,'C',1,0,'C',1,0);$pdf->cell(26,5,'A',1,0,'C',1,0);$pdf->cell(26,5,'O',1,0,'C',1,0);$pdf->cell(26,5,'c',1,0,'C',1,0);$pdf->cell(26,5,'a',1,0,'C',1,0);$pdf->cell(26,5,'o',1,0,'C',1,0);$pdf->cell(21,5,'Date EXA',1,0,'C',1,0);$pdf->cell(21,5,'Date RDV',1,0,'C',1,0);
	$pdf->SetXY(05,$pdf->GetY()+5);
	$pdf->mysqlconnect();
	$query = "SELECT * FROM eleve where UDS=$UDS and ECOLE $ecole and PALIER $palier order by NOM";
	$resultat=mysql_query($query);
	$totalmbr1=mysql_num_rows($resultat);
	while($row=mysql_fetch_object($resultat))
	{
		$pdf->SetFont('Times','',9);
		$pdf->cell(45,5,$row->NOM.'_'.strtolower($row->PRENOM).'('.strtolower($row->FILSDE).')',1,0,'L',1,0);$pdf->cell(15,5,'',1,0,'C',0,0);$pdf->cell(15,5,'',1,0,'C',0,0);$pdf->cell(15,5,'',1,0,'C',0,0);$pdf->cell(26,5,'',1,0,'C',0,0);$pdf->cell(26,5,'',1,0,'C',0,0);$pdf->cell(26,5,'',1,0,'C',0,0);$pdf->cell(26,5,'',1,0,'C',0,0);$pdf->cell(26,5,'',1,0,'C',0,0);$pdf->cell(26,5,'',1,0,'C',0,0);$pdf->cell(21,5,'',1,0,'C',0,0);$pdf->cell(21,5,'',1,0,'C',0,0);
		$pdf->SetFont('Times','B',10);
		$pdf->SetXY(5,$pdf->GetY()+5); 
	}
$pdf->SetXY(05,$pdf->GetY());$pdf->cell(288,5,'Total : '.$totalmbr1.' élèves',1,0,'L',1,0);
}

if ($_POST['SS']=='lnps') //liste nominative psychologue par uds
{
	$pdf->AddPage('L','A4');$pdf->SetFont('Times','B',10);$pdf->SetFillColor(230);
	$pdf->entetel($UDS,$structure,$datejour1,$datejour2,"Liste nominative des élèves (psychologue) ",$palier);
	$pdf->SetXY(05,$pdf->GetY()+10);$pdf->cell(45,5,'NOM_prénom (fils de)',1,0,'L',1,0);$pdf->cell(45,5,'Difficultes scolaire',1,0,'C',1,0);$pdf->cell(45,5,'Trouble du langage',1,0,'C',1,0);$pdf->cell(45,5,'Trouble du comportement',1,0,'C',1,0);$pdf->cell(45,5,'Autres',1,0,'C',1,0);$pdf->cell(31.5,5,'Date EXA',1,0,'C',1,0);$pdf->cell(31.5,5,'Date RDV',1,0,'C',1,0);
	$pdf->SetXY(05,$pdf->GetY()+5);
	$pdf->mysqlconnect();
	$query = "SELECT * FROM eleve where UDS=$UDS and ECOLE $ecole and PALIER $palier order by NOM";
	$resultat=mysql_query($query);
	$totalmbr1=mysql_num_rows($resultat);
	while($row=mysql_fetch_object($resultat))
	{
		$pdf->SetFont('Times','',9);
		$pdf->cell(45,5,$row->NOM.'_'.strtolower($row->PRENOM).'('.strtolower($row->FILSDE).')',1,0,'L',1,0);$pdf->cell(45,5,'',1,0,'C',0,0);$pdf->cell(45,5,'',1,0,'C',0,0);$pdf->cell(45,5,'',1,0,'C',0,0);$pdf->cell(45,5,'',1,0,'C',0,0);$pdf->cell(31.5,5,'',1,0,'C',0,0);$pdf->cell(31.5,5,'',1,0,'C',0,0);
		$pdf->SetFont('Times','B',10);
		$pdf->SetXY(5,$pdf->GetY()+5); 
	}
$pdf->SetXY(05,$pdf->GetY());$pdf->cell(288,5,'Total : '.$totalmbr1.' élèves',1,0,'L',1,0);
}

if ($_POST['SS']=='lnpr') //liste nominative paramedicale par uds
{
	$pdf->AddPage('L','A4');$pdf->SetFont('Times','B',10);$pdf->SetFillColor(230);
	$pdf->entetel($UDS,$structure,$datejour1,$datejour2,"Liste nominative des élèves (Para-médicale) ",$palier);
	$pdf->SetXY(05,$pdf->GetY()+10);$pdf->cell(45,5,'NOM_prénom (fils de)',1,0,'L',1,0);$pdf->cell(30,5,'Poids(kg)',1,0,'C',1,0);$pdf->cell(30,5,'Taille(cm)',1,0,'C',1,0);$pdf->cell(30,5,'L\'acuité visuelle',1,0,'C',1,0);$pdf->cell(30,5,'BCG (fait=x)',1,0,'C',1,0);$pdf->cell(30,5,'DTE/DTA (fait=x)',1,0,'C',1,0);$pdf->cell(30,5,'POLIO (fait=x)',1,0,'C',1,0);$pdf->cell(30,5,'ROR (fait=x)',1,0,'C',1,0);$pdf->cell(33,5,'Date de l\'éxamen',1,0,'C',1,0);
	$pdf->SetXY(05,$pdf->GetY()+5);
	$pdf->mysqlconnect();
	$query = "SELECT * FROM eleve where UDS=$UDS and ECOLE $ecole and PALIER $palier order by NOM";
	$resultat=mysql_query($query);
	$totalmbr1=mysql_num_rows($resultat);
	while($row=mysql_fetch_object($resultat))
	{
		$pdf->SetFont('Times','',9);
		$pdf->cell(45,5,$row->NOM.'_'.strtolower($row->PRENOM).'('.strtolower($row->FILSDE).')',1,0,'L',1,0);$pdf->cell(30,5,'',1,0,'C',0,0);$pdf->cell(30,5,'',1,0,'C',0,0);$pdf->cell(30,5,'',1,0,'C',0,0);$pdf->cell(30,5,'',1,0,'C',0,0);$pdf->cell(30,5,'',1,0,'C',0,0);$pdf->cell(30,5,'',1,0,'C',0,0);$pdf->cell(30,5,'',1,0,'C',0,0);$pdf->cell(33,5,'',1,0,'C',0,0);$pdf->SetFont('Times','B',10);
		$pdf->SetXY(5,$pdf->GetY()+5); 
	}
$pdf->SetXY(05,$pdf->GetY());$pdf->cell(288,5,'Total : '.$totalmbr1.' élèves',1,0,'L',1,0);
}
//effectif par etablissement 
if ($_POST['SS']=='eff') 
{
$pdf->AddPage('L','A4');$pdf->SetFont('Times','B',10);$pdf->SetFillColor(230);
$pdf->entetel($UDS,$structure,$datejour1,$datejour2,"Effectifs des élèves inscrits ",$palier);
$pdf->SetXY(5,$pdf->GetY()+15); $pdf->cell(30,10,"Etablissements",1,0,1,'L',0);$pdf->cell(15,10,"Pré-Scol",1,0,1,'L',0);$pdf->cell(15*6,5,"Cycle Primaire",1,0,1,'L',0);$pdf->cell(15*5,5,"Cycle Moyen",1,0,1,'L',0);$pdf->cell(15*4,5,"Cycle Secondaire",1,0,1,'L',0);$pdf->cell(15,5,"total",1,0,1,'L',0);
$pdf->SetXY(50,$pdf->GetY()+5);                                                                                         $pdf->cell(15,5,"1°AP",1,0,'C',1,0);$pdf->cell(15,5,"2°AP",1,0,'C',1,0);$pdf->cell(15,5,"3°AP",1,0,'C',1,0);$pdf->cell(15,5,"4°AP",1,0,'C',1,0);$pdf->cell(15,5,"5°AP",1,0,'C',1,0);$pdf->cell(15,5,"TAP",1,0,'C',1,0);$pdf->cell(15,5,"1°AM",1,0,'C',1,0);$pdf->cell(15,5,"2°AM",1,0,'C',1,0);$pdf->cell(15,5,"3°AM",1,0,'C',1,0);$pdf->cell(15,5,"4AM",1,0,'C',1,0);$pdf->cell(15,5,"TAM",1,0,'C',1,0);$pdf->cell(15,5,"1°AS",1,0,'C',1,0);$pdf->cell(15,5,"2°AS",1,0,'C',1,0);$pdf->cell(15,5,"3°AS",1,0,'C',1,0);$pdf->cell(15,5,"TAS",1,0,'C',1,0);$pdf->cell(15,5,"TOTAL",1,0,'C',1,0);
$pdf->mysqlconnect();
$query = "SELECT * from ecole where iduds = $UDS  order by typeecole,ecole";
$resultat=mysql_query($query);
$totalmbr1=mysql_num_rows($resultat);
while($row=mysql_fetch_object($resultat))
{
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->SetFont('Times','B',7);
	
	$w=15;
	if($row->typeecole==1)
	{
		$pdf->SetFillColor(250);$pdf->cell(30,5,strtoupper($row->ecole),1,0,'L',1,0);$pdf->SetFont('Times','B',10);
		for($i=1; $i< 7; $i+=1){$pdf->cell($w,5,$pdf->INSCRITSPE($i,$row->id,$datejour1,$datejour2,$UDS),1,0,'C',0,0);}
		$pdf->cell($w,5,$pdf->TINSCRITSPE($row->id,$datejour1,$datejour2,$UDS),1,0,'C',1,0);
		for($i=1; $i< 10; $i+=1){$pdf->cell($w,5,"",1,0,'C',1,0);}
		$pdf->cell($w,5,$pdf->TINSCRITSPE($row->id,$datejour1,$datejour2,$UDS),1,0,'C',1,0);
		$pdf->SetFillColor(230);
	}
	
	if($row->typeecole==2)
	{
		$pdf->SetFillColor(230);$pdf->cell(30,5,strtoupper($row->ecole),1,0,'L',1,0);$pdf->SetFont('Times','B',10);
		for($i=1; $i< 8; $i+=1){$pdf->cell($w,5,"",1,0,'C',1,0);}
		$pdf->SetXY(140,$pdf->GetY());
		for($i=7; $i< 11; $i+=1){$pdf->cell($w,5,$pdf->INSCRITSPE($i,$row->id,$datejour1,$datejour2,$UDS),1,0,'C',0,0);}
		$pdf->cell($w,5,$pdf->TINSCRITSPE($row->id,$datejour1,$datejour2,$UDS),1,0,'C',1,0);
		for($i=1; $i< 5; $i+=1){$pdf->cell($w,5,"",1,0,'C',1,0);}
		$pdf->cell($w,5,$pdf->TINSCRITSPE($row->id,$datejour1,$datejour2,$UDS),1,0,'C',1,0);
		$pdf->SetFillColor(230);
	}
	
	
	if($row->typeecole==3)
	{
		$pdf->SetFillColor(200);$pdf->cell(30,5,strtoupper($row->ecole),1,0,'L',1,0);$pdf->SetFont('Times','B',10);
		for($i=1; $i< 13; $i+=1){$pdf->cell($w,5,"",1,0,'C',1,0);}
		$pdf->SetXY(140+75,$pdf->GetY());
		for($i=11; $i< 14; $i+=1){$pdf->cell($w,5,$pdf->INSCRITSPE($i,$row->id,$datejour1,$datejour2,$UDS),1,0,'C',0,0);}
		$pdf->cell($w,5,$pdf->TINSCRITSPE($row->id,$datejour1,$datejour2,$UDS),1,0,'C',1,0);
		$pdf->cell($w,5,$pdf->TINSCRITSPE($row->id,$datejour1,$datejour2,$UDS),1,0,'C',1,0);
		$pdf->SetFillColor(230);
	}
 
	// $pdf->cell($w,5,$pdf->TINSCRITSPE($row->id,$datejour1,$datejour2,$UDS),1,0,'C',1,0);
}
$pdf->SetXY(5,$pdf->GetY()+5);
$pdf->cell(30,5,"Total",1,0,'C',1,0);
$pdf->cell($w,5,$pdf->TNINSCRITSPE('1',$datejour1,$datejour2,$UDS),1,0,'C',1,0);
for($i=2; $i< 7; $i+=1){$pdf->cell($w,5,$pdf->TNINSCRITSPE($i,$datejour1,$datejour2,$UDS),1,0,'C',1,0);}
$pdf->cell($w,5,"",1,0,'C',1,0);
for($i=7; $i< 11; $i+=1){$pdf->cell($w,5,$pdf->TNINSCRITSPE($i,$datejour1,$datejour2,$UDS),1,0,'C',1,0);}
$pdf->cell($w,5,"",1,0,'C',1,0);
for($i=11; $i< 14; $i+=1){$pdf->cell($w,5,$pdf->TNINSCRITSPE($i,$datejour1,$datejour2,$UDS),1,0,'C',1,0);}
$pdf->cell($w,5,"",1,0,'C',1,0);
$pdf->cell($w,5,"",1,0,'C',1,0);
}
//2-page vms
if ($_POST['SS']=='vms') 
{
$pdf->AddPage('L','A4');$pdf->SetFont('Times','B',10);$pdf->SetFillColor(230);
$pdf->entetel($UDS,$structure,$datejour1,$datejour2,"VISITE MEDICALE SYSTEMATIQUE DE DEPISTAGE ",$palier);

$pdf->SetXY(5,$pdf->GetY()+15); 
$pdf->cell(30,15,"1-Etablissements",1,0,1,'L',0);$pdf->cell(51.2,5,"2-Pré-Scol",1,0,1,'L',0);$pdf->cell(51.2,5,"3-Cycle Primaire",1,0,1,'L',0);$pdf->cell(51.2,5,"4-Cycle Moyen",1,0,1,'L',0);$pdf->cell(51.2,5,"5-Cycle Secondaire",1,0,1,'L',0);$pdf->cell(51.2,5,"6-Tous les Cycles ",1,0,1,'L',0);
$pdf->SetXY(35,$pdf->GetY()+5); $pdf->cell(17.06,5,"Inscrits",1,0,1,'L',0);$pdf->cell(17.06,5,"Examinés",1,0,1,'L',0);$pdf->cell(17.06,5,"%",1,0,1,'L',0);    $pdf->cell(17.06,5,"Inscrits",1,0,1,'L',0);$pdf->cell(17.06,5,"Examinés",1,0,1,'L',0);$pdf->cell(17.06,5,"%",1,0,1,'L',0);    $pdf->cell(17.06,5,"Inscrits",1,0,1,'L',0);$pdf->cell(17.06,5,"Examinés",1,0,1,'L',0);$pdf->cell(17.06,5,"%",1,0,1,'L',0);    $pdf->cell(17.06,5,"Inscrits",1,0,1,'L',0);$pdf->cell(17.06,5,"Examinés",1,0,1,'L',0);$pdf->cell(17.06,5,"%",1,0,1,'L',0);    $pdf->cell(17.06,5,"Inscrits",1,0,1,'L',0);$pdf->cell(17.06,5,"Examinés",1,0,1,'L',0);$pdf->cell(17.06,5,"%",1,0,1,'L',0);
$pdf->SetXY(35,$pdf->GetY()+5); $pdf->cell(17.06,5,"A2",1,0,1,'L',0);      $pdf->cell(17.06,5,"B2",1,0,1,'L',0);      $pdf->cell(17.06,5,"B2/A2",1,0,1,'L',0);$pdf->cell(17.06,5,"C2",1,0,1,'L',0);      $pdf->cell(17.06,5,"D2",1,0,1,'L',0);      $pdf->cell(17.06,5,"D2/C2",1,0,1,'L',0);$pdf->cell(17.06,5,"E2",1,0,1,'L',0);      $pdf->cell(17.06,5,"F2",1,0,1,'L',0);      $pdf->cell(17.06,5,"F2/E2",1,0,1,'L',0);$pdf->cell(17.06,5,"G2",1,0,1,'L',0);      $pdf->cell(17.06,5,"H2",1,0,1,'L',0);      $pdf->cell(17.06,5,"H2/G2",1,0,1,'L',0);$pdf->cell(17.06,5,"I2",1,0,1,'L',0);      $pdf->cell(17.06,5,"J2",1,0,1,'L',0);      $pdf->cell(17.06,5,"J2/I2",1,0,1,'L',0);

$pdf->mysqlconnect();
$query = "SELECT * from ecole where iduds = $UDS  order by typeecole,ecole";
$resultat=mysql_query($query);
$totalmbr1=mysql_num_rows($resultat);
while($row=mysql_fetch_object($resultat))
{
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->SetFont('Times','B',7);
	$w=17.06;
	if($row->typeecole==1)
	{
	$pdf->SetFillColor(250);$pdf->cell(30,5,strtoupper($row->ecole),1,0,'L',1,0);$pdf->SetFont('Times','B',10);
	$pdf->cell($w,5,"",1,0,'C',0,0);
	$pdf->cell($w,5,"",1,0,'C',0,0);
	$pdf->cell($w,5,"",1,0,'C',0,0);
	
	$pdf->cell($w,5,"",1,0,'C',0,0);
	$pdf->cell($w,5,"",1,0,'C',0,0);
	$pdf->cell($w,5,"",1,0,'C',0,0);
	
	$pdf->cell($w,5,"",1,0,'C',1,0);
	$pdf->cell($w,5,"",1,0,'C',1,0);
	$pdf->cell($w,5,"",1,0,'C',1,0);
	
	$pdf->cell($w,5,"",1,0,'C',1,0);
	$pdf->cell($w,5,"",1,0,'C',1,0);
	$pdf->cell($w,5,"",1,0,'C',1,0);
	
	$pdf->cell($w,5,"",1,0,'C',1,0);
	$pdf->cell($w,5,"",1,0,'C',1,0);
	$pdf->cell($w,5,"",1,0,'C',1,0);
	$pdf->SetFillColor(230);
	}
	
	if($row->typeecole==2)
	{
	
	$pdf->SetFillColor(230);$pdf->cell(30,5,strtoupper($row->ecole),1,0,'L',1,0);$pdf->SetFont('Times','B',10);
	$pdf->SetXY(35,$pdf->GetY());
	$pdf->cell($w,5,"",1,0,'C',1,0);
	$pdf->cell($w,5,"",1,0,'C',1,0);
	$pdf->cell($w,5,"",1,0,'C',1,0);
	$pdf->cell($w,5,"",1,0,'C',1,0);
	$pdf->cell($w,5,"",1,0,'C',1,0);
	$pdf->cell($w,5,"",1,0,'C',1,0);
	$pdf->cell($w,5,"",1,0,'C',0,0);
	$pdf->cell($w,5,"",1,0,'C',0,0);
	$pdf->cell($w,5,"",1,0,'C',0,0);
	$pdf->cell($w,5,"",1,0,'C',1,0);
	$pdf->cell($w,5,"",1,0,'C',1,0);
	$pdf->cell($w,5,"",1,0,'C',1,0);
	$pdf->cell($w,5,"",1,0,'C',1,0);
	$pdf->cell($w,5,"",1,0,'C',1,0);
	$pdf->cell($w,5,"",1,0,'C',1,0);
	$pdf->SetFillColor(230);
	}
	
	if($row->typeecole==3)
	{
	$pdf->SetFillColor(200);$pdf->cell(30,5,strtoupper($row->ecole),1,0,'L',1,0);$pdf->SetFont('Times','B',10);
	$pdf->SetXY(35,$pdf->GetY());
	$pdf->cell($w,5,"",1,0,'C',1,0);
	$pdf->cell($w,5,"",1,0,'C',1,0);
	$pdf->cell($w,5,"",1,0,'C',1,0);
	$pdf->cell($w,5,"",1,0,'C',1,0);
	$pdf->cell($w,5,"",1,0,'C',1,0);
	$pdf->cell($w,5,"",1,0,'C',1,0);
	$pdf->cell($w,5,"",1,0,'C',1,0);
	$pdf->cell($w,5,"",1,0,'C',1,0);
	$pdf->cell($w,5,"",1,0,'C',1,0);
	$pdf->cell($w,5,"",1,0,'C',0,0);
	$pdf->cell($w,5,"",1,0,'C',0,0);
	$pdf->cell($w,5,"",1,0,'C',0,0);
	$pdf->cell($w,5,"",1,0,'C',1,0);
	$pdf->cell($w,5,"",1,0,'C',1,0);
	$pdf->cell($w,5,"",1,0,'C',1,0);
	$pdf->SetFillColor(230);
	}
}
$pdf->SetFillColor(250);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->cell(30,5,"total uds",1,0,'L',1,0);$pdf->SetFont('Times','B',10);
$pdf->cell($w,5,"",1,0,'C',1,0);
$pdf->cell($w,5,"",1,0,'C',1,0);
$pdf->cell($w,5,"",1,0,'C',1,0);
$pdf->cell($w,5,"",1,0,'C',1,0);
$pdf->cell($w,5,"",1,0,'C',1,0);
$pdf->cell($w,5,"",1,0,'C',1,0);
$pdf->cell($w,5,"",1,0,'C',1,0);
$pdf->cell($w,5,"",1,0,'C',1,0);
$pdf->cell($w,5,"",1,0,'C',1,0);
$pdf->cell($w,5,"",1,0,'C',1,0);
$pdf->cell($w,5,"",1,0,'C',1,0);
$pdf->cell($w,5,"",1,0,'C',1,0);
$pdf->cell($w,5,"",1,0,'C',1,0);
$pdf->cell($w,5,"",1,0,'C',1,0);
$pdf->cell($w,5,"",1,0,'C',1,0);
}
//3-AFFECTION DEPISTE not verifed yet manque fc()  oriente + pris en charge
if ($_POST['SS']=='amd') 
{
$pdf->AddPage('L','A4');$pdf->SetFont('Times','B',10);$pdf->SetFillColor(230);
$pdf->entetel($UDS,$structure,$datejour1,$datejour2,"AFFECTIONS DEPISTEES ",$palier);
$elevedepiste=$pdf->depiste($UDS,$datejour1,$datejour2);
$pdf->SetXY(5,$pdf->GetY()+15);$pdf->cell(40,15,"Spécialités",1,0,1,'L',0);$pdf->cell(54,5,"Nombre total d'élèves ",1,0,'C',1,0);                         $pdf->cell(64,5,"Cas dépistés",1,0,'C',1,0);                                    $pdf->cell(64,5,"Cas orientés",1,0,'C',1,0);                           $pdf->cell(64,5,"Cas pris en charge",1,0,'C',1,0);
$pdf->SetXY(45,$pdf->GetY()+5);                                            $pdf->cell(54,5,"dépistés ",1,0,'C',1,0);                                      $pdf->cell(32,5,"Nbre",1,0,'C',1,0);$pdf->cell(32,5," %",1,0,'C',1,0);          $pdf->cell(32,5,"Nbre",1,0,'C',1,0);$pdf->cell(32,5," %",1,0,'C',1,0); $pdf->cell(32,5,"Nbre",1,0,'C',1,0);$pdf->cell(32,5," %",1,0,'C',1,0);
$pdf->SetXY(45,$pdf->GetY()+5);                                            $pdf->cell(54,5,"J2 = ".$elevedepiste,1,0,'C',1,0);$pdf->cell(32,5,"B3",1,0,'C',1,0);$pdf->cell(32,5,"B3/J2",1,0,'C',1,0);         $pdf->cell(32,5,"C3",1,0,'C',1,0);  $pdf->cell(32,5,"C3/B3",1,0,'C',1,0); $pdf->cell(32,5,"D3",1,0,'C',1,0);$pdf->cell(32,5,"D3/C3",1,0,'C',1,0);

$datad =array();$datap =array();
$datao =array();$datapo =array();
$datapec =array();$datappec =array();
for ($i = 1; $i <= 54; $i+= 1){
$datad['m'.$i]=$pdf->affection($UDS,'m'.$i,$datejour1,$datejour2);if($elevedepiste!=0) {$datap['m'.$i]=$datad['m'.$i]/$elevedepiste;} else {$datap['m'.$i]=$datad['m'.$i]/1;}
$datao['m'.$i]="0";  if($datad['m'.$i]!=0){$datapo['m'.$i]=$datao['m'.$i]/$datad['m'.$i];} else {$datapo['m'.$i]=$datao['m'.$i]/1;}
$datapec['m'.$i]="0";if($datao['m'.$i]!=0){$datappec['m'.$i]=$datapec['m'.$i]/$datao['m'.$i];} else {$datappec['m'.$i]=$datapec['m'.$i]/1;}
}

$pdf->SetXY(5,$pdf->GetY()+5); 
$pdf->cell(40,20,"01 - CARDIO",1,0,1,'L',0);$pdf->cell(54,5,"HTA",1,0,'L',0,0);                 $pdf->cell(32,5,$datad['m1'],1,0,'C',0,0);$pdf->cell(32,5,$datap['m1'],1,0,'C',0,0);         $pdf->cell(32,5,$datao['m1'],1,0,'C',0,0);$pdf->cell(32,5,$datapo['m1'],1,0,'C',0,0); $pdf->cell(32,5,$datapec['m1'],1,0,'C',0,0);$pdf->cell(32,5,$datappec['m1'],1,0,'C',0,0);
$pdf->SetXY(45,$pdf->GetY()+5);             $pdf->cell(54,5,"Souffle",1,0,'L',0,0);             $pdf->cell(32,5,$datad['m2'],1,0,'C',0,0);$pdf->cell(32,5,$datap['m2'],1,0,'C',0,0);         $pdf->cell(32,5,$datao['m2'],1,0,'C',0,0);$pdf->cell(32,5,$datapo['m2'],1,0,'C',0,0); $pdf->cell(32,5,$datapec['m2'],1,0,'C',0,0);$pdf->cell(32,5,$datappec['m2'],1,0,'C',0,0);
$pdf->SetXY(45,$pdf->GetY()+5);             $pdf->cell(54,5,"Tr .du rythme",1,0,'L',0,0);       $pdf->cell(32,5,$datad['m3'],1,0,'C',0,0);$pdf->cell(32,5,$datap['m3'],1,0,'C',0,0);         $pdf->cell(32,5,$datao['m3'],1,0,'C',0,0);$pdf->cell(32,5,$datapo['m3'],1,0,'C',0,0); $pdf->cell(32,5,$datapec['m3'],1,0,'C',0,0);$pdf->cell(32,5,$datappec['m3'],1,0,'C',0,0);
$pdf->SetXY(45,$pdf->GetY()+5);             $pdf->cell(54,5,"Autres",1,0,'L',0,0);              $pdf->cell(32,5,$datad['m6'],1,0,'C',0,0);$pdf->cell(32,5,$datap['m6'],1,0,'C',0,0);         $pdf->cell(32,5,$datao['m4'],1,0,'C',0,0);$pdf->cell(32,5,$datapo['m4'],1,0,'C',0,0); $pdf->cell(32,5,$datapec['m4'],1,0,'C',0,0);$pdf->cell(32,5,$datappec['m4'],1,0,'C',0,0);

$pdf->SetXY(5,$pdf->GetY()+5); 
$pdf->cell(40,30,"02 -DERMATO",1,0,1,'L',0);$pdf->cell(54,5,"Dermatite atopique",1,0,'L',0,0);   $pdf->cell(32,5,$datad['m7'],1,0,'C',0,0);$pdf->cell(32,5,$datap['m7'],1,0,'C',0,0);        $pdf->cell(32,5,$datao['m7'],1,0,'C',0,0);$pdf->cell(32,5,$datapo['m7'],1,0,'C',0,0); $pdf->cell(32,5,$datapec['m7'],1,0,'C',0,0);$pdf->cell(32,5,$datappec['m7'],1,0,'C',0,0);
$pdf->SetXY(45,$pdf->GetY()+5);             $pdf->cell(54,5,"Gale",1,0,'L',0,0);                 $pdf->cell(32,5,$datad['m8'],1,0,'C',0,0);$pdf->cell(32,5,$datap['m8'],1,0,'C',0,0);        $pdf->cell(32,5,$datao['m8'],1,0,'C',0,0);$pdf->cell(32,5,$datapo['m8'],1,0,'C',0,0); $pdf->cell(32,5,$datapec['m8'],1,0,'C',0,0);$pdf->cell(32,5,$datappec['m8'],1,0,'C',0,0);
$pdf->SetXY(45,$pdf->GetY()+5);             $pdf->cell(54,5,"Pédiculose",1,0,'L',0,0);           $pdf->cell(32,5,$datad['m9'],1,0,'C',0,0);$pdf->cell(32,5,$datap['m9'],1,0,'C',0,0);        $pdf->cell(32,5,$datao['m9'],1,0,'C',0,0);$pdf->cell(32,5,$datapo['m9'],1,0,'C',0,0); $pdf->cell(32,5,$datapec['m9'],1,0,'C',0,0);$pdf->cell(32,5,$datappec['m9'],1,0,'C',0,0);
$pdf->SetXY(45,$pdf->GetY()+5);             $pdf->cell(54,5,"Psoriasis",1,0,'L',0,0);            $pdf->cell(32,5,$datad['m10'],1,0,'C',0,0);$pdf->cell(32,5,$datap['m10'],1,0,'C',0,0);      $pdf->cell(32,5,$datao['m10'],1,0,'C',0,0);$pdf->cell(32,5,$datapo['m10'],1,0,'C',0,0); $pdf->cell(32,5,$datapec['m10'],1,0,'C',0,0);$pdf->cell(32,5,$datappec['m10'],1,0,'C',0,0);
$pdf->SetXY(45,$pdf->GetY()+5);             $pdf->cell(54,5,"Teigne",1,0,'L',0,0);               $pdf->cell(32,5,$datad['m11'],1,0,'C',0,0);$pdf->cell(32,5,$datap['m11'],1,0,'C',0,0);      $pdf->cell(32,5,$datao['m11'],1,0,'C',0,0);$pdf->cell(32,5,$datapo['m11'],1,0,'C',0,0); $pdf->cell(32,5,$datapec['m11'],1,0,'C',0,0);$pdf->cell(32,5,$datappec['m11'],1,0,'C',0,0);
$pdf->SetXY(45,$pdf->GetY()+5);             $pdf->cell(54,5,"Autres",1,0,'L',0,0);               $pdf->cell(32,5,$datad['m12'],1,0,'C',0,0);$pdf->cell(32,5,$datap['m12'],1,0,'C',0,0);      $pdf->cell(32,5,$datao['m12'],1,0,'C',0,0);$pdf->cell(32,5,$datapo['m12'],1,0,'C',0,0); $pdf->cell(32,5,$datapec['m12'],1,0,'C',0,0);$pdf->cell(32,5,$datappec['m12'],1,0,'C',0,0);


$pdf->SetXY(5,$pdf->GetY()+5); 
$pdf->cell(40,20,"03 -ENDOCRINO",1,0,1,'L',0);$pdf->cell(54,5,"Obésité",1,0,'L',0,0);            $pdf->cell(32,5,$datad['m13'],1,0,'C',0,0);$pdf->cell(32,5,$datap['m13'],1,0,'C',0,0);     $pdf->cell(32,5,$datao['m13'],1,0,'C',0,0);$pdf->cell(32,5,$datapo['m13'],1,0,'C',0,0); $pdf->cell(32,5,$datapec['m13'],1,0,'C',0,0);$pdf->cell(32,5,$datappec['m13'],1,0,'C',0,0);
$pdf->SetXY(45,$pdf->GetY()+5);               $pdf->cell(54,5,"Retard stat. Pond",1,0,'L',0,0);  $pdf->cell(32,5,$datad['m14'],1,0,'C',0,0);$pdf->cell(32,5,$datap['m14'],1,0,'C',0,0);     $pdf->cell(32,5,$datao['m14'],1,0,'C',0,0);$pdf->cell(32,5,$datapo['m14'],1,0,'C',0,0); $pdf->cell(32,5,$datapec['m14'],1,0,'C',0,0);$pdf->cell(32,5,$datappec['m14'],1,0,'C',0,0);
$pdf->SetXY(45,$pdf->GetY()+5);               $pdf->cell(54,5,"Surpoid",1,0,'L',0,0);            $pdf->cell(32,5,$datad['m15'],1,0,'C',0,0);$pdf->cell(32,5,$datap['m15'],1,0,'C',0,0);     $pdf->cell(32,5,$datao['m15'],1,0,'C',0,0);$pdf->cell(32,5,$datapo['m15'],1,0,'C',0,0); $pdf->cell(32,5,$datapec['m15'],1,0,'C',0,0);$pdf->cell(32,5,$datappec['m15'],1,0,'C',0,0);
$pdf->SetXY(45,$pdf->GetY()+5);               $pdf->cell(54,5,"Autres",1,0,'L',0,0);             $pdf->cell(32,5,$datad['m18'],1,0,'C',0,0);$pdf->cell(32,5,$datap['m18'],1,0,'C',0,0);     $pdf->cell(32,5,$datao['m18'],1,0,'C',0,0);$pdf->cell(32,5,$datapo['m18'],1,0,'C',0,0); $pdf->cell(32,5,$datapec['m18'],1,0,'C',0,0);$pdf->cell(32,5,$datappec['m18'],1,0,'C',0,0);

$pdf->SetXY(5,$pdf->GetY()+5); 
$pdf->cell(40,15,"04 -GASTRO",1,0,1,'L',0); $pdf->cell(54,5,"Oxyurose",1,0,'L',0,0);             $pdf->cell(32,5,$datad['m19'],1,0,'C',0,0);$pdf->cell(32,5,$datap['m19'],1,0,'C',0,0);     $pdf->cell(32,5,$datao['m19'],1,0,'C',0,0);$pdf->cell(32,5,$datapo['m19'],1,0,'C',0,0); $pdf->cell(32,5,$datapec['m19'],1,0,'C',0,0);$pdf->cell(32,5,$datappec['m19'],1,0,'C',0,0);
$pdf->SetXY(45,$pdf->GetY()+5);             $pdf->cell(54,5,"Les hernies ",1,0,'L',0,0);         $pdf->cell(32,5,$datad['m20'],1,0,'C',0,0);$pdf->cell(32,5,$datap['m20'],1,0,'C',0,0);     $pdf->cell(32,5,$datao['m20'],1,0,'C',0,0);$pdf->cell(32,5,$datapo['m20'],1,0,'C',0,0); $pdf->cell(32,5,$datapec['m20'],1,0,'C',0,0);$pdf->cell(32,5,$datappec['m20'],1,0,'C',0,0);
$pdf->SetXY(45,$pdf->GetY()+5);             $pdf->cell(54,5,"Autres",1,0,'L',0,0);               $pdf->cell(32,5,$datad['m22'],1,0,'C',0,0);$pdf->cell(32,5,$datap['m22'],1,0,'C',0,0);     $pdf->cell(32,5,$datao['m22'],1,0,'C',0,0);$pdf->cell(32,5,$datapo['m22'],1,0,'C',0,0); $pdf->cell(32,5,$datapec['m22'],1,0,'C',0,0);$pdf->cell(32,5,$datappec['m22'],1,0,'C',0,0);

$pdf->SetXY(5,$pdf->GetY()+5); 
$pdf->cell(40,10,"05 -HEMATO",1,0,1,'L',0); $pdf->cell(54,5,"Paleur cut. muque",1,0,'L',0,0);    $pdf->cell(32,5,$datad['m23'],1,0,'C',0,0);$pdf->cell(32,5,$datap['m23'],1,0,'C',0,0);     $pdf->cell(32,5,$datao['m23'],1,0,'C',0,0);$pdf->cell(32,5,$datapo['m23'],1,0,'C',0,0); $pdf->cell(32,5,$datapec['m23'],1,0,'C',0,0);$pdf->cell(32,5,$datappec['m23'],1,0,'C',0,0);
$pdf->SetXY(45,$pdf->GetY()+5);             $pdf->cell(54,5,"Autres",1,0,'L',0,0);               $pdf->cell(32,5,$datad['m26'],1,0,'C',0,0);$pdf->cell(32,5,$datap['m26'],1,0,'C',0,0);     $pdf->cell(32,5,$datao['m26'],1,0,'C',0,0);$pdf->cell(32,5,$datapo['m26'],1,0,'C',0,0); $pdf->cell(32,5,$datapec['m26'],1,0,'C',0,0);$pdf->cell(32,5,$datappec['m26'],1,0,'C',0,0);

$pdf->SetXY(5,$pdf->GetY()+5); 
$pdf->cell(40,30,"06 -OPHTALMO",1,0,1,'L',0);$pdf->cell(54,5,"Baisse acuité vis.",1,0,'L',0,0);  $pdf->cell(32,5,$datad['m27'],1,0,'C',0,0);$pdf->cell(32,5,$datap['m27'],1,0,'C',0,0);    $pdf->cell(32,5,$datao['m27'],1,0,'C',0,0);$pdf->cell(32,5,$datapo['m27'],1,0,'C',0,0); $pdf->cell(32,5,$datapec['m27'],1,0,'C',0,0);$pdf->cell(32,5,$datappec['m27'],1,0,'C',0,0);
$pdf->SetXY(45,$pdf->GetY()+5);             $pdf->cell(54,5,"Nystagmus",1,0,'L',0,0);            $pdf->cell(32,5,$datad['m28'],1,0,'C',0,0);$pdf->cell(32,5,$datap['m28'],1,0,'C',0,0);    $pdf->cell(32,5,$datao['m28'],1,0,'C',0,0);$pdf->cell(32,5,$datapo['m28'],1,0,'C',0,0); $pdf->cell(32,5,$datapec['m28'],1,0,'C',0,0);$pdf->cell(32,5,$datappec['m28'],1,0,'C',0,0);
$pdf->SetXY(45,$pdf->GetY()+5);             $pdf->cell(54,5,"Ptosis",1,0,'L',0,0);               $pdf->cell(32,5,$datad['m29'],1,0,'C',0,0);$pdf->cell(32,5,$datap['m29'],1,0,'C',0,0);    $pdf->cell(32,5,$datao['m29'],1,0,'C',0,0);$pdf->cell(32,5,$datapo['m29'],1,0,'C',0,0); $pdf->cell(32,5,$datapec['m29'],1,0,'C',0,0);$pdf->cell(32,5,$datappec['m29'],1,0,'C',0,0);
$pdf->SetXY(45,$pdf->GetY()+5);             $pdf->cell(54,5,"Strabisme",1,0,'L',0,0);            $pdf->cell(32,5,$datad['m30'],1,0,'C',0,0);$pdf->cell(32,5,$datap['m30'],1,0,'C',0,0);    $pdf->cell(32,5,$datao['m30'],1,0,'C',0,0);$pdf->cell(32,5,$datapo['m30'],1,0,'C',0,0); $pdf->cell(32,5,$datapec['m30'],1,0,'C',0,0);$pdf->cell(32,5,$datappec['m30'],1,0,'C',0,0);
$pdf->SetXY(45,$pdf->GetY()+5);             $pdf->cell(54,5,"Trachome",1,0,'L',0,0);             $pdf->cell(32,5,$datad['m31'],1,0,'C',0,0);$pdf->cell(32,5,$datap['m31'],1,0,'C',0,0);    $pdf->cell(32,5,$datao['m31'],1,0,'C',0,0);$pdf->cell(32,5,$datapo['m31'],1,0,'C',0,0); $pdf->cell(32,5,$datapec['m31'],1,0,'C',0,0);$pdf->cell(32,5,$datappec['m31'],1,0,'C',0,0);
$pdf->SetXY(45,$pdf->GetY()+5);             $pdf->cell(54,5,"Autres",1,0,'L',0,0);               $pdf->cell(32,5,$datad['m32'],1,0,'C',0,0);$pdf->cell(32,5,$datap['m32'],1,0,'C',0,0);    $pdf->cell(32,5,$datao['m32'],1,0,'C',0,0);$pdf->cell(32,5,$datapo['m32'],1,0,'C',0,0); $pdf->cell(32,5,$datapec['m32'],1,0,'C',0,0);$pdf->cell(32,5,$datappec['m32'],1,0,'C',0,0);

$pdf->SetXY(5,$pdf->GetY()+5); 
$pdf->cell(40,20,"07 -ORL",1,0,1,'L',0);    $pdf->cell(54,5,"Hypoacousie",1,0,'L',0,0);          $pdf->cell(32,5,$datad['m33'],1,0,'C',0,0);$pdf->cell(32,5,$datap['m33'],1,0,'C',0,0);    $pdf->cell(32,5,$datao['m33'],1,0,'C',0,0);$pdf->cell(32,5,$datapo['m33'],1,0,'C',0,0); $pdf->cell(32,5,$datapec['m33'],1,0,'C',0,0);$pdf->cell(32,5,$datappec['m33'],1,0,'C',0,0);
$pdf->SetXY(45,$pdf->GetY()+5);             $pdf->cell(54,5,"Rhinite allergique",1,0,'L',0,0);   $pdf->cell(32,5,$datad['m34'],1,0,'C',0,0);$pdf->cell(32,5,$datap['m34'],1,0,'C',0,0);    $pdf->cell(32,5,$datao['m34'],1,0,'C',0,0);$pdf->cell(32,5,$datapo['m34'],1,0,'C',0,0); $pdf->cell(32,5,$datapec['m34'],1,0,'C',0,0);$pdf->cell(32,5,$datappec['m34'],1,0,'C',0,0);
$pdf->SetXY(45,$pdf->GetY()+5);             $pdf->cell(54,5,"Surdité ",1,0,'L',0,0);             $pdf->cell(32,5,$datad['m35'],1,0,'C',0,0);$pdf->cell(32,5,$datap['m35'],1,0,'C',0,0);    $pdf->cell(32,5,$datao['m35'],1,0,'C',0,0);$pdf->cell(32,5,$datapo['m35'],1,0,'C',0,0); $pdf->cell(32,5,$datapec['m35'],1,0,'C',0,0);$pdf->cell(32,5,$datappec['m35'],1,0,'C',0,0);
$pdf->SetXY(45,$pdf->GetY()+5);             $pdf->cell(54,5,"Autres",1,0,'L',0,0);               $pdf->cell(32,5,$datad['m37'],1,0,'C',0,0);$pdf->cell(32,5,$datap['m37'],1,0,'C',0,0);    $pdf->cell(32,5,$datao['m37'],1,0,'C',0,0);$pdf->cell(32,5,$datapo['m37'],1,0,'C',0,0); $pdf->cell(32,5,$datapec['m37'],1,0,'C',0,0);$pdf->cell(32,5,$datappec['m37'],1,0,'C',0,0);

$pdf->SetXY(5,$pdf->GetY()+5); 
$pdf->cell(40,20,"08 -ORTHOPEDIE",1,0,1,'L',0); $pdf->cell(54,5,"Cypho-scoliose",1,0,'L',0,0);   $pdf->cell(32,5,$datad['m38'],1,0,'C',0,0);$pdf->cell(32,5,$datap['m38'],1,0,'C',0,0);   $pdf->cell(32,5,$datao['m38'],1,0,'C',0,0);$pdf->cell(32,5,$datapo['m38'],1,0,'C',0,0); $pdf->cell(32,5,$datapec['m38'],1,0,'C',0,0);$pdf->cell(32,5,$datappec['m38'],1,0,'C',0,0);
$pdf->SetXY(45,$pdf->GetY()+5);                 $pdf->cell(54,5,"Déform.squel.",1,0,'L',0,0);    $pdf->cell(32,5,$datad['m39'],1,0,'C',0,0);$pdf->cell(32,5,$datap['m39'],1,0,'C',0,0);   $pdf->cell(32,5,$datao['m39'],1,0,'C',0,0);$pdf->cell(32,5,$datapo['m39'],1,0,'C',0,0); $pdf->cell(32,5,$datapec['m39'],1,0,'C',0,0);$pdf->cell(32,5,$datappec['m39'],1,0,'C',0,0);
$pdf->SetXY(45,$pdf->GetY()+5);                 $pdf->cell(54,5,"Scoliose ",1,0,'L',0,0);        $pdf->cell(32,5,$datad['m40'],1,0,'C',0,0);$pdf->cell(32,5,$datap['m40'],1,0,'C',0,0);   $pdf->cell(32,5,$datao['m40'],1,0,'C',0,0);$pdf->cell(32,5,$datapo['m40'],1,0,'C',0,0); $pdf->cell(32,5,$datapec['m40'],1,0,'C',0,0);$pdf->cell(32,5,$datappec['m40'],1,0,'C',0,0);
$pdf->SetXY(45,$pdf->GetY()+5);                 $pdf->cell(54,5,"Autres",1,0,'L',0,0);           $pdf->cell(32,5,$datad['m41'],1,0,'C',0,0);$pdf->cell(32,5,$datap['m41'],1,0,'C',0,0);   $pdf->cell(32,5,$datao['m41'],1,0,'C',0,0);$pdf->cell(32,5,$datapo['m41'],1,0,'C',0,0); $pdf->cell(32,5,$datapec['m41'],1,0,'C',0,0);$pdf->cell(32,5,$datappec['m41'],1,0,'C',0,0);


$pdf->SetXY(5,$pdf->GetY()+5); 
$pdf->cell(40,10,"09 -PNEUMO",1,0,1,'L',0); $pdf->cell(54,5,"Asthme",1,0,'L',0,0);               $pdf->cell(32,5,$datad['m42'],1,0,'C',0,0);$pdf->cell(32,5,$datap['m42'],1,0,'C',0,0);   $pdf->cell(32,5,$datao['m42'],1,0,'C',0,0);$pdf->cell(32,5,$datapo['m42'],1,0,'C',0,0); $pdf->cell(32,5,$datapec['m42'],1,0,'C',0,0);$pdf->cell(32,5,$datappec['m42'],1,0,'C',0,0);
$pdf->SetXY(45,$pdf->GetY()+5);             $pdf->cell(54,5,"Autres",1,0,'L',0,0);               $pdf->cell(32,5,$datad['m45'],1,0,'C',0,0);$pdf->cell(32,5,$datap['m45'],1,0,'C',0,0);   $pdf->cell(32,5,$datao['m45'],1,0,'C',0,0);$pdf->cell(32,5,$datapo['m45'],1,0,'C',0,0); $pdf->cell(32,5,$datapec['m45'],1,0,'C',0,0);$pdf->cell(32,5,$datappec['m45'],1,0,'C',0,0);

$pdf->SetXY(5,$pdf->GetY()+5); 
$pdf->cell(40,20,"10 -PSYCHO",1,0,1,'L',0); $pdf->cell(54,5,"Diffucultés scolaires",1,0,'L',0,0);$pdf->cell(32,5,$datad['m46'],1,0,'C',0,0);$pdf->cell(32,5,$datap['m46'],1,0,'C',0,0);   $pdf->cell(32,5,$datao['m46'],1,0,'C',0,0);$pdf->cell(32,5,$datapo['m46'],1,0,'C',0,0); $pdf->cell(32,5,$datapec['m46'],1,0,'C',0,0);$pdf->cell(32,5,$datappec['m46'],1,0,'C',0,0);
$pdf->SetXY(45,$pdf->GetY()+5);             $pdf->cell(54,5,"Tr.du comport.",1,0,'L',0,0);       $pdf->cell(32,5,$datad['m47'],1,0,'C',0,0);$pdf->cell(32,5,$datap['m47'],1,0,'C',0,0);   $pdf->cell(32,5,$datao['m47'],1,0,'C',0,0);$pdf->cell(32,5,$datapo['m47'],1,0,'C',0,0); $pdf->cell(32,5,$datapec['m47'],1,0,'C',0,0);$pdf->cell(32,5,$datappec['m47'],1,0,'C',0,0);
$pdf->SetXY(45,$pdf->GetY()+5);             $pdf->cell(54,5,"Tr. Du langage.",1,0,'L',0,0);      $pdf->cell(32,5,$datad['m48'],1,0,'C',0,0);$pdf->cell(32,5,$datap['m48'],1,0,'C',0,0);   $pdf->cell(32,5,$datao['m48'],1,0,'C',0,0);$pdf->cell(32,5,$datapo['m48'],1,0,'C',0,0); $pdf->cell(32,5,$datapec['m48'],1,0,'C',0,0);$pdf->cell(32,5,$datappec['m48'],1,0,'C',0,0);
$pdf->SetXY(45,$pdf->GetY()+5);             $pdf->cell(54,5,"Autres.",1,0,'L',0,0);              $pdf->cell(32,5,$datad['m49'],1,0,'C',0,0);$pdf->cell(32,5,$datap['m49'],1,0,'C',0,0);   $pdf->cell(32,5,$datao['m49'],1,0,'C',0,0);$pdf->cell(32,5,$datapo['m49'],1,0,'C',0,0); $pdf->cell(32,5,$datapec['m49'],1,0,'C',0,0);$pdf->cell(32,5,$datappec['m49'],1,0,'C',0,0);

$pdf->SetXY(5,$pdf->GetY()+5); 
$pdf->cell(40,20,"11 -URO - NEPHRO",1,0,1,'L',0); $pdf->cell(54,5,"Cryptorchidie",1,0,'L',0,0);  $pdf->cell(32,5,$datad['m50'],1,0,'C',0,0);$pdf->cell(32,5,$datap['m50'],1,0,'C',0,0);   $pdf->cell(32,5,$datao['m50'],1,0,'C',0,0);$pdf->cell(32,5,$datapo['m50'],1,0,'C',0,0); $pdf->cell(32,5,$datapec['m50'],1,0,'C',0,0);$pdf->cell(32,5,$datappec['m50'],1,0,'C',0,0);
$pdf->SetXY(45,$pdf->GetY()+5);                   $pdf->cell(54,5,"Enurésie.",1,0,'L',0,0);      $pdf->cell(32,5,$datad['m51'],1,0,'C',0,0);$pdf->cell(32,5,$datap['m51'],1,0,'C',0,0);   $pdf->cell(32,5,$datao['m51'],1,0,'C',0,0);$pdf->cell(32,5,$datapo['m51'],1,0,'C',0,0); $pdf->cell(32,5,$datapec['m51'],1,0,'C',0,0);$pdf->cell(32,5,$datappec['m51'],1,0,'C',0,0);
$pdf->SetXY(45,$pdf->GetY()+5);                   $pdf->cell(54,5,"Tr.urinaires.",1,0,'L',0,0);  $pdf->cell(32,5,$datad['m52'],1,0,'C',0,0);$pdf->cell(32,5,$datap['m52'],1,0,'C',0,0);   $pdf->cell(32,5,$datao['m52'],1,0,'C',0,0);$pdf->cell(32,5,$datapo['m52'],1,0,'C',0,0); $pdf->cell(32,5,$datapec['m52'],1,0,'C',0,0);$pdf->cell(32,5,$datappec['m52'],1,0,'C',0,0);
$pdf->SetXY(45,$pdf->GetY()+5);                   $pdf->cell(54,5,"Autres.",1,0,'L',0,0);        $pdf->cell(32,5,$datad['m53'],1,0,'C',0,0);$pdf->cell(32,5,$datap['m53'],1,0,'C',0,0);   $pdf->cell(32,5,$datao['m53'],1,0,'C',0,0);$pdf->cell(32,5,$datapo['m53'],1,0,'C',0,0); $pdf->cell(32,5,$datapec['m53'],1,0,'C',0,0);$pdf->cell(32,5,$datappec['m53'],1,0,'C',0,0);

$pdf->SetXY(5,$pdf->GetY()+5); 
$pdf->cell(40,5,"12 -AUTRES",1,0,1,'L',0);       $pdf->cell(54,5,"",1,0,'L',0,0);                $pdf->cell(32,5,$datad['m54'],1,0,'C',0,0);$pdf->cell(32,5,$datap['m54'],1,0,'C',0,0);   $pdf->cell(32,5,$datao['m54'],1,0,'C',0,0);$pdf->cell(32,5,$datapo['m54'],1,0,'C',0,0); $pdf->cell(32,5,$datapec['m54'],1,0,'C',0,0);$pdf->cell(32,5,$datappec['m54'],1,0,'C',0,0);

$pdf->SetXY(5,$pdf->GetY()+5); 
$pdf->cell(40,5,"TOTAL",1,0,1,'L',0); $pdf->cell(54,5,"",1,0,'L',0,0);$pdf->cell(32,5,"",1,0,'C',0,0);$pdf->cell(32,5,"",1,0,'C',0,0);          $pdf->cell(32,5,"",1,0,'C',0,0);$pdf->cell(32,5,"",1,0,'C',0,0); $pdf->cell(32,5,"",1,0,'C',0,0);$pdf->cell(32,5,"",1,0,'C',0,0);

}

//3-vaccination
if ($_POST['SS']=='vac') 
{
$pdf->AddPage('L','A4');$pdf->SetFont('Times','B',10);$pdf->SetFillColor(230);
$pdf->entetel($UDS,$structure,$datejour1,$datejour2,"Vaccination en Milieu Scolaire ",$palier);$w= 23.2;
$pdf->SetXY(5,$pdf->GetY()+15);$pdf->cell(($w*11)+30,5,"Tableau 1.couverture vaccinale",1,0,1,'L',0);
$pdf->SetXY(5,$pdf->GetY()+5);
$pdf->cell(30,15,"1-Etablissements",1,0,1,'L',0);$pdf->cell($w,5,"2. Pop cible",1,0,1,'L',0);$pdf->cell($w,5,"3. Pop vaccinée",1,0,1,'L',0);$pdf->cell($w,5,"4.Rapport",1,0,1,'L',0);          $pdf->cell($w,5,"5. Pop vaccinée",1,0,1,'L',0);$pdf->cell($w,5,"6.Rapport",1,0,1,'L',0);           $pdf->cell($w,5,"7. Pop cible",1,0,1,'L',0);$pdf->cell($w,5,"8. Pop vaccinée",1,0,1,'L',0);$pdf->cell($w,5,"9.Rapport",1,0,1,'L',0);          $pdf->cell($w,5,"10. Pop cible",1,0,1,'L',0);$pdf->cell($w,5,"11. Pop vaccinée",1,0,1,'L',0);$pdf->cell($w,5,"12.Rapport",1,0,1,'L',0); 
$pdf->SetXY(35,$pdf->GetY()+5);                  $pdf->cell($w,5,"1AP",1,0,1,'L',0);         $pdf->cell($w,5,"DTE 1AP",1,0,1,'L',0);        $pdf->cell($w,5,"%",1,0,1,'L',0);           $pdf->cell($w,5,"RR 1AP",1,0,1,'L',0);         $pdf->cell($w,5,"%",1,0,1,'L',0);            $pdf->cell($w,5,"1AM",1,0,1,'L',0);         $pdf->cell($w,5,"DTA 1AM",1,0,1,'L',0);        $pdf->cell($w,5,"%",1,0,1,'L',0);           $pdf->cell($w,5,"1AS",1,0,1,'L',0);          $pdf->cell($w,5,"DTA 1AS",1,0,1,'L',0);          $pdf->cell($w,5,"%",1,0,1,'L',0); 
$pdf->SetXY(35,$pdf->GetY()+5);                  $pdf->cell($w,5,"A6",1,0,1,'L',0);          $pdf->cell($w,5,"B6",1,0,1,'L',0);             $pdf->cell($w,5,"(B6/A6)*100",1,0,1,'L',0); $pdf->cell($w,5,"C6",1,0,1,'L',0);             $pdf->cell($w,5,"(C6/A6)*100",1,0,1,'L',0);  $pdf->cell($w,5,"D6",1,0,1,'L',0);          $pdf->cell($w,5,"E6",1,0,1,'L',0);             $pdf->cell($w,5,"(E6/D6)*100",1,0,1,'L',0); $pdf->cell($w,5,"F6",1,0,1,'L',0);           $pdf->cell($w,5,"G6",1,0,1,'L',0);               $pdf->cell($w,5,"(G6/F6)*100",1,0,1,'L',0);
$pdf->mysqlconnect();
$query = "SELECT * from ecole where iduds = $UDS  order by typeecole,ecole";
$resultat=mysql_query($query);
$totalmbr1=mysql_num_rows($resultat);
while($row=mysql_fetch_object($resultat))
{
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->SetFont('Times','B',7);
	$pdf->SetFillColor(250);$pdf->cell(30,5,strtoupper($row->ecole),1,0,'L',1,0);$pdf->SetFont('Times','B',10);
	$pdf->cell($w,5,$pdf->INSCRITSPE("2",$row->id,$datejour1,$datejour2,$UDS),1,0,'C',0,0);
	$pdf->cell($w,5,$pdf->POPVAC("2",$row->id,$datejour1,$datejour2,$UDS,"19"),1,0,'C',0,0);
	$pdf->cell($w,5,"",1,0,'C',0,0);
	$pdf->cell($w,5,"",1,0,'C',0,0);
	$pdf->cell($w,5,"",1,0,'C',0,0);
	$pdf->cell($w,5,$pdf->INSCRITSPE("7",$row->id,$datejour1,$datejour2,$UDS),1,0,'C',0,0);
	$pdf->cell($w,5,"",1,0,'C',0,0);
	$pdf->cell($w,5,"",1,0,'C',0,0);
	$pdf->cell($w,5,$pdf->INSCRITSPE("11",$row->id,$datejour1,$datejour2,$UDS),1,0,'C',0,0);
	$pdf->cell($w,5,"",1,0,'C',0,0);
	$pdf->cell($w,5,"",1,0,'C',0,0);
	$pdf->SetFillColor(230);	
}
$pdf->SetFillColor(250);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->cell(30,5,"total uds",1,0,'L',1,0);$pdf->SetFont('Times','B',10);
$pdf->cell($w,5,"",1,0,'C',1,0);
$pdf->cell($w,5,"",1,0,'C',1,0);
$pdf->cell($w,5,"",1,0,'C',1,0);
$pdf->cell($w,5,"",1,0,'C',1,0);
$pdf->cell($w,5,"",1,0,'C',1,0);
$pdf->cell($w,5,"",1,0,'C',1,0);
$pdf->cell($w,5,"",1,0,'C',1,0);
$pdf->cell($w,5,"",1,0,'C',1,0);
$pdf->cell($w,5,"",1,0,'C',1,0);
$pdf->cell($w,5,"",1,0,'C',1,0);
$pdf->cell($w,5,"",1,0,'C',1,0);
//**********************//
$pdf->AddPage('L','A4');$pdf->SetFont('Times','B',10);$pdf->SetFillColor(230);
$pdf->SetXY(5,$pdf->GetY()+10);$pdf->cell(($w*11)+30,5,"Tableau 2.Vaccination incomplete",1,0,1,'L',0);
$pdf->SetXY(5,$pdf->GetY()+5);
$pdf->cell(30,15,"1-Etablissements",1,0,1,'L',0); $pdf->cell(85.06,5,"1 . NB Elèves éxaminés (J2) ",1,0,'C',1,0);$pdf->cell(85.06,5," 2 . Vaccination  incomplète (H6)",1,0,'C',1,0);$pdf->cell(85.06,5,"3 . (H6/J2)*100",1,0,'C',1,0); 
$pdf->mysqlconnect();
$query = "SELECT * from ecole where iduds = $UDS  order by typeecole,ecole";
$resultat=mysql_query($query);
$totalmbr1=mysql_num_rows($resultat);
while($row=mysql_fetch_object($resultat))
{
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->SetFont('Times','B',7);
	$pdf->SetFillColor(250);$pdf->cell(30,5,strtoupper($row->ecole),1,0,'L',1,0);$pdf->SetFont('Times','B',10);
	$pdf->cell(85.06,5,"0",1,0,'C',0,0);
	$pdf->cell(85.06,5,"0",1,0,'C',0,0);
	$pdf->cell(85.06,5,"0",1,0,'C',0,0);
	$pdf->SetFillColor(230);	
}
$pdf->SetFillColor(250);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->cell(30,5,"total uds",1,0,'L',1,0);$pdf->SetFont('Times','B',10);
$pdf->cell(85.06,5,"0",1,0,'C',1,0);
$pdf->cell(85.06,5,"0",1,0,'C',1,0);
$pdf->cell(85.06,5,"0",1,0,'C',1,0);
//**********************//
$pdf->AddPage('L','A4');$pdf->SetFont('Times','B',10);$pdf->SetFillColor(230);
$pdf->SetXY(5,$pdf->GetY()+10);$pdf->cell(($w*11)+30,5,"Tableau 3.Vaccination par le BCG",1,0,1,'L',0);
$pdf->SetXY(5,$pdf->GetY()+5);
$pdf->cell(30,15,"1-Etablissements",1,0,'C',1,0); 
$pdf->cell(51.04,5,"1.POP cible 1AP (A6) ",1,0,'C',1,0);
$pdf->cell(51.04,5,"2.absence de cicatrice BCG (I6)",1,0,'C',1,0);
$pdf->cell(51.04,5,"3.(I6/A6)*100",1,0,'C',1,0); 
$pdf->cell(51.04,5,"4.POP 1AP vaccinée par le BCG (J6)",1,0,'C',1,0);
$pdf->cell(51.04,5,"5.TCV BCG (J6/I6)*100",1,0,'C',1,0);
$pdf->mysqlconnect();
$query = "SELECT * from ecole where iduds = $UDS  order by typeecole,ecole";
$resultat=mysql_query($query);
$totalmbr1=mysql_num_rows($resultat);
while($row=mysql_fetch_object($resultat))
{
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->SetFont('Times','B',7);
	$pdf->SetFillColor(250);$pdf->cell(30,5,strtoupper($row->ecole),1,0,'L',1,0);$pdf->SetFont('Times','B',10);
	$pdf->cell(51.04,5,"0",1,0,'C',0,0);
	$pdf->cell(51.04,5,"0",1,0,'C',0,0);
	$pdf->cell(51.04,5,"0",1,0,'C',0,0); 
	$pdf->cell(51.04,5,"0",1,0,'C',0,0);
	$pdf->cell(51.04,5,"0",1,0,'C',0,0);
	$pdf->SetFillColor(230);	
}
$pdf->SetFillColor(250);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->cell(30,5,"total uds",1,0,'L',1,0);$pdf->SetFont('Times','B',10);
$pdf->cell(51.04,5,"0",1,0,'C',1,0);
$pdf->cell(51.04,5,"0",1,0,'C',1,0);
$pdf->cell(51.04,5,"0",1,0,'C',1,0); 
$pdf->cell(51.04,5,"0",1,0,'C',1,0);
$pdf->cell(51.04,5,"0",1,0,'C',1,0);

//****************************//

$pdf->AddPage('L','A4');$pdf->SetFont('Times','B',10);$pdf->SetFillColor(230);
$pdf->entetel($UDS,$structure,$datejour1,$datejour2," Rattrapage vaccinal en milieu scolaire ",$palier);$w= 23.2;
$pdf->SetXY(5,$pdf->GetY()+15);$pdf->cell(($w*11)+30,5,"Tableau 1.Rattrapage vaccinal en milieu scolaire",1,0,1,'L',0);
$pdf->SetXY(5,$pdf->GetY()+5);
$w=21.27;
$pdf->cell(30,15,"1-Etablissements",1,0,1,'L',0);$pdf->cell($w,5,"2. P-N-V",1,0,'C',1,0);          $pdf->cell($w,5,"3. P-R",1,0,'C',1,0);         $pdf->cell($w,5,"4. Rap",1,0,'C',1,0);      $pdf->cell($w,5,"5. P-N-V",1,0,'C',1,0);         $pdf->cell($w,5,"5. P-R",1,0,'C',1,0);            $pdf->cell($w,5,"6. Rap",1,0,'C',1,0);             $pdf->cell($w,5,"7. P-N-V",1,0,'C',1,0);         $pdf->cell($w,5,"8. P-R",1,0,'C',1,0);          $pdf->cell($w,5,"9. Rap",1,0,'C',1,0);      $pdf->cell($w,5,"10. P-N-V",1,0,'C',1,0);            $pdf->cell($w,5,"11. P-R",1,0,'C',1,0);            $pdf->cell($w,5,"12. Rap",1,0,'C',1,0); 
$pdf->SetXY(35,$pdf->GetY()+5);                  $pdf->cell($w,5,"DTE:1AP",1,0,'C',1,0);           $pdf->cell($w,5,"DTE:1AP",1,0,'C',1,0);        $pdf->cell($w,5,"%",1,0,'C',1,0);           $pdf->cell($w,5,"RR:1AP",1,0,'C',1,0);           $pdf->cell($w,5,"RR:1AP",1,0,'C',1,0);            $pdf->cell($w,5,"%",1,0,'C',1,0);                  $pdf->cell($w,5,"DTA-P:1AM",1,0,'C',1,0);        $pdf->cell($w,5,"DTA-P:1AM",1,0,'C',1,0);       $pdf->cell($w,5,"%",1,0,'C',1,0);           $pdf->cell($w,5,"DTA-P:1AS",1,0,'C',1,0);            $pdf->cell($w,5,"DTA-P:1AS",1,0,'C',1,0);          $pdf->cell($w,5,"%",1,0,'C',1,0); 
$pdf->SetXY(35,$pdf->GetY()+5);                  $pdf->cell($w,5,"A7",1,0,'C',1,0);                $pdf->cell($w,5,"B7",1,0,'C',1,0);             $pdf->cell($w,5,"B7/A7",1,0,'C',1,0);       $pdf->cell($w,5,"C7",1,0,'C',1,0);               $pdf->cell($w,5,"D7",1,0,'C',1,0);                $pdf->cell($w,5,"D7/C7",1,0,'C',1,0);              $pdf->cell($w,5,"E7",1,0,'C',1,0);               $pdf->cell($w,5,"F7",1,0,'C',1,0);              $pdf->cell($w,5,"F7/E7",1,0,'C',1,0);       $pdf->cell($w,5,"G7",1,0,'C',1,0);                   $pdf->cell($w,5,"H7",1,0,'C',1,0);                 $pdf->cell($w,5,"H7/G7",1,0,'C',1,0);
$pdf->mysqlconnect();
$query = "SELECT * from ecole where iduds = $UDS  order by typeecole,ecole";
$resultat=mysql_query($query);
$totalmbr1=mysql_num_rows($resultat);
while($row=mysql_fetch_object($resultat))
{
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->SetFont('Times','B',7);
	$pdf->SetFillColor(250);$pdf->cell(30,5,strtoupper($row->ecole),1,0,'L',1,0);$pdf->SetFont('Times','B',10);
	$pdf->cell($w,5,"",1,0,'C',0,0);
	$pdf->cell($w,5,"",1,0,'C',0,0);
	$pdf->cell($w,5,"",1,0,'C',0,0);
	$pdf->cell($w,5,"",1,0,'C',0,0);
	$pdf->cell($w,5,"",1,0,'C',0,0);
	$pdf->cell($w,5,"",1,0,'C',0,0);
	$pdf->cell($w,5,"",1,0,'C',0,0);
	$pdf->cell($w,5,"",1,0,'C',0,0);
	$pdf->cell($w,5,"",1,0,'C',0,0);
	$pdf->cell($w,5,"",1,0,'C',0,0);
	$pdf->cell($w,5,"",1,0,'C',0,0);
	$pdf->cell($w,5,"",1,0,'C',0,0);
	$pdf->SetFillColor(230);	
}
$pdf->SetFillColor(250);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->cell(30,5,"total uds",1,0,'L',1,0);$pdf->SetFont('Times','B',10);
$pdf->cell($w,5,"",1,0,'C',1,0);
$pdf->cell($w,5,"",1,0,'C',1,0);
$pdf->cell($w,5,"",1,0,'C',1,0);
$pdf->cell($w,5,"",1,0,'C',1,0);
$pdf->cell($w,5,"",1,0,'C',1,0);
$pdf->cell($w,5,"",1,0,'C',1,0);
$pdf->cell($w,5,"",1,0,'C',1,0);
$pdf->cell($w,5,"",1,0,'C',1,0);
$pdf->cell($w,5,"",1,0,'C',1,0);
$pdf->cell($w,5,"",1,0,'C',1,0);
$pdf->cell($w,5,"",1,0,'C',1,0);
$pdf->cell($w,5,"",1,0,'C',1,0);

//****************************//
}

if ($_POST['SS']=='hsl') 
{
 
$pdf->AddPage('L','A4');$pdf->SetFont('Times','B',10);$pdf->SetFillColor(230);
$pdf->entetel($UDS,$structure,$datejour1,$datejour2," Hygiene et salubrite ",$palier);$w= 23.2;
$pdf->SetXY(5,$pdf->GetY()+15);$pdf->cell(($w*11)+30,5,"Hygiene et salubrite : 1 - contrôle",1,0,1,'L',0);
$pdf->SetXY(5,$pdf->GetY()+5);
$w=7.09;
$pdf->cell(30,20,"1-Etablissements",1,0,1,'L',0);$pdf->cell($w*12,5,"Etablissements",1,0,'C',1,0); $pdf->cell($w*12,5,"Cantines",1,0,'C',1,0);                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    $pdf->cell($w*12,5,"Internats",1,0,'C',1,0);        
$pdf->SetXY(35,$pdf->GetY()+5);                  $pdf->cell($w*4,5,"NBR ",1,0,'C',1,0);                                                                                                      $pdf->cell($w*4,5,"NBR controlés",1,0,'C',1,0);                                                                                         $pdf->cell($w*4,5,"% controlés",1,0,'C',1,0);                                                                                          $pdf->cell($w*4,5,"NBR  ",1,0,'C',1,0);                                                                                                 $pdf->cell($w*4,5,"NBR controlées",1,0,'C',1,0);                                                                                        $pdf->cell($w*4,5,"%  controlées",1,0,'C',1,0);                                                                                       $pdf->cell($w*4,5,"NBR ",1,0,'C',1,0);                                                                                                             $pdf->cell($w*4,5,"NBR controlés",1,0,'C',1,0);                                                                                             $pdf->cell($w*4,5,"% controlés",1,0,'C',1,0);   
$pdf->SetXY(35,$pdf->GetY()+5);                  $pdf->cell($w*4,5,"A8",1,0,'C',1,0);                                                                                                        $pdf->cell($w*4,5,"B8",1,0,'C',1,0);                                                                                                    $pdf->cell($w*4,5,"B8/A8",1,0,'C',1,0);                                                                                                $pdf->cell($w*4,5,"C8",1,0,'C',1,0);                                                                                                    $pdf->cell($w*4,5,"D8",1,0,'C',1,0);                                                                                                    $pdf->cell($w*4,5,"D8/C8",1,0,'C',1,0);                                                                                               $pdf->cell($w*4,5,"E8",1,0,'C',1,0);                                                                                                               $pdf->cell($w*4,5,"F8",1,0,'C',1,0);                                                                                                        $pdf->cell($w*4,5,"F8/E8",1,0,'C',1,0); 
$pdf->SetXY(35,$pdf->GetY()+5);                  $pdf->cell($w,5,"P",1,0,'C',1,0); $pdf->cell($w,5,"M",1,0,'C',1,0); $pdf->cell($w,5,"S",1,0,'C',1,0);$pdf->cell($w,5,"T",1,0,'C',1,0);      $pdf->cell($w,5,"P",1,0,'C',1,0); $pdf->cell($w,5,"M",1,0,'C',1,0); $pdf->cell($w,5,"S",1,0,'C',1,0);$pdf->cell($w,5,"T",1,0,'C',1,0);  $pdf->cell($w,5,"P",1,0,'C',1,0); $pdf->cell($w,5,"M",1,0,'C',1,0); $pdf->cell($w,5,"S",1,0,'C',1,0);$pdf->cell($w,5,"T",1,0,'C',1,0); $pdf->cell($w,5,"P",1,0,'C',1,0); $pdf->cell($w,5,"M",1,0,'C',1,0); $pdf->cell($w,5,"S",1,0,'C',1,0);$pdf->cell($w,5,"T",1,0,'C',1,0);  $pdf->cell($w,5,"P",1,0,'C',1,0); $pdf->cell($w,5,"M",1,0,'C',1,0); $pdf->cell($w,5,"S",1,0,'C',1,0);$pdf->cell($w,5,"T",1,0,'C',1,0);  $pdf->cell($w,5,"P",1,0,'C',1,0); $pdf->cell($w,5,"M",1,0,'C',1,0); $pdf->cell($w,5,"S",1,0,'C',1,0);$pdf->cell($w,5,"T",1,0,'C',1,0);$pdf->cell($w,5,"P",1,0,'C',1,0); $pdf->cell($w,5,"M",1,0,'C',1,0); $pdf->cell($w,5,"S",1,0,'C',1,0);$pdf->cell($w,5,"T",1,0,'C',1,0);             $pdf->cell($w,5,"P",1,0,'C',1,0); $pdf->cell($w,5,"M",1,0,'C',1,0); $pdf->cell($w,5,"S",1,0,'C',1,0);$pdf->cell($w,5,"T",1,0,'C',1,0);       $pdf->cell($w,5,"P",1,0,'C',1,0); $pdf->cell($w,5,"M",1,0,'C',1,0); $pdf->cell($w,5,"S",1,0,'C',1,0);$pdf->cell($w,5,"T",1,0,'C',1,0);        
$pdf->mysqlconnect();
$query = "SELECT * from ecole where iduds = $UDS  order by typeecole,ecole";
$resultat=mysql_query($query);
$totalmbr1=mysql_num_rows($resultat);
while($row=mysql_fetch_object($resultat))
{
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->SetFont('Times','B',7);
	$pdf->SetFillColor(250);$pdf->cell(30,5,strtoupper($row->ecole),1,0,'L',1,0);$pdf->SetFont('Times','B',10);
	
	$pdf->cell($w,5,"",1,0,'C',0,0); $pdf->cell($w,5,"",1,0,'C',0,0); $pdf->cell($w,5,"",1,0,'C',0,0);$pdf->cell($w,5,"",1,0,'C',0,0); 
	$pdf->cell($w,5,"",1,0,'C',0,0); $pdf->cell($w,5,"",1,0,'C',0,0); $pdf->cell($w,5,"",1,0,'C',0,0);$pdf->cell($w,5,"",1,0,'C',0,0); 
	$pdf->cell($w,5,"",1,0,'C',0,0); $pdf->cell($w,5,"",1,0,'C',0,0); $pdf->cell($w,5,"",1,0,'C',0,0);$pdf->cell($w,5,"",1,0,'C',0,0); 
	$pdf->cell($w,5,"",1,0,'C',0,0); $pdf->cell($w,5,"",1,0,'C',0,0); $pdf->cell($w,5,"",1,0,'C',0,0);$pdf->cell($w,5,"",1,0,'C',0,0); 
	$pdf->cell($w,5,"",1,0,'C',0,0); $pdf->cell($w,5,"",1,0,'C',0,0); $pdf->cell($w,5,"",1,0,'C',0,0);$pdf->cell($w,5,"",1,0,'C',0,0); 
	$pdf->cell($w,5,"",1,0,'C',0,0); $pdf->cell($w,5,"",1,0,'C',0,0); $pdf->cell($w,5,"",1,0,'C',0,0);$pdf->cell($w,5,"",1,0,'C',0,0); 
	$pdf->cell($w,5,"",1,0,'C',0,0); $pdf->cell($w,5,"",1,0,'C',0,0); $pdf->cell($w,5,"",1,0,'C',0,0);$pdf->cell($w,5,"",1,0,'C',0,0); 
	$pdf->cell($w,5,"",1,0,'C',0,0); $pdf->cell($w,5,"",1,0,'C',0,0); $pdf->cell($w,5,"",1,0,'C',0,0);$pdf->cell($w,5,"",1,0,'C',0,0); 
	$pdf->cell($w,5,"",1,0,'C',0,0); $pdf->cell($w,5,"",1,0,'C',0,0); $pdf->cell($w,5,"",1,0,'C',0,0);$pdf->cell($w,5,"",1,0,'C',0,0); 
	$pdf->SetFillColor(230);	
}
$pdf->SetFillColor(250);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->cell(30,5,"total uds",1,0,'L',1,0);$pdf->SetFont('Times','B',10);
$pdf->cell($w,5,"",1,0,'C',1,0); $pdf->cell($w,5,"",1,0,'C',1,0); $pdf->cell($w,5,"",1,0,'C',1,0);$pdf->cell($w,5,"",1,0,'C',1,0); 
$pdf->cell($w,5,"",1,0,'C',1,0); $pdf->cell($w,5,"",1,0,'C',1,0); $pdf->cell($w,5,"",1,0,'C',1,0);$pdf->cell($w,5,"",1,0,'C',1,0); 
$pdf->cell($w,5,"",1,0,'C',1,0); $pdf->cell($w,5,"",1,0,'C',1,0); $pdf->cell($w,5,"",1,0,'C',1,0);$pdf->cell($w,5,"",1,0,'C',1,0); 
$pdf->cell($w,5,"",1,0,'C',1,0); $pdf->cell($w,5,"",1,0,'C',1,0); $pdf->cell($w,5,"",1,0,'C',1,0);$pdf->cell($w,5,"",1,0,'C',1,0); 
$pdf->cell($w,5,"",1,0,'C',1,0); $pdf->cell($w,5,"",1,0,'C',1,0); $pdf->cell($w,5,"",1,0,'C',1,0);$pdf->cell($w,5,"",1,0,'C',1,0); 
$pdf->cell($w,5,"",1,0,'C',1,0); $pdf->cell($w,5,"",1,0,'C',1,0); $pdf->cell($w,5,"",1,0,'C',1,0);$pdf->cell($w,5,"",1,0,'C',1,0); 
$pdf->cell($w,5,"",1,0,'C',1,0); $pdf->cell($w,5,"",1,0,'C',1,0); $pdf->cell($w,5,"",1,0,'C',1,0);$pdf->cell($w,5,"",1,0,'C',1,0); 
$pdf->cell($w,5,"",1,0,'C',1,0); $pdf->cell($w,5,"",1,0,'C',1,0); $pdf->cell($w,5,"",1,0,'C',1,0);$pdf->cell($w,5,"",1,0,'C',1,0); 
$pdf->cell($w,5,"",1,0,'C',1,0); $pdf->cell($w,5,"",1,0,'C',1,0); $pdf->cell($w,5,"",1,0,'C',1,0);$pdf->cell($w,5,"",1,0,'C',1,0); 



$pdf->AddPage('L','A4');$pdf->SetFont('Times','B',10);$pdf->SetFillColor(230);
$w= 23.2;
$pdf->SetXY(5,$pdf->GetY()+15);$pdf->cell(($w*11)+30,5,"Hygiene et salubrite : 2 - Anomalies",1,0,1,'L',0);
$pdf->SetXY(5,$pdf->GetY()+5);
$w=7.09;
$pdf->cell(30,20,"1-Etablissements",1,0,1,'L',0);$pdf->cell($w*12,5,"Cantines",1,0,'C',1,0);                                                                                                                                                                                                                                                                                                                                                                                $pdf->cell($w*12,5,"Environement",1,0,'C',1,0);                                                                                                                                                                                                                                                                                                                                                                        $pdf->cell($w*12,5,"Eau",1,0,'C',1,0);        
$pdf->SetXY(35,$pdf->GetY()+5);                  $pdf->cell($w*4,5,"NBR anomalies",1,0,'C',1,0);                                                                                             $pdf->cell($w*4,5,"NBR anomalies c",1,0,'C',1,0);                                                                                       $pdf->cell($w*4,5,"% anomalies c",1,0,'C',1,0);                                                                                        $pdf->cell($w*4,5,"NBR anomalies",1,0,'C',1,0);                                                                                         $pdf->cell($w*4,5,"NBR anomalies c",1,0,'C',1,0);                                                                                       $pdf->cell($w*4,5,"%  anomalies c",1,0,'C',1,0);                                                                                       $pdf->cell($w*4,5,"NBR anomalies",1,0,'C',1,0);                                                                                                   $pdf->cell($w*4,5,"NBR anomalies c",1,0,'C',1,0);                                                                                           $pdf->cell($w*4,5,"% anomalies c",1,0,'C',1,0);   
$pdf->SetXY(35,$pdf->GetY()+5);                  $pdf->cell($w*4,5,"A8",1,0,'C',1,0);                                                                                                        $pdf->cell($w*4,5,"B8",1,0,'C',1,0);                                                                                                    $pdf->cell($w*4,5,"B8/A8",1,0,'C',1,0);                                                                                                $pdf->cell($w*4,5,"C8",1,0,'C',1,0);                                                                                                    $pdf->cell($w*4,5,"D8",1,0,'C',1,0);                                                                                                    $pdf->cell($w*4,5,"D8/C8",1,0,'C',1,0);                                                                                               $pdf->cell($w*4,5,"E8",1,0,'C',1,0);                                                                                                               $pdf->cell($w*4,5,"F8",1,0,'C',1,0);                                                                                                        $pdf->cell($w*4,5,"F8/E8",1,0,'C',1,0); 
$pdf->SetXY(35,$pdf->GetY()+5);                  $pdf->cell($w,5,"P",1,0,'C',1,0); $pdf->cell($w,5,"M",1,0,'C',1,0); $pdf->cell($w,5,"S",1,0,'C',1,0);$pdf->cell($w,5,"T",1,0,'C',1,0);      $pdf->cell($w,5,"P",1,0,'C',1,0); $pdf->cell($w,5,"M",1,0,'C',1,0); $pdf->cell($w,5,"S",1,0,'C',1,0);$pdf->cell($w,5,"T",1,0,'C',1,0);  $pdf->cell($w,5,"P",1,0,'C',1,0); $pdf->cell($w,5,"M",1,0,'C',1,0); $pdf->cell($w,5,"S",1,0,'C',1,0);$pdf->cell($w,5,"T",1,0,'C',1,0); $pdf->cell($w,5,"P",1,0,'C',1,0); $pdf->cell($w,5,"M",1,0,'C',1,0); $pdf->cell($w,5,"S",1,0,'C',1,0);$pdf->cell($w,5,"T",1,0,'C',1,0);  $pdf->cell($w,5,"P",1,0,'C',1,0); $pdf->cell($w,5,"M",1,0,'C',1,0); $pdf->cell($w,5,"S",1,0,'C',1,0);$pdf->cell($w,5,"T",1,0,'C',1,0);  $pdf->cell($w,5,"P",1,0,'C',1,0); $pdf->cell($w,5,"M",1,0,'C',1,0); $pdf->cell($w,5,"S",1,0,'C',1,0);$pdf->cell($w,5,"T",1,0,'C',1,0);$pdf->cell($w,5,"P",1,0,'C',1,0); $pdf->cell($w,5,"M",1,0,'C',1,0); $pdf->cell($w,5,"S",1,0,'C',1,0);$pdf->cell($w,5,"T",1,0,'C',1,0);             $pdf->cell($w,5,"P",1,0,'C',1,0); $pdf->cell($w,5,"M",1,0,'C',1,0); $pdf->cell($w,5,"S",1,0,'C',1,0);$pdf->cell($w,5,"T",1,0,'C',1,0);      $pdf->cell($w,5,"P",1,0,'C',1,0); $pdf->cell($w,5,"M",1,0,'C',1,0); $pdf->cell($w,5,"S",1,0,'C',1,0);$pdf->cell($w,5,"T",1,0,'C',1,0);        
$pdf->mysqlconnect();
$query = "SELECT * from ecole where iduds = $UDS  order by typeecole,ecole";
$resultat=mysql_query($query);
$totalmbr1=mysql_num_rows($resultat);
while($row=mysql_fetch_object($resultat))
{
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->SetFont('Times','B',7);
	$pdf->SetFillColor(250);$pdf->cell(30,5,strtoupper($row->ecole),1,0,'L',1,0);$pdf->SetFont('Times','B',10);
	
	$pdf->cell($w,5,"",1,0,'C',0,0); $pdf->cell($w,5,"",1,0,'C',0,0); $pdf->cell($w,5,"",1,0,'C',0,0);$pdf->cell($w,5,"",1,0,'C',0,0); 
	$pdf->cell($w,5,"",1,0,'C',0,0); $pdf->cell($w,5,"",1,0,'C',0,0); $pdf->cell($w,5,"",1,0,'C',0,0);$pdf->cell($w,5,"",1,0,'C',0,0); 
	$pdf->cell($w,5,"",1,0,'C',0,0); $pdf->cell($w,5,"",1,0,'C',0,0); $pdf->cell($w,5,"",1,0,'C',0,0);$pdf->cell($w,5,"",1,0,'C',0,0); 
	$pdf->cell($w,5,"",1,0,'C',0,0); $pdf->cell($w,5,"",1,0,'C',0,0); $pdf->cell($w,5,"",1,0,'C',0,0);$pdf->cell($w,5,"",1,0,'C',0,0); 
	$pdf->cell($w,5,"",1,0,'C',0,0); $pdf->cell($w,5,"",1,0,'C',0,0); $pdf->cell($w,5,"",1,0,'C',0,0);$pdf->cell($w,5,"",1,0,'C',0,0); 
	$pdf->cell($w,5,"",1,0,'C',0,0); $pdf->cell($w,5,"",1,0,'C',0,0); $pdf->cell($w,5,"",1,0,'C',0,0);$pdf->cell($w,5,"",1,0,'C',0,0); 
	$pdf->cell($w,5,"",1,0,'C',0,0); $pdf->cell($w,5,"",1,0,'C',0,0); $pdf->cell($w,5,"",1,0,'C',0,0);$pdf->cell($w,5,"",1,0,'C',0,0); 
	$pdf->cell($w,5,"",1,0,'C',0,0); $pdf->cell($w,5,"",1,0,'C',0,0); $pdf->cell($w,5,"",1,0,'C',0,0);$pdf->cell($w,5,"",1,0,'C',0,0); 
	$pdf->cell($w,5,"",1,0,'C',0,0); $pdf->cell($w,5,"",1,0,'C',0,0); $pdf->cell($w,5,"",1,0,'C',0,0);$pdf->cell($w,5,"",1,0,'C',0,0); 
	$pdf->SetFillColor(230);	
}
$pdf->SetFillColor(250);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->cell(30,5,"total uds",1,0,'L',1,0);$pdf->SetFont('Times','B',10);
$pdf->cell($w,5,"",1,0,'C',1,0); $pdf->cell($w,5,"",1,0,'C',1,0); $pdf->cell($w,5,"",1,0,'C',1,0);$pdf->cell($w,5,"",1,0,'C',1,0); 
$pdf->cell($w,5,"",1,0,'C',1,0); $pdf->cell($w,5,"",1,0,'C',1,0); $pdf->cell($w,5,"",1,0,'C',1,0);$pdf->cell($w,5,"",1,0,'C',1,0); 
$pdf->cell($w,5,"",1,0,'C',1,0); $pdf->cell($w,5,"",1,0,'C',1,0); $pdf->cell($w,5,"",1,0,'C',1,0);$pdf->cell($w,5,"",1,0,'C',1,0); 
$pdf->cell($w,5,"",1,0,'C',1,0); $pdf->cell($w,5,"",1,0,'C',1,0); $pdf->cell($w,5,"",1,0,'C',1,0);$pdf->cell($w,5,"",1,0,'C',1,0); 
$pdf->cell($w,5,"",1,0,'C',1,0); $pdf->cell($w,5,"",1,0,'C',1,0); $pdf->cell($w,5,"",1,0,'C',1,0);$pdf->cell($w,5,"",1,0,'C',1,0); 
$pdf->cell($w,5,"",1,0,'C',1,0); $pdf->cell($w,5,"",1,0,'C',1,0); $pdf->cell($w,5,"",1,0,'C',1,0);$pdf->cell($w,5,"",1,0,'C',1,0); 
$pdf->cell($w,5,"",1,0,'C',1,0); $pdf->cell($w,5,"",1,0,'C',1,0); $pdf->cell($w,5,"",1,0,'C',1,0);$pdf->cell($w,5,"",1,0,'C',1,0); 
$pdf->cell($w,5,"",1,0,'C',1,0); $pdf->cell($w,5,"",1,0,'C',1,0); $pdf->cell($w,5,"",1,0,'C',1,0);$pdf->cell($w,5,"",1,0,'C',1,0); 
$pdf->cell($w,5,"",1,0,'C',1,0); $pdf->cell($w,5,"",1,0,'C',1,0); $pdf->cell($w,5,"",1,0,'C',1,0);$pdf->cell($w,5,"",1,0,'C',1,0); 

$pdf->AddPage('L','A4');$pdf->SetFont('Times','B',10);$pdf->SetFillColor(230);
$w= 23.2;
$pdf->SetXY(5,$pdf->GetY()+15);$pdf->cell(($w*11)+30,5,"Hygiene et salubrite : 2 - Anomalies",1,0,1,'L',0);
$pdf->SetXY(5,$pdf->GetY()+5);
$w=7.09;
$pdf->cell(30,20,"1-Etablissements",1,0,1,'L',0);$pdf->cell($w*12,5,"Sanitaires",1,0,'C',1,0);                                                                                                                                                                                                                                                                                                                                                                                $pdf->cell($w*12,5,"Classes",1,0,'C',1,0);                                                                                                                                                                                                                                                                                                                                                                         $pdf->cell($w*12,5,"Eau",1,0,'C',1,0);        
$pdf->SetXY(35,$pdf->GetY()+5);                  $pdf->cell($w*4,5,"NBR anomalies",1,0,'C',1,0);                                                                                             $pdf->cell($w*4,5,"NBR anomalies c",1,0,'C',1,0);                                                                                       $pdf->cell($w*4,5,"% anomalies c",1,0,'C',1,0);                                                                                        $pdf->cell($w*4,5,"NBR anomalies",1,0,'C',1,0);                                                                                         $pdf->cell($w*4,5,"NBR anomalies c",1,0,'C',1,0);                                                                                       $pdf->cell($w*4,5,"%  anomalies c",1,0,'C',1,0);                                                                                       $pdf->cell($w*4,5,"NBR anomalies",1,0,'C',1,0);                                                                                                   $pdf->cell($w*4,5,"NBR anomalies c",1,0,'C',1,0);                                                                                           $pdf->cell($w*4,5,"% anomalies c",1,0,'C',1,0);   
$pdf->SetXY(35,$pdf->GetY()+5);                  $pdf->cell($w*4,5,"A8",1,0,'C',1,0);                                                                                                        $pdf->cell($w*4,5,"B8",1,0,'C',1,0);                                                                                                    $pdf->cell($w*4,5,"B8/A8",1,0,'C',1,0);                                                                                                $pdf->cell($w*4,5,"C8",1,0,'C',1,0);                                                                                                    $pdf->cell($w*4,5,"D8",1,0,'C',1,0);                                                                                                    $pdf->cell($w*4,5,"D8/C8",1,0,'C',1,0);                                                                                               $pdf->cell($w*4,5,"E8",1,0,'C',1,0);                                                                                                               $pdf->cell($w*4,5,"F8",1,0,'C',1,0);                                                                                                        $pdf->cell($w*4,5,"F8/E8",1,0,'C',1,0); 
$pdf->SetXY(35,$pdf->GetY()+5);                  $pdf->cell($w,5,"P",1,0,'C',1,0); $pdf->cell($w,5,"M",1,0,'C',1,0); $pdf->cell($w,5,"S",1,0,'C',1,0);$pdf->cell($w,5,"T",1,0,'C',1,0);      $pdf->cell($w,5,"P",1,0,'C',1,0); $pdf->cell($w,5,"M",1,0,'C',1,0); $pdf->cell($w,5,"S",1,0,'C',1,0);$pdf->cell($w,5,"T",1,0,'C',1,0);  $pdf->cell($w,5,"P",1,0,'C',1,0); $pdf->cell($w,5,"M",1,0,'C',1,0); $pdf->cell($w,5,"S",1,0,'C',1,0);$pdf->cell($w,5,"T",1,0,'C',1,0); $pdf->cell($w,5,"P",1,0,'C',1,0); $pdf->cell($w,5,"M",1,0,'C',1,0); $pdf->cell($w,5,"S",1,0,'C',1,0);$pdf->cell($w,5,"T",1,0,'C',1,0);  $pdf->cell($w,5,"P",1,0,'C',1,0); $pdf->cell($w,5,"M",1,0,'C',1,0); $pdf->cell($w,5,"S",1,0,'C',1,0);$pdf->cell($w,5,"T",1,0,'C',1,0);  $pdf->cell($w,5,"P",1,0,'C',1,0); $pdf->cell($w,5,"M",1,0,'C',1,0); $pdf->cell($w,5,"S",1,0,'C',1,0);$pdf->cell($w,5,"T",1,0,'C',1,0);$pdf->cell($w,5,"P",1,0,'C',1,0); $pdf->cell($w,5,"M",1,0,'C',1,0); $pdf->cell($w,5,"S",1,0,'C',1,0);$pdf->cell($w,5,"T",1,0,'C',1,0);             $pdf->cell($w,5,"P",1,0,'C',1,0); $pdf->cell($w,5,"M",1,0,'C',1,0); $pdf->cell($w,5,"S",1,0,'C',1,0);$pdf->cell($w,5,"T",1,0,'C',1,0);      $pdf->cell($w,5,"P",1,0,'C',1,0); $pdf->cell($w,5,"M",1,0,'C',1,0); $pdf->cell($w,5,"S",1,0,'C',1,0);$pdf->cell($w,5,"T",1,0,'C',1,0);        
$pdf->mysqlconnect();
$query = "SELECT * from ecole where iduds = $UDS  order by typeecole,ecole";
$resultat=mysql_query($query);
$totalmbr1=mysql_num_rows($resultat);
while($row=mysql_fetch_object($resultat))
{
	$pdf->SetXY(5,$pdf->GetY()+5);$pdf->SetFont('Times','B',7);
	$pdf->SetFillColor(250);$pdf->cell(30,5,strtoupper($row->ecole),1,0,'L',1,0);$pdf->SetFont('Times','B',10);
	
	$pdf->cell($w,5,"",1,0,'C',0,0); $pdf->cell($w,5,"",1,0,'C',0,0); $pdf->cell($w,5,"",1,0,'C',0,0);$pdf->cell($w,5,"",1,0,'C',0,0); 
	$pdf->cell($w,5,"",1,0,'C',0,0); $pdf->cell($w,5,"",1,0,'C',0,0); $pdf->cell($w,5,"",1,0,'C',0,0);$pdf->cell($w,5,"",1,0,'C',0,0); 
	$pdf->cell($w,5,"",1,0,'C',0,0); $pdf->cell($w,5,"",1,0,'C',0,0); $pdf->cell($w,5,"",1,0,'C',0,0);$pdf->cell($w,5,"",1,0,'C',0,0); 
	$pdf->cell($w,5,"",1,0,'C',0,0); $pdf->cell($w,5,"",1,0,'C',0,0); $pdf->cell($w,5,"",1,0,'C',0,0);$pdf->cell($w,5,"",1,0,'C',0,0); 
	$pdf->cell($w,5,"",1,0,'C',0,0); $pdf->cell($w,5,"",1,0,'C',0,0); $pdf->cell($w,5,"",1,0,'C',0,0);$pdf->cell($w,5,"",1,0,'C',0,0); 
	$pdf->cell($w,5,"",1,0,'C',0,0); $pdf->cell($w,5,"",1,0,'C',0,0); $pdf->cell($w,5,"",1,0,'C',0,0);$pdf->cell($w,5,"",1,0,'C',0,0); 
	$pdf->cell($w,5,"",1,0,'C',0,0); $pdf->cell($w,5,"",1,0,'C',0,0); $pdf->cell($w,5,"",1,0,'C',0,0);$pdf->cell($w,5,"",1,0,'C',0,0); 
	$pdf->cell($w,5,"",1,0,'C',0,0); $pdf->cell($w,5,"",1,0,'C',0,0); $pdf->cell($w,5,"",1,0,'C',0,0);$pdf->cell($w,5,"",1,0,'C',0,0); 
	$pdf->cell($w,5,"",1,0,'C',0,0); $pdf->cell($w,5,"",1,0,'C',0,0); $pdf->cell($w,5,"",1,0,'C',0,0);$pdf->cell($w,5,"",1,0,'C',0,0); 
	$pdf->SetFillColor(230);	
}
$pdf->SetFillColor(250);
$pdf->SetXY(5,$pdf->GetY()+5);$pdf->cell(30,5,"total uds",1,0,'L',1,0);$pdf->SetFont('Times','B',10);
$pdf->cell($w,5,"",1,0,'C',1,0); $pdf->cell($w,5,"",1,0,'C',1,0); $pdf->cell($w,5,"",1,0,'C',1,0);$pdf->cell($w,5,"",1,0,'C',1,0); 
$pdf->cell($w,5,"",1,0,'C',1,0); $pdf->cell($w,5,"",1,0,'C',1,0); $pdf->cell($w,5,"",1,0,'C',1,0);$pdf->cell($w,5,"",1,0,'C',1,0); 
$pdf->cell($w,5,"",1,0,'C',1,0); $pdf->cell($w,5,"",1,0,'C',1,0); $pdf->cell($w,5,"",1,0,'C',1,0);$pdf->cell($w,5,"",1,0,'C',1,0); 
$pdf->cell($w,5,"",1,0,'C',1,0); $pdf->cell($w,5,"",1,0,'C',1,0); $pdf->cell($w,5,"",1,0,'C',1,0);$pdf->cell($w,5,"",1,0,'C',1,0); 
$pdf->cell($w,5,"",1,0,'C',1,0); $pdf->cell($w,5,"",1,0,'C',1,0); $pdf->cell($w,5,"",1,0,'C',1,0);$pdf->cell($w,5,"",1,0,'C',1,0); 
$pdf->cell($w,5,"",1,0,'C',1,0); $pdf->cell($w,5,"",1,0,'C',1,0); $pdf->cell($w,5,"",1,0,'C',1,0);$pdf->cell($w,5,"",1,0,'C',1,0); 
$pdf->cell($w,5,"",1,0,'C',1,0); $pdf->cell($w,5,"",1,0,'C',1,0); $pdf->cell($w,5,"",1,0,'C',1,0);$pdf->cell($w,5,"",1,0,'C',1,0); 
$pdf->cell($w,5,"",1,0,'C',1,0); $pdf->cell($w,5,"",1,0,'C',1,0); $pdf->cell($w,5,"",1,0,'C',1,0);$pdf->cell($w,5,"",1,0,'C',1,0); 
$pdf->cell($w,5,"",1,0,'C',1,0); $pdf->cell($w,5,"",1,0,'C',1,0); $pdf->cell($w,5,"",1,0,'C',1,0);$pdf->cell($w,5,"",1,0,'C',1,0); 



}
if ($_POST['SS']=='5') //AFFECTION DEPISTE PAR eleve ok verifed
{
	$pdf->AddPage('L','A4');$pdf->SetFont('Times','B',10);$pdf->SetFillColor(230);
	$pdf->entetel($UDS,$structure,$datejour1,$datejour2,"AFFECTIONS DEPISTEES ",$palier);
	$x=45;$w=4.45;$h=42;$y=90;
	$pdf->listeaffection($x,$w,$h,$y);
	$pdf->SetXY(05,$y);
	$pdf->mysqlconnect();
	$query = "SELECT * FROM examenemg where UDS=$UDS";
	$resultat=mysql_query($query);
	$totalmbr1=mysql_num_rows($resultat);
	while($row=mysql_fetch_object($resultat))
	{
		$pdf->SetFont('Times','',8);
		$pdf->cell(40,5,$pdf->nbrtostring('eleve','id',$row->IDELEVE,'NOM').'_'.$pdf->nbrtostring('eleve','id',$row->IDELEVE,'PRENOM'),1,0,'L',1,0); $pdf->SetFont('Times','B',10); 
		for($i=1; $i< 55; $i+=1){$maladie='m'.$i;if($row->$maladie==1) {$pdf->cell(4.45,5,'x',1,0,'C',0,0);} else {$pdf->cell(4.45,5,'-',1,0,'C',0,0);}}
		$pdf->cell(4.45,5,$pdf->sumafection($row->id),1,0,'C',1,0);
		$pdf->SetXY(5,$pdf->GetY()+5); 
	}
	$pdf->cell(40,5,"Total UDS ",1,0,'C',1,0);
	for($i=1; $i< 55; $i+=1){$pdf->cell(4.45,5,$pdf->totafection('m'.$i),1,0,'C',1,0);}$pdf->cell(4.45,5,'',1,0,'C',1,0);
}

if ($_POST['SS']=='6') //AFFECTION DEPISTE PAR ECOLE
{
	$pdf->AddPage('L','A4');$pdf->SetFont('Times','B',10);$pdf->SetFillColor(230);
    $pdf->entetel($UDS,$structure,$datejour1,$datejour2,"AFFECTIONS DEPISTEES ",$palier);
	$x=45;$w=4.45;$h=42;$y=90;
	$pdf->listeaffection($x,$w,$h,$y);
	$pdf->SetXY(05,$y);
	$pdf->mysqlconnect();
	$query = "SELECT * from ecole where iduds = $UDS  order by ecole";
	$resultat=mysql_query($query);
	$totalmbr1=mysql_num_rows($resultat);
	$pdf->SetXY(5,$pdf->GetY());
	while($row=mysql_fetch_object($resultat))
	{
		$pdf->SetFont('Times','',7.5);
		$pdf->cell(40,5,strtoupper($row->ecole),1,0,'L',1,0);
		for($i=1; $i< 55; $i+=1){$pdf->cell($w,5,$pdf->affectionx($row->id,'m'.$i),1,0,'C',0,0);}//
		$pdf->cell($w,5,"tt",1,0,'C',1,0);
		$pdf->SetXY(5,$pdf->GetY()+5);
	}
	$pdf->cell(40,5,"Total UDS ",1,0,'C',1,0);
	for($i=1; $i< 55; $i+=1){$pdf->cell(4.45,5,$pdf->totafection('m'.$i),1,0,'C',1,0);}$pdf->cell(4.45,5,'',1,0,'C',1,0);	
}



if ($_POST['SS']=='9') //SBD
{
//1-DEPSTAGE//
$pdf->AddPage('P','A4');$pdf->SetFont('Times','B',10);$pdf->SetFillColor(230);
$pdf->SetAutoPageBreak($auto=true, $margin=0);
$pdf->entete($UDS,$structure,$datejour1,$datejour2);
$pdf->SetXY(5,$pdf->GetY()+10); $pdf->cell(24,5,"1",1,0,'C',1,0);                  $pdf->cell(176,5,"BILAN D'EVALUATION - DEPISTAGE",1,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+10); $pdf->cell(24,10,"1A",1,0,'C',1,0);                $pdf->cell(48,10,"Nombre d'élèves",1,0,'C',0,0);$pdf->cell(128,10,"Nombre d'élèves ayant",1,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+10); $pdf->cell(24,30,"Niveau scolaire",1,0,'C',0,0);  $pdf->cell(16,10,"Inscrits",1,0,'C',0,0);$pdf->cell(32,10,"Examinés",1,0,'C',0,0);                                  $pdf->cell(32,10,"Hygiène BD-NA",1,0,'C',0,0);                                 $pdf->cell(32,10,"Au moins une carie",1,0,'C',0,0);                                     $pdf->cell(32,10,"Une gingivite",1,0,'C',0,0);                                     $pdf->cell(32,10,"Une Anomalie ODF",1,0,'C',0,0);    
$pdf->SetXY(29,$pdf->GetY()+10);                                                   $pdf->cell(16,10,"Nbre",1,0,'C',0,0);    $pdf->cell(16,10,"Nbre",1,0,'C',0,0);$pdf->cell(16,10,"%",1,0,'C',0,0);    $pdf->cell(16,10,"Nbre",1,0,'C',0,0);  $pdf->cell(16,10,"%",1,0,'C',0,0);      $pdf->cell(16,10,"Nbre",1,0,'C',0,0);$pdf->cell(16,10,"%",1,0,'C',0,0);    $pdf->cell(16,10,"Nbre",1,0,'C',0,0); $pdf->cell(16,10,"%",1,0,'C',0,0);       $pdf->cell(16,10,"Nbre",1,0,'C',0,0);$pdf->cell(16,10,"%",1,0,'C',0,0);
$pdf->SetXY(29,$pdf->GetY()+10);                                                   $pdf->cell(16,10,"(A)",1,0,'C',0,0);     $pdf->cell(16,10,"(B)",1,0,'C',0,0); $pdf->cell(16,10,"(B/A)",1,0,'C',0,0);$pdf->cell(16,10,"(C)",1,0,'C',0,0);   $pdf->cell(16,10,"(C/B)",1,0,'C',0,0);  $pdf->cell(16,10,"X",1,0,'C',0,0);   $pdf->cell(16,10,"(X/B)",1,0,'C',0,0);$pdf->cell(16,10,"(D)",1,0,'C',0,0);  $pdf->cell(16,10,"(D/B)",1,0,'C',0,0);   $pdf->cell(16,10,"(E)",1,0,'C',0,0); $pdf->cell(16,10,"(E/B)",1,0,'C',0,0);
$pdf->lDEPISTAGE('1',$datejour1,$datejour2,$UDS);
$pdf->lDEPISTAGE('2',$datejour1,$datejour2,$UDS);
$pdf->lDEPISTAGE('6',$datejour1,$datejour2,$UDS);
$pdf->lTDEPISTAGE($datejour1,$datejour2,$UDS);
$pdf->SetXY(5,$pdf->GetY()+15); $pdf->cell(24,10,"1B",1,0,'C',1,0);                $pdf->cell(87.5,10,"Dents temporaires cao (petit)",1,0,'C',0,0);$pdf->cell(87.5,10,"Dents permanentes CAO (grand)",1,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+10); $pdf->cell(24,30,"Niveau scolaire",1,0,'C',0,0);   $pdf->cell(17.5,10,"c",1,0,'C',0,0);       $pdf->cell(17.5,10,"a",1,0,'C',0,0);   $pdf->cell(17.5,10,"o",1,0,'C',0,0);    $pdf->cell(17.5,10,"cao",1,0,'C',0,0);   $pdf->cell(17.5,10,"Icao",1,0,'C',0,0);    $pdf->cell(17.5,10,"C",1,0,'C',0,0);   $pdf->cell(17.5,10,"A",1,0,'C',0,0);    $pdf->cell(17.5,10,"O",1,0,'C',0,0);   $pdf->cell(17.5,10,"CAO",1,0,'C',0,0);     $pdf->cell(17.5,10,"ICAO",1,0,'C',0,0); 
$pdf->SetXY(29,$pdf->GetY()+10);                                                   $pdf->cell(17.5,10,"Nbre",1,0,'C',0,0);    $pdf->cell(17.5,10,"Nbre",1,0,'C',0,0);$pdf->cell(17.5,10,"Nbre",1,0,'C',0,0); $pdf->cell(17.5,10,"Nbre",1,0,'C',0,0);  $pdf->cell(17.5,10,"Nbre",1,0,'C',0,0);    $pdf->cell(17.5,10,"Nbre",1,0,'C',0,0);$pdf->cell(17.5,10,"Nbre",1,0,'C',0,0); $pdf->cell(17.5,10,"Nbre",1,0,'C',0,0);$pdf->cell(17.5,10,"Nbre",1,0,'C',0,0);    $pdf->cell(17.5,10,"Nbre",1,0,'C',0,0); 
$pdf->SetXY(29,$pdf->GetY()+10);                                                   $pdf->cell(17.5,10,"(F)",1,0,'C',0,0);     $pdf->cell(17.5,10,"(G)",1,0,'C',0,0); $pdf->cell(17.5,10,"(H)",1,0,'C',0,0);  $pdf->cell(17.5,10,"(I)",1,0,'C',0,0);   $pdf->cell(17.5,10,"(I/B)",1,0,'C',0,0);   $pdf->cell(17.5,10,"(J)",1,0,'C',0,0); $pdf->cell(17.5,10,"(K)",1,0,'C',0,0);  $pdf->cell(17.5,10,"(L)",1,0,'C',0,0); $pdf->cell(17.5,10,"(M)",1,0,'C',0,0);     $pdf->cell(17.5,10,"(M/B)",1,0,'C',0,0); 
$pdf->LDEPISTAGECAO('1',$datejour1,$datejour2,$UDS);
$pdf->LDEPISTAGECAO('2',$datejour1,$datejour2,$UDS);
$pdf->LDEPISTAGECAO('6',$datejour1,$datejour2,$UDS);
$pdf->LTDEPISTAGECAO($datejour1,$datejour2,$UDS);
$pdf->foot($login);
//2-PRISE EN CHARGE//
$pdf->AddPage('P','A4');$pdf->SetFont('Times','B',10);$pdf->SetFillColor(230);
$pdf->entete($UDS,$structure,$datejour1,$datejour2);
$pdf->SetXY(5,$pdf->GetY()+10); $pdf->cell(24,10,"2",1,0,'C',1,0);                 $pdf->cell(176,5,"BILAN D'EVALUATION - PRISE EN CHARGE",1,0,'C',0,0);
$pdf->SetFont('Times','B',9);
$pdf->SetXY(29,$pdf->GetY()+5); $pdf->cell(176,5,"NB : il est impératif d'assurer la prise en charge et le suivi des élèves d'année en année scolaire pour une cavité buccale saine",1,0,'C',0,0);
$pdf->SetFont('Times','B',10);
$pdf->SetXY(5,$pdf->GetY()+10); $pdf->cell(24,10,"2A",1,0,'C',1,0);               $pdf->cell(176,10,"Traitement des dents cariées ",1,0,'C',0,0);
//*****//
$pdf->SetXY(5,$pdf->GetY()+10); $pdf->cell(24,40,"Niveau scolaire",1,0,'C',0,0); $pdf->cell(43.98,10,"Nombre d'élèves ayant ",1,0,'C',0,0);$pdf->cell(102.62,10,"Nombre de dents",1,0,'C',0,0);$pdf->cell(29.32,10,"Nombre d'élèves",1,0,'C',0,0);
$pdf->SetXY(29,$pdf->GetY()+10);                                  $pdf->cell(14.66,10,"=> carie",1,0,'C',0,0);$pdf->cell(29.32,10,"reçus au cabinet",1,0,'C',0,0);                             $pdf->cell(14.66,10,"cariées",1,0,'C',0,0);$pdf->cell(29.32,10,"trt définitivement",1,0,'C',0,0);                          $pdf->cell(29.32,10,"trt provisoirement",1,0,'C',0,0);                          $pdf->cell(29.32,10,"Cariées non trt ",1,0,'C',0,0);$pdf->cell(29.32,10,"trt définitivement",1,0,'C',0,0);
$pdf->SetXY(29,$pdf->GetY()+10);                                  $pdf->cell(14.66,10,"Nbre",1,0,'C',0,0); $pdf->cell(14.66,10,"Nbre",1,0,'C',0,0);$pdf->cell(14.66,10,"%",1,0,'C',0,0);    $pdf->cell(14.66,10,"Nbre",1,0,'C',0,0);   $pdf->cell(14.66,10,"Nbre",1,0,'C',0,0);$pdf->cell(14.66,10,"%",1,0,'C',0,0);   $pdf->cell(14.66,10,"Nbre",1,0,'C',0,0);$pdf->cell(14.66,10,"%",1,0,'C',0,0);   $pdf->cell(14.66,10,"Nbre",1,0,'C',0,0);$pdf->cell(14.66,10,"%",1,0,'C',0,0);$pdf->cell(14.66,10,"Nbre",1,0,'C',0,0);$pdf->cell(14.66,10,"%",1,0,'C',0,0);
$pdf->SetXY(29,$pdf->GetY()+10);                                  $pdf->cell(14.66,10,"(X)",1,0,'C',0,0);  $pdf->cell(14.66,10,"(A)",1,0,'C',0,0); $pdf->cell(14.66,10,"(A/X)",1,0,'C',0,0);$pdf->cell(14.66,10,"(B)",1,0,'C',0,0);    $pdf->cell(14.66,10,"(C)",1,0,'C',0,0);$pdf->cell(14.66,10,"(C/B)",1,0,'C',0,0);$pdf->cell(14.66,10,"(D)",1,0,'C',0,0);$pdf->cell(14.66,10,"(D/B)",1,0,'C',0,0);$pdf->cell(14.66,10,"(E)",1,0,'C',0,0);$pdf->cell(14.66,10,"(E/B)",1,0,'C',0,0);$pdf->cell(14.66,10,"(F)",1,0,'C',0,0);$pdf->cell(14.66,10,"(F/A)",1,0,'C',0,0);

$pdf->TRTDC ('0',$datejour1,$datejour2,$UDS,10);
$pdf->TRTDC ('1',$datejour1,$datejour2,$UDS,5);



$pdf->SetXY(5,$pdf->GetY()+5);  
$pdf->cell(24,5,"Sub total",1,0,'L',0,0); 
$pdf->cell(14.66,5,"",1,0,'C',0,0);
$pdf->cell(14.66,5,"",1,0,'C',0,0);
$pdf->cell(14.66,5,"",1,0,'C',0,0);
$pdf->cell(14.66,5,"",1,0,'C',0,0);
$pdf->cell(14.66,5,"",1,0,'C',0,0);
$pdf->cell(14.66,5,"",1,0,'C',0,0);
$pdf->cell(14.66,5,"",1,0,'C',0,0);
$pdf->cell(14.66,5,"",1,0,'C',0,0);
$pdf->cell(14.66,5,"",1,0,'C',0,0);
$pdf->cell(14.66,5,"",1,0,'C',0,0);
$pdf->cell(14.66,5,"",1,0,'C',0,0);
$pdf->cell(14.66,5,"",1,0,'C',0,0);

$pdf->SetXY(5,$pdf->GetY()+5);  
$pdf->cell(24,5,"Autres",1,0,'L',0,0); 
$pdf->cell(14.66,5,"",1,0,'C',0,0);
$pdf->cell(14.66,5,"",1,0,'C',0,0);
$pdf->cell(14.66,5,"",1,0,'C',0,0);
$pdf->cell(14.66,5,"",1,0,'C',0,0);
$pdf->cell(14.66,5,"",1,0,'C',0,0);
$pdf->cell(14.66,5,"",1,0,'C',0,0);
$pdf->cell(14.66,5,"",1,0,'C',0,0);
$pdf->cell(14.66,5,"",1,0,'C',0,0);
$pdf->cell(14.66,5,"",1,0,'C',0,0);
$pdf->cell(14.66,5,"",1,0,'C',0,0);
$pdf->cell(14.66,5,"",1,0,'C',0,0);
$pdf->cell(14.66,5,"",1,0,'C',0,0);


$pdf->SetXY(5,$pdf->GetY()+5);  
$pdf->cell(24,5,"Moyen",1,0,'L',0,0); $pdf->cell(14.66,5,"",1,0,'C',0,0);$pdf->cell(14.66,5,"",1,0,'C',0,0);$pdf->cell(14.66,5,"",1,0,'C',0,0);$pdf->cell(14.66,5,"",1,0,'C',0,0);$pdf->cell(14.66,5,"",1,0,'C',0,0);$pdf->cell(14.66,5,"",1,0,'C',0,0);$pdf->cell(14.66,5,"",1,0,'C',0,0);$pdf->cell(14.66,5,"",1,0,'C',0,0);$pdf->cell(14.66,5,"",1,0,'C',0,0);$pdf->cell(14.66,5,"",1,0,'C',0,0);$pdf->cell(14.66,5,"",1,0,'C',0,0);$pdf->cell(14.66,5,"",1,0,'C',0,0);

$pdf->SetXY(5,$pdf->GetY()+5);  
$pdf->cell(24,5,"Secondaire",1,0,'L',0,0); $pdf->cell(14.66,5,"",1,0,'C',0,0);$pdf->cell(14.66,5,"",1,0,'C',0,0);$pdf->cell(14.66,5,"",1,0,'C',0,0);$pdf->cell(14.66,5,"",1,0,'C',0,0);$pdf->cell(14.66,5,"",1,0,'C',0,0);$pdf->cell(14.66,5,"",1,0,'C',0,0);$pdf->cell(14.66,5,"",1,0,'C',0,0);$pdf->cell(14.66,5,"",1,0,'C',0,0);$pdf->cell(14.66,5,"",1,0,'C',0,0);$pdf->cell(14.66,5,"",1,0,'C',0,0);$pdf->cell(14.66,5,"",1,0,'C',0,0);$pdf->cell(14.66,5,"",1,0,'C',0,0);

$pdf->SetXY(5,$pdf->GetY()+5);  
$pdf->cell(24,5,"Total",1,0,'L',1,0); $pdf->cell(14.66,5,"",1,0,'C',1,0);$pdf->cell(14.66,5,"",1,0,'C',1,0);$pdf->cell(14.66,5,"",1,0,'C',1,0);$pdf->cell(14.66,5,"",1,0,'C',1,0);$pdf->cell(14.66,5,"",1,0,'C',1,0);$pdf->cell(14.66,5,"",1,0,'C',1,0);$pdf->cell(14.66,5,"",1,0,'C',1,0);$pdf->cell(14.66,5,"",1,0,'C',1,0);$pdf->cell(14.66,5,"",1,0,'C',1,0);$pdf->cell(14.66,5,"",1,0,'C',1,0);$pdf->cell(14.66,5,"",1,0,'C',1,0);$pdf->cell(14.66,5,"",1,0,'C',1,0);
      
$pdf->SetXY(5,$pdf->GetY()+10);  
$pdf->cell(24,10,"2B",1,0,'C',1,0); 
$pdf->cell(75.42,10,"Gingivites",1,0,'C',0,0);
$pdf->cell(25.14,10,"Extractions ",1,0,'C',0,0);
$pdf->cell(75.42,10,"Anomalies ODF",1,0,'C',0,0);

$pdf->SetXY(5,$pdf->GetY()+10);  
$pdf->cell(24,10,"Niveau scolaire ",1,0,'L',0,0); 
$pdf->cell(25.14,5,"ayant gingivite",1,0,'C',0,0);
$pdf->cell(50.28,5,"traités pour gingivite",1,0,'C',0,0);
$pdf->cell(25.14,5,"Nbre de dents ",1,0,'C',0,0);
$pdf->cell(25.14,5,"anomalie ODF",1,0,'C',0,0);
$pdf->cell(50.28,5,"anomalie ODF",1,0,'C',0,0);

$pdf->SetXY(29,$pdf->GetY()+5);  

$pdf->cell(25.14,5,"(G)",1,0,'C',0,0);
$pdf->cell(25.14,5,"(H)",1,0,'C',0,0);
$pdf->cell(25.14,5,"(H/G)",1,0,'C',0,0);
$pdf->cell(25.14,5,"(I)",1,0,'C',0,0);
$pdf->cell(25.14,5,"(J)",1,0,'C',0,0);
$pdf->cell(25.14,5,"(K)",1,0,'C',0,0);
$pdf->cell(25.14,5,"(K/J)",1,0,'C',0,0);	

$pdf->SetXY(5,$pdf->GetY()+5);  
$pdf->cell(24,5,"Préscolaire",1,0,'L',0,0); 
$pdf->cell(25.14,5,"",1,0,'C',0,0);
$pdf->cell(25.14,5,"",1,0,'C',0,0);
$pdf->cell(25.14,5,"",1,0,'C',0,0);
$pdf->cell(25.14,5,"",1,0,'C',0,0);
$pdf->cell(25.14,5,"",1,0,'C',0,0);
$pdf->cell(25.14,5,"",1,0,'C',0,0);
$pdf->cell(25.14,5,"",1,0,'C',0,0);
	  
$pdf->SetXY(5,$pdf->GetY()+5);  
$pdf->cell(24,5,"1°AP",1,0,'L',0,0); 
$pdf->cell(25.14,5,"",1,0,'C',0,0);
$pdf->cell(25.14,5,"",1,0,'C',0,0);
$pdf->cell(25.14,5,"",1,0,'C',0,0);
$pdf->cell(25.14,5,"",1,0,'C',0,0);
$pdf->cell(25.14,5,"",1,0,'C',0,0);
$pdf->cell(25.14,5,"",1,0,'C',0,0);
$pdf->cell(25.14,5,"",1,0,'C',0,0);
 
$pdf->SetXY(5,$pdf->GetY()+5);  
$pdf->cell(24,5,"Sub total",1,0,'L',0,0); 
$pdf->cell(25.14,5,"",1,0,'C',0,0);
$pdf->cell(25.14,5,"",1,0,'C',0,0);
$pdf->cell(25.14,5,"",1,0,'C',0,0);
$pdf->cell(25.14,5,"",1,0,'C',0,0);
$pdf->cell(25.14,5,"",1,0,'C',0,0);
$pdf->cell(25.14,5,"",1,0,'C',0,0);
$pdf->cell(25.14,5,"",1,0,'C',0,0);	  
	  
$pdf->SetXY(5,$pdf->GetY()+5);  
$pdf->cell(24,5,"Autres",1,0,'L',0,0); 
$pdf->cell(25.14,5,"",1,0,'C',0,0);
$pdf->cell(25.14,5,"",1,0,'C',0,0);
$pdf->cell(25.14,5,"",1,0,'C',0,0);
$pdf->cell(25.14,5,"",1,0,'C',0,0);
$pdf->cell(25.14,5,"",1,0,'C',0,0);
$pdf->cell(25.14,5,"",1,0,'C',0,0);
$pdf->cell(25.14,5,"",1,0,'C',0,0);
	  
	  
$pdf->SetXY(5,$pdf->GetY()+5);  
$pdf->cell(24,5,"Moyen",1,0,'L',0,0);
$pdf->cell(25.14,5,"",1,0,'C',0,0);
$pdf->cell(25.14,5,"",1,0,'C',0,0);
$pdf->cell(25.14,5,"",1,0,'C',0,0);
$pdf->cell(25.14,5,"",1,0,'C',0,0);
$pdf->cell(25.14,5,"",1,0,'C',0,0);
$pdf->cell(25.14,5,"",1,0,'C',0,0);
$pdf->cell(25.14,5,"",1,0,'C',0,0);	  
 
	  
$pdf->SetXY(5,$pdf->GetY()+5);  
$pdf->cell(24,5,"Secondaire",1,0,'L',0,0); $pdf->cell(25.14,5,"",1,0,'C',0,0);$pdf->cell(25.14,5,"",1,0,'C',0,0);$pdf->cell(25.14,5,"",1,0,'C',0,0);$pdf->cell(25.14,5,"",1,0,'C',0,0);$pdf->cell(25.14,5,"",1,0,'C',0,0);$pdf->cell(25.14,5,"",1,0,'C',0,0);$pdf->cell(25.14,5,"",1,0,'C',0,0);	 	  	  
	  
	  
$pdf->SetXY(5,$pdf->GetY()+5);  
$pdf->cell(24,5,"Total",1,0,'L',1,0); $pdf->cell(25.14,5,"",1,0,'C',1,0);$pdf->cell(25.14,5,"",1,0,'C',1,0);$pdf->cell(25.14,5,"",1,0,'C',1,0);$pdf->cell(25.14,5,"",1,0,'C',1,0);$pdf->cell(25.14,5,"",1,0,'C',1,0);$pdf->cell(25.14,5,"",1,0,'C',1,0);$pdf->cell(25.14,5,"",1,0,'C',1,0);		  
	  
	  
$pdf->SetXY(5,$pdf->GetY()+10); $pdf->cell(24,10,"2C",1,0,'C',1,0);               $pdf->cell(176,10,"Scellement des sillons des dents (SSD) de 6 ans",1,0,'C',0,0);	  
	  
	  
$pdf->SetXY(5,$pdf->GetY()+10);  
$pdf->cell(24,10,"Niveau scolaire ",1,0,'L',0,0); 
$pdf->cell(36,5,"élèves reçu pour SSD6",1,0,'C',0,0);	  
$pdf->cell(48+40,5,"Nombre de dents de 6 ans avec sillons scellés",1,0,'C',0,0);	  
$pdf->cell(52,5,"élèves pris en charge pour SSD6",1,0,'C',0,0);	  
	  	  
$pdf->SetXY(29,$pdf->GetY()+5);  
$pdf->cell(36,5,"(L)",1,0,'C',0,0);	 
$pdf->cell(12,5,"16",1,0,'C',0,0);	  
$pdf->cell(12,5,"26",1,0,'C',0,0);	  
$pdf->cell(12,5,"36",1,0,'C',0,0);	  
$pdf->cell(12,5,"46",1,0,'C',0,0);	  
$pdf->cell(20,5,"Total (M)",1,0,'C',0,0);	  
$pdf->cell(20,5,"%M/(Lx4)",1,0,'C',0,0);	  
$pdf->cell(26,5,"Nbre(N)",1,0,'C',0,0);	  
$pdf->cell(26,5,"%(N/L)",1,0,'C',0,0);	  
	  	  
$pdf->SetXY(5,$pdf->GetY()+5);  
$pdf->cell(24,5,"1AP",1,0,'L',0,0);
$pdf->cell(36,5,"",1,0,'C',0,0);	 
$pdf->cell(12,5,"",1,0,'C',0,0);	  
$pdf->cell(12,5,"",1,0,'C',0,0);	  
$pdf->cell(12,5,"",1,0,'C',0,0);	  
$pdf->cell(12,5,"",1,0,'C',0,0);	  
$pdf->cell(20,5,"",1,0,'C',0,0);	  
$pdf->cell(20,5,"",1,0,'C',0,0);	  
$pdf->cell(26,5,"",1,0,'C',0,0);	  
$pdf->cell(26,5,"",1,0,'C',0,0);	  
$pdf->foot($login);
//3//
$pdf->AddPage('P','A4');
$pdf->entete($UDS,$structure,$datejour1,$datejour2);
$pdf->SetXY(5,$pdf->GetY()+10); $pdf->cell(24,5,"3",1,0,'C',1,0);                 $pdf->cell(176,5,"BILAN D'EVALUATION - SUIVI SYSTEMATIQUE DE LA PRISE EN CHARGE",1,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+10); $pdf->cell(24,10,"3A",1,0,'C',1,0);               $pdf->cell(72,10,"NBR D'ELEVES ",1,0,'C',0,0); $pdf->cell(72,10,"NBR DE DENTS CARIEES  ",1,0,'C',0,0);$pdf->cell(32,10,"NBR D'ELEVES",1,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+10);  
$pdf->cell(24,10,"Niveau scolaire",1,0,'L',0,0);
$pdf->cell(18,5,"Inscrits",1,0,'C',0,0);	  
$pdf->cell(18,5,"Reçus P-S",1,0,'C',0,0);	  
$pdf->cell(18,5,"Reçus P-1",1,0,'C',0,0);	  
$pdf->cell(18,5,"Total",1,0,'C',0,0);	  
$pdf->cell(18,5,"TRT P",1,0,'C',0,0);	  
$pdf->cell(18,5,"N TRT",1,0,'C',0,0);	  
$pdf->cell(36,5,"TRT D",1,0,'C',0,0);	  
$pdf->cell(32,5,"C TRT D",1,0,'C',0,0);	  
$pdf->SetXY(29,$pdf->GetY()+5);
$pdf->cell(18,5,"Nbre(A)",1,0,'C',0,0);	  
$pdf->cell(18,5,"Nbre(B)",1,0,'C',0,0);	  
$pdf->cell(18,5,"Nbre(C)",1,0,'C',0,0);	  
$pdf->cell(18,5,"(D)=B+C",1,0,'C',0,0);	  
$pdf->cell(18,5,"Nbre(E)",1,0,'C',0,0);	  
$pdf->cell(18,5,"Nbre(F)",1,0,'C',0,0);	  
$pdf->cell(18,5,"Nbre(G)",1,0,'C',0,0);	  
$pdf->cell(18,5,"%G/(E+F)",1,0,'C',0,0);	  
$pdf->cell(16,5,"NbreH",1,0,'C',0,0);	  
$pdf->cell(16,5,"%(H/D)",1,0,'C',0,0);	

$pdf->SetXY(5,$pdf->GetY()+5);$pdf->cell(24,10,"2AP (:".(date('y')+0).'-'.(date('y')+1).')',1,0,'L',0,0);$pdf->cell(18,10,"",1,0,'C',0,0);$pdf->cell(18,10,"",1,0,'C',0,0);$pdf->cell(18,10,"",1,0,'C',0,0);$pdf->cell(18,10,"",1,0,'C',0,0);$pdf->cell(18,10,"",1,0,'C',0,0);$pdf->cell(18,10,"",1,0,'C',0,0);$pdf->cell(18,10,"",1,0,'C',0,0);$pdf->cell(18,10,"",1,0,'C',0,0);$pdf->cell(16,10,"",1,0,'C',0,0);$pdf->cell(16,10,"",1,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+10);$pdf->cell(24,10,"3AP (:".(date('y')+1).'-'.(date('y')+2).')',1,0,'L',0,0);$pdf->cell(18,10,"",1,0,'C',0,0);$pdf->cell(18,10,"",1,0,'C',0,0);$pdf->cell(18,10,"",1,0,'C',0,0);$pdf->cell(18,10,"",1,0,'C',0,0);$pdf->cell(18,10,"",1,0,'C',0,0);$pdf->cell(18,10,"",1,0,'C',0,0);$pdf->cell(18,10,"",1,0,'C',0,0);$pdf->cell(18,10,"",1,0,'C',0,0);$pdf->cell(16,10,"",1,0,'C',0,0);$pdf->cell(16,10,"",1,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+10);$pdf->cell(24,10,"4AP (:".(date('y')+2).'-'.(date('y')+3).')',1,0,'L',0,0);$pdf->cell(18,10,"",1,0,'C',0,0);$pdf->cell(18,10,"",1,0,'C',0,0);$pdf->cell(18,10,"",1,0,'C',0,0);$pdf->cell(18,10,"",1,0,'C',0,0);$pdf->cell(18,10,"",1,0,'C',0,0);$pdf->cell(18,10,"",1,0,'C',0,0);$pdf->cell(18,10,"",1,0,'C',0,0);$pdf->cell(18,10,"",1,0,'C',0,0);$pdf->cell(16,10,"",1,0,'C',0,0);$pdf->cell(16,10,"",1,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+10);$pdf->cell(24,10,"5AP (:".(date('y')+3).'-'.(date('y')+4).')',1,0,'L',0,0);$pdf->cell(18,10,"",1,0,'C',0,0);$pdf->cell(18,10,"",1,0,'C',0,0);$pdf->cell(18,10,"",1,0,'C',0,0);$pdf->cell(18,10,"",1,0,'C',0,0);$pdf->cell(18,10,"",1,0,'C',0,0);$pdf->cell(18,10,"",1,0,'C',0,0);$pdf->cell(18,10,"",1,0,'C',0,0);$pdf->cell(18,10,"",1,0,'C',0,0);$pdf->cell(16,10,"",1,0,'C',0,0);$pdf->cell(16,10,"",1,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+10);$pdf->cell(24,10,"Sub total",1,0,'L',0,0);                                 $pdf->cell(18,10,"",1,0,'C',0,0);$pdf->cell(18,10,"",1,0,'C',0,0);$pdf->cell(18,10,"",1,0,'C',0,0);$pdf->cell(18,10,"",1,0,'C',0,0);$pdf->cell(18,10,"",1,0,'C',0,0);$pdf->cell(18,10,"",1,0,'C',0,0);$pdf->cell(18,10,"",1,0,'C',0,0);$pdf->cell(18,10,"",1,0,'C',0,0);$pdf->cell(16,10,"",1,0,'C',0,0);$pdf->cell(16,10,"",1,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+10);$pdf->cell(24,10,"Moyen",1,0,'L',0,0);                                     $pdf->cell(18,10,"",1,0,'C',0,0);$pdf->cell(18,10,"",1,0,'C',0,0);$pdf->cell(18,10,"",1,0,'C',0,0);$pdf->cell(18,10,"",1,0,'C',0,0);$pdf->cell(18,10,"",1,0,'C',0,0);$pdf->cell(18,10,"",1,0,'C',0,0);$pdf->cell(18,10,"",1,0,'C',0,0);$pdf->cell(18,10,"",1,0,'C',0,0);$pdf->cell(16,10,"",1,0,'C',0,0);$pdf->cell(16,10,"",1,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+10);$pdf->cell(24,10,"Secondaire",1,0,'L',0,0);                                $pdf->cell(18,10,"",1,0,'C',0,0);$pdf->cell(18,10,"",1,0,'C',0,0);$pdf->cell(18,10,"",1,0,'C',0,0);$pdf->cell(18,10,"",1,0,'C',0,0);$pdf->cell(18,10,"",1,0,'C',0,0);$pdf->cell(18,10,"",1,0,'C',0,0);$pdf->cell(18,10,"",1,0,'C',0,0);$pdf->cell(18,10,"",1,0,'C',0,0);$pdf->cell(16,10,"",1,0,'C',0,0);$pdf->cell(16,10,"",1,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+10);$pdf->cell(24,10,"Total Global",1,0,'L',0,0);                              $pdf->cell(18,10,"",1,0,'C',0,0);$pdf->cell(18,10,"",1,0,'C',0,0);$pdf->cell(18,10,"",1,0,'C',0,0);$pdf->cell(18,10,"",1,0,'C',0,0);$pdf->cell(18,10,"",1,0,'C',0,0);$pdf->cell(18,10,"",1,0,'C',0,0);$pdf->cell(18,10,"",1,0,'C',0,0);$pdf->cell(18,10,"",1,0,'C',0,0);$pdf->cell(16,10,"",1,0,'C',0,0);$pdf->cell(16,10,"",1,0,'C',0,0);


$pdf->SetXY(5,$pdf->GetY()+15); $pdf->cell(24,10,"3B",1,0,'C',1,0);               $pdf->cell(176,10,"Scellement des sillons des dents (SSD) de 6 ans",1,0,'C',0,0);	  
$pdf->SetXY(5,$pdf->GetY()+10);  
$pdf->cell(24,10,"Niveau scolaire ",1,0,'L',0,0); 
$pdf->cell(36,5,"élèves reçu pour SSD6",1,0,'C',0,0);	  
$pdf->cell(48+40,5,"Nombre de dents de 6 ans avec sillons scellés",1,0,'C',0,0);	  
$pdf->cell(52,5,"élèves pris en charge pour SSD6",1,0,'C',0,0);	  
	  	  
$pdf->SetXY(29,$pdf->GetY()+5);  

$pdf->cell(36,5,"(L)",1,0,'C',0,0);	 
$pdf->cell(12,5,"16",1,0,'C',0,0);	  
$pdf->cell(12,5,"26",1,0,'C',0,0);	  
$pdf->cell(12,5,"36",1,0,'C',0,0);	  
$pdf->cell(12,5,"46",1,0,'C',0,0);	  
$pdf->cell(20,5,"Total (M)",1,0,'C',0,0);	  
$pdf->cell(20,5,"%M/(Lx4)",1,0,'C',0,0);	  
$pdf->cell(26,5,"Nbre(N)",1,0,'C',0,0);	  
$pdf->cell(26,5,"%(N/L)",1,0,'C',0,0);	  
	  	  
$pdf->SetXY(5,$pdf->GetY()+5);  
$pdf->cell(24,5,"2AP",1,0,'L',0,0);
$pdf->cell(36,5,"",1,0,'C',0,0);	 
$pdf->cell(12,5,"",1,0,'C',0,0);	  
$pdf->cell(12,5,"",1,0,'C',0,0);	  
$pdf->cell(12,5,"",1,0,'C',0,0);	  
$pdf->cell(12,5,"",1,0,'C',0,0);	  
$pdf->cell(20,5,"",1,0,'C',0,0);	  
$pdf->cell(20,5,"",1,0,'C',0,0);	  
$pdf->cell(26,5,"",1,0,'C',0,0);	  
$pdf->cell(26,5,"",1,0,'C',0,0);

$pdf->foot($login);
//4//
$pdf->AddPage('P','A4');
$pdf->entete($UDS,$structure,$datejour1,$datejour2);
$pdf->SetXY(5,$pdf->GetY()+10); $pdf->cell(24,5,"4",1,0,'C',1,0);                 $pdf->cell(176,5,"BILAN D'EVALUATION - EDUCATION POUR LA SANTE BUCCO-DENTAIRE",1,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+10); $pdf->cell(24,10,"4A",1,0,'C',1,0);               $pdf->cell(72,10,"NBR D'ELEVES ",1,0,'C',0,0); $pdf->cell(72,10,"NBR DE DENTS CARIEES  ",1,0,'C',0,0);$pdf->cell(32,10,"NBR D'ELEVES",1,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+10);$pdf->cell(24,30,"Niveau scolaire",1,0,'L',0,0);   $pdf->cell(22,10,"Nbr Total de",1,0,'C',0,0);$pdf->cell(22,10,"Total d'élèves ",1,0,'C',0,0);$pdf->cell(132,10,"Nombre d'élèves ayant bénéficié des séances d'éducation pour la santé bucco-dentaire ",1,0,'C',0,0);	  
$pdf->SetXY(29,$pdf->GetY()+10); $pdf->cell(22,10,"Classes",1,0,'C',0,0);         $pdf->cell(22,10,"inscrits ",1,0,'C',0,0);$pdf->cell(44,10,"Généralités sur la SBD",1,0,'C',0,0);$pdf->cell(44,10,"Brossage des dents Se-Th",1,0,'C',0,0);$pdf->cell(44,10,"Brossage des dents Se-Pr",1,0,'C',0,0);	  
$pdf->SetXY(29,$pdf->GetY()+10); $pdf->cell(22,10,"Nbre(A)",1,0,'C',0,0);         $pdf->cell(22,10,"Nbre(B)",1,0,'C',0,0);$pdf->cell(22,10,"Nbre(C)",1,0,'C',0,0);$pdf->cell(22,10,"%(B/C)",1,0,'C',0,0);$pdf->cell(22,10,"Nbre(D)",1,0,'C',0,0);$pdf->cell(22,10,"%(D/B)",1,0,'C',0,0);$pdf->cell(22,10,"Nbre(E)",1,0,'C',0,0);$pdf->cell(22,10,"%(E/B)",1,0,'C',0,0);	
$pdf->SetXY(5,$pdf->GetY()+10); $pdf->cell(24,10,"Préscolaire",1,0,'L',0,0);$pdf->cell(22,10,"",1,0,'C',0,0);	  $pdf->cell(22,10,"",1,0,'C',0,0);	  $pdf->cell(22,10,"",1,0,'C',0,0);	  $pdf->cell(22,10,"",1,0,'C',0,0);	  $pdf->cell(22,10,"",1,0,'C',0,0);	  $pdf->cell(22,10,"",1,0,'C',0,0);	  $pdf->cell(22,10,"",1,0,'C',0,0);	  $pdf->cell(22,10,"",1,0,'C',0,0);	
$pdf->SetXY(5,$pdf->GetY()+10); $pdf->cell(24,10,"1AP",1,0,'L',0,0);$pdf->cell(22,10,"",1,0,'C',0,0);	          $pdf->cell(22,10,"",1,0,'C',0,0);	  $pdf->cell(22,10,"",1,0,'C',0,0);	  $pdf->cell(22,10,"",1,0,'C',0,0);	  $pdf->cell(22,10,"",1,0,'C',0,0);	  $pdf->cell(22,10,"",1,0,'C',0,0);	  $pdf->cell(22,10,"",1,0,'C',0,0);	  $pdf->cell(22,10,"",1,0,'C',0,0);	
$pdf->SetXY(5,$pdf->GetY()+10); $pdf->cell(24,10,"Sub total",1,0,'L',0,0);$pdf->cell(22,10,"",1,0,'C',0,0);	      $pdf->cell(22,10,"",1,0,'C',0,0);	  $pdf->cell(22,10,"",1,0,'C',0,0);	  $pdf->cell(22,10,"",1,0,'C',0,0);	  $pdf->cell(22,10,"",1,0,'C',0,0);	  $pdf->cell(22,10,"",1,0,'C',0,0);	  $pdf->cell(22,10,"",1,0,'C',0,0);	  $pdf->cell(22,10,"",1,0,'C',0,0);	
$pdf->SetXY(5,$pdf->GetY()+10); $pdf->cell(24,10,"3AP",1,0,'L',0,0);$pdf->cell(22,10,"",1,0,'C',0,0);	          $pdf->cell(22,10,"",1,0,'C',0,0);	  $pdf->cell(22,10,"",1,0,'C',0,0);	  $pdf->cell(22,10,"",1,0,'C',0,0);	  $pdf->cell(22,10,"",1,0,'C',0,0);	  $pdf->cell(22,10,"",1,0,'C',0,0);	  $pdf->cell(22,10,"",1,0,'C',0,0);	  $pdf->cell(22,10,"",1,0,'C',0,0);	
$pdf->SetXY(5,$pdf->GetY()+10); $pdf->cell(24,10,"4AP",1,0,'L',0,0);$pdf->cell(22,10,"",1,0,'C',0,0);	          $pdf->cell(22,10,"",1,0,'C',0,0);	  $pdf->cell(22,10,"",1,0,'C',0,0);	  $pdf->cell(22,10,"",1,0,'C',0,0);	  $pdf->cell(22,10,"",1,0,'C',0,0);	  $pdf->cell(22,10,"",1,0,'C',0,0);	  $pdf->cell(22,10,"",1,0,'C',0,0);	  $pdf->cell(22,10,"",1,0,'C',0,0);	
$pdf->SetXY(5,$pdf->GetY()+10); $pdf->cell(24,10,"5AP",1,0,'L',0,0);$pdf->cell(22,10,"",1,0,'C',0,0);	          $pdf->cell(22,10,"",1,0,'C',0,0);	  $pdf->cell(22,10,"",1,0,'C',0,0);	  $pdf->cell(22,10,"",1,0,'C',0,0);	  $pdf->cell(22,10,"",1,0,'C',0,0);	  $pdf->cell(22,10,"",1,0,'C',0,0);	  $pdf->cell(22,10,"",1,0,'C',0,0);	  $pdf->cell(22,10,"",1,0,'C',0,0);	
$pdf->SetXY(5,$pdf->GetY()+10); $pdf->cell(24,10,"Sub total",1,0,'L',0,0);$pdf->cell(22,10,"",1,0,'C',0,0);	      $pdf->cell(22,10,"",1,0,'C',0,0);	  $pdf->cell(22,10,"",1,0,'C',0,0);	  $pdf->cell(22,10,"",1,0,'C',0,0);	  $pdf->cell(22,10,"",1,0,'C',0,0);	  $pdf->cell(22,10,"",1,0,'C',0,0);	  $pdf->cell(22,10,"",1,0,'C',0,0);	  $pdf->cell(22,10,"",1,0,'C',0,0);	
$pdf->SetXY(5,$pdf->GetY()+10); $pdf->cell(24,10,"Moyen",1,0,'L',0,0);$pdf->cell(22,10,"",1,0,'C',0,0);	          $pdf->cell(22,10,"",1,0,'C',0,0);	  $pdf->cell(22,10,"",1,0,'C',0,0);	  $pdf->cell(22,10,"",1,0,'C',0,0);	  $pdf->cell(22,10,"",1,0,'C',0,0);	  $pdf->cell(22,10,"",1,0,'C',0,0);	  $pdf->cell(22,10,"",1,0,'C',0,0);	  $pdf->cell(22,10,"",1,0,'C',0,0);	
$pdf->SetXY(5,$pdf->GetY()+10); $pdf->cell(24,10,"Secondaire",1,0,'L',0,0);$pdf->cell(22,10,"",1,0,'C',0,0);	  $pdf->cell(22,10,"",1,0,'C',0,0);	  $pdf->cell(22,10,"",1,0,'C',0,0);	  $pdf->cell(22,10,"",1,0,'C',0,0);	  $pdf->cell(22,10,"",1,0,'C',0,0);	  $pdf->cell(22,10,"",1,0,'C',0,0);	  $pdf->cell(22,10,"",1,0,'C',0,0);	  $pdf->cell(22,10,"",1,0,'C',0,0);	
$pdf->SetXY(5,$pdf->GetY()+10); $pdf->cell(24,10,"Sub total",1,0,'L',0,0);$pdf->cell(22,10,"",1,0,'C',0,0);	      $pdf->cell(22,10,"",1,0,'C',0,0);	  $pdf->cell(22,10,"",1,0,'C',0,0);	  $pdf->cell(22,10,"",1,0,'C',0,0);	  $pdf->cell(22,10,"",1,0,'C',0,0);	  $pdf->cell(22,10,"",1,0,'C',0,0);	  $pdf->cell(22,10,"",1,0,'C',0,0);	  $pdf->cell(22,10,"",1,0,'C',0,0);	
$pdf->SetXY(5,$pdf->GetY()+10); $pdf->cell(24,10,"TotalGlobal",1,0,'L',0,0);$pdf->cell(22,10,"",1,0,'C',0,0);	  $pdf->cell(22,10,"",1,0,'C',0,0);	  $pdf->cell(22,10,"",1,0,'C',0,0);	  $pdf->cell(22,10,"",1,0,'C',0,0);	  $pdf->cell(22,10,"",1,0,'C',0,0);	  $pdf->cell(22,10,"",1,0,'C',0,0);	  $pdf->cell(22,10,"",1,0,'C',0,0);	  $pdf->cell(22,10,"",1,0,'C',0,0);	
$pdf->foot($login);
//5//
$pdf->AddPage('P','A4');
$pdf->entete($UDS,$structure,$datejour1,$datejour2);
$pdf->SetXY(5,$pdf->GetY()+10); $pdf->cell(24,5,"5",1,0,'C',1,0);                 $pdf->cell(176,5,"BILAN D'EVALUATION - CAMPAGNES D'EDUCATION SANITAIRE ET DE COMMUNICATION SOCIALE",1,0,'C',0,0);

// $pdf->SetXY(5,$pdf->GetY()+10); 
// $pdf->cell(24,10,"THEMES",1,0,'C',1,0);               
// $pdf->cell(16,10,"",1,0,'C',0,0);
// $pdf->cell(16,10,"",1,0,'C',0,0);
// $pdf->cell(16,10,"",1,0,'C',0,0);
// $pdf->cell(16,10,"Nombre d’intervenants",1,0,'C',0,0);
// $pdf->cell(102,10,"Equipe de l’UDS ",1,0,'C',0,0);

$pdf->SetXY(5,$pdf->GetY()+10);
$pdf->cell(24,10,"5A",1,0,'C',1,0); 
$pdf->cell(18,10,"Date",1,0,'C',0,0);
$pdf->cell(18,10,"Population",1,0,'C',0,0);
$pdf->cell(18,10,"Lieu",1,0,'C',0,0);
$pdf->cell(17,10,"Supports",1,0,'C',0,0);
$pdf->cell(105,10,"Nombre d'intervenants",1,0,'C',0,0);

$pdf->SetXY(5,$pdf->GetY()+10); 
$pdf->cell(24,20,"THEMES",1,0,'C',0,0);               
$pdf->cell(18,10,"évènements",1,0,'C',0,0);
$pdf->cell(18,10,"cible",1,0,'C',0,0);
$pdf->cell(18,10,"évènements",1,0,'C',0,0);
$pdf->cell(17,10,"moyens",1,0,'C',0,0);
$pdf->cell(60,10,"Equipe de l'UDS ",1,0,'C',0,0);
$pdf->cell(45,10,"Autres ",1,0,'C',0,0);


$pdf->SetXY(29,$pdf->GetY()+10);
$pdf->cell(18,10," ",1,0,'C',0,0);
$pdf->cell(18,10," ",1,0,'C',0,0);
$pdf->cell(18,10," ",1,0,'C',0,0);
$pdf->cell(17,10,"utilisés",1,0,'C',0,0);
$pdf->cell(15,10,"MED-D ",1,0,'C',0,0);
$pdf->cell(15,10,"MED-G ",1,0,'C',0,0);
$pdf->cell(15,10,"PSY-C ",1,0,'C',0,0);
$pdf->cell(15,10,"PARA-M ",1,0,'C',0,0);
$pdf->cell(15,10,"ENSEG ",1,0,'C',0,0);
$pdf->cell(15,10,"CLUB-S ",1,0,'C',0,0);
$pdf->cell(15,10,"ASSOC ",1,0,'C',0,0);

$pdf->SetXY(5,$pdf->GetY()+10);$pdf->cell(24,10,"Th1 :",1,0,'L',0,0); $pdf->cell(18,10," ",1,0,'C',0,0);$pdf->cell(18,10," ",1,0,'C',0,0);$pdf->cell(18,10," ",1,0,'C',0,0);$pdf->cell(17,10," ",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+10);$pdf->cell(24,10,"Th2 :",1,0,'L',0,0); $pdf->cell(18,10," ",1,0,'C',0,0);$pdf->cell(18,10," ",1,0,'C',0,0);$pdf->cell(18,10," ",1,0,'C',0,0);$pdf->cell(17,10," ",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+10);$pdf->cell(24,10,"Th3 :",1,0,'L',0,0); $pdf->cell(18,10," ",1,0,'C',0,0);$pdf->cell(18,10," ",1,0,'C',0,0);$pdf->cell(18,10," ",1,0,'C',0,0);$pdf->cell(17,10," ",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+10);$pdf->cell(24,10,"Th4 :",1,0,'L',0,0); $pdf->cell(18,10," ",1,0,'C',0,0);$pdf->cell(18,10," ",1,0,'C',0,0);$pdf->cell(18,10," ",1,0,'C',0,0);$pdf->cell(17,10," ",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+10);$pdf->cell(24,10,"Th5 :",1,0,'L',0,0); $pdf->cell(18,10," ",1,0,'C',0,0);$pdf->cell(18,10," ",1,0,'C',0,0);$pdf->cell(18,10," ",1,0,'C',0,0);$pdf->cell(17,10," ",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+10);$pdf->cell(24,10,"Th6 :",1,0,'L',0,0); $pdf->cell(18,10," ",1,0,'C',0,0);$pdf->cell(18,10," ",1,0,'C',0,0);$pdf->cell(18,10," ",1,0,'C',0,0);$pdf->cell(17,10," ",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+10);$pdf->cell(24,10,"Th7 :",1,0,'L',0,0); $pdf->cell(18,10," ",1,0,'C',0,0);$pdf->cell(18,10," ",1,0,'C',0,0);$pdf->cell(18,10," ",1,0,'C',0,0);$pdf->cell(17,10," ",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+10);$pdf->cell(24,10,"Th8 :",1,0,'L',0,0); $pdf->cell(18,10," ",1,0,'C',0,0);$pdf->cell(18,10," ",1,0,'C',0,0);$pdf->cell(18,10," ",1,0,'C',0,0);$pdf->cell(17,10," ",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+10);$pdf->cell(24,10,"Th9 :",1,0,'L',0,0); $pdf->cell(18,10," ",1,0,'C',0,0);$pdf->cell(18,10," ",1,0,'C',0,0);$pdf->cell(18,10," ",1,0,'C',0,0);$pdf->cell(17,10," ",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+10);$pdf->cell(24,10,"Th10 :",1,0,'L',0,0); $pdf->cell(18,10," ",1,0,'C',0,0);$pdf->cell(18,10," ",1,0,'C',0,0);$pdf->cell(18,10," ",1,0,'C',0,0);$pdf->cell(17,10," ",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+10);$pdf->cell(24,10,"Th11 :",1,0,'L',0,0); $pdf->cell(18,10," ",1,0,'C',0,0);$pdf->cell(18,10," ",1,0,'C',0,0);$pdf->cell(18,10," ",1,0,'C',0,0);$pdf->cell(17,10," ",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+10);$pdf->cell(24,10,"Nbr themes :",1,0,'L',0,0); $pdf->cell(18,10," ",1,0,'C',0,0);$pdf->cell(18,10," ",1,0,'C',0,0);$pdf->cell(18,10," ",1,0,'C',0,0);$pdf->cell(17,10," ",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);$pdf->cell(15,10,"",1,0,'C',0,0);



$pdf->foot($login);
}




$pdf->Output("UDS".'----'.".PDF",'I');
?>
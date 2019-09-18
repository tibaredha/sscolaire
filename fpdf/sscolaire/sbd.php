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





if ($_POST['SS']=='0') //liste nominative par medecin uds
{
	$pdf->AddPage('L','A4');$pdf->SetFont('Times','B',10);$pdf->SetFillColor(230);
	$pdf->SetXY(5,10);             $pdf->cell(288,5,$pdf->mspfr,1,0,'C',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5); $pdf->cell(288,5,$pdf->dspfr,1,0,'C',1,0);
	// $pdf->entete($UDS,$structure,$datejour1,$datejour2);
	$pdf->SetXY(5,$pdf->GetY()+8); $pdf->cell(96,5,'UDS : '.$pdf->nbrtostring('uds','id',$UDS,'uds'),1,0,'L',1,0);$pdf->cell(96,5,'Liste nominative des élèves (Médecin)',1,0,'C',1,0);$pdf->cell(96,5,'établissement scolaire : '.$pdf->nbrtostring('ecole','id',substr($ecole, 1, 2),'ecole'),1,0,'L',1,0);
	$w=9;$h=42;$y=75;
	$pdf->SetXY(05,$y-42); $pdf->cell(45,$h,"NOM_prénom (fils de) ",1,0,1,'L',0);
	$pdf->Rotatedcell(50+(0*$w),$y,$h,$w,'Vaccination incomplete',90);
	$pdf->Rotatedcell(50+(1*$w),$y,$h,$w,'Absence cicatrice BCG',90);
	$pdf->Rotatedcell(50+(2*$w),$y,$h,$w,'Pediculose',90);
	$pdf->Rotatedcell(50+(3*$w),$y,$h,$w,'Gale',90);
	$pdf->Rotatedcell(50+(4*$w),$y,$h,$w,'Deformation des membres',90);
	$pdf->Rotatedcell(50+(5*$w),$y,$h,$w,'Baisse acuite visuelle',90);
	$pdf->Rotatedcell(50+(6*$w),$y,$h,$w,'Strabisme',90);
	$pdf->Rotatedcell(50+(7*$w),$y,$h,$w,'Antecedents de RAA',90);
	$pdf->Rotatedcell(50+(8*$w),$y,$h,$w,'Diabete',90);
	$pdf->Rotatedcell(50+(9*$w),$y,$h,$w,'Asthme',90);
	$pdf->Rotatedcell(50+(10*$w),$y,$h,$w,'Epilepsie',90);
	$pdf->Rotatedcell(50+(11*$w),$y,$h,$w,'Difficultes scolaires',90);
	$pdf->Rotatedcell(50+(12*$w),$y,$h,$w,'Troubles comportement',90);
	$pdf->Rotatedcell(50+(13*$w),$y,$h,$w,'Troubles langage',90);
	$pdf->Rotatedcell(50+(14*$w),$y,$h,$w,'Surdite Hypoacousie',90);
	$pdf->Rotatedcell(50+(15*$w),$y,$h,$w,'Trachome',90);
	$pdf->Rotatedcell(50+(16*$w),$y,$h,$w,'Oxyurose',90);
	$pdf->Rotatedcell(50+(17*$w),$y,$h,$w,'Enuresie',90);
	$pdf->Rotatedcell(50+(18*$w),$y,$h,$w,'Troubles urinaires',90);
	$pdf->Rotatedcell(50+(19*$w),$y,$h,$w,'Ptosis Nystagmus',90);
	$pdf->Rotatedcell(50+(20*$w),$y,$h,$w,'Paleur conjonctivale',90);
	$pdf->Rotatedcell(50+(21*$w),$y,$h,$w,'Goitre',90);
	$pdf->Rotatedcell(50+(22*$w),$y,$h,$w,'Souffle cardiaque',90);
	$pdf->Rotatedcell(50+(23*$w),$y,$h,$w,'Deformations du rachis',90);
	$pdf->Rotatedcell(50+(24*$w),$y,$h,$w,'Ectopie testiculaire',90);
	$pdf->Rotatedcell(50+(25*$w),$y,$h,$w+9,'Date examen',90);
	// $pdf->Rotatedcell(50+(26*$w),$y,$h,$w,'Total eleves examines',90);
	$pdf->SetXY(05,$y);
	$pdf->mysqlconnect();
	$query = "SELECT * FROM eleve where UDS=$UDS and ECOLE $ecole and PALIER $palier order by NOM";
	$resultat=mysql_query($query);
	$totalmbr1=mysql_num_rows($resultat);
	while($row=mysql_fetch_object($resultat))
	{	
		$pdf->SetFont('Times','',9);
		$pdf->cell(45,5,$row->NOM.'_'.strtolower($row->PRENOM).'('.strtolower($row->FILSDE).')',1,0,'L',1,0);
		for($i=0; $i< 25; $i+=1){$pdf->cell(9,5,'',1,0,'C',0,0);}$pdf->cell(9+9,5,'',1,0,'C',0,0);
		$pdf->SetFont('Times','B',10);
		$pdf->SetXY(5,$pdf->GetY()+5); 
	}
	
	$pdf->SetXY(05,$pdf->GetY());$pdf->cell(288,5,'Total : '.$totalmbr1.' élèves',1,0,'L',1,0);

}

if ($_POST['SS']=='1') //liste nominative dentiste par uds
{

	$pdf->AddPage('L','A4');$pdf->SetFont('Times','B',10);$pdf->SetFillColor(230);
	$pdf->SetXY(5,10);             $pdf->cell(288,5,$pdf->mspfr,1,0,'C',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5); $pdf->cell(288,5,$pdf->dspfr,1,0,'C',1,0);
    $pdf->SetXY(5,$pdf->GetY()+8); $pdf->cell(96,5,'UDS : '.$pdf->nbrtostring('uds','id',$UDS,'uds'),1,0,'L',1,0);$pdf->cell(96,5,'Liste nominative des élèves (Dentiste)',1,0,'C',1,0);$pdf->cell(96,5,'établissement scolaire : '.$pdf->nbrtostring('ecole','id',substr($ecole, 1, 2),'ecole'),1,0,'L',1,0);
	$pdf->SetXY(05,$pdf->GetY()+10);
	$pdf->cell(45,5,'NOM_prénom (fils de)',1,0,'L',1,0);
	$pdf->cell(15,5,'HYNA',1,0,'C',1,0);
	$pdf->cell(15,5,'GING',1,0,'C',1,0);
	$pdf->cell(15,5,'AODF',1,0,'C',1,0);
	$pdf->cell(26,5,'C',1,0,'C',1,0);
	$pdf->cell(26,5,'A',1,0,'C',1,0);
	$pdf->cell(26,5,'O',1,0,'C',1,0);
	$pdf->cell(26,5,'c',1,0,'C',1,0);
	$pdf->cell(26,5,'a',1,0,'C',1,0);
	$pdf->cell(26,5,'o',1,0,'C',1,0);
	$pdf->cell(21,5,'Date EXA',1,0,'C',1,0);
	$pdf->cell(21,5,'Date RDV',1,0,'C',1,0);
	$pdf->SetXY(05,$pdf->GetY()+5);
	$pdf->mysqlconnect();
	$query = "SELECT * FROM eleve where UDS=$UDS and ECOLE $ecole and PALIER $palier order by NOM";
	$resultat=mysql_query($query);
	$totalmbr1=mysql_num_rows($resultat);
	while($row=mysql_fetch_object($resultat))
	{
		$pdf->SetFont('Times','',9);
		$pdf->cell(45,5,$row->NOM.'_'.strtolower($row->PRENOM).'('.strtolower($row->FILSDE).')',1,0,'L',1,0);
		$pdf->cell(15,5,'',1,0,'C',0,0);
		$pdf->cell(15,5,'',1,0,'C',0,0);
		$pdf->cell(15,5,'',1,0,'C',0,0);
		$pdf->cell(26,5,'',1,0,'C',0,0);
		$pdf->cell(26,5,'',1,0,'C',0,0);
		$pdf->cell(26,5,'',1,0,'C',0,0);
		$pdf->cell(26,5,'',1,0,'C',0,0);
		$pdf->cell(26,5,'',1,0,'C',0,0);
		$pdf->cell(26,5,'',1,0,'C',0,0);
		$pdf->cell(21,5,'',1,0,'C',0,0);
		$pdf->cell(21,5,'',1,0,'C',0,0);
		$pdf->SetFont('Times','B',10);
		$pdf->SetXY(5,$pdf->GetY()+5); 
	}
$pdf->SetXY(05,$pdf->GetY());$pdf->cell(288,5,'Total : '.$totalmbr1.' élèves',1,0,'L',1,0);
}

if ($_POST['SS']=='2') //liste nominative paramedicale par uds
{
	$pdf->AddPage('L','A4');$pdf->SetFont('Times','B',10);$pdf->SetFillColor(230);
	$pdf->SetXY(5,10);             $pdf->cell(288,5,$pdf->mspfr,1,0,'C',1,0);
	$pdf->SetXY(5,$pdf->GetY()+5); $pdf->cell(288,5,$pdf->dspfr,1,0,'C',1,0);
	// $pdf->entete($UDS,$structure,$datejour1,$datejour2);
	$pdf->SetXY(5,$pdf->GetY()+8); $pdf->cell(96,5,'UDS : '.$pdf->nbrtostring('uds','id',$UDS,'uds'),1,0,'L',1,0);$pdf->cell(96,5,'Liste nominative des élèves (Para-médicale)',1,0,'C',1,0);$pdf->cell(96,5,'établissement scolaire : '.$pdf->nbrtostring('ecole','id',substr($ecole, 1, 2),'ecole'),1,0,'L',1,0);
	$pdf->SetXY(05,$pdf->GetY()+10);
	$pdf->cell(45,5,'NOM_prénom (fils de)',1,0,'L',1,0);
	$pdf->cell(30,5,'Poids(kg)',1,0,'C',1,0);
	$pdf->cell(30,5,'Taille(cm)',1,0,'C',1,0);
	$pdf->cell(30,5,'L\'acuité visuelle',1,0,'C',1,0);
	$pdf->cell(30,5,'BCG (fait=x)',1,0,'C',1,0);
	$pdf->cell(30,5,'DTE/DTA (fait=x)',1,0,'C',1,0);
	$pdf->cell(30,5,'POLIO (fait=x)',1,0,'C',1,0);
	$pdf->cell(30,5,'ROR (fait=x)',1,0,'C',1,0);
	$pdf->cell(33,5,'Date de l\'éxamen',1,0,'C',1,0);
	$pdf->SetXY(05,$pdf->GetY()+5);
	$pdf->mysqlconnect();
	$query = "SELECT * FROM eleve where UDS=$UDS and ECOLE $ecole and PALIER $palier order by NOM";
	$resultat=mysql_query($query);
	$totalmbr1=mysql_num_rows($resultat);
	while($row=mysql_fetch_object($resultat))
	{
		$pdf->SetFont('Times','',9);
		$pdf->cell(45,5,$row->NOM.'_'.strtolower($row->PRENOM).'('.strtolower($row->FILSDE).')',1,0,'L',1,0);
		$pdf->cell(30,5,'',1,0,'C',0,0);
		$pdf->cell(30,5,'',1,0,'C',0,0);
		$pdf->cell(30,5,'',1,0,'C',0,0);
		$pdf->cell(30,5,'',1,0,'C',0,0);
		$pdf->cell(30,5,'',1,0,'C',0,0);
		$pdf->cell(30,5,'',1,0,'C',0,0);
		$pdf->cell(30,5,'',1,0,'C',0,0);
		$pdf->cell(33,5,'',1,0,'C',0,0);
		$pdf->SetFont('Times','B',10);
		$pdf->SetXY(5,$pdf->GetY()+5); 
	}
$pdf->SetXY(05,$pdf->GetY());$pdf->cell(288,5,'Total : '.$totalmbr1.' élèves',1,0,'L',1,0);
}




if ($_POST['SS']=='4') //EFF ok verifed
{
$pdf->AddPage('L','A4');$pdf->SetFont('Times','B',10);$pdf->SetFillColor(230);
$pdf->SetXY(5,10);             $pdf->cell(285,5,$pdf->mspfr,1,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->cell(285,5,$pdf->dspfr,1,0,'C',0,0);
$pdf->entetel($UDS,$structure,$datejour1,$datejour2);

$w=15;
$pdf->SetXY(05,$pdf->GetY()+10); $pdf->cell(30,15,"Etablissements",1,0,1,'L',0);$pdf->cell($w*17,5,"Effectifs ",1,0,1,'L',0);
$pdf->SetXY(35,$pdf->GetY()+5); $pdf->cell($w,10,"Pré-Scol",1,0,1,'L',0);$pdf->cell($w*6,5,"Cycle Primaire",1,0,1,'L',0);$pdf->cell($w*5,5,"Cycle Moyen",1,0,1,'L',0);$pdf->cell($w*4,5,"Cycle Secondaire",1,0,1,'L',0);$pdf->cell($w,5,"total",1,0,1,'L',0);
$pdf->SetXY(50,$pdf->GetY()+5);$pdf->cell($w,5,"1°AP",1,0,'C',1,0);$pdf->cell($w,5,"2°AP",1,0,'C',1,0);$pdf->cell($w,5,"3°AP",1,0,'C',1,0);$pdf->cell($w,5,"4°AP",1,0,'C',1,0);$pdf->cell($w,5,"5°AP",1,0,'C',1,0);$pdf->cell($w,5,"TAP",1,0,'C',1,0);$pdf->cell($w,5,"1°AM",1,0,'C',1,0);$pdf->cell($w,5,"2°AM",1,0,'C',1,0);$pdf->cell($w,5,"3°AM",1,0,'C',1,0);$pdf->cell($w,5,"4AM",1,0,'C',1,0);$pdf->cell($w,5,"TAM",1,0,'C',1,0);$pdf->cell($w,5,"1°AS",1,0,'C',1,0);$pdf->cell($w,5,"2°AS",1,0,'C',1,0);$pdf->cell($w,5,"3°AS",1,0,'C',1,0);$pdf->cell($w,5,"TAS",1,0,'C',1,0);$pdf->cell($w,5,"TOTAL",1,0,'C',1,0);

$pdf->mysqlconnect();
$query = "SELECT * from ecole where iduds = $UDS";
$resultat=mysql_query($query);
$totalmbr1=mysql_num_rows($resultat);
while($row=mysql_fetch_object($resultat))
{
	$pdf->SetXY(5,$pdf->GetY()+5);
	$pdf->cell(30,5,$row->ecole,1,0,'C',1,0);
	for($i=1; $i< 7; $i+=1){$pdf->cell($w,5,$pdf->INSCRITSPE($i,$row->id,$datejour1,$datejour2,$UDS),1,0,'C',0,0);}
	$pdf->cell($w,5,"tp",1,0,'C',1,0);
	for($i=7; $i< 11; $i+=1){$pdf->cell($w,5,$pdf->INSCRITSPE($i,$row->id,$datejour1,$datejour2,$UDS),1,0,'C',0,0);}
	$pdf->cell($w,5,"tam",1,0,'C',1,0);
	for($i=11; $i< 14; $i+=1){$pdf->cell($w,5,$pdf->INSCRITSPE($i,$row->id,$datejour1,$datejour2,$UDS),1,0,'C',0,0);}
	$pdf->cell($w,5,"ts",1,0,'C',1,0);
	$pdf->cell($w,5,"tt",1,0,'C',1,0);
}
$pdf->SetXY(5,$pdf->GetY()+5);
$pdf->cell(30,5,"total",1,0,'C',1,0);
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
$pdf->cell($w,5,"",1,0,'C',1,0);
$pdf->cell($w,5,"",1,0,'C',1,0);
}
if ($_POST['SS']=='5') //AFFECTION DEPISTE PAR eleve ok verifed
{
	$pdf->AddPage('L','A4');$pdf->SetFont('Times','B',10);$pdf->SetFillColor(230);
	$pdf->SetXY(5,10);             $pdf->cell(285,5,$pdf->mspfr,1,0,'C',0,0);
	$pdf->SetXY(5,$pdf->GetY()+5); $pdf->cell(285,5,$pdf->dspfr,1,0,'C',0,0);
	// $pdf->entete($UDS,$structure,$datejour1,$datejour2);
	$w=9;$h=42;$y=100;
	$pdf->SetXY(05,$y-42); $pdf->cell(45,$h,"Élèves",1,0,1,'L',0);
	$pdf->Rotatedcell(50+(0*$w),$y,$h,$w,'Vaccination incomplete',90);
	$pdf->Rotatedcell(50+(1*$w),$y,$h,$w,'Absence cicatrice BCG',90);
	$pdf->Rotatedcell(50+(2*$w),$y,$h,$w,'Pediculose',90);
	$pdf->Rotatedcell(50+(3*$w),$y,$h,$w,'Gale',90);
	$pdf->Rotatedcell(50+(4*$w),$y,$h,$w,'Deformation des membres',90);
	$pdf->Rotatedcell(50+(5*$w),$y,$h,$w,'Baisse acuite visuelle',90);
	$pdf->Rotatedcell(50+(6*$w),$y,$h,$w,'Strabisme',90);
	$pdf->Rotatedcell(50+(7*$w),$y,$h,$w,'Antecedents de RAA',90);
	$pdf->Rotatedcell(50+(8*$w),$y,$h,$w,'Diabete',90);
	$pdf->Rotatedcell(50+(9*$w),$y,$h,$w,'Asthme',90);
	$pdf->Rotatedcell(50+(10*$w),$y,$h,$w,'Epilepsie',90);
	$pdf->Rotatedcell(50+(11*$w),$y,$h,$w,'Difficultes scolaires',90);
	$pdf->Rotatedcell(50+(12*$w),$y,$h,$w,'Troubles comportement',90);
	$pdf->Rotatedcell(50+(13*$w),$y,$h,$w,'Troubles langage',90);
	$pdf->Rotatedcell(50+(14*$w),$y,$h,$w,'Surdite Hypoacousie',90);
	$pdf->Rotatedcell(50+(15*$w),$y,$h,$w,'Trachome',90);
	$pdf->Rotatedcell(50+(16*$w),$y,$h,$w,'Oxyurose',90);
	$pdf->Rotatedcell(50+(17*$w),$y,$h,$w,'Enuresie',90);
	$pdf->Rotatedcell(50+(18*$w),$y,$h,$w,'Troubles urinaires',90);
	$pdf->Rotatedcell(50+(19*$w),$y,$h,$w,'Ptosis Nystagmus',90);
	$pdf->Rotatedcell(50+(20*$w),$y,$h,$w,'Paleur conjonctivale',90);
	$pdf->Rotatedcell(50+(21*$w),$y,$h,$w,'Goitre',90);
	$pdf->Rotatedcell(50+(22*$w),$y,$h,$w,'Souffle cardiaque',90);
	$pdf->Rotatedcell(50+(23*$w),$y,$h,$w,'Deformations du rachis',90);
	$pdf->Rotatedcell(50+(24*$w),$y,$h,$w,'Ectopie testiculaire',90);
	$pdf->Rotatedcell(50+(25*$w),$y,$h,$w,'Total affections depistees',90);
	// $pdf->Rotatedcell(50+(26*$w),$y,$h,$w,'Total eleves examines',90);
	$pdf->SetXY(05,$y);
	$pdf->mysqlconnect();
	$query = "SELECT * FROM examenemg where UDS=$UDS";
	$resultat=mysql_query($query);
	$totalmbr1=mysql_num_rows($resultat);
	while($row=mysql_fetch_object($resultat))
	{
		$pdf->cell(45,5,$pdf->nbrtostring('eleve','id',$row->IDELEVE,'NOM').'_'.$pdf->nbrtostring('eleve','id',$row->IDELEVE,'PRENOM'),1,0,'L',1,0);  
		for($i=0; $i< 25; $i+=1){$maladie='m'.$i;if($row->$maladie==1) {$pdf->cell(9,5,'x',1,0,'C',0,0);} else {$pdf->cell(9,5,'-',1,0,'C',0,0);}}
		$pdf->cell(9,5,$pdf->sumafection($row->id),1,0,'C',1,0);
		$pdf->SetXY(5,$pdf->GetY()+5); 
	}
	$pdf->cell(45,5,"Total UDS ",1,0,'C',1,0);
	for($i=0; $i< 25; $i+=1){$pdf->cell(9,5,$pdf->totafection('m'.$i),1,0,'C',1,0);}$pdf->cell(9,5,'',1,0,'C',1,0);
}

if ($_POST['SS']=='6') //AFFECTION DEPISTE PAR ECOLE
{
	$pdf->AddPage('L','A4');$pdf->SetFont('Times','B',10);$pdf->SetFillColor(230);
	$pdf->SetXY(5,10);             $pdf->cell(285,5,$pdf->mspfr,1,0,'C',0,0);
	$pdf->SetXY(5,$pdf->GetY()+5); $pdf->cell(285,5,$pdf->dspfr,1,0,'C',0,0);
	// $pdf->entete($UDS,$structure,$datejour1,$datejour2);
	$w=9;$h=42;$y=100;
	$pdf->SetXY(05,$y-42); $pdf->cell(45,$h,"Eleve",1,0,1,'L',0);
	$pdf->Rotatedcell(50+(0*$w),$y,$h,$w,'Vaccination incomplete',90);
	$pdf->Rotatedcell(50+(1*$w),$y,$h,$w,'Absence cicatrice BCG',90);
	$pdf->Rotatedcell(50+(2*$w),$y,$h,$w,'Pediculose',90);
	$pdf->Rotatedcell(50+(3*$w),$y,$h,$w,'Gale',90);
	$pdf->Rotatedcell(50+(4*$w),$y,$h,$w,'Deformation des membres',90);
	$pdf->Rotatedcell(50+(5*$w),$y,$h,$w,'Baisse acuite visuelle',90);
	$pdf->Rotatedcell(50+(6*$w),$y,$h,$w,'Strabisme',90);
	$pdf->Rotatedcell(50+(7*$w),$y,$h,$w,'Antecedents de RAA',90);
	$pdf->Rotatedcell(50+(8*$w),$y,$h,$w,'Diabete',90);
	$pdf->Rotatedcell(50+(9*$w),$y,$h,$w,'Asthme',90);
	$pdf->Rotatedcell(50+(10*$w),$y,$h,$w,'Epilepsie',90);
	$pdf->Rotatedcell(50+(11*$w),$y,$h,$w,'Difficultes scolaires',90);
	$pdf->Rotatedcell(50+(12*$w),$y,$h,$w,'Troubles comportement',90);
	$pdf->Rotatedcell(50+(13*$w),$y,$h,$w,'Troubles langage',90);
	$pdf->Rotatedcell(50+(14*$w),$y,$h,$w,'Surdite Hypoacousie',90);
	$pdf->Rotatedcell(50+(15*$w),$y,$h,$w,'Trachome',90);
	$pdf->Rotatedcell(50+(16*$w),$y,$h,$w,'Oxyurose',90);
	$pdf->Rotatedcell(50+(17*$w),$y,$h,$w,'Enuresie',90);
	$pdf->Rotatedcell(50+(18*$w),$y,$h,$w,'Troubles urinaires',90);
	$pdf->Rotatedcell(50+(19*$w),$y,$h,$w,'Ptosis Nystagmus',90);
	$pdf->Rotatedcell(50+(20*$w),$y,$h,$w,'Paleur conjonctivale',90);
	$pdf->Rotatedcell(50+(21*$w),$y,$h,$w,'Goitre',90);
	$pdf->Rotatedcell(50+(22*$w),$y,$h,$w,'Souffle cardiaque',90);
	$pdf->Rotatedcell(50+(23*$w),$y,$h,$w,'Deformations du rachis',90);
	$pdf->Rotatedcell(50+(24*$w),$y,$h,$w,'Ectopie testiculaire',90);
	$pdf->Rotatedcell(50+(25*$w),$y,$h,$w,'Total affections depistees',90);
	// $pdf->Rotatedcell(50+(26*$w),$y,$h,$w,'Total eleves examines',90);
	$pdf->SetXY(05,$y);
	$pdf->mysqlconnect();
	// $query = "SELECT * FROM examenemg where UDS=$UDS";
	// $resultat=mysql_query($query);
	// $totalmbr1=mysql_num_rows($resultat);
	// while($row=mysql_fetch_object($resultat))
	// {
		// $pdf->cell(45,5,$pdf->nbrtostring('eleve','id',$row->IDELEVE,'NOM').'_'.$pdf->nbrtostring('eleve','id',$row->IDELEVE,'PRENOM'),1,0,'L',1,0);  
		// for($i=0; $i< 25; $i+=1){$maladie='m'.$i;if($row->$maladie==1) {$pdf->cell(9,5,'x',1,0,'C',0,0);} else {$pdf->cell(9,5,'-',1,0,'C',0,0);}}
		// $pdf->cell(9,5,'',1,0,'C',1,0);
		// $pdf->SetXY(5,$pdf->GetY()+5); 
	// }
	// $pdf->cell(45,5,"Total UDS ",1,0,'C',1,0);
	// for($i=0; $i< 25; $i+=1){$pdf->cell(9,5,'',1,0,'C',1,0);}$pdf->cell(9,5,'',1,0,'C',1,0);
}



if ($_POST['SS']=='9') //SBD
{
//1-DEPSTAGE//
$pdf->AddPage('P','A4');$pdf->SetFont('Times','B',10);$pdf->SetFillColor(230);
$pdf->SetXY(5,10);             $pdf->cell(200,5,$pdf->mspfr,1,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+5); $pdf->cell(200,5,$pdf->dspfr,1,0,'C',0,0);
$pdf->entete($UDS,$structure,$datejour1,$datejour2);
$pdf->SetXY(5,$pdf->GetY()+10); $pdf->cell(24,5,"1",1,0,'C',1,0);                  $pdf->cell(176,5,"BILAN D'EVALUATION - DEPISTAGE",1,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+10); $pdf->cell(24,10,"1A",1,0,'C',1,0);                $pdf->cell(48,10,"Nombre d'élèves",1,0,'C',0,0);$pdf->cell(128,10,"Nombre d'élèves ayant",1,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+10);  $pdf->cell(24,10,"Niveau scolaire",1,0,'C',0,0);  $pdf->cell(16,10,"Inscrits",1,0,'C',0,0);$pdf->cell(32,10,"Examinés",1,0,'C',0,0);                                  $pdf->cell(32,10,"Hygiène BD-NA",1,0,'C',0,0);                                 $pdf->cell(32,10,"Au moins une carie",1,0,'C',0,0);                                     $pdf->cell(32,10,"Une gingivite",1,0,'C',0,0);                                     $pdf->cell(32,10,"Une Anomalie ODF",1,0,'C',0,0);    
$pdf->SetXY(5,$pdf->GetY()+10);  $pdf->cell(24,20,"",1,0,'C',0,0);                 $pdf->cell(16,10,"Nbre",1,0,'C',0,0);    $pdf->cell(16,10,"Nbre",1,0,'C',0,0);$pdf->cell(16,10,"%",1,0,'C',0,0);    $pdf->cell(16,10,"Nbre",1,0,'C',0,0);  $pdf->cell(16,10,"%",1,0,'C',0,0);      $pdf->cell(16,10,"Nbre",1,0,'C',0,0);$pdf->cell(16,10,"%",1,0,'C',0,0);    $pdf->cell(16,10,"Nbre",1,0,'C',0,0); $pdf->cell(16,10,"%",1,0,'C',0,0);       $pdf->cell(16,10,"Nbre",1,0,'C',0,0);$pdf->cell(16,10,"%",1,0,'C',0,0);
$pdf->SetXY(29,$pdf->GetY()+10);                                                   $pdf->cell(16,10,"(A)",1,0,'C',0,0);     $pdf->cell(16,10,"(B)",1,0,'C',0,0); $pdf->cell(16,10,"(B/A)",1,0,'C',0,0);$pdf->cell(16,10,"(C)",1,0,'C',0,0);   $pdf->cell(16,10,"(C/B)",1,0,'C',0,0);  $pdf->cell(16,10,"X",1,0,'C',0,0);   $pdf->cell(16,10,"(X/B)",1,0,'C',0,0);$pdf->cell(16,10,"(D)",1,0,'C',0,0);  $pdf->cell(16,10,"(D/B)",1,0,'C',0,0);   $pdf->cell(16,10,"(E)",1,0,'C',0,0); $pdf->cell(16,10,"(E/B)",1,0,'C',0,0);
$pdf->lDEPISTAGE('1',$datejour1,$datejour2,$UDS);
$pdf->lDEPISTAGE('2',$datejour1,$datejour2,$UDS);
$pdf->lDEPISTAGE('6',$datejour1,$datejour2,$UDS);
$pdf->lTDEPISTAGE($datejour1,$datejour2,$UDS);
$pdf->SetXY(5,$pdf->GetY()+15); $pdf->cell(24,10,"1B",1,0,'C',1,0);                $pdf->cell(87.5,10,"Dents temporaires cao (petit)",1,0,'C',0,0);$pdf->cell(87.5,10,"Dents permanentes CAO (grand)",1,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+10); $pdf->cell(24,10,"Niveau scolaire",1,0,'C',0,0);   $pdf->cell(17.5,10,"c",1,0,'C',0,0);       $pdf->cell(17.5,10,"a",1,0,'C',0,0);   $pdf->cell(17.5,10,"o",1,0,'C',0,0);    $pdf->cell(17.5,10,"cao",1,0,'C',0,0);   $pdf->cell(17.5,10,"Icao",1,0,'C',0,0);    $pdf->cell(17.5,10,"C",1,0,'C',0,0);   $pdf->cell(17.5,10,"A",1,0,'C',0,0);    $pdf->cell(17.5,10,"O",1,0,'C',0,0);   $pdf->cell(17.5,10,"CAO",1,0,'C',0,0);     $pdf->cell(17.5,10,"ICAO",1,0,'C',0,0); 
$pdf->SetXY(5,$pdf->GetY()+10); $pdf->cell(24,20,"",1,0,'C',0,0);                  $pdf->cell(17.5,10,"Nbre",1,0,'C',0,0);    $pdf->cell(17.5,10,"Nbre",1,0,'C',0,0);$pdf->cell(17.5,10,"Nbre",1,0,'C',0,0); $pdf->cell(17.5,10,"Nbre",1,0,'C',0,0);  $pdf->cell(17.5,10,"Nbre",1,0,'C',0,0);    $pdf->cell(17.5,10,"Nbre",1,0,'C',0,0);$pdf->cell(17.5,10,"Nbre",1,0,'C',0,0); $pdf->cell(17.5,10,"Nbre",1,0,'C',0,0);$pdf->cell(17.5,10,"Nbre",1,0,'C',0,0);    $pdf->cell(17.5,10,"Nbre",1,0,'C',0,0); 
$pdf->SetXY(29,$pdf->GetY()+10);                                                   $pdf->cell(17.5,10,"(F)",1,0,'C',0,0);     $pdf->cell(17.5,10,"(G)",1,0,'C',0,0); $pdf->cell(17.5,10,"(H)",1,0,'C',0,0);  $pdf->cell(17.5,10,"(I)",1,0,'C',0,0);   $pdf->cell(17.5,10,"(I/B)",1,0,'C',0,0);   $pdf->cell(17.5,10,"(J)",1,0,'C',0,0); $pdf->cell(17.5,10,"(K)",1,0,'C',0,0);  $pdf->cell(17.5,10,"(L)",1,0,'C',0,0); $pdf->cell(17.5,10,"(M)",1,0,'C',0,0);     $pdf->cell(17.5,10,"(M/B)",1,0,'C',0,0); 
$pdf->LDEPISTAGECAO('1',$datejour1,$datejour2,$UDS);
$pdf->LDEPISTAGECAO('2',$datejour1,$datejour2,$UDS);
$pdf->LDEPISTAGECAO('6',$datejour1,$datejour2,$UDS);
$pdf->LTDEPISTAGECAO($datejour1,$datejour2,$UDS);
$pdf->foot($login);
//2-PRISE EN CHARGE//
$pdf->entete($UDS,$structure,$datejour1,$datejour2);
$pdf->SetXY(5,$pdf->GetY()+10); $pdf->cell(24,10,"2",1,0,'C',1,0);                 $pdf->cell(176,5,"BILAN D'EVALUATION - PRISE EN CHARGE",1,0,'C',0,0);
$pdf->SetFont('Times','B',9);
$pdf->SetXY(29,$pdf->GetY()+5); $pdf->cell(176,5,"NB : il est impératif d'assurer la prise en charge et le suivi des élèves d'année en année scolaire pour une cavité buccale saine",1,0,'C',0,0);
$pdf->SetFont('Times','B',10);
$pdf->SetXY(5,$pdf->GetY()+10); $pdf->cell(24,10,"2A",1,0,'C',1,0);               $pdf->cell(176,10,"Traitement des dents cariées ",1,0,'C',0,0);
//*****//
$pdf->SetXY(5,$pdf->GetY()+10); $pdf->cell(24,10,"Niveau scolaire",1,0,'C',0,0); $pdf->cell(43.98,10,"Nombre d'élèves ayant ",1,0,'C',0,0);$pdf->cell(102.62,10,"Nombre de dents",1,0,'C',0,0);$pdf->cell(29.32,10,"Nombre d'élèves",1,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+10); $pdf->cell(24,30,"",1,0,'C',0,0); $pdf->cell(14.66,10,"=> carie",1,0,'C',0,0);$pdf->cell(29.32,10,"reçus au cabinet",1,0,'C',0,0);                             $pdf->cell(14.66,10,"cariées",1,0,'C',0,0);$pdf->cell(29.32,10,"trt définitivement",1,0,'C',0,0);                          $pdf->cell(29.32,10,"trt provisoirement",1,0,'C',0,0);                          $pdf->cell(29.32,10,"Cariées non trt ",1,0,'C',0,0);$pdf->cell(29.32,10,"trt définitivement",1,0,'C',0,0);
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
$pdf->cell(24,5,"Moyen",1,0,'L',0,0); 
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
$pdf->cell(24,5,"Secondaire",1,0,'L',0,0); 
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
$pdf->cell(24,5,"Total",1,0,'L',1,0); 
$pdf->cell(14.66,5,"",1,0,'C',1,0);
$pdf->cell(14.66,5,"",1,0,'C',1,0);
$pdf->cell(14.66,5,"",1,0,'C',1,0);
$pdf->cell(14.66,5,"",1,0,'C',1,0);
$pdf->cell(14.66,5,"",1,0,'C',1,0);
$pdf->cell(14.66,5,"",1,0,'C',1,0);
$pdf->cell(14.66,5,"",1,0,'C',1,0);
$pdf->cell(14.66,5,"",1,0,'C',1,0);
$pdf->cell(14.66,5,"",1,0,'C',1,0);
$pdf->cell(14.66,5,"",1,0,'C',1,0);
$pdf->cell(14.66,5,"",1,0,'C',1,0);
$pdf->cell(14.66,5,"",1,0,'C',1,0);
      



// 25.14
$pdf->SetXY(5,$pdf->GetY()+10);  
$pdf->cell(24,10,"2B",1,0,'C',1,0); 
$pdf->cell(75.42,10,"Gingivites",1,0,'C',0,0);
$pdf->cell(25.14,10,"Extractions ",1,0,'C',0,0);
$pdf->cell(75.42,10,"Anomalies ODF",1,0,'C',0,0);

$pdf->SetXY(5,$pdf->GetY()+10);  
$pdf->cell(24,5,"",1,0,'L',0,0); 
$pdf->cell(25.14,5,"ayant gingivite",1,0,'C',0,0);
$pdf->cell(50.28,5,"traités pour gingivite",1,0,'C',0,0);
$pdf->cell(25.14,5,"Nbre de dents ",1,0,'C',0,0);
$pdf->cell(25.14,5,"anomalie ODF",1,0,'C',0,0);
$pdf->cell(50.28,5,"anomalie ODF",1,0,'C',0,0);

$pdf->SetXY(5,$pdf->GetY()+5);  
$pdf->cell(24,5,"",1,0,'L',0,0);
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
$pdf->cell(24,5,"Secondaire",1,0,'L',0,0); 
$pdf->cell(25.14,5,"",1,0,'C',0,0);
$pdf->cell(25.14,5,"",1,0,'C',0,0);
$pdf->cell(25.14,5,"",1,0,'C',0,0);
$pdf->cell(25.14,5,"",1,0,'C',0,0);
$pdf->cell(25.14,5,"",1,0,'C',0,0);
$pdf->cell(25.14,5,"",1,0,'C',0,0);
$pdf->cell(25.14,5,"",1,0,'C',0,0);	 	  	  
	  
	  
$pdf->SetXY(5,$pdf->GetY()+5);  
$pdf->cell(24,5,"Total",1,0,'L',1,0); 
$pdf->cell(25.14,5,"",1,0,'C',1,0);
$pdf->cell(25.14,5,"",1,0,'C',1,0);
$pdf->cell(25.14,5,"",1,0,'C',1,0);
$pdf->cell(25.14,5,"",1,0,'C',1,0);
$pdf->cell(25.14,5,"",1,0,'C',1,0);
$pdf->cell(25.14,5,"",1,0,'C',1,0);
$pdf->cell(25.14,5,"",1,0,'C',1,0);		  
	  
	  
$pdf->SetXY(5,$pdf->GetY()+10); $pdf->cell(24,10,"2C",1,0,'C',1,0);               $pdf->cell(176,10,"Scellement des sillons des dents (SSD) de 6 ans",1,0,'C',0,0);	  
	  
	  
$pdf->SetXY(5,$pdf->GetY()+10);  
$pdf->cell(24,5,"",1,0,'L',0,0); 
$pdf->cell(22,5,"",1,0,'C',0,0);	  
$pdf->cell(22,5,"",1,0,'C',0,0);	  
$pdf->cell(22,5,"",1,0,'C',0,0);	  
$pdf->cell(22,5,"",1,0,'C',0,0);	  
$pdf->cell(22,5,"",1,0,'C',0,0);	  
$pdf->cell(22,5,"",1,0,'C',0,0);	  
$pdf->cell(22,5,"",1,0,'C',0,0);	  
$pdf->cell(22,5,"",1,0,'C',0,0);	  
	  
$pdf->SetXY(5,$pdf->GetY()+5);  
$pdf->cell(24,5,"",1,0,'L',0,0); 
$pdf->cell(22,5,"",1,0,'C',0,0);	  
$pdf->cell(22,5,"",1,0,'C',0,0);	  
$pdf->cell(22,5,"",1,0,'C',0,0);	  
$pdf->cell(22,5,"",1,0,'C',0,0);	  
$pdf->cell(22,5,"",1,0,'C',0,0);	  
$pdf->cell(22,5,"",1,0,'C',0,0);	  
$pdf->cell(22,5,"",1,0,'C',0,0);	  
$pdf->cell(22,5,"",1,0,'C',0,0);	  
	  
	  
$pdf->SetXY(5,$pdf->GetY()+5);  
$pdf->cell(24,5,"1°AP",1,0,'L',0,0); 
$pdf->cell(22,5,"",1,0,'C',0,0);	  
$pdf->cell(22,5,"",1,0,'C',0,0);	  
$pdf->cell(22,5,"",1,0,'C',0,0);	  
$pdf->cell(22,5,"",1,0,'C',0,0);	  
$pdf->cell(22,5,"",1,0,'C',0,0);	  
$pdf->cell(22,5,"",1,0,'C',0,0);	  
$pdf->cell(22,5,"",1,0,'C',0,0);	  
$pdf->cell(22,5,"",1,0,'C',0,0);	  
$pdf->foot($login);
//3//
$pdf->AddPage('P','A4');
$pdf->entete($UDS,$structure,$datejour1,$datejour2);
$pdf->SetXY(5,$pdf->GetY()+10); $pdf->cell(24,5,"3",1,0,'C',1,0);                 $pdf->cell(176,5,"BILAN D'EVALUATION - SUIVI SYSTEMATIQUE DE LA PRISE EN CHARGE",1,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+15); $pdf->cell(24,10,"3A",1,0,'C',1,0);               $pdf->cell(176,10,"Traitement des dents cariées ",1,0,'C',0,0);
$pdf->foot($login);
//4//
$pdf->AddPage('P','A4');
$pdf->entete($UDS,$structure,$datejour1,$datejour2);
$pdf->SetXY(5,$pdf->GetY()+10); $pdf->cell(24,5,"4",1,0,'C',1,0);                 $pdf->cell(176,5,"BILAN D'EVALUATION - EDUCATION POUR LA SANTE BUCCO-DENTAIRE",1,0,'C',0,0);
$pdf->foot($login);
//5//
$pdf->AddPage('P','A4');
$pdf->entete($UDS,$structure,$datejour1,$datejour2);
$pdf->SetXY(5,$pdf->GetY()+10); $pdf->cell(24,5,"5",1,0,'C',1,0);                 $pdf->cell(176,5,"BILAN D'EVALUATION - CAMPAGNES D'EDUCATION SANITAIRE ET DE COMMUNICATION SOCIALE",1,0,'C',0,0);
$pdf->SetXY(5,$pdf->GetY()+10); $pdf->cell(24,10,"5A",1,0,'C',1,0);               $pdf->cell(176,10,"Traitement des dents cariées ",1,0,'C',0,0);



$pdf->foot($login);
}




$pdf->Output("UDS".'----'.".PDF",'I');
?>
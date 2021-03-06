<?php
require('../TCPDF.php');
class sscolaire extends TCPDF
{ 
     public $nomprenom ="tibaredha";
	 public $db_host="localhost";
	 public $db_name="sscolaire"; 
     public $db_user="root";
     public $db_pass="";
	 public $utf8 = "" ;
	
	public $repar="الجمـهوريـــة الجزائرية الديمقراطية الشعبيــــــــة";
	public $repfr="République algérienne démocratique et populaire";
	public $mspar="وزارة الصحــــــــة و السكـــــــــان وإصلاح المستشــــــفيات";
	public $mspfr="Ministère de la sante de la population et de la réforme hospitalière";
	public $dspfr="Direction de la sante et de la population de la wilaya de ";
	public $dspar="مـديريــــــة الصحــــة و الســـــكان لولايـــــة ";

	function mysqlconnect()
	{
	$this->db_host;
	$this->db_name;
	$this->db_user;
	$this->db_pass;
    $cnx = mysql_connect($this->db_host,$this->db_user,$this->db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
    $db  = mysql_select_db($this->db_name,$cnx) ;
	mysql_query("SET NAMES 'UTF8' ");
	return $db;
	}
	
	function ecol_uds($iduds,$typeecole) 
	{
	$this->mysqlconnect();
	$sql = " select * from ecole where iduds $iduds and typeecole $typeecole";
	$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
	$OP=mysql_num_rows($requete);
	mysql_free_result($requete);
	return $OP;
	}
	
	
	function ecol_commune($idcom,$typeecole) 
	{
	$this->mysqlconnect();
	$sql = " select * from ecole where idcom $idcom and typeecole $typeecole";
	$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
	$OP=mysql_num_rows($requete);
	mysql_free_result($requete);
	return $OP;
	}
	
	
	
	
	
	
	
	
	
	
	
	
	function dateFR2US($date)//01/01/2013
	{
	$J      = substr($date,0,2);
    $M      = substr($date,3,2);
    $A      = substr($date,6,4);
	$dateFR2US =  $A."-".$M."-".$J ;
    return $dateFR2US;//2013-01-01
	}
	
    function dateUS2FR($date)//2013-01-01
    {
	$J      = substr($date,8,2);
    $M      = substr($date,5,2);
    $A      = substr($date,0,4);
	$dateUS2FR =  $J."/".$M."/".$A ;
    return $dateUS2FR;//01/01/2013
    }	
	
	function nbrtostring($tb_name,$colonename,$colonevalue,$resultatstring) 
	{
	if (is_numeric($colonevalue) and $colonevalue!=='0') 
	{ 
	$this->mysqlconnect();
	$result = mysql_query("SELECT * FROM $tb_name where $colonename=$colonevalue" );
	$row=mysql_fetch_object($result);
	$resultat=$row->$resultatstring;
	return $resultat;
	} 
	return $resultat2='??????';
	}
	
	function DATEPV($DATEINS) {
	
		$J      = substr($DATEINS,8,2);                  
		$M      = substr($DATEINS,5,2);
		$A      = substr($DATEINS,2,2); 
		//transformer une date donne en lettre
		$JOURS = array("الاول","الثانى","الثالث","الرابع","الخامس","السادس","السابع","الثامن","التاسع","العاشر","الحادي عشر","الثاني عشر","الثالث عشر"," الرابع عشر  "," الخامس عشر "," السادس عشر "," السابع عشر "," الثامن عشر "," التاسع عشر "," العشرين "," الواحد و العشرين"," الثاني و العشرين "," الثالث و العشرين "," الرابع و العشرين "," الخامس و العشرين "," السادس و العشرين "," السابع و العشرين "," الثامن و العشرين "," التاسع و العشرين "," الثلاثين "," الواحد و الثلاثين ");
	    //$JOURS1 = $JOURS[date("d")-1] ;
		$JOURS1 = $JOURS[$J-1] ;
		$MOIS = array("", "جانفى", "فيفري", "مارس", "افريل", "ماي", "جوان", "جويلية", "اوت", "سبتمبر", "اكتوبر", "نوفمبر", "ديسمبر");
		$MOIS1 =  $MOIS[ $M-0 ] ;
		//$MOIS1 =  $MOIS[date("n")] ;
		$ANNEE = array("ثلاثة عشر  ","أربعة عشر  ","خمسة عشر  ","ستة عشر  ","سبعة عشر  ","ثمانية عشر ","تسعة عشر  ","عشرين");
		//$ANNEE1 =  $ANNEE[date("y")-13] ;
		$ANNEE1 =  $ANNEE[ $A - 13] ;
		$DATEPV="في عـــام الفيــــن و".$ANNEE1."وفي اليـــوم ".$JOURS1." من شهـــر ".$MOIS1;
		
		return $DATEPV;
    }


   function arDate() {
		$Jour = array("الاحد", "الاثنين", "الثلثاء", "الاربعاء", "الخميس", "الجمعة", "السبت");
		$Mois = array("", "جانفى", "فيفري", "مارس", "افريل", "ماي", "جوان", "جويلية", "اوت", "سبتمبر", "اكتوبر", "نوفمبر", "ديسمبر");
		$Jour1 = array("الاحد", "الاثنين", "الثلثاء", "الاربعاء", "الخميس", "الجمعة", "السبت");
		$anne1 = array("الاحد", "الاثنين", "الثلثاء", "الاربعاء", "الخميس", "الجمعة", "السبت");
		$datear = $Jour[date("w")] . " " . date("d") . " " . $Mois[date("n")] . " " . date("Y");
		return $datear;
	}
	
	function ANNEEAR($DATEINS) {
		$A      = substr($DATEINS,2,2); 
		$ANNEE = array("الثانى عشر  ","ثلاثة عشر  ","أربعة عشر  ","خمسة عشر  ","ستة عشر  ","سبعة عشر  ","ثمانية عشر ","تسعة عشر  ","عشرين");
		$ANNEE1 =  $ANNEE[ $A - 12] ;
		$DATEPV=" في عـــام الفيــــن و ".$ANNEE1;
		return $DATEPV;
	}
    function JOURAR($DATEINS) {
		$J      = substr($DATEINS,8,2);                  
		$JOURS = array("الاول","الثانى","الثالث","الرابع","الخامس","السادس","السابع","الثامن","التاسع","العاشر","الحادي عشر","الثاني عشر","الثالث عشر"," الرابع عشر  "," الخامس عشر "," السادس عشر "," السابع عشر "," الثامن عشر "," التاسع عشر "," العشرين "," الواحد و العشرين"," الثاني و العشرين "," الثالث و العشرين "," الرابع و العشرين "," الخامس و العشرين "," السادس و العشرين "," السابع و العشرين "," الثامن و العشرين "," التاسع و العشرين "," الثلاثين "," الواحد و الثلاثين ");
		$JOURS1 = $JOURS[$J-1] ;
		$DATEPV=" وفي اليـــوم ".$JOURS1;
		return $DATEPV;
	}	
   function MOISAR($DATEINS) {             
		$M      = substr($DATEINS,5,2);
		$MOIS = array("", "جانفى", "فيفري", "مارس", "افريل", "ماي", "جوان", "جويلية", "اوت", "سبتمبر", "اكتوبر", "نوفمبر", "ديسمبر");
		$MOIS1 =  $MOIS[ $M-0 ] ;
		$DATEPV=" من شهـــر ".$MOIS1;
		return $DATEPV;
	}		
	
	function HEURSAR($HINS) {
		$H      = substr($HINS,0,2);                  
		if($H>0){
		$HEURS = array("الاول","الثانى","الثالث","الرابع","الخامس","السادس","السابع","الثامن","التاسع","العاشر","الحادي عشر","الثاني عشر","الثالث عشر"," الرابع عشر  "," الخامس عشر "," السادس عشر "," السابع عشر "," الثامن عشر "," التاسع عشر "," العشرين "," الواحد و العشرين"," الثاني و العشرين "," الثالث و العشرين "," الرابع و العشرين ");
		$HEURS1 = $HEURS[$H-1] ;
		return $HEURS1;
		}
		else{
		return $HEURS1='???';
		}	
	}	
	function MINUTEAR($HINS) {
		    $M = substr(trim($HINS),3,2);                
			if($M>0){
			$MINUTE = array("الاولى","الثانية","الثالثة","الرابعة","الخامسة","السادسة","السابعة","الثامنة","التاسعة","العاشرة","الحادي عشرة","الثاني عشرة","الثالث عشرة"," الرابع عشرة  "," الخامس عشرة "," السادس عشرة "," السابع عشرة "," الثامن عشرة "," التاسع عشرة "," العشرين "," الواحد و العشرين"," الثاني و العشرين "," الثالث و العشرين "," الرابع و العشرين " ," الخامس و العشرين" ," السادس و العشرين" ," السابع و العشرين" ," الثامن  العشرين" ," التاسع و العشرين" ," الثلاثون" ," الواحدة و الثلاثين" ," الثانية و الثلاثين" ," الثالثة و الثلاثين" ," الرابعة و الثلاثين" ," الخامسة و الثلاثين" ,"السادسة و الثلاثين " ," السابعة و الثلاثين" ," الثامنة و الثلاثين" ," التاسعة و الثلاثين" ,"الأربعين " ," الواحدة و الأربعين" ," الثانية و الأربعين" ," الثالثة و الأربعين" ," الرابعة و الأربعين" ," الخامسة و الأربعين" ," السادسة و الأربعين" ," السابعة و الأربعين" ,"الثامنة و الأربعين " ,"التاسعة و الأربعين " ,"الخمسين " ," الواحدة و الخمسين" ," الثانية و الخمسين" ,"الثالثة و الخمسين " ," الرابعة و الخمسين" ," الخامسة و الخمسين" ," السادسة و الخمسين" ," السابعة و الخمسين" ,"الثامنة و الخمسين " ," التاسعة و الخمسين"  );
			$MINUTE1 = $MINUTE[$M-1];
			return $MINUTE1;
			}
			else{
			return $MINUTE1="الصفر";
			}
		// $M      = substr($HINS,4,2);                  
		// if($M>0){
		// $MINUTE = array("الاولى","الثانية","الثالثة","الرابعة","الخامسة","السادسة","السابعة","الثامنة","التاسعة","العاشرة","الحادي عشرة","الثاني عشرة","الثالث عشرة"," الرابع عشرة  "," الخامس عشرة "," السادس عشرة "," السابع عشرة "," الثامن عشرة "," التاسع عشرة "," العشرين "," الواحد و العشرين"," الثاني و العشرين "," الثالث و العشرين "," الرابع و العشرين ");
		// $MINUTE1 = $MINUTE[$M-1] ;
		// return $MINUTE1;
		// }
		// else{
		// return $MINUTE1="???";
		// }
	}

function vaccin($id,$vaccin) 
{
	$this->mysqlconnect();
	$querysbd = "select * from vaccination1 WHERE IDELEVE= '$id' and vaccin=$vaccin";
	$resultatvac=mysql_query($querysbd);
	while($resultvac=mysql_fetch_object($resultatvac))
	{ 
		return $this->dateUS2FR($resultvac->datevac);
	}
}	
	
function verif($id,$val) 
{
	if ($id == $val){return 'X';}else{return 'O';} 
}

function BUCCO($data,$c,$x,$y,$v) 
{
if($c=='c') {$this->SetFillColor(0);} 
if($c=='a') {$this->SetFillColor(255,0,0);} 
if($c=='o') {$this->SetFillColor(0,0,255);} 
if($data['d11']==$c) {$this->SetXY(41.5+$x,161+$y);$this->Cell(2,0,$v,0,0,'C',1,0);} 
if($data['d12']==$c) {$this->SetXY(37.5+$x,162+$y);$this->Cell(2,0,$v,0,0,'C',1,0);} 
if($data['d13']==$c) {$this->SetXY(35+$x,164.5+$y);$this->Cell(2,0,$v,0,0,'C',1,0);} 
if($data['d14']==$c) {$this->SetXY(33.2+$x,168+$y);$this->Cell(2,0,$v,0,0,'C',1,0);} 
if($data['d15']==$c) {$this->SetXY(31.2+$x,171.5+$y);$this->Cell(2,0,$v,0,0,'C',1,0);} 
if($data['d16']==$c) {$this->SetXY(30+$x,175.5+$y);$this->Cell(2,0,$v,0,0,'C',1,0);} 
if($data['d17']==$c) {$this->SetXY(29+$x,180+$y);$this->Cell(2,0,$v,0,0,'C',1,0);} 
if($data['d18']==$c) {$this->SetXY(29+$x,184.5+$y);$this->Cell(2,0,$v,0,0,'C',1,0);} 
if($data['d21']==$c) {$this->SetXY(45.5+$x,161+$y);$this->Cell(2,0,$v,0,0,'C',1,0);} 
if($data['d22']==$c) {$this->SetXY(48.5+$x,162+$y);$this->Cell(2,0,$v,0,0,'C',1,0);} 
if($data['d23']==$c) {$this->SetXY(51.5+$x,164.5+$y);$this->Cell(2,0,$v,0,0,'C',1,0);} 
if($data['d24']==$c) {$this->SetXY(53.7+$x,168+$y);$this->Cell(2,0,$v,0,0,'C',1,0);} 
if($data['d25']==$c) {$this->SetXY(55.7+$x,171.5+$y);$this->Cell(2,0,$v,0,0,'C',1,0);} 
if($data['d26']==$c) {$this->SetXY(57+$x,175.5+$y);$this->Cell(2,0,$v,0,0,'C',1,0);} 
if($data['d27']==$c) {$this->SetXY(58+$x,180+$y);$this->Cell(2,0,$v,0,0,'C',1,0);} 
if($data['d28']==$c) {$this->SetXY(57.5+$x,184.5+$y);$this->Cell(2,0,$v,0,0,'C',1,0);} 
if($data['d31']==$c) {$this->SetXY(45+$x,217+$y);$this->Cell(2,0,$v,0,0,'C',1,0);} 
if($data['d32']==$c) {$this->SetXY(48+$x,216+$y);$this->Cell(2,0,$v,0,0,'C',1,0);} 
if($data['d33']==$c) {$this->SetXY(50.3+$x,214.5+$y);$this->Cell(2,0,$v,0,0,'C',1,0);} 
if($data['d34']==$c) {$this->SetXY(52.5+$x,211+$y);$this->Cell(2,0,$v,0,0,'C',1,0);} 
if($data['d35']==$c) {$this->SetXY(55+$x,207+$y);$this->Cell(2,0,$v,0,0,'C',1,0);} 
if($data['d36']==$c) {$this->SetXY(57+$x,202.5+$y);$this->Cell(2,0,$v,0,0,'C',1,0);} 
if($data['d37']==$c) {$this->SetXY(58+$x,198.4+$y);$this->Cell(2,0,$v,0,0,'C',1,0);} 
if($data['d38']==$c) {$this->SetXY(58+$x,193.5+$y);$this->Cell(2,0,$v,0,0,'C',1,0);} 
if($data['d41']==$c) {$this->SetXY(42+$x,217+$y);$this->Cell(2,0,$v,0,0,'C',1,0);} 
if($data['d42']==$c) {$this->SetXY(39.5+$x,216+$y);$this->Cell(2,0,$v,0,0,'C',1,0);} 
if($data['d43']==$c) {$this->SetXY(37+$x,214.5+$y);$this->Cell(2,0,$v,0,0,'C',1,0);} 
if($data['d44']==$c) {$this->SetXY(35+$x,211+$y);$this->Cell(2,0,$v,0,0,'C',1,0);} 
if($data['d45']==$c) {$this->SetXY(32+$x,208+$y);$this->Cell(2,0,$v,0,0,'C',1,0);} 
if($data['d46']==$c) {$this->SetXY(30.5+$x,203+$y);$this->Cell(2,0,$v,0,0,'C',1,0);}
if($data['d47']==$c) {$this->SetXY(29+$x,198.4+$y);$this->Cell(2,0,$v,0,0,'C',1,0);} 
if($data['d48']==$c) {$this->SetXY(29+$x,193.5+$y);$this->Cell(2,0,$v,0,0,'C',1,0);} 

if($data['d51']==$c) {$this->SetXY(43.7+$x,176+$y);$this->Cell(0.5,0,$v,0,0,'C',1,0);} 
if($data['d52']==$c) {$this->SetXY(42.5+$x,177+$y);$this->Cell(0.5,0,$v,0,0,'C',1,0);} 
if($data['d53']==$c) {$this->SetXY(41+$x,177.4+$y);$this->Cell(0.5,0,$v,0,0,'C',1,0);} 
if($data['d54']==$c) {$this->SetXY(39.8+$x,179.4+$y);$this->Cell(0.5,0,$v,0,0,'C',1,0);} 
if($data['d55']==$c) {$this->SetXY(38.8+$x,182.5+$y);$this->Cell(0.5,0,$v,0,0,'C',1,0);} 

if($data['d61']==$c) {$this->SetXY(44.9+$x,176+$y);$this->Cell(0.5,0,$v,0,0,'C',1,0);} 
if($data['d62']==$c) {$this->SetXY(46.3+$x,177+$y);$this->Cell(0.5,0,$v,0,0,'C',1,0);} 
if($data['d63']==$c) {$this->SetXY(47.8+$x,177.4+$y);$this->Cell(0.5,0,$v,0,0,'C',1,0);} 
if($data['d64']==$c) {$this->SetXY(49+$x,179.4+$y);$this->Cell(0.5,0,$v,0,0,'C',1,0);} 
if($data['d65']==$c) {$this->SetXY(50+$x,182.5+$y);$this->Cell(0.5,0,$v,0,0,'C',1,0);} 

if($data['d71']==$c) {$this->SetXY(45.5+$x,199.7+$y);$this->Cell(0.5,0,$v,0,0,'C',1,0);} 
if($data['d72']==$c) {$this->SetXY(47.4+$x,198.7+$y);$this->Cell(0.5,0,$v,0,0,'C',1,0);} 
if($data['d73']==$c) {$this->SetXY(48.5+$x,197+$y);$this->Cell(0.5,0,$v,0,0,'C',1,0);} 
if($data['d74']==$c) {$this->SetXY(49.5+$x,195+$y);$this->Cell(0.5,0,$v,0,0,'C',1,0);} 
if($data['d75']==$c) {$this->SetXY(50+$x,192.5+$y);$this->Cell(0.5,0,$v,0,0,'C',1,0);} 

if($data['d81']==$c) {$this->SetXY(43.5+$x,199.7+$y);$this->Cell(0.5,0.5,$v,0,0,'C',1,0);} 
if($data['d82']==$c) {$this->SetXY(42+$x,198.7+$y);$this->Cell(0.5,0,$v,0,0,'C',1,0);} 
if($data['d83']==$c) {$this->SetXY(40.5+$x,197+$y);$this->Cell(0.5,0,$v,0,0,'C',1,0);} 
if($data['d84']==$c) {$this->SetXY(39.5+$x,195+$y);$this->Cell(0.5,0,$v,0,0,'C',1,0);} 
if($data['d85']==$c) {$this->SetXY(39+$x,192.5+$y);$this->Cell(0.5,0,$v,0,0,'C',1,0);} 

}

function FICHEBUCCO($data) 
{
$this->AddPage('P','A4');
$this->setRTL(FALSE); 
$this->RoundedRect($x=5, $y=5, $w=200, $h=285, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$this->SetXY(15,$this->GetY()+5); $this->SetFillColor(152, 235, 251 );$this->Cell(180,10,"FICHE SANTE BUCCO-DENTAIRE",1,0,'C',1,0);    
$this->SetXY(15,$this->GetY()+20);$this->Cell(80,10,"NOM PRENOM : ".$this->nbrtostring("eleve","id",$data['ID'],"NOM").'_'.$this->nbrtostring("eleve","id",$data['ID'],"PRENOM"),1,0,'L'); $this->Cell(55,10,"",0,0,'L');$this->Cell(45,10,"UDS : ".$this->nbrtostring("uds","id",$data['UDS'],"uds"),1,0,'L');
$this->SetXY(15,$this->GetY()+20);$this->Cell(80,10,"DATE : ".$this->dateUS2FR($data['DATE']),1,0,'L'); $this->Cell(55,10,"",0,0,'L');$this->Cell(45,10,"Ecole : ".$this->nbrtostring("ecole","id",$data['ETABLIS'],"ecole"),1,0,'L');
$this->SetXY(15,$this->GetY()+20);$this->Cell(80,10,"PALIER : ".$this->nbrtostring("palier","id",$data['CLASSE'],"nompalier")." : (*".$data['classep'].")",1,0,'L'); $this->Cell(55,10,"",0,0,'L');$this->Cell(45,10,"AGE : ".$this->nbrtostring("eleve","id",$data['ID'],"Years").' Ans',1,0,'L');
$this->RoundedRect($x=15, $y=$this->GetY()+20, $w=180, $h=10, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$this->SetXY(15,$this->GetY()+20);$this->Cell(45,5,"1-Hygienne bucco-dentaire (Indice OHI Simplifié) ",0,0,'L'); $this->Cell(90,5,"",0,0,'L');$this->Cell(5,5,$data['HBDA'],1,0,'C');$this->Cell(40,5,"ACCEPTABLE " ,0,0,'L');
$this->SetXY(15,$this->GetY()+5);$this->Cell(45,5,"",0,0,'L');                           $this->Cell(90,5,"",0,0,'L');$this->Cell(5,5,$data['HBDNA'],1,0,'C');$this->Cell(40,5,"NON ACCEPTABLE ",0,0,'L');
$this->RoundedRect($x=15, $y=$this->GetY()+20, $w=180, $h=10, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$this->SetXY(15,$this->GetY()+20);$this->Cell(45,5,"2-Gingivite (inflammation de la gencive)",0,0,'L');               $this->Cell(90,5,"",0,0,'L');$this->Cell(5,5,$data['GO'],1,0,'C');$this->Cell(45,5,"OUI",0,0,'L');
$this->SetXY(15,$this->GetY()+5);$this->Cell(45,5,"",0,0,'L');                           $this->Cell(90,5,"",0,0,'L');$this->Cell(5,5,$data['GN'],1,0,'C');$this->Cell(45,5,"NON",0,0,'L');
$this->RoundedRect($x=15, $y=$this->GetY()+20, $w=60, $h=80, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$this->RoundedRect($x=15+60, $y=$this->GetY()+20, $w=60, $h=80, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$this->RoundedRect($x=15+120, $y=$this->GetY()+20, $w=60, $h=80, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$this->SetXY(15,$this->GetY()+20);$this->Cell(45,10,"3-Indice CAO de KLEIN et PALMER",0,0,'L'); 
$this->Image("dents.jpg", $x=16, $y=$this->GetY()+10, $w=58, $h=70, $type='jpg', $link='', $align='C', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=0, $fitbox=false, $hidden=false, $fitonpage=false, $alt=false, $altimgs=array());
$this->Image("dents.jpg", $x=15+61, $y=$this->GetY()+10, $w=58, $h=70, $type='jpg', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=0, $fitbox=false, $hidden=false, $fitonpage=false, $alt=false, $altimgs=array());
$this->Image("dents.jpg", $x=15+121, $y=$this->GetY()+10, $w=58, $h=70, $type='jpg', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=0, $fitbox=false, $hidden=false, $fitonpage=false, $alt=false, $altimgs=array());
$this->SetXY(15,$this->GetY()+80);$this->Cell(60,5,"C (*les dents cariées) : ".$data['C'],1,0,'L');$this->Cell(60,5,"A (*les dents absentes) : ".$data['A'],1,0,'L');$this->Cell(60,5,"O (*les dents obturées) : ".$data['O'],1,0,'L');
$this->SetXY(15,$this->GetY()+5);$this->Cell(60,5,"c (*les dents cariées) : ".$data['c'],1,0,'L');$this->Cell(60,5,"a (*les dents absentes) : ".$data['a'],1,0,'L');$this->Cell(60,5,"o (*les dents obturées) : ".$data['o'],1,0,'L');
$this->RoundedRect($x=15, $y=$this->GetY()+10, $w=180, $h=10, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$this->SetXY(15,$this->GetY()+10);$this->Cell(45,5,"4-Anomalie Dento-Faciale ",0,0,'L');               $this->Cell(90,5,"",0,0,'L');$this->Cell(5,5,$data['ODFO'],1,0,'C');$this->Cell(45,5,"OUI",0,0,'L');
$this->SetXY(15,$this->GetY()+5);$this->Cell(45,5,"  Orientation vers un milieu specialisé ",0,0,'L');$this->Cell(90,5,"",0,0,'L');                                       $this->Cell(5,5,$data['ODFN'],1,0,'C');$this->Cell(45,5,"NON",0,0,'L');
$this->RoundedRect($x=15, $y=$this->GetY()+15, $w=180, $h=10, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$this->SetXY(15,$this->GetY()+15);$this->Cell(45,5,"5-Convoqué pour suivie",0,0,'L');$this->Cell(90,5,"",0,0,'L');                 $this->Cell(5,5,$data['CPSO'],1,0,'C');$this->Cell(45,5,"OUI",0,0,'L');
$this->SetXY(15,$this->GetY()+5);$this->Cell(45,5,"",0,0,'L');$this->Cell(90,5,"",0,0,'L');                                        $this->Cell(5,5,$data['CPSN'],1,0,'C');$this->Cell(45,5,"NON",0,0,'L');
$this->BUCCO($data,"c",0,0,"");
$this->BUCCO($data,"a",60,0,"");
$this->BUCCO($data,"o",120,0,"");
}

function SUIVIEMEDICAL($n) {
$y=23-$n;
for ($x = 0; $x <= $y; $x++) {
$this->SetXY(15,$this->GetY());$this->SetFillColor(152, 235, 251 );$this->Cell(26,10,"",1,0,'C',1,0);$this->Cell(26,10,"",1,0,'C',1,0);      $this->Cell(26,10,"",1,0,'C',1,0); $this->Cell(66,10,"",1,0,'C',1,0);$this->Cell(36,10,"",1,1,'C',1,0);
}
}

function EXAMENMEDICAL($data) {
$this->AddPage('P','A4');
$this->setRTL(FALSE); 
$this->RoundedRect($x=5, $y=5, $w=200, $h=285, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$this->SetXY(15,$this->GetY()+5); $this->SetFillColor(152, 235, 251 );$this->Cell(180,10,"EXAMEN MEDICAL DE DEPISTAGE",1,0,'C',1,0);  

$h=7;
$this->SetXY(15,$this->GetY()+$h+5);$this->SetFillColor(253, 253, 9);   $this->Cell(90,$h,"NOM PRENOM : ".$this->nbrtostring("eleve","id",$data['ID'],"NOM").'_'.$this->nbrtostring("eleve","id",$data['ID'],"PRENOM").'('.$this->nbrtostring("eleve","id",$data['ID'],"FILSDE").')',1,0,'L',1,0);
$this->SetXY(15,$this->GetY()+$h);$this->SetFillColor(253, 253, 9);     $this->Cell(90,$h,"DATE DE L'EXAMEN : ".$this->dateUS2FR($data['DATE']),1,0,'L',1,0);
$this->SetXY(15,$this->GetY()+$h);$this->SetFillColor(253, 253, 9);     $this->Cell(90,$h,"PALIER : ".$this->nbrtostring("palier","id",$data['CLASSE'],"nompalier"),1,0,'L',1,0);
$this->SetXY(15,$this->GetY()+$h);$this->SetFillColor(253, 253, 9);     $this->Cell(90,$h,"AGE : ".$this->nbrtostring("eleve","id",$data['ID'],"Years").' Ans',1,0,'L',1,0);

$this->SetXY(15,$this->GetY()+$h);$this->SetFillColor(253, 253, 9);      $this->Cell(90,$h,"RDV : ".$data['OKRDV'].' : '.$this->dateUS2FR($data['DATECSBD']),1,0,'L',0,0);
$this->SetXY(15,$this->GetY()+$h);$this->SetFillColor(253, 253, 9);      $this->Cell(90,$h,"01-CARDIOLOGIE",1,0,'C',1,0);
$this->SetXY(15,$this->GetY()+$h);$this->SetFillColor(152, 245, 255 );   $this->Cell(10,$h,$data['m1'],1,0,'C',1,0);$this->Cell(80,$h,"HTA",1,0,'L',1,0);
$this->SetXY(15,$this->GetY()+$h);$this->SetFillColor(152, 245, 255 );   $this->Cell(10,$h,$data['m2'],1,0,'C',1,0);$this->Cell(80,$h,"Souffle cardiaque",1,0,'L',1,0);
$this->SetXY(15,$this->GetY()+$h);$this->SetFillColor(152, 245, 255 );   $this->Cell(10,$h,$data['m3'],1,0,'C',1,0);$this->Cell(80,$h,"Tr .du rythme",1,0,'L',1,0);
$this->SetXY(15,$this->GetY()+$h);$this->SetFillColor(152, 245, 255 );   $this->Cell(10,$h,$data['m4'],1,0,'C',1,0);$this->Cell(80,$h,"Cardiopathie",1,0,'L',1,0);
$this->SetXY(15,$this->GetY()+$h);$this->SetFillColor(152, 245, 255 );   $this->Cell(10,$h,$data['m5'],1,0,'C',1,0);$this->Cell(80,$h,"Autres",1,0,'L',1,0);

$this->SetXY(15,$this->GetY()+$h);$this->SetFillColor(253, 253, 9);      $this->Cell(90,$h,"02-DERMATOLOGIE",1,0,'C',1,0);
$this->SetXY(15,$this->GetY()+$h);$this->SetFillColor(152, 245, 255 );   $this->Cell(10,$h,$data['m6'],1,0,'C',1,0);$this->Cell(80,$h,"Dermatite atopique",1,0,'L',1,0);
$this->SetXY(15,$this->GetY()+$h);$this->SetFillColor(152, 245, 255 );   $this->Cell(10,$h,$data['m7'],1,0,'C',1,0);$this->Cell(80,$h,"Gale",1,0,'L',1,0);
$this->SetXY(15,$this->GetY()+$h);$this->SetFillColor(152, 245, 255 );   $this->Cell(10,$h,$data['m8'],1,0,'C',1,0);$this->Cell(80,$h,"Pédiculose",1,0,'L',1,0);
$this->SetXY(15,$this->GetY()+$h);$this->SetFillColor(152, 245, 255 );   $this->Cell(10,$h,$data['m9'],1,0,'C',1,0);$this->Cell(80,$h,"Psoriasis",1,0,'L',1,0);
$this->SetXY(15,$this->GetY()+$h);$this->SetFillColor(152, 245, 255 );   $this->Cell(10,$h,$data['m10'],1,0,'C',1,0);$this->Cell(80,$h,"Teigne",1,0,'L',1,0);
$this->SetXY(15,$this->GetY()+$h);$this->SetFillColor(152, 245, 255 );   $this->Cell(10,$h,$data['m11'],1,0,'C',1,0);$this->Cell(80,$h,"Autres",1,0,'L',1,0);

$this->SetXY(15,$this->GetY()+$h);$this->SetFillColor(253, 253, 9);      $this->Cell(90,$h,"03-ENDOCRINOLOGIE",1,0,'C',1,0);
$this->SetXY(15,$this->GetY()+$h);$this->SetFillColor(152, 245, 255 );   $this->Cell(10,$h,$data['m12'],1,0,'C',1,0);$this->Cell(80,$h,"Obésité",1,0,'L',1,0);
$this->SetXY(15,$this->GetY()+$h);$this->SetFillColor(152, 245, 255 );   $this->Cell(10,$h,$data['m13'],1,0,'C',1,0);$this->Cell(80,$h,"Retard stat. Pond",1,0,'L',1,0);
$this->SetXY(15,$this->GetY()+$h);$this->SetFillColor(152, 245, 255 );   $this->Cell(10,$h,$data['m14'],1,0,'C',1,0);$this->Cell(80,$h,"Surpoid",1,0,'L',1,0);
$this->SetXY(15,$this->GetY()+$h);$this->SetFillColor(152, 245, 255 );   $this->Cell(10,$h,$data['m15'],1,0,'C',1,0);$this->Cell(80,$h,"Diabète",1,0,'L',1,0);
$this->SetXY(15,$this->GetY()+$h);$this->SetFillColor(152, 245, 255 );   $this->Cell(10,$h,$data['m16'],1,0,'C',1,0);$this->Cell(80,$h,"Goitre",1,0,'L',1,0);
$this->SetXY(15,$this->GetY()+$h);$this->SetFillColor(152, 245, 255 );   $this->Cell(10,$h,$data['m17'],1,0,'C',1,0);$this->Cell(80,$h,"Autres",1,0,'L',1,0);

$this->SetXY(15,$this->GetY()+$h);$this->SetFillColor(253, 253, 9);      $this->Cell(90,$h,"04-GASTROLOGIE",1,0,'C',1,0);
$this->SetXY(15,$this->GetY()+$h);$this->SetFillColor(152, 245, 255 );   $this->Cell(10,$h,$data['m18'],1,0,'C',1,0);$this->Cell(80,$h,"Oxyurose",1,0,'L',1,0);
$this->SetXY(15,$this->GetY()+$h);$this->SetFillColor(152, 245, 255 );   $this->Cell(10,$h,$data['m19'],1,0,'C',1,0);$this->Cell(80,$h,"Les hernies",1,0,'L',1,0);
$this->SetXY(15,$this->GetY()+$h);$this->SetFillColor(152, 245, 255 );   $this->Cell(10,$h,$data['m20'],1,0,'C',1,0);$this->Cell(80,$h,"Maladie coeliaque",1,0,'L',1,0);
$this->SetXY(15,$this->GetY()+$h);$this->SetFillColor(152, 245, 255 );   $this->Cell(10,$h,$data['m21'],1,0,'C',1,0);$this->Cell(80,$h,"Autres",1,0,'L',1,0);

$this->SetXY(15,$this->GetY()+$h);$this->SetFillColor(253, 253, 9);      $this->Cell(90,$h,"05-HEMATOLOGIE",1,0,'C',1,0);
$this->SetXY(15,$this->GetY()+$h);$this->SetFillColor(152, 245, 255 );   $this->Cell(10,$h,$data['m22'],1,0,'C',1,0);$this->Cell(80,$h,"Paleur cut. muque",1,0,'L',1,0);
$this->SetXY(15,$this->GetY()+$h);$this->SetFillColor(152, 245, 255 );   $this->Cell(10,$h,$data['m23'],1,0,'C',1,0);$this->Cell(80,$h,"Anémie",1,0,'L',1,0);
$this->SetXY(15,$this->GetY()+$h);$this->SetFillColor(152, 245, 255 );   $this->Cell(10,$h,$data['m24'],1,0,'C',1,0);$this->Cell(80,$h,"Hémophilie",1,0,'L',1,0);
$this->SetXY(15,$this->GetY()+$h);$this->SetFillColor(152, 245, 255 );   $this->Cell(10,$h,$data['m25'],1,0,'C',1,0);$this->Cell(80,$h,"Autres",1,0,'L',1,0);

$this->SetXY(105,$this->GetY()-238);$this->SetFillColor(253, 253, 9);     $this->Cell(90,$h,"06-OPHTALMOLOGIE",1,0,'C',1,0);
$this->SetXY(105,$this->GetY()+$h);$this->SetFillColor(152, 245, 255 );   $this->Cell(10,$h,$data['m26'],1,0,'C',1,0);$this->Cell(80,$h,"Baisse acuité vis.",1,0,'L',1,0);
$this->SetXY(105,$this->GetY()+$h);$this->SetFillColor(152, 245, 255 );   $this->Cell(10,$h,$data['m27'],1,0,'C',1,0);$this->Cell(80,$h,"Nystagmus",1,0,'L',1,0);
$this->SetXY(105,$this->GetY()+$h);$this->SetFillColor(152, 245, 255 );   $this->Cell(10,$h,$data['m28'],1,0,'C',1,0);$this->Cell(80,$h,"Ptosis",1,0,'L',1,0);
$this->SetXY(105,$this->GetY()+$h);$this->SetFillColor(152, 245, 255 );   $this->Cell(10,$h,$data['m29'],1,0,'C',1,0);$this->Cell(80,$h,"Strabisme",1,0,'L',1,0);
$this->SetXY(105,$this->GetY()+$h);$this->SetFillColor(152, 245, 255 );   $this->Cell(10,$h,$data['m30'],1,0,'C',1,0);$this->Cell(80,$h,"Trachome",1,0,'L',1,0);
$this->SetXY(105,$this->GetY()+$h);$this->SetFillColor(152, 245, 255 );   $this->Cell(10,$h,$data['m31'],1,0,'C',1,0);$this->Cell(80,$h,"Autres",1,0,'L',1,0);

$this->SetXY(105,$this->GetY()+$h);$this->SetFillColor(253, 253, 9);      $this->Cell(90,$h,"07-ORL",1,0,'C',1,0);
$this->SetXY(105,$this->GetY()+$h);$this->SetFillColor(152, 245, 255 );   $this->Cell(10,$h,$data['m32'],1,0,'C',1,0);$this->Cell(80,$h,"Hypoacousie",1,0,'L',1,0);
$this->SetXY(105,$this->GetY()+$h);$this->SetFillColor(152, 245, 255 );   $this->Cell(10,$h,$data['m33'],1,0,'C',1,0);$this->Cell(80,$h,"Rhinite allergique",1,0,'L',1,0);
$this->SetXY(105,$this->GetY()+$h);$this->SetFillColor(152, 245, 255 );   $this->Cell(10,$h,$data['m34'],1,0,'C',1,0);$this->Cell(80,$h,"Surdité",1,0,'L',1,0);
$this->SetXY(105,$this->GetY()+$h);$this->SetFillColor(152, 245, 255 );   $this->Cell(10,$h,$data['m35'],1,0,'C',1,0);$this->Cell(80,$h,"Otites chroniques",1,0,'L',1,0);
$this->SetXY(105,$this->GetY()+$h);$this->SetFillColor(152, 245, 255 );   $this->Cell(10,$h,$data['m36'],1,0,'C',1,0);$this->Cell(80,$h,"Autres",1,0,'L',1,0);

$this->SetXY(105,$this->GetY()+$h);$this->SetFillColor(253, 253, 9);      $this->Cell(90,$h,"08-ORTHOPEDIE",1,0,'C',1,0);
$this->SetXY(105,$this->GetY()+$h);$this->SetFillColor(152, 245, 255 );   $this->Cell(10,$h,$data['m37'],1,0,'C',1,0);$this->Cell(80,$h,"Cypho-scoliose",1,0,'L',1,0);
$this->SetXY(105,$this->GetY()+$h);$this->SetFillColor(152, 245, 255 );   $this->Cell(10,$h,$data['m38'],1,0,'C',1,0);$this->Cell(80,$h,"Déform.squel.",1,0,'L',1,0);
$this->SetXY(105,$this->GetY()+$h);$this->SetFillColor(152, 245, 255 );   $this->Cell(10,$h,$data['m39'],1,0,'C',1,0);$this->Cell(80,$h,"Scoliose",1,0,'L',1,0);
$this->SetXY(105,$this->GetY()+$h);$this->SetFillColor(152, 245, 255 );   $this->Cell(10,$h,$data['m40'],1,0,'C',1,0);$this->Cell(80,$h,"Autres",1,0,'L',1,0);

$this->SetXY(105,$this->GetY()+$h);$this->SetFillColor(253, 253, 9);      $this->Cell(90,$h,"09-PNEUMOLOGIE",1,0,'C',1,0);
$this->SetXY(105,$this->GetY()+$h);$this->SetFillColor(152, 245, 255 );   $this->Cell(10,$h,$data['m41'],1,0,'C',1,0);$this->Cell(80,$h,"Asthme",1,0,'L',1,0);
$this->SetXY(105,$this->GetY()+$h);$this->SetFillColor(152, 245, 255 );   $this->Cell(10,$h,$data['m42'],1,0,'C',1,0);$this->Cell(80,$h,"Tuberculose pulm",1,0,'L',1,0);
$this->SetXY(105,$this->GetY()+$h);$this->SetFillColor(152, 245, 255 );   $this->Cell(10,$h,$data['m43'],1,0,'C',1,0);$this->Cell(80,$h,"Tub.Extra-pulm.",1,0,'L',1,0);
$this->SetXY(105,$this->GetY()+$h);$this->SetFillColor(152, 245, 255 );   $this->Cell(10,$h,$data['m44'],1,0,'C',1,0);$this->Cell(80,$h,"Autres",1,0,'L',1,0);

$this->SetXY(105,$this->GetY()+$h);$this->SetFillColor(253, 253, 9);      $this->Cell(90,$h,"10-NEURO-PSYCHYA",1,0,'C',1,0);
$this->SetXY(105,$this->GetY()+$h);$this->SetFillColor(152, 245, 255 );   $this->Cell(10,$h,$data['m45'],1,0,'C',1,0);$this->Cell(80,$h,"Diffucultés scolaires",1,0,'L',1,0);
$this->SetXY(105,$this->GetY()+$h);$this->SetFillColor(152, 245, 255 );   $this->Cell(10,$h,$data['m46'],1,0,'C',1,0);$this->Cell(80,$h,"Tr.du comport.",1,0,'L',1,0);
$this->SetXY(105,$this->GetY()+$h);$this->SetFillColor(152, 245, 255 );   $this->Cell(10,$h,$data['m47'],1,0,'C',1,0);$this->Cell(80,$h,"Tr. Du langage",1,0,'L',1,0);
$this->SetXY(105,$this->GetY()+$h);$this->SetFillColor(152, 245, 255 );   $this->Cell(10,$h,$data['m49'],1,0,'C',1,0);$this->Cell(80,$h,"Autres",1,0,'L',1,0);

$this->SetXY(105,$this->GetY()+$h);$this->SetFillColor(253, 253, 9);      $this->Cell(90,$h,"11-URO-NEPHRO",1,0,'C',1,0);
$this->SetXY(105,$this->GetY()+$h);$this->SetFillColor(152, 245, 255 );   $this->Cell(10,$h,$data['m50'],1,0,'C',1,0);$this->Cell(80,$h,"Cryptorchidie",1,0,'L',1,0);
$this->SetXY(105,$this->GetY()+$h);$this->SetFillColor(152, 245, 255 );   $this->Cell(10,$h,$data['m51'],1,0,'C',1,0);$this->Cell(80,$h,"Enurésie",1,0,'L',1,0);
$this->SetXY(105,$this->GetY()+$h);$this->SetFillColor(152, 245, 255 );   $this->Cell(10,$h,$data['m52'],1,0,'C',1,0);$this->Cell(80,$h,"Tr.urinaires",1,0,'L',1,0);
$this->SetXY(105,$this->GetY()+$h);$this->SetFillColor(152, 245, 255 );   $this->Cell(10,$h,$data['m53'],1,0,'C',1,0);$this->Cell(80,$h,"Autres",1,0,'L',1,0);

$this->SetXY(105,$this->GetY()+$h);$this->SetFillColor(253, 253, 9);      $this->Cell(90,$h,"12-AUTRES",1,0,'C',1,0);
$this->SetXY(105,$this->GetY()+$h);$this->SetFillColor(152, 245, 255 );   $this->Cell(10,$h,$data['m54'],1,0,'C',1,0);$this->Cell(80,$h,"Autres",1,0,'L',1,0);

}

function EXAMENPSYCHO($n) {
$this->AddPage('P','A4');
$this->setRTL(FALSE); 
$this->RoundedRect($x=5, $y=5, $w=200, $h=285, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$this->SetXY(15,$this->GetY()+10); $this->Cell(180,10,"EXAMEN ET SUIVIE PSYCHOLOGIQUE",1,0,'C',1,0);  

$this->SetXY(15,$this->GetY()+10);
$this->SetFillColor(253, 253, 9);
$this->Cell(26,10,"Date de l'examen",1,0,'C',1,0);
$this->Cell(40,10,"Difficultes scolaire",1,0,'C',1,0);
$this->Cell(40,10,"Trouble du langage",1,0,'C',1,0);
$this->Cell(40,10,"Trouble du comportement",1,0,'C',1,0);
$this->Cell(34,10,"Autres",1,0,'C',1,0);
$this->SetFillColor(152, 235, 251 );

$y=23-$n;
for ($x = 0; $x <= $y; $x++) {
$this->SetXY(15,$this->GetY()+10);
$this->Cell(26,10,"",1,0,'C',1,0);
$this->Cell(40,10,"",1,0,'C',1,0);
$this->Cell(40,10,"",1,0,'C',1,0);
$this->Cell(40,10,"",1,0,'C',1,0);
$this->Cell(34,10,"",1,0,'C',1,0);
}

}

function EXAMENPARA($id,$SEX) 
{
	$this->AddPage('P','A4');
	$this->setRTL(FALSE); 
	$this->RoundedRect($x=5, $y=5, $w=200, $h=285, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
	$this->SetXY(15,$this->GetY());  $this->SetFillColor(152, 235, 251 );$this->Cell(180,10,"Examens paramédicale",1,1,'C',1,0);$w=24.15;
	$this->SetXY(15,$this->GetY());$this->SetFillColor(253, 253, 9);$this->Cell(35,10,"DATE",1,0,'C',1,0);$this->SetFillColor(152, 245, 255 );$this->Cell($w,10,"PALIER",1,0,'C',1,0);$this->Cell($w,10,"POIDS",1,0,'C',1,0);$this->Cell($w,10,"TAILLE",1,0,'C',1,0);$this->Cell($w,10,"AV",1,0,'C',1,0);$this->Cell($w,10,"TA",1,0,'C',1,0);$this->Cell($w,10,"ACV",1,1,'C',1,0);
	$this->mysqlconnect();
	$querypara= "select * from para WHERE IDELEVE= '$id'  order by DATEEXAMEN desc limit 0,4";
	$resultatpara=mysql_query($querypara);
	$this->SetXY(15,$this->GetY());$this->SetFillColor(253, 253, 9);
	while($resultpara=mysql_fetch_object($resultatpara))
	{
		$this->Cell(35,5,$this->dateUS2FR($resultpara->DATEEXAMEN),1,0,'C',1,0);
		$this->SetFillColor(152, 245, 255 );
		$this->Cell($w,5,$this->nbrtostring("palier","id",$resultpara->NIVEAUS,"nompalier"),1,0,'C',1,0);
		$this->Cell($w,5,$resultpara->POIDS,1,0,'C',1,0);
		$this->Cell($w,5,$resultpara->TAILLE,1,0,'C',1,0);
		$this->Cell($w,5,$resultpara->AV,1,0,'C',1,0);
		$this->Cell($w,5,$resultpara->TA,1,0,'C',1,0);
		$this->Cell($w,5,verif($resultpara->ACV,"1"),1,0,'C',1,0);
		$this->SetXY(15,$this->GetY()+5);
		$this->SetFillColor(253, 253, 9);
	}
	if($SEX=="M")  
	{
		$this->Image("002.jpg", $x=15, $y=$this->GetY()+5, $w=180, $h=230, $type='jpg', $link='', $align='C', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=1, $fitbox=false, $hidden=false, $fitonpage=false, $alt=false, $altimgs=array());
	} 
	else 
	{
		$this->Image("001.jpg", $x=15, $y=$this->GetY()+5, $w=180, $h=230, $type='jpg', $link='', $align='C', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=1, $fitbox=false, $hidden=false, $fitonpage=false, $alt=false, $altimgs=array());
	} 
    
	//****************************************************************************************//
	$this->AddPage('P','A4');
	$this->setRTL(FALSE); 
	$this->RoundedRect($x=5, $y=5, $w=200, $h=285, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
	// $this->SetXY(27,$this->GetY()+5);$this->cell(7,5,"180",1,1,'C');
	for ($x = 195; $x >= 90; $x-=5) {$this->SetXY(27,$this->GetY());$this->cell(7,10,$x,1,1,'C');} 
	// $this->SetXY(5,30);$this->cell(21,5,"Rythme",1,1,'L');
	// $this->SetXY(5,35);$this->cell(21,5,"Cardiaque",1,1,'L');
	// $this->SetXY(5,40);$this->cell(21,5,"Foetal",1,1,'L');
	//$this->SetXY(5,15);
	//for($i=0; $i <20; $i++){for($ii=35; $ii<=199; $ii += 7){$data="";$this->SetXY($ii,$this->GetY()-5);$this->cell(7,5,$data,1,1,'C',1,0);}$this->SetXY(5,$this->GetY()+5);}
	// $s=30;$this-> SetDrawColor(225,0,0);$this->SetLineWidth(1);$this->Line(35 ,$s,203,$s );$this->SetLineWidth(0);$this->SetDrawColor(0,0,0);
	// $d=50;$this-> SetDrawColor(223,0,0);$this->SetLineWidth(1);$this->Line(35 ,$d,203,$d );$this->SetLineWidth(0);$this->SetDrawColor(0,0,0);

	$this->SetLineWidth(0.1);$this->setDrawColor(0,0,0);
	for($i=10; $i <232; $i+=2){$this->Line(27+7,$i,178,$i);}//hor$this->setDrawColor(0,0,225);
	for($i=27+7; $i <180; $i+=2){$this->Line($i,10,$i,230);}//ver
	$this->SetLineWidth(0);$this->setDrawColor(0,0,0);
	
	$this->mysqlconnect();
	$query = "select * from para WHERE  IDELEVE = '$id'  order by  TAILLE asc ";
	$resultat=mysql_query($query);
	$x=array(0=>5,184=>10,186=>15);
	$y=array(127=>0,129=>1,130=>2,172=>3);
	// $tiba = array();$redha = array();	
	while($result=mysql_fetch_object($resultat))
	{
	// $this->SetFont('aefurat', '', 20);$this->SetTextColor(0,0,225);
	// $this->Text($x[$result->Months],13+(5*$y[$result->TAILLE]),"x".$result->Months);
	// $this->SetTextColor(0,0,0);$this->SetFont('aefurat', '', 10);
	// array_push($tiba,$x[$result->DHE2]);array_push($redha,(13+(5*$y[$result->RCF])));
	}
	// $this->SetLineWidth(0.8);$this->setDrawColor(0,0,225);for($i=0;$i<(count($tiba)-1);$i++){$this->Line($tiba[$i]+3.5,$redha[$i]+4,$tiba[$i+1]+3.5,$redha[$i+1]+4);}$this->SetLineWidth(0);$this->setDrawColor(0,0,0);
	//****************************************************************************************//	
}



	
}
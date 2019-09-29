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
function verif($id,$val) 
{
if ($id == $val){return 'X';}else{return 'O';} 
}
function BUCCO($data) {
$this->SetFillColor(10 );
if($data['d11']=='c') {$this->SetXY(41.5,161);$this->Cell(2,0,"",0,0,'L',1,0);} else {$this->SetXY(41.5,161);$this->Cell(2,0,"",0,0,'L');}
if($data['d12']=='c') {$this->SetXY(37.5,162);$this->Cell(2,0,"",0,0,'L',1,0);} else {$this->SetXY(41.5,161);$this->Cell(2,0,"",0,0,'L');}
if($data['d13']=='c') {$this->SetXY(35,164.5);$this->Cell(2,0,"",0,0,'L',1,0);} else {$this->SetXY(41.5,161);$this->Cell(2,0,"",0,0,'L');}
if($data['d14']=='c') {$this->SetXY(33.2,168);$this->Cell(2,0,"",0,0,'L',1,0);} else {$this->SetXY(41.5,161);$this->Cell(2,0,"",0,0,'L');}
if($data['d15']=='c') {$this->SetXY(31.2,171.5);$this->Cell(2,0,"",0,0,'L',1,0);} else {$this->SetXY(41.5,161);$this->Cell(2,0,"",0,0,'L');}
if($data['d16']=='c') {$this->SetXY(30,175.5);$this->Cell(2,0,"",0,0,'L',1,0);} else {$this->SetXY(41.5,161);$this->Cell(2,0,"",0,0,'L');}
if($data['d17']=='c') {$this->SetXY(29,180);$this->Cell(2,0,"",0,0,'L',1,0);} else {$this->SetXY(41.5,161);$this->Cell(2,0,"",0,0,'L');}
if($data['d18']=='c') {$this->SetXY(29,184.5);$this->Cell(2,0,"",0,0,'L',1,0);} else {$this->SetXY(41.5,161);$this->Cell(2,0,"",0,0,'L');}

if($data['d21']=='c') {$this->SetXY(41.5+4,161);$this->Cell(2,0,"",0,0,'L',1,0);} else {$this->SetXY(41.5,161);$this->Cell(2,0,"",0,0,'L');}
if($data['d22']=='c') {$this->SetXY(37.5+12,162);$this->Cell(2,0,"",0,0,'L',1,0);} else {$this->SetXY(41.5,161);$this->Cell(2,0,"",0,0,'L');}
if($data['d23']=='c') {$this->SetXY(35+16.5,164.5);$this->Cell(2,0,"",0,0,'L',1,0);} else {$this->SetXY(41.5,161);$this->Cell(2,0,"",0,0,'L');}
if($data['d24']=='c') {$this->SetXY(33.2+20.5,168);$this->Cell(2,0,"",0,0,'L',1,0);} else {$this->SetXY(41.5,161);$this->Cell(2,0,"",0,0,'L');}
if($data['d25']=='c') {$this->SetXY(31.2+24.5,171.5);$this->Cell(2,0,"",0,0,'L',1,0);} else {$this->SetXY(41.5,161);$this->Cell(2,0,"",0,0,'L');}
if($data['d26']=='c') {$this->SetXY(30+27,175.5);$this->Cell(2,0,"",0,0,'L',1,0);} else {$this->SetXY(41.5,161);$this->Cell(2,0,"",0,0,'L');}
if($data['d27']=='c') {$this->SetXY(29+29,180);$this->Cell(2,0,"",0,0,'L',1,0);} else {$this->SetXY(41.5,161);$this->Cell(2,0,"",0,0,'L');}
if($data['d28']=='c') {$this->SetXY(29+28.5,184.5);$this->Cell(2,0,"",0,0,'L',1,0);} else {$this->SetXY(41.5,161);$this->Cell(2,0,"",0,0,'L');}

if($data['d31']=='c') {$this->SetXY(45,217);$this->Cell(2,0,"",0,0,'L',1,0);} else {$this->SetXY(41.5,161);$this->Cell(2,0,"",0,0,'L');}
if($data['d32']=='c') {$this->SetXY(48,216);$this->Cell(2,0,"",0,0,'L',1,0);} else {$this->SetXY(41.5,161);$this->Cell(2,0,"",0,0,'L');}
if($data['d33']=='c') {$this->SetXY(50.3,214.5);$this->Cell(2,0,"",0,0,'L',1,0);} else {$this->SetXY(41.5,161);$this->Cell(2,0,"",0,0,'L');}
if($data['d34']=='c') {$this->SetXY(52.5,211);$this->Cell(2,0,"",0,0,'L',1,0);} else {$this->SetXY(41.5,161);$this->Cell(2,0,"",0,0,'L');}
if($data['d35']=='c') {$this->SetXY(55,207);$this->Cell(2,0,"",0,0,'L',1,0);} else {$this->SetXY(41.5,161);$this->Cell(2,0,"",0,0,'L');}
if($data['d36']=='c') {$this->SetXY(57,202.5);$this->Cell(2,0,"",0,0,'L',1,0);} else {$this->SetXY(41.5,161);$this->Cell(2,0,"",0,0,'L');}
if($data['d37']=='c') {$this->SetXY(58,198.4);$this->Cell(2,0,"",0,0,'L',1,0);} else {$this->SetXY(41.5,161);$this->Cell(2,0,"",0,0,'L');}
if($data['d38']=='c') {$this->SetXY(58,193.5);$this->Cell(2,0,"",0,0,'L',1,0);} else {$this->SetXY(41.5,161);$this->Cell(2,0,"",0,0,'L');}

if($data['d41']=='c') {$this->SetXY(42,217);$this->Cell(2,0,"",0,0,'L',1,0);} else {$this->SetXY(41.5,161);$this->Cell(2,0,"",0,0,'L');}
if($data['d42']=='c') {$this->SetXY(39.5,216);$this->Cell(2,0,"",0,0,'L',1,0);} else {$this->SetXY(41.5,161);$this->Cell(2,0,"",0,0,'L');}
if($data['d43']=='c') {$this->SetXY(37,214.5);$this->Cell(2,0,"",0,0,'L',1,0);} else {$this->SetXY(41.5,161);$this->Cell(2,0,"",0,0,'L');}
if($data['d44']=='c') {$this->SetXY(35,211);$this->Cell(2,0,"",0,0,'L',1,0);} else {$this->SetXY(41.5,161);$this->Cell(2,0,"",0,0,'L');}
if($data['d45']=='c') {$this->SetXY(32,208);$this->Cell(2,0,"",0,0,'L',1,0);} else {$this->SetXY(41.5,161);$this->Cell(2,0,"",0,0,'L');}
if($data['d46']=='c') {$this->SetXY(30.5,203);$this->Cell(2,0,"",0,0,'L',1,0);} else {$this->SetXY(41.5,161);$this->Cell(2,0,"",0,0,'L');}
if($data['d47']=='c') {$this->SetXY(29,198.4);$this->Cell(2,0,"",0,0,'L',1,0);} else {$this->SetXY(41.5,161);$this->Cell(2,0,"",0,0,'L');}
if($data['d48']=='c') {$this->SetXY(29,193.5);$this->Cell(2,0,"",0,0,'L',1,0);} else {$this->SetXY(41.5,161);$this->Cell(2,0,"",0,0,'L');}



}




function FICHEBUCCO($data) {
$this->AddPage('P','A4');
$this->setRTL(FALSE); 
$this->RoundedRect($x=5, $y=5, $w=200, $h=285, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$this->SetXY(15,$this->GetY()+5); $this->SetFillColor(152, 235, 251 );$this->Cell(180,10,"FICHE SANTE BUCCO-DENTAIRE",1,0,'C',1,0);    
$this->SetXY(15,$this->GetY()+20);$this->Cell(45,10,"DATE : ".$this->dateUS2FR($data['DATE']),1,0,'L'); 
$this->SetXY(15,$this->GetY()+20);$this->Cell(45,10,"CLASSE : ".$data['CLASSE'],1,0,'L'); $this->Cell(90,10,"",0,0,'L');$this->Cell(45,10,"AGE : ".$data['AGE'],1,0,'L');
$this->RoundedRect($x=15, $y=$this->GetY()+20, $w=180, $h=20, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$this->SetXY(15,$this->GetY()+20);$this->Cell(45,10,"1-Hygienne bucco-dentaire",0,0,'L'); $this->Cell(90,10,"",0,0,'L');$this->Cell(5,10,$data['HBDA'],1,0,'C');$this->Cell(40,10,"ACCEPTABLE " ,0,0,'L');
$this->SetXY(15,$this->GetY()+10);$this->Cell(45,10,"",0,0,'L');                        $this->Cell(90,10,"",0,0,'L');$this->Cell(5,10,$data['HBDNA'],1,0,'C');$this->Cell(40,10,"NON ACCEPTABLE ",0,0,'L');
$this->RoundedRect($x=15, $y=$this->GetY()+20, $w=180, $h=20, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$this->SetXY(15,$this->GetY()+20);$this->Cell(45,10,"2-Gingivite",0,0,'L');               $this->Cell(90,10,"",0,0,'L');$this->Cell(5,10,$data['GO'],1,0,'C');$this->Cell(45,10,"OUI",0,0,'L');
$this->SetXY(15,$this->GetY()+10);$this->Cell(45,10,"",0,0,'L');                          $this->Cell(90,10,"",0,0,'L');$this->Cell(5,10,$data['GN'],1,0,'C');$this->Cell(45,10,"NON",0,0,'L');
$this->SetXY(15,$this->GetY()+10);$this->Cell(45,10,"",0,0,'L');                          $this->Cell(90,10,"",0,0,'L');$this->Cell(45,10,"",0,0,'L');
$this->RoundedRect($x=15, $y=$this->GetY()+20, $w=60, $h=90, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$this->RoundedRect($x=15+60, $y=$this->GetY()+20, $w=60, $h=90, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$this->RoundedRect($x=15+120, $y=$this->GetY()+20, $w=60, $h=90, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$this->SetXY(15,$this->GetY()+20);$this->Cell(45,10,"3-Indice de carie",0,0,'L'); 
$this->Image("dents.jpg", $x=16, $y=$this->GetY()+10, $w=58, $h=70, $type='jpg', $link='', $align='C', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=0, $fitbox=false, $hidden=false, $fitonpage=false, $alt=false, $altimgs=array());
$this->Image("dents.jpg", $x=15+61, $y=$this->GetY()+10, $w=58, $h=70, $type='jpg', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=0, $fitbox=false, $hidden=false, $fitonpage=false, $alt=false, $altimgs=array());
$this->Image("dents.jpg", $x=15+121, $y=$this->GetY()+10, $w=58, $h=70, $type='jpg', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=0, $fitbox=false, $hidden=false, $fitonpage=false, $alt=false, $altimgs=array());


$this->SetXY(15,$this->GetY()+80);$this->Cell(60,5,"C : ".$data['C'],1,0,'L');$this->Cell(60,5,"A : ".$data['A'],1,0,'L');$this->Cell(60,5,"O : ".$data['O'],1,0,'L');
$this->SetXY(15,$this->GetY()+5);$this->Cell(60,5,"c : ".$data['c'],1,0,'L');$this->Cell(60,5,"a : ".$data['a'],1,0,'L');$this->Cell(60,5,"o : ".$data['o'],1,0,'L');
$this->RoundedRect($x=15, $y=$this->GetY()+10, $w=180, $h=10, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$this->SetXY(15,$this->GetY()+10);$this->Cell(45,5,"4-Anomalie dento-faciale",0,0,'L');              $this->Cell(90,5,"",0,0,'L');$this->Cell(5,5,$data['ODFO'],1,0,'C');$this->Cell(45,5,"OUI",0,0,'L');
$this->SetXY(15,$this->GetY()+5);$this->Cell(45,5,"Orientation vers un milieu specialisé",0,0,'L');$this->Cell(90,5,"",0,0,'L');$this->Cell(5,5,$data['ODFN'],1,0,'C');$this->Cell(45,5,"NON",0,0,'L');
$this->RoundedRect($x=15, $y=$this->GetY()+15, $w=180, $h=15, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$this->SetXY(15,$this->GetY()+15);$this->Cell(45,5,"5-Autres pathologies",0,0,'L');                  $this->Cell(90,5,"",0,0,'L');$this->Cell(45,5,"_______________________",0,0,'L');
$this->SetXY(15,$this->GetY()+5);$this->Cell(45,5,"Orientation vers un milieu specialisé",0,0,'L');$this->Cell(90,5,"",0,0,'L');$this->Cell(45,5,"_______________________",0,0,'L');

$this->BUCCO($data);
}

function SUIVIEMEDICAL() {
$this->AddPage('P','A4');
$this->setRTL(FALSE); 
$this->RoundedRect($x=5, $y=5, $w=200, $h=285, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$this->SetXY(15,$this->GetY()+5); $this->SetFillColor(152, 235, 251 );$this->Cell(180,10,"SUIVIE MEDICAL",1,0,'C',1,0);  
$this->SetXY(15,$this->GetY()+15);$this->SetFillColor(253, 253, 9 );$this->Cell(26,10,"DATE",1,0,'C',1,0);$this->Cell(26,10,"CLASSE",1,0,'C',1,0);      $this->Cell(26,10,"AGE",1,0,'C',1,0); $this->Cell(66,10,"RESULTAT ET CONCLUSION D'EXAMENS",1,0,'C',1,0);$this->Cell(36,10,"MEDECIN",1,1,'C',1,0);
$this->SetXY(15,$this->GetY());$this->SetFillColor(152, 235, 251 );$this->Cell(26,10,"",1,0,'C',1,0);$this->Cell(26,10,"",1,0,'C',1,0);      $this->Cell(26,10,"",1,0,'C',1,0); $this->Cell(66,10,"",1,0,'C',1,0);$this->Cell(36,10,"",1,1,'C',1,0);
$this->SetXY(15,$this->GetY());$this->SetFillColor(152, 235, 251 );$this->Cell(26,10,"",1,0,'C',1,0);$this->Cell(26,10,"",1,0,'C',1,0);      $this->Cell(26,10,"",1,0,'C',1,0); $this->Cell(66,10,"",1,0,'C',1,0);$this->Cell(36,10,"",1,1,'C',1,0);
$this->SetXY(15,$this->GetY());$this->SetFillColor(152, 235, 251 );$this->Cell(26,10,"",1,0,'C',1,0);$this->Cell(26,10,"",1,0,'C',1,0);      $this->Cell(26,10,"",1,0,'C',1,0); $this->Cell(66,10,"",1,0,'C',1,0);$this->Cell(36,10,"",1,1,'C',1,0);
$this->SetXY(15,$this->GetY());$this->SetFillColor(152, 235, 251 );$this->Cell(26,10,"",1,0,'C',1,0);$this->Cell(26,10,"",1,0,'C',1,0);      $this->Cell(26,10,"",1,0,'C',1,0); $this->Cell(66,10,"",1,0,'C',1,0);$this->Cell(36,10,"",1,1,'C',1,0);
$this->SetXY(15,$this->GetY());$this->SetFillColor(152, 235, 251 );$this->Cell(26,10,"",1,0,'C',1,0);$this->Cell(26,10,"",1,0,'C',1,0);      $this->Cell(26,10,"",1,0,'C',1,0); $this->Cell(66,10,"",1,0,'C',1,0);$this->Cell(36,10,"",1,1,'C',1,0);
$this->SetXY(15,$this->GetY());$this->SetFillColor(152, 235, 251 );$this->Cell(26,10,"",1,0,'C',1,0);$this->Cell(26,10,"",1,0,'C',1,0);      $this->Cell(26,10,"",1,0,'C',1,0); $this->Cell(66,10,"",1,0,'C',1,0);$this->Cell(36,10,"",1,1,'C',1,0);
$this->SetXY(15,$this->GetY());$this->SetFillColor(152, 235, 251 );$this->Cell(26,10,"",1,0,'C',1,0);$this->Cell(26,10,"",1,0,'C',1,0);      $this->Cell(26,10,"",1,0,'C',1,0); $this->Cell(66,10,"",1,0,'C',1,0);$this->Cell(36,10,"",1,1,'C',1,0);
$this->SetXY(15,$this->GetY());$this->SetFillColor(152, 235, 251 );$this->Cell(26,10,"",1,0,'C',1,0);$this->Cell(26,10,"",1,0,'C',1,0);      $this->Cell(26,10,"",1,0,'C',1,0); $this->Cell(66,10,"",1,0,'C',1,0);$this->Cell(36,10,"",1,1,'C',1,0);
$this->SetXY(15,$this->GetY());$this->SetFillColor(152, 235, 251 );$this->Cell(26,10,"",1,0,'C',1,0);$this->Cell(26,10,"",1,0,'C',1,0);      $this->Cell(26,10,"",1,0,'C',1,0); $this->Cell(66,10,"",1,0,'C',1,0);$this->Cell(36,10,"",1,1,'C',1,0);
$this->SetXY(15,$this->GetY());$this->SetFillColor(152, 235, 251 );$this->Cell(26,10,"",1,0,'C',1,0);$this->Cell(26,10,"",1,0,'C',1,0);      $this->Cell(26,10,"",1,0,'C',1,0); $this->Cell(66,10,"",1,0,'C',1,0);$this->Cell(36,10,"",1,1,'C',1,0);
$this->SetXY(15,$this->GetY());$this->SetFillColor(152, 235, 251 );$this->Cell(26,10,"",1,0,'C',1,0);$this->Cell(26,10,"",1,0,'C',1,0);      $this->Cell(26,10,"",1,0,'C',1,0); $this->Cell(66,10,"",1,0,'C',1,0);$this->Cell(36,10,"",1,1,'C',1,0);
$this->SetXY(15,$this->GetY());$this->SetFillColor(152, 235, 251 );$this->Cell(26,10,"",1,0,'C',1,0);$this->Cell(26,10,"",1,0,'C',1,0);      $this->Cell(26,10,"",1,0,'C',1,0); $this->Cell(66,10,"",1,0,'C',1,0);$this->Cell(36,10,"",1,1,'C',1,0);
$this->SetXY(15,$this->GetY());$this->SetFillColor(152, 235, 251 );$this->Cell(26,10,"",1,0,'C',1,0);$this->Cell(26,10,"",1,0,'C',1,0);      $this->Cell(26,10,"",1,0,'C',1,0); $this->Cell(66,10,"",1,0,'C',1,0);$this->Cell(36,10,"",1,1,'C',1,0);
$this->SetXY(15,$this->GetY());$this->SetFillColor(152, 235, 251 );$this->Cell(26,10,"",1,0,'C',1,0);$this->Cell(26,10,"",1,0,'C',1,0);      $this->Cell(26,10,"",1,0,'C',1,0); $this->Cell(66,10,"",1,0,'C',1,0);$this->Cell(36,10,"",1,1,'C',1,0);
$this->SetXY(15,$this->GetY());$this->SetFillColor(152, 235, 251 );$this->Cell(26,10,"",1,0,'C',1,0);$this->Cell(26,10,"",1,0,'C',1,0);      $this->Cell(26,10,"",1,0,'C',1,0); $this->Cell(66,10,"",1,0,'C',1,0);$this->Cell(36,10,"",1,1,'C',1,0);
$this->SetXY(15,$this->GetY());$this->SetFillColor(152, 235, 251 );$this->Cell(26,10,"",1,0,'C',1,0);$this->Cell(26,10,"",1,0,'C',1,0);      $this->Cell(26,10,"",1,0,'C',1,0); $this->Cell(66,10,"",1,0,'C',1,0);$this->Cell(36,10,"",1,1,'C',1,0);
$this->SetXY(15,$this->GetY());$this->SetFillColor(152, 235, 251 );$this->Cell(26,10,"",1,0,'C',1,0);$this->Cell(26,10,"",1,0,'C',1,0);      $this->Cell(26,10,"",1,0,'C',1,0); $this->Cell(66,10,"",1,0,'C',1,0);$this->Cell(36,10,"",1,1,'C',1,0);
$this->SetXY(15,$this->GetY());$this->SetFillColor(152, 235, 251 );$this->Cell(26,10,"",1,0,'C',1,0);$this->Cell(26,10,"",1,0,'C',1,0);      $this->Cell(26,10,"",1,0,'C',1,0); $this->Cell(66,10,"",1,0,'C',1,0);$this->Cell(36,10,"",1,1,'C',1,0);
$this->SetXY(15,$this->GetY());$this->SetFillColor(152, 235, 251 );$this->Cell(26,10,"",1,0,'C',1,0);$this->Cell(26,10,"",1,0,'C',1,0);      $this->Cell(26,10,"",1,0,'C',1,0); $this->Cell(66,10,"",1,0,'C',1,0);$this->Cell(36,10,"",1,1,'C',1,0);
$this->SetXY(15,$this->GetY());$this->SetFillColor(152, 235, 251 );$this->Cell(26,10,"",1,0,'C',1,0);$this->Cell(26,10,"",1,0,'C',1,0);      $this->Cell(26,10,"",1,0,'C',1,0); $this->Cell(66,10,"",1,0,'C',1,0);$this->Cell(36,10,"",1,1,'C',1,0);
$this->SetXY(15,$this->GetY());$this->SetFillColor(152, 235, 251 );$this->Cell(26,10,"",1,0,'C',1,0);$this->Cell(26,10,"",1,0,'C',1,0);      $this->Cell(26,10,"",1,0,'C',1,0); $this->Cell(66,10,"",1,0,'C',1,0);$this->Cell(36,10,"",1,1,'C',1,0);
$this->SetXY(15,$this->GetY());$this->SetFillColor(152, 235, 251 );$this->Cell(26,10,"",1,0,'C',1,0);$this->Cell(26,10,"",1,0,'C',1,0);      $this->Cell(26,10,"",1,0,'C',1,0); $this->Cell(66,10,"",1,0,'C',1,0);$this->Cell(36,10,"",1,1,'C',1,0);
$this->SetXY(15,$this->GetY());$this->SetFillColor(152, 235, 251 );$this->Cell(26,10,"",1,0,'C',1,0);$this->Cell(26,10,"",1,0,'C',1,0);      $this->Cell(26,10,"",1,0,'C',1,0); $this->Cell(66,10,"",1,0,'C',1,0);$this->Cell(36,10,"",1,1,'C',1,0);
$this->SetXY(15,$this->GetY());$this->SetFillColor(152, 235, 251 );$this->Cell(26,10,"",1,0,'C',1,0);$this->Cell(26,10,"",1,0,'C',1,0);      $this->Cell(26,10,"",1,0,'C',1,0); $this->Cell(66,10,"",1,0,'C',1,0);$this->Cell(36,10,"",1,1,'C',1,0);
}

function EXAMENMEDICAL() {
$this->AddPage('P','A4');
$this->setRTL(FALSE); 
$this->RoundedRect($x=5, $y=5, $w=200, $h=285, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$this->SetXY(15,$this->GetY()+5); $this->SetFillColor(152, 235, 251 );$this->Cell(180,10,"EXAMEN MEDICAL DE DEPISTAGE",1,0,'C',1,0);  
$this->SetXY(15,$this->GetY()+10);$this->SetFillColor(253, 253, 9);$this->Cell(40,10,"DATE DE L'EXAMEN",1,0,'C',1,0);$this->SetFillColor(152, 245, 255 );$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,1,'C',1,0);
$this->SetXY(15,$this->GetY());$this->SetFillColor(253, 253, 9);$this->Cell(40,10,"CLASSE FREQUENTE",1,0,'C',1,0);$this->SetFillColor(152, 245, 255 );$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,1,'C',1,0);
$this->SetXY(15,$this->GetY());$this->SetFillColor(253, 253, 9);$this->Cell(40,10,"AGE DE L'ELEVE",1,0,'C',1,0);$this->SetFillColor(152, 245, 255 );$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,1,'C',1,0);
$this->SetXY(15,$this->GetY());$this->SetFillColor(253, 253, 9);$this->Cell(40,10,"TENSSION ARTERIEL",1,0,'C',1,0);$this->SetFillColor(152, 245, 255 );$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,1,'C',1,0);
$this->SetXY(15,$this->GetY());$this->SetFillColor(253, 253, 9);$this->Cell(40,10,"ACUITÉ VISUELLE OD",1,0,'C',1,0);$this->SetFillColor(152, 245, 255 );$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,1,'C',1,0);
$this->SetXY(15,$this->GetY());$this->SetFillColor(253, 253, 9);$this->Cell(40,10,"ACUITÉ VISUELLE OG",1,0,'C',1,0);$this->SetFillColor(152, 245, 255 );$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,1,'C',1,0);
$this->SetXY(15,$this->GetY());$this->SetFillColor(253, 253, 9);$this->Cell(40,10,"PEDICULLOSE",1,0,'C',1,0);$this->SetFillColor(152, 245, 255 );$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,1,'C',1,0);
$this->SetXY(15,$this->GetY()); $this->SetFillColor(152, 235, 251 );$this->Cell(180,10,"ATCD DE L'ELEVE",1,0,'C',1,0);  
$this->SetXY(15,$this->GetY()+10);$this->SetFillColor(253, 253, 9);$this->Cell(40,10,"HOSPITALISATION",1,0,'C',1,0);$this->SetFillColor(152, 245, 255 );$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,1,'C',1,0);
$this->SetXY(15,$this->GetY());$this->SetFillColor(253, 253, 9);$this->Cell(40,10,"DIABETE",1,0,'C',1,0);$this->SetFillColor(152, 245, 255 );$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,1,'C',1,0);
$this->SetXY(15,$this->GetY());$this->SetFillColor(253, 253, 9);$this->Cell(40,10,"ASTHME",1,0,'C',1,0);$this->SetFillColor(152, 245, 255 );$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,1,'C',1,0);
$this->SetXY(15,$this->GetY());$this->SetFillColor(253, 253, 9);$this->Cell(40,10,"EPILEPSIE",1,0,'C',1,0);$this->SetFillColor(152, 245, 255 );$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,1,'C',1,0);
$this->SetXY(15,$this->GetY());$this->SetFillColor(253, 253, 9);$this->Cell(40,10,"AUTRES",1,0,'C',1,0);$this->SetFillColor(152, 245, 255 );$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,1,'C',1,0);
$this->SetXY(15,$this->GetY()); $this->SetFillColor(152, 235, 251 );$this->Cell(180,10,"EXAMEN MEDICAL",1,0,'C',1,0); 
$this->SetXY(15,$this->GetY()+10);$this->SetFillColor(253, 253, 9);$this->Cell(40,10,"APP NEUROLOGIQUE",1,0,'C',1,0);$this->SetFillColor(152, 245, 255 );$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,1,'C',1,0);
$this->SetXY(15,$this->GetY());$this->SetFillColor(253, 253, 9);$this->Cell(40,10,"APP ENDOCRINIENE",1,0,'C',1,0);$this->SetFillColor(152, 245, 255 );$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,1,'C',1,0);
$this->SetXY(15,$this->GetY());$this->SetFillColor(253, 253, 9);$this->Cell(40,10,"RACHIS ET MEMBRES",1,0,'C',1,0);$this->SetFillColor(152, 245, 255 );$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,1,'C',1,0);
$this->SetXY(15,$this->GetY());$this->SetFillColor(253, 253, 9);$this->Cell(40,10,"PEAU ET PHANERS",1,0,'C',1,0);$this->SetFillColor(152, 245, 255 );$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,1,'C',1,0);
$this->SetXY(15,$this->GetY());$this->SetFillColor(253, 253, 9);$this->Cell(40,10,"APP OPHTALMIQUE",1,0,'C',1,0);$this->SetFillColor(152, 245, 255 );$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,1,'C',1,0);
$this->SetXY(15,$this->GetY());$this->SetFillColor(253, 253, 9);$this->Cell(40,10,"APP ORL",1,0,'C',1,0);$this->SetFillColor(152, 245, 255 );$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,1,'C',1,0);
$this->SetXY(15,$this->GetY());$this->SetFillColor(253, 253, 9);$this->Cell(40,10,"APP RESPIRATOIRE",1,0,'C',1,0);$this->SetFillColor(152, 245, 255 );$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,1,'C',1,0);
$this->SetXY(15,$this->GetY());$this->SetFillColor(253, 253, 9);$this->Cell(40,10,"APP CARDIO-VASCULAIRE",1,0,'C',1,0);$this->SetFillColor(152, 245, 255 );$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,1,'C',1,0);
$this->SetXY(15,$this->GetY());$this->SetFillColor(253, 253, 9);$this->Cell(40,10,"APP DIGESTIF",1,0,'C',1,0);$this->SetFillColor(152, 245, 255 );$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,1,'C',1,0);
$this->SetXY(15,$this->GetY());$this->SetFillColor(253, 253, 9);$this->Cell(40,10,"APP URINAIRE",1,0,'C',1,0);$this->SetFillColor(152, 245, 255 );$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,1,'C',1,0);
$this->SetXY(15,$this->GetY());$this->SetFillColor(253, 253, 9);$this->Cell(40,10,"APP GENITAL",1,0,'C',1,0);$this->SetFillColor(152, 245, 255 );$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,1,'C',1,0);
$this->SetXY(15,$this->GetY());$this->SetFillColor(253, 253, 9);$this->Cell(40,10,"AUTRES ANOMALIES ",1,0,'C',1,0);$this->SetFillColor(152, 245, 255 );$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,1,'C',1,0);

}

function EXAMENPSYCHO() {
$this->AddPage('P','A4');
$this->setRTL(FALSE); 
$this->RoundedRect($x=5, $y=5, $w=200, $h=285, $r=2, $round_corner='1111', $style='', $border_style=array(), $fill_color=array());
$this->SetXY(15,$this->GetY()+5); $this->SetFillColor(152, 235, 251 );$this->Cell(180,10,"EXAMEN ET SUIVIE PSYCHOLOGIQUE",1,0,'C',1,0);  
$this->SetXY(15,$this->GetY()+10);$this->SetFillColor(253, 253, 9);$this->Cell(40,10,"DATE DE L'EXAMEN",1,0,'C',1,0);$this->SetFillColor(152, 245, 255 );$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,1,'C',1,0);
$this->SetXY(15,$this->GetY());$this->SetFillColor(253, 253, 9);$this->Cell(40,10,"DIFFICULTES SCOLAIRE",1,0,'C',1,0);$this->SetFillColor(152, 245, 255 );$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,1,'C',1,0);
$this->SetXY(15,$this->GetY());$this->SetFillColor(253, 253, 9);$this->Cell(40,10,"TROUBLE DU LANGAGE",1,0,'C',1,0);$this->SetFillColor(152, 245, 255 );$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,1,'C',1,0);
$this->SetXY(15,$this->GetY());$this->SetFillColor(253, 253, 9);$this->Cell(40,10,"TROUBLE DU COMPORTEMENT",1,0,'C',1,0);$this->SetFillColor(152, 245, 255 );$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,1,'C',1,0);
$this->SetXY(15,$this->GetY());$this->SetFillColor(253, 253, 9);$this->Cell(40,10,"AUTRES",1,0,'C',1,0);$this->SetFillColor(152, 245, 255 );$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,1,'C',1,0);

$this->SetXY(15,$this->GetY()+10);$this->SetFillColor(253, 253, 9);$this->Cell(40,10,"DATE DE L'EXAMEN",1,0,'C',1,0);$this->SetFillColor(152, 245, 255 );$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,1,'C',1,0);
$this->SetXY(15,$this->GetY());$this->SetFillColor(253, 253, 9);$this->Cell(40,10,"DIFFICULTES SCOLAIRE",1,0,'C',1,0);$this->SetFillColor(152, 245, 255 );$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,1,'C',1,0);
$this->SetXY(15,$this->GetY());$this->SetFillColor(253, 253, 9);$this->Cell(40,10,"TROUBLE DU LANGAGE",1,0,'C',1,0);$this->SetFillColor(152, 245, 255 );$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,1,'C',1,0);
$this->SetXY(15,$this->GetY());$this->SetFillColor(253, 253, 9);$this->Cell(40,10,"TROUBLE DU COMPORTEMENT",1,0,'C',1,0);$this->SetFillColor(152, 245, 255 );$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,1,'C',1,0);
$this->SetXY(15,$this->GetY());$this->SetFillColor(253, 253, 9);$this->Cell(40,10,"AUTRES",1,0,'C',1,0);$this->SetFillColor(152, 245, 255 );$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,1,'C',1,0);

$this->SetXY(15,$this->GetY()+10);$this->SetFillColor(253, 253, 9);$this->Cell(40,10,"DATE DE L'EXAMEN",1,0,'C',1,0);$this->SetFillColor(152, 245, 255 );$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,1,'C',1,0);
$this->SetXY(15,$this->GetY());$this->SetFillColor(253, 253, 9);$this->Cell(40,10,"DIFFICULTES SCOLAIRE",1,0,'C',1,0);$this->SetFillColor(152, 245, 255 );$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,1,'C',1,0);
$this->SetXY(15,$this->GetY());$this->SetFillColor(253, 253, 9);$this->Cell(40,10,"TROUBLE DU LANGAGE",1,0,'C',1,0);$this->SetFillColor(152, 245, 255 );$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,1,'C',1,0);
$this->SetXY(15,$this->GetY());$this->SetFillColor(253, 253, 9);$this->Cell(40,10,"TROUBLE DU COMPORTEMENT",1,0,'C',1,0);$this->SetFillColor(152, 245, 255 );$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,1,'C',1,0);
$this->SetXY(15,$this->GetY());$this->SetFillColor(253, 253, 9);$this->Cell(40,10,"AUTRES",1,0,'C',1,0);$this->SetFillColor(152, 245, 255 );$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,1,'C',1,0);

$this->SetXY(15,$this->GetY()+10);$this->SetFillColor(253, 253, 9);$this->Cell(40,10,"DATE DE L'EXAMEN",1,0,'C',1,0);$this->SetFillColor(152, 245, 255 );$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,1,'C',1,0);
$this->SetXY(15,$this->GetY());$this->SetFillColor(253, 253, 9);$this->Cell(40,10,"DIFFICULTES SCOLAIRE",1,0,'C',1,0);$this->SetFillColor(152, 245, 255 );$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,1,'C',1,0);
$this->SetXY(15,$this->GetY());$this->SetFillColor(253, 253, 9);$this->Cell(40,10,"TROUBLE DU LANGAGE",1,0,'C',1,0);$this->SetFillColor(152, 245, 255 );$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,1,'C',1,0);
$this->SetXY(15,$this->GetY());$this->SetFillColor(253, 253, 9);$this->Cell(40,10,"TROUBLE DU COMPORTEMENT",1,0,'C',1,0);$this->SetFillColor(152, 245, 255 );$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,1,'C',1,0);
$this->SetXY(15,$this->GetY());$this->SetFillColor(253, 253, 9);$this->Cell(40,10,"AUTRES",1,0,'C',1,0);$this->SetFillColor(152, 245, 255 );$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,0,'C',1,0);$this->Cell(35,10,"",1,1,'C',1,0);

}













	
}
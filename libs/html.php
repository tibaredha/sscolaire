<?php


class HTML  {
	
	public $db_host=DB_HOST;
	public $db_name=DB_NAME;   
	public $db_user=DB_USER;
	public $db_pass=DB_PASS;
	public $rootphotos2='public/images/';
	public $key = "tiba";  // Clé de 8 caractères max
	function __construct() {
	   // parent::__construct();
	}
	
	function txts($x,$y,$name,$size,$value,$param)
	{
	echo " <input type=\"text\" name=\"".$name."\" size=\"".$size."\" value=\"".$value."\"  id=\"".$param."\"   required />";
	}

	function cao($idcao,$name)
	{
	echo '<select id ="'.$idcao.'" class="ax" name="'.$name.'">';
	echo '<option value="s">S</option>';
	echo '<option value="c">C</option>';
	//echo '<option value="f">f</option>';
	echo '<option value="o">O</option>';
	//echo '<option value="p">p</option>';
	//echo '<option value="i">i</option>';
	//echo '<option value="e">e</option>';
	//echo '<option value="i">i</option>';
	echo '<option value="a">A</option>';
	echo "</select>&nbsp;";
	}
	
	function caol($lcao,$name,$id)
	{
	echo'<label class ="'.$lcao.'" ><a href="'.URL.'dashboard/soins/'.$id.'/'.$name.'" title="'.$name.'">'.$name.'</a></label>&nbsp;';
	// switch ($name) 
	// {
    // case 18 : echo'<label class ="'.$lcao.'" ><a href="'.URL.'dashboard/soins/'.$name.'" title="'.$name.'"><img src="'.URL.'public/images/ss/molar.png" class="rotate" /></a></label>&nbsp;'; break;
    // case 17 : echo'<label class ="'.$lcao.'" ><a href="'.URL.'dashboard/soins/'.$name.'" title="'.$name.'"><img src="'.URL.'public/images/ss/molar.png" class="rotate" /></a></label>&nbsp;'; break;
    // case 16 : echo'<label class ="'.$lcao.'" ><a href="'.URL.'dashboard/soins/'.$name.'" title="'.$name.'"><img src="'.URL.'public/images/ss/molar.png" class="rotate" /></a></label>&nbsp;'; break;
    // case 15 : echo'<label class ="'.$lcao.'" ><a href="'.URL.'dashboard/soins/'.$name.'" title="'.$name.'"><img src="'.URL.'public/images/ss/premolar.png" class="rotate"  /></a></label>&nbsp;'; break;
    // case 14 : echo'<label class ="'.$lcao.'" ><a href="'.URL.'dashboard/soins/'.$name.'" title="'.$name.'"><img src="'.URL.'public/images/ss/premolar.png" class="rotate"  /></a></label>&nbsp;'; break;
    // case 13 : echo'<label class ="'.$lcao.'" ><a href="'.URL.'dashboard/soins/'.$name.'" title="'.$name.'"><img src="'.URL.'public/images/ss/canine.png" class="rotate" /></a></label>&nbsp;'; break;
    // case 12 : echo'<label class ="'.$lcao.'" ><a href="'.URL.'dashboard/soins/'.$name.'" title="'.$name.'"><img src="'.URL.'public/images/ss/incisor.png" class="rotate" /></a></label>&nbsp;'; break;
    // case 11 : echo'<label class ="'.$lcao.'" ><a href="'.URL.'dashboard/soins/'.$name.'" title="'.$name.'"><img src="'.URL.'public/images/ss/incisor.png" class="rotate" /></a></label>&nbsp;'; break;
    
	// case 28 : echo'<label class ="'.$lcao.'" ><a href="'.URL.'dashboard/soins/'.$name.'" title="'.$name.'"><img src="'.URL.'public/images/ss/molar.png" class="rotate" /></a></label>&nbsp;'; break;
    // case 27 : echo'<label class ="'.$lcao.'" ><a href="'.URL.'dashboard/soins/'.$name.'" title="'.$name.'"><img src="'.URL.'public/images/ss/molar.png" class="rotate"  /></a></label>&nbsp;'; break;
    // case 26 : echo'<label class ="'.$lcao.'" ><a href="'.URL.'dashboard/soins/'.$name.'" title="'.$name.'"><img src="'.URL.'public/images/ss/molar.png" class="rotate" /></a></label>&nbsp;'; break;
    // case 25 : echo'<label class ="'.$lcao.'" ><a href="'.URL.'dashboard/soins/'.$name.'" title="'.$name.'"><img src="'.URL.'public/images/ss/premolar.png" class="rotate" /></a></label>&nbsp;'; break;
    // case 24 : echo'<label class ="'.$lcao.'" ><a href="'.URL.'dashboard/soins/'.$name.'" title="'.$name.'"><img src="'.URL.'public/images/ss/premolar.png" class="rotate"/></a></label>&nbsp;'; break;
    // case 23 : echo'<label class ="'.$lcao.'" ><a href="'.URL.'dashboard/soins/'.$name.'" title="'.$name.'"><img src="'.URL.'public/images/ss/canine.png" class="rotate" /></a></label>&nbsp;'; break;
    // case 22 : echo'<label class ="'.$lcao.'" ><a href="'.URL.'dashboard/soins/'.$name.'" title="'.$name.'"><img src="'.URL.'public/images/ss/incisor.png" class="rotate"  /></a></label>&nbsp;'; break;
    // case 21 : echo'<label class ="'.$lcao.'" ><a href="'.URL.'dashboard/soins/'.$name.'" title="'.$name.'"><img src="'.URL.'public/images/ss/incisor.png" class="rotate"  /></a></label>&nbsp;'; break;
   
	// case 38 : echo'<label class ="'.$lcao.'" ><a href="'.URL.'dashboard/soins/'.$name.'" title="'.$name.'"><img src="'.URL.'public/images/ss/molar.png" class="rotate90" /></a></label>&nbsp;'; break;
    // case 37 : echo'<label class ="'.$lcao.'" ><a href="'.URL.'dashboard/soins/'.$name.'" title="'.$name.'"><img src="'.URL.'public/images/ss/molar.png" class="rotate90" /></a></label>&nbsp;'; break;
    // case 36 : echo'<label class ="'.$lcao.'" ><a href="'.URL.'dashboard/soins/'.$name.'" title="'.$name.'"><img src="'.URL.'public/images/ss/molar.png" class="rotate90" /></a></label>&nbsp;'; break;
    // case 35 : echo'<label class ="'.$lcao.'" ><a href="'.URL.'dashboard/soins/'.$name.'" title="'.$name.'"><img src="'.URL.'public/images/ss/premolar.png"class="rotate90" /></a></label>&nbsp;'; break;
    // case 34 : echo'<label class ="'.$lcao.'" ><a href="'.URL.'dashboard/soins/'.$name.'" title="'.$name.'"><img src="'.URL.'public/images/ss/premolar.png"class="rotate90" /></a></label>&nbsp;'; break;
    // case 33 : echo'<label class ="'.$lcao.'" ><a href="'.URL.'dashboard/soins/'.$name.'" title="'.$name.'"><img src="'.URL.'public/images/ss/canine.png"  class="rotate90" /></a></label>&nbsp;'; break;
    // case 32 : echo'<label class ="'.$lcao.'" ><a href="'.URL.'dashboard/soins/'.$name.'" title="'.$name.'"><img src="'.URL.'public/images/ss/incisor.png" class="rotate90" /></a></label>&nbsp;'; break;
    // case 31 : echo'<label class ="'.$lcao.'" ><a href="'.URL.'dashboard/soins/'.$name.'" title="'.$name.'"><img src="'.URL.'public/images/ss/incisor.png" class="rotate90" /></a></label>&nbsp;'; break;
   
	// case 48 : echo'<label class ="'.$lcao.'" ><a href="'.URL.'dashboard/soins/'.$name.'" title="'.$name.'"><img src="'.URL.'public/images/ss/molar.png" class="rotate90" /></a></label>&nbsp;'; break;
    // case 47 : echo'<label class ="'.$lcao.'" ><a href="'.URL.'dashboard/soins/'.$name.'" title="'.$name.'"><img src="'.URL.'public/images/ss/molar.png" class="rotate90" /></a></label>&nbsp;'; break;
    // case 46 : echo'<label class ="'.$lcao.'" ><a href="'.URL.'dashboard/soins/'.$name.'" title="'.$name.'"><img src="'.URL.'public/images/ss/molar.png" class="rotate90" /></a></label>&nbsp;'; break;
    // case 45 : echo'<label class ="'.$lcao.'" ><a href="'.URL.'dashboard/soins/'.$name.'" title="'.$name.'"><img src="'.URL.'public/images/ss/premolar.png" class="rotate90" /></a></label>&nbsp;'; break;
    // case 44 : echo'<label class ="'.$lcao.'" ><a href="'.URL.'dashboard/soins/'.$name.'" title="'.$name.'"><img src="'.URL.'public/images/ss/premolar.png" class="rotate90" /></a></label>&nbsp;'; break;
    // case 43 : echo'<label class ="'.$lcao.'" ><a href="'.URL.'dashboard/soins/'.$name.'" title="'.$name.'"><img src="'.URL.'public/images/ss/canine.png" class="rotate90" /></a></label>&nbsp;'; break;
    // case 42 : echo'<label class ="'.$lcao.'" ><a href="'.URL.'dashboard/soins/'.$name.'" title="'.$name.'"><img src="'.URL.'public/images/ss/incisor.png" class="rotate90" /></a></label>&nbsp;'; break;
    // case 41 : echo'<label class ="'.$lcao.'" ><a href="'.URL.'dashboard/soins/'.$name.'" title="'.$name.'"><img src="'.URL.'public/images/ss/incisor.png" class="rotate90" /></a></label>&nbsp;'; break;
	// }
	
	}
	
	
	function cao1($idcaol,$name)
	{
	echo '<select id ="'.$idcaol.'"  class="ax1" name="'.$name.'">';
	echo '<option value="s">S</option>';
	echo '<option value="c">C</option>';
	//echo '<option value="f">f</option>';
	echo '<option value="o">O</option>';
	//echo '<option value="p">p</option>';
	//echo '<option value="i">i</option>';
	//echo '<option value="e">e</option>';
	//echo '<option value="i">i</option>';
	echo '<option value="a">A</option>';
	echo "</select>&nbsp;";
	}
	
	function caol1($lcaol1,$name,$id)
	{
	echo '<label id ="'.$lcaol1.'" class="bx1" ><a href="'.URL.'dashboard/soins/'.$id.'/'.$name.'">'.$name.'</a></label>&nbsp;';
	}
	
	function photosdb($station,$css) 
	{
	    $w=300;$h=250;
	    // $cnx = mysql_connect($this->db_host,$this->db_user,$this->db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
	    // $db  = mysql_select_db($this->db_name,$cnx) ;
		// $result = mysql_query("SELECT * FROM cheval where Sexe='M' and aprouve='1' and station $station order by race  " );
		
		// echo'<fieldset id="">';
		//echo'<legend>ONDEEC</legend>';
		
		// echo "<div class=\"\" >";	 
	    echo "<marquee behavior=\"scroll\" direction=\"UP\" scrollamount=\"3\" scrolldelay=\"80\" onmouseover=\"this.stop()\"onmouseout=\"this.start()\"  height=\"".($h+168)."\"  >";
		// echo "<H2 align=\"center\">Bienvenue sur SIRE ONDEEC 17.10 </H2>";
		echo "<img  id=\"image\"   align=\"center\"  src=\"".URL.$this->rootphotos2.logod."\" width=\"".$w."\" height=\"".$h."\" alt=\"cheval\" />";
		// echo "<H4 id=\"mydiv3\" >Mr. Ahmed Bouakkaz DIABLE DU DESERT 2010</H4>"; 
		echo "<img  id=\"image\"   align=\"center\"  src=\"".URL.$this->rootphotos2.logo."\" width=\"".$w."\" height=\"".$h."\" alt=\"cheval\" />";
		// echo "<H4 id=\"mydiv3\" >Mr. Ahmed Bouakkaz DIABLE DU DESERT 2010</H4>"; 
		echo "<img  id=\"image\"   align=\"center\"  src=\"".URL.$this->rootphotos2.logod."\" width=\"".$w."\" height=\"".$h."\" alt=\"cheval\" />";
		// echo "<H4 id=\"mydiv3\" >Mr. Ahmed Bouakkaz SAKHI 2014</H4>"; 
		echo "<p align=\"center\"><img  id=\"image\"   align=\"center\"  src=\"".URL.$this->rootphotos2.logo."\" width=\"".$w."\" height=\"".$h."\" alt=\"cheval\" /></p>";
		// echo "<H4 id=\"mydiv3\" >Mr. Ahmed Bouakkaz FOUSHA 2016</H4>"; 
		echo "<p align=\"center\"><img  id=\"image\"   align=\"center\"  src=\"".URL.$this->rootphotos2.logod."\" width=\"".$w."\" height=\"".$h."\" alt=\"cheval\" /></p>";
		// echo "<H4 id=\"mydiv3\" >Mr. Lakhdar MOSTEFAOUI STATION DE MONTE</H4>"; 
		// echo "<p align=\"center\"><img  id=\"image\"   align=\"center\"  src=\"".URL.$this->rootphotos1.'lakhder.jpg'."\" width=\"".$w."\" height=\"".$h."\" alt=\"cheval\" /></p>";
		// while($data =  mysql_fetch_array($result))
		// {
		   // echo "<H4 id=\"mydiv3\" >".$data[3]." : ".$this->nbrtostringv('race','id',$data["Race"],'race').' : '.$this->dateUS2FR($data['Dns'])."</H4>"; 
		   // $fichier1 = $this->rootphotos.$data[0].'.jpg' ;
		   // if (file_exists($fichier1)){
			// echo "<p align=\"center\"><img  id=\"mydiv2\"   align=\"center\"  src=\"".URL.$this->rootphotos1.$data[0].'.jpg'."\" width=\"".$w."\" height=\"".$h."\" alt=\"cheval\" /></p>";
		   // }else {
		   // echo "<p align=\"center\"><img  id=\"mydiv2\"   align=\"center\"  src=\"".URL.$this->rootphotos1.'cr.jpg'."\" width=\"".$w."\" height=\"".$h."\" alt=\"cheval\" /></p>";
		   // }
		// }
		echo "</marquee>";
		// echo "</div>";
		// echo'</fieldset>';
		// if ($css==''){ echo'<p id="ONDEEC">ONDEEC</p>';}
		// if ($css=='1'){echo'<p id="ONDEEC1">ONDEEC</p>';}
		// if ($css=='2'){echo'<p id="ONDEEC2">ONDEEC</p>';}
	}
	
	
	
	
	
	function RGPH($IDWIL) 
	{
	$structure= Session::get("structure");
	$this->mysqlconnect();
	$sql = " select sum(POPULATION) AS total from com where IDWIL=$IDWIL";
	$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
	while($data =  mysql_fetch_array($requete))
	{
	return $data['total'];
	}
	}
	
	function POPULATION ($IDWIL,$ANNEE) 
	{
	$structure= Session::get("structure");
	$this->mysqlconnect();
	$sql = " select sum($ANNEE) AS total from com where IDWIL=$IDWIL";
	$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
	while($data =  mysql_fetch_array($requete))
	{
	return $data['total'];
	}
	}
	
	
	function serdeces($SERVICEHOSPIT) 
	{
	$structure= Session::get("structure");
	$this->mysqlconnect();
	$sql = " select * from deceshosp where SERVICEHOSPIT=$SERVICEHOSPIT and  STRUCTURED=$structure  ";
	$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
	$OP=mysql_num_rows($requete);
	mysql_free_result($requete);
	return $OP;
	}
	function commnaissance($COMMUNER) 
	{
	$structure= Session::get("structure");
	$this->mysqlconnect();
	$sql = " select * from naissance where COMMUNE3=$COMMUNER and  STRUCTURED=$structure  ";
	$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
	$OP=mysql_num_rows($requete);
	mysql_free_result($requete);
	return $OP;
	}
	function eleveinscrit($COMMUNER,$UDS) 
	{
	$this->mysqlconnect();
	$sql = " select * from eleve where COMMUNER=$COMMUNER  and  UDS=$UDS  ";
	$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
	$OP=mysql_num_rows($requete);
	mysql_free_result($requete);
	return $OP;
	}
	
	
	function commdeces($COMMUNER) 
	{
	$structure= Session::get("structure");
	$this->mysqlconnect();
	$sql = " select * from deceshosp where COMMUNER=$COMMUNER and  STRUCTURED=$structure  ";
	$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
	$OP=mysql_num_rows($requete);
	mysql_free_result($requete);
	return $OP;
	}
	function cimnbr($STR,$CODECIM0) 
	{
	$this->mysqlconnect();
	$sql = " select * from deceshosp where STRUCTURED=$STR and CODECIM0=$CODECIM0   ";//CODECIM0
	$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
	$OP=mysql_num_rows($requete);
	mysql_free_result($requete);
	return $OP;
	}
	
	function cimnbr1($STR,$CODECIM) 
	{
	$this->mysqlconnect();	 
	$sql = " select * from deceshosp where STRUCTURED=$STR and CODECIM=$CODECIM ";
	$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
	$OP=mysql_num_rows($requete);
	mysql_free_result($requete);
	return $OP;
	}
	
	
	
    
	
	function medicament($class,$id,$name,$selected,$value) 
	{
	$this->mysqlconnect();	 
	echo "<select size=1 class=\"".$class."\" id=\"".$id."\"  name=\"".$name."\">"."\n";
	echo"<option value=\"1883\" selected=\"".$class."\">".$value."</option>"."\n";
	$result = mysql_query("SELECT * FROM pharmacie order by dci " );
	while($data =  mysql_fetch_array($result))
	{
	echo '<option value="'.$data['id'].'">'.$data['dci'].$data['pre'].'</option>';
	}
	echo '</select>'."\n"; 
	}
	
	
	
	function rsc()
	{
	echo '<a href="https://www.facebook.com/"><img src="'.URL.'public/images/fb.png" width="16" height="16" border="0" alt=""/></a>';echo '&nbsp;';
	echo '<a href="https://twitter.com/"><img src="'.URL.'public/images/tw.png" width="16" height="16" border="0" alt=""/></a>';echo '&nbsp;';
	echo '<a href="https://www.youtube.com/"><img src="'.URL.'public/images/yt.png" width="16" height="16" border="0" alt=""/></a>';echo '&nbsp;';
	echo '<a href="http://www.sante.gov.dz/"><img src="'.URL.'public/images/lb.jpg" width="16" height="16" border="0" alt=""/></a>';echo '&nbsp;';
	echo '<a href="http://www.dsp-djelfa.dz/index.php/ar/"><img src="'.URL.'public/images/sante.jpg" width="16" height="16" border="0" alt=""/></a>';echo '&nbsp;';
	echo '<a href="http://www.ans.dz/index.php/fr/"><img src="'.URL.'public/images/gs.jpg" width="16" height="16" border="0" alt=""/></a>';echo '&nbsp;';
	echo '<a href="https://www.pharmnet-dz.com/"><img src="'.URL.'public/images/logolab/logov2.png" width="16" height="16" border="0" alt=""/></a>';echo '&nbsp;';
	
	}
	//*******************************************************************************************************//
	// $var  ="amranemimi"; 
	// $var1 = HTML::encrypt($var);
	// echo  $var1;
	// echo '</br>';
	// echo  HTML::decrypt($var1);
	
	function encrypt($data) {
    // $key = "tiba";  // Clé de 8 caractères max
    $data = serialize($data);
    $td = mcrypt_module_open(MCRYPT_DES,"",MCRYPT_MODE_ECB,"");
    $iv = mcrypt_create_iv(mcrypt_enc_get_iv_size($td), MCRYPT_RAND);
    mcrypt_generic_init($td,$this->key,$iv);
    $data = base64_encode(mcrypt_generic($td, '!'.$data));
    mcrypt_generic_deinit($td);
    return $data;
	}
	 
	function decrypt($data) {
		// $key = "tiba";
		$td = mcrypt_module_open(MCRYPT_DES,"",MCRYPT_MODE_ECB,"");
		$iv = mcrypt_create_iv(mcrypt_enc_get_iv_size($td), MCRYPT_RAND);
		mcrypt_generic_init($td,$this->key,$iv);
		$data = mdecrypt_generic($td, base64_decode($data));
		mcrypt_generic_deinit($td);
		if (substr($data,0,1) != '!')
			return false;
		$data = substr($data,1,strlen($data)-1);
		return unserialize($data);
	}
	//*******************************************************************************************************//
	
	function mysqliconnect()
	{
	$link = mysqli_connect($this->db_host,$this->db_user,$this->db_pass,$this->db_name);
	if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
    }
	else{
	echo "</br>";
	echo "Success: A proper connection to MySQL was made! The ".$this->db_name." database is great." . PHP_EOL."</br>";
    echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL."</br>";
    //mysqli_close($link);
	mysqli_query($link,"SET NAMES 'UTF8' ");
	return $link;
	}
	}
	function mysqlconnect()
	{
	$cnx = mysql_connect($this->db_host,$this->db_user,$this->db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
	$db  = mysql_select_db($this->db_name,$cnx) ;
	mysql_query("SET NAMES 'UTF8' ");
	return $db;
	}
	
	function dump_MySQL($serveur, $login, $password, $base, $mode,$d1,$d2)
    {
    $connexion = mysql_connect($serveur, $login, $password);
    mysql_select_db($base, $connexion);
    
    $entete  = "-- ----------------------\n";
    $entete .= "-- dump de la base ".$base." au ".date("d-M-Y")."\n";
    $entete .= "-- ----------------------\n\n\n";
    $creations = "";
    $insertions = "\n\n";
    
    $listeTables = mysql_query("show tables", $connexion);
    while($table = mysql_fetch_array($listeTables))
    {
        // structure ou la totalite la BDD
        if($mode == 1 || $mode == 2)
        {
            $creations .= "-- -----------------------------\n";
            $creations .= "-- Structure de la table ".$table[0]."\n";
            $creations .= "-- -----------------------------\n";
            $listeCreationsTables = mysql_query("show create table ".$table[0],$connexion); 

            while($creationTable = mysql_fetch_array($listeCreationsTables))
            {
              $creations .= $creationTable[1].";\n\n";
            }
        }
        // donn ou la totalit        
		// if($mode > 1)
        // {
		    // mysql_query("SET NAMES 'UTF8' ");
            // $donnees = mysql_query("SELECT * FROM ".$table[0]);
            // $insertions .= "-- -----------------------------\n";
            // $insertions .= "-- Contenu de la table ".$table[0]."\n";
            // $insertions .= "-- -----------------------------\n";
            // while($nuplet = mysql_fetch_array($donnees))
            // {
			// mysql_query("SET NAMES 'UTF8' ");
                // $insertions .= "INSERT INTO ".$table[0]." VALUES(";
                // for($i=0; $i < mysql_num_fields($donnees); $i++)
                // {
                  // if($i != 0)
                     // $insertions .=  ", ";
                  // if(mysql_field_type($donnees, $i) == "string" || mysql_field_type($donnees, $i) == "blob")
                     // $insertions .=  "'";
                  // $insertions .= addslashes($nuplet[$i]);
                  // if(mysql_field_type($donnees, $i) == "string" || mysql_field_type($donnees, $i) == "blob")
                    // $insertions .=  "'";
                // }
                // $insertions .=  ");\n";
            // }
            // $insertions .= "\n";
        // }
    }
    mysql_close($connexion);
	$time=date('d-m-Y'); 
	$fichierDump = fopen("D:/framework/sql/Deces_".$time.".sql", "wb");
    fwrite($fichierDump, $entete);
    fwrite($fichierDump, $creations);
    fwrite($fichierDump, $insertions);
    fclose($fichierDump);
    echo "Sauvegarde terminée au niveau D:/framework/sql/Deces_".$time.".sql";
    }
	
	function datePlus($dateDo,$nbrJours)
	{
	$timeStamp = strtotime($dateDo); 
	$timeStamp += 24 * 60 * 60 * $nbrJours;
	$newDate = date("Y-m-d", $timeStamp);
	return  $newDate;
	}
	
	function dateUS2FR($date)//2013-01-01
    {
	$J      = substr($date,8,2);
    $M      = substr($date,5,2);
    $A      = substr($date,0,4);
	$dateUS2FR =  $J."-".$M."-".$A ;
    return $dateUS2FR;//01-01-2013
    }
	
	function dateFR2US($date)//01/01/2013
	{
	$J      = substr($date,0,2);
    $M      = substr($date,3,2);
    $A      = substr($date,6,4);
	$dateFR2US =  $A."-".$M."-".$J ;
    return $dateFR2US;//2013-01-01
	}
	
	function heuresPlus($heuresDo,$nbrheures)
	{
	$timeStamp = strtotime($heuresDo); 
	$timeStamp += 60 * 60 * $nbrheures;
	$newDate = date("H:m", $timeStamp);
	return  substr($newDate,0,2);
	}
	
	function heuresPlus0($IDF)
	{
	$this->mysqlconnect();
	$sql = " select * from trav where IDF=$IDF order by DHE2 desc limit 0,1 ";
	$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
	$result1 = mysql_fetch_array( $requete ) ;
	$valhb=$result1["DHE2"];
	return $valhb;
	}
	
	function datePlus0($IDF)
	{
	$this->mysqlconnect();
	$sql = " select * from obser where IDF=$IDF order by DHE1 desc limit 0,1 ";
	$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
	$result1 = mysql_fetch_array( $requete ) ;
	$valhb=$result1["DHE1"];
	return $valhb;
	}
	
	function backforward($backforward,$value)
	{
	echo "<button id=\"bnav\"   onclick=\"javascript:".$backforward."();\">";
	echo '<img src="'.URL.'public/images/'.$value.'"   width="16" height="16" border="0" alt=""   />';
	echo "</button>";
	}
	function NAV()
	{
	echo '<div  id="sn" >';
	$this->backforward('history.back','b_prevpage.png');echo '&nbsp;';
	$this->backforward('location.reload','b_sbrowse.png');echo '&nbsp;';  
	$this->backforward('history.forward','b_nextpage.png');echo '&nbsp;';
	$this->backforward('toggleFullScreen','fs.png');echo '&nbsp;';//la fonctin se trouve au niveau du fichier fonction js
	echo '</div>';
	}
	
	
	
	function equincommune($WILAYAR) 
	{
	// $structure= '='.Session::get("structure");
	$structure = "is not null";
	$this->mysqlconnect();
	mysql_query("SET NAMES 'UTF8' ");// le nom et prenom doit etre lier 
	$sql = " select * from deceshosp where WILAYAR=$WILAYAR and  STRUCTURED $structure  ";
	$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
	$OP=mysql_num_rows($requete);
	mysql_free_result($requete);
	return $OP;
	}
	
	function equincommune1($WILAYAR,$COMMUNER) 
	{
	$structure= Session::get("structure");
	$this->mysqlconnect();
	$sql = " select * from deceshosp where WILAYAR=$WILAYAR  and  COMMUNER=$COMMUNER and  STRUCTURED=$structure  ";
	$requete = @mysql_query($sql) or die($sql."<br>".mysql_error());
	$OP=mysql_num_rows($requete);
	mysql_free_result($requete);
	return $OP;
	}

	function color($x) 
	{	
		if($x>=0 and $x<1){$valeur= "#b9b9b9";}
		if($x>=1 and $x<=10){$valeur= "#ffa6a9";}
		if($x>10 and $x<=100){$valeur= "#cc6674";}
		if($x>100 and $x<=1000){$valeur= "#992038";}
		if($x>1000 and $x<=1000000){$valeur= "#60000e";}
		return $valeur;
	}
	
	function form($data) 
	{	 
	echo "<form id=\"formx\"  onsubmit=\"return validateForm11(this);\" name=\"form1\" action=\"".URL.$data['c']."/".$data['m']."/0/10\" method=\"GET\">" ;
	echo "<select  id=\"csearch\"    name=\"o\" style=\"width: 100px;\">" ;				
	foreach ($data['combo'] as $cle => $value){echo"<OPTION VALUE=\"".$value."\">".$cle."</OPTION>";}	
	echo "</select>&nbsp;" ;
	echo "&nbsp;<input id=\"search\"  type=\"search\"  placeholder=\"Search...\"    name=\"q\"  value=\"\"  autofocus /> " ;//<!-- onfocus = "tooltip.pop(this,'Donors: <br />Search Keyword.');"   -->
	echo "&nbsp;<img src=\"".URL."public/images/search.PNG\" width='25' height='30' border='0' alt=''/>" ;
	echo "&nbsp;<input id=\"submitsrh\" type=\"submit\" name=\"\" value=\"".$data['submitvalue']."\"/> " ;
	echo "</form>" ;	
	}
	
	
	function combov($id,$name,$valeur)  
	{
	
	echo "<select  id=\"".$id."\"   name=\"".$name."\" >";
	foreach ($valeur as $cle => $value) 
	{
	echo"<OPTION VALUE=\"".$value."\">".$cle."</OPTION>";
	}
	echo "</select> ";
	} 
	
	function SERNSC($class,$id,$name,$tb_name,$value,$selected) 
	{
	$this->mysqlconnect();
	echo "<select size=1  class=\"".$class."\"  id=\"".$id."\"  name=\"".$name."\">"."\n";
	echo"<option value=\"".$value."\"  selected=\"selected\">".$selected."</option>"."\n";
	$result = mysql_query("SELECT * FROM $tb_name  " );
	while($data =  mysql_fetch_array($result))
	{
	echo '<option value="'.$data['id'].'">'.$data['service'].'</option>';
	}
	echo '</select>'."\n"; 
	}
	
	
	function NLIT($class,$id,$name,$value,$selected) 
	{
	echo "<select size=1 class=\"".$class."\" id=\"".$id."\"  name=\"".$name."\">"."\n";
	echo"<option value=\"".$value."\" selected=\"selected\">".$selected."</option>"."\n";
    echo '</select>'."\n"; 
	}
	
	function MODEES($class,$id,$name,$tb_name,$value,$selected) 
	{
	$this->mysqlconnect();
	echo "<select size=1 class=\"".$class."\"    id=\"".$id."\" name=\"".$name."\"   >"."\n";
	echo"<option value=\"".$value."\"  selected=\"selected\">".$selected."</option>"."\n";
	$result = mysql_query("SELECT * FROM $tb_name " );
	while($data =  mysql_fetch_array($result))
	{
	echo '<option value="'.$data['id'].'">'.$data['mods'].'</option>';
	}
	echo '</select>'."\n"; 
	}
	
	
	
	
	
	
	
	
	function tabs($data) 
	{
	echo '<div id="content_1" class="contenttabs1">  ';
	echo '<label class="deces" id="lNEC">N°Etat civile :</label>';             echo '<input id="NEC" type="text" name="NEC" value="'.$data['NEC'].'"  required autofocus />';
	echo '<label class="deces" id="lGABO">ABORH :</label>';                    $this->combov('GABO','GABO',$data['GABO']);
	echo '<label class="deces" id="lDINS"> Inscription : </label>';            echo '<input id="DINS"   type="txt"  name="DINS"   value="'.$data['DINS'].'"   required placeholder="00-00-0000" onblur="genererCodeP()"/>';
													                           echo '<input id="HINS"   type="txt"  name="HINS"   value="'.$data['HINS'].'"   required placeholder="00:00"/>';
	echo '<label class="deces" id="lNOM">Nom :</label>';                       echo '<input id="NOM"    type="txt"  name="NOM"    value="'.$data['NOM'].'"    required placeholder="xxxxxxx"  onkeyup="javascript:this.value=this.value.toUpperCase();" />';
	echo '<label class="deces" id="lPRENOM">Prénom :</label> ';                echo '<input id="PRENOM" type="txt"  name="PRENOM" value="'.$data['PRENOM'].'" required placeholder="xxxxxxx" onkeyup="javascript:this.value=this.value.toUpperCase();"/>';
	echo '<label class="deces" id="lFILSDE">Père :</label>';                   echo '<input id="FILSDE" type="txt"  name="FILSDE" value="'.$data['FILSDE'].'" placeholder="xxxxxxx" onkeyup="javascript:this.value=this.value.toUpperCase();"/>';
	echo '<label class="deces" id="lETDE">Mère :</label>';                     echo '<input id="ETDE"   type="txt"  name="ETDE"   value="'.$data['ETDE'].'" placeholder="xxxxxxx" onkeyup="javascript:this.value=this.value.toUpperCase();"/>';
	echo '<label class="deces" id="lSEXE">Sexe :</label>';                     $this->combov('SEXE','SEXE',$data['SEXE']);
	echo '<label class="deces" id="lDATENS">Né(e)le : </label>';               echo '<input id="DATENS" type="txt"  name="DATENS" value="'.$data['DATENS'].'" placeholder="00-00-0000" onblur="genererCodeP()" />';
	echo '<label class="deces" id="lWILAYAN">Wilaya Nais :</label>';           HTML::WILAYA('WILAYAN','WILAYAN','WILAYAN','wil',$data['WILAYAN1'],$data['WILAYAN2']) ;
	echo '<label class="deces" id="lCOMMUNEN">Commune Nais :</label>';         HTML::COMMUNE('COMMUNEN','COMMUNEN','COMMUNEN',$data['COMMUNEN1'],$data['COMMUNEN2']);
	echo '<label class="deces" id="lWILAYAR">Wilaya Res :</label>';            HTML::WILAYA('WILAYAR','WILAYAR','WILAYAR','wil',$data['WILAYAR1'],$data['WILAYAR2']) ;
	echo '<label class="deces" id="lCOMMUNER">Commune Res :</label> ';         HTML::COMMUNE('COMMUNER','COMMUNER','COMMUNER',$data['COMMUNER1'],$data['COMMUNER2']);
	echo '<label class="deces" id="lADRESSE">Adresse Res :</label>';           echo '<input id="ADRESSE" type="text" name="ADRESSE" value="'.$data['ADRESSE'].'" placeholder="xxxxxxxxxxxxxxx" onkeyup="javascript:this.value=this.value.toUpperCase();"/>';
	echo '<label class="deces" id="lLD7">Établissement : </label>';            HTML::ECOLE('ECOLE','ECOLE','ECOLE','ecole',$data['ECOLE1'],$data['ECOLE2'],Session::get('uds'));                    
    echo '<label class="deces" id="lLD7a">Palier : </label>';                  HTML::PALIERX('PALIER','PALIER','PALIER',$data['PALIER1'],$data['PALIER2']);//HTML::PALIER('PALIER','PALIER','PALIER','palier',$data['PALIER1'],$data['PALIER2']);
	echo '<label class="deces" id="show_codeP">Code_élève :</label>';          echo'<input id="code_patient"  type="text" name="code_patient" value="'.$data['code_patient'].'" readonly  >';
	echo '<label class="deces" id="lNOMAR">: اللقب </label>';                  echo'<input id="NOMAR"       type="txt" name="NOMAR"       value="'.$data['NOMAR'].'"     placeholder="xxxxxxx"/>';
	echo '<label class="deces" id="lPRENOMAR">: الإسم</label>';                 echo'<input id="PRENOMAR"    type="txt" name="PRENOMAR"    value="'.$data['PRENOMAR'].'"  placeholder="xxxxxxx"/>';
	echo '<label class="deces" id="lFILSDEAR">: إسم الأب</label>';              echo'<input id="FILSDEAR"    type="txt" name="FILSDEAR"    value="'.$data['FILSDEAR'].'"  placeholder="xxxxxxx"/>';
	echo '<label class="deces" id="lETDEAR">: إسم و لقب الأم</label>';          echo'<input id="ETDEAR"      type="txt" name="ETDEAR"      value="'.$data['ETDEAR'].'"    placeholder="xxxxxxx"/>';
	echo '<label class="deces" id="lADAR">: عنوان الإقامة</label> ';            echo'<input id="ADRESSEAR"   type="txt" name="ADRESSEAR"   value="'.$data['ADRESSEAR'].'" placeholder="xxxxxxx"/>';
	echo '<input type="hidden" name="WILAYA"     value="'.Session::get('wilaya').'"/>';
	echo '<input type="hidden" name="STRUCTURE"  value="'.Session::get('structure').'"/>';
	echo '<input type="hidden" name="UDS"        value="'.Session::get('uds').'"/>';
	echo '<input type="hidden" name="LOGIN"      value="'.Session::get('login').'"/>';
	echo '<input id="submitnew" type="submit" />';  
	echo '</div>';
	echo '<div id="content_2" class="contenttabs2">';echo '</div>';
	echo '<div id="content_3" class="contenttabs3">';echo '</div>';
	echo '<div id="content_4" class="contenttabs4"> ';echo '</div>';
	}
	
    function ROLE($id) 
	{
	$this->mysqlconnect();
	mysql_query("SET NAMES 'UTF8' ");
	$result = mysql_query("SELECT * FROM niveau where id $id order by nom_niveau" );
	echo '<select  id="aa" size=1 class="" name="role">';
	while($data =  mysql_fetch_array($result))
	{
	echo '<option value="'.$data[0].'">'.$data[1].'</option>';
	}
	echo '</select>'; 
	}
	
    function WILAYA($name,$id,$class,$tb_name,$value,$selected) 
	{
	$this->mysqlconnect();
	echo "<select  id=\"".$id."\" size=1 class=\"".$class."\" name=\"".$name."\" onblur=\"genererCodeP()\"   >"."\n";
	echo"<option  value=\"".$value."\"  selected=\"selected\">".$selected."</option>"."\n";
	mysql_query("SET NAMES 'UTF8' ");
	$result = mysql_query("SELECT * FROM $tb_name order by WILAYAS" );
	while($data =  mysql_fetch_array($result))
	{
	echo '<option value="'.$data[0].'">'.$data[1].'</option>';
	}
	echo '</select>'."\n"; 
	}
	
	function COMMUNE($name,$id,$class,$value,$selected) 
	{	 
	echo "<select id=\"".$id."\" size=1 class=\"".$class."\" name=\"".$name."\" onblur=\"genererCodeP()\"  >"."\n";
	echo"<option  value=\"".$value."\" selected=\"selected\">".$selected."</option>"."\n";
	echo '</select>'."\n";
	}
	
	function structure($name,$id,$class,$value,$selected) 
	{	 
	echo "<select id=\"".$id."\" size=1 class=\"".$class."\" name=\"".$name."\">"."\n";
	echo"<option value=\"".$value."\" selected=\"selected\">".$selected."</option>"."\n";
	echo '</select>'."\n";
	}
	
	function uds($name,$id,$class,$value,$selected) 
	{	 
	echo "<select id=\"".$id."\" size=1 class=\"".$class."\" name=\"".$name."\">"."\n";
	echo"<option value=\"".$value."\" selected=\"selected\">".$selected."</option>"."\n";
	echo '</select>'."\n";
	}
	
	
	function ECOLE($name,$id,$class,$tb_name,$value,$selected,$iduds) 
	{
	$this->mysqlconnect();
	echo "<select  id=\"".$id."\" size=1 class=\"".$class."\" name=\"".$name."\" onblur=\"genererCodeP()\"   >"."\n";
	echo"<option  value=\"".$value."\"  selected=\"selected\">".$selected."</option>"."\n";
	mysql_query("SET NAMES 'UTF8' ");
	$result = mysql_query("SELECT * FROM $tb_name where iduds=$iduds order by typeecole,ecole" );
	while($data =  mysql_fetch_array($result))
	{
	if($data[13]==1){$p="Pri";}elseif($data[13]==2){$p="Moy";}elseif($data[13]==3){$p="Sec";}
	echo '<option value="'.$data[0].'">'.ucwords($data[5]).' [*'.$p.']</option>';
	}
	echo '</select>'."\n"; 
	}
	
	function PALIER($name,$id,$class,$tb_name,$value,$selected) 
	{
	$this->mysqlconnect();
	echo "<select  id=\"".$id."\" size=1 class=\"".$class."\" name=\"".$name."\" onblur=\"genererCodeP()\"   >"."\n";
	echo"<option  value=\"".$value."\"  selected=\"selected\">".$selected."</option>"."\n";
	mysql_query("SET NAMES 'UTF8' ");
	$result = mysql_query("SELECT * FROM $tb_name order by id " );
	while($data =  mysql_fetch_array($result))
	{
	echo '<option value="'.$data[0].'">'.$data[1].'</option>';
	}
	echo '</select>'."\n"; 
	}
	
	function PALIERX($name,$id,$class,$value,$selected) 
	{	 
	echo "<select id=\"".$id."\" size=1 class=\"".$class."\" name=\"".$name."\" onblur=\"genererCodeP()\"  >"."\n";
	echo"<option  value=\"".$value."\" selected=\"selected\">".$selected."</option>"."\n";
	echo '</select>'."\n";
	}
	
	
    function Profession($x,$y,$name,$idprofession,$tb_name,$structure,$value,$selected) 
	{
	$this->mysqlconnect();
	echo "<select size=1 id=\"".$idprofession."\" name=\"".$name."\">"."\n";
	echo"<option value=\"".$value."\"  selected=\"selected\">".$selected."</option>"."\n";
	$result = mysql_query("SELECT * FROM $tb_name order by Profession" );
	while($data =  mysql_fetch_array($result))
	{
	echo '<option value="'.$data['id'].'">'.$data['Profession'].'</option>';
	}
	echo '</select>'."\n"; 
	}
	
    function SER($x,$y,$name,$tb_name,$value,$selected) 
	{
	$this->mysqlconnect();
	echo "<select size=1 class=\"SERVICEHOSPIT\" name=\"".$name."\">"."\n";
	echo"<option value=\"".$value."\"  selected=\"selected\">".$selected."</option>"."\n";
	$result = mysql_query("SELECT * FROM $tb_name  " );
	while($data =  mysql_fetch_array($result))
	{
	echo '<option value="'.$data['id'].'">'.$data['service'].'</option>';
	}
	echo '</select>'."\n"; 
	}
	function MED($x,$y,$name,$tb_name,$structure,$value,$selected) 
	{
	$this->mysqlconnect();
	echo "<select size=1 id=\"MEDECINHOSPIT\" name=\"".$name."\"  onblur=\"myFunction()\" >"."\n";
	echo"<option value=\"".$value."\"  selected=\"selected\">".$selected."</option>"."\n";
	$result = mysql_query("SELECT * FROM $tb_name  where structure=$structure  order by Nom" );
	while($data =  mysql_fetch_array($result))
	{
	echo '<option value="'.$data['Nom'].'_'.$data['Prenom'].'">'.$data['Nom'].'_'.$data['Prenom'].'</option>';
	}
	echo '</select>'."\n"; 
	}
	function SEF($x,$y,$id,$name,$tb_name,$structure,$value,$selected) 
	{
	$this->mysqlconnect();
	echo "<select size=1 id=\"".$id."\" name=\"".$name."\"  onblur=\"myFunction()\" >"."\n";
	echo"<option value=\"".$value."\"  selected=\"selected\">".$selected."</option>"."\n";
	$result = mysql_query("SELECT * FROM $tb_name  where structure=$structure  order by Nom" );
	while($data =  mysql_fetch_array($result))
	{
	echo '<option value="'.$data['id'].'">'.$data['Nom'].'_'.$data['Prenom'].'</option>';
	}
	echo '</select>'."\n"; 
	}
	function chapitre($name,$tb_name,$value,$selected) 
	{
	$this->mysqlconnect();
	echo "<select size=1 class=\"chapitre\" name=\"".$name."\">"."\n";
	echo"<option value=\"".$value."\"  selected=\"selected\">".$selected."</option>"."\n";
	mysql_query("SET NAMES 'UTF8' ");
    $result = mysql_query("SELECT * FROM chapitre " );
    while($data =  mysql_fetch_array($result))
    {
    echo '<option value="'.$data[0].'">'.'['.$data[0].'] '.$data[1].'</option>';
    }
	echo '</select>'."\n"; 
	}
	function cim1($name,$tb_name,$value,$selected) 
	{
	$this->mysqlconnect();
	echo "<select size=1 class=\"cim1\" name=\"".$name."\">"."\n";
	echo"<option value=\"".$value."\"  selected=\"selected\">".$selected."</option>"."\n";
	mysql_query("SET NAMES 'UTF8' ");
    $result = mysql_query("SELECT * FROM chapitre " );
    while($data =  mysql_fetch_array($result))
    {
    echo '<option value="'.$data[0].'">'.'['.$data[0].'] '.$data[1].'</option>';
    }
	echo '</select>'."\n"; 
	}
	function cim2($name,$value,$selected) 
	{
	echo "<select size=1 class=\"cim2\" name=\"".$name."\">"."\n";
	echo"<option value=\"".$value."\" selected=\"selected\">".$selected."</option>"."\n";
    echo '</select>'."\n"; 
	}
	
	function LABOPHA($name,$id,$class,$tb_name,$value,$selected) 
	{
	$this->mysqlconnect();
	echo "<select  id=\"".$id."\" size=1 class=\"".$class."\" name=\"".$name."\" onblur=\"genererCodeP()\"   >"."\n";
	echo"<option  value=\"".$value."\"  selected=\"selected\">".$selected."</option>"."\n";
	mysql_query("SET NAMES 'UTF8' ");
	$result = mysql_query("SELECT * FROM $tb_name order by laboratoire" );
	while($data =  mysql_fetch_array($result))
	{
	echo '<option value="'.$data[0].'">'.strtolower($data[1]).'</option>';
	}
	echo '</select>'."\n"; 
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
        else
        {
		return $resultat2='??????';
		}		
	} 
	
	function barre_navigation ($nb_total,$nb_affichage_par_page,$o,$q,$p,$nb_liens_dans_la_barre,$c,$m,$ad)//$c= controleure ,$m=methode
	{
	$limit=$nb_affichage_par_page;		
    $page=$p;
	if ($page <= 0){$prev_page =$p;}else{$prev_page = $page-$limit;}
	$total_page = ceil($nb_total/$limit);
	$prev_url = URL.$c.'/'.$m.'/'.$prev_page.'/'.$limit.'?q='.$q.'&o='.$o.'&ad='.$ad.'';  
	$next_url = URL.$c.'/'.$m.'/'.($page+$limit).'/'.$limit.'?q='.$q.'&o='.$o.'&ad='.$ad.'';  
	
	$barre = '';
	$query = URL.$c.'/'.$m.'/'.$p.'/'.$nb_affichage_par_page.'?q='.$q.'&o='.$o.'';	 
	$page_active = floor(($p/$nb_affichage_par_page)+1);
	$nb_pages_total = ceil($nb_total/$nb_affichage_par_page);
		if ($nb_liens_dans_la_barre%2==0) 
		{
			$cpt_deb1 = $page_active - ($nb_liens_dans_la_barre/2)+1;
			$cpt_fin1 = $page_active + ($nb_liens_dans_la_barre/2);
		}
		else 
		{
			$cpt_deb1 = $page_active - floor(($nb_liens_dans_la_barre/2));
			$cpt_fin1 = $page_active + floor(($nb_liens_dans_la_barre/2));
		}
		
		if ($cpt_deb1 <= 1) 
		{
			$cpt_deb = 1;
			$cpt_fin = $nb_liens_dans_la_barre;
		}
		elseif ($cpt_deb1>1 && $cpt_fin1<$nb_pages_total) 
		{
			$cpt_deb = $cpt_deb1;
			$cpt_fin = $cpt_fin1;
		}
		else 
		{
			$cpt_deb = ($nb_pages_total-$nb_liens_dans_la_barre)+1;
			$cpt_fin = $nb_pages_total;
		}
		
		if ($nb_pages_total <= $nb_liens_dans_la_barre) {
		$cpt_deb=1;
		$cpt_fin=$nb_pages_total;
		}
		if ($cpt_deb != 1) 
		{
			$cible = URL.$c.'/'.$m.'/'.(0).'/'.$nb_affichage_par_page.'?q='.$q.'&o='.$o.''; 
			$lien = '<A HREF="'.$cible.'"><button id="buttondf" >&lt;&lt;</button></A>&nbsp;&nbsp;';
		}
		else 
		{
		$lien='';
		}
		$xy = ($page <= 0)?'disabled':'';
		$barre .= $lien;
		$lienx = '<A HREF="'.$prev_url.'"><button id="buttondf" '.$xy.' >&lt;</button></A>&nbsp;';
		$barre .= $lienx;
		
		for ($cpt = $cpt_deb; $cpt <= $cpt_fin; $cpt++) 
		{
			if ($cpt == $page_active) 
			{
				if ($cpt == $nb_pages_total) {
				$barre .= $cpt;
				}
				else {
				$barre .= $cpt.'&nbsp;-&nbsp;';
				}
			}
			else 
			{
				if ($cpt == $cpt_fin) {
				$barre .= "<A HREF='".URL.$c.'/'.$m.'/'.(($cpt-1)*$nb_affichage_par_page).'/'.$nb_affichage_par_page.'?q='.$q.'&o='.$o.'';  
				$barre .= "'>".'['.$cpt.']'."</A>";
				}
				else {
				$barre .= "<A HREF='".URL.$c.'/'.$m.'/'.(($cpt-1)*$nb_affichage_par_page).'/'.$nb_affichage_par_page.'?q='.$q.'&o='.$o.'&ad='.$ad.'';  
				$barre .= "'>".'['.$cpt.']'."</A>&nbsp;-&nbsp;";
				}
			}
		}

		$fin = ($nb_total - ($nb_total % $nb_affichage_par_page));
		if (($nb_total % $nb_affichage_par_page) == 0) 
		{
		$fin = $fin - $nb_affichage_par_page;
		}
		if ($cpt_fin != $nb_pages_total) 
		{
		$cible = URL.$c.'/'.$m.'/'.$fin.'/'.$nb_affichage_par_page.'?q='.$q.'&o='.$o.''; 
		$lien = '&nbsp;&nbsp;<A HREF="'.$cible.'"><button id="buttondf">&gt;&gt;</button></A>';
		}
		else {
		$lien='';
		}
		$xy1=($page >= $total_page*$limit)?'disabled':'';
		$lienx = '&nbsp;<A HREF="'.$next_url.'"><button id="buttondf" '.$xy1.' >&gt;</button></A>';
		$barre .= $lienx;
		$barre .= $lien;
		
		return $barre;
	}

	



    function tabsavi($data) 
	{
	echo '<label  id="avil0bn1">Date</label>';    echo '<input  id="avid1"  type="txt"  name="Date"  value="'.$data['Date'].'" autofocus/>'; 
	echo '<label  id="avil0bn2">Wilaya</label>';  HTML::WILAYA('WILAYAD','avib0n2c','WILAYAD','wil',$data['WILAYA1'],$data['WILAYA2']) ;  
	echo '<label  id="avil0bn3">Commune</label>'; HTML::COMMUNE('COMMUNED','avib0n3c','COMMUNED',$data['COMMUNE1'],$data['COMMUNE2']);
	echo '<label  id="avil0bn4">Client</label>';  echo '<input  id="avicli"  type="txt"  name="avicli"  value="'.$data['avicli'].'"/>';
	echo '<label  id="avil0bn5">Cycle</label>';   echo '<input  id="avicycl" type="txt"  name="avicycl" value="'.$data['avicycl'].'"/>';
	echo '<label  id="avil0bn6">Batiment</label>';echo '<input  id="avibtm"  type="txt"  name="avibtm"  value="'.$data['avibtm'].'"/>';
	echo '<label  id="avil0bn7">Semaine</label>'; echo '<input  id="avisem"  type="txt"  name="avisem"  value="'.$data['avisem'].'"/>';
	
                                                      echo '<label  id="bn0">Feminin</label>'; 
	echo '<input  id="avibn0" type="txt"   name="avi0"  value="'.$data['avi0'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn1" type="txt"   name="avi1"  value="'.$data['avi1'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn2" type="txt"   name="avi2"  value="'.$data['avi2'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn3" type="txt"   name="avi3"  value="'.$data['avi3'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn4" type="txt"   name="avi4"  value="'.$data['avi4'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn5" type="txt"   name="avi5"  value="'.$data['avi5'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn6" type="txt"   name="avi6"  value="'.$data['avi6'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn7" type="txt"   name="avi7"  value="'.$data['avi7'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn8" type="txt"   name="avi8"  value="'.$data['avi8'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn9" type="txt"   name="avi9"  value="'.$data['avi9'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn10" type="txt"   name="avi10"  value="'.$data['avi10'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	
	echo '<input  id="avibn11" type="txt"   name="avi11"  value="'.$data['avi11'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn12" type="txt"   name="avi12"  value="'.$data['avi12'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn13" type="txt"   name="avi13"  value="'.$data['avi13'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn14" type="txt"   name="avi14"  value="'.$data['avi14'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn15" type="txt"   name="avi15"  value="'.$data['avi15'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn16" type="txt"   name="avi16"  value="'.$data['avi16'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn17" type="txt"   name="avi17"  value="'.$data['avi17'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn18" type="txt"   name="avi18"  value="'.$data['avi18'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn19" type="txt"   name="avi19"  value="'.$data['avi19'].'"  placeholder=""  onblur="genererCodeP1()"/>';
    echo '<input  id="avibn20" type="txt"   name="avi20"  value="'.$data['avi20'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	
	echo '<input  id="avibn21" type="txt"   name="avi21"  value="'.$data['avi21'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn22" type="txt"   name="avi22"  value="'.$data['avi22'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn23" type="txt"   name="avi23"  value="'.$data['avi23'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn24" type="txt"   name="avi24"  value="'.$data['avi24'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn25" type="txt"   name="avi25"  value="'.$data['avi25'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn26" type="txt"   name="avi26"  value="'.$data['avi26'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn27" type="txt"   name="avi27"  value="'.$data['avi27'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn28" type="txt"   name="avi28"  value="'.$data['avi28'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn29" type="txt"   name="avi29"  value="'.$data['avi29'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn30" type="txt"   name="avi30"  value="'.$data['avi30'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	
	echo '<input  id="avibn31" type="txt"   name="avi31"  value="'.$data['avi31'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn32" type="txt"   name="avi32"  value="'.$data['avi32'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn33" type="txt"   name="avi33"  value="'.$data['avi33'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn34" type="txt"   name="avi34"  value="'.$data['avi34'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn35" type="txt"   name="avi35"  value="'.$data['avi35'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn36" type="txt"   name="avi36"  value="'.$data['avi36'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn37" type="txt"   name="avi37"  value="'.$data['avi37'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn38" type="txt"   name="avi38"  value="'.$data['avi38'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn39" type="txt"   name="avi39"  value="'.$data['avi39'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn40" type="txt"   name="avi40"  value="'.$data['avi40'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	
	echo '<input  id="avibn41" type="txt"   name="avi41"  value="'.$data['avi41'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn42" type="txt"   name="avi42"  value="'.$data['avi42'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn43" type="txt"   name="avi43"  value="'.$data['avi43'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn44" type="txt"   name="avi44"  value="'.$data['avi44'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn45" type="txt"   name="avi45"  value="'.$data['avi45'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn46" type="txt"   name="avi46"  value="'.$data['avi46'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn47" type="txt"   name="avi47"  value="'.$data['avi47'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn48" type="txt"   name="avi48"  value="'.$data['avi48'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn49" type="txt"   name="avi49"  value="'.$data['avi49'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn50" type="txt"   name="avi50"  value="'.$data['avi50'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	
	echo '<input  id="avibn51" type="txt"   name="avi51"  value="'.$data['avi51'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn52" type="txt"   name="avi52"  value="'.$data['avi52'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn53" type="txt"   name="avi53"  value="'.$data['avi53'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn54" type="txt"   name="avi54"  value="'.$data['avi54'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn55" type="txt"   name="avi55"  value="'.$data['avi55'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn56" type="txt"   name="avi56"  value="'.$data['avi56'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn57" type="txt"   name="avi57"  value="'.$data['avi57'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn58" type="txt"   name="avi58"  value="'.$data['avi58'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn59" type="txt"   name="avi59"  value="'.$data['avi59'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn60" type="txt"   name="avi60"  value="'.$data['avi60'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	
	echo '<input  id="avibn61" type="txt"   name="avi61"  value="'.$data['avi61'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn62" type="txt"   name="avi62"  value="'.$data['avi62'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn63" type="txt"   name="avi63"  value="'.$data['avi63'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn64" type="txt"   name="avi64"  value="'.$data['avi64'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn65" type="txt"   name="avi65"  value="'.$data['avi65'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn66" type="txt"   name="avi66"  value="'.$data['avi66'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn67" type="txt"   name="avi67"  value="'.$data['avi67'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn68" type="txt"   name="avi68"  value="'.$data['avi68'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn69" type="txt"   name="avi69"  value="'.$data['avi69'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn70" type="txt"   name="avi70"  value="'.$data['avi70'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	
	echo '<input  id="avibn71" type="txt"   name="avi71"  value="'.$data['avi71'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn72" type="txt"   name="avi72"  value="'.$data['avi72'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn73" type="txt"   name="avi73"  value="'.$data['avi73'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn74" type="txt"   name="avi74"  value="'.$data['avi74'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn75" type="txt"   name="avi75"  value="'.$data['avi75'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn76" type="txt"   name="avi76"  value="'.$data['avi76'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn77" type="txt"   name="avi77"  value="'.$data['avi77'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn78" type="txt"   name="avi78"  value="'.$data['avi78'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn79" type="txt"   name="avi79"  value="'.$data['avi79'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn80" type="txt"   name="avi80"  value="'.$data['avi80'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	
	echo '<input  id="avibn81" type="txt"   name="avi81"  value="'.$data['avi81'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn82" type="txt"   name="avi82"  value="'.$data['avi82'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn83" type="txt"   name="avi83"  value="'.$data['avi83'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn84" type="txt"   name="avi84"  value="'.$data['avi84'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn85" type="txt"   name="avi85"  value="'.$data['avi85'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn86" type="txt"   name="avi86"  value="'.$data['avi86'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn87" type="txt"   name="avi87"  value="'.$data['avi87'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn88" type="txt"   name="avi88"  value="'.$data['avi88'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn89" type="txt"   name="avi89"  value="'.$data['avi89'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn90" type="txt"   name="avi90"  value="'.$data['avi90'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	
	echo '<input  id="avibn91" type="txt"   name="avi91"  value="'.$data['avi91'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn92" type="txt"   name="avi92"  value="'.$data['avi92'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn93" type="txt"   name="avi93"  value="'.$data['avi93'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn94" type="txt"   name="avi94"  value="'.$data['avi94'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn95" type="txt"   name="avi95"  value="'.$data['avi95'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn96" type="txt"   name="avi96"  value="'.$data['avi96'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn97" type="txt"   name="avi97"  value="'.$data['avi97'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn98" type="txt"   name="avi98"  value="'.$data['avi98'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	echo '<input  id="avibn99" type="txt"   name="avi99"  value="'.$data['avi99'].'"  placeholder=""  onblur="genererCodeP1()"/>';
	
	echo '<input type="hidden" name="WILAYA"     value="'.Session::get('wilaya').'"/>';
	echo '<input type="hidden" name="STRUCTURE"  value="'.Session::get('structure').'"/>';
	echo '<input type="hidden" name="STRUCTURED" value="'.Session::get('structure').'"/>';
	echo '<input type="hidden" name="login"      value="'.Session::get('login').'"/>';
	echo '<input id="submitavi" type="submit" />	'; 
	}
	
    function users($name,$tb_name,$structure,$value) 
	{
	$this->mysqlconnect();
	echo "<select size=1 id=\"aa\" name=\"".$name."\"   >"."\n";
	//echo"<option value=\"".$value."\"  selected=\"selected\">".$selected."</option>"."\n";
	$result = mysql_query("SELECT * FROM $tb_name where structure=$structure and id	!=$value order by login" );
	while($data =  mysql_fetch_array($result))
	{
	echo '<option value="'.$data['id'].'">'.$data['login'].'</option>';
	}
	echo '</select>'."\n"; 
	}
	
	
	
	
}

?>

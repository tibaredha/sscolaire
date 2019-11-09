<SCRIPT LANGUAGE="JavaScript">
$(document).ready(function(){
	$("#search").keyup(function(){
		$.ajax({
		type: "POST",
		url: "/sscolaire/public/js/A.PHP",
		data:'keyword='+$(this).val(),
		beforeSend: function(){
			$("#search").css("background","green url(/sscolaire/public/js/LoaderIcon.gif) no-repeat 90px");
		},
		success: function(data){
			$("#suggesstion-box").show();
			$("#suggesstion-box").html(data);
			$("#search").css("background","green");
		}
		});
	});
});
</script>
<div class="sheader1l"><p id="dashboard"><?php echo TXT_SMENUE1 ;?></p></div><div class="sheader1r"><p id="dashboard"><?php html::NAV();?></p></div>
<div class="sheader2l">
Examens paramédicales de l'élève : 
<?php
$ctrl='para';$mdl='search';
$data = array(
"c"           => $ctrl,
"m"           => $mdl,
"combo"       => array("id"=>'id',"Nom"=>'NOM',"prenom"=>'PRENOM',"Sexe"=>'SEX'),
"submitvalue" => 'Search',
"cb1"         => $ctrl,        "mb1" => 'para/'.$this->userListviewq,         "tb1" => 'Créer un nouveau examen paramedicale ',      "vb1" => '',  "icon1" => 'add.PNG',
"cb2"         => "dashboard",  "mb2" => 'search/0/10?o=id&q=',               "tb2" => 'Eleves scolarisés',                                  "vb2" => '',  "icon2" => 'eva.png');
echo HTML::nbrtostring('eleve','id',$this->userListviewq,'NOM')."_".HTML::nbrtostring('eleve','id',$this->userListviewq,'PRENOM')."(".HTML::nbrtostring('eleve','id',$this->userListviewq,'FILSDE').")";
?>

</div>
<div class="sheader2r">
<?php
echo "<button id=\"Cleari\"  onclick=\"document.location='".URL.$data['cb1']."/".$data['mb1']."';  \"   title=\"".$data['tb1']."\">&nbsp;<img src=\"".URL."public/images/".$data['icon1']."\" width='15' height='15' border='0' alt=''/>&nbsp;".$data['vb1']."&nbsp;</button> " ;
echo "<button id=\"Cleari\"  onclick=\"document.location='".URL.$data['cb2']."/".$data['mb2']."';  \"   title=\"".$data['tb2']."\">&nbsp;<img src=\"".URL."public/images/".$data['icon2']."\" width='15' height='15' border='0' alt=''/>&nbsp;".$data['vb2']."&nbsp;</button> " ;
?>
</div>
<?php
function anomalie ($xx,$yy,$zz){if($xx==1) {return  $yy;}else{return  $zz;} }
		if (isset($this->userListview))
		{
		ob_start();
		$colspan=18;
		$commune2=HTML::nbrtostring('structure','id',Session::get('structure'),'com');
		$wilayad2=HTML::nbrtostring('wil','IDWIL',Session::get('wilaya'),'WILAYAS');
		$total_count=count($this->userListview1);
		$total_count1=count($this->userListview);
		$urlx = explode('/',$_GET['url']);
		$order   = !empty($_GET["ad"]) ? $_GET["ad"] : "asc"; $ad = "asc";
		if($order == "asc") {$ad = "desc";$down='minidown.png';}else {$down='miniup.png';}
		echo '<div class="contentl formaut">';
		echo '<br>';
		echo'<table>';
			echo'<tr bgcolor="#00CED1"><th colspan="'.$colspan.'" ><A HREF="'.URL.$ctrl.'/'.$mdl.'/'.$urlx[2].'/'.$urlx[3].'?o=IDELEVE&q='.$this->userListviewq.'"> La liste des examens paramédicales </A> : <span>'.$total_count1.'/'.$total_count.' enregistrement(s) trouvé(s)</span></th></tr>';
			echo'<tr bgcolor="#00CED1">';
			echo'<th >Date d\'éxamen</th>';
			echo'<th >AGE</th>';
			echo'<th >POIDS</th>';
	        echo'<th >TAILLE</th>';
			echo'<th >BMI</th>';
			echo'<th >TA</th>';
			echo'<th >AV</th>';
			echo'<th >ACV</th>';
			echo'<th ><img src="'.URL.'public/images/pdf.png"   width="16" height="16" border="0" alt=""/></th>';
			echo'<th ><img src="'.URL.'public/images/table/edit.png"   width="16" height="16" border="0" alt=""/></th>';
			echo'<th ><img src="'.URL.'public/images/table/erase.png"   width="16" height="16" border="0" alt=""/></th>';
			echo'</tr>';
			foreach($this->userListview as $key => $value)
			{ 
			$bgcolor_donate ='#EDF7FF';
			echo "<tr bgcolor=\"".$bgcolor_donate."\"  onmouseover=\"this.style.backgroundColor='#9FF781';\"   onmouseout=\"this.style.backgroundColor='".$bgcolor_donate."';\"  >" ;
			echo '<td align="center"  >'.HTML::dateUS2FR($value['DATEEXAMEN']).'</td>';
			echo '<td align="center"  >'.$value['Years'].'</td>';
			echo '<td align="center"  >'.$value['POIDS'].'</td>';
			echo '<td align="center"  >'.$value['TAILLE'].'</td>';
			echo '<td align="center"  >'.$value['BMI'].'</td>';
			
			//BMI < 18,5	    poids insuffisant
			//BMI 18,5 à 24,9	poids normal
			//BMI 25,0 à 29,9	excès pondéral, surpoids
			//BMI 30,0 à 39,9	obésité
			//BMI 40 et +	    obésité morbide
			
			echo '<td align="center"  >'.$value['TA'].'</td>';
			echo '<td align="center"  >'.$value['AV'].'</td>';
			echo '<td align="center"  >'.anomalie ($value['ACV'],"Oui","Non").'</td>';
			echo '<td align="center" style="width:10px;"  ><a target="_blank" title="fiche paramédicale"  href="'.URL.'tcpdf/sscolaire/fpara.php?ideleve='.$value['IDELEVE'].'&idfiche='.$value['id'].'" ><img src="'.URL.'public/images/b_props.png"   width="16" height="16" border="0" alt=""   /></a></td>';
			echo '<td align="center" style="width:10px;" ><a  title="Editer Examens paramédicale"  href="'.URL.$ctrl.'/edit/'.$value['IDELEVE'].'/'.$value['id'].'" ><img src="'.URL.'public/images/table/edit.png"   width="16" height="16" border="0" alt=""   /></a></td>';
			echo '<td align="center" style="width:10px;" ><a class="delete" title="Supprimer paramédicale"  href="'.URL.$ctrl.'/delete/'.$value['IDELEVE'].'/'.$value['id'].'" ><img src="'.URL.'public/images/table/erase.png"   width="16" height="16" border="0" alt=""   /></a></td>';
			}
			if ($total_count <= 0 ){header('location: ' . URL .$ctrl.'/para/'.$this->userListviewq);	}else{echo '<tr bgcolor="#00CED1"><td id="bdn"  colspan="'.$colspan.'" >'. HTML::barre_navigation ($total_count,$this->userListviewl,$this->userListviewo,$this->userListviewq,$this->userListviewp,$this->userListviewb,$ctrl,$mdl,$order).'</td></tr>';		 	}	
		echo "</table>";
		echo "</div>";
		ob_end_flush();
		}
		else 
		{
		echo '<div class="contentl">';
		$this->clgraphe->multigraphe(30,340,'les élèves scolarisés par année et sexe  arreté au : ','eleve','DINS','SEX','M','F','='.Session::get('uds')) ;
		echo "</div>";
		echo'<div class="content"><img id="image" src="'.URL.'public/images/dashbord.jpg" ></div>';
		echo'<div class="contentr" id="suggesstion-box"><img id="image" src="'.URL.'public/images/'.logo.'"></div>';
		}
		
?>
<div class="content"><img id="image" src="<?php echo URL;?>public/images/biometrie.jpg" ></div>
<div class="contentr"><img id="image" src="<?php echo URL;?>public/images/<?php echo logod;?>"></div>	
<div class="scontentl2"><?php echo '<a class="DECES"  id="annee"  href="'.URL.$ctrl.'/graphe/0">Année</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="DECES"  id="mois"   href="'.URL.$ctrl.'/graphe/1">Mois</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="DECES"  id="mois"   href="'.URL.$ctrl.'/graphe/7">LN</a>';?></div>		
<div class="scontentl3"><?php echo '<a class="DECES"  id="mois"   href="'.URL.$ctrl.'/graphe/2">Sexe</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="DECES"  id="mois"   href="'.URL.$ctrl.'/graphe/3">Age</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="DECES"  id="mois"   href="'.URL.$ctrl.'/graphe/4">CD</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="DECES"  id="mois"   href="'.URL.$ctrl.'/graphe/5">LD</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="DECES"  id="mois"   href="'.URL.$ctrl.'/graphe/6">DM</a>';?></div>
<div class="scontentr1"><?php echo dsp; ?></div>

	
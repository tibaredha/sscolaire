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
Examens bucco-dentaires de l'élève : 
<?php
$ctrl='sbd';$mdl='search';
$data = array(
"c"           => $ctrl,
"m"           => $mdl,
"combo"       => array("id"=>'id',"Nom"=>'NOM',"prenom"=>'PRENOM',"Sexe"=>'SEX'),
"submitvalue" => 'Search',
"cb1"         => $ctrl,        "mb1" => 'ebd/'.$this->userListviewq,         "tb1" => 'Créer un nouveau examen bucco-dentaire ',      "vb1" => '',  "icon1" => 'add.PNG',
"cb2"         => "dashboard",  "mb2" => 'search/0/10?o=id&q=',               "tb2" => 'Eleves scolarisés',                            "vb2" => '',  "icon2" => 'eva.png');

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
		echo '<div class="listl">';
		echo '<br>';
		echo'<table>';
			echo'<tr bgcolor="#00CED1"><th colspan="'.$colspan.'" ><A HREF="'.URL.$ctrl.'/'.$mdl.'/'.$urlx[2].'/'.$urlx[3].'?o=IDELEVE&q=6"> La liste des examens bucco-dentaires </A> : <span>'.$total_count1.'/'.$total_count.' enregistrement(s) trouvé(s)</span></th></tr>';
			echo'<tr bgcolor="#00CED1">';
			// echo'<th class="crtl"><img src="'.URL.'public/images/table/'.$down.'"   width="10" height="10" border="0" alt=""/>&nbsp;<A HREF="'.URL.$ctrl.'/'.$mdl.'/'.$urlx[2].'/'.$urlx[3].'?q=&o=aprouve&ad='.$ad.'">Ok</A></th>';
			// echo'<th class="nomprenom"><img src="'.URL.'public/images/table/'.$down.'"   width="10" height="10" border="0" alt=""/>&nbsp;<A HREF="'.URL.$ctrl.'/'.$mdl.'/'.$urlx[2].'/'.$urlx[3].'?q=&o=NOM&ad='.$ad.'">Nom_Prénom_( Fils de )</A></th>';
			// echo'<th class="crtl"><A HREF="'.URL.$ctrl.'/'.$mdl.'/'.$urlx[2].'/'.$urlx[3].'?q=&o=SEX&ad='.$ad.'">Sexe</A></th>';
			// echo'<th class="crtldate"><A HREF="'.URL.$ctrl.'/'.$mdl.'/'.$urlx[2].'/'.$urlx[3].'?q=&o=DATENS&ad='.$ad.'">Date naissance</A></th>';
			// echo'<th class="crtl"><A HREF="'.URL.$ctrl.'/'.$mdl.'/'.$urlx[2].'/'.$urlx[3].'?q=&o=Days&ad='.$ad.'">Age</A></th>';
			// echo'<th class="crtldate"><A HREF="'.URL.$ctrl.'/'.$mdl.'/'.$urlx[2].'/'.$urlx[3].'?q=&o=DINS&ad='.$ad.'">Date inscription</A></th>';
			// echo'<th class="crtl"><A HREF="'.URL.$ctrl.'/'.$mdl.'/'.$urlx[2].'/'.$urlx[3].'?q=&o=HINS&ad='.$ad.'">Heure</A></th>';
			// echo'<th class="service"><A HREF="'.URL.$ctrl.'/'.$mdl.'/'.$urlx[2].'/'.$urlx[3].'?q=&o=ECOLE&ad='.$ad.'">ECOLE</A></th>';
			// echo'<th class="crtl"><A HREF="'.URL.$ctrl.'/'.$mdl.'/'.$urlx[2].'/'.$urlx[3].'?q=&o=PALIER&ad='.$ad.'">PALIER</A></th>';
			
			echo'<th >Date d\'éxamen</th>';
			echo'<th >HYGIENE B-D</th>';
			echo'<th >GINGIVITE</th>';
			echo'<th >AODF</th>';
			echo'<th >C</th>';
			echo'<th >A</th>';
			echo'<th >O</th>';
			echo'<th >c</th>';
			echo'<th >a</th>';
			echo'<th >o</th>';
			echo'<th >RDV</th>';
	        echo'<th >Date RDV</th>';
			echo'<th ><img src="'.URL.'public/images/pdf.png"   width="16" height="16" border="0" alt=""/></th>';
			echo'<th ><img src="'.URL.'public/images/table/edit.png"   width="16" height="16" border="0" alt=""/></th>';
			echo'<th ><img src="'.URL.'public/images/table/erase.png"   width="16" height="16" border="0" alt=""/></th>';
			echo'</tr>';
			foreach($this->userListview as $key => $value)
			{ 
			$bgcolor_donate ='#EDF7FF';
			echo "<tr bgcolor=\"".$bgcolor_donate."\"  onmouseover=\"this.style.backgroundColor='#9FF781';\"   onmouseout=\"this.style.backgroundColor='".$bgcolor_donate."';\"  >" ;
			//$url1 = explode('/',$_GET['url']);if ($value['aprouve']==1){echo '<td align="center"><a  title="Désaprouvé "  href="'.URL.$ctrl.'/Aprouve/'.$value['id'].'/0/'.$url1[2].'/'.$url1[3].'" ><img src="'.URL.'public/images/ok.jpg"   width="16" height="16" border="0" alt=""   /></a></td>'; } else{echo '<td align="center"><a  title="Aprouvé"     href="'.URL.$ctrl.'/Aprouve/'.$value['id'].'/1/'.$url1[2].'/'.$url1[3].'" ><img src="'.URL.'public/images/non.jpg"   width="16" height="16" border="0" alt=""   /></a></td>';  }
			// echo '<td align="left" ><b><a target="_blank" title="Visualiser la fiche "  href="'.URL.$ctrl.'/view/'.$value['id'].'" >'.strtoupper($value['NOM']).'_'.strtolower($value['PRENOM']).' ('.strtolower($value['FILSDE']).')'.'<b></a></td>';
			echo '<td align="center"  >'.HTML::dateUS2FR($value['DATESBD']).'</td>';
			echo '<td align="center"  >'.anomalie ($value['HYGIENE'],"Non acceptable","Acceptable").'</td>';
			echo '<td align="center"  >'.anomalie ($value['GINGIVITE'],"Oui","Non").'</td>';
			echo '<td align="center"  >'.anomalie ($value['AODF'],"Oui","Non").'</td>';
			echo '<td align="center"  >'.$value['C'].'</td>';
			echo '<td align="center"  >'.$value['A'].'</td>';
			echo '<td align="center"  >'.$value['O'].'</td>';
			echo '<td align="center"  >'.$value['PC'].'</td>';
			echo '<td align="center"  >'.$value['PA'].'</td>';
			echo '<td align="center"  >'.$value['PO'].'</td>';
			echo '<td align="center"  >'.anomalie ($value['OKRDV'],"Oui","Non").'</td>';
			echo '<td align="center"  >'.HTML::dateUS2FR($value['DATECSBD']).'</td>';
			// echo '<td align="center"style="width:100px;" >'.HTML::dateUS2FR($value['DATENS']).'</td>';
			// if ($value['Years'] > 0 ){echo "<td style=\"width:50px;\" align=\"center\" >".$value['Years']." A </td>" ;} else {if ($value['Days'] <= 30 ) {echo "<td style=\"width:50px;\" align=\"center\" >".$value['Days']." J </td>" ;} else{echo "<td style=\"width:50px;\" align=\"center\" >".$value['Months']." M </td>" ;} }
			// echo '<td align="center"style="width:100px;" >'.HTML::dateUS2FR($value['DINS']).'</td>';
			// echo '<td align="center"  >'.$value['HINS'].'</td>';
			// echo '<td align="left"  >'.HTML::nbrtostring('ECOLE','id',$value['ECOLE'],'ecole').'</td>';
			// echo '<td align="center"  >'.HTML::nbrtostring('PALIER','id',$value['PALIER'],'nompalier').'</td>';
			// echo '<td align="center" style="width:10px;"  ><a  title="Examen buco-dentaire"  href="'.URL.$ctrl.'/ebd/'.$value['id'].'" ><img src="'.URL.'public/images/dent.jpg"   width="16" height="16" border="0" alt=""   /></a></td>';
			// echo '<td align="center" style="width:10px;"  ><a  title="Examen médical génerale"  href="'.URL.$ctrl.'/emg/'.$value['id'].'" ><img src="'.URL.'public/images/med.jpg"   width="16" height="16" border="0" alt=""   /></a></td>';
			// echo '<td align="center" style="width:10px;"  ><a  title="Acte de vaccination"  href="'.URL.$ctrl.'/vaccination/'.$value['id'].'" ><img src="'.URL.'public/images/vaccin.jpg"   width="16" height="16" border="0" alt=""   /></a></td>';
			// echo '<td align="center" style="width:10px;"  ><a  title="biometrie"  href="'.URL.$ctrl.'/emg/'.$value['id'].'" ><img src="'.URL.'public/images/rectangle.png"   width="16" height="16" border="0" alt=""   /></a></td>';
            // echo '<td align="center" style="width:10px;"  ><a target="_blank" title="dossier médicale scolaire"  href="'.URL.'fpdf/sscolaire/cms.php?uc='.$value['id'].'" ><img src="'.URL.'public/images/b_props.png"   width="16" height="16" border="0" alt=""   /></a></td>';
			echo '<td align="center" style="width:10px;"  ><a target="_blank" title="fiche bucco-dentaires"  href="'.URL.'tcpdf/sscolaire/fbd.php?ideleve='.$value['IDELEVE'].'&idfiche='.$value['id'].'" ><img src="'.URL.'public/images/b_props.png"   width="16" height="16" border="0" alt=""   /></a></td>';
			echo '<td align="center" style="width:10px;" ><a  title="Editer Examens bucco-dentaires"  href="'.URL.$ctrl.'/edit/'.$value['IDELEVE'].'/'.$value['id'].'" ><img src="'.URL.'public/images/table/edit.png"   width="16" height="16" border="0" alt=""   /></a></td>';
			echo '<td align="center" style="width:10px;" ><a class="delete" title="Supprimer Examens bucco-dentaires"  href="'.URL.$ctrl.'/delete/'.$value['IDELEVE'].'/'.$value['id'].'" ><img src="'.URL.'public/images/table/erase.png"   width="16" height="16" border="0" alt=""   /></a></td>';
			
			// echo'</tr>';
			}
			if ($total_count <= 0 ){header('location: ' . URL .$ctrl.'/ebd/'.$this->userListviewq);	}else{echo '<tr bgcolor="#00CED1"><td id="bdn"  colspan="'.$colspan.'" >'. HTML::barre_navigation ($total_count,$this->userListviewl,$this->userListviewo,$this->userListviewq,$this->userListviewp,$this->userListviewb,$ctrl,$mdl,$order).'</td></tr>';		 	}	
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
<div class="scontentl2"><?php echo '<a class="DECES"  id="annee"  href="'.URL.$ctrl.'/graphe/0">Année</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="DECES"  id="mois"   href="'.URL.$ctrl.'/graphe/1">Mois</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="DECES"  id="mois"   href="'.URL.$ctrl.'/graphe/7">LN</a>';?></div>		
<div class="scontentl3"><?php echo '<a class="DECES"  id="mois"   href="'.URL.$ctrl.'/graphe/2">Sexe</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="DECES"  id="mois"   href="'.URL.$ctrl.'/graphe/3">Age</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="DECES"  id="mois"   href="'.URL.$ctrl.'/graphe/4">CD</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="DECES"  id="mois"   href="'.URL.$ctrl.'/graphe/5">LD</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="DECES"  id="mois"   href="'.URL.$ctrl.'/graphe/6">DM</a>';?></div>
<div class="scontentr1"><?php echo dsp; ?></div>

	
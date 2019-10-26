<div class="sheader1l"><p id="evaluation"><?php echo "Gérer les élèves scolarisés";?></p></div><div class="sheader1r"><p id="evaluation"><?php html::NAV();?></p></div>
<div class="sheader2l"><?php echo $this->msg; echo " du programme national UDS  : ";echo HTML::nbrtostring('uds','id',Session::get('uds'),'uds') ;?></div>
<div class="sheader2r">
<?php
$ctrl='dashboard';
$data = array(
"c"   => $ctrl,
"cb1" => $ctrl,"mb1" => 'SIGA',    "tb1" => 'SIGA',                       "vb1" => '',     "icon1" => 'sig.png',
"cb2" => $ctrl,"mb2" => 'nouveau', "tb2" => 'Créer un nouveau certificat',"vb2" => '',     "icon2" => 'add.PNG');

echo "<button id=\"Cleari\"  onclick=\"document.location='".URL.$data['cb2']."/".$data['mb2']."/';  \"   title=\"".$data['tb2']."\">&nbsp;<img src=\"".URL."public/images/".$data['icon2']."\" width='15' height='15' border='0' alt=''/>&nbsp;".$data['vb2']."&nbsp;</button> " ;
echo "<button id=\"Cleari\"  onclick=\"document.location='".URL.$data['cb1']."/".$data['mb1']."/';  \"   title=\"".$data['tb1']."\">&nbsp;<img src=\"".URL."public/images/".$data['icon1']."\" width='15' height='15' border='0' alt=''/>&nbsp;".$data['vb1']."&nbsp;</button> " ;

?>
</div>
<div class="contentl">
<?php 

            echo "<hr>";
	
	echo '<form ALIGN="center" action="'.URL.'fpdf/sscolaire/sbd.php" method="POST">';
			echo "<p>";html::txts(100,240,'Datedebut',0,date('d-m-Y'),'dateus');html::txts(100,240,'Datefin',0,date('d-m-Y'),'dateus1');echo "</p>";
			echo "<p>";;echo "</p>";
			echo "<hr>";
			echo "<p>";
			HTML::ECOLE('ECOLE','type3','class','ecole','0','Établissement scolaire',Session::get('uds')); 
			HTML::PALIER('PALIER','type4','class','palier','0','Palier');
			echo "</p> ";
			
			echo "<p>";
			echo "<select id=\"type1\" name=\"SS\">";
			echo '<option value="lnm">Liste Médecin Vierge </option>';
			echo '<option value="lnd">Liste Dentiste Vierge</option>';
			echo '<option value="lnps">Liste psychologue Vierge</option>';
			echo '<option value="lnpr">Liste Paramédicale Vierge</option>';
			
			echo '<option value="5">Affections dépistées/Eleve</option>';
			echo '<option value="6">Affections dépistées/Ecole</option>';
			
			echo '<option value="eff">Effectifs par établissement</option>';
			echo '<option value="vms">Visite Médicale Systematique</option>';
			echo '<option value="amd">Affections Dépistees </option>';
			echo '<option value="vac">Vaccination </option>';
			echo '<option value="hsl">Hygiene et salubrite</option>';
			echo '<option value="9">Bucco-Dentaire</option>';
			echo "</select>";
			echo "</p> ";
				
			echo "<p>";
			echo "<select id=\"type2\" name=\"type\">";
			echo"<option value=\"1\">PDF</option>"."\n";
			echo"<option value=\"2\">XLS</option>"."\n";
			echo"<option value=\"3\">SQL</option>"."\n";
			echo "</select>";
			echo "</p>";
			echo "<hr>";
			echo '<input type="hidden" name="login"     value="'.Session::get('login').'"/>';   
			echo '<input type="hidden" name="structure" value="'.Session::get('structure').'"/> ';     
			echo '<input type="hidden" name="uds" value="'.Session::get('uds').'"/> ';     
			echo "<p><input  id=\"submitr\" type=\"submit\" value=\"Calculer\" /></p>";
	echo "</form>";
	          echo "<hr>";

?>
</div>	
<div class="content"><img id="image" src="<?php echo URL;?>public/images/eva.png"></div>
<div class="contentr"><img id="image" src="<?php echo URL;?>public/images/<?php echo logo;?>"></div>

	
<div class="scontentl2"><?php echo "***";//echo $this->msg; echo "";?></div>		
<div class="scontentl3"><?php echo "***";//echo $this->msg; echo "";?></div>
<div class="scontentr1"><?php echo "***";//echo dsp; echo "";?></div>		

<style>
#inner-grid {
  display: grid;padding: 8px;
  grid-template-columns: 1fr 1fr 1fr  1fr 1fr 1fr ;
  grid-template-rows: 30px 30px 30px 30px 30px 30px 30px 30px 30px 30px 30px;
  grid-gap: 5px;
}
#wilayarg,#structurerg,#uds,#role,#dd,#DATEV,#ff,#gg {background: yellow; text-align: center ; border-radius: 5px;width: 50%;height: 100%;}
#hh {background: #00cc00; text-align: center;border-radius: 5px;width: 100%;height: 100%; color: white;}
#hh:hover {background: red;color: #fff;}
#gg1 {background: green;text-align: center;border-radius: 5px;  height: 100%;}
#gg2 {background: yellow; text-align: center;border-radius: 5px; float: right;width: 30%; height: 100%;}
#a {background: salmon;text-align: right;border-radius: 5px;padding: 0px;grid-column: 1  / 4;  grid-row: 1 / 2;}
#b {background: salmon;text-align: right;border-radius: 5px;padding: 0px;grid-column: 1  / 4;  grid-row: 2 / 3;}

#c {background: salmon;text-align: center;border-radius: 5px;padding: 0px;grid-column: 4  / 8;  grid-row: 1 / 2;color:white;}
#d {background: salmon;text-align: left;border-radius: 5px;padding: 0px;grid-column: 4  / 8;  grid-row: 2 / 3;}
#e {background: salmon;text-align: left;border-radius: 5px;padding: 0px;grid-column: 4  / 8;  grid-row: 3 / 4;}
#f {background: salmon;text-align: left;border-radius:5px;padding: 0px;grid-column: 4  / 8;  grid-row: 4 / 5;}
#g {background: salmon;text-align: left;border-radius:5px;padding: 0px;grid-column: 4  / 8;  grid-row: 5 / 6;}
#h {background: salmon;text-align: left;border-radius:5px;padding: 0px;grid-column: 4  / 8;  grid-row: 6 / 7;}
#i {background: salmon;text-align: left;border-radius:5px;padding: 0px;grid-column: 4  / 8;  grid-row: 7 / 8;}
#j {background: salmon;text-align: left;border-radius:5px;padding: 0px;grid-column: 4  / 8;  grid-row: 8 / 9;}
#k {background: salmon;text-align: left;border-radius:5px;padding: 0px;grid-column: 4  / 8;  grid-row: 9 / 10;}




</style>


<div class="sheader1r"><p id="llogin"><?php html::NAV();?></p></div>
<div class="sheader2l">Hygiene et salubrité des locaux UDS  : <?php echo HTML::nbrtostring('uds','id',Session::get('uds'),'uds') ;?> </div>
<div class="sheader2r">
<?php
$ctrl='hsl';$mdl='search';
$data = array(
"c"           => $ctrl,
"m"           => $mdl,
"combo"       => array("id"=>'id',"Nom"=>'NOM',"prenom"=>'PRENOM',"Sexe"=>'SEX'),
"submitvalue" => 'Search',
"cb1"         => $ctrl,    "mb1" => '***',         "tb1" => 'Créer un nouveau élève scolarisé',      "vb1" => '',  "icon1" => 'add.PNG',
"cb2"         => $ctrl,    "mb2" => 'Evaluation',  "tb2" => 'Evaluation la santé scolaire',          "vb2" => '',  "icon2" => 'eva.png',
"cb3"         => $ctrl,    "mb3" => '',            "tb3" => '',                                      "vb3" => '',  "icon3" => 'graph.PNG',
"cb4"         => $ctrl,    "mb4" => '',            "tb4" => '',                                      "vb4" => '',  "icon4" => 'search.PNG');
echo "<button id=\"Cleari\"  onclick=\"document.location='".URL.$data['cb1']."/".$data['mb1']."/';  \"   title=\"".$data['tb1']."\">&nbsp;<img src=\"".URL."public/images/".$data['icon1']."\" width='15' height='15' border='0' alt=''/>&nbsp;".$data['vb1']."&nbsp;</button> " ;
echo "<button id=\"Cleari\"  onclick=\"document.location='".URL.$data['cb2']."/".$data['mb2']."/';  \"   title=\"".$data['tb2']."\">&nbsp;<img src=\"".URL."public/images/".$data['icon2']."\" width='15' height='15' border='0' alt=''/>&nbsp;".$data['vb2']."&nbsp;</button> " ;
?>
</div>
<div class="sheader1l"><p id="dashboard"><?php echo TXT_SMENUE1 ;?></p></div>

<div class="contentl formaut">
	<form class="tabaut"action="<?php echo URL;?>hsl/createhsl" method="post">	
		<div class="tabbed_area">  
			<ul class="tabs">  
				<li><a href="javascript:tabSwitch('tab_1', 'content_1');" id="tab_1" class="active">1er partie</a></li>  
				<li><a href="javascript:tabSwitch('tab_2', 'content_2');" id="tab_2">2em partie</a></li> 
				<li><a href="javascript:tabSwitch('tab_3', 'content_3');" id="tab_3">3em partie</a></li> 	
				<li><a href="javascript:tabSwitch('tab_4', 'content_4');" id="tab_4">4em partie </a></li> 	
			</ul>    	 
		<?php echo '<div id="content_1" class="contenttabs1">'; ?>
		
		<div id="inner-grid">
			<div id="a">Date visite :   <input id="DATEV" type="text"     name="DATEV"    value="<?php echo date ('d-m-Y')  ;?>"  required=""   /></div>
			<div id="b">Etablissement : <?php HTML::ECOLE('ECOLE','IDECOLE','CLECOLE','ecole',"","",Session::get('uds'));?></div>
			
			<div id="c">CLASSE</div>
			<div id="d">Fréquence de néttoyage humide</div>   
			<div id="e">Propreté noter de 01 a 10 </div>
			<div id="f">Chauffage (modalité) </div>
			<div id="g">Nombre d'appareils en bonne etat / Total </div>	
			<div id="h">Nombre de porte mentaux par classe </div>
			<div id="i">Nombre de carreaux cassées</div>
			<div id="j">Eclairage </div>
			<div id="k">Distance 1ère table tableau</div>
		</div>
	<?php echo "</div>";?>
	
	<?php echo '<div id="content_2" class="contenttabs2"><div id="inner-grid">'; ?>
			<div id="a">LAVABOS</div>
			<div id="b">Nombre de robinet fonctionnels / Total</div>
			
			<div id="c">EAU</div>
			<div id="d">Fréquence de nettoyage humide</div>   
			<div id="e">Approvisionnement en eau potable</div>
			<div id="f">Traitement (chaux-javel) fréquence</div>
			<div id="g">Date de prélevemnt </div>
			<div id="h">Résultat bacteriologique (colimetrie)</div>
			<div id="i">Controle de la cloration </div>
			<div id="j">Evacuation des eaux usées </div>
			<div id="k"></div>
	<?php echo "</div></div>";?>
	
	<?php echo '<div id="content_3" class="contenttabs3"><div id="inner-grid">'; ?>
	        <div id="a"></div>
			<div id="b"></div>
			
			<div id="c">TOILETTE</div>
			<div id="d">Nombre de cabinet fonctionnels / Total </div>   
			<div id="e">Nombre d'urinoire</div>
			<div id="f">Désinfection journalière </div>
			<div id="g">Propreté noter de 01 a 10 </div>
			<div id="h">COUR</div>
			<div id="i">Sol </div>
			<div id="j">Cloture</div>
			<div id="k">Signalisation routiere </div>
	<?php echo "</div></div>";?>
	<?php echo '<div id="content_4" class="contenttabs4"><div id="inner-grid">'; ?>
	        <div id="a"></div>
			<div id="b"></div>
			
			<div id="c"></div>
			<div id="d"></div>   
			<div id="e"></div>
			<div id="f"></div>
			<div id="g"></div>
			<div id="h"></div>
			<div id="i"></div>
			<div id="j"></div>
			<div id="k"></div>
	
	
	
	<div id="h"><input id="hh" onclick="playSound()"  type="submit" value="Envoyer" /></div>
	<?php echo "</div></div>";?>
	
	</div> 
	
	<?php 
			echo '<div ><input type="hidden" name="UDS"      value="'.Session::get('uds').'"/> </div>';
			echo '<div ><input type="hidden" name="STRUCTURE"value="'.Session::get('structure').'"/> </div>';
			?>
	</form>				
</div>	

<div class="content"><img id="image" src="<?php echo URL;?>public/images/hsl.jpg" ></div>
<div class="contentr"><img id="image" src="<?php echo URL;?>public/images/<?php echo logod;?>"></div>
<div class="scontentl2"></div>		
<div class="scontentl3"></div>
<div class="scontentr1"></div>		
<script> function playSound() {var sound = document.getElementById("beep");sound.play();}</script>
<audio id="beep" src="<?php echo URL;?>public/beep-23.wav" type="audio/wav"></audio>			

<div class="scontentl2">c</div>		
<div class="scontentl3">d</div>
<div class="scontentr1">e</div>
<script>
var checkbox = document.querySelector("#YOURBOX");
var input = document.querySelector("#DATECSBD");
var toogleInput = function(e){input.disabled = !e.target.checked;};
toogleInput({target: checkbox});
checkbox.addEventListener("change", toogleInput);
</script>
	
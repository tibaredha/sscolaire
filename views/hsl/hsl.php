<style>
#inner-grid {
  display: grid;padding: 8px;
  grid-template-columns: 1fr 2fr 1fr  ;
  grid-template-rows: 45px 45px 45px 45px 45px 45px 45px;
  grid-gap: 5px;
}
#wilayarg,#structurerg,#uds,#role,#dd,#DATEV,#ff,#gg {background: yellow; text-align: center ; border-radius: 5px;width: 50%;height: 100%;}
#hh {background: #00cc00; text-align: center;border-radius: 5px;width: 100%;height: 100%; color: white;}
#hh:hover {background: red;color: #fff;}
#gg1 {background: green;text-align: center;border-radius: 5px;  height: 100%;}
#gg2 {background: yellow; text-align: center;border-radius: 5px; float: right;width: 30%; height: 100%;}
#a {background: salmon;text-align: right;border-radius: 5px;padding: 8px;grid-column: 2  / 3;  grid-row: 1 / 2;}
#b {background: salmon;text-align: right;border-radius: 5px;padding: 8px;grid-column: 2  / 3;  grid-row: 2 / 3;}
#c {background: salmon;text-align: right;border-radius: 5px;padding: 8px;grid-column: 2  / 3;  grid-row: 3 / 4;}
#d {background: salmon;text-align: right;border-radius: 5px;padding: 8px;grid-column: 2  / 3;  grid-row: 4 / 5;}
#e {background: salmon;text-align: right;border-radius: 5px;padding: 8px;grid-column: 2  / 3;  grid-row: 5 / 6;}
#f {background: salmon ;text-align: right;border-radius:5px;padding: 8px;grid-column: 2  / 3;  grid-row: 6 / 7;}
#f1 {background: green ;text-align: center;border-radius:5px;padding: 8px;grid-column: 2  / 3;  grid-row: 7 / 8;color:white;}



#g {background: salmon;text-align: center;border-radius:5px;padding: 8px;grid-column: 2  / 3;  grid-row: 8 / 9;color:white;}
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
"cb1"         => $ctrl,    "mb1" => 'hsl',         "tb1" => 'Créer un nouveau élève scolarisé',      "vb1" => '',  "icon1" => 'add.PNG',
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
		<div id="inner-grid">
			<div id="a">Date visite :   <input id="DATEV" type="text"     name="DATEV"    value="<?php echo date ('d-m-Y')  ;?>"  required=""   /></div>
			<div id="b">Etablissement : <?php HTML::ECOLE('ECOLE','IDECOLE','CLECOLE','ecole',"","",Session::get('uds'));?></div>
			<div id="c"></div>
			<div id="d"></div>
			<div id="e"></div>
			<div id="f"></div>
			<div id="f1"></div>
			<?php 
			echo '<div ><input type="hidden" name="UDS"      value="'.Session::get('uds').'"/> </div>';
			echo '<div ><input type="hidden" name="STRUCTURE"value="'.Session::get('structure').'"/> </div>';
			?>
			<div id="g"><input id="hh" onclick="playSound()"  type="submit" value="Envoyer" /></div>
		</div>
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
	
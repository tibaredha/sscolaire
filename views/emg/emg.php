<style>
#inner-grid {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr  ;
  grid-template-rows: 40px 40px 40px 40px 40px 40px 40px 40px;
  grid-gap: 5px;padding: 5px;
}

#s1    {background: red; color:white ; text-align: center; border-radius: 5px;padding: 8px;grid-column: 1 / 4; grid-row: 1 / 2;}
#s1m1  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 1 / 4; grid-row: 2 / 3;}
#s1m2  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 1 / 4; grid-row: 3 / 4;}
#s1m3  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 1 / 4; grid-row: 4 / 5;}
#s1m4  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 1 / 4; grid-row: 5 / 6;}
#s1m5  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 1 / 4; grid-row: 6 / 7;}
#s1m6  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 1 / 4; grid-row: 7 / 8;}

#s2    {background: red; color:white ; text-align: center; border-radius: 5px;padding: 8px;grid-column: 4 / 7; grid-row: 1 / 2;}
#s2m1  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 4 / 7; grid-row: 2 / 3;}
#s2m2  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 4 / 7; grid-row: 3 / 4;}
#s2m3  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 4 / 7; grid-row: 4 / 5;}
#s2m4  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 4 / 7; grid-row: 5 / 6;}
#s2m5  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 4 / 7; grid-row: 6 / 7;}
#s2m6  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 4 / 7; grid-row: 7 / 8;}

#s3    {background: red; color:white ; text-align: center; border-radius: 5px;padding: 8px;grid-column: 7 / 10; grid-row: 1 / 2;}
#s3m1  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 7 / 10; grid-row: 2 / 3;}
#s3m2  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 7 / 10; grid-row: 3 / 4;}
#s3m3  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 7 / 10; grid-row: 4 / 5;}
#s3m4  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 7 / 10; grid-row: 5 / 6;}
#s3m5  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 7 / 10; grid-row: 6 / 7;}
#s3m6  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 7 / 10; grid-row: 7 / 8;}

#s4    {background: red; color:white ; text-align: center; border-radius: 5px;padding: 8px;grid-column: 10 / 13; grid-row: 1 / 2;}
#s4m1  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 10 / 13; grid-row: 2 / 3;}
#s4m2  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 10 / 13; grid-row: 3 / 4;}
#s4m3  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 10 / 13; grid-row: 4 / 5;}
#s4m4  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 10 / 13; grid-row: 5 / 6;}
#s4m5  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 10 / 13; grid-row: 6 / 7;}
#s4m6  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 10 / 13; grid-row: 7 / 8;}

#s5    {background: red; color:white ; text-align: center; border-radius: 5px;padding: 8px;grid-column: 13 / 16; grid-row: 1 / 2;}
#s5m1  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 13 / 16; grid-row: 2 / 3;}
#s5m2  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 13 / 16; grid-row: 3 / 4;}
#s5m3  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 13 / 16; grid-row: 4 / 5;}
#s5m4  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 13 / 16; grid-row: 5 / 6;}
#s5m5  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 13 / 16; grid-row: 6 / 7;}
#s5m6  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 13 / 16; grid-row: 7 / 8;}

#s6    {background: red; color:white ; text-align: center; border-radius: 5px;padding: 8px;grid-column: 16 / 19; grid-row: 1 / 2;}
#s6m1  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 16 / 19; grid-row: 2 / 3;}
#s6m2  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 16 / 19; grid-row: 3 / 4;}
#s6m3  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 16 / 19; grid-row: 4 / 5;}
#s6m4  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 16 / 19; grid-row: 5 / 6;}
#s6m5  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 16 / 19; grid-row: 6 / 7;}
#s6m6  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 16 / 19; grid-row: 7 / 8;}

.remember{ width: 10%;height: 70%; }

#x{background: salmon;text-align: right;  border-radius: 5px;padding: 8px;grid-column: 16  / 19;   grid-row: 4 / 5;}
.DATESBD{background: yellow; text-align: center; border-radius: 5px;width:50%;height: 100%;}
#x3 {background: salmon;text-align: center; border-radius: 5px;padding: 8px;grid-column: 16 / 19;  grid-row: 5 / 6;}
#y3 {background: salmon;text-align: center; border-radius: 5px;padding: 8px;grid-column: 16 / 19; grid-row: 6 / 7;}

#l {background: salmon;text-align: center;border-radius: 5px;padding: 0px;grid-column: 16  / 19;  grid-row: 7 / 8;}
#l1 {background: #00cc00; text-align: center;border-radius: 5px;width: 100%;height: 100%; color: white;}
#l1:hover {background: red;color: #fff;}
</style>


<div class="sheader1r"><p id="llogin"><?php html::NAV();?></p></div>
<div class="sheader2l">Examen médicale de l'élève : <?php echo $this->user[0]['NOM'].'_'.$this->user[0]['PRENOM'].' ('.$this->user[0]['FILSDE'].')';?> </div>
<div class="sheader2r">
<?php
$ctrl='dashboard';$mdl='search';
$data = array(
"c"           => $ctrl,
"m"           => $mdl,
"combo"       => array("id"=>'id',"Nom"=>'NOM',"prenom"=>'PRENOM',"Sexe"=>'SEX'),
"submitvalue" => 'Search',
"cb1"         => $ctrl,    "mb1" => 'nouveau',     "tb1" => 'Créer un nouveau élève scolarisé',      "vb1" => '',  "icon1" => 'add.PNG',
"cb2"         => $ctrl,    "mb2" => 'Evaluation',  "tb2" => 'Evaluation la santé scolaire',          "vb2" => '',  "icon2" => 'eva.png',
"cb3"         => $ctrl,    "mb3" => '',            "tb3" => '',                                      "vb3" => '',  "icon3" => 'graph.PNG',
"cb4"         => $ctrl,    "mb4" => '',            "tb4" => '',                                      "vb4" => '',  "icon4" => 'search.PNG');
echo "<button id=\"Cleari\"  onclick=\"document.location='".URL.$data['cb1']."/".$data['mb1']."/';  \"   title=\"".$data['tb1']."\">&nbsp;<img src=\"".URL."public/images/".$data['icon1']."\" width='15' height='15' border='0' alt=''/>&nbsp;".$data['vb1']."&nbsp;</button> " ;
echo "<button id=\"Cleari\"  onclick=\"document.location='".URL.$data['cb2']."/".$data['mb2']."/';  \"   title=\"".$data['tb2']."\">&nbsp;<img src=\"".URL."public/images/".$data['icon2']."\" width='15' height='15' border='0' alt=''/>&nbsp;".$data['vb2']."&nbsp;</button> " ;
?>
</div>
<div class="sheader1l"><p id="dashboard"><?php echo TXT_SMENUE1 ;?></p></div>

<div class="listl">
		
		<div class="tabbed_area">  
			<ul class="tabs">  
				<li><a href="javascript:tabSwitch('tab_1', 'content_1');" id="tab_1" class="active">1er partie</a></li>  
				<li><a href="javascript:tabSwitch('tab_2', 'content_2');" id="tab_2">2em partie</a></li> 
				<li><a href="javascript:tabSwitch('tab_3', 'content_3');" id="tab_3">3em partie</a></li> 	
				<li><a href="javascript:tabSwitch('tab_4', 'content_4');" id="tab_4">4em partie </a></li> 	
			</ul>    	 
		    	
				<?php
				$data = array(
				"ctrl"  => $ctrl,
				"mdl"   => "createexamen",
				"IDEXAMEN"=>"0",
				"datee" => date('d-m-Y'),
				"okrdv" =>"",
			    "datecsbd" => "",
				"m1"   => "",
				"m2"   => "",
				"m3"   => "",
				"m4"   => "",
				"m5"   => "",
				"m6"   => "",
				"m7"   => "",
				"m8"   => "",
				"m9"   => "",
				"m10"   => "",
				"m11"   => "",
				"m12"   => "",
				"m13"   => "",
				"m14"   => "",
				"m15"   => "",
				"m16"   => "",
				"m17"   => "",
				"m18"   => "",
				"m19"   => "",
				"m20"   => "",
				"m21"   => "",
				"m22"   => "",
				"m23"   => "",
				"m24"   => "",
				"m25"   => "",
				"m26"   => "",
				"m27"   => "",
				"m28"   => "",
				"m29"   => "",
				"m30"   => "",
				"m31"   => "",
				"m32"   => "",
				"m33"   => "",
				"m34"   => "",
				"m35"   => "",
				"m36"   => "",
				"m37"   => "",
				"m38"   => "",
				"m39"   => "",
				"m40"   => "",
				"m41"   => "",
				"m42"   => "",
				"m43"   => "",
				"m44"   => "",
				"m45"   => "",
				"m46"   => "",
				"m47"   => "",
				"m48"   => "",
				"m49"   => "",
				"m50"   => "",
				"m51"   => "",
				"m52"   => "",
				"m53"   => "",
				"m54"   => "",
				);
                html::ficheemg($data);
				?>
		
		</div>
		
</div>	
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
	
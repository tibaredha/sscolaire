<style>
#inner-grid {
  display: grid;padding: 8px;
  grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr;
  grid-template-rows: 45px 45px 45px 45px 45px 45px 45px;
  grid-gap: 5px;
}
#DATESBD{background: yellow; text-align: center; border-radius: 5px;width:50%;height: 100%;}
#DATECSBD{ text-align: center; border-radius: 5px;width:50%;height: 100%;}
#x  {background: salmon;text-align: right;  border-radius: 5px;padding: 8px;grid-column: 2  / 6;   grid-row: 1 / 2;}#y  {background: yellow;text-align: center; border-radius: 5px;padding: 8px;grid-column: 6  / 10; grid-row: 1 / 2;}
#x1 {background: yellow;text-align: center; border-radius: 5px;padding: 8px;grid-column: 10 / 13;  grid-row: 1 / 2;}#y1 {background: yellow;text-align: center; border-radius: 5px;padding: 8px;grid-column: 13 / 16; grid-row: 1 / 2;}
#x2 {background: salmon;text-align: center; border-radius: 5px;padding: 8px;grid-column: 2  / 10;  grid-row: 2 / 3;}#y2 {background: salmon;text-align: center; border-radius: 5px;padding: 8px;grid-column: 10 / 16; grid-row: 2 / 3;}
#x3 {background: salmon;text-align: center; border-radius: 5px;padding: 8px;grid-column: 10 / 13;  grid-row: 7 / 8;}#y3 {background: salmon;text-align: center; border-radius: 5px;padding: 8px;grid-column: 13 / 16; grid-row: 7 / 8;}
.ax {background: yellow; text-align: center; border-radius: 5px;width:11%;height: 100%;}.bx {background: white;  text-align: center; border-radius: 5px;width:11%;height: 100%;}
#a {background: #FF69B4;text-align: center; border-radius: 5px;padding: 8px;grid-column: 2  / 6;  grid-row: 3 / 4;}#b {background: #FF69B4;text-align: center; border-radius: 5px;padding: 8px;grid-column: 6  / 10;  grid-row: 3 / 4;}
#c {background: #FFE4E1;text-align: center; border-radius: 5px;padding: 8px;grid-column: 2  / 6;  grid-row: 4 / 5;}#d {background: #FFE4E1;text-align: center; border-radius: 5px;padding: 8px;grid-column: 6  / 10;  grid-row: 4 / 5;}
#e {background: #FFE4E1;text-align: center; border-radius: 5px;padding: 8px;grid-column: 2  / 6;  grid-row: 5 / 6;}#f {background: #FFE4E1;text-align: center; border-radius: 5px;padding: 8px;grid-column: 6  / 10;  grid-row: 5 / 6;}
#g {background: #FF69B4;text-align: center; border-radius: 5px;padding: 8px;grid-column: 2  / 6;  grid-row: 6 / 7;}#h {background: #FF69B4;text-align: center; border-radius: 5px;padding: 8px;grid-column: 6  / 10;  grid-row: 6 / 7;}
.ax1 {background: yellow; text-align: center; border-radius: 5px;width:17%;height: 100%;}.bx1 {background: white;  text-align: center; border-radius: 5px;width:17%;height: 100%;}
#a1 {background: salmon;text-align: center; border-radius: 5px;padding: 8px;grid-column: 10  / 13;  grid-row: 3 / 4;}#b1 {background: salmon;text-align: center; border-radius: 5px;padding: 8px;grid-column: 13  / 16;  grid-row: 3 / 4;}
#c1 {background: salmon;text-align: center; border-radius: 5px;padding: 8px;grid-column: 10  / 13;  grid-row: 4 / 5;}#d1 {background: salmon;text-align: center; border-radius: 5px;padding: 8px;grid-column: 13  / 16;  grid-row: 4 / 5;}
#e1 {background: salmon;text-align: center; border-radius: 5px;padding: 8px;grid-column: 10  / 13;  grid-row: 5 / 6;}#f1 {background: salmon;text-align: center; border-radius: 5px;padding: 8px;grid-column: 13  / 16;  grid-row: 5 / 6;}
#g1 {background: salmon;text-align: center; border-radius: 5px;padding: 8px;grid-column: 10  / 13;  grid-row: 6 / 7;}#h1 {background: salmon;text-align: center; border-radius: 5px;padding: 8px;grid-column: 13  / 16;  grid-row: 6 / 7;}
.remember{background: #00cc00; text-align: center;border-radius: 5px;width: 10%;height: 70%; color: white;}
#l {background: salmon;text-align: center;border-radius: 5px;padding: 8px;grid-column: 2  / 16;  grid-row: 8 / 9;}
#l1 {background: #00cc00; text-align: center;border-radius: 5px;width: 100%;height: 100%; color: white;}
#l1:hover {background: red;color: #fff;}
#d18,#d48,#d28,#d38  {background: #F0FFFF;}
#d17,#d47,#d27,#d37  {background: #B0C4DE;}
#d16,#d46,#d26,#d36  {background: #B0C4DE;}
#d15,#d45,#d25,#d35  {background: #87E990;}
#d14,#d44,#d24,#d34  {background: #87E990;}
#d13,#d43,#d23,#d33  {background: turquoise;}
#d12,#d42,#d22,#d32  {background: yellow;}
#d11,#d41,#d21,#d31  {background: yellow;}
.dl18,.dl48,.dl28,.dl38 {background: #F0FFFF;  text-align: center; border-radius: 8px;width:11%;height: 120%;}
.dl17,.dl47,.dl27,.dl37 {background: #B0C4DE;  text-align: center; border-radius: 8px;width:11%;height: 120%;}
.dl16,.dl46,.dl26,.dl36 {background: #B0C4DE;  text-align: center; border-radius: 8px;width:11%;height: 120%;}
.dl15,.dl45,.dl25,.dl35 {background: #87E990;  text-align: center; border-radius: 8px;width:11%;height: 120%;}
.dl14,.dl44,.dl24,.dl34 {background: #87E990;  text-align: center; border-radius: 8px;width:11%;height: 120%;}
.dl13,.dl43,.dl23,.dl33 {background: turquoise;text-align: center; border-radius: 8px;width:11%;height: 120%;}
.dl12,.dl42,.dl22,.dl32 {background: yellow;   text-align: center; border-radius: 8px;width:11%;height: 120%;}
.dl11,.dl41,.dl21,.dl31 {background: yellow;   text-align: center; border-radius: 8px;width:11%;height: 120%;}
#xz {background: salmon;text-align: center; border-radius: 5px;padding: 8px;grid-column: 2  / 10;  grid-row: 7 / 8;}
.rotate90 {

    width:30px;height: 30px;
    -webkit-transform: rotate(180deg);
    -moz-transform: rotate(180deg);
    -o-transform: rotate(180deg);
    -ms-transform: rotate(180deg);
    transform: rotate(180deg);
}
.rotate {width:30px;height: 30px;}
</style>
<div class="sheader1r"><p id="llogin"><?php html::NAV();?></p></div>
<div class="sheader2l">Examen santé buco-dentaire de l'élève : <?php echo $this->user[0]['NOM'].'_'.$this->user[0]['PRENOM'].' ('.$this->user[0]['FILSDE'].')';?> </div>
<div class="sheader2r">
<?php
$ctrl='sbd';$mdl='search';
$data = array(
"c"           => $ctrl,
"m"           => $mdl,
"combo"       => array("id"=>'id',"Nom"=>'NOM',"prenom"=>'PRENOM',"Sexe"=>'SEX'),
"submitvalue" => 'Search',
"cb1"         => $ctrl,    "mb1" => 'nouveau',     "tb1" => 'Créer un nouveau élève scolarisé  ',      "vb1" => '',  "icon1" => 'add.PNG',
"cb2"         => $ctrl,    "mb2" => 'Evaluation',  "tb2" => 'Evaluation la santé scolaire',            "vb2" => '',  "icon2" => 'eva.png',
"cb3"         => $ctrl,    "mb3" => '',            "tb3" => '',                                        "vb3" => '',  "icon3" => 'graph.PNG',
"cb4"         => $ctrl,    "mb4" => '',            "tb4" => '',                                        "vb4" => '',  "icon4" => 'search.PNG');
echo "<button id=\"Cleari\"  onclick=\"document.location='".URL.$data['cb1']."/".$data['mb1']."/';  \"   title=\"".$data['tb1']."\">&nbsp;<img src=\"".URL."public/images/".$data['icon1']."\" width='15' height='15' border='0' alt=''/>&nbsp;".$data['vb1']."&nbsp;</button> " ;
echo "<button id=\"Cleari\"  onclick=\"document.location='".URL.$data['cb2']."/".$data['mb2']."/';  \"   title=\"".$data['tb2']."\">&nbsp;<img src=\"".URL."public/images/".$data['icon2']."\" width='15' height='15' border='0' alt=''/>&nbsp;".$data['vb2']."&nbsp;</button> " ;
?>
</div>
<div class="sheader1l"><p id="dashboard"><?php echo TXT_SMENUE1 ;?></p></div>
<div class="listl">
		<?php 
		$data = array(
			"ctrl"=> $ctrl,
			"mdl"=>"createexamen",
			"IDEXAMEN"=>"",
			"datee" => date('d-m-Y'),
			"hygiene"  =>"",
			"gingivite"=>"",
			"aodf"     =>"",
			"okrdv"    =>"",
			"datecsbd" =>"",
			"v11" => "s","s11" => "S",
			"v12" => "s","s12" => "S",
			"v13" => "s","s13" => "S",
			"v14" => "s","s14" => "S",
			"v15" => "s","s15" => "S",
			"v16" => "s","s16" => "S",
			"v17" => "s","s17" => "S",
			"v18" => "s","s18" => "S",
			"v21" => "s","s21" => "S",
			"v22" => "s","s22" => "S",
			"v23" => "s","s23" => "S",
			"v24" => "s","s24" => "S",
			"v25" => "s","s25" => "S",
			"v26" => "s","s26" => "S",
			"v27" => "s","s27" => "S",
			"v28" => "s","s28" => "S",
			"v31" => "s","s31" => "S",
			"v32" => "s","s32" => "S",
			"v33" => "s","s33" => "S",
			"v34" => "s","s34" => "S",
			"v35" => "s","s35" => "S",
			"v36" => "s","s36" => "S",
			"v37" => "s","s37" => "S",
			"v38" => "s","s38" => "S",
	        "v41" => "s","s41" => "S",
			"v42" => "s","s42" => "S",
			"v43" => "s","s43" => "S",
			"v44" => "s","s44" => "S",
			"v45" => "s","s45" => "S",
			"v46" => "s","s46" => "S",
			"v47" => "s","s47" => "S",
			"v48" => "s","s48" => "S",
		//*****************************//
		    "v51" => "s","s51" => "S",
			"v52" => "s","s52" => "S",
			"v53" => "s","s53" => "S",
			"v54" => "s","s54" => "S",
			"v55" => "s","s55" => "S",
     		"v61" => "s","s61" => "S",
			"v62" => "s","s62" => "S",
			"v63" => "s","s63" => "S",
			"v64" => "s","s64" => "S",
			"v65" => "s","s65" => "S",
			"v71" => "s","s71" => "S",
			"v72" => "s","s72" => "S",
			"v73" => "s","s73" => "S",
			"v74" => "s","s74" => "S",
			"v75" => "s","s75" => "S",
			"v81" => "s","s81" => "S",
			"v82" => "s","s82" => "S",
			"v83" => "s","s83" => "S",
			"v84" => "s","s84" => "S",
			"v85" => "s","s85" => "S"	
		);
		html::fichesbd($data);
		?>		
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
	
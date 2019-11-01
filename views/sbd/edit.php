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
//echo "<button id=\"Cleari\"  onclick=\"document.location='".URL.$data['cb1']."/".$data['mb1']."/';  \"   title=\"".$data['tb1']."\">&nbsp;<img src=\"".URL."public/images/".$data['icon1']."\" width='15' height='15' border='0' alt=''/>&nbsp;".$data['vb1']."&nbsp;</button> " ;
//echo "<button id=\"Cleari\"  onclick=\"document.location='".URL.$data['cb2']."/".$data['mb2']."/';  \"   title=\"".$data['tb2']."\">&nbsp;<img src=\"".URL."public/images/".$data['icon2']."\" width='15' height='15' border='0' alt=''/>&nbsp;".$data['vb2']."&nbsp;</button> " ;
?>
</div>
<div class="sheader1l"><p id="dashboard"><?php echo TXT_SMENUE1 ;?></p></div>

<div class="listl">
	
		
		<?php
		function verif($id,$val){if ($id == $val){return 'checked';}}
		$data = array(
			"ctrl"=> $ctrl,
			"mdl"=>"editeexamen/".$this->usercao[0]['id'],
			"IDEXAMEN"=>$this->usercao[0]['id'],
			"datee" => HTML::dateUS2FR($this->usercao[0]['DATESBD']),
			"hygiene"  =>verif($this->usercao[0]['HYGIENE'],"1"),
			"gingivite"=>verif($this->usercao[0]['GINGIVITE'],"1"),
			"aodf"     =>verif($this->usercao[0]['AODF'],"1"),
			"okrdv"    =>verif($this->usercao[0]['OKRDV'],"1"),
			"datecsbd" => HTML::dateUS2FR($this->usercao[0]['DATECSBD']),
			
			"v11" => $this->usercao[0]['d11'],"s11" => strtoupper($this->usercao[0]['d11']),
			"v12" => $this->usercao[0]['d12'],"s12" => strtoupper($this->usercao[0]['d12']),
			"v13" => $this->usercao[0]['d13'],"s13" => strtoupper($this->usercao[0]['d13']),
			"v14" => $this->usercao[0]['d14'],"s14" => strtoupper($this->usercao[0]['d14']),
			"v15" => $this->usercao[0]['d15'],"s15" => strtoupper($this->usercao[0]['d15']),
			"v16" => $this->usercao[0]['d16'],"s16" => strtoupper($this->usercao[0]['d16']),
			"v17" => $this->usercao[0]['d17'],"s17" => strtoupper($this->usercao[0]['d17']),
			"v18" => $this->usercao[0]['d18'],"s18" => strtoupper($this->usercao[0]['d18']),
			
			"v21" => $this->usercao[0]['d21'],"s21" => strtoupper($this->usercao[0]['d21']),
			"v22" => $this->usercao[0]['d22'],"s22" => strtoupper($this->usercao[0]['d22']),
			"v23" => $this->usercao[0]['d23'],"s23" => strtoupper($this->usercao[0]['d23']),
			"v24" => $this->usercao[0]['d24'],"s24" => strtoupper($this->usercao[0]['d24']),
			"v25" => $this->usercao[0]['d25'],"s25" => strtoupper($this->usercao[0]['d25']),
			"v26" => $this->usercao[0]['d26'],"s26" => strtoupper($this->usercao[0]['d26']),
			"v27" => $this->usercao[0]['d27'],"s27" => strtoupper($this->usercao[0]['d27']),
			"v28" => $this->usercao[0]['d28'],"s28" => strtoupper($this->usercao[0]['d28']),
			
			"v31" => $this->usercao[0]['d31'],"s31" => strtoupper($this->usercao[0]['d31']),
			"v32" => $this->usercao[0]['d32'],"s32" => strtoupper($this->usercao[0]['d32']),
			"v33" => $this->usercao[0]['d33'],"s33" => strtoupper($this->usercao[0]['d33']),
			"v34" => $this->usercao[0]['d34'],"s34" => strtoupper($this->usercao[0]['d34']),
			"v35" => $this->usercao[0]['d35'],"s35" => strtoupper($this->usercao[0]['d35']),
			"v36" => $this->usercao[0]['d36'],"s36" => strtoupper($this->usercao[0]['d36']),
			"v37" => $this->usercao[0]['d37'],"s37" => strtoupper($this->usercao[0]['d37']),
			"v38" => $this->usercao[0]['d38'],"s38" => strtoupper($this->usercao[0]['d38']),
			
	        "v41" => $this->usercao[0]['d41'],"s41" => strtoupper($this->usercao[0]['d41']),
			"v42" => $this->usercao[0]['d42'],"s42" => strtoupper($this->usercao[0]['d42']),
			"v43" => $this->usercao[0]['d43'],"s43" => strtoupper($this->usercao[0]['d43']),
			"v44" => $this->usercao[0]['d44'],"s44" => strtoupper($this->usercao[0]['d44']),
			"v45" => $this->usercao[0]['d45'],"s45" => strtoupper($this->usercao[0]['d45']),
			"v46" => $this->usercao[0]['d46'],"s46" => strtoupper($this->usercao[0]['d46']),
			"v47" => $this->usercao[0]['d47'],"s47" => strtoupper($this->usercao[0]['d47']),
			"v48" => $this->usercao[0]['d48'],"s48" => strtoupper($this->usercao[0]['d48']),
			
		//*****************************//
		    "v51" => $this->usercao[0]['d51'],"s51" => strtoupper($this->usercao[0]['d51']),
			"v52" => $this->usercao[0]['d52'],"s52" => strtoupper($this->usercao[0]['d52']),
			"v53" => $this->usercao[0]['d53'],"s53" => strtoupper($this->usercao[0]['d53']),
			"v54" => $this->usercao[0]['d54'],"s54" => strtoupper($this->usercao[0]['d54']),
			"v55" => $this->usercao[0]['d55'],"s55" => strtoupper($this->usercao[0]['d55']),
		   
     		"v61" => $this->usercao[0]['d61'],"s61" => strtoupper($this->usercao[0]['d61']),
			"v62" => $this->usercao[0]['d62'],"s62" => strtoupper($this->usercao[0]['d62']),
			"v63" => $this->usercao[0]['d63'],"s63" => strtoupper($this->usercao[0]['d63']),
			"v64" => $this->usercao[0]['d64'],"s64" => strtoupper($this->usercao[0]['d64']),
			"v65" => $this->usercao[0]['d65'],"s65" => strtoupper($this->usercao[0]['d65']),
			
			"v71" => $this->usercao[0]['d71'],"s71" => strtoupper($this->usercao[0]['d71']),
			"v72" => $this->usercao[0]['d72'],"s72" => strtoupper($this->usercao[0]['d72']),
			"v73" => $this->usercao[0]['d73'],"s73" => strtoupper($this->usercao[0]['d73']),
			"v74" => $this->usercao[0]['d74'],"s74" => strtoupper($this->usercao[0]['d74']),
			"v75" => $this->usercao[0]['d75'],"s75" => strtoupper($this->usercao[0]['d75']),
			
			"v81" => $this->usercao[0]['d81'],"s81" => strtoupper($this->usercao[0]['d81']),
			"v82" => $this->usercao[0]['d82'],"s82" => strtoupper($this->usercao[0]['d82']),
			"v83" => $this->usercao[0]['d83'],"s83" => strtoupper($this->usercao[0]['d83']),
			"v84" => $this->usercao[0]['d84'],"s84" => strtoupper($this->usercao[0]['d84']),
			"v85" => $this->usercao[0]['d85'],"s85" => strtoupper($this->usercao[0]['d85'])
			
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
	
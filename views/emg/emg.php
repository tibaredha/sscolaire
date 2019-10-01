<style>
#inner-grid {
  display: grid;
  grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr  ;
  grid-template-rows: 40px 40px 40px 40px 40px 40px 40px 40px;
  grid-gap: 5px;padding: 5px;
}

#s1    {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 1 / 4; grid-row: 1 / 2;}
#s1m1  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 1 / 4; grid-row: 2 / 3;}
#s1m2  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 1 / 4; grid-row: 3 / 4;}
#s1m3  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 1 / 4; grid-row: 4 / 5;}
#s1m4  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 1 / 4; grid-row: 5 / 6;}
#s1m5  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 1 / 4; grid-row: 6 / 7;}
#s1m6  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 1 / 4; grid-row: 7 / 8;}

#s2    {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 4 / 7; grid-row: 1 / 2;}
#s2m1  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 4 / 7; grid-row: 2 / 3;}
#s2m2  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 4 / 7; grid-row: 3 / 4;}
#s2m3  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 4 / 7; grid-row: 4 / 5;}
#s2m4  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 4 / 7; grid-row: 5 / 6;}
#s2m5  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 4 / 7; grid-row: 6 / 7;}
#s2m6  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 4 / 7; grid-row: 7 / 8;}

#s3    {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 7 / 10; grid-row: 1 / 2;}
#s3m1  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 7 / 10; grid-row: 2 / 3;}
#s3m2  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 7 / 10; grid-row: 3 / 4;}
#s3m3  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 7 / 10; grid-row: 4 / 5;}
#s3m4  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 7 / 10; grid-row: 5 / 6;}
#s3m5  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 7 / 10; grid-row: 6 / 7;}
#s3m6  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 7 / 10; grid-row: 7 / 8;}

#s4    {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 10 / 13; grid-row: 1 / 2;}
#s4m1  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 10 / 13; grid-row: 2 / 3;}
#s4m2  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 10 / 13; grid-row: 3 / 4;}
#s4m3  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 10 / 13; grid-row: 4 / 5;}
#s4m4  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 10 / 13; grid-row: 5 / 6;}
#s4m5  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 10 / 13; grid-row: 6 / 7;}
#s4m6  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 10 / 13; grid-row: 7 / 8;}

#s5    {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 13 / 16; grid-row: 1 / 2;}
#s5m1  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 13 / 16; grid-row: 2 / 3;}
#s5m2  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 13 / 16; grid-row: 3 / 4;}
#s5m3  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 13 / 16; grid-row: 4 / 5;}
#s5m4  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 13 / 16; grid-row: 5 / 6;}
#s5m5  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 13 / 16; grid-row: 6 / 7;}
#s5m6  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 13 / 16; grid-row: 7 / 8;}

#s6    {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 16 / 19; grid-row: 1 / 2;}
#s6m1  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 16 / 19; grid-row: 2 / 3;}
#s6m2  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 16 / 19; grid-row: 3 / 4;}
#s6m3  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 16 / 19; grid-row: 4 / 5;}
#s6m4  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 16 / 19; grid-row: 5 / 6;}
#s6m5  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 16 / 19; grid-row: 6 / 7;}
#s6m6  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 16 / 19; grid-row: 7 / 8;}

.remember{ width: 10%;height: 70%; }

#x{background: salmon;text-align: right;  border-radius: 5px;padding: 8px;grid-column: 1  / 4;   grid-row: 7 / 8;}
.DATESBD{background: yellow; text-align: center; border-radius: 5px;width:50%;height: 100%;}
#x3 {background: salmon;text-align: center; border-radius: 5px;padding: 8px;grid-column: 4 / 7;  grid-row: 7 / 8;}
#y3 {background: salmon;text-align: center; border-radius: 5px;padding: 8px;grid-column: 7 / 10; grid-row: 7 / 8;}

#l {background: salmon;text-align: center;border-radius: 5px;padding: 5px;grid-column: 16  / 19;  grid-row: 6 / 8;}
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
	<form action="<?php echo URL.'dashboard/createemg';?>" method="post">			
		<div class="tabbed_area">  
			<ul class="tabs">  
				<li><a href="javascript:tabSwitch('tab_1', 'content_1');" id="tab_1" class="active">1er partie</a></li>  
				<li><a href="javascript:tabSwitch('tab_2', 'content_2');" id="tab_2">2em partie</a></li> 
				<li><a href="javascript:tabSwitch('tab_3', 'content_3');" id="tab_3">3em partie</a></li> 	
				<li><a href="javascript:tabSwitch('tab_4', 'content_4');" id="tab_4">4em partie </a></li> 	
			</ul>    	 
		
				<?php
				echo '<div id="content_1" class="contenttabs1"><div id="inner-grid">' ;
				echo '<div id="s1">01 - CARDIO </div>' ;
				echo '<div id="s1m1"><input type="checkbox"  class="remember"  name="m1"   value="1" />&nbsp;<a href="'.URL.'dashboard/trt/'.$this->user[0]['id'].'/1'.'">HTA</a> </div>' ;
				echo '<div id="s1m2"><input type="checkbox"  class="remember"  name="m2"   value="1" />&nbsp;<a href="'.URL.'dashboard/trt/'.$this->user[0]['id'].'/2'.'">Souffle</a> </div>' ;
				echo '<div id="s1m3"><input type="checkbox"  class="remember"  name="m3"   value="1" />&nbsp;<a href="'.URL.'dashboard/trt/'.$this->user[0]['id'].'/3'.'">Tr .du rythme</a> </div>' ;
				echo '<div id="s1m4"><input type="checkbox"  class="remember"  name="m4"   value="1" />&nbsp;<a href="'.URL.'dashboard/trt/'.$this->user[0]['id'].'/4'.'">RAA</a> </div>' ;
				echo '<div id="s1m5"><input type="checkbox"  class="remember"  name="m5"   value="1" />&nbsp;<a href="'.URL.'dashboard/trt/'.$this->user[0]['id'].'/5'.'">Cardiopathie</a> </div>' ;
				echo '<div id="s1m6"><input type="checkbox"  class="remember"  name="m6"   value="1" />&nbsp;<a href="'.URL.'dashboard/trt/'.$this->user[0]['id'].'/6'.'">Autres</a> </div>' ;
				echo '<div id="s2">02 - DERMATO </div>' ;
				echo '<div id="s2m1"><input type="checkbox"  class="remember"  name="m7"   value="1" />&nbsp;<a href="'.URL.'dashboard/trt/'.$this->user[0]['id'].'/7'.'">Dermatite atopique</a> </div>' ;
				echo '<div id="s2m2"><input type="checkbox"  class="remember"  name="m8"   value="1" />&nbsp;<a href="'.URL.'dashboard/trt/'.$this->user[0]['id'].'/8'.'">Gale</a> </div>' ;
				echo '<div id="s2m3"><input type="checkbox"  class="remember"  name="m9"   value="1" />&nbsp;<a href="'.URL.'dashboard/trt/'.$this->user[0]['id'].'/9'.'">Pédiculose</a> </div>' ;
				echo '<div id="s2m4"><input type="checkbox"  class="remember"  name="m10"   value="1" />&nbsp;<a href="'.URL.'dashboard/trt/'.$this->user[0]['id'].'/10'.'">Psoriasis</a> </div>' ;
				echo '<div id="s2m5"><input type="checkbox"  class="remember"  name="m11"   value="1" />&nbsp;<a href="'.URL.'dashboard/trt/'.$this->user[0]['id'].'/11'.'">Teigne</a> </div>' ;
				echo '<div id="s2m6"><input type="checkbox"  class="remember"  name="m12"   value="1" />&nbsp;<a href="'.URL.'dashboard/trt/'.$this->user[0]['id'].'/12'.'">Autres</a> </div>' ;
				echo '<div id="s3">03 - ENDOCRINO </div>' ;
				echo '<div id="s3m1"><input type="checkbox"  class="remember"  name="m13"   value="1" />&nbsp;<a href="'.URL.'dashboard/trt/'.$this->user[0]['id'].'/13'.'">Obésité</a> </div>' ;
				echo '<div id="s3m2"><input type="checkbox"  class="remember"  name="m14"   value="1" />&nbsp;<a href="'.URL.'dashboard/trt/'.$this->user[0]['id'].'/14'.'">Retard stat. Pond</a> </div>' ;
				echo '<div id="s3m3"><input type="checkbox"  class="remember"  name="m15"   value="1" />&nbsp;<a href="'.URL.'dashboard/trt/'.$this->user[0]['id'].'/15'.'">Surpoid</a> </div>' ;
				echo '<div id="s3m4"><input type="checkbox"  class="remember"  name="m16"   value="1" />&nbsp;<a href="'.URL.'dashboard/trt/'.$this->user[0]['id'].'/16'.'">Diabète</a> </div>' ;
				echo '<div id="s3m5"><input type="checkbox"  class="remember"  name="m17"   value="1" />&nbsp;<a href="'.URL.'dashboard/trt/'.$this->user[0]['id'].'/17'.'">Goitre</a> </div>' ;
				echo '<div id="s3m6"><input type="checkbox"  class="remember"  name="m18"   value="1" />&nbsp;<a href="'.URL.'dashboard/trt/'.$this->user[0]['id'].'/18'.'">Autres</a> </div>' ;
				echo '<div id="s4">04 - GASTRO </div>' ;
				echo '<div id="s4m1"><input type="checkbox"  class="remember"  name="m19"   value="1" />&nbsp;<a href="'.URL.'dashboard/trt/'.$this->user[0]['id'].'/19'.'">Oxyurose</a> </div>' ;
				echo '<div id="s4m2"><input type="checkbox"  class="remember"  name="m20"   value="1" />&nbsp;<a href="'.URL.'dashboard/trt/'.$this->user[0]['id'].'/20'.'">Les hernies </a> </div>' ;
				echo '<div id="s4m3"><input type="checkbox"  class="remember"  name="m21"   value="1" />&nbsp;<a href="'.URL.'dashboard/trt/'.$this->user[0]['id'].'/21'.'">Maladie coeliaque</a> </div>' ;
				echo '<div id="s4m4"><input type="checkbox"  class="remember"  name="m22"   value="1" />&nbsp;<a href="'.URL.'dashboard/trt/'.$this->user[0]['id'].'/22'.'">Autres</a> </div>' ;
				echo '<div id="s5">05 - HEMATO </div>' ;
				echo '<div id="s5m1"><input type="checkbox"  class="remember"  name="m23"   value="1" />&nbsp;<a href="'.URL.'dashboard/trt/'.$this->user[0]['id'].'/23'.'">Paleur cut. muque</a> </div>' ;
				echo '<div id="s5m2"><input type="checkbox"  class="remember"  name="m24"   value="1" />&nbsp;<a href="'.URL.'dashboard/trt/'.$this->user[0]['id'].'/24'.'">Anémie </a> </div>' ;
				echo '<div id="s5m3"><input type="checkbox"  class="remember"  name="m25"   value="1" />&nbsp;<a href="'.URL.'dashboard/trt/'.$this->user[0]['id'].'/25'.'">Hémophilie</a> </div>' ;
				echo '<div id="s5m4"><input type="checkbox"  class="remember"  name="m26"   value="1" />&nbsp;<a href="'.URL.'dashboard/trt/'.$this->user[0]['id'].'/26'.'">Autres</a> </div>' ;
				echo '<div id="s6">06 - OPHTALMO </div>' ;
				echo '<div id="s6m1"><input type="checkbox"  class="remember"  name="m27"   value="1" />&nbsp;<a href="'.URL.'dashboard/trt/'.$this->user[0]['id'].'/27'.'">Baisse acuité vis.</a> </div>' ;
				echo '<div id="s6m2"><input type="checkbox"  class="remember"  name="m28"   value="1" />&nbsp;<a href="'.URL.'dashboard/trt/'.$this->user[0]['id'].'/28'.'">Nystagmus</a> </div>' ;
				echo '<div id="s6m3"><input type="checkbox"  class="remember"  name="m29"   value="1" />&nbsp;<a href="'.URL.'dashboard/trt/'.$this->user[0]['id'].'/29'.'">Ptosis</a> </div>' ;
				echo '<div id="s6m4"><input type="checkbox"  class="remember"  name="m30"   value="1" />&nbsp;<a href="'.URL.'dashboard/trt/'.$this->user[0]['id'].'/30'.'">Strabisme</a> </div>' ;
				echo '<div id="s6m5"><input type="checkbox"  class="remember"  name="m31"   value="1" />&nbsp;<a href="'.URL.'dashboard/trt/'.$this->user[0]['id'].'/31'.'">Trachome</a> </div>' ;
				echo '<div id="s6m6"><input type="checkbox"  class="remember"  name="m32"   value="1" />&nbsp;<a href="'.URL.'dashboard/trt/'.$this->user[0]['id'].'/32'.'">Autres</a> </div>' ;
				echo '</div></div>';
				echo '<div id="content_2" class="contenttabs2"><div id="inner-grid">';
				echo '<div id="s1">07 - ORL</div>' ;
				echo '<div id="s1m1"><input type="checkbox"  class="remember"  name="m33"   value="1" />&nbsp;<a href="'.URL.'dashboard/trt/'.$this->user[0]['id'].'/33'.'">Hypoacousie</a> </div>' ;
				echo '<div id="s1m2"><input type="checkbox"  class="remember"  name="m34"   value="1" />&nbsp;<a href="'.URL.'dashboard/trt/'.$this->user[0]['id'].'/34'.'">Rhinite allergique</a> </div>' ;
				echo '<div id="s1m3"><input type="checkbox"  class="remember"  name="m35"   value="1" />&nbsp;<a href="'.URL.'dashboard/trt/'.$this->user[0]['id'].'/35'.'">Surdité</a> </div>' ;
				echo '<div id="s1m4"><input type="checkbox"  class="remember"  name="m36"   value="1" />&nbsp;<a href="'.URL.'dashboard/trt/'.$this->user[0]['id'].'/36'.'">Otites chroniques</a> </div>' ;
				echo '<div id="s1m5"><input type="checkbox"  class="remember"  name="m37"   value="1" />&nbsp;<a href="'.URL.'dashboard/trt/'.$this->user[0]['id'].'/37'.'">Autres</a> </div>' ;
				echo '<div id="s2">08 - ORTHOPEDIE</div>' ;
				echo '<div id="s2m1"><input type="checkbox"  class="remember"  name="m38"   value="1" />&nbsp;<a href="'.URL.'dashboard/trt/'.$this->user[0]['id'].'/38'.'">Cypho-scoliose</a> </div>' ;
				echo '<div id="s2m2"><input type="checkbox"  class="remember"  name="m39"   value="1" />&nbsp;<a href="'.URL.'dashboard/trt/'.$this->user[0]['id'].'/39'.'">Déform.squel. </a> </div>' ;
				echo '<div id="s2m3"><input type="checkbox"  class="remember"  name="m40"   value="1" />&nbsp;<a href="'.URL.'dashboard/trt/'.$this->user[0]['id'].'/40'.'">Scoliose </a> </div>' ;
				echo '<div id="s2m4"><input type="checkbox"  class="remember"  name="m41"   value="1" />&nbsp;<a href="'.URL.'dashboard/trt/'.$this->user[0]['id'].'/41'.'">Autres</a> </div>' ;
				echo '<div id="s3">09 - PNEUMO</div>' ;
				echo '<div id="s3m1"><input type="checkbox"  class="remember"  name="m42"   value="1" />&nbsp;<a href="'.URL.'dashboard/trt/'.$this->user[0]['id'].'/42'.'">Asthme</a> </div>' ;
				echo '<div id="s3m2"><input type="checkbox"  class="remember"  name="m43"   value="1" />&nbsp;<a href="'.URL.'dashboard/trt/'.$this->user[0]['id'].'/43'.'">Tuberculose pulm</a> </div>' ;
				echo '<div id="s3m3"><input type="checkbox"  class="remember"  name="m44"   value="1" />&nbsp;<a href="'.URL.'dashboard/trt/'.$this->user[0]['id'].'/44'.'">Tub.Extra-pulm.</a> </div>' ;
				echo '<div id="s3m4"><input type="checkbox"  class="remember"  name="m45"   value="1" />&nbsp;<a href="'.URL.'dashboard/trt/'.$this->user[0]['id'].'/45'.'">Autres</a> </div>' ;
				echo '<div id="s4">10 - NEURO-PSYCHYA </div>' ;
				echo '<div id="s4m1"><input type="checkbox"  class="remember"  name="m46"   value="1" />&nbsp;<a href="'.URL.'dashboard/trt/'.$this->user[0]['id'].'/46'.'">Diffucultés scolaires</a> </div>' ;
				echo '<div id="s4m2"><input type="checkbox"  class="remember"  name="m47"   value="1" />&nbsp;<a href="'.URL.'dashboard/trt/'.$this->user[0]['id'].'/47'.'">Tr.du comport.</a> </div>' ;
				echo '<div id="s4m3"><input type="checkbox"  class="remember"  name="m48"   value="1" />&nbsp;<a href="'.URL.'dashboard/trt/'.$this->user[0]['id'].'/48'.'">Tr. Du langage</a> </div>' ;
				echo '<div id="s4m4"><input type="checkbox"  class="remember"  name="m49"   value="1" />&nbsp;<a href="'.URL.'dashboard/trt/'.$this->user[0]['id'].'/49'.'">Autres</a> </div>' ;
				echo '<div id="s5">11- URO - NEPHRO</div>' ;
				echo '<div id="s5m1"><input type="checkbox"  class="remember"  name="m50"   value="1" />&nbsp;<a href="'.URL.'dashboard/trt/'.$this->user[0]['id'].'/50'.'">Cryptorchidie</a> </div>' ;
				echo '<div id="s5m2"><input type="checkbox"  class="remember"  name="m51"   value="1" />&nbsp;<a href="'.URL.'dashboard/trt/'.$this->user[0]['id'].'/51'.'">Enurésie</a> </div>' ;
				echo '<div id="s5m3"><input type="checkbox"  class="remember"  name="m52"   value="1" />&nbsp;<a href="'.URL.'dashboard/trt/'.$this->user[0]['id'].'/52'.'">Tr.urinaires</a> </div>' ;
				echo '<div id="s5m4"><input type="checkbox"  class="remember"  name="m53"   value="1" />&nbsp;<a href="'.URL.'dashboard/trt/'.$this->user[0]['id'].'/53'.'">Autres</a> </div>' ;
				echo '<div id="s6">12 - AUTRES </div>' ;
				echo '<div id="s6m1"><input type="checkbox"  class="remember"  name="m54"   value="1" />&nbsp;<a href="'.URL.'dashboard/trt/'.$this->user[0]['id'].'/54'.'">Autres</a> </div>' ;
				echo '<div id="x">Vue le  : <input class="DATESBD"   type="txt"  name="DATESBD"   value="'.date('d-m-Y').'"  /> </div>' ;
				echo '<div id="x3"> <input type="checkbox"  title="Cocher pour activer le RDV" id="YOURBOX"  class="remember"  name="OKRDV"     value="1"  />&nbsp;Convocation  </div>' ;
				echo '<div id="y3">Le : <input type="txt"   title="Date rdv RDV"               id="DATECSBD" class="DATESBD"   name="DATECSBD"   value=""  /> </div>' ;
				echo '<div id="l"><input id="l1" onclick="playSound()"  type="submit" value="Envoyer"/> </div>';
				echo '<div ><input type="hidden" name="IDELEVE"  value="'.$this->user[0]['id'].'"/> </div>';
				echo '<div ><input type="hidden" name="NIVEAUS"  value="'.$this->user[0]['PALIER'].'"/> </div>';
				echo '<div ><input type="hidden" name="ETABLIS"  value="'.$this->user[0]['ECOLE'].'"/> </div>';
				echo '<div ><input type="hidden" name="UDS"      value="'.$this->user[0]['UDS'].'"/> </div>';
				echo '<div ><input type="hidden" name="STRUCTURE"value="'.$this->user[0]['STRUCTURE'].'"/> </div>';
				echo '</div></div>' ;
				echo '<div id="content_3" class="contenttabs3"><div id="inner-grid"></div></div>' ;
				echo '<div id="content_4" class="contenttabs4"><div id="inner-grid">' ;
				echo '</div></div>' ;
				?>
	
				

				
				
				
			
			
			

				
			
		
		</div>
		
	</form>
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
	
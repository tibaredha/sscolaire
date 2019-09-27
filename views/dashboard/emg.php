<style>
#inner-grid {
  display: grid;padding: 8px;
  grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr  ;
  grid-template-rows: 45px 45px 45px 45px 45px 45px 45px;
  grid-gap: 5px;
}
#DATESBD{background: yellow; text-align: center; border-radius: 5px;width:50%;height: 100%;}
#DATECSBD{ text-align: center; border-radius: 5px;width:50%;height: 100%;}
#x  {background: salmon;text-align: right;  border-radius: 5px;padding: 8px;grid-column: 2  / 6;   grid-row: 1 / 2;}



#m0  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 2 / 6; grid-row: 2 / 3;}
#m1  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 2 / 6; grid-row: 3 / 4;}
#m2  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 2 / 6; grid-row: 4 / 5;}
#m3  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 2 / 6; grid-row: 5 / 6;}
#m4  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 2 / 6; grid-row: 6 / 7;}
#m5  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 2 / 6; grid-row: 7 / 8;}

#m6  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 6 / 10; grid-row: 1 / 2;}
#m7  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 6 / 10; grid-row: 2 / 3;}
#m8  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 6 / 10; grid-row: 3 / 4;}
#m9  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 6 / 10; grid-row: 4 / 5;}
#m10  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 6 / 10; grid-row: 5 / 6;}
#m11  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 6 / 10; grid-row: 6 / 7;}
#m12  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 6 / 10; grid-row: 7 / 8;}

#m13  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 10 / 14; grid-row: 1 / 2;}
#m14  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 10 / 14; grid-row: 2 / 3;}
#m15  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 10 / 14; grid-row: 3 / 4;}
#m16  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 10 / 14; grid-row: 4 / 5;}
#m17  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 10 / 14; grid-row: 5 / 6;}
#m18  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 10 / 14; grid-row: 6 / 7;}

#m19  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 14 / 18; grid-row: 1 / 2;}
#m20  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 14 / 18; grid-row: 2 / 3;}
#m21  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 14 / 18; grid-row: 3 / 4;}
#m22  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 14 / 18; grid-row: 4 / 5;}
#m23  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 14 / 18; grid-row: 5 / 6;}
#m24  {background: #FFE4E1;text-align: left; border-radius: 5px;padding: 8px;grid-column: 14 / 18; grid-row: 6 / 7;}

#x3 {background: salmon;text-align: center; border-radius: 5px;padding: 8px;grid-column: 10 / 14;  grid-row: 7 / 8;}#y3 {background: salmon;text-align: center; border-radius: 5px;padding: 8px;grid-column: 14 / 18; grid-row: 7 / 8;}






.ax {background: yellow; text-align: center; border-radius: 5px;width:11%;height: 100%;}.bx {background: white;  text-align: center; border-radius: 5px;width:11%;height: 100%;}

#a {background: salmon;text-align: center; border-radius: 5px;padding: 8px;grid-column: 2  / 6;  grid-row: 3 / 4;}#b {background: salmon;text-align: center; border-radius: 5px;padding: 8px;grid-column: 6  / 10;  grid-row: 3 / 4;}

 
.remember{background: #00cc00; text-align: center;border-radius: 5px;width: 10%;height: 70%; color: white;}

#l {background: salmon;text-align: center;border-radius: 5px;padding: 8px;grid-column: 2  / 18;  grid-row: 8 / 9;}
#l1 {background: #00cc00; text-align: center;border-radius: 5px;width: 100%;height: 100%; color: white;}
#l1:hover {background: red;color: #fff;}
</style>


<div class="sheader1r"><p id="llogin"><?php html::NAV();?></p></div>
<div class="sheader2l">Examen médicale de l'élève : <?php echo $this->user[0]['NOM'].'_'.$this->user[0]['PRENOM'].' ('.$this->user[0]['FILSDE'].')';?> </div>
<div class="sheader2r">b</div>
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
			echo '<div id="content_1" class="contenttabs1">  ';
			
			?>
				<div id="inner-grid">
			
				<div id="x">Date examen : <input id="DATESBD"   type="txt"  name="DATESBD"   value="<?php echo date('d-m-Y');?>"  /> </div>
				<div id="m0"><input type="checkbox"  class="remember"  name="m0"   value="1" />&nbsp;<a href="<?php echo URL ;?>">1-Vaccination incomplète</a> </div>			
				<div id="m1"><input type="checkbox"  class="remember"  name="m1"   value="1" />&nbsp;<a href="<?php echo URL ;?>">2-Absence cicatrice BCG</a> </div>			
				<div id="m2"><input type="checkbox"  class="remember"  name="m2"   value="1" />&nbsp;<a href="<?php echo URL ;?>">3-Pédiculose</a> </div>			
				<div id="m3"><input type="checkbox"  class="remember"  name="m3"   value="1" />&nbsp;<a href="<?php echo URL ;?>">4-Gale</a> </div>			
				<div id="m4"><input type="checkbox"  class="remember"  name="m4"   value="1" />&nbsp;<a href="<?php echo URL ;?>">5-Déformation des Mbres</a> </div>			
				<div id="m5"><input type="checkbox"  class="remember"  name="m5"   value="1" />&nbsp;<a href="<?php echo URL ;?>">6-Baisse acuité visuelle</a> </div>			
				
				<div id="m6"><input type="checkbox"  class="remember"  name="m6"   value="1" />&nbsp;<a href="<?php echo URL ;?>">7-Strabisme</a> </div>			
				<div id="m7"><input type="checkbox"  class="remember"  name="m7"   value="1" />&nbsp;<a href="<?php echo URL ;?>">8-Antécédents de RAA</a> </div>		
				<div id="m8"><input type="checkbox"  class="remember"  name="m8"   value="1" />&nbsp;<a href="<?php echo URL ;?>">9-Diabète</a> </div>			
				<div id="m9"><input type="checkbox"  class="remember"  name="m9"   value="1" />&nbsp;<a href="<?php echo URL ;?>">10Asthme</a> </div>			
				<div id="m10"><input type="checkbox"  class="remember"  name="m10"   value="1" />&nbsp;<a href="<?php echo URL ;?>">11-Epilepsie</a> </div>			
				<div id="m11"><input type="checkbox"  class="remember"  name="m11"   value="1" />&nbsp;<a href="<?php echo URL ;?>">12-Difficultés scolaires</a> </div>			
				<div id="m12"><input type="checkbox"  class="remember"  name="m12"   value="1" />&nbsp;<a href="<?php echo URL ;?>">13-Troubles comportement</a> </div>			
				
				
				
				<div id="m13"><input type="checkbox"  class="remember"  name="m13"   value="1" />&nbsp;<a href="<?php echo URL ;?>">14-Troubles langage</a> </div>	
				<div id="m14"><input type="checkbox"  class="remember"  name="m14"   value="1" />&nbsp;<a href="<?php echo URL ;?>">15-Surdité Hypoacousie</a> </div>			
				<div id="m15"><input type="checkbox"  class="remember"  name="m15"   value="1" />&nbsp;<a href="<?php echo URL ;?>">16-Trachome</a> </div>			
				<div id="m16"><input type="checkbox"  class="remember"  name="m16"   value="1" />&nbsp;<a href="<?php echo URL ;?>">17-Oxyurose</a> </div>			
				<div id="m17"><input type="checkbox"  class="remember"  name="m17"   value="1" />&nbsp;<a href="<?php echo URL ;?>">18-Enurésie</a> </div>			
				<div id="m18"><input type="checkbox"  class="remember"  name="m18"   value="1" />&nbsp;<a href="<?php echo URL ;?>">19-Troubles urinaires</a> </div>			
				
				<div id="m19"><input type="checkbox"  class="remember"  name="m19"   value="1" />&nbsp;<a href="<?php echo URL ;?>">20-Ptosis Nystagmus	</a> </div>	
				<div id="m20"><input type="checkbox"  class="remember"  name="m20"   value="1" />&nbsp;<a href="<?php echo URL ;?>">21-Paleur conjonctivale</a> </div>			
				<div id="m21"><input type="checkbox"  class="remember"  name="m21"   value="1" />&nbsp;<a href="<?php echo URL ;?>">22-Goitre</a> </div>			
				<div id="m22"><input type="checkbox"  class="remember"  name="m22"   value="1" />&nbsp;<a href="<?php echo URL ;?>">23-Souffle cardiaque</a> </div>			
				<div id="m23"><input type="checkbox"  class="remember"  name="m23"   value="1" />&nbsp;<a href="<?php echo URL ;?>">24-Déformations du rachis</a> </div>			
				<div id="m24"><input type="checkbox"  class="remember"  name="m24"   value="1" />&nbsp;<a href="<?php echo URL ;?>">25-Ectopie testiculaire</a> </div>			
				
				<div id="x3">     <input type="checkbox" title="Cocher pour activer le RDV" id="YOURBOX"  class="remember"  name="OKRDV"     value="1"  />&nbsp;Convocation  </div>
				<div id="y3">Le : <input type="txt"      title="Date rdv RDV"               id="DATECSBD"                   name="DATECSBD"   value=""  /> </div>
				
				<div id="l"><input id="l1" onclick="playSound()"  type="submit" value="Envoyer"/> </div>
				<div ><input type="hidden" name="IDELEVE"  value="<?php echo $this->user[0]['id'];?>"/> </div>
				<div ><input type="hidden" name="NIVEAUS"  value="<?php echo $this->user[0]['PALIER'];?>"/> </div>
				<div ><input type="hidden" name="ETABLIS"  value="<?php echo $this->user[0]['ECOLE'];?>"/> </div>
				<div ><input type="hidden" name="UDS"      value="<?php echo $this->user[0]['UDS'];?>"/> </div>
				<div ><input type="hidden" name="STRUCTURE"value="<?php echo $this->user[0]['STRUCTURE'];?>"/> </div>
				</div>
			
			
			
			
			<?php
			echo '</div>';
			echo '<div id="content_2" class="contenttabs2">';echo '</div>';
			echo '<div id="content_3" class="contenttabs3">';echo '</div>';
			echo '<div id="content_4" class="contenttabs4"> ';echo '</div>';
			// $commune1=HTML::nbrtostring('structure','id',Session::get('structure'),'numcom');
	        // $commune2=HTML::nbrtostring('structure','id',Session::get('structure'),'com');
			// $wilayad1=Session::get('wilaya');
			// $wilayad2=HTML::nbrtostring('wil','IDWIL',Session::get('wilaya'),'WILAYAS');
			// $data = array(
			// "DINS"           => date('d-m-Y'), 
			// "HINS"           => date('H:m'), 
			// "NOM"            => '', 
			// "PRENOM"         => '', 
			// "FILSDE"         => '', 
			// "ETDE"           => '',
			// "SEXE"           => array("M"=>"M","F"=>"F"),
			// "DATENS"         => date('d-m-Y'),
			// "WILAYAN1"       => $wilayad1, 
			// "WILAYAN2"       => $wilayad2, 
			// "COMMUNEN1"      => $commune1,
			// "COMMUNEN2"      => $commune2, 
			// "WILAYAR1"       => $wilayad1, 
			// "WILAYAR2"       => $wilayad2, 
			// "COMMUNER1"      => $commune1,
			// "COMMUNER2"      => $commune2,
			// "ADRESSE"        => '', 
			// "GABO"           => array("AP"=>"AP","AN"=>"AN","BP"=>"BP","BN"=>"BN","ABP"=>"ABP","ABN"=>"ABN","OP"=>"OP","ON"=>"ON"),
			// "ECOLE1"         => '1', 
			// "ECOLE2"         => 'ECOLE', 
			// "PALIER1"        => '1', 
			// "PALIER2"        => 'PALIER', 
			// "NEC"            => '', 
			// "code_patient"   => '',
			// "NOMAR"          => '',
			// "PRENOMAR"       => '',
			// "FILSDEAR"       => '',
			// "ETDEAR"         => '',
			// "ADRESSEAR"      => ''
			// );
			// HTML::tabs($data);
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
	
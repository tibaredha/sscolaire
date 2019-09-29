<style>
#inner-grid {
  display: grid;padding: 8px;
  grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr;
  grid-template-rows: 30px 30px 30px 30px 30px 30px 30px 30px 30px 30px 30px;
  grid-gap: 5px;
}
#DATESBD{background: yellow; text-align: center; border-radius: 5px;width:90%;height: 100%;}
.observation{background: yellow; text-align: center; border-radius: 5px;width:90%;height: 100%;}

#x1   {background: green; color: white;text-align: center;  border-radius: 5px;padding: 0px;grid-column: 2  / 4;   grid-row: 1 / 2;}
#x2   {background:green; color: white;text-align: center;  border-radius: 5px;padding: 0px;grid-column: 2  / 4;   grid-row: 2 / 3;}
#x3   {background:green; color: white;text-align: center;  border-radius: 5px;padding: 0px;grid-column: 2  / 4;   grid-row: 3 / 4;}
#x4   {background:green; color: white;text-align: center; border-radius: 5px;padding: 0px;grid-column: 2  / 4;   grid-row: 4 / 5;}
#x5   {background:green; color: white;text-align: center; border-radius: 5px;padding: 0px;grid-column: 2  / 4;   grid-row: 5 / 6;}
#x6   {background:green; color: white;text-align: center; border-radius: 5px;padding: 0px;grid-column: 2  / 4;   grid-row: 6 / 7;}
#x7   {background:green; color: white;text-align: center; border-radius: 5px;padding: 0px;grid-column: 2  / 4;   grid-row: 7 / 8;}
#x8   {background:green; color: white;text-align: center; border-radius: 5px;padding: 0px;grid-column: 2  / 4;   grid-row: 8 / 9;}
#x9   {background:green; color: white;text-align: center; border-radius: 5px;padding: 0px;grid-column: 2  / 4;   grid-row: 9 / 10;}
#x10  {background:green; color: white;text-align: center; border-radius: 5px;padding: 0px;grid-column: 2  / 4;   grid-row: 10 / 11;}
#x11  {background:green; color: white;text-align: center; border-radius: 5px;padding: 0px;grid-column: 2  / 4;   grid-row: 11 / 12;}

#x1a   {background: lightblue;color: white;text-align: center;  border-radius: 5px;padding: 0px;grid-column: 4  / 6;   grid-row: 1 / 2;}
#x2a   {background: lightblue;color: white;text-align: center;  border-radius: 5px;padding: 0px;grid-column: 4  / 6;   grid-row: 2 / 3;}
#x3a   {background: lightblue;color: white;text-align: center;  border-radius: 5px;padding: 0px;grid-column: 4  / 6;   grid-row: 3 / 4;}
#x4a   {background: lightblue;color: white;text-align: center;  border-radius: 5px;padding: 0px;grid-column: 4  / 6;   grid-row: 4 / 5;}
#x5a   {background: lightblue;color: white;text-align: center;  border-radius: 5px;padding: 0px;grid-column: 4  / 6;   grid-row: 5 / 6;}
#x6a   {background: lightblue;color: white;text-align: center;  border-radius: 5px;padding: 0px;grid-column: 4  / 6;   grid-row: 6 / 7;}
#x7a   {background: lightblue;color: white;text-align: center;  border-radius: 5px;padding: 0px;grid-column: 4  / 6;   grid-row: 7 / 8;}
#x8a   {background: lightblue;color: white;text-align: center;  border-radius: 5px;padding: 0px;grid-column: 4  / 6;   grid-row: 8 / 9;}
#x9a   {background: lightblue;color: white;text-align: center;  border-radius: 5px;padding: 0px;grid-column: 4  / 6;   grid-row: 9 / 10;}
#x10a  {background: lightblue;color: white;text-align: center;  border-radius: 5px;padding: 0px;grid-column: 4  / 6;   grid-row: 10 / 11;}
#x11a  {background: lightblue;color: white;text-align: center;  border-radius: 5px;padding: 0px;grid-column: 4  / 6;   grid-row: 11 / 12;}

#x1b   {background: green; color: white;text-align: center;  border-radius: 5px;padding: 0px;grid-column: 6 / 8;   grid-row: 1 / 2;}
#x2b   {background: green; color: white;text-align: center;  border-radius: 5px;padding: 0px;grid-column: 6  / 8;   grid-row: 2 / 3;}
#x3b   {background: green; color: white;text-align: center;  border-radius: 5px;padding: 0px;grid-column: 6  / 8;   grid-row: 3 / 4;}
#x4b   {background: green; color: white;text-align: center;  border-radius: 5px;padding: 0px;grid-column: 6  / 8;   grid-row: 4 / 5;}
#x5b   {background: green; color: white;text-align: center;  border-radius: 5px;padding: 0px;grid-column: 6  / 8;   grid-row: 5 / 6;}
#x6b   {background: green; color: white;text-align: center;  border-radius: 5px;padding: 0px;grid-column: 6  / 8;   grid-row: 6 / 7;}
#x7b   {background: green; color: white;text-align: center;  border-radius: 5px;padding: 0px;grid-column: 6  / 8;   grid-row: 7 / 8;}
#x8b   {background: green; color: white;text-align: center;  border-radius: 5px;padding: 0px;grid-column: 6  / 8;   grid-row: 8 / 9;}
#x9b   {background: green; color: white;text-align: center;  border-radius: 5px;padding: 0px;grid-column: 6  / 8;   grid-row: 9 / 10;}
#x10b   {background: green; color: white;text-align: center;  border-radius: 5px;padding: 0px;grid-column: 6  / 8;   grid-row: 10 / 11;}
#x11b   {background: green; color: white;text-align: center;  border-radius: 5px;padding: 0px;grid-column: 6  / 8;   grid-row: 11 / 12;}

#x1c   {background: green; color: white;text-align: center;  border-radius: 5px;padding: 0px;grid-column: 8  / 10;   grid-row: 1 / 2;}
#x2c   {background: green; color: white;text-align: center;  border-radius: 5px;padding: 0px;grid-column: 8  / 10;   grid-row: 2 / 3;}
#x3c   {background: green; color: white;text-align: center;  border-radius: 5px;padding: 0px;grid-column: 8  / 10;   grid-row: 3 / 4;}
#x4c   {background: green; color: white;text-align: center;  border-radius: 5px;padding: 0px;grid-column: 8  / 10;   grid-row: 4 / 5;}
#x5c   {background: green; color: white;text-align: center;  border-radius: 5px;padding: 0px;grid-column: 8  / 10;   grid-row: 5 / 6;}
#x6c   {background: green; color: white;text-align: center;  border-radius: 5px;padding: 0px;grid-column: 8  / 10;   grid-row: 6 / 7;}
#x7c   {background: green; color: white;text-align: center;  border-radius: 5px;padding: 0px;grid-column: 8  / 10;   grid-row: 7 / 8;}
#x8c   {background: green; color: white;text-align: center;  border-radius: 5px;padding: 0px;grid-column: 8  / 10;   grid-row: 8 / 9;}
#x9c   {background: green; color: white;text-align: center;  border-radius: 5px;padding: 0px;grid-column: 8  / 10;   grid-row: 9 / 10;}
#x10c   {background: green; color: white;text-align: center;  border-radius: 5px;padding: 0px;grid-column: 8  / 10;   grid-row: 10 / 11;}
#x11c   {background: green; color: white;text-align: center;  border-radius: 5px;padding: 0px;grid-column: 8  / 10;   grid-row: 11 / 12;}

#x1d   {background: green; color: white;text-align: center;  border-radius: 5px;padding: 0px;grid-column: 10  / 12;   grid-row: 1 / 2;}
#x2d   {background: green; color: white;text-align: center;  border-radius: 5px;padding: 0px;grid-column: 10  / 12;   grid-row: 2 / 3;}
#x3d   {background: green; color: white;text-align: center;  border-radius: 5px;padding: 0px;grid-column: 10  / 12;   grid-row: 3 / 4;}
#x4d   {background: green; color: white;text-align: center;  border-radius: 5px;padding: 0px;grid-column: 10  / 12;   grid-row: 4 / 5;}
#x5d   {background: green; color: white;text-align: center;  border-radius: 5px;padding: 0px;grid-column: 10  / 12;   grid-row: 5 / 6;}
#x6d   {background: green; color: white;text-align: center;  border-radius: 5px;padding: 0px;grid-column: 10  / 12;   grid-row: 6 / 7;}
#x7d   {background: green; color: white;text-align: center;  border-radius: 5px;padding: 0px;grid-column: 10  / 12;   grid-row: 7 / 8;}
#x8d   {background: green; color: white;text-align: center;  border-radius: 5px;padding: 0px;grid-column: 10  / 12;   grid-row: 8 / 9;}
#x9d   {background: green; color: white;text-align: center;  border-radius: 5px;padding: 0px;grid-column: 10  / 12;   grid-row: 9 / 10;}
#x10d   {background: green; color: white;text-align: center;  border-radius: 5px;padding: 0px;grid-column: 10  / 12;   grid-row: 10 / 11;}
#x11d   {background: green; color: white;text-align: center;  border-radius: 5px;padding: 0px;grid-column: 10  / 12;   grid-row: 11 / 12;}

#l {background: salmon;text-align: center;border-radius: 5px;padding: 0px;grid-column: 2  / 12;  grid-row: 12 / 13;}
#l1 {background: #00cc00; text-align: center;border-radius: 5px;width: 100%;height: 100%; color: white;}
#l1:hover {background: red;color: #fff;}

</style>


<div class="sheader1r"><p id="llogin"><?php html::NAV();?></p></div>
<div class="sheader2l">Vaccination de l'élève : <?php echo $this->user[0]['NOM'].'_'.$this->user[0]['PRENOM'].' ('.$this->user[0]['FILSDE'].')';?> </div>
<div class="sheader2r">
<?php
$ctrl='dashboard';$mdl='search';
$data = array(
"c"           => $ctrl,
"m"           => $mdl,
"combo"       => array("id"=>'id',"Nom"=>'NOM',"prenom"=>'PRENOM',"Sexe"=>'SEX'),
"submitvalue" => 'Search',
"cb1"         => $ctrl,    "mb1" => 'nouveau',     "tb1" => 'Créer un nouveau certificat ',      "vb1" => '',  "icon1" => 'add.PNG',
"cb2"         => $ctrl,    "mb2" => 'Evaluation',  "tb2" => 'Evaluation Mortalité hospitalière', "vb2" => '',  "icon2" => 'eva.png',
"cb3"         => $ctrl,    "mb3" => '',            "tb3" => '',                                  "vb3" => '',  "icon3" => 'graph.PNG',
"cb4"         => $ctrl,    "mb4" => '',            "tb4" => '',                                  "vb4" => '',  "icon4" => 'search.PNG');
echo "<button id=\"Cleari\"  onclick=\"document.location='".URL.$data['cb1']."/".$data['mb1']."/';  \"   title=\"".$data['tb1']."\">&nbsp;<img src=\"".URL."public/images/".$data['icon1']."\" width='15' height='15' border='0' alt=''/>&nbsp;".$data['vb1']."&nbsp;</button> " ;
echo "<button id=\"Cleari\"  onclick=\"document.location='".URL.$data['cb2']."/".$data['mb2']."/';  \"   title=\"".$data['tb2']."\">&nbsp;<img src=\"".URL."public/images/".$data['icon2']."\" width='15' height='15' border='0' alt=''/>&nbsp;".$data['vb2']."&nbsp;</button> " ;
?>
</div>
<div class="sheader1l"><p id="dashboard"><?php echo TXT_SMENUE1 ;?></p></div>

<div class="listl">
	<form action="<?php echo URL.'dashboard/createvaccin';?>" method="post">			
		<div id="inner-grid">
		
			<div id="x1">Naissance : </div> <div id="x1a"> BCG-POLIO:O-HVB1  </div>  <div id="x1b"><input  id="FDATE1" class="observation"  type="txt"  name="FDATE1"  value=""  /> </div><div id="x1c"><input id="RDATE1"  class="observation" type="txt"  name="RDATE1"   value=""  /> </div><div id="x1d"><input class="observation"   type="txt"  name="OBSER1"   value=""  /> </div>
			<div id="x2">1er mois :  </div> <div id="x2a"> HVB2  </div>  <div id="x2b"><input  id="FDATE2" class="observation"  type="txt"  name="FDATE2"  value=""  /> </div><div id="x2c"><input id="RDATE2"  class="observation" type="txt"  name="RDATE2"   value=""  /> </div><div id="x2d"><input class="observation"   type="txt"  name="OBSER2"   value=""  /> </div>
			<div id="x3">3eme mois : </div> <div id="x3a"> DTCOQ-POLIO:O  </div>  <div id="x3b"><input  id="FDATE3" class="observation"  type="txt"  name="FDATE3"  value=""  /> </div><div id="x3c"><input id="RDATE3"  class="observation" type="txt"  name="RDATE3"   value=""  /> </div><div id="x3d"><input class="observation"   type="txt"  name="OBSER3"   value=""  /> </div>
			<div id="x4">4eme mois : </div> <div id="x4a"> DTCOQ-POLIO:O  </div>  <div id="x4b"><input  id="FDATE4" class="observation"  type="txt"  name="FDATE4"  value=""  /> </div><div id="x4c"><input id="RDATE4"  class="observation" type="txt"  name="RDATE4"   value=""  /> </div><div id="x4d"><input class="observation"   type="txt"  name="OBSER4"   value=""  /> </div>
			<div id="x5">5eme mois : </div> <div id="x5a"> DTCOQ-POLIO:O-HVB3  </div>  <div id="x5b"><input  id="FDATE5" class="observation"  type="txt"  name="FDATE5"  value=""  /> </div><div id="x5c"><input id="RDATE5"  class="observation" type="txt"  name="RDATE5"   value=""  /> </div><div id="x5d"><input class="observation"   type="txt"  name="OBSER5"   value=""  /> </div>
			<div id="x6">9eme mois : </div> <div id="x6a"> ROR  </div>  <div id="x6b"><input  id="FDATE6" class="observation"  type="txt"  name="FDATE6"  value=""  /> </div><div id="x6c"><input id="RDATE6"  class="observation" type="txt"  name="RDATE6"   value=""  /> </div><div id="x6d"><input class="observation"   type="txt"  name="OBSER6"   value=""  /> </div>
			<div id="x7">18eme mois :</div> <div id="x7a"> DTCOQ-POLIO:O  </div>  <div id="x7b"><input  id="FDATE7" class="observation"  type="txt"  name="FDATE7"  value=""  /> </div><div id="x7c"><input id="RDATE7"  class="observation" type="txt"  name="RDATE7"   value=""  /> </div><div id="x7d"><input class="observation"   type="txt"  name="OBSER7"   value=""  /> </div>
			<div id="x8">1AP :       </div> <div id="x8a"> DTE-POLIO:O-RR  </div>  <div id="x8b"><input  id="FDATE8" class="observation"  type="txt"  name="FDATE8"  value=""  /> </div><div id="x8c"><input id="RDATE8"  class="observation" type="txt"  name="RDATE8"   value=""  /> </div><div id="x8d"><input class="observation"   type="txt"  name="OBSER8"   value=""  /> </div>
			<div id="x9">1AM :       </div> <div id="x9a"> DTA-POLIO:O  </div>  <div id="x9b"><input  id="FDATE9" class="observation"  type="txt"  name="FDATE9"  value=""  /> </div><div id="x9c"><input id="RDATE9"  class="observation" type="txt"  name="RDATE9"   value=""  /> </div><div id="x9d"><input class="observation"   type="txt"  name="OBSER9"   value=""  /> </div>
			<div id="x10">1AS :      </div> <div id="x10a"> DTA-POLIO:O </div>  <div id="x10b"><input id="FDATE10"class="observation"   type="txt"  name="FDATE10" value=""  /> </div><div id="x10c"><input id="RDATE10" class="observation" type="txt"  name="RDATE10"  value=""  /> </div><div id="x10d"><input class="observation"   type="txt"  name="OBSER10"   value=""  /> </div>
			<div id="x11">18ans :    </div> <div id="x11a"> DTA </div>  <div id="x11b"><input id="FDATE11"class="observation"   type="txt"  name="FDATE11" value=""  /> </div><div id="x11c"><input id="RDATE11" class="observation" type="txt"  name="RDATE11"  value=""  /> </div><div id="x11d"><input class="observation"   type="txt"  name="OBSER11"   value=""  /> </div>
			

			<div id="l"><input id="l1" onclick="playSound()"  type="submit" value="Envoyer"/> </div>
			<div ><input type="hidden" name="IDELEVE"  value="<?php echo $this->user[0]['id'];?>"/> </div>
			<div ><input type="hidden" name="NIVEAUS"  value="<?php echo $this->user[0]['PALIER'];?>"/> </div>
			<div ><input type="hidden" name="ETABLIS"  value="<?php echo $this->user[0]['ECOLE'];?>"/> </div>
			<div ><input type="hidden" name="UDS"      value="<?php echo $this->user[0]['UDS'];?>"/> </div>
			<div ><input type="hidden" name="STRUCTURE"value="<?php echo $this->user[0]['STRUCTURE'];?>"/> </div>
			
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
	
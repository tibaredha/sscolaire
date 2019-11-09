<style>
#inner-grid {
  display: grid;padding: 8px;
  grid-template-columns: 1fr 1fr 1fr 1fr ;
  grid-template-rows: 20px 45px 45px 45px 45px 45px 45px;
  grid-gap: 5px;
}
#aa,.bb,#cc {background: yellow; text-align: center;border-radius: 5px;width: 50%;height: 100%;}
.dd {background: #00cc00; text-align: center;border-radius: 5px;width: 100%;height: 100%; color: white;}
.dd:hover {background: red;color: #fff;}
.ACV{background: #00cc00; border-radius: 5px;width: 5%;text-align: center;color: white; height: 70%;   }
#a {background: salmon;text-align: right; border-radius: 5px;padding: 8px;grid-column: 2  / 4;  grid-row: 2 / 3;}
#b {background: salmon;text-align: right; border-radius: 5px;padding: 8px;grid-column: 2  / 4;  grid-row: 3 / 4;}
#c {background: salmon;text-align: right; border-radius: 5px;padding: 8px;grid-column: 2  / 4;  grid-row: 4 / 5;}
#d {background: salmon;text-align: right; border-radius: 5px;padding: 8px;grid-column: 2  / 4;  grid-row: 5 / 6;}
#e {background: salmon;text-align: right; border-radius: 5px;padding: 8px;grid-column: 2  / 4;  grid-row: 6 / 7;}
#f {background: salmon;text-align: center;border-radius: 5px;padding: 8px;grid-column: 2  / 4;  grid-row: 7 / 8;}
#g {background: salmon;text-align: center;border-radius: 5px;padding: 8px;grid-column: 2  / 4;  grid-row: 8 / 9;}

</style>
<div class="sheader1l">
<?php 
// echo $_COOKIE['rememberme'];
Session::init();
if (isset($_SESSION['errorlogin'])){echo '<p id="errorlogin">'.$_SESSION['errorlogin'].'</p>';}else{echo '<p id="llogin">Gérer l\'activité paramédicale </p>';}
?>
</div>
<div class="sheader1r"><p id="llogin"><?php html::NAV();?></p></div>
<div class="sheader2l">Anthropométrie <?php //echo EDRSFR;?></div>
<div class="sheader2r">MSPRH</div>
<div class="contentl formaut">
	<form action="<?php echo URL.'para/createpara/'.$this->user[0]['id'];?>" method="post">			
		<div id="inner-grid">
			<?php //echo HTML::VACCINID($this->user[0]['id']);?>
			
			
			<div id="a">Date éxamen : <input class="bb"   id="DATEEXAMEN" type="text"  name="DATEEXAMEN"  value="<?php echo date('d-m-Y');?>"  required="" />        </div>
			<div id="b">Poids (kg) :  <input class="bb"   id="POIDS"      type="text"  name="POIDS"       value="0"      required="" /></div>
			<div id="c">Taille (cm) : <input class="bb"   id="TAILLE"     type="text"  name="TAILLE"      value="0"      required="" /></div>
			<div id="d">TA (mmhg) :   <input class="bb"   id="TA"         type="text"  name="TA"          value="0"      required="" /></div>
			<div id="e">AV (OD-OG) :  <input class="bb"   id="AV"         type="text"  name="AV"          value="0"      required="" /></div>
			<div id="f"><input class="ACV" type="checkbox" name="ACV" value="1" > Absence de cicatrice vaccinale</div>
			<?php 
			echo '<div ><input type="hidden" name="IDELEVE"  value="'.$this->user[0]['id'].'"/> </div>';
			echo '<div ><input type="hidden" name="NIVEAUS"  value="'.$this->user[0]['PALIER'].'"/> </div>';
			echo '<div ><input type="hidden" name="ETABLIS"  value="'.$this->user[0]['ECOLE'].'"/> </div>';
			echo '<div ><input type="hidden" name="UDS"      value="'.$this->user[0]['UDS'].'"/> </div>';
			echo '<div ><input type="hidden" name="STRUCTURE"value="'.$this->user[0]['STRUCTURE'].'"/> </div>';
			
			echo '<div ><input type="hidden" name="DATENS"value="'.$this->user[0]['DATENS'].'"/> </div>';
			
			
			?>
			<div id="g"><input class="dd" onclick="playSound()"  name="submit1"   type="submit" value="Envoyer"/> </div>
		    
		
		</div>
	</form>
</div>	
<div class="content"><img id="image" src="<?php echo URL;?>public/images/biometrie.jpg" ></div>
<div class="contentr"><img id="image" src="<?php echo URL;?>public/images/<?php echo logod;?>"></div>	
<div class="scontentl2"><?php echo EDRSUS;?> <?php //echo "Date d'expiration : ".Session::dateexpiration; ?></div>		
<div class="scontentl3"><?php html::rsc();?></div>
<div class="scontentr1"><?php echo dsp; ?></div>		
<script> function playSound() {var sound = document.getElementById("beep");sound.play();}</script>
<audio id="beep" src="<?php echo URL;?>public/beep-23.wav" type="audio/wav"></audio>			
	
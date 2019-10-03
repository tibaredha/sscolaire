<style>
#inner-grid {
  display: grid;padding: 8px;
  grid-template-columns: 1fr 1fr 1fr 1fr ;
  grid-template-rows: 20px 45px 45px 45px 45px 45px ;
  grid-gap: 5px;
}
#aa,.bb,#cc {background: yellow; text-align: center;border-radius: 5px;width: 50%;height: 100%;}
.dd {background: #00cc00; text-align: center;border-radius: 5px;width: 100%;height: 100%; color: white;}
.dd:hover {background: red;color: #fff;}
#remember{background: #00cc00; text-align: center;border-radius: 5px;width: 10%;height: 70%; color: white;}

.x {color: #fff;}

#a {background: salmon;text-align: right; border-radius: 5px;padding: 8px;grid-column: 2  / 4;  grid-row: 2 / 3;}
#b {background: salmon;text-align: right; border-radius: 5px;padding: 8px;grid-column: 2  / 4;  grid-row: 3 / 4;}
#c {background: salmon;text-align: right; border-radius: 5px;padding: 8px;grid-column: 2  / 4;  grid-row: 4 / 5;}
#d {background: salmon;text-align: right;border-radius: 5px;padding: 8px;grid-column: 2  / 4;  grid-row: 5 / 6;}
#e {background: salmon;text-align: center;border-radius: 5px;padding: 8px;grid-column: 2  / 4;  grid-row: 6 / 7;}

#f {background: salmon;text-align: center;border-radius: 5px;padding: 8px;grid-column: 2  / 4;  grid-row: 7 / 8;}

</style>
<div class="sheader1l">
<?php 
// echo $_COOKIE['rememberme'];
Session::init();
if (isset($_SESSION['errorlogin'])){echo '<p id="errorlogin">'.$_SESSION['errorlogin'].'</p>';}else{echo '<p id="llogin">Gérer la vaccination </p>';}
?>
</div>
<div class="sheader1r"><p id="llogin"><?php html::NAV();?></p></div>
<div class="sheader2l">Vaccination <?php //echo EDRSFR;?></div>
<div class="sheader2r">MSPRH</div>
<div class="contentl formaut">
	<form action="<?php echo URL.'vac/createvac/'.$this->user[0]['id'];?>" method="post">			
		<div id="inner-grid">
			<?php //echo HTML::VACCINID($this->user[0]['id']);?>
			
			
			<div id="a">Vaccin :   <?php echo HTML::VACCIN("vaccin","aa","vaccin","vaccin","1","BCG",HTML::VACCINID($this->user[0]['id']) );?> </div>
			<div id="b">Date Vac : <input class="bb" id="datevac" type="text"  name="datevac"  value="<?php echo date('d-m-Y');?>"  required="" /></div>
			<div id="c">Date Pér : <input class="bb" id="dateper" type="text"  name="dateper"  value="<?php echo date('d-m-Y');?>"  required="" /></div>
			<div id="d">N° de lot : <input class="bb"   id="ndlot"   type="text"  name="ndlot"    value="0000000"      required="" /></div>
			<div id="e"></div>
			<?php 
			echo '<div ><input type="hidden" name="IDELEVE"  value="'.$this->user[0]['id'].'"/> </div>';
			echo '<div ><input type="hidden" name="NIVEAUS"  value="'.$this->user[0]['PALIER'].'"/> </div>';
			echo '<div ><input type="hidden" name="ETABLIS"  value="'.$this->user[0]['ECOLE'].'"/> </div>';
			echo '<div ><input type="hidden" name="UDS"      value="'.$this->user[0]['UDS'].'"/> </div>';
			echo '<div ><input type="hidden" name="STRUCTURE"value="'.$this->user[0]['STRUCTURE'].'"/> </div>';
			?>
			<div id="f"><input class="dd" onclick="playSound()"  name="submit1"   type="submit" value="Vacciner"/> </div>
		    
		
		</div>
	</form>
</div>	
<div class="content"><img id="image" src="<?php echo URL;?>public/images/vaccin.jpg" ></div>
<div class="contentr"><img id="image" src="<?php echo URL;?>public/images/<?php echo logod;?>"></div>	
<div class="scontentl2"><?php echo EDRSUS;?> <?php //echo "Date d'expiration : ".Session::dateexpiration; ?></div>		
<div class="scontentl3"><?php html::rsc();?></div>
<div class="scontentr1"><?php echo dsp; ?></div>		
<script> function playSound() {var sound = document.getElementById("beep");sound.play();}</script>
<audio id="beep" src="<?php echo URL;?>public/beep-23.wav" type="audio/wav"></audio>			
	
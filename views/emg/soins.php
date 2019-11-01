<style>
#inner-grid {
  display: grid;padding: 8px;
  grid-template-columns: 1fr 1fr 1fr 1fr ;
  grid-template-rows: 20px 45px 45px 45px 45px 45px ;
  grid-gap: 5px;
}
#aa,#DATECSBD,#cc {background: yellow; text-align: center;border-radius: 5px;width: 50%;height: 100%;}
#dd {background: #00cc00; text-align: center;border-radius: 5px;width: 100%;height: 100%; color: white;}
#dd:hover {background: red;color: #fff;}
#remember{background: #00cc00; text-align: center;border-radius: 5px;width: 10%;height: 70%; color: white;}

.x {color: #fff;}

#a {background: salmon;text-align: right; border-radius: 5px;padding: 8px;grid-column: 2  / 4;  grid-row: 2 / 3;}
#b {background: salmon;text-align: right; border-radius: 5px;padding: 8px;grid-column: 2  / 4;  grid-row: 3 / 4;}
#c {background: salmon;text-align: right; border-radius: 5px;padding: 8px;grid-column: 2  / 4;  grid-row: 4 / 5;}
#d {background: salmon;text-align: center;border-radius: 5px;padding: 8px;grid-column: 2  / 4;  grid-row: 5 / 6;color: white;}
#e {background: salmon;text-align: center;border-radius: 5px;padding: 8px;grid-column: 2  / 4;  grid-row: 6 / 7;}
#f {background: salmon;text-align: center;border-radius: 5px;padding: 8px;grid-column: 2  / 4;  grid-row: 7 / 8;}
#g {background: salmon;text-align: center;border-radius: 5px;padding: 8px;grid-column: 2  / 4;  grid-row: 8 / 9;}
</style>
<div class="sheader1l">
<?php 
// echo $_COOKIE['rememberme'];
Session::init();
if (isset($_SESSION['errorlogin'])){echo '<p id="errorlogin">'.$_SESSION['errorlogin'].'</p>';}else{echo '<p id="llogin">Traitement </p>';}
?>
</div>
<div class="sheader1r"><p id="llogin"><?php html::NAV();?></p></div>
<div class="sheader2l">CAT  <?php echo $this->soins;     ?></div>
<div class="sheader2r">MSPRH</div>
<div class="contentl formaut">
	<form action="<?php echo URL.'emg/soinsx';?>" method="post">			
		<div id="inner-grid">
			<div id="a">CAT : 
			<?php echo '<select id="aa" name="typetrt">';
			echo '<option value="1">Traitement médicale</option>';
			echo '<option value="2">Orientation spécialisé</option>';
			echo "</select>";?> 
			</div>
			<div id="b">Date CAT :   <input id="DATECSBD"  type="text"  name="datetrt"  value="<?php echo date('d-m-Y');?>"   required=""   /></div>
	
			<div id="c"></div>
			<div id="d"><a class="x" href="<?php echo URL;?>register"></a>&nbsp;&nbsp;&nbsp;<a class="x" href="<?php echo URL;?>register/forget"></a> </div>
			
			<div id="e"><input type="checkbox" id="remember" name="remember" value="1"> </div>
			<div ><input type="hidden" name="IDELEVE"  value="<?php echo $this->user[0]['id'];?>"/> </div>
			<div ><input type="hidden" name="IDEXAMEN"  value="<?php echo $this->idexamen;?>"/> </div>
			
			<div id="f"><input id="dd" onclick="playSound()"  type="submit" value="Envoyer"/> </div>
		</div>
	</form>
</div>	
<div class="content"><img id="image" src="<?php echo URL;?>public/images/trt.jpg" ></div>
<div class="contentr"><img id="image" src="<?php echo URL;?>public/images/<?php echo logod;?>"></div>	
<div class="scontentl2"><?php echo EDRSUS;?> <?php //echo "Date d'expiration : ".Session::dateexpiration; ?></div>		
<div class="scontentl3"><?php html::rsc();?></div>
<div class="scontentr1"><?php echo dsp; ?></div>		
<script> function playSound() {var sound = document.getElementById("beep");sound.play();}</script>
<audio id="beep" src="<?php echo URL;?>public/beep-23.wav" type="audio/wav"></audio>			
	
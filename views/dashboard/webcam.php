<style>
#inner-grid {
  display: grid;padding: 8px;
  grid-template-columns: 1fr 1fr 1fr 1fr ;
  grid-template-rows: 20px 45px 45px 45px 45px 45px ;
  grid-gap: 5px;
}
#aa,#bb,#cc {background: yellow; text-align: center;border-radius: 5px;width: 50%;height: 100%;}
#dd,#ff{background: #00cc00; text-align: center;border-radius: 5px;width: 100%;height: 100%; color: white;}
#dd:hover {background: red;color: #fff;}
#remember{background: #00cc00; text-align: center;border-radius: 5px;width: 10%;height: 70%; color: white;}

.x {color: #fff;}

#a {background: salmon;text-align: center; border-radius: 5px;padding: 8px;grid-column: 2  / 4;  grid-row: 2 / 8;}
#b {background: salmon;text-align: center; border-radius: 5px;padding: 8px;grid-column: 2  / 4;  grid-row: 8 / 9;}

</style>
<div class="sheader1l">
<?php 
// echo $_COOKIE['rememberme'];
Session::init();
if (isset($_SESSION['errorlogin'])){echo '<p id="errorlogin">'.$_SESSION['errorlogin'].'</p>';}else{echo '<p id="llogin">Gérer la photos de l\'élève scolarisé </p>';}
$url1 = explode('/',$_GET['url']);	
?>
</div>
<div class="sheader1r"><p id="llogin"><?php html::NAV();?></p></div>
<div class="sheader2l">Créer une photos <?php //echo EDRSFR;?></div>
<div class="sheader2r">MSPRH</div>
<div class="contentl formaut">

        <div id="inner-grid">
			<div id="a">
			<script language="JavaScript">
			webcam.set_api_url( "<?php echo URL; ?>public/images/photos/sscolaire/test.php?uc=<?php echo $url1 ['2'] ;?>" );
			webcam.set_quality( 90 );                                                                                   
			webcam.set_shutter_sound( true,'<?php echo URL; ?>public/images/photos/sscolaire/shutter.mp3' );             
			webcam.set_swf_url( '<?php echo URL; ?>public/images/photos/sscolaire/webcam.swf' );
			document.write( webcam.get_html(320,240) );   //320x240 and 640x480
			</script>
			</div>
			<div id="b">
			 <form>
	          &nbsp;&nbsp;
		      <input type=button value="Configure..."  onClick="webcam.configure()">
		      &nbsp;&nbsp;
		      <input type=button value="Take Snapshot" onClick="take_snapshot()">
	          </form>
			</div>
		</div>
		
	<script language="JavaScript">
		webcam.set_hook( 'onComplete', 'my_completion_handler' );   
		function take_snapshot() {
			document.getElementById('upload_results').innerHTML = '<h1>Uploading...</h1>';
			webcam.snap();	
		}
		
		function my_callback_function(response) {
                alert("Success! PHP returned: " + response);
        }
		function my_completion_handler(msg) {
			
			if (msg.match(/(http\:\/\/\S+)/)) {
				var image_url = RegExp.$1;
				document.getElementById('upload_results').innerHTML = '<img src="' + image_url + '">'+'<h3>Upload Successful!ok</h3>'+'<h3>JPEG URL: ' + image_url + '</h3>';
				webcam.reset();
			}
			else alert("PHP Error: " + msg);
		}
	</script>
	
</div>

<div class="content"><div id="upload_results" style="background-color:#eee;"></div></div>

<div class="contentr"><img id="image" src="<?php echo URL;?>public/images/<?php echo logod;?>"></div>	
<div class="scontentl2"><?php echo EDRSUS;?> <?php //echo "Date d'expiration : ".Session::dateexpiration; ?></div>		
<div class="scontentl3"><?php html::rsc();?></div>
<div class="scontentr1"><?php echo dsp; ?></div>		
		
	
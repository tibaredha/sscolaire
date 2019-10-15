<style>.a {background: salmon;text-align: center;color: white; border-radius: 5px;padding: 3px;}</style>
<div class="sheader1l"><?php Session::init();if (isset($_SESSION['errorlogin'])) {$sError = '<p id="errorregister">' . $_SESSION['errorlogin'] . '</p>';echo $sError;}else{$sError='<p id="lregister">Accueil </p>';echo $sError;}?></div>
<div class="sheader1r"><p id="llogin"><?php html::NAV();?></p></div>
<div class="sheader2l"><?php echo EDRSFR;?></div>
<div class="sheader2r">MSPRH</div>
<div class="contentl">
<?php 
if (isset($_COOKIE['tibaredha'])) {
	// echo 'Bonjour '.$_COOKIE['tibaredha'].' !';
}
?>


<?php 
// echo Hash::create('whirlpool','tibaredha','a');

 
//cryptage des données
	// $data = "03/05/1970_tibaredha_tibaredha_tibaredha_tibaredha";
	// echo $data;

	// echo "<br>";
	// $datac = Cryptage::encrypt($data);
	// echo $datac;

	// echo "<br>";
	// $datadc = Cryptage::decrypt($datac);

	// echo "<br>";
	// echo $datadc;
?>
<?php 
// echo 'max_execution_time = ' . ini_get('max_execution_time') . "\n";
// ini_set("max_execution_time", "10") . "\n";
// echo 'max_execution_time = ' . ini_get('max_execution_time') . "\n";
// ini_restore ( "max_execution_time" );
// echo 'max_execution_time = ' . ini_get('max_execution_time') . "\n";

// print_r(ini_get_all());

// echo 'display_errors = ' . ini_get('display_errors') . "\n";
// echo 'register_globals = ' . ini_get('register_globals') . "\n";
// echo 'post_max_size = ' . ini_get('post_max_size') . "\n";
// echo 'post_max_size+1 = ' . (ini_get('post_max_size')+1) . "\n";
// echo 'post_max_size in bytes = ' . return_bytes(ini_get('post_max_size'));
// if(! ini_set("max_execution_time", "10")) {echo "échec";}else {echo "ok";}
?>
<!--
 <span class="import" onclick="show_popup('popup_upload')">Import CSV to MySQL</span>
 <div id="popup_upload">
        <div class="form_upload">
            <span class="close" onclick="close_popup('popup_upload')">x</span>
            <h2>Upload CSV file</h2>
            <form action="import.php" method="post" enctype="multipart/form-data">
                <input type="file" name="csv_file" id="csv_file" class="file_input">
                <input type="submit" value="Upload file" id="upload_btn">
            </form>
        </div>
    </div>	

-->
<marquee behavior="slide" direction="up" scrollamount="2">
<p class="a">G-UDS</p>
<p class="a">GESTION-UNITE-DE-DEPISTAGE-ET-DE-SUIVI</p>
<p class="a">V2.0.0</p>
<p class="a">SANTE SCOLAIRE </p>
<p class="a">2019</p>
<p class="a">DSP-DJELFA</p>
<p class="a">MANAGEMENT OF SCREENING AND CARE UNIT</p>
<p class="a">NEW DIMENSIONS OF SCHOOL HEALTH</p>

</marquee>
</div>	
<div class="content"><img id="image" src="<?php echo URL;?>public/images/accueil.jpg"></div>
<div class="contentr"><img id="image" src="<?php echo URL;?>public/images/<?php echo logod;?>">
<?php //HTML::photosdb('IS NOT NULL',''); ?>
</div>	
<div class="scontentl2"><?php echo EDRSUS;?></div>		
<div class="scontentl3"><?php html::rsc();?></div>
<div class="scontentr1"><?php echo "";echo dsp; echo "";?></div>		


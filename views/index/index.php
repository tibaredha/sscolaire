<style>.a {background: salmon;text-align: left;color: white; border-radius: 5px;padding: 3px;}</style>
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


<marquee behavior="slide" direction="up" scrollamount="2">
<p class="a">* Les informations rapportées par les certificats de décès permettent l'élaboration </p>
<p class="a">* Des statistiques exhaustives des causes médicales de décès en Algerie</p>
<p class="a">* Dont l'utilisation à pour  but  d'orienter et d'évaluer les actions et les recherches </p>
<p class="a">* Dans le domaine de la santé publique</p>
<p class="a">* Donc la qualité et la précision des certificats de décès doit etre ameliorée</p>
<p class="a">* Compte tenu des évolutions technologiques, le passage à un mode de certification </p>
<p class="a">* Electronique des décès est imperatif</p>
<p class="a">* Deverait permettre d'ameliorer considerablement le circuit du certificat de décès </p>	
</marquee>-->
</div>	
<div class="content"><img id="image" src="<?php echo URL;?>public/images/accueil.jpg"></div>
<div class="contentr"><img id="image" src="<?php echo URL;?>public/images/<?php echo logod;?>">
<?php //HTML::photosdb('IS NOT NULL',''); ?>
</div>	
<div class="scontentl2"><?php echo EDRSUS;?></div>		
<div class="scontentl3"><?php html::rsc();?></div>
<div class="scontentr1"><?php echo "";echo dsp; echo "";?></div>		


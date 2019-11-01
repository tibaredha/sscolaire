<?php
class emg extends Controller { 
	
	public $controleur="emg";
	
	function __construct() {
		parent::__construct();
		Session::init();
		$logged = Session::get('loggedIn');
		if ($logged == false) {
			Session::destroy();
			header('location: '.URL.'login');
			exit;
		}
		$this->view->js = array($this->controleur.'/js/default.js?t='.time());
		$this->view->css = array($this->controleur.'/css/default.css?t='.time());
	}
	

	function index() {
	    $this->view->title = 'dashboard';
		$this->view->msg = 'dashboard';
		$this->view->render($this->controleur.'/index');
	}

	//**********************************************************************************************************************************//
	function search()
	{
	    $url1 = explode('/',$_GET['url']);	
		$this->view->title = 'Search';
	    $this->view->msg = 'Search';
		$this->view->userListviewo = $_GET['o']; //criter de choix
	    $this->view->userListviewq = $_GET['q']; //key word  
		$this->view->userListviewp = $url1[2];   //parametre 2 page                      limit 2,3
		$this->view->userListviewl =10     ;      //parametre 3 nombre de ligne par page  limit 2,3 
		$this->view->userListviewb =10       ;   //parametre nombre de chiffre dan la barre  navigation
		if (isset ($_GET['ad'])){$ad=$_GET['ad']; }else {$ad="asc";}
		$this->view->userListview = $this->model->userSearch($this->view->userListviewo,$this->view->userListviewq,$this->view->userListviewp,$this->view->userListviewl,$ad);
		$this->view->userListview1= $this->model->userSearch1($this->view->userListviewo,$this->view->userListviewq,$ad); // compte total pour bare de navigation
		// $this->view->nbrvalide = $this->model->listeAprouve();
		$this->view->render($this->controleur.'/index');
	}
	// **********************************************************************************************************************************//
	function emg($id) {
	    $this->view->title = 'emg';
		$this->view->msg = 'emg';
		$this->view->user = $this->model->userSingleListe($id);
		$this->view->render($this->controleur.'/emg');
	}
	
	public function createexamen() 
	{
	$data['DATESBD']          = $_POST['DATESBD'];
	for ($i = 1; $i <= 54; $i+= 1){if (isset($_POST['m'.$i])){$data['m'.$i]='1';}else{$data['m'.$i]='0';}}
	if (isset($_POST['OKRDV'])){$data['OKRDV']='1';}else{$data['OKRDV']='';}
	if (isset($_POST['DATECSBD'])){$data['DATECSBD']=$_POST['DATECSBD'];}else{$data['DATECSBD']='00-00-0000';}
    $data['IDELEVE']          = $_POST['IDELEVE'];
    $data['STRUCTURE']        = $_POST['STRUCTURE'];
	$data['UDS']              = $_POST['UDS'];
	$data['ETABLIS']          = $_POST['ETABLIS'];
	$data['NIVEAUS']          = $_POST['NIVEAUS'];
	//echo '<pre>';print_r ($data);echo '<pre>'; 
    $this->model->createemg($data);
    header('location: '.URL.$this->controleur.'/search/0/10?o=IDELEVE&q='.$data['IDELEVE']);	
	}
	
	function edit($id) {
	 $url1 = explode('/',$_GET['url']);	
		$this->view->title = 'edit Examens de médecine generale ';
		$this->view->msg = 'Edit Examens de médecine generale';
		$this->view->usercao = $this->model->userSingleList($url1[3]);
		$this->view->user = $this->model->userSingleListe($url1[2]);
		$this->view->render($this->controleur.'/edit');  
	}
	
	function editeexamen($id) {
	 $data['DATESBD']          = $_POST['DATESBD'];
	for ($i = 1; $i <= 54; $i+= 1){if (isset($_POST['m'.$i])){$data['m'.$i]='1';}else{$data['m'.$i]='0';}}
	if (isset($_POST['OKRDV'])){$data['OKRDV']='1';}else{$data['OKRDV']='';}
	if (isset($_POST['DATECSBD'])){$data['DATECSBD']=$_POST['DATECSBD'];}else{$data['DATECSBD']='00-00-0000';}
    $data['IDELEVE']          = $_POST['IDELEVE'];
    $data['STRUCTURE']        = $_POST['STRUCTURE'];
	$data['UDS']              = $_POST['UDS'];
	$data['ETABLIS']          = $_POST['ETABLIS'];
	$data['NIVEAUS']          = $_POST['NIVEAUS'];
	$data['id']          = $id;
	//echo '<pre>';print_r ($data);echo '<pre>'; 
    $last_id=$this->model->editSave($data);
    header('location: ' . URL .$this->controleur. '/search/0/10?o=IDELEVE&q='.$data['IDELEVE']);
	}
	
	
	public function delete($id)
	{
	$url1 = explode('/',$_GET['url']);	
	$this->model->deleteeemg($url1[3]);    
	header('location: ' . URL .$this->controleur. '/search/0/10?o=IDELEVE&q='.$url1[2]);
	}
	
  //**********************************************************************************************************************************//
	
	function trt($id) {
	    $url1 = explode('/',$_GET['url']);	
		$this->view->title = 'CAT';
		$this->view->msg = 'CAT';
		$this->view->user = $this->model->userSingleListe($id);
		$this->view->idexamen = $url1[4] ;
		if($url1[3]==1){$this->view->soins = ' : [HTA]';} 
		else if ($url1[3]==2){$this->view->soins = ' : [Souffle cardiaque]';}
		else if ($url1[3]==3){$this->view->soins = ' : [Tr .du rythme]';}
		else if ($url1[3]==4){$this->view->soins = ' : [RAA]';}
		else if ($url1[3]==5){$this->view->soins = ' : [Cardiopathie]';}
		else if ($url1[3]==6){$this->view->soins = ' : [Autres]';}
		else if ($url1[3]==7){$this->view->soins = ' : [Dermatite atopique]';}
		else if ($url1[3]==8){$this->view->soins = ' : [Gale]';}
		else if ($url1[3]==9){$this->view->soins = ' : [Pédiculose]';}
		else if ($url1[3]==10){$this->view->soins = ' : [Psoriasis]';}
		else if ($url1[3]==11){$this->view->soins = ' : [Teigne]';}
		else if ($url1[3]==12){$this->view->soins = ' : [Autres]';}
		else if ($url1[3]==13){$this->view->soins = ' : [Obésité]';}
		else if ($url1[3]==14){$this->view->soins = ' : [Retard stat. Pond]';}
		else if ($url1[3]==15){$this->view->soins = ' : [Surpoid]';}
		else if ($url1[3]==16){$this->view->soins = ' : [Diabète]';}
		else if ($url1[3]==17){$this->view->soins = ' : [Goitre]';}
		else if ($url1[3]==18){$this->view->soins = ' : [Autres]';}
		else if ($url1[3]==19){$this->view->soins = ' : [Oxyurose]';}
		else if ($url1[3]==20){$this->view->soins = ' : [Les hernies]';}
		else if ($url1[3]==21){$this->view->soins = ' : [Maladie coeliaque]';}
		else if ($url1[3]==22){$this->view->soins = ' : [Autres]';}
		else if ($url1[3]==23){$this->view->soins = ' : [Paleur cut. muque]';}
		else if ($url1[3]==24){$this->view->soins = ' : [Anémie]';}
		else if ($url1[3]==25){$this->view->soins = ' : [Hémophilie]';}
		else if ($url1[3]==26){$this->view->soins = ' : [Autres]';}
		else if ($url1[3]==27){$this->view->soins = ' : [Baisse acuité vis.]';}
		else if ($url1[3]==28){$this->view->soins = ' : [Nystagmus]';}
		else if ($url1[3]==29){$this->view->soins = ' : [Ptosis]';}
		else if ($url1[3]==30){$this->view->soins = ' : [Strabisme]';}
		else if ($url1[3]==31){$this->view->soins = ' : [Trachome]';}
		else if ($url1[3]==32){$this->view->soins = ' : [Autres]';}
		else if ($url1[3]==33){$this->view->soins = ' : [Hypoacousie]';}
		else if ($url1[3]==34){$this->view->soins = ' : [Rhinite allergique]';}
		else if ($url1[3]==35){$this->view->soins = ' : [Surdité]';}
		else if ($url1[3]==36){$this->view->soins = ' : [Otites chroniques]';}
		else if ($url1[3]==37){$this->view->soins = ' : [Autres]';}
		else if ($url1[3]==38){$this->view->soins = ' : [Cypho-scoliose]';}
		else if ($url1[3]==39){$this->view->soins = ' : [Déform.squel.]';}
		else if ($url1[3]==40){$this->view->soins = ' : [Scoliose]';}
		else if ($url1[3]==41){$this->view->soins = ' : [Autres]';}
		else if ($url1[3]==42){$this->view->soins = ' : [Asthme]';}
		else if ($url1[3]==43){$this->view->soins = ' : [Tuberculose pulm]';}
		else if ($url1[3]==44){$this->view->soins = ' : [Tub.Extra-pulm.]';}
		else if ($url1[3]==45){$this->view->soins = ' : [Autres]';}
		else if ($url1[3]==46){$this->view->soins = ' : [Diffucultés scolaires]';}
		else if ($url1[3]==47){$this->view->soins = ' : [Tr.du comport.]';}
		else if ($url1[3]==48){$this->view->soins = ' : [Tr. Du langage]';}
		else if ($url1[3]==49){$this->view->soins = ' : [Autres]';}
		else if ($url1[3]==50){$this->view->soins = ' : [Cryptorchidie]';}
		else if ($url1[3]==51){$this->view->soins = ' : [Enurésie]';}
		else if ($url1[3]==52){$this->view->soins = ' : [Tr.urinaires]';}
		else if ($url1[3]==53){$this->view->soins = ' : [Autres]';}
		else if ($url1[3]==54){$this->view->soins = ' : [Autres]';}
	    else{$this->view->soins = ' : N°['.$url1[3].']';}
		// echo '<pre>';print_r ($url1);echo '<pre>';  
		$this->view->render($this->controleur.'/soins');
	}
	
	function soinsx() {
	$data = array();
	$data['IDELEVE']          = $_POST['IDELEVE'];
	$data['typetrt']          = $_POST['typetrt'];
	$data['datetrt']          = $_POST['datetrt'];
	$data['IDEXAMEN']         = $_POST['IDEXAMEN'];
	// echo '<pre>';print_r ($data);echo '<pre>';     
	header('location: '.URL.$this->controleur.'/edit/'.$_POST['IDELEVE'].'/'.$_POST['IDEXAMEN']);
	}
			
}
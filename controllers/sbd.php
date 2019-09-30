<?php
class sbd extends Controller { 
	
	public $controleur="sbd";
	
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
	function ebd($id) {
	    $this->view->title = 'ebd';
		$this->view->msg = 'ebd';
		$this->view->user = $this->model->userSingleListe($id);
		$this->view->render($this->controleur.'/ebd');
	}
	
	public function createexamen() 
	{
		$data = array();$datac = array();$dataa = array();$datao = array();
		for ($i = 11; $i <= 18; $i+= 1){$data['d'.$i]      = $_POST['d'.$i];if($data['d'.$i]=='c') {$datac[]=$data['d'.$i];}if($data['d'.$i]=='a') {$dataa[]=$data['d'.$i];}if($data['d'.$i]=='o') {$datao[]=$data['d'.$i];}}
		for ($i = 21; $i <= 28; $i+= 1){$data['d'.$i]      = $_POST['d'.$i];if($data['d'.$i]=='c') {$datac[]=$data['d'.$i];}if($data['d'.$i]=='a') {$dataa[]=$data['d'.$i];}if($data['d'.$i]=='o') {$datao[]=$data['d'.$i];}}
		for ($i = 31; $i <= 38; $i+= 1){$data['d'.$i]      = $_POST['d'.$i];if($data['d'.$i]=='c') {$datac[]=$data['d'.$i];}if($data['d'.$i]=='a') {$dataa[]=$data['d'.$i];}if($data['d'.$i]=='o') {$datao[]=$data['d'.$i];}}
		for ($i = 41; $i <= 48; $i+= 1){$data['d'.$i]      = $_POST['d'.$i];if($data['d'.$i]=='c') {$datac[]=$data['d'.$i];}if($data['d'.$i]=='a') {$dataa[]=$data['d'.$i];}if($data['d'.$i]=='o') {$datao[]=$data['d'.$i];}}
		$datapc = array();$datapa = array();$datapo = array();
		for ($i = 51; $i <= 55; $i+= 1){$data['d'.$i]      = $_POST['d'.$i];if($data['d'.$i]=='c') {$datapc[]=$data['d'.$i];}if($data['d'.$i]=='a') {$datapa[]=$data['d'.$i];}if($data['d'.$i]=='o') {$datapo[]=$data['d'.$i];}}
		for ($i = 61; $i <= 65; $i+= 1){$data['d'.$i]      = $_POST['d'.$i];if($data['d'.$i]=='c') {$datapc[]=$data['d'.$i];}if($data['d'.$i]=='a') {$datapa[]=$data['d'.$i];}if($data['d'.$i]=='o') {$datapo[]=$data['d'.$i];}}
		for ($i = 71; $i <= 75; $i+= 1){$data['d'.$i]      = $_POST['d'.$i];if($data['d'.$i]=='c') {$datapc[]=$data['d'.$i];}if($data['d'.$i]=='a') {$datapa[]=$data['d'.$i];}if($data['d'.$i]=='o') {$datapo[]=$data['d'.$i];}}
		for ($i = 81; $i <= 85; $i+= 1){$data['d'.$i]      = $_POST['d'.$i];if($data['d'.$i]=='c') {$datapc[]=$data['d'.$i];}if($data['d'.$i]=='a') {$datapa[]=$data['d'.$i];}if($data['d'.$i]=='o') {$datapo[]=$data['d'.$i];}}
		if (isset($_POST['HYGIENE'])){$data['HYGIENE']='1';}else{$data['HYGIENE']='';}
		if (isset($_POST['GINGIVITE'])){$data['GINGIVITE']='1';}else{$data['GINGIVITE']='';}
		if (isset($_POST['AODF'])){$data['AODF']='1';}else{$data['AODF']='';}
		$data['DATESBD']          = $_POST['DATESBD'];
		$data['C']                = count($datac);
		$data['A']                = count($dataa);
		$data['O']                = count($datao);
		$data['CAO']              = count($datac)+count($dataa)+count($datao);
		$data['PC']                = count($datapc);
		$data['PA']                = count($datapa);
		$data['PO']                = count($datapo);
		$data['PCAO']              = count($datapc)+count($datapa)+count($datapo);
		$data['IDELEVE']          = $_POST['IDELEVE'];
		$data['STRUCTURE']        = $_POST['STRUCTURE'];
		$data['UDS']              = $_POST['UDS'];
		$data['ETABLIS']          = $_POST['ETABLIS'];
		$data['NIVEAUS']          = $_POST['NIVEAUS'];
		if (isset($_POST['OKRDV'])){$data['OKRDV']='1';}else{$data['OKRDV']='';}
	    if (isset($_POST['DATECSBD'])){$data['DATECSBD']=$_POST['DATECSBD'];}else{$data['DATECSBD']='00-00-0000';}
		// echo '<pre>';print_r ($data);echo '<pre>';  
		$last_id=$this->model->createexamen($data);
		header('location: '.URL.$this->controleur.'/search/0/10?o=IDELEVE&q='.$data['IDELEVE']);		
	}
	
	function soins($id) {
	    $url1 = explode('/',$_GET['url']);	
		$this->view->title = 'soins';
		$this->view->msg = 'soins';
		$this->view->user = $this->model->userSingleList($id);
		
		if($url1[3]==1){$this->view->soins = ' : [Hygiene BD NA]';} 
		else if ($url1[3]==2){$this->view->soins = ' : [Gingivite]';}
		else if ($url1[3]==3){$this->view->soins = ' : [ODF]';}
		else{$this->view->soins = ' : N°['.$url1[3].']';}
		//echo '<pre>';print_r ($url1);echo '<pre>';  
		$this->view->render($this->controleur.'/soins');
	}
	
	function soinsx() {
	$data = array();
	$data['IDELEVE']          = $_POST['IDELEVE'];
	$data['typetrt']          = $_POST['typetrt'];
	$data['datetrt']          = $_POST['datetrt'];
	// $data['']          = $_POST[''];
	// $data['']          = $_POST[''];

	// echo '<pre>';print_r ($data);echo '<pre>';  
	header('location: '.URL.$this->controleur.'/ebd/'.$_POST['IDELEVE']);	   
	}
			
}
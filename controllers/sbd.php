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
	
	function edit($id) {
	    $url1 = explode('/',$_GET['url']);	
		$this->view->title = 'edit Examens bucco-dentaires';
		$this->view->msg = 'Edit Examens bucco-dentaires';
		$this->view->usercao = $this->model->userSingleList($url1[3]);
		$this->view->user = $this->model->userSingleListe($url1[2]);
		$this->view->render($this->controleur.'/edit');
	}
	
	function editeexamen($id) {
	    $url1 = explode('/',$_GET['url']);	
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
		$data['PC']               = count($datapc);
		$data['PA']               = count($datapa);
		$data['PO']               = count($datapo);
		$data['PCAO']             = count($datapc)+count($datapa)+count($datapo);
		$data['IDELEVE']          = $_POST['IDELEVE'];
		$data['STRUCTURE']        = $_POST['STRUCTURE'];
		$data['UDS']              = $_POST['UDS'];
		$data['ETABLIS']          = $_POST['ETABLIS'];
		$data['NIVEAUS']          = $_POST['NIVEAUS'];
		if (isset($_POST['OKRDV'])){$data['OKRDV']='1';}else{$data['OKRDV']='';}
	    if (isset($_POST['DATECSBD'])){$data['DATECSBD']=$_POST['DATECSBD'];}else{$data['DATECSBD']='00-00-0000';}
		$data['id']          = $id;
		// echo '<pre>';print_r ($data);echo '<pre>'; 
		$last_id=$this->model->editSave($data);
		header('location: ' . URL .$this->controleur. '/search/0/10?o=IDELEVE&q='.$data['IDELEVE']);
	}
	
	public function delete($id)
	{
	$url1 = explode('/',$_GET['url']);	
	$this->model->deleteesbd($url1[3]);    
	header('location: ' . URL .$this->controleur. '/search/0/10?o=IDELEVE&q='.$url1[2]);
	}
	
   //**********************************************************************************************************************************//
	
	function soins($id) {
	    $url1 = explode('/',$_GET['url']);	
		$this->view->title = 'soins';
		$this->view->msg = 'soins';
		$this->view->user = $this->model->userSingleListe($id);
		$this->view->idexamen = $url1[4] ;
		if($url1[3]==1){$this->view->soins = ' : [Hygiene BD NA]';} 
		else if ($url1[3]==2){$this->view->soins = ' : [Gingivite]';}
		else if ($url1[3]==3){$this->view->soins = ' : [ODF]';}
		
		else if ($url1[3]==11){$this->view->soins = ' : [D:11]';}
		else if ($url1[3]==12){$this->view->soins = ' : [D:12]';}
		else if ($url1[3]==13){$this->view->soins = ' : [D:13]';}
		else if ($url1[3]==14){$this->view->soins = ' : [D:14]';}
		else if ($url1[3]==15){$this->view->soins = ' : [D:15]';}
		else if ($url1[3]==16){$this->view->soins = ' : [D:16]';}
		else if ($url1[3]==17){$this->view->soins = ' : [D:17]';}
		else if ($url1[3]==18){$this->view->soins = ' : [D:18]';}
		
		else if ($url1[3]==21){$this->view->soins = ' : [D:21]';}
		else if ($url1[3]==22){$this->view->soins = ' : [D:22]';}
		else if ($url1[3]==23){$this->view->soins = ' : [D:23]';}
		else if ($url1[3]==24){$this->view->soins = ' : [D:24]';}
		else if ($url1[3]==25){$this->view->soins = ' : [D:25]';}
		else if ($url1[3]==26){$this->view->soins = ' : [D:26]';}
		else if ($url1[3]==27){$this->view->soins = ' : [D:27]';}
		else if ($url1[3]==28){$this->view->soins = ' : [D:28]';}
		
		
		else if ($url1[3]==31){$this->view->soins = ' : [D:31]';}
		else if ($url1[3]==32){$this->view->soins = ' : [D:32]';}
		else if ($url1[3]==33){$this->view->soins = ' : [D:33]';}
		else if ($url1[3]==34){$this->view->soins = ' : [D:34]';}
		else if ($url1[3]==35){$this->view->soins = ' : [D:35]';}
		else if ($url1[3]==36){$this->view->soins = ' : [D:36]';}
		else if ($url1[3]==37){$this->view->soins = ' : [D:37]';}
		else if ($url1[3]==38){$this->view->soins = ' : [D:38]';}
		
		
		else if ($url1[3]==41){$this->view->soins = ' : [D:41]';}
		else if ($url1[3]==42){$this->view->soins = ' : [D:42]';}
		else if ($url1[3]==43){$this->view->soins = ' : [D:43]';}
		else if ($url1[3]==44){$this->view->soins = ' : [D:44]';}
		else if ($url1[3]==45){$this->view->soins = ' : [D:45]';}
		else if ($url1[3]==46){$this->view->soins = ' : [D:46]';}
		else if ($url1[3]==47){$this->view->soins = ' : [D:47]';}
		else if ($url1[3]==48){$this->view->soins = ' : [D:48]';}
		
		
		
		else if ($url1[3]==51){$this->view->soins = ' : [D:51]';}
		else if ($url1[3]==52){$this->view->soins = ' : [D:52]';}
		else if ($url1[3]==53){$this->view->soins = ' : [D:53]';}
		else if ($url1[3]==54){$this->view->soins = ' : [D:54]';}
		else if ($url1[3]==55){$this->view->soins = ' : [D:55]';}
		
		else if ($url1[3]==61){$this->view->soins = ' : [D:61]';}
		else if ($url1[3]==62){$this->view->soins = ' : [D:62]';}
		else if ($url1[3]==63){$this->view->soins = ' : [D:63]';}
		else if ($url1[3]==64){$this->view->soins = ' : [D:64]';}
		else if ($url1[3]==65){$this->view->soins = ' : [D:65]';}
		
		
		else if ($url1[3]==71){$this->view->soins = ' : [D:71]';}
		else if ($url1[3]==72){$this->view->soins = ' : [D:72]';}
		else if ($url1[3]==73){$this->view->soins = ' : [D:73]';}
		else if ($url1[3]==74){$this->view->soins = ' : [D:74]';}
		else if ($url1[3]==75){$this->view->soins = ' : [D:75]';}
		
		
		else if ($url1[3]==81){$this->view->soins = ' : [D:81]';}
		else if ($url1[3]==82){$this->view->soins = ' : [D:82]';}
		else if ($url1[3]==83){$this->view->soins = ' : [D:83]';}
		else if ($url1[3]==84){$this->view->soins = ' : [D:84]';}
		else if ($url1[3]==85){$this->view->soins = ' : [D:85]';}
		
		else{$this->view->soins = ' : N°['.$url1[3].']';}
		//echo '<pre>';print_r ($url1);echo '<pre>';  
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
<?php
class para extends Controller { 
	
	public $controleur="para";
	
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
	function para($id) {
	    $this->view->title = 'para';
		$this->view->msg = 'para';
		$this->view->user = $this->model->userSingleListe($id);
		$this->view->render($this->controleur.'/para');
	}
	
	public function createpara() 
	{
	$data['DATEEXAMEN']    = html::dateFR2US($_POST['DATEEXAMEN']);
	$data['POIDS']         = $_POST['POIDS'];
	$data['TAILLE']        = $_POST['TAILLE'];
	$data['TA']            = $_POST['TA'];
	$data['AV']            = $_POST['AV'];
	if (isset($_POST['ACV'])){$data['ACV']='1';}else{$data['ACV']='';}
    $data['IDELEVE']          = $_POST['IDELEVE'];
    $data['STRUCTURE']        = $_POST['STRUCTURE'];
	$data['UDS']              = $_POST['UDS'];
	$data['ETABLIS']          = $_POST['ETABLIS'];
	$data['NIVEAUS']          = $_POST['NIVEAUS'];
	$data['DATENS']           = $_POST['DATENS'];
	// echo '<pre>';print_r ($data);echo '<pre>'; 
    $last_id=$this->model->createpara($data);
    header('location: '.URL.$this->controleur.'/search/0/10?o=IDELEVE&q='.$data['IDELEVE']);	
	}
	
	function edit($id) {
	 // $url1 = explode('/',$_GET['url']);	
		// $this->view->title = 'edit Examens de médecine generale ';
		// $this->view->msg = 'Edit Examens de médecine generale';
		// $this->view->usercao = $this->model->userSingleList($url1[3]);
		// $this->view->user = $this->model->userSingleListe($url1[2]);
		// $this->view->render($this->controleur.'/edit');  
	}
	
	function editepara($id) {
	 // $data['DATESBD']          = $_POST['DATESBD'];
	// for ($i = 1; $i <= 54; $i+= 1){if (isset($_POST['m'.$i])){$data['m'.$i]='1';}else{$data['m'.$i]='0';}}
	// if (isset($_POST['OKRDV'])){$data['OKRDV']='1';}else{$data['OKRDV']='';}
	// if (isset($_POST['DATECSBD'])){$data['DATECSBD']=$_POST['DATECSBD'];}else{$data['DATECSBD']='00-00-0000';}
    // $data['IDELEVE']          = $_POST['IDELEVE'];
    // $data['STRUCTURE']        = $_POST['STRUCTURE'];
	// $data['UDS']              = $_POST['UDS'];
	// $data['ETABLIS']          = $_POST['ETABLIS'];
	// $data['NIVEAUS']          = $_POST['NIVEAUS'];
	// $data['id']          = $id;
	echo '<pre>';print_r ($data);echo '<pre>'; 
    // $last_id=$this->model->editSave($data);
    // header('location: ' . URL .$this->controleur. '/search/0/10?o=IDELEVE&q='.$data['IDELEVE']);
	}
	
	
	public function delete($id)
	{
	$url1 = explode('/',$_GET['url']);	
	$this->model->deletepara($url1[3]);    
	header('location: ' . URL .$this->controleur. '/search/0/10?o=IDELEVE&q='.$url1[2]);
	}
	
   //**********************************************************************************************************************************//

			
}
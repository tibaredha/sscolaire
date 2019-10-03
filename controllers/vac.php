<?php
class vac extends Controller { 
	
	public $controleur="vac";
	
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
	function vac($id) {
	    $this->view->title = 'vac';
		$this->view->msg = 'vac';
		$this->view->user = $this->model->userSingleListe($id);
		$this->view->render($this->controleur.'/vac');
	}
	
	public function createvac() 
	{
	$data['vaccin']          = $_POST['vaccin'];
	$data['datevac']         = $_POST['datevac'];
	$data['dateper']         = $_POST['dateper'];
	$data['ndlot']           = $_POST['ndlot'];
	$data['IDELEVE']         = $_POST['IDELEVE'];
	$data['NIVEAUS']         = $_POST['NIVEAUS'];
	$data['ETABLIS']         = $_POST['ETABLIS'];
	$data['UDS']             = $_POST['UDS'];
	$data['STRUCTURE']       = $_POST['STRUCTURE'];
	$last_id=$this->model->createvac1($data);
	header('location: '.URL.$this->controleur.'/search/0/10?o=IDELEVE&q='.$data['IDELEVE']);
	// echo '<pre>';print_r ($data);echo '<pre>';
	}
	
	function edit($id) 
	{
	    $url1 = explode('/',$_GET['url']);	
		$this->view->title = 'edit Examens de médecine generale ';
		$this->view->msg = 'Edit Examens de médecine generale';
		$this->view->usercao = $this->model->userSingleList($url1[3]);
		$this->view->user = $this->model->userSingleListe($url1[2]);
		$this->view->render($this->controleur.'/edit');  
	}
	
	function editevac($id) 
	{
	$data['vaccin']          = $_POST['vaccin'];
	$data['datevac']         = $_POST['datevac'];
	$data['dateper']         = $_POST['dateper'];
	$data['ndlot']           = $_POST['ndlot'];
	$data['IDELEVE']         = $_POST['IDELEVE'];
	$data['NIVEAUS']         = $_POST['NIVEAUS'];
	$data['ETABLIS']         = $_POST['ETABLIS'];
	$data['UDS']             = $_POST['UDS'];
	$data['STRUCTURE']       = $_POST['STRUCTURE'];
	$data['id']              = $_POST['id'];
	echo '<pre>';print_r ($data);echo '<pre>'; 
    $last_id=$this->model->editSave($data);
    header('location: '.URL.$this->controleur.'/search/0/10?o=IDELEVE&q='.$data['IDELEVE']);
	}
	
	
	public function delete($id)
	{
	$url1 = explode('/',$_GET['url']);	
	$this->model->deleteeemg($url1[3]);    
	header('location: ' . URL .$this->controleur. '/search/0/10?o=IDELEVE&q='.$url1[2]);
	}
	
 	
			
}
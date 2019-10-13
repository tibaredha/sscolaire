<?php
class hsl extends Controller { 
	
	public $controleur="hsl";
	
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
	function hsl($id) {
	    $this->view->title = 'hsl';
		$this->view->msg = 'hsl';
		$this->view->user = $this->model->userSingleListe($id);
		$this->view->render($this->controleur.'/hsl');
	}
	
	public function createhsl() 
	{
	$data['DATEV']          = $_POST['DATEV'];
	$data['ECOLE']          = $_POST['ECOLE'];
    $data['STRUCTURE']      = $_POST['STRUCTURE'];
	$data['UDS']            = $_POST['UDS'];
	$data['DATEV']          = $_POST['DATEV'];
	
	$data['hsl1']            = $_POST['hsl1'];
	$data['hsl2']            = $_POST['hsl2'];
	$data['hsl3']            = $_POST['hsl3'];
	$data['hsl4']            = $_POST['hsl4'];
	$data['hsl5']            = $_POST['hsl5'];
	$data['hsl6']            = $_POST['hsl6'];
	$data['hsl7']            = $_POST['hsl7'];
	$data['hsl8']            = $_POST['hsl8'];
	$data['hsl9']            = $_POST['hsl9'];
	$data['hsl10']           = $_POST['hsl10'];$data['DATEP']            = $_POST['DATEP'];
	$data['hsl11']           = $_POST['hsl11'];
	$data['hsl12']           = $_POST['hsl12'];
	$data['hsl13']           = $_POST['hsl13'];
	$data['hsl14']           = $_POST['hsl14'];
	$data['hsl15']           = $_POST['hsl15'];
	$data['hsl16']           = $_POST['hsl16'];
	$data['hsl17']           = $_POST['hsl17'];
	$data['hsl18']           = $_POST['hsl18'];
	$data['hsl19']           = $_POST['hsl19'];
	$data['hsl20']           = $_POST['hsl20'];
	$data['hsl21']           = $_POST['hsl21'];
	$data['hsl22']           = $_POST['hsl22'];
	$data['hsl23']           = $_POST['hsl23'];
	$data['hsl24']           = $_POST['hsl24'];
	$data['hsl25']           = $_POST['hsl25'];
	$data['hsl26']           = $_POST['hsl26'];
	$data['hsl27']           = $_POST['hsl27'];
	$data['hsl28']           = $_POST['hsl28'];
	$data['hsl29']           = $_POST['hsl29'];
	$data['hsl30']           = $_POST['hsl30'];

	// echo '<pre>';print_r ($data);echo '<pre>'; 
    $last_id=$this->model->createhsl($data);
    header('location: '.URL.$this->controleur.'/search/0/10?o=id&q='.$last_id);	
	}
	
	function edit($id) {
	 $url1 = explode('/',$_GET['url']);	
		$this->view->title = 'edit Examens de médecine generale ';
		$this->view->msg = 'Edit Examens de médecine generale';
		$this->view->user = $this->model->userSingleList($url1[2]);
		$this->view->render($this->controleur.'/edit');  
	}
	
	function editehsl($id) {
	$data['DATEV']          = $_POST['DATEV'];
	$data['ECOLE']          = $_POST['ECOLE'];
    $data['STRUCTURE']      = $_POST['STRUCTURE'];
	$data['UDS']            = $_POST['UDS'];
	$data['DATEV']          = $_POST['DATEV'];
	
	$data['hsl1']            = $_POST['hsl1'];
	$data['hsl2']            = $_POST['hsl2'];
	$data['hsl3']            = $_POST['hsl3'];
	$data['hsl4']            = $_POST['hsl4'];
	$data['hsl5']            = $_POST['hsl5'];
	$data['hsl6']            = $_POST['hsl6'];
	$data['hsl7']            = $_POST['hsl7'];
	$data['hsl8']            = $_POST['hsl8'];
	$data['hsl9']            = $_POST['hsl9'];
	$data['hsl10']           = $_POST['hsl10'];$data['DATEP']            = $_POST['DATEP'];
	$data['hsl11']           = $_POST['hsl11'];
	$data['hsl12']           = $_POST['hsl12'];
	$data['hsl13']           = $_POST['hsl13'];
	$data['hsl14']           = $_POST['hsl14'];
	$data['hsl15']           = $_POST['hsl15'];
	$data['hsl16']           = $_POST['hsl16'];
	$data['hsl17']           = $_POST['hsl17'];
	$data['hsl18']           = $_POST['hsl18'];
	$data['hsl19']           = $_POST['hsl19'];
	$data['hsl20']           = $_POST['hsl20'];
	$data['hsl21']           = $_POST['hsl21'];
	$data['hsl22']           = $_POST['hsl22'];
	$data['hsl23']           = $_POST['hsl23'];
	$data['hsl24']           = $_POST['hsl24'];
	$data['hsl25']           = $_POST['hsl25'];
	$data['hsl26']           = $_POST['hsl26'];
	$data['hsl27']           = $_POST['hsl27'];
	$data['hsl28']           = $_POST['hsl28'];
	$data['hsl29']           = $_POST['hsl29'];
	$data['hsl30']           = $_POST['hsl30'];
	$data['id']          = $id;
	//echo '<pre>';print_r ($data);echo '<pre>'; 
    $last_id=$this->model->editSave($data);
    header('location: ' . URL .$this->controleur. '/search/0/10?o=id&q='.$data['id']);
	}
	
	
	public function delete($id)
	{
	$this->model->deletehsl($id);    
	header('location: ' . URL .$this->controleur. '/search/0/10?o=id&q='.Session::get('uds'));
	}
	
   //**********************************************************************************************************************************//
	
	function soins($id) {
	   
	}
	
	function soinsx() {
	 
	}
			
}
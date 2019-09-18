<?php
class ecole extends Controller { 
	
	public $controleur="ecole";
	public $db_host=DB_HOST;
	public $db_name=DB_NAME;   
	public $db_user=DB_USER;
	public $db_pass=DB_PASS;
	
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
	
	function mysqlconnect()
	{
	$cnx = mysql_connect($this->db_host,$this->db_user,$this->db_pass)or die ('I cannot connect to the database because: ' . mysql_error());
	$db  = mysql_select_db($this->db_name,$cnx) ;
	mysql_query("SET NAMES 'UTF8' ");
	return $db;
	}
	
	function nbrtostring($tb_name,$colonename,$colonevalue,$resultatstring) 
	{
		if (is_numeric($colonevalue) and $colonevalue!=='0') 
		{ 
		$this->mysqlconnect();
		$result = mysql_query("SELECT * FROM $tb_name where $colonename=$colonevalue" );
		$row=mysql_fetch_object($result);
		$resultat=$row->$resultatstring;
		return $resultat;
		}
        else
        {
		return $resultat2='??????';
		}		
	}
	
	function ecole() {
	    $this->view->title = 'ecole';
		$this->view->msg = 'ecole';
		$this->view->render($this->controleur.'/ecole');
	}
	
	function searchecole()
	{
	    $url1 = explode('/',$_GET['url']);	
		$this->view->title = 'searchecole';
	    $this->view->msg = 'liste des ecoles ';
		$this->view->userListviewo = $_GET['o']; //criter de choix
	    $this->view->userListviewq = $_GET['q']; //key word  
		$this->view->userListviewp = $url1[2];    //parametre 2 page                     limit 2,3
		$this->view->userListviewl =8     ;     //parametre 3 nombre de ligne par page  limit 2,3 
		$this->view->userListviewb =15       ;   //parametre nombre de chiffre dan la barre  navigation
		$this->view->userListview = $this->model->userSearchstr($this->view->userListviewo,$this->view->userListviewq,$this->view->userListviewp,$this->view->userListviewl);
		$this->view->userListview1= $this->model->userSearchstr1($this->view->userListviewo,$this->view->userListviewq); // compte total pour bare de navigation
		$this->view->render($this->controleur.'/ecole');
	}
	
	
	function nouveauecole() {
	    $this->view->title = 'nouveauecole';
		$this->view->msg = 'Nouvelle ecole';
		$this->view->render($this->controleur.'/nouveauecole');
	}
	
	public function create() 
	{
		$data = array();
		$data['wilaya']       = $_POST['wilaya'];
		$data['COMMUNEECOLE'] = $_POST['COMMUNEECOLE'];
		$data['structure']    = $_POST['structure'];
		$data['uds']          = $_POST['uds'];
		$data['ecole']        = $_POST['ecole'];
		$data['ecolear']      = $_POST['ecolear'];
	    $data['lat']          = $_POST['lat'];
		$data['lg']           = $_POST['lg'];
		$data['class']        = $_POST['class'];
		$data['canti']        = $_POST['canti'];
		$data['pdh2o']        = $_POST['pdh2o'];
		$data['sanit']        = $_POST['sanit'];
		$data['typeecole']    = $_POST['typeecole'];
		
		//echo '<pre>';print_r ($data);echo '<pre>';  
		$last_id=$this->model->createecole($data);
		header('location: '.URL.$this->controleur.'/searchecole/0/10?o=id&q='.$last_id);
	}
	
	function editecole($id) {
	    $this->view->title = 'editecole';
		$this->view->msg = 'Modifier ecole';
		$this->view->user = $this->model->userSingleList($id);
		$this->view->render($this->controleur.'/editecole');
	}
	
	public function editSave($id) 
	{
		$data = array();
		$data['wilaya']       = $_POST['wilaya'];
		$data['COMMUNEECOLE'] = $_POST['COMMUNEECOLE'];
		$data['structure']    = $_POST['structure'];
		$data['uds']          = $_POST['uds'];
		$data['ecole']        = $_POST['ecole'];
		$data['ecolear']      = $_POST['ecolear'];
	    $data['lat']          = $_POST['lat'];
		$data['lg']           = $_POST['lg'];
		$data['id']           = $id;
		$data['class']        = $_POST['class'];
		$data['canti']        = $_POST['canti'];
		$data['pdh2o']        = $_POST['pdh2o'];
		$data['sanit']        = $_POST['sanit'];
		$data['typeecole']    = $_POST['typeecole'];
		// echo '<pre>';print_r ($data);echo '<pre>';  
		$this->model->editSave($data);
		header('location: '.URL.$this->controleur.'/searchecole/0/10?o=id&q='.$id);
	}
	
	
	
		
}
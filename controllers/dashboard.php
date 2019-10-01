<?php
class Dashboard extends Controller { 
	
	public $controleur="dashboard";
	
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
	
	// function logout()
	// {
		// Session::destroy();
		// header('location: '.URL.'');
		// exit;
	// }

	function notification() {
	    $this->view->title = 'notification';
		$this->view->msg = 'notification';
		$this->view->render($this->controleur.'/notification');
	}
	
	function index() {
	    $this->view->title = 'dashboard';
		$this->view->msg = 'dashboard';
		$this->view->render($this->controleur.'/index');
	}

	function flv6($flv) 
	{
	$this->view->title = $flv;
	$this->view->msg = 'dashboard';
	$this->view->flv=$flv;
	$this->view->render($this->controleur.'/flv6');    
	}
	
	function graphe($id) 
	{
	    $this->view->title = 'dashboard';
		$this->view->msg = 'dashboard';
		if($id!=0) {
		$this->view->render($this->controleur.'/index'.$id);
		} else {
		$this->view->render($this->controleur.'/index');
		}	
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
	
	function nouveau() {
	    $this->view->title = 'nouveau';
		$this->view->msg = 'nouveau';
		$this->view->render($this->controleur.'/nouveau');
	}
	
	public function create() 
	{
		$data = array();
		$data['DINS']          = $_POST['DINS'];
		$data['HINS']          = $_POST['HINS'];
		$data['NOM']           = $_POST['NOM'];
		$data['PRENOM']        = $_POST['PRENOM'];
		$data['FILSDE']        = $_POST['FILSDE'];
		$data['ETDE']          = $_POST['ETDE'];
		$data['SEXE']          = $_POST['SEXE'];
		$data['DATENS']        = $_POST['DATENS'];
		$data['WILAYAN']       = $_POST['WILAYAN'];
		$data['COMMUNEN']      = $_POST['COMMUNEN'];
		$data['WILAYAR']       = $_POST['WILAYAR'];
		$data['COMMUNER']      = $_POST['COMMUNER'];
		$data['ADRESSE']       = $_POST['ADRESSE'];
		$data['GABO']          = $_POST['GABO'];
		$data['WILAYA']        = $_POST['WILAYA'];
		$data['STRUCTURE']     = $_POST['STRUCTURE'];
		$data['UDS']           = $_POST['UDS'];
        $data['ECOLE']         = $_POST['ECOLE'];
        $data['PALIER']        = $_POST['PALIER'];
		$data['LOGIN']         = $_POST['LOGIN'];
		$data['NEC']           = $_POST['NEC'];
		$data['NOMAR']         = $_POST['NOMAR'];
		$data['PRENOMAR']      = $_POST['PRENOMAR'];
		$data['FILSDEAR']      = $_POST['FILSDEAR'];
		$data['ETDEAR']        = $_POST['ETDEAR'];
		$data['ADRESSEAR']     = $_POST['ADRESSEAR'];
		$data['code_patient']  = $_POST['code_patient'];
		// echo '<pre>';print_r ($data);echo '<pre>';  
		$last_id=$this->model->createeleve($data);
		header('location: '.URL.$this->controleur.'/nouveau/');
	}
	
	function edit($id) {
	    $this->view->title = 'edit deces';
		$this->view->msg = 'Edit deces';
		$this->view->user = $this->model->userSingleList($id);
		$this->view->render($this->controleur.'/edit');
	}
	
	public function editSave($id) 
	{
		$data = array();
		$data['DINS']          = $_POST['DINS'];
		$data['HINS']          = $_POST['HINS'];
		$data['NOM']           = $_POST['NOM'];
		$data['PRENOM']        = $_POST['PRENOM'];
		$data['FILSDE']        = $_POST['FILSDE'];
		$data['ETDE']          = $_POST['ETDE'];
		$data['SEXE']          = $_POST['SEXE'];
		$data['DATENS']        = $_POST['DATENS'];
		$data['WILAYAN']       = $_POST['WILAYAN'];
		$data['COMMUNEN']      = $_POST['COMMUNEN'];
		$data['WILAYAR']       = $_POST['WILAYAR'];
		$data['COMMUNER']      = $_POST['COMMUNER'];
		$data['ADRESSE']       = $_POST['ADRESSE'];
		$data['GABO']          = $_POST['GABO'];
		$data['NEC']           = $_POST['NEC'];
		$data['WILAYA']        = $_POST['WILAYA'];
		$data['STRUCTURE']     = $_POST['STRUCTURE'];
		$data['UDS']           = $_POST['UDS'];
        $data['ECOLE']         = $_POST['ECOLE'];
        $data['PALIER']        = $_POST['PALIER'];
		$data['LOGIN']         = $_POST['LOGIN'];
		$data['NOMAR']         = $_POST['NOMAR'];
		$data['PRENOMAR']      = $_POST['PRENOMAR'];
		$data['FILSDEAR']      = $_POST['FILSDEAR'];
		$data['ETDEAR']        = $_POST['ETDEAR'];
		$data['ADRESSEAR']     = $_POST['ADRESSEAR'];
		$data['code_patient']     = $_POST['code_patient'];
		$data['id']            = $id;
		//echo '<pre>';print_r ($data);echo '<pre>';  
		$last_id=$this->model->editSave($data);
		header('location: '.URL.$this->controleur.'/search/0/10?o=id&q='.$last_id);
	}
	
	public function delete($id)
	{
	$this->model->deleteeleve($id);    
	header('location: ' . URL .$this->controleur. '/search/0/10?o=NOM&q=');
	}
	public function Aprouve() 
	{
        $url1 = explode('/',$_GET['url']);	
		$data = array();
		$data['id']         = $url1[2];
		$data['aprouve']    = $url1[3];
		// echo '<pre>';print_r ($data);echo '<pre>';
		$this->model->Aprouve($data);
		header('location: ' . URL .$this->controleur.'/search/'.$url1[4].'/'.$url1[5].'?o=id&q=');
	}

	// **********************************************************************************************************************************//
	function Evaluation() {
	    $this->view->title = 'Evaluation';
		$this->view->msg = 'Evaluation';
		$this->view->render($this->controleur.'/Evaluation');
	}
	

    // **********************************************************************************************************************************// 
	
	// Passage
	
	function Passage() {
	    $this->view->title = 'Passage';
		$this->view->msg = 'Passage';
		// $this->view->render($this->controleur.'/Passage');
		$this->model->editPassage();
		header('location: '.URL.'administrateur/cfg/');
		
		
	}
	
	// ******************************************vaccination****************************************************************************************//
	function vaccination($id) {
	    $this->view->title = 'vaccination';
		$this->view->msg = 'vaccination';
		$this->view->user = $this->model->userSingleList($id);
		$this->view->render($this->controleur.'/vaccination');
	}
	
	
	public function createvaccin() 
	{
	$data['FDATE1']          = $_POST['FDATE1'];
	$data['FDATE2']          = $_POST['FDATE2'];
	$data['FDATE3']          = $_POST['FDATE3'];
	$data['FDATE4']          = $_POST['FDATE4'];
	$data['FDATE5']          = $_POST['FDATE5'];
	$data['FDATE6']          = $_POST['FDATE6'];
	$data['FDATE7']          = $_POST['FDATE7'];
	$data['FDATE8']          = $_POST['FDATE8'];
	$data['FDATE9']          = $_POST['FDATE9'];
	$data['FDATE10']         = $_POST['FDATE10'];
	$data['FDATE11']         = $_POST['FDATE11'];
	$data['RDATE1']          = $_POST['RDATE1'];
	$data['RDATE2']          = $_POST['RDATE2'];
	$data['RDATE3']          = $_POST['RDATE3'];
	$data['RDATE4']          = $_POST['RDATE4'];
	$data['RDATE5']          = $_POST['RDATE5'];
	$data['RDATE6']          = $_POST['RDATE6'];
	$data['RDATE7']          = $_POST['RDATE7'];
	$data['RDATE8']          = $_POST['RDATE8'];
	$data['RDATE9']          = $_POST['RDATE9'];
	$data['RDATE10']         = $_POST['RDATE10'];
	$data['RDATE11']         = $_POST['RDATE11'];
	$data['OBSER1']          = $_POST['OBSER1'];
	$data['OBSER2']          = $_POST['OBSER2'];
	$data['OBSER3']          = $_POST['OBSER3'];
	$data['OBSER4']          = $_POST['OBSER4'];
	$data['OBSER5']          = $_POST['OBSER5'];
	$data['OBSER6']          = $_POST['OBSER6'];
	$data['OBSER7']          = $_POST['OBSER7'];
	$data['OBSER8']          = $_POST['OBSER8'];
	$data['OBSER9']          = $_POST['OBSER9'];
	$data['OBSER10']         = $_POST['OBSER10'];
	$data['OBSER11']         = $_POST['OBSER11'];
	$data['IDELEVE']         = $_POST['IDELEVE'];
	$data['NIVEAUS']         = $_POST['NIVEAUS'];
	$data['ETABLIS']         = $_POST['ETABLIS'];
	$data['UDS']             = $_POST['UDS'];
	$data['STRUCTURE']       = $_POST['STRUCTURE'];

	//echo '<pre>';print_r ($data);echo '<pre>';
	$last_id=$this->model->createvac($data);
     header('location: '.URL.$this->controleur.'/search/0/10?o=id&q='.$data['IDELEVE']);			
	}
	
	
		
}
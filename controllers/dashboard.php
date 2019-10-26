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
		$data['classep']       = $_POST['classep'];
		$data['LOGIN']         = $_POST['LOGIN'];
		$data['NEC']           = $_POST['NEC'];
		$data['NOMAR']         = $_POST['NOMAR'];
		$data['PRENOMAR']      = $_POST['PRENOMAR'];
		$data['FILSDEAR']      = $_POST['FILSDEAR'];
		$data['ETDEAR']        = $_POST['ETDEAR'];
		$data['ADRESSEAR']     = $_POST['ADRESSEAR'];
		$data['code_patient']  = $_POST['code_patient'];
		$data['PROFESSION']    = $_POST['PROFESSION'];
		$data['TELPERE']       = $_POST['TELPERE'];
		$data['EMAILPERE']     = $_POST['EMAILPERE'];
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
		$data['classep']       = $_POST['classep'];
		$data['LOGIN']         = $_POST['LOGIN'];
		$data['NOMAR']         = $_POST['NOMAR'];
		$data['PRENOMAR']      = $_POST['PRENOMAR'];
		$data['FILSDEAR']      = $_POST['FILSDEAR'];
		$data['ETDEAR']        = $_POST['ETDEAR'];
		$data['ADRESSEAR']     = $_POST['ADRESSEAR'];
		$data['code_patient']  = $_POST['code_patient'];
		$data['PROFESSION']    = $_POST['PROFESSION'];
		$data['TELPERE']       = $_POST['TELPERE'];
		$data['EMAILPERE']     = $_POST['EMAILPERE'];
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

	
	
	//******************************************************CHANGER PHOTOS********************************************************//
	//**CHANGER PHOTOS**//
	
	function upl() 
	{
	$this->view->title = 'upload';
	$this->view->render($this->controleur.'/upl');    
	}
	function upl1($id) 
	{
		$this->view->title = 'upload';
		if (isset($_POST))
		{
			if (isset($_FILES))
			{
			
			$uploadLocation = "D:\\sscolaire/public/images/photos/sscolaire/"; 
			$target_path = $uploadLocation.trim($id).".jpg";      
				if(move_uploaded_file($_FILES['upfile']['tmp_name'], $target_path)) 
				{	
				$this->view->msg ='le fichier :  '.basename( $_FILES['upfile']['name']).'  a été corectement envoyer merci';
				} 
				else
				{
				$this->view->msg ='il ya une erreur d\'envoie du fichier :  '.basename( $_FILES['upfile']['name']).'  veillez recomencer svp';	
				}
			}	
		}
		header('location: ' . URL .$this->controleur.'/search/0/10?o=id&q='.$id); 
	}	
	
	
	
	
		
}
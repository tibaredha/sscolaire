<?php
class sql extends Controller { 
	
	public $controleur="sql";
	
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
	
	function Email() {
	    $this->view->title = 'Email';
		$this->view->msg = 'Email';
		$this->view->render($this->controleur.'/Email');
	}
	
	
	function Exporter() 
	{
	    $this->view->title = 'Exporter';
		$this->view->msg = 'Exporter';
		$this->view->render($this->controleur.'/Exporter');
	}
	
	
	function sql() 
	{  
		if($_POST['type']=='1')
		{
		$this->view->title = 'XLS';
		$this->view->msg = 'XLS';
		$this->view->d1 = $_POST['Datedebut'];
		$this->view->d2 = $_POST['Datefin'];
		$this->view->render($this->controleur.'/sql');
		}
		elseif($_POST['type']=='2')
		{
		// $this->view->title = 'XLS';
		// $this->view->msg = 'XLS';
		// $this->view->d1 = $_POST['Datedebut'];
		// $this->view->d2 = $_POST['Datefin'];
		// $this->view->render($this->controleur.'/XLS');
		}
		else
		{
		$this->view->title = 'error';
		$this->view->msg = 'This page doesnt exist';
		$this->view->render('Error/index');
		}
	}
	
	
	function Importer() {
	    $this->view->title = 'Importer';
		$this->view->msg = 'Importer';
		$this->view->render($this->controleur.'/Importer');
	}

	function Importer1() {
	    $this->view->title = 'Importer';
		$this->view->msg = 'Importer';
		$this->view->tbl_name =$_POST['tbl_name'];
		$this->view->Datedebut =$_POST['Datedebut'];
		$this->view->Datefin =$_POST['Datefin'];
		$this->view->render($this->controleur.'/Importer1');
	}
	
	function reset() {
	    $this->view->title = 'reset';
		$this->view->msg = 'reset';
		$this->model->reset();
		header('location: '.URL.'dashboard/cfg/');
	}
	function reseti() {
	    $this->view->title = 'reseti';
		$this->view->msg = 'reseti';
		$this->model->reseti();
		header('location: '.URL.'dashboard/cfg/');
	}
		
}
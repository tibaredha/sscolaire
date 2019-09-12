<?php

class Dashboard_Model extends Model {

    public $tbl="eleve";
    public $tblesbc="examensbd";
	
	public function __construct() {
		parent::__construct();
		// Session::init();
	}
	
	//*********************************************************************************************************************//
	public function userSearch($o, $q, $p, $l,$ad) {
	$structure = Session::get("structure");
    return $this->db->select("SELECT * FROM $this->tbl where STRUCTURE=$structure and $o like '$q%' order by $o $ad limit $p,$l ");// 
    }
    public function userSearch1($o, $q ,$ad) {
        $structure = Session::get("structure");
		return $this->db->select("SELECT * FROM $this->tbl where STRUCTURE=$structure and $o like '$q%' order by $o $ad ");//  
    }
	 public function userSingleList($id) {
        return $this->db->select("SELECT * FROM $this->tbl WHERE id = :id", array(':id' => $id));
    }
	
	
	public function createeleve($data) {
		$Date1 = $this->dateFR2US($data['DATENS']);//echo '</br>';
		$Date2 = $this->dateFR2US($data['DINS']);//echo '</br>';
		$Timestamp1 = $this->CalculateTimestampFromCurrDatetime($Date1);//echo '</br>';
		$Timestamp2 = $this->CalculateTimestampFromCurrDatetime($Date2);//echo '</br>';
		$DateDiff = $this->CalculateDateDifference($Timestamp1, $Timestamp2);//echo '</br>';
	    //echo '<pre>';print_r ($DateDiff);echo '<pre>';
		$this->db->insert($this->tbl, array(
			
			'DINS'     => $this->dateFR2US($data['DINS']),
            'HINS'     => $data['HINS'],
            'NOM'      => $data['NOM'],
            'PRENOM'   => $data['PRENOM'],
            'FILSDE'   => $data['FILSDE'],
			'ETDE'     => $data['ETDE'],
			'SEX'      => $data['SEXE'],
			'DATENS'   => $this->dateFR2US($data['DATENS']),
			'Days'     => $DateDiff['days'],
            'Weeks'    => $DateDiff['weeks'],
            'Months'   => $DateDiff['months'],
            'Years'    => $DateDiff['years'],
			'WILAYAN'  => $data['WILAYAN'],
            'COMMUNEN' => $data['COMMUNEN'],
            'WILAYAR'  => $data['WILAYAR'],
            'COMMUNER' => $data['COMMUNER'],
            'ADRESSE'  => $data['ADRESSE'],
			'WILAYA'   => $data['WILAYA'],
			'STRUCTURE'=> $data['STRUCTURE'],
            'UDS'      => $data['UDS'],
			'ECOLE'    => $data['ECOLE'],
			'PALIER'   => $data['PALIER'],
			'LOGIN'    => $data['LOGIN'],
			'NOMAR'    => $data['NOMAR'],
			'PRENOMAR' => $data['PRENOMAR'],
			'FILSDEAR' => $data['FILSDEAR'],
			'ETDEAR'   => $data['ETDEAR'],
			'ADRESSEAR'=> $data['ADRESSEAR'],
			'aprouve'  => "0"	
        ));
        echo '<pre>';print_r ($data);echo '<pre>';
		// return $last_id = $this->db->lastInsertId();
    }
	public function editSave($data) {
		$Date1 = $this->dateFR2US($data['DATENS']) ;//echo '</br>';
		$Date2 = $this->dateFR2US($data['DINS']) ;//echo '</br>';
		$Timestamp1 = $this->CalculateTimestampFromCurrDatetime($Date1);//echo '</br>';
		$Timestamp2 = $this->CalculateTimestampFromCurrDatetime($Date2);//echo '</br>';
		$DateDiff = $this->CalculateDateDifference($Timestamp1, $Timestamp2);//echo '</br>';
	    //echo '<pre>';print_r ($DateDiff);echo '<pre>';
		
		 $postData = array(
			'DINS'     => $this->dateFR2US($data['DINS']),
            'HINS'     => $data['HINS'],
            'NOM'      => $data['NOM'],
            'PRENOM'   => $data['PRENOM'],
            'FILSDE'   => $data['FILSDE'],
			'ETDE'     => $data['ETDE'],
			'SEX'      => $data['SEXE'],
			'DATENS'   => $this->dateFR2US($data['DATENS']),
			'Days'     => $DateDiff['days'],
            'Weeks'    => $DateDiff['weeks'],
            'Months'   => $DateDiff['months'],
            'Years'    => $DateDiff['years'],
			'WILAYAN'  => $data['WILAYAN'],
            'COMMUNEN' => $data['COMMUNEN'],
            'WILAYAR'  => $data['WILAYAR'],
            'COMMUNER' => $data['COMMUNER'],
            'ADRESSE'  => $data['ADRESSE'],
			'WILAYA'   => $data['WILAYA'],
			'STRUCTURE'=> $data['STRUCTURE'],
            'UDS'      => $data['UDS'],
			'ECOLE'    => $data['ECOLE'],
			'PALIER'   => $data['PALIER'],
			'LOGIN'    => $data['LOGIN'],
			'NOMAR'    => $data['NOMAR'],
			'PRENOMAR' => $data['PRENOMAR'],
			'FILSDEAR' => $data['FILSDEAR'],
			'ETDEAR'   => $data['ETDEAR'],
			'ADRESSEAR'=> $data['ADRESSEAR'],
			'aprouve'  => "0"	
        );
       //echo '<pre>';print_r ($postData);echo '<pre>'; 
        $this->db->update($this->tbl, $postData, "id =" . $data['id'] . "");
		return $last_id = $data['id'];
    }
	
	public function deleteeleve($id) {       
        $this->db->delete($this->tbl, "id = '$id'");
    }
    
	public function Aprouve($data) {
        $postData = array('aprouve' => $data['aprouve']);
        $this->db->update($this->tbl, $postData, "id =" . $data['id'] . "");
		//echo '<pre>';print_r ($postData);echo '<pre>'; 
    }
	//*****************************************************************************************************************//
	public function createexamen($data) {
	
	$this->db->insert($this->tblesbc, array(
	            
				'IDELEVE'   => $data['IDELEVE'],
				'STRUCTURE' => $data['STRUCTURE'],
				'UDS'       => $data['UDS'],
				'ETABLIS'   => $data['ETABLIS'],
				'DATESBD'   => $this->dateFR2US($data['DATESBD']),
				'NIVEAUS'   => $data['NIVEAUS'],
				'HYGIENE'   => $data['HYGIENE'],
				'GINGIVITE' => $data['GINGIVITE'],
				'AODF'      => $data['AODF'],
				'C'         => $data['C'],
				'A'         => $data['A'],
				'O'         => $data['O'],
				'CAO'       => $data['CAO'],
				'PC'        => $data['PC'],
				'PA'        => $data['PA'],
				'PO'        => $data['PO'],
				'PCAO'      => $data['PCAO'],
				
				'OKRDV'     => $data['OKRDV'],
				'DATECSBD'  =>$this->dateFR2US($data['DATECSBD']),
				
		
        ));
        
		// echo '<pre>';print_r ($data);echo '<pre>';
		 
		return $last_id = $this->db->lastInsertId();
	}
		
}
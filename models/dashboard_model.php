<?php

class Dashboard_Model extends Model {

    public $tbl="eleve";
    public $tblesbc="examensbd";
	public $tbleemg="examenemg";

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
			'GABO'     => $data['GABO'],
			'NEC'      => $data['NEC'],
			'WILAYA'   => $data['WILAYA'],
			'STRUCTURE'=> $data['STRUCTURE'],
            'UDS'      => $data['UDS'],
			'ECOLE'    => $data['ECOLE'],
			'PALIER'   => $data['PALIER'],
			'classep'  => $data['classep'],
			'LOGIN'    => $data['LOGIN'],
			'NOMAR'    => $data['NOMAR'],
			'PRENOMAR' => $data['PRENOMAR'],
			'FILSDEAR' => $data['FILSDEAR'],
			'ETDEAR'   => $data['ETDEAR'],
			'ADRESSEAR'=> $data['ADRESSEAR'],
			'code_patient'=> $data['code_patient'],
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
			'GABO'     => $data['GABO'],
			'NEC'      => $data['NEC'],
			'WILAYA'   => $data['WILAYA'],
			'STRUCTURE'=> $data['STRUCTURE'],
            'UDS'      => $data['UDS'],
			'ECOLE'    => $data['ECOLE'],
			'PALIER'   => $data['PALIER'],
			'classep'  => $data['classep'],
			'LOGIN'    => $data['LOGIN'],
			'NOMAR'    => $data['NOMAR'],
			'PRENOMAR' => $data['PRENOMAR'],
			'FILSDEAR' => $data['FILSDEAR'],
			'ETDEAR'   => $data['ETDEAR'],
			'ADRESSEAR'=> $data['ADRESSEAR'],
			'code_patient'=> $data['code_patient'],
			'aprouve'  => "0"	
        );
       //echo '<pre>';print_r ($postData);echo '<pre>'; 
        $this->db->update($this->tbl, $postData, "id =" . $data['id'] . "");
		return $last_id = $data['id'];
    }
	
	public function deleteeleve($id) {       
        $this->db->delete($this->tbl, "id = '$id'");
		$this->db->deletem("examensbd", "IDELEVE = '$id'");
		$this->db->deletem("examenemg", "IDELEVE = '$id'");
		$this->db->deletem("vaccination1", "IDELEVE = '$id'");
		$this->db->deletem("para", "IDELEVE = '$id'");	
    }
    
	public function Aprouve($data) {
        $postData = array('aprouve' => $data['aprouve']);
        $this->db->update($this->tbl, $postData, "id =" . $data['id'] . "");
		//echo '<pre>';print_r ($postData);echo '<pre>'; 
    }
	
	
	
	//*********************************************************************************************//
	
	public function editPassage() {
		
	    $uds = Session::get("uds");
        $sth = $this->db->prepare("SELECT * FROM $this->tbl where UDS=$uds ");		
		$sth->execute();
		while ($datax = $sth->fetch()) 
		{
		 $NPALIER=$datax['PALIER']+1;
		 $postData = array('PALIER'=> $NPALIER);
		 $this->db->update($this->tbl, $postData, "id =" .$datax['id'] . "");
		}
		}
	
	
	
	
	//*********************************************************************************************//
	
	
	
	
	
		
}
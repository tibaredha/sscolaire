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
				'DATECSBD'  =>$this->dateFR2US($data['DATECSBD'])
				
		
        ));
        
		// echo '<pre>';print_r ($data);echo '<pre>';
		 
		return $last_id = $this->db->lastInsertId();
	}
	
	//*****************************************************************************************************************//
	public function createemg($data) {
	
	$this->db->insert($this->tbleemg, array(
	            
				'DATESBD'=> $this->dateFR2US($data['DATESBD']),
				'm0'     => $data['m0'],
				'm1'     => $data['m1'],
				'm2'     => $data['m2'],
				'm3'     => $data['m3'],
				'm4'     => $data['m4'],
				'm5'     => $data['m5'],
				'm6'     => $data['m6'],
				'm7'     => $data['m7'],
				'm8'     => $data['m8'],
				'm9'     => $data['m9'],
				'm10'    => $data['m10'],
				'm11'    => $data['m11'],
				'm12'    => $data['m12'],
				'm13'    => $data['m13'],
				'm14'    => $data['m14'],
				'm15'    => $data['m15'],
				'm16'    => $data['m16'],
				'm17'    => $data['m17'],
				'm18'    => $data['m18'],
				'm19'    => $data['m19'],
				'm20'    => $data['m20'],
				'm21'    => $data['m21'],
				'm22'    => $data['m22'],
				'm23'    => $data['m23'],
				'm24'    => $data['m24'],
				'OKRDV'     => $data['OKRDV'],
				'DATECSBD'  =>$this->dateFR2US($data['DATECSBD']),
				'IDELEVE'   => $data['IDELEVE'],
				'STRUCTURE' => $data['STRUCTURE'],
				'UDS'       => $data['UDS'],
				'ETABLIS'   => $data['ETABLIS'],
				'NIVEAUS'   => $data['NIVEAUS']
        ));
        
		echo '<pre>';print_r ($data);echo '<pre>';
		 
		return $last_id = $this->db->lastInsertId();
	}
	
	
	//*********************************************************************************************//
	
	public function editPassage() {
		
	   
        $sth = $this->db->prepare("SELECT * FROM $this->tbl");		
		$sth->execute();
		while ($datax = $sth->fetch()) 
		{
		 $NPALIER=$datax['PALIER']+1;
		 $postData = array('PALIER'=> $NPALIER);
		 $this->db->update($this->tbl, $postData, "id =" .$datax['id'] . "");
		}
		}
	
	
	
	
	
	
	
	
	
		
}
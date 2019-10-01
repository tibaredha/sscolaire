<?php

class Dashboard_Model extends Model {

    public $tbl="eleve";
    public $tblesbc="examensbd";
	public $tbleemg="examenemg";
	public $vaccination="vaccination";
	
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
	
	
	
	//*********************************************************************************************//
	public function createvac($data) {
	
	$this->db->insert($this->vaccination, array(
	            
				'FDATE1'=> $this->dateFR2US($data['FDATE1']),
				'FDATE2'=> $this->dateFR2US($data['FDATE2']),
				'FDATE3'=> $this->dateFR2US($data['FDATE3']),
				'FDATE4'=> $this->dateFR2US($data['FDATE4']),
				'FDATE5'=> $this->dateFR2US($data['FDATE5']),
				'FDATE6'=> $this->dateFR2US($data['FDATE6']),
				'FDATE7'=> $this->dateFR2US($data['FDATE7']),
				'FDATE8'=> $this->dateFR2US($data['FDATE8']),
				'FDATE9'=> $this->dateFR2US($data['FDATE9']),
				'FDATE10'=> $this->dateFR2US($data['FDATE10']),
				'FDATE11'=> $this->dateFR2US($data['FDATE11']),
				'RDATE1'=> $this->dateFR2US($data['RDATE1']),
				'RDATE2'=> $this->dateFR2US($data['RDATE2']),
				'RDATE3'=> $this->dateFR2US($data['RDATE3']),
				'RDATE4'=> $this->dateFR2US($data['RDATE4']),
				'RDATE5'=> $this->dateFR2US($data['RDATE5']),
				'RDATE6'=> $this->dateFR2US($data['RDATE6']),
				'RDATE7'=> $this->dateFR2US($data['RDATE7']),
				'RDATE8'=> $this->dateFR2US($data['RDATE8']),
				'RDATE9'=> $this->dateFR2US($data['RDATE9']),
				'RDATE10'=> $this->dateFR2US($data['RDATE10']),
				'RDATE11'=> $this->dateFR2US($data['RDATE11']),
				'OBSER1'   => $data['OBSER1'],
				'OBSER2'   => $data['OBSER2'],
				'OBSER3'   => $data['OBSER3'],
				'OBSER4'   => $data['OBSER4'],
				'OBSER5'   => $data['OBSER5'],
				'OBSER6'   => $data['OBSER6'],
				'OBSER7'   => $data['OBSER7'],
				'OBSER8'   => $data['OBSER8'],
				'OBSER9'   => $data['OBSER9'],
				'OBSER10'   => $data['OBSER10'],
				'OBSER11'   => $data['OBSER11'],
				'IDELEVE'   => $data['IDELEVE'],
				'NIVEAUS'   => $data['NIVEAUS'],
				'ETABLIS'   => $data['ETABLIS'],
				'UDS'       => $data['UDS'],
				'STRUCTURE' => $data['STRUCTURE']		
        ));
		//echo '<pre>';print_r ($data);echo '<pre>'; 
		return $last_id = $this->db->lastInsertId();
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
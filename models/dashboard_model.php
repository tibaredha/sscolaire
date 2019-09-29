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
				'DATECSBD'  =>$this->dateFR2US($data['DATECSBD']),
				'd11'=>$data['d11'],
				'd12'=>$data['d12'],
				'd13'=>$data['d13'],
				'd14'=>$data['d14'],
				'd15'=>$data['d15'],
				'd16'=>$data['d16'],
				'd17'=>$data['d17'],
				'd18'=>$data['d18'],
				'd21'=>$data['d21'],
				'd22'=>$data['d22'],
				'd23'=>$data['d23'],
				'd24'=>$data['d24'],
				'd25'=>$data['d25'],
				'd26'=>$data['d26'],
				'd27'=>$data['d27'],
				'd28'=>$data['d28'],
				'd31'=>$data['d31'],
				'd32'=>$data['d32'],
				'd33'=>$data['d33'],
				'd34'=>$data['d34'],
				'd35'=>$data['d35'],
				'd36'=>$data['d36'],
				'd37'=>$data['d37'],
				'd38'=>$data['d38'],
				'd41'=>$data['d41'],
				'd42'=>$data['d42'],
				'd43'=>$data['d43'],
				'd44'=>$data['d44'],
				'd45'=>$data['d45'],
				'd46'=>$data['d46'],
				'd47'=>$data['d47'],
				'd48'=>$data['d48'],
				'd51'=>$data['d51'],
				'd52'=>$data['d52'],
				'd53'=>$data['d53'],
				'd54'=>$data['d54'],
				'd55'=>$data['d55'],
				'd61'=>$data['d61'],
				'd62'=>$data['d62'],
				'd63'=>$data['d63'],
				'd64'=>$data['d64'],
				'd65'=>$data['d65'],
				'd71'=>$data['d71'],
				'd72'=>$data['d72'],
				'd73'=>$data['d73'],
				'd74'=>$data['d74'],
				'd75'=>$data['d75'],
				'd81'=>$data['d81'],
				'd82'=>$data['d82'],
				'd83'=>$data['d83'],
				'd84'=>$data['d84'],
				'd85'=>$data['d85']
        ));
        
		// echo '<pre>';print_r ($data);echo '<pre>';
		 
		return $last_id = $this->db->lastInsertId();
	}
	
	//*****************************************************************************************************************//
	public function createemg($data) {
	
	$this->db->insert($this->tbleemg, array(
	            
				'DATESBD'=> $this->dateFR2US($data['DATESBD']),
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
				'm25'    => $data['m25'],
				'm26'    => $data['m26'],
				'm27'    => $data['m27'],
				'm28'    => $data['m28'],
				'm29'    => $data['m29'],
				'm30'    => $data['m30'],
				'm31'    => $data['m31'],
				'm32'    => $data['m32'],
				'm33'    => $data['m33'],
				'm34'    => $data['m34'],
				'm35'    => $data['m35'],
				'm36'    => $data['m36'],
				'm37'    => $data['m37'],
				'm38'    => $data['m38'],
				'm39'    => $data['m39'],
				'm40'    => $data['m40'],
				'm41'    => $data['m41'],
				'm42'    => $data['m42'],
				'm43'    => $data['m43'],
				'm44'    => $data['m44'],
				'm45'    => $data['m45'],
				'm46'    => $data['m46'],
				'm47'    => $data['m47'],
				'm48'    => $data['m48'],
				'm49'    => $data['m49'],
				'm50'    => $data['m50'],
				'm51'    => $data['m51'],
				'm52'    => $data['m52'],
				'm53'    => $data['m53'],
				'm54'    => $data['m54'],
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
	
	
	
	
	
	
	
	
	
		
}
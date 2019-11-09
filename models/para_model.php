<?php

class para_Model extends Model {

    public $tbleemg="para";
	
	public function __construct() {
		parent::__construct();
		// Session::init();
	}
	
	//*********************************************************************************************************************//
	public function userSearch($o, $q, $p, $l,$ad) {
	$structure = Session::get("structure");
    return $this->db->select("SELECT * FROM $this->tbleemg where STRUCTURE=$structure and $o like '$q%' order by $o $ad limit $p,$l ");// 
    }
    public function userSearch1($o, $q ,$ad) {
        $structure = Session::get("structure");
		return $this->db->select("SELECT * FROM $this->tbleemg where STRUCTURE=$structure and $o like '$q%' order by $o $ad ");//  
    }
	public function userSingleList($id) {
        return $this->db->select("SELECT * FROM $this->tbleemg WHERE id = :id", array(':id' => $id));
    }
	
	public function userSingleListe($id) {
        return $this->db->select("SELECT * FROM eleve WHERE id = :id", array(':id' => $id));
    }
	
	public function createpara($data) {
	
	$Date1 = $data['DATENS'];
	$Date2 = $data['DATEEXAMEN'];
	$Timestamp1 = $this->CalculateTimestampFromCurrDatetime($Date1);//echo '</br>';
	$Timestamp2 = $this->CalculateTimestampFromCurrDatetime($Date2);//echo '</br>';
	$DateDiff = $this->CalculateDateDifference($Timestamp1, $Timestamp2);//echo '</br>';

	$this->db->insert($this->tbleemg, array(
	            
				'DATEEXAMEN'=> $data['DATEEXAMEN'],
				'POIDS'     => $data['POIDS'],
		        'TAILLE'    => $data['TAILLE'],
		        'TA'        => $data['TA'],
		        'AV'        => $data['AV'],
		        'ACV'       => $data['ACV'],
				'IDELEVE'   => $data['IDELEVE'],
				'STRUCTURE' => $data['STRUCTURE'],
				'UDS'       => $data['UDS'],
				'ETABLIS'   => $data['ETABLIS'],
				'NIVEAUS'   => $data['NIVEAUS'],
				'BMI'       => round(($data['POIDS']/(($data['TAILLE']/100)*($data['TAILLE']/100))),2),
				'Days'     => $DateDiff['days'],
				'Weeks'    => $DateDiff['weeks'],
				'Months'   => $DateDiff['months'],
				'Years'    => $DateDiff['years']		
        ));
        
		//echo '<pre>';print_r ($data);echo '<pre>';
		 
		return $last_id = $this->db->lastInsertId();
	}
	
	public function editSave($data) {
	
	            $postData = array(
				// 'DATESBD'=> $this->dateFR2US($data['DATESBD']),
				// 'm1'     => $data['m1'],
				// 'm2'     => $data['m2'],
				// 'm3'     => $data['m3'],
				// 'm4'     => $data['m4'],
				// 'm5'     => $data['m5'],
				// 'm6'     => $data['m6'],
				// 'm7'     => $data['m7'],
				// 'm8'     => $data['m8'],
				// 'm9'     => $data['m9'],
				// 'm10'    => $data['m10'],
				// 'm11'    => $data['m11'],
				// 'm12'    => $data['m12'],
				// 'm13'    => $data['m13'],
				// 'm14'    => $data['m14'],
				// 'm15'    => $data['m15'],
				// 'm16'    => $data['m16'],
				// 'm17'    => $data['m17'],
				// 'm18'    => $data['m18'],
				// 'm19'    => $data['m19'],
				// 'm20'    => $data['m20'],
				// 'm21'    => $data['m21'],
				// 'm22'    => $data['m22'],
				// 'm23'    => $data['m23'],
				// 'm24'    => $data['m24'],
				// 'm25'    => $data['m25'],
				// 'm26'    => $data['m26'],
				// 'm27'    => $data['m27'],
				// 'm28'    => $data['m28'],
				// 'm29'    => $data['m29'],
				// 'm30'    => $data['m30'],
				// 'm31'    => $data['m31'],
				// 'm32'    => $data['m32'],
				// 'm33'    => $data['m33'],
				// 'm34'    => $data['m34'],
				// 'm35'    => $data['m35'],
				// 'm36'    => $data['m36'],
				// 'm37'    => $data['m37'],
				// 'm38'    => $data['m38'],
				// 'm39'    => $data['m39'],
				// 'm40'    => $data['m40'],
				// 'm41'    => $data['m41'],
				// 'm42'    => $data['m42'],
				// 'm43'    => $data['m43'],
				// 'm44'    => $data['m44'],
				// 'm45'    => $data['m45'],
				// 'm46'    => $data['m46'],
				// 'm47'    => $data['m47'],
				// 'm48'    => $data['m48'],
				// 'm49'    => $data['m49'],
				// 'm50'    => $data['m50'],
				// 'm51'    => $data['m51'],
				// 'm52'    => $data['m52'],
				// 'm53'    => $data['m53'],
				// 'm54'    => $data['m54'],
				// 'OKRDV'     => $data['OKRDV'],
				// 'DATECSBD'  =>$this->dateFR2US($data['DATECSBD']),
				// 'IDELEVE'   => $data['IDELEVE'],
				// 'STRUCTURE' => $data['STRUCTURE'],
				// 'UDS'       => $data['UDS'],
				// 'ETABLIS'   => $data['ETABLIS'],
				// 'NIVEAUS'   => $data['NIVEAUS']
        );
	
	//echo '<pre>';print_r ($postData);echo '<pre>';
	$this->db->update($this->tbleemg, $postData, "id =" . $data['id'] . "");
    return $last_id = $data['id'];
	
	}
	
	public function deletepara($id) {       
        $this->db->delete($this->tbleemg, "id = '$id'");
    }
		
}
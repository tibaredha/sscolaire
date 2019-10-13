<?php

class hsl_Model extends Model {

    public $tbleemg="hsl";
	
	public function __construct() {
		parent::__construct();
		// Session::init();
	}
	
	//*********************************************************************************************************************//
	public function userSearch($o, $q, $p, $l,$ad) {
	$structure = Session::get("structure");
    return $this->db->select("SELECT * FROM $this->tbleemg ");// where STRUCTURE=$structure and $o like '$q%' order by $o $ad limit $p,$l 
    }
    public function userSearch1($o, $q ,$ad) {
        $structure = Session::get("structure");
		return $this->db->select("SELECT * FROM $this->tbleemg ");// where STRUCTURE=$structure and $o like '$q%' order by $o $ad  
    }
	public function userSingleList($id) {
        return $this->db->select("SELECT * FROM $this->tbleemg WHERE id = :id", array(':id' => $id));
    }
	
	public function userSingleListe($id) {
        return $this->db->select("SELECT * FROM eleve WHERE id = :id", array(':id' => $id));
    }
	
	public function createhsl($data) {
	
	$this->db->insert($this->tbleemg, array(
	            
				'DATEV'     => $this->dateFR2US($data['DATEV']),
		        'ETABLIS'   => $data['ECOLE'],
				'STRUCTURE' => $data['STRUCTURE'],
				'UDS'       => $data['UDS'],	
				'hsl1'      => $data['hsl1'],	
				'hsl2'      => $data['hsl2'],	
				'hsl3'      => $data['hsl3'],	
				'hsl4'      => $data['hsl4'],	
				'hsl5'      => $data['hsl5'],	
				'hsl6'      => $data['hsl6'],	
				'hsl7'      => $data['hsl7'],	
				'hsl8'      => $data['hsl8'],	
				'hsl9'      => $data['hsl9'],	
				'hsl10'     => $data['hsl10'],'DATEP' => $data['DATEP'],	
                'hsl11'     => $data['hsl11'],	
				'hsl12'     => $data['hsl12'],	
				'hsl13'     => $data['hsl13'],	
				'hsl14'     => $data['hsl14'],	
				'hsl15'     => $data['hsl15'],	
				'hsl16'     => $data['hsl16'],	
				'hsl17'     => $data['hsl17'],	
				'hsl18'     => $data['hsl18'],	
				'hsl19'     => $data['hsl19'],	
				'hsl20'     => $data['hsl20'],
                'hsl21'     => $data['hsl21'],	
				'hsl22'     => $data['hsl22'],	
				'hsl23'     => $data['hsl23'],	
				'hsl24'     => $data['hsl24'],	
				'hsl25'     => $data['hsl25'],	
				'hsl26'     => $data['hsl26'],	
				'hsl27'     => $data['hsl27'],	
				'hsl28'     => $data['hsl28'],	
				'hsl29'     => $data['hsl29'],	
				'hsl30'     => $data['hsl30']		
        ));
        
		//echo '<pre>';print_r ($data);echo '<pre>';
		return $last_id = $this->db->lastInsertId();
	}
	
	public function editSave($data) {
	
	            $postData = array(
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
        );
	
	//echo '<pre>';print_r ($postData);echo '<pre>';
	$this->db->update($this->tbleemg, $postData, "id =" . $data['id'] . "");
    return $last_id = $data['id'];
	
	}
	
	public function deletehsl($id) {       
        $this->db->delete($this->tbleemg, "id = '$id'");
    }
		
}
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
        );
	
	//echo '<pre>';print_r ($postData);echo '<pre>';
	$this->db->update($this->tbleemg, $postData, "id =" . $data['id'] . "");
    return $last_id = $data['id'];
	
	}
	
	public function deletehsl($id) {       
        $this->db->delete($this->tbleemg, "id = '$id'");
    }
		
}
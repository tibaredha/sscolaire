<?php

class vac_Model extends Model {

    public $tbleemg="vaccination1";
	
	public function __construct() {
		parent::__construct();
		// Session::init();
	}
	
	//*********************************************************************************************************************//
	public function userSearch($o, $q, $p, $l,$ad) {
	$structure = Session::get("structure");
    return $this->db->select("SELECT * FROM $this->tbleemg where STRUCTURE=$structure and $o like '$q%' order by vaccin limit $p,$l ");// 
    }
    public function userSearch1($o, $q ,$ad) {
        $structure = Session::get("structure");
		return $this->db->select("SELECT * FROM $this->tbleemg where STRUCTURE=$structure and $o like '$q%' order by vaccin ");//  
    }
	public function userSingleList($id) {
        return $this->db->select("SELECT * FROM $this->tbleemg WHERE id = :id", array(':id' => $id));
    }
	
	public function userSingleListe($id) {
        return $this->db->select("SELECT * FROM eleve WHERE id = :id", array(':id' => $id));
    }
	
	public function createvac1($data) {
	
	$this->db->insert($this->tbleemg, array(
	            
				'vaccin'    => $data['vaccin'],
				'datevac'   => $this->dateFR2US($data['datevac']),
				'dateper'   => $this->dateFR2US($data['dateper']),
				'ndlot'     => $data['ndlot'],
				'IDELEVE'   => $data['IDELEVE'],
				'NIVEAUS'   => $data['NIVEAUS'],
				'ETABLIS'   => $data['ETABLIS'],
				'UDS'       => $data['UDS'],
				'STRUCTURE' => $data['STRUCTURE']		
        ));
		//echo '<pre>';print_r ($data);echo '<pre>'; 
		return $last_id = $this->db->lastInsertId();
	}
	
	
	public function editSave($data) {

	            $postData = array(
				'vaccin'    => $data['vaccin'],
				'datevac'   => $this->dateFR2US($data['datevac']),
				'dateper'   => $this->dateFR2US($data['dateper']),
				'ndlot'     => $data['ndlot'],
				'IDELEVE'   => $data['IDELEVE'],
				'NIVEAUS'   => $data['NIVEAUS'],
				'ETABLIS'   => $data['ETABLIS'],
				'UDS'       => $data['UDS'],
				'STRUCTURE' => $data['STRUCTURE']		
        );

	echo '<pre>';print_r ($postData);echo '<pre>';
	$this->db->update($this->tbleemg, $postData, "id =" . $data['id'] . "");
    return $last_id = $data['id'];
	}
	
	public function deleteeemg($id) {       
        $this->db->delete($this->tbleemg, "id = '$id'");
    }
		
}
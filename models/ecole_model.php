<?php
class ecole_Model extends Model {

	public function __construct() {
		parent::__construct();
		// Session::init();
	}
	//*********************************************************************************************************************//
	public function userSearchstr($o, $q, $p, $l) {
	$uds = Session::get("uds");
    return $this->db->select("SELECT * FROM ecole where  $o like '$q%' order by typeecole,ecole limit $p,$l ");// iduds=$uds and 
    }
    public function userSearchstr1($o, $q) {
        $uds = Session::get("uds");
		return $this->db->select("SELECT * FROM ecole where  $o like '$q%' order by typeecole,ecole");//  iduds=$uds and 
    }
	
	public function userSingleList($id) {
        return $this->db->select('SELECT * FROM ecole WHERE id = :id', array(':id' => $id));
     }
	 
	 public function editSave($data) {
		 $postData = array(
			
			'idwil'   => $data['wilaya'],
			'idcom'   => $data['COMMUNEECOLE'],
			'ids'     => $data['structure'],
			'iduds'   => $data['uds'],
            'ecole'   => $data['ecole'],
			'ecolear' => $data['ecolear'],
			'class'   => $data['class'],
			'canti'   => $data['canti'],
			'pdh2o'   => $data['pdh2o'],
			'sanit'   => $data['sanit'],
			'lat'     => $data['lat'],
			'lg'      => $data['lg'],
			'typeecole' => $data['typeecole']
        );
       //echo '<pre>';print_r ($postData);echo '<pre>'; 
       $this->db->update('ecole', $postData, "id =" . $data['id'] . "");
    }
	 
	public function createecole($data) {
	
		$this->db->insert('ecole', array(
			'idwil'   => $data['wilaya'],
			'idcom'   => $data['COMMUNEECOLE'],
			'ids'     => $data['structure'],
			'iduds'   => $data['uds'],
            'ecole'   => $data['ecole'],
			'ecolear' => $data['ecolear'],
			'class'   => $data['class'],
			'canti'   => $data['canti'],
			'pdh2o'   => $data['pdh2o'],
			'sanit'   => $data['sanit'],
			'lat'     => $data['lat'],
			'lg'      => $data['lg'],
			'typeecole' => $data['typeecole']
        ));
        // echo '<pre>';print_r ($data);echo '<pre>';
		return $last_id = $this->db->lastInsertId();
    }
	
	
	public function deleteecole($id) {       
        $this->db->delete("ecole", "id = '$id'");
	}
	
	
	
	
}
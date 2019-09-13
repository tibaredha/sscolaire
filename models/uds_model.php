<?php
class uds_Model extends Model {

	public function __construct() {
		parent::__construct();
		// Session::init();
	}
	//*********************************************************************************************************************//
	public function userSearchstr($o, $q, $p, $l) {
	// $structure = Session::get("structure");
    return $this->db->select("SELECT * FROM uds where  $o like '$q%' order by idwil,ids limit $p,$l ");// 
    }
    public function userSearchstr1($o, $q) {
        // $structure = Session::get("structure");
		return $this->db->select("SELECT * FROM uds where  $o like '$q%' order by idwil,ids");//  
    }
	
	public function userSingleList($id) {
        return $this->db->select('SELECT * FROM uds WHERE id = :id', array(':id' => $id));
     }
	 
	 public function editSave($data) {
		 $postData = array(
			'uds'     => $data['uds'],
            'udsar'   => $data['udsar'],
			'idwil'   => $data['wilaya'],
			'ids'     => $data['structure'],
			'lat'     => $data['lat'],
			'lg'      => $data['lg']
        );
       echo '<pre>';print_r ($postData);echo '<pre>'; 
       $this->db->update('uds', $postData, "id =" . $data['id'] . "");
    }
	 
	public function createstr($data) {
	
		$this->db->insert('structure', array(
			'structure'      => $data['structure'],
			'idwil'          => $data['WILAYA2'],
            'commune'        => $data['COMMUNE2'],
			'structurear'    => $data['structurear'], 
            'daira'          => $data['daira'],
			'numcom'         => $data['COMMUNE2'],
			'com'            => $data['com']   	
        ));
        // echo '<pre>';print_r ($data);echo '<pre>';
		return $last_id = $this->db->lastInsertId();
    }
	
}
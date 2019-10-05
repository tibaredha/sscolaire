<?php

class sbd_Model extends Model {

    public $tblesbc="examensbd";
	
	public function __construct() {
		parent::__construct();
		// Session::init();
	}
	
	//*********************************************************************************************************************//
	public function userSearch($o, $q, $p, $l,$ad) {
	$structure = Session::get("structure");
    return $this->db->select("SELECT * FROM $this->tblesbc where STRUCTURE=$structure and $o like '$q%' order by $o $ad limit $p,$l ");// 
    }
    public function userSearch1($o, $q ,$ad) {
        $structure = Session::get("structure");
		return $this->db->select("SELECT * FROM $this->tblesbc where STRUCTURE=$structure and $o like '$q%' order by $o $ad ");//  
    }
	public function userSingleList($id) {
        return $this->db->select("SELECT * FROM $this->tblesbc WHERE id = :id", array(':id' => $id));
    }
	
	public function userSingleListe($id) {
        return $this->db->select("SELECT * FROM eleve WHERE id = :id", array(':id' => $id));
    }
	
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
		// return $last_id = $this->db->lastInsertId();
		if($data['OKRDV']=="1") {
		$this->db->insert("rdvsscolaire", array(
	            
				'DATEEXAMEN'=> $this->dateFR2US($data['DATESBD']),
				'DATERDV'   => $this->dateFR2US($data['DATECSBD']),
				'IDELEVE'   => $data['IDELEVE'],
				'PRATICIEN' => "Dentiste",
		        'RDVOK'     => "0"
        ));
		}
		
		
	}
	
	public function editSave($data) {
	
	            $postData = array(
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
        );
	
	//echo '<pre>';print_r ($postData);echo '<pre>';
	$this->db->update($this->tblesbc, $postData, "id =" . $data['id'] . "");
	return $last_id = $data['id'];
	
	}
	
	public function deleteesbd($id) {       
        $this->db->delete($this->tblesbc, "id = '$id'");
    }
	
		
}
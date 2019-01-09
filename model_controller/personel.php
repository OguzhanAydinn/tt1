<?php
class personel extends model_controller {
	public function __construct($page_id, $page_action, $data,$page_name) {
		parent::__construct($page_id, $page_action, $data,$page_name);
       switch ($page_action){
			case 1:
			default:
				$this->get_one_user();
				break;
			case 0:
			default:
				$this->get_all_personnel();
				break;
		}		
	
	}
	public function get_all_personnel() {
		$this->template->assign("personnels", $this->get_all_personnels());
	}
    public function get_all_personnels() {
		$sql = sprintf("select * from personnels where status =1");
		$r=$this->db->Execute($sql);
		if($r->RecordCount()>0){
			while($s=$r->FetchNextObject()){
				$result[]=$s;
			}
		}
		return $result;	
	}
	public function __destruct() {
		parent::__destruct();
	}
	
    
}
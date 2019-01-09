<?php
class dashboard extends model_controller {
	public function __construct($page_id, $page_action, $data,$page_name) {
		parent::__construct($page_id, $page_action, $data,$page_name);
       
	
		$this->template->assign("dashboard", $this->get_all_info());
	}
    
	public function __destruct() {
		parent::__destruct();
	}
	
    public function get_all_info(){
		$c = new stdClass();
		$c->countPersons =0;
		$c->notification =0;
		$c->machines =0;
		$sql = sprintf("select count(*) as ps from personnels where status =1");
		$r=$this->db->Execute($sql);
		if($r->RecordCount()>0){
			$s=$r->FetchNextObject();
			$c->countPersons=$s->ps;
		}
		$sql = sprintf("select count(*) as ns from notification where status =1");
		$r=$this->db->Execute($sql);
		if($r->RecordCount()>0){
			$s=$r->FetchNextObject();
			$c->notification=$s->ns;
		}
		$sql = sprintf("select count(*) as ms from machines where status =1");
		$r=$this->db->Execute($sql);
		if($r->RecordCount()>0){
			$s=$r->FetchNextObject();
			$c->machines=$s->ms;
		}
		//pred($c);
		return $c;
	}
}
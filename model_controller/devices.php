<?php
class machines extends model_controller{
	public function __construct($page_id, $page_action, $data, $lang) {
		parent::__construct($page_id, $page_action, $data, $lang);
		switch ($page_action){
			case 1:
				$this->list_one_device_type();
				break;
			case 3:
				$this->add_update_device_type();
				break;
			case 4:
				$this->delete_device_type();
				break;
			case 0:
			default:
				$this->list_device_types();
				break;
		}
	}
	public function __destruct() {
		parent::__destruct();
	}
	
	private function add_update_device_type() {
		pre($this->data);
		$id=0;
		if(isset($this->data['id'])&&$this->data['id'] > 0){
			$id=$this->data['id'];
		}
		if($id > 0){
			$sql="update device_types set ";
		}else{
			$sql="insert into device_types set";
		}
		$sql .=sprintf(" name='%s', status=1", $this->db->Escape($this->data['name']));
		if($id > 0){
			$sql .=sprintf(" where id=%d",$id);
		}
		$this->db->Execute($sql);
		$this->list_device_types();
	}
	private function list_one_device_type() {
		if(!empty($this->data->id)){
			$result = $this->get_device_type_by_id($this->data->id);
			$this->return_result($result);
		}else{
			$this->return_result('',"No ID");
		}
	}
	
	private function list_device_types() {
		$data=new stdClass();
		$data->id="";
		$this->template->assign("data", $data);
		$types=$this->get_device_types();
		$this->template->assign("device_types", $types);
	}
	
	private function get_device_type_by_id($id){
		$result=new stdClass();
		$sql=sprintf("select * from device_types where id=%d",$id);
		pre($sql);
		$r=$this->db->Execute($sql);
		if($r->RecordCount()>0){
			$result=$r->FetchNextObject();
		}
		return $result;
	}
	
	private function get_device_types(){
		$result=array();
		$sql=sprintf("select * from device_types where status=1");
		$r=$this->db->Execute($sql);
		if($r->RecordCount()>0){
			while($s=$r->FetchNextObject()){
				$result[]=$s;
			}
		}
		return $result;
	}
}
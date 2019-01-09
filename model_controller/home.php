<?php
class main extends model_controller{
	public function __construct($page_id, $page_action, $data, $page_name) {
		parent::__construct($page_id, $page_action, $data,$page_name);
        
		$this->template->assign("TITLE",$this->page_title);
		$this->template->assign("CANONICAL",'');
		$this->template->assign("CATS", $this->get_categories());
		$this->template->assign("ITEMS", $this->get_items());
		
		if($this->page_id==2001 && $this->data > 0){
			$item = $this->get_item_by_id($this->data);
			$this->template->assign("ITEM", $item);
			$this->template->assign("CAT", $this->get_items_by_category_id($item->category_id));
		}
		
	}
	public function __destruct() {
		parent::__destruct();
	}
	
	private function get_items_by_category_id($cat_id){
		$result=array();
		$sql=sprintf("select * from items where category_id=%d and status=1", $cat_id);
		$r=$this->db->Execute($sql);
		if($r->RecordCount()>0){
			while($s=$r->FetchNextObject()){
				$result[]=$s;
			}
		}
		return $result;
	}
	
	private function get_item_by_id($id){
		$result=new stdClass();
		$sql=sprintf("select i.*, c.name_tag as cat_name_tag, 
c.seo_tag as cat_seo_tag from items i, categories c 
where c.id=i.category_id and i.id=%d",$id);
		$r=$this->db->Execute($sql);
		if($r->RecordCount()>0){
			$result=$r->FetchNextObject();
		}
		return $result;
	}
	
	private function get_items(){
		$result=array();
		$sql=sprintf("select * from items where status=1 order by category_id");
		$r=$this->db->Execute($sql);
		if($r->RecordCount()>0){
			while($s=$r->FetchNextObject()){
				$result[$s->id]=$s;
			}
		}
		return $result;
	}
	
	private function get_categories(){
		$result=array();
		$sql=sprintf("select * from categories where status=1");
		$r=$this->db->Execute($sql);
		if($r->RecordCount()>0){
			while($s=$r->FetchNextObject()){
				$result[$s->id]=$s;
			}
		}
		return $result;
	}
}
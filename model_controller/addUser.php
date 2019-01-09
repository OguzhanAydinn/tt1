<?php
// pid 5000
class addUser extends model_controller{
	public function __construct($page_id, $page_action, $data, $lang) {
		parent::__construct($page_id, $page_action, $data, $lang,"");
		switch ($page_action){
			case 1:
			default:
				$this->get_one_user();
				break;
			case 2:
			case 3:
				$this->save_data();
				break;
			case 4:
				$this->delete_one_user();
				break;
				
			case 0:
			$this->get_all_personnel();
			break;
		}		
	}
	public function __destruct() {
		parent::__destruct();
	}
	
		//return $this->return_result($result,$error);
//		pre($_FILES['d']['tmp_name']['kul_resim']);
//		$myFile=$_FILES['d']['tmp_name']['kul_resim'];
//		$destination='C:\wamp\www\oguz';
//		move_uploaded_file($myFile, $destination.'/'.$_FILES['d']['name']['kul_resim']);
	


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

	private function save_data(){
		$kul = new kullanici($this->data);
		if(!empty($this->data)){
			//$error=$this->dataControl($this->data);
			if(!empty($error)){
				$this->get_params($kul,$error);
			}else {
				if(!empty($kul->id)){
					$sqli="update personnels set ";
				}else{
					$sqli="insert into personnels set ";
				}
				//pred($sqli);
				$sqli .=sprintf(" tc =%d, name='%s', surname='%s'
,gsm=%d, ssk_no = %d,duty_id=%d,employment_date='%s',employment_end_date='%s',created_by=%d,date_created=%d,
updated_by=%d,date_updated=%d,status=1", $kul->tc,$this->db->Escape($kul->name),$this->db->Escape($kul->surname),
$kul->gsm,$kul->ssk_no,$kul->duty_id,$kul->employment_date,$kul->employment_end_date,$_SESSION['admin_user_id'],time(),$_SESSION['admin_user_id'],time());
				if(!empty($kul->id)){
					$sqli .=sprintf(" where id=%d",$kul->id);
					pred($sqli);
					$this->db->Execute($sqli);
					$success="Güncelleme Başarılı";
				}else if($kul->id<=0){
					//pred($sqli);
					$this->db->Execute($sqli);
					$this->data['id']=$kul->id=$this->db->Insert_ID();
					$success="Kayıt Başarılı";
				}
				$this->redirect_page(7000);
			}
		}
	}
	
	private function dataControl($data) {
		if($data['id']<=0){
			$sql=  sprintf("select tc from personnels where tc='%s'",$data['tc_kimlik']);
			$r=$this->db->Execute($sql);
			if($r->RecordCount()>0){
				return	$error="Bu <a href='#tckimlik'>Tc Kimlik Numarası</a> Sistemde Kayıtlıdır !!";
			}
			$sql=  sprintf("select gsm from personnels where gsm='%s'",$data['gsm']);
			$r=$this->db->Execute($sql);
			if($r->RecordCount()>0){
				return	$error="Bu Cep Tel. Daha Önce Sisteme Kayıt Edilmiştir !!";
			}
		}
		
		return $error;
	}
	
	private function get_duty_codes() {
		$result=array();
		$sql=sprintf("select id, name from duty_codes where status=1");
		$r=$this->db->Execute($sql);
		if($r->RecordCount()>0){
			while($s=$r->FetchNextObject()){
				$result[]=$s;
			}
		}
		return $result;
	}
	//kullanıcılardan id ye göre kullanıcı siler
	private function delete_one_user(){
		if(!empty($this->data)){
			$sql=sprintf("update personnels set status=5 where id=%d",$this->data);
			$this->db->Execute($sql);
		}
		
		$this->show_all_users();
	}
	//kullaniciler adında bı değişken set eder
	//id ye göre kullanıcılar tablosundan kullanıcı getirir
	private function get_one_user(){
		$error="";
		$result=new kullanici();
		if(!empty($this->data['id'])){
			$result = $this->get_user_by_id($this->data);
			if(empty($result->id)){
				$error="Kullanıcı Bulunamadı";
			}
		}
		$this->get_params($result,$error);
	}
	
	private function get_user_by_id($id){
		$result=new kullanici();
		$sql=sprintf("select * 
from personnels where id=%d and status=1",$id);
		$r=$this->db->Execute($sql);
		if($r->RecordCount()>0){
			$result=$r->FetchNextObject();
		}
		return $result;
	}
	public function get_params($kulllanici,$error,$success="") {
		$this->template->assign("duty_codes",  $this->get_duty_codes());
		$this->template->assign("success", $success);
		$this->template->assign("error", $error);
	}
}

class kullanici{
	public $id=0;
	public $tc_kimlik="";		
	public $name="";					
	public $surname="";	
	public $ssk_no="";
	public $gsm = 0;
	public $duty_id = 0;
	public $employment_date = 0;
	public $employment_end_date = 0;
	public $status;
	public function __construct($data=""){
		if($data<>""){
			$this->id=  $data['id'];
			$this->tc =  $data['tc'] ;
			$this->name =  $data['name'] ;
			$this->surname =  $data['surname'] ;
			$this->ssk_no =  $data['ssk_no'] ;
			$this->gsm = $data['gsm'] ;
			$this->duty_id =  $data['duty_id'] ;
			$this->employment_date =  $data['employment_date'] ;
			$this->employment_end_date =  $data['employment_end_date'] ;
			$this->status =  $data['status'] ;
		}
	}
}
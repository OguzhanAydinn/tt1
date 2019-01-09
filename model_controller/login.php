<?php 
class login extends model_controller{
	public function __construct($page_id, $page_action, $data, $page_name) {
		parent::__construct($page_id, $page_action, $data, '');
		if($page_action==9){
			$this->do_logout();
		}elseif(!empty($data)){
			if($this->check_login($data)){
				$this->redirect_page(1000);
			}else{
				$this->template->assign("error", 1);
			}
		}
		
	}
	public function __destruct() {
		parent::__destruct();
	}
	
	private function check_login($data){
		if(!empty($data['username'])){
			if(!empty($data['password'])){
				if($this->check_password(
						$data['username'], 
						$this->encrypt_password($data['password'])
				)){
					pred("sasas");
					return true;
				}
			}
		}
		
		return false;
	}
	
	/**
	 * sifreyi kilitler
	 * 
	 * @param String $text
	 * @return String
	 */
	public function encrypt_password($text){
		return md5(base64_encode($text));
	}
	
	private function do_logout(){
		$_SESSION['admin_user_id']=0;
		$_SESSION['admin_user_name']='';
		$_SESSION['admin_date_last_login']=0;
		$this->redirect_page(8000);
	}
	
	private function check_password($username, $password){
		$sql=sprintf("select id, concat(name, ' ',surname) as name, date_last_login 
from admin_users  where username='%s' and password='%s' and status=1", 
$this->db->Escape($username), $this->db->Escape($password));
		$r=$this->db->Execute($sql);
		if($r->RecordCount()>0){
			$s=$r->FetchNextObject();
			$_SESSION['admin_user_id']=$s->id;
			$_SESSION['admin_user_name']=$s->name;
			$_SESSION['admin_date_last_login']=  $this->timestamp2date($s->date_last_login,'/',1);
			
			$this->update_last_login();
			return true;
		}
		return false;
	}
	
	private function update_last_login(){
		$sql=sprintf("update admin_users set date_last_login=%d where id=%d",
time(), $_SESSION['admin_user_id']);
		$this->db->Execute($sql);
	}
}
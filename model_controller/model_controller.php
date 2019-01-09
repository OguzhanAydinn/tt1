<?php
require_once LIBS.'dbapi.php';
include_once(LIBS.'Smarty.class.php');

class model_controller {
	protected $db;
	public $page_id;
	public $page_action;
	public $data;
	public $canonical;
	public $page_title;
	
	protected $template;
    
	public function __construct($page_id, $page_action,$data,$page_name) {
		
		// db baglan
		$this->db = new dbapi();
		if(!$this->db->Connect(DBNAME, DBHOST, DBUSER, DBPASS)){
			/**
			 * @todo 
			 */
			die("oldum bittim");
		}
        
		$this->page_id=$page_id;
		$this->page_action=$page_action;
		$this->data=$data;
		$this->page_name = $page_name;
		// veritabanina unicode kullanacagimizi soyluyoruz
		$this->db->Execute("SET NAMES 'utf8'");
		
		// sayfayi yukle
		$this->load_template();
	}
	public function __destruct() {
		// db kopar
		if(!empty($this->db)){
			$this->db->Close();
		}
	}
	
	
	public function return_result($result, $error="", $clean_output=0){
		header('Content-Type: application/json; charset=utf-8');
		if($clean_output==1){
			echo json_encode($result);
			die();
		}
		$resultset = new responseType();
		$resultset->data=$result;
		$resultset->error=$error;
		$rstr=json_encode($resultset);
		echo $rstr;
		die();
	}
	
	public function display_page(){
		// sayfa dil dosyalarini yukle
		//$this->assign_lang_vars();
	
		// sayfayi goster
		$this->template->display($this->page_id.".html");
		die();
	}
	
	protected function load_template(){
		$this->template = new Smarty();
		$this->template->left_delimiter ='{{';
		$this->template->right_delimiter ='}}';
		$this->template->debugging = DEBUG;
		$this->template->template_dir = VIEW;
		$this->template->compile_dir = VIEWC;
		
    
		$this->load_page();
	}
    
	protected function load_page(){
//		$this->template = new template_manager($this->page_id);
		
		$this->template->assign("URL", URL);
		$this->template->assign("CANONICAL", $this->canonical);
		$this->template->assign("PAGE_ID", $this->page_id);
		
		
		$this->template->assign("USER_ID", empty($_SESSION['admin_user_id'])?0:$_SESSION['admin_user_id']);
		$this->template->assign("NAME", empty($_SESSION['admin_user_name'])?'':$_SESSION['admin_user_name']);
		$this->template->assign("LAST_LOGIN", empty($_SESSION['admin_date_last_login'])?0:$_SESSION['admin_date_last_login']);
	}

	
	
	protected function redirect_page($page_id){
		header("Location: ".URL."index.php?p=".$page_id);
	}
	public function timestamp2date($timestamp = null, $sep = '/', $time = 1) {
        date_default_timezone_set('Europe/Minsk');
		$timex = '';
		if ($time == 1) {
			$timex = ' H:i:s';
		}
		return @date('d' . $sep . 'm' . $sep . 'Y ' . ' - '.$timex, $timestamp);
	}
}

class responseType{
	public $data,$error;
}
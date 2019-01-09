<?php
// sayfa utf8
header('Content-Type: text/html; charset=utf-8');

// load conf file
require_once 'config.php';

// sayfa icinde hatalari goster
if(DEBUG){
	ini_set('display_errors', 1);
	error_reporting(E_ALL);
}else{
	ini_set('display_errors', 0);
	error_reporting(FALSE);
}

// session 
session_start();

//pred('Oguz');
// model-controller sinifini cagir
require_once MODEL.'model_controller.php';
// p = page_id
if(!empty($_REQUEST['p'])){
	$page_id = $_REQUEST['p'];
//yoksa anasayfa
}else{
	$page_id=8000;
}
// a = page_action
$page_action = empty($_REQUEST['a'])?0:$_REQUEST['a'];

pre($_REQUEST);

// d = data
$data = empty($_REQUEST['d'])?'':$_REQUEST['d'];
$data = empty($_REQUEST['ddata'])?'':$_REQUEST['d'];
$page_name="";
if(!empty($_REQUEST['page_name'])){
	if(strlen(trim($_REQUEST['page_name']))>0){
		$page_name = trim($_REQUEST['page_name']);
	}
}
switch ($page_id) {
	case 8000:
	default:
		require MODEL.'login.php';
		$site = new login($page_id, $page_action, $data,"" );
		$site->display_page();
	break;
	case 1000:
		require MODEL.'dashboard.php';
		$site = new dashboard($page_id, $page_action, $data,"" );
		$site->display_page();
	break;
	case 7000:
	case 5000:
		require MODEL.'addUser.php';
		$site = new addUser($page_id, $page_action, $data,"" );
		$site->display_page();
	break;
	case 9000:
		require MODEL.'machines.php';
		$site = new machines($page_id, $page_action, $data,"" );
		$site->display_page();
	break;

}

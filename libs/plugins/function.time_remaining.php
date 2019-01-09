<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */


/**
 * Smarty {{user_address user_id=50}} function plugin
 * Purpose:  kullanici adres gosterme secme guncelleme
 *
 * @author H. Onur Bilginoğlu
 * @param array parameters
 * @param Smarty
 * @return html
 */
function smarty_function_time_remaining($params, &$smarty){
	$start = (isset($params['start']) ? $smarty->_dequote($params['start']) : 0);
	$end = (isset($params['end']) ? $smarty->_dequote($params['end']) : time() );
	$sadd = 0;
	$weeks = smarty_function_date_difference(w, $end, ($start+$sadd));
	$smarty->assign("weeks", $weeks);
	$sadd +=($weeks * 604800);
	$days = smarty_function_date_difference(d, $end, ($start+$sadd));
	$smarty->assign("days", $days);
	$sadd +=($days * 86400);
	$hours = smarty_function_date_difference(h, $end, ($start+$sadd));
	$smarty->assign("hours", $hours);
	$sadd +=($hours * 3600);
	$minutes = smarty_function_date_difference(m, $end, ($start+$sadd));
	$smarty->assign("mins",  $minutes);
	$sadd +=($minutes * 60);
	$seconds = smarty_function_date_difference(s, $end, ($start+$sadd));
	$smarty->assign("secs",  $seconds);
	$html = $smarty->fetch("5014.html");
	return $html;
}

function smarty_function_date_difference ($interval, $date1,$date2){
	$difference =  $date1 - $date2;
	if($interval=="w"){
		$returnvalue  =$difference/604800;
	}elseif($interval=="d"){
		$returnvalue  = $difference/86400;
	}elseif($interval=="h"){
		$returnvalue = $difference/3600;
	}elseif($interval== "m"){
		$returnvalue  = $difference/60;
	}elseif($interval=="s"){
		$returnvalue  = $difference;
	}
	if($returnvalue < 0){
		$returnvalue = 0;
	}
	return intval($returnvalue);
}

?>
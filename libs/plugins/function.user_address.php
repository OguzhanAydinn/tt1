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
function smarty_function_user_address($params, &$smarty){
	$_user_id = (isset($params['user_id']) ? $smarty->_dequote($params['user_id']) : 0);
	if(!$_user_id > 0){
		return false;
	}

	$memcache = new Memcache;
	$memcache->pconnect($smarty->memcache_host, 11211);
	$countries = mymemcache_get('countries');
	if (!$countries) {
		$result = mysql_query('select * from countries where status=1 order by display_order, name');
		while ($show_countries = mysql_fetch_object($result)){
			$ulkeler[$show_countries->country_id]=$show_countries->name;
			if(!isset($country_codes[$show_countries->phone_code]) ){
				$country_codes[$show_countries->phone_code]=$show_countries->phone_code;
			}

			mymemcache_set('countries', $countries, false, 86400);
		}
	}

	$adr[0]['name']='0';
	$address_select=0;
	$result = mysql_query("select store, store_id from store_user_roles where user_id='".$_user_id."' and status=1");
	if(mysql_num_rows($result) >0){
		while($s=mysql_fetch_assoc($result)){
			$store_id=$s['store_id'];
			$store = $s['store'];
			$result = mysql_query("select id from stores_address where store_id = (select store_id from stores where store_id='$store_id' and status =1 and date_end > ".time().") and status=1");
			if(mysql_num_rows($result) >0){
				while($s=mysql_fetch_assoc($result)){
					$adr[-1]['name']='-1';
					$adr[-1]['update']=$store;
				}
			}
		}
	}
	$result = mysql_query('select id, record_name, default_address from user_address where status=1 and  user_id='.$_user_id);
	if(mysql_num_rows($result) >0){
		while($s=mysql_fetch_assoc($result)){
			$adr[$s['id']]=$s;
			if($s['default_address']==1){
				$address_select=$s['id'];
			}
		}
	}
	$smarty->assign("u_user_id", $_user_id);
	$smarty->assign("address_id", $adr);
	$smarty->assign("ulkeler_options", $ulkeler);
	$smarty->assign("adresselect", $address_select);
	if (is_array($country_codes)) {
		ksort($country_codes);
		reset($country_codes);
	}
	$smarty->assign("p_codes", $country_codes);

	$smarty->assign("type", $_type);
	$smarty->assign("category", $category);

	$html = $smarty->fetch("5006.html");

	return $html;
}

?>
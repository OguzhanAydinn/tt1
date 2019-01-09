<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */


/**
 * Smarty {counter} function plugin
 *
 * Type:     function<br>
 * Name:     counter<br>
 * Purpose:  print out a counter value
 * @author Monte Ohrt <monte at ohrt dot com>
 * @link http://smarty.php.net/manual/en/language.function.counter.php {counter}
 *       (Smarty online manual)
 * @param array parameters
 * @param Smarty
 * @return string|null
 */
function smarty_function_category_boxes($params, &$smarty)
{
	global $config;
	$_category_id = isset($params['category_id']) ? $smarty->_dequote($params['category_id']) : null;
	$_type = isset($params['type']) ? $smarty->_dequote($params['type']) : null;
	$_uid = isset($params['uid']) ? $smarty->_dequote($params['uid']) : null;
	$_hide_search = isset($params['hide_search']) ? $smarty->_dequote($params['hide_search']) : null;
   
	$memcache = new Memcache;
	$memcache->pconnect($smarty->memcache_host, 11211);
	$category = $memcache->get('sat_kategoriler_'.$smarty->template_language);

	if(!$category){
		$category='';
		$category_subs = get_sub_categories($db, 0, $smarty);
		$m = 0;
		for($i=0; $i< count($category_subs); $i++){
			if ($category_subs[$i]->category_id){
				$category[$m]['id']=$category_subs[$i]->category_id;
				$category[$m]['name']=str_replace('&',' ve ',$category_subs[$i]->category_name);
				$m++;
			}
		}
		$memcache->set('sat_kategoriler_'.$smarty->template_language, $category, false, 86400);
	}
	
	$memcache->close();
	$smarty->assign("type", $_type);
	$smarty->assign("categories", $category);
	$smarty->assign("site_url", $config['site_url']);
	$smarty->assign("hide_search", $_hide_search);
	$smarty->assign("uid", $_uid);
	
	if ($_category_id > 0) {
		//echo $category->category_level_1;
		$category = get_category($db, $_category_id, $smarty);
		$smarty->assign("category", $category);
		$smarty->assign("cat0", $category->category_level_0);
		$smarty->assign("cat1", $category->category_level_1);
		$smarty->assign("cat2", $category->category_level_2);
		$smarty->assign("cat3", $category->category_level_3);
		$smarty->assign("cat4", $category->category_level_4);
		$smarty->assign("cat5", $category->category_level_5);
	}
	
	$html = $smarty->fetch("5005.html");

	return $html;
}

function get_sub_categories($db, $parent_id, $smarty) {
	$memcache = new Memcache;
	$memcache->pconnect($smarty->memcache_host, 11211);
	$category_data1 = $memcache->get('category_subs_'.$smarty->template_language.'_'.$parent_id);
	if (!$category_data) {
		$i = 0;
		$c = @mysql_connect($smarty->dbhost, $smarty->dbuser, $smarty->dbpass);
		$c = @mysql_select_db($smarty->dbname);
		mysql_query("SET NAMES 'utf8'");
		$result = mysql_query("select c.category_id, l.category_name from categories c, categories_languages l where c.parent_id = '".$parent_id."' and c.status=1 and l.category_id=c.category_id and l.language='".$smarty->template_language."' order by c.display_order, l.category_name");
		if(mysql_num_rows($result)>0) {
			while ($show_category = mysql_fetch_object($result)) {
				$category_subs[$i++] = $show_category;
			}

			$memcache->set('category_subs_'.$smarty->template_language.'_'.$parent_id, $category_subs, false, 86400);
			$memcache->close();
			return $category_subs;
		} else {
			return false;
		}
	} else {
		$category_subs = $category_data;
		return $category_subs;
	}
}

function get_category($db, $category_id=0, $smarty) {
	if ($category_id) {
		$memcache = new Memcache;
		$memcache->pconnect($smarty->memcache_host, 11211);
		$category_data = $memcache->get('category_'.$smarty->template_language.'_'.$category_id);
		if (!$category_data) {
			$result = mysql_query("select c.*, l.category_name from categories c, categories_languages l where c.category_id = '$category_id' and c.status=1 and l.category_id=c.category_id and l.language='".$smarty->template_language."'");
			if(mysql_num_rows($result)>0) {
				$category_data = mysql_fetch_object($result);
				$memcache->set('category_'.$smarty->template_language.'_'.$category_id, $data, false, 86400);
				return $category_data;
			} else {
				return false;
			}
		} else {
			return $category_data;
		}
	} else {
		return false;
	}
}
/* vim: set expandtab: */

?>
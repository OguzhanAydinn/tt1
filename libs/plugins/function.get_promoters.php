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
function smarty_function_get_promoters($params, &$smarty)
{
	$_page_id = isset($params['page_id']) ? $smarty->_dequote($params['page_id']) : null;
    if (!isset($_page_id) || strlen($_page_id) == 0) {
        $smarty->trigger_error("missing 'page_id' attribute in get_promoters tag", E_USER_ERROR, __FILE__, __LINE__);
    }
	$_category_id = isset($params['category_id']) ? $smarty->_dequote($params['category_id']) : null;
    if (!isset($_category_id) || strlen($_category_id) == 0) {
        $smarty->trigger_error("missing 'category_id' attribute in get_promoters tag", E_USER_ERROR, __FILE__, __LINE__);
    }
	$_item_count = isset($params['promoter_count']) ? $smarty->_dequote($params['promoter_count']) : null;
    if (!isset($_item_count) || strlen($_item_count) == 0) {
        $smarty->trigger_error("missing 'promoter_count' attribute in get_promoters tag", E_USER_ERROR, __FILE__, __LINE__);
    }
	$_orientation = isset($params['orientation']) ? $smarty->_dequote($params['orientation']) : null;
    if (!isset($_orientation) || strlen($_orientation) == 0) {
        $smarty->trigger_error("missing 'orientation' attribute in get_promoters tag", E_USER_ERROR, __FILE__, __LINE__);
    }
    
	if (!$_page_id) {
		$_page_id=$smarty->page_id;
	}
	if (!$category_id && $_page_id=3000) {
		$_category_id=$smarty->category_id;
	}
    
	$memcache = new Memcache;
	$memcache->pconnect($smarty->memcache_host, 11211);
	$t = $memcache->get('promoter_'.$smarty->template_language.'_'.$_page_id.'_'.$_category_id.'_'.$_item_count.'_'.$_orientation);
	$memcache->close();
	
	if (!$promoters) {
		$c = @mysql_connect($smarty->dbhost, $smarty->dbuser, $smarty->dbpass);
		$c = @mysql_select_db($smarty->dbname);
		mysql_query("SET NAMES 'utf8'");
		$sql = "select id, display_item, orientation, sorting from category_promoter where status=1 and page_id='$_page_id' and category_id='$_category_id' order by rand() limit 1";
		$result = mysql_query($sql);
		if ($result) {
			if(mysql_num_rows($result)>0) {
				$prom=mysql_fetch_object($result);
				if (!$_item_count) {
					$_item_count=$prom->display_item;
				}
				if (!$_orientation) {
					$_orientation=$prom->orientation;
				}
				$sql = "select i.thumb_image, i.id, i.page_link, l.name from category_promoter_items i, category_promoter_languages l where i.promoter_id='".$prom->id."' and i.status=1 and l.item_id=i.id and l.language='".$smarty->template_language."' order by ";
				if ($prom->sorting) {
					$sql.= "i.sort_order";
				} else {
					$sql.= "rand()";
				}
				if ($item_count) {
					$sql.= " limit ".$_item_count;
				}
				$result = mysql_query($sql);
				if ($result) {
					if(mysql_num_rows($result)>0) {
						while ($show=mysql_fetch_object($result)) {
							$promoters[$show->id] = $show;
						}
					}
				}
			}
		}
		mymemcache_set('promoter_'.$smarty->template_language.'_'.$_page_id.'_'.$_category_id.'_'.$_item_count.'_'.$_orientation, $promoters, false, 86400);
	}
	$smarty->assign("promoters", $promoters);
	$smarty->assign("orientation", $_orientation);
	$smarty->assign("promoter_count", $_item_count);
	$html = $smarty->fetch("5003.html");
    //pre($promoters);
	return $html;
}

/* vim: set expandtab: */

?>

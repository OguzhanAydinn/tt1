<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */


/**
 * Smarty plugin
 *
 * Type:     modifier<br>
 * Name:     nl2br<br>
 * Date:     Feb 26, 2003
 * Purpose:  convert \r\n, \r or \n to <<br>>
 * Input:<br>
 *         - contents = contents to replace
 *         - preceed_test = if true, includes preceeding break tags
 *           in replacement
 * Example:  {$text|nl2br}
 * @link http://smarty.php.net/manual/en/language.modifier.nl2br.php
 *          nl2br (Smarty online manual)
 * @version  1.0
 * @author   Monte Ohrt <monte at ohrt dot com>
 * @param string
 * @return string
 */

$_SERVER["memcache_host"] = $smarty->memcache_host;
$_SERVER["dbhost"] = $smarty->dbhost;
$_SERVER["dbuser"] = $smarty->dbuser;
$_SERVER["dbpass"] = $smarty->dbpass;
$_SERVER["dbname"] = $smarty->dbname;
$_SERVER["template_language"] = $smarty->template_language;

function smarty_modifier_string2url($string) {
	$dict = charmap($db);
	$url = strtolower(strtr($string, $dict));
	$url = preg_replace('/[^a-z0-9!-]/i', '_', $url);
	$url = preg_replace('/(_+)/', '_', $url);
    return $url;
}

function charmap($db) {
	$memcache = new Memcache;
	$memcache->pconnect($_SERVER["memcache_host"], 11211);
	$charmap = $memcache->get('charmap_'.$_SERVER["template_language"]);
	if (!$charmap) {
		$c = @mysql_connect($_SERVER["dbhost"], $_SERVER["dbuser"], $_SERVER["dbpass"]);
		$c = @mysql_select_db($_SERVER["dbname"]);
		mysql_query("SET NAMES 'utf8'");
		$sql = "select * from unichr_map where language = '".$_SERVER["template_language"]."'";
		$result = mysql_query($sql);
		if(mysql_num_rows($result)>0) {
			while ($row = mysql_fetch_object($result)) {
				$charmap[unichr($row->asciival)] = $row->strval;
			}
		}
		$memcache->set('charmap_'.$_SERVER["template_language"], $charmap, false, 86400);
	}
	return $charmap;
}

function unichr($c) {
    if ($c <= 0x7F) {
        return chr($c);
    } else if ($c <= 0x7FF) {
        return chr(0xC0 | $c >> 6) . chr(0x80 | $c & 0x3F);
    } else if ($c <= 0xFFFF) {
        return chr(0xE0 | $c >> 12) . chr(0x80 | $c >> 6 & 0x3F)
                                    . chr(0x80 | $c & 0x3F);
    } else if ($c <= 0x10FFFF) {
        return chr(0xF0 | $c >> 18) . chr(0x80 | $c >> 12 & 0x3F)
                                    . chr(0x80 | $c >> 6 & 0x3F)
                                    . chr(0x80 | $c & 0x3F);
    } else {
        return false;
    }
}
/* vim: set expandtab: */

?>

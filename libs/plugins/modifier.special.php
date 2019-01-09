<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */


/**
 * Smarty lower modifier plugin
 *
 * Type:     modifier<br>
 * Name:     lower<br>
 * Purpose:  convert string to lowercase
 * @link http://smarty.php.net/manual/en/language.modifier.lower.php
 *          lower (Smarty online manual)
 * @author   Monte Ohrt <monte at ohrt dot com>
 * @param string
 * @return string
 */
function smarty_modifier_special($string){
	$p=explode(' ', $string);
	$d=floor(count($p)/2)-1;
	$t = '<span>';
	for($i=0;$i<count($p);$i++){
		$t.=$p[$i].' ';
		if($i==$d) $t.='</span><br />';
	}
//	$t.='';
    return $t;
}

?>

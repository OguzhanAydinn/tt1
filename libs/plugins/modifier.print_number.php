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
function smarty_modifier_print_number($number, $format=0)
{
	$x='';
	if ($number) {
		$n=explode(",", number_format($number,2,',',''));
		if(!isset($n[1])) {
			$n[1]="00";
		}
		$x=number_format($n[0],0,'','.');
		if (($number<1000 && $n[1]>0) || $format) {
			$x.= '<sup><u>'.$n[1].'</u></sup>&nbsp;';
		}
	}
	return $x;
}

?>
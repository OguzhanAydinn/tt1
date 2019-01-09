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
function smarty_modifier_format_date($tarih, $tip=0)
{
		if ($tarih) {
			if ($tip==1) {
				$tarih='<nobr>'.strftime("%d-%m-%Y %H:%M", $tarih).'</nobr>';
			} elseif($tip==2)
				$tarih=strftime("%d-%B-%Y", strtotime($tarih));
			else
				$tarih=strftime("%d-%B-%Y", $tarih);
		}
		return $tarih;
}

?>

<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */


/**
 * Smarty cp modifier plugin
 *
 * Type:     modifier<br>
 * Name:     cp<br>
 * Purpose:  converts price between currencies
 * @link http://smarty.php.net/manual/en/language.modifier.string.format.php
 *          string_format (Smarty online manual)
 * @author   Monte Ohrt <monte at ohrt dot com>
 * @param string
 * @param string
 * @return string
 */
function smarty_modifier_cp($price, $rate1, $rate2)
{
	return (($price*$rate1)/$rate2);
}

/* vim: set expandtab: */

?>

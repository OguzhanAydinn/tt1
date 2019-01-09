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
function smarty_function_array_count($params, &$smarty)
{
	$_array = isset($params['array']) ? $smarty->_dequote($params['array']) : null;
    if (!isset($_array) || strlen($_array) == 0) {
        $smarty->trigger_error("missing 'array' attribute in array_count tag", E_USER_ERROR, __FILE__, __LINE__);
    }
	return count($_array);
}

/* vim: set expandtab: */

?>

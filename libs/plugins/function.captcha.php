<?php
/**
 * Smarty plugin
 * @package Smarty
 * @subpackage plugins
 */

function smarty_function_captcha($params, &$smarty) {
	include(dirname(__FILE__)."/../hn_captcha.class.php");
	$CAPTCHA_INIT = array(
	'tempfolder'     => "/tmp/",
	'TTF_folder'     => dirname(__FILE__)."/../",
	'TTF_RANGE'      => array('comic.ttf','arial.ttf','impact.ttf'),
	'chars'          => 5,       // integer: number of chars to use for ID
	'minsize'        => 14,      // integer: minimal size of chars
	'maxsize'        => 15,      // integer: maximal size of chars
	'maxrotation'    => 30,      // integer: define the maximal angle for char-rotation, good results are between 0 and 30
	'noise'          => false,    // boolean: TRUE = noisy chars | FALSE = grid
	'websafecolors'  => FALSE,   // boolean
	'refreshlink'    => TRUE,    // boolean
	'lang'           => 'en',    // string:  ['en'|'de']
	'maxtry'         => 3,       // integer: [1-9]
	'badguys_url'    => '/',     // string: URL
	'secretstring'   => 'Ben ezelden beridir hur yasadim,hur yasarim.Hangi cilgin bana zincir vuracakmis?Sasarim',
	'secretposition' => 32,      // integer: [1-32]
	'debug'          => false
	);
	$captcha =& new hn_captcha($CAPTCHA_INIT);
	$captcha->check_captcha($captcha->public_K,$captcha->private_K);
	return $captcha->display_form();
}

?>
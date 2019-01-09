<?php

function smarty_modifier_unique_id(){
	return md5(uniqid(rand(), true));
}

?>

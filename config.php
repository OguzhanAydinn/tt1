<?php
//  DB Connection settings
define("DBHOST",'94.73.145.78');
define("DBUSER",'u8239242_user899');
define("DBPASS",'ABwo07E3');
define("DBNAME",'u8239242_tuna');

// Debug const
define("DEBUG", false);

// URL
define("URL", "http://localhost/tt1/");


// File locations
define("BASE", "/Users/yeliz/Sites/tt1/");
define("LIBS", BASE.'libs/');
define("MODEL", BASE.'model_controller/');
define("VIEW", BASE.'views/');
define("VIEWC", BASE.'views_c/');

// File locations Admin
define("ADMIN", BASE.'viadmin/');
define("ADMIN_MODEL", ADMIN.'model_controller/');
define("ADMIN_VIEW", ADMIN.'views/');

function pre($str){
	echo "\n<pre>===================================================================================\n";
	print_r ($str);
	echo "\n===================================================================================</pre>\n";
}

function pred($str){
	pre($str);
	die();
}
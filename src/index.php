<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");
header('Access-Control-Allow-Credentials: true');
define('DS',DIRECTORY_SEPARATOR);
define('ROOT',dirname(__FILE__));
spl_autoload_register( );

require_once "Common/Router.php";


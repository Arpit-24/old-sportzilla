<?php



session_start();
ob_start();
date_default_timezone_set("Asia/Kolkata");
require_once('config/config.php');
require_once('helpers/system_helper.php');
require_once('helpers/format_helper.php');
require_once('helpers/db_helper.php');
//Autoload Classes
function __autoload($class_name)
{
require_once('libraries/'.$class_name.'.php');
}





?>
<?php
session_start();
$rootPath = dirname(__FILE__);

define('ROOT_PATH', $rootPath);

include ROOT_PATH . DIRECTORY_SEPARATOR . 'config.php';

define('CONTROLLER_PATH', ROOT_PATH . DIRECTORY_SEPARATOR . 'controllers' . DIRECTORY_SEPARATOR);

define('MODEL_PATH', ROOT_PATH . DIRECTORY_SEPARATOR . 'models' . DIRECTORY_SEPARATOR);

define('VIEW_PATH', ROOT_PATH . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR);

define('SYSTEM_PATH', ROOT_PATH . DIRECTORY_SEPARATOR . 'system' . DIRECTORY_SEPARATOR);

define('HELPER_PATH', ROOT_PATH . DIRECTORY_SEPARATOR . 'helpers' . DIRECTORY_SEPARATOR);

define('PUBLIC_PATH', ROOT_PATH . DIRECTORY_SEPARATOR . 'public' . DIRECTORY_SEPARATOR);


$controller = isset($_GET['c']) ? $_GET['c'] : 'home';

$method = isset($_GET['m']) ? $_GET['m'] : 'index';


$className = ucfirst($controller) . 'Controller';


require_once SYSTEM_PATH . "Database.php";
require_once HELPER_PATH . "helper.php";

if (file_exists('controllers/' . $className . '.php')) {

	require('controllers/' . $className . '.php');

	$c = new $className();

	$c->$method();
}


<?php 

	// FRONT CONTROLLER

	
	// 1. Общие настройки
	ini_set('display_errors', 1);
	error_reporting(E_ALL);	
	
	if(!isset($_SESSION)){
		session_start();
	}
	// 2. Подключение файлов системы
	define('ROOT', dirname(__FILE__));
	require_once(ROOT.'/components/router.php');
	require_once(ROOT.'/components/Db.php');
	
	
	// 3. Вызов роутера
	$router = new Router();
	$router->run();



?>
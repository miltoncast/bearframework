<?php
//router
$tokens = explode('/', trim($_SERVER['REQUEST_URI'], '/'));

//dispatcher
if (isset($tokens[1]) === true) {
	$controllerName = ucfirst($tokens[1]);
	$controllerPath = 'controller/' .  $controllerName . '.php';
} else {
	$controllerName = 'Home';
	$controllerPath = 'controller/Home.php';
}

if (file_exists($controllerPath) === true) {
	require_once('libs/Controller.php');
	require_once($controllerPath);
	$controller = new $controllerName;
	
	if (isset($tokens[2]) === true && method_exists($controller, $tokens[2])) {
		$action = '' . $tokens[2];
		$controller->$action();
	} else {
		$controller->index();
	}

}

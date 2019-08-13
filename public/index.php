<?php

include_once '../vendor/autoload.php';

$config = include_once '../config/app.php';
$controllerName = 'App\Controllers\\' . camelCase(strval($_GET['controller'] ?? $config['controller_default'])) . 'Controller';

$methodName = lcfirst(camelCase(strval($_GET['method'] ?? $config['method_default'])));

if (!class_exists($controllerName)) {
	exit('Page not found!');
}

$controllerObject = new $controllerName;

if (!method_exists($controllerObject, $methodName)) {
	exit('Page not found!');
}

unset($_GET['controller'], $_GET['method']);

$controllerObject->_init($_GET, $_POST);

App\Models\Connection::connect($config['db']);

call_user_func_array([$controllerObject, $methodName], []);
exit;
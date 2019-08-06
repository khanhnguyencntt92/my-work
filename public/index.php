<?php

include_once '../vendor/autoload.php';

$controllerName = 'App\Controllers\\' . camelCase(strval($_GET['controller'] ?? 'default')) . 'Controller';

$methodName = lcfirst(camelCase(strval($_GET['method'] ?? 'index')));

if (!class_exists($controllerName)) {
	exit('Page not found!');
}

$controllerObject = new $controllerName;

if (!method_exists($controllerObject, $methodName)) {
	exit('Page not found!');
}

unset($_GET['controller'], $_GET['method']);

$controllerObject->_init($_GET, $_POST);

App\Models\Connection::connect([
	'driver' => 'mysql',
    'host' => 'localhost',
    'username' => 'root',
    'password' => '',
    'db_name' => 'my-work',
]);

call_user_func_array([$controllerObject, $methodName], ['params' => $_GET]);

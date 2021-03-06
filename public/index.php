<?php
	session_start();
	spl_autoload_register(function($class){
		$root = dirname(__DIR__);
		$file = $root . '/' . str_replace('\\', '/', $class) . '.php';
		if(is_readable($file)){
			require $root . '/' . str_replace('\\', '/', $class). '.php';
		}
	});
	$router = new Core\Router();
	$router->add('', ['controller'=> 'Home', 'action'=>'index']);
	$router->add('logout', ['controller'=> 'Home', 'action'=>'logout']);
	$router->add('login123xyz', ['controller'=> 'Home', 'action'=>'login']);
	$router->add('{controller}/{action}');
	$router->add('{controller}/{id:\d+}/{action}');
	$router->add('admin/{controller}/{action}', ['namespace => Admin']);
	$router->dispatch($_SERVER['QUERY_STRING']);
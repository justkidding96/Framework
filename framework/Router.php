<?php

/**
* Router
* Handles the pretty url's
*/
class Router
{
	/**
	 * Contstructor
	 */
	function __construct() {

		$url = isset($_GET['url']) ? $_GET['url'] : 'home';
		$url = rtrim($url, '/');
		$url = explode('/', $url);

		// set index method
		if(empty($url[1]))  $url[1] = 'index';

		$controller = $url[0];
		$method 	= $url[1];
		$params 	= array_slice($url, 2);

		// check if the controller exists
		if(class_exists($controller)) {
			$controller = new $controller();

			// check if the method exists in the class file
			if(method_exists($controller, $url[1]))
				call_user_func_array(array($controller, $method), $params);
			else
				View::render('error/404');
		}
		else
			View::render('error/404');
	}
}

?>
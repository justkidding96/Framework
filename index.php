<?php

	session_start();

	// absolut path
	define("defaultPath", $_SERVER['DOCUMENT_ROOT']);

	// Required files
	require 'framework/Authentication.php';
	require 'framework/AutoLoader.php';
	require 'framework/Database.php';
	require 'framework/Router.php';
	require 'framework/View.php';

	$app = new Router();


?>
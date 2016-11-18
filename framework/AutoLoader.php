<?php

/**
* Auto loader for including all important files
*/
function __autoload($name) {
	$path = defaultPath;
	$name = $name . ".php";

	// check if controller exists
	if (file_exists("$path/controllers/$name")) {
 		include "$path/controllers/$name";
	}

	// check if models exists
	if (file_exists($path . "/models/" . $name)) {
 		include "$path/models/$name";
	}
}
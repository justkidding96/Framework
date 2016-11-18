<?php


class View {
	/**
	 * Name of the View
	 * @var string
	 */
	private $name = '';

	/**
	 * Data of the View
	 * @var array
	 */
	private $data = array();

	/**
	 * Check if the view exists
	 * @param  string $name
	 * @return boolean
	 */
	public static function exist($name) {
		return file_exists("views/{$name}.phtml");
	}

	/**
	 * Render the view
	 * @param  string $name
	 * @return boolean
	 */
	public static function render($name) {
		$path = "views/{$name}.phtml";

        // Check if view exists else throw error
		if (self::exist($name)) {
			include $path;
        }
		else {
			self::error('404');
        }
	}


	// TODO: Make this function
	/**
	 * Bind the data to a view or controller
	 * @param  string $name
	 * @param  array $data
	 * @return array
	 */
	public static function bind($name, $data) {

	}

	/**
	 * Error handling
	 * @param  number $number
	 */
	public static function error($case) {
		switch ($case) {
			case '404':
			self::render('error/404');
			break;

			case '500':
			self::render('error/500');
			break;
		}
	}

	/**
	 * Redirect to another Controller
	 * @param  string $name
	 */
	public static function redirect($name) {
        header("Location: $name");
        exit;
    }
}
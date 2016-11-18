<?php


class Model_Home {
	private $db;

    /**
     * Constructor
     */
	public function __construct() {
		$this->db = new Database();
	}
}
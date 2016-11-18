<?php
class Database {
	/**
	 * Connection to the Database
	 */
	public function connect() {
		$host   	= 'localhost';
		$dbuser 	= 'root';
		$dbpass 	= '';
		$database 	= 'test';

        // Try to connect
		$db = mysqli_connect($host, $dbuser, $dbpass, $database);

        // Check for MySQL errors
        if (mysqli_connect_errno($db)) {
            echo "Connection problems!!   " . mysqli_connect_errno();
        }
		else {
			return $db;
        }
	}

	/**
	 * INSERT INTO Function
	 * @param  array $data
	 * @return string
	 */
	public function insert($data) {
		$this->query .= 'INSERT INTO ' . $data . ' ';
		return $this;
	}

	/**
	 * VALUES Function
	 * @param  array $data
	 * @return string
	 */
	public function values($data) {
		// give '' on the key elements
		foreach ($data as $arg) {
			$nieuw[] = "'$arg'";
		}

		$this->query .= 'VALUES(' . implode(", ", $nieuw) . ') ';
		return $this;
	}

	/**
	 * SELECT Function
	 * @param  string $data
	 * @return string
	 */
	public function select($data) {
		$this->query .= "SELECT $data ";
		return $this;
	}

	/**
	 * FROM Function
	 * @param  string $data
	 * @return string
	 */
	public function from($data) {
		$this->query .= "FROM $data ";
		return $this;
	}

	/**
	 * WHERE Function
	 * @param  [string] $data
	 * @return [string]
	 */
	public function where($data) {
		$this->query .= "WHERE $data ";
		return $this;
	}

	/**
	 * AND Function
	 * @param  string $data
	 * @return string
	 */
	public function andWhere($data) {
		$this->query .= "AND $data ";
		return $this;
	}

	/**
	 * DELETE Function
	 * @param  string $data
	 * @return string
	 */
	public function delete($data) {
		$this->query .= "DELETE FROM $data ";
	}

	/**
	 * UPDATE Function
	 * @return [type] [description]
	 */
	public function update() {

	}

	/**
	 * Check method for logging in
	 * @return integer
	 */
	public function check() {
		$query = mysqli_query($this->connect(), $this->query) or die("Invailid Query. " . mysqli_connect_errno());
		return mysqli_num_rows($query);
	}

	/**
	 * Execute Query function
	 * @return array
	 * @return boolean
	 */
	public function run() {
		$query = mysqli_query($this->connect(), $this->query) or die("Invailid Query. " . mysqli_connect_errno());

        // Check if query is successful
		if (is_numeric($query) == false) {
			while ($result = mysqli_fetch_assoc($query)) {
				$data[] = $result;
			}

			return $data;
		}
		elseif(is_numeric($query) == true) {
			return $query;
        }
	}
}
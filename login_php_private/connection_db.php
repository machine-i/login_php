<?php

	class Connection {
		private $host = 'localhost';
		private $dbname = 'db_login';
		private $user = 'root';
		private $pass = '';

		public function connect() {
			try {

				$connection = new PDO(
					"mysql:host=$this->host;dbname=$this->dbname",
					"$this->user",
					"$this->pass"
				);

				$connection->exec('set charset utf8');

				return $connection;

			} catch(PDOException $e) {
				echo '<p>' . $e->getMessage() . '</p>';
			}
		}
	}

?>
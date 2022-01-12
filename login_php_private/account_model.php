<?php

	class Account {
		private $id;
		private $email;
		private $pass;
		private $id_profile;

		public function __get($value) {
			return $this->$value;
		}

		public function __set($attr, $value) {
			$this->$attr = $value;
			return $this;
		}
	}

?>
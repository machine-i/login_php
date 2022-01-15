<?php

	class Service {
		private $connection;
		private $account_model;

		public function __construct(Connection $connection, Account $account_model) {
			$this->connection = $connection->connect();
			$this->account_model = $account_model;
		}

		public function setAccountBd() {
			$query = '
				insert into 
					tb_accounts(firstName, lastName, email, pass, id_profile)
				values
					(:fName, :lName, :email, :pass, :id_profile)
			';

			$stmt = $this->connection->prepare($query);
			$stmt->bindValue(':fName', $this->account_model->__get('firstName'));
			$stmt->bindValue(':lName', $this->account_model->__get('lastName'));
			$stmt->bindValue(':email', $this->account_model->__get('email'));
			$stmt->bindValue(':pass', $this->account_model->__get('pass'));
			$stmt->bindValue(':id_profile', $this->account_model->__get('id_profile'));

			$stmt->execute();
		}
	}

?>
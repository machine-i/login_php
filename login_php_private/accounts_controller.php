<?php
	
	session_start();

	require "../../login_with_db/connection_db.php";
	require "../../login_with_db/account_model.php";
	require "../../login_with_db/accounts_service.php";

	$action = isset($_GET['action']) ? $_GET['action'] : $action;

	if($action == 'verifyAuthentication') {

		$connection = new Connection();

		$query = '
			select
				t.email, t.pass
			from 
				tb_accounts as t
		';

		$stmt = $connection->connect()->prepare($query);
		$stmt->execute();
		$accounts = $stmt->fetchAll(PDO::FETCH_OBJ);

		$authentication = false;
		$check = false;

		foreach($accounts as $account) {
			if(isset($_POST['email']) && isset($_POST['password'])) {
				$check = true;
				if($account->email == $_POST['email'] && $account->pass == $_POST['password']) {
					$authentication = true;
				}
			}
		}

		if($check && !$authentication) {
			$_SESSION['auth'] = 'N';
			header('Location: index.php?login=error');
		} else if($check && $authentication) {
			$_SESSION['auth'] = 'Y';
			header('Location: home.php');
		}
	
	} else if($action == 'createAccount') {

		if(
			isset($_POST['firstName']) && !empty($_POST['firstName']) && 
			isset($_POST['lastName']) && !empty($_POST['lastName']) && 
			isset($_POST['email']) && !empty($_POST['email']) && 
			isset($_POST['pass']) && !empty($_POST['pass']) && 
			isset($_POST['cPass']) && !empty($_POST['cPass'])
		) {

			//echo isset($_POST['firstName']) ? json_encode($_POST) : '';

			$connection = new Connection();
			$account_model = new Account();

			$account_model->__set('firstName', $_POST['firstName']);
			$account_model->__set('lastName', $_POST['lastName']);
			$account_model->__set('email', $_POST['email']);
			$account_model->__set('pass', $_POST['pass']);
			$account_model->__set('id_profile', 2);

			echo $account_model->__get('firstName').' | ';
			echo $account_model->__get('lastName').' | ';
			echo $account_model->__get('email').' | ';
			echo $account_model->__get('pass').' | ';
			echo $account_model->__get('id_profile').' | ';

			$accounts_service = new Service($connection, $account_model);
			$accounts_service->setAccountBd();

			//echo 'Conseguimos setar no BD';
		} else {
			echo 'error';
		}
	}
	

?>
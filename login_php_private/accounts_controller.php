<?php
	
	session_start();

	require "../../login_php_private/connection_db.php";
	require "../../login_php_private/account_model.php";
	require "../../login_php_private/accounts_service.php";

	$action = isset($_GET['action']) ? $_GET['action'] : $action;

	if($action == 'verifyAuthentication') {

		$connection = new Connection();
		$account_model = new Account();

		$accounts_service = new Service($connection, $account_model);
		$dataAccountBd = $accounts_service->getAccountBd();

		$authentication = false;
		$check = false;

		foreach($dataAccountBd as $account) {
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

			$connection = new Connection();
			$account_model = new Account();

			$account_model->__set('firstName', $_POST['firstName']);
			$account_model->__set('lastName', $_POST['lastName']);
			$account_model->__set('email', $_POST['email']);
			$account_model->__set('pass', $_POST['pass']);
			$account_model->__set('id_profile', 2);

			$accounts_service = new Service($connection, $account_model);
			$setBd = $accounts_service->setAccountBd();

			if($setBd) {
				$_SESSION['auth'] = 'Y';
				echo 'home.php';
			} else {
				$_SESSION['auth'] = 'N';
				echo 'create_new_account.php?create=error';
			}

		} else {}
	}
	

?>
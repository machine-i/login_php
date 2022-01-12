<?php
	
	session_start();

	require "../../login_with_db/connection_db.php";
	require "../../login_with_db/account_model.php";

	$action = isset($_GET['action']) ? $_GET['action'] : $action;
	
	$connection = new Connection();

	if($action == 'verifyAuthentication') {
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
		print_r($_POST);
	}
	

?>
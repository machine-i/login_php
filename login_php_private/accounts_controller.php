<?php

	require "../../login_php_private/connection_db.php";

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
		header('Location: index.php?login=error');
	} else if($check && $authentication) {
		header('Location: home.php');
	}

?>
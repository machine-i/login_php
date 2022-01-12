<?php

	session_start();

	session_destroy(); // or "unset($_SESSION['auth']);"

	header('Location: index.php');

?>
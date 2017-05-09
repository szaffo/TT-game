<?php 

	session_start();

	if (!isset($_SESSION['username'])) {

		header('Location: ../index.html');
		exit;
	}

	foreach ($_SESSION as $key => $value) {
			${"$key"} = $value;
		}


	include '../mechanic/functions.php';

 ?>
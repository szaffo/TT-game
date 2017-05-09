<?php 
	
	include 'functions.php';

	$string = "";

	$parameters = $_SESSION['parameters'];

	if ($parameters['name'] != '') {
		$string .= "name = '".$parameters['name']."'";
	}

	if ($parameters['password'] != '') {
		$string .= "password = '".$parameters['password']."'";
	}

	if ($parameters['email'] != '') {
		$string .= "name = '".$parameters['email']."'";
	}

	if (count($string) > 0) {
		RunQuerryNodata("UPDATE arp_users SET $string WHERE id = ".$_SESSION['id']);
	}

	header("Location: selector.php?pressed=menu-beallitasok");

 ?>
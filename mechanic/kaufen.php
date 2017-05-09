<?php 

	include 'functions.php';

	$data = explode("-", $_SESSION["message"]);

	$user = $_SESSION["id"];

	$points = $_SESSION['points'] - $data[1];

	RunQuerryNodata("INSERT INTO arp_useritems (itemid, ownerid) VALUES ($data[0], $user);");

	RunQuerryNodata("UPDATE arp_users SET points = $points WHERE id = ".$_SESSION['id']." ");

	header("Location: selector.php?pressed=menu-targyak");

 ?>
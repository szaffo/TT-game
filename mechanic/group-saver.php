<?php 

	include 'functions.php';

	$gpid = $_REQUEST["gpid"];

	$users = RunQuerryMultidata("SELECT id, points FROM arp_users WHERE groupid = $gpid ");

	foreach ($users as $value) {
		$points = $_REQUEST["$value[0]"] + $value[1];
		$id = $value[0];
		RunQuerryNodata( "UPDATE arp_users SET points = $points WHERE id = $id ;");

		print $points."<br>";
	}

	header("Location: selector.php?pressed=group-saver");

 ?>
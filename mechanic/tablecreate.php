<?php 

	include 'functions.php';

	// RunQuerry("INSERT INTO arp_users (name, username) VALUES ('Developer Group Account', 'dev52')");

	
	$itemIdList = array();

	$fileHandler = fopen('../items/list.txt', 'r');

		while ( ! feof($fileHandler)) {
			$sor = trim(fgets($fileHandler));

			if ($sor != '') {
				$sor = substr($sor, strpos($sor, ']') + 1);

				array_push($itemIdList, $sor);
			}

		}

	fclose($fileHandler);

	$itemDataList = array();

	foreach ($itemIdList as $itemId) {
		
		$fileHandler = fopen("../items/$itemId/data.txt", 'r');

			$itemData = array();

			while ( ! feof($fileHandler)) {
				$sor = trim(fgets($fileHandler));

				if ($sor == '') {
					continue;
				}

				$itemData[substr($sor, 1, strpos($sor, ']') - 1)] = substr($sor, strpos($sor, ']') + 1);
			}

			array_push($itemDataList, $itemData);

		fclose($fileHandler);

	}

	foreach ($itemDataList as $itemarray) {
		foreach ($itemarray as $key => $value) {
			${"$key"} = $value;
		}

		echo '<pre>';
		var_dump($itemarray);
		echo '</pre>';

		copy("../items/$id/$img", "../images/public/$img");

		//RunQuerryNodata("INSERT INTO arp_shopitems (name, def1, def2, price, type, image) VALUES ('$name', '$def', '$quot', '$price', '$type', '$img')");

		// 	echo ("INSERT INTO arp_users (name, username, points, permission, image, market, creater, groups) VALUES ('".$value['name']."', '".$value['username']."', '".$value['ap']."', '".$value['perm']."', '".$value['img']."', '".$value['market']."', '".$value['owner']."', '".$value['groups']."')")."<br>";

	}


	exit();


	// $groups = array();

	// $fileHandler = fopen('../profils/groups.txt', 'r');

	// 	while (!feof($fileHandler)) {
			
	// 		$sor = fgets($fileHandler);

	// 		if ($sor != '') {
	// 			array_push($groups,trim($sor));
	// 		}

	// 	}

	// fclose($fileHandler);

	// $members = array();

	// foreach ($groups as $value) {
	// 	$fileHandler = fopen("../profils/$value/members.txt", 'r');

	// 		while (!feof($fileHandler)) {
			
	// 			$sor = trim(fgets($fileHandler));

	// 			if ($sor != '') {
	// 				array_push($members,$sor);
	// 			}

	// 		}

	// 	fclose($fileHandler);
	// }

	// $datas = array();

	// foreach ($members as $value) {
	// 	$fileHandler = fopen("../profils/".substr($value, 0, 4)."/$value/data.txt", 'r');

	// 		$personaldata = array();

	// 		while (!feof($fileHandler)) {
				
	// 			$sor = trim(fgets($fileHandler));

	// 			if ($sor != '') {
	// 				$personaldata[substr($sor, 1, strpos($sor, ']') - 1)] = substr($sor, strpos($sor, ']') + 1);
	// 			}
	// 		}

	// 	fclose($fileHandler);

	// 	array_push($datas, $personaldata);
	// }

	// foreach ($datas as $value) {
		
	// 	echo ("INSERT INTO arp_users (name, username, points, permission, image, market, creater, groups) VALUES ('".$value['name']."', '".$value['username']."', '".$value['ap']."', '".$value['perm']."', '".$value['img']."', '".$value['market']."', '".$value['owner']."', '".$value['groups']."')")."<br>";

	// }

 ?>
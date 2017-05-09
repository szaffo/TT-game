<?php 

	function AddLog ( $logtype, $log = 'Empty log post.') {

		$filepath = "../logs/$logtype.txt";

		$filehandler = fopen($filepath, 'a');

		$logpost = "LOG POST at [".date('Y-m-d G:i:s')."] MESSAGE: ".$log."\r\n";

			fwrite($filehandler, $logpost);

		fclose($filehandler);

		if ($logtype != 'logger') {
			AddLog ('logger', "Log added to $logtype.txt, logpost is: ".trim($logpost));
		}
	}


	function ArpConnect () {

		AddLog('database', "Connecting to database.");

		global $connhandler;

		$connhandler = new mysqli('localhost', 'mindfuck', 'p3En/n5/Wh3WgDRu', 'fotonik_hu');

		$connhandler->set_charset('utf8');

		if ($connhandler->connect_error) {
		    AddLog('database', "Connecting to database is faild.");
		    return false;
		} {
			AddLog('database', "Connecting to database is successfully.");
			return $connhandler;
		}
	}

	function RunQuerry ( $sql ) {

		AddLog('database', "Prepare to running querry: $sql.");

		$connhandler = ArpConnect();

		if ($connhandler == 'false') {
			return ;
		}

		AddLog('database', "Running querry: $sql.");

		$result = $connhandler->query($sql);

		$connhandler->close();

		// if (is_null($result) == 0) {
			
		// 	AddLog('database', "Querry ($sql) result is nothing.");
		// 	return;
		// }

		$result = mysqli_fetch_array($result);

		$resultfiltered = array();

		foreach ($result as $key => $value) {
			if (is_numeric($key)) {
				continue;
			}

			$resultfiltered["$key"] = $value;
		}

		AddLog('database', "Running querry was successfully.");

		return $resultfiltered;

	}

	function RunQuerryMultidata ( $sql ) {

		AddLog('database', "Prepare to running querry: $sql.");

		$connhandler = ArpConnect();

		if ($connhandler == 'false') {
			return ;
		}

		AddLog('database', "Running querry: $sql.");

		$result = $connhandler->query($sql);

		$connhandler->close();

		// if (is_null($result) == 0) {
			
		// 	AddLog('database', "Querry ($sql) result is nothing.");
		// 	return;
		// }

		$result = mysqli_fetch_all($result);

		$resultfiltered = array();

		// foreach ($result as $key => $value) {
		// 	if (is_numeric($key)) {
		// 		continue;
		// 	}

		// 	$resultfiltered["$key"] = $value;
		// }

		AddLog('database', "Running querry was successfully.");

		return $result;

	}

	function RunQuerryNodata ( $sql ) {

		AddLog('database', "Prepare to running querry: $sql.");

		$connhandler = ArpConnect();

		if ($connhandler == 'false') {
			return ;
		}

		AddLog('database', "Running querry: $sql.");

		$result = $connhandler->query($sql);

		$connhandler->close();

		AddLog('database', "Running querry was successfully.");

	}

	function PrintItem( $parameters = array() ) {

		// <div class='itemBox'>
		// 		<img src='../images/sample.png'>
		// 		<div class='itemBoxInfo'>
		// 			<h4>Item Neve</h4>
		// 			<p>
		// 				Ára: 21 Pont.<br>
		// 				Ez egy teszt szöveg az itemdoboz második sorának.<br>
		// 				Ez pedig a harmadik sor.
		// 			</p>
		// 		</div>
		// 		<button>Megveszem</button>
		// 	</div>

		// if ( count($parameters) == 0 ) {
		// 	echo 'this';
		// 	exit();
		// }

		if ( ! isset($parameters['image'])) {
			$parameters['image'] = 'sample.png';
		}
		if ( ! isset($parameters['name'])) {
			$parameters['name'] = 'Default name';
		}
		if ( ! isset($parameters['text'])) {
			$parameters['text'] = 'Default text line 1, <br> line 2.';
		}
		if ( ! isset($parameters['gomb'])) {
			$parameters['gomb'] = '';
		}
		if ( ! isset($parameters['gombprop'])) {
			$parameters['gombprop'] = 'type="submit"';
		}
		if ( ! isset($parameters['action'])) {
			$parameters['action'] = '';
		}
		if ( ! isset($parameters['method'])) {
			$parameters['method'] = 'POST';
		}
		if ( ! isset($parameters['type'])) {
					$parameters['type'] = 'none';
				}

		foreach ($parameters as $key => $value) {
			${"$key"} = $value;
		}

		//print "<div class='itemBox'>\r\n\t<img src='../images/public/$image'>\r\n\t<div class='itemBoxInfo'>\r\n\t\t<h4>$name</h4>\r\n\t\t<p>\r\n\t\t\t$text\r\n\t\t</p>\r\n\t</div>\r\n\t<button>$gomb</button>\r\n</div>";

		print "<div class='itemBox'>\r\n";

			print "\t<img src='../images/public/$image'>\r\n";

			print "\t<div class='itemBoxInfo'>\r\n";

				print "\t\t<h4>$name</h4>\r\n\t\t<p>\r\n";

					print "\t\t\t$text\r\n";

				print "\t\t</p>\r\n";

			print "\t</div>\r\n";
			if ($gomb != '') {
				print "\t<form action='$action' method='$method' >\r\n";

					print "\t\t<button $gombprop >$gomb</button>\r\n";
					print "\t\t<input type='hidden' name='pressed' value='item-$type' />\r\n";
				
				print "\t</form>";
			}

		print "</div>\r\n\r\n";

	}
	

	//gets the user's data from the database, and store it in the session
	function GetUserData ( $id = 'empty' ) {

		if ( $id == 'empty' ) {
			$id = $_SESSION['id'];
		}

		//userdata
		$userdata = RunQuerry("SELECT * FROM arp_users WHERE id = $id ");

		unset($userdata['password']);
		
		//session start
		if (session_status() == PHP_SESSION_NONE) {
		    session_start();
		}

		//save the page
		if (isset($_SESSION['page']) ) {
			$page = $_SESSION['page'];
		}
		
		session_unset();

		//store data in session
		foreach ($userdata as $key => $value) {
			$_SESSION["$key"] = $value;
		}

		//user group data
		$usergroups = RunQuerryMultidata("SELECT id, name From arp_groups WHERE ownerid = $id ");

		$_SESSION['usergroups'] = $usergroups;
		
		//restore page
		if (isset($page)) {
			$_SESSION["page"] = $page;
		}

	};

 ?>
<?php 
	include 'functions.php';

	session_start();

	if ( ! isset($_SESSION['name'])) {
		header('Location: ../');
	}

	$time = RunQuerry("SELECT updated_at FROM arp_users WHERE id = ".$_SESSION['id']);

	if ($time['updated_at'] != $_SESSION['updated_at']) {
		GetUserData();
	}

	$pressed = $_REQUEST['pressed'];

	AddLog("SELECTOR","Incoming request: $pressed");

	switch ($pressed) {
		case 'port-login':
				$_SESSION['page'] = 'scoreboard-local.php';
				$_SESSION["scoreboard-to-load"] = "local";
				$way = 'public';
			break;

		case 'menu-kezdolap':
				$_SESSION['page'] = 'scoreboard-local.php';
				$way = 'public';
			break;

		case 'menu-kilepes':
				$_SESSION["page"] = "logout.php";
				$way = 'mechanic';
			break;

		case 'menu-bolt':
				$_SESSION['page'] = 'shop.php';
				$way = 'public';
			break;

		case 'menu-csoportok':
				$_SESSION["page"] = 'mygroups.php';
				$way = "public";
			break;

		case 'menu-targyak':
				$_SESSION["page"] = 'inventory.php';
				$way = 'public';
			break;

		case 'menu-beallitasok':
				$_SESSION['page'] = 'settings.php';
				$way = 'public';
			break;

		case 'settings-save':
				$_SESSION['page'] = 'settings-save.php';
				$_SESSION['parameters'] = array(
													"name" => $_REQUEST['name'],
													"password" => $_REQUEST['password'],
													"email" => $_REQUEST['email']
												);
				$way = 'mechanic';
			break;

		case 'item-shop':
				$_SESSION['page'] = "kaufen.php";
				$_SESSION["message"] = $_POST["name"];
				$way = 'mechanic';
			break;

		case 'item-inventory':
				$_SESSION['page'] = 'item.php';
				$_SESSION['itemid'] = $_REQUEST['itemid'];
				$way = 'public';
			break;
		
		case 'scoreboard-menu':
				$_SESSION["page"] = "scoreboard-local.php";
				$_SESSION["scoreboard-to-load"] = $_REQUEST["scoreboard-presssed"];
				$way = "public";
			break;

		case 'mygroups-menu':
				$_SESSION["page"] = "group-administrate.php";
				$_SESSION["selected-group"] = $_REQUEST["mygroups-pressed"];
				$way = "public";
			break;

		// what?
		case 'group-administrate':
			echo '<pre>';
			var_dump($_REQUEST["gpadmin-test"]);
			echo '</pre>';
			exit;
			break;

		case 'group-saver':
				$_SESSION["page"] = "messenger.php";
				$_SESSION["message"] = "Felhasználók pontjai frissítve.";
				$way = "public";
			break;

		case 'error-message':
				$_SESSION["page"] = 'messenger.php';
				$_SESSION["message"] = $_REQUEST['errormsg'];
				$way = 'public';
			break;

		case 'developer-notes':
				$_SESSION["page"] = 'dev-notes.html';
				$way = 'public';
			break;

		default:
				$_SESSION['page'] = 'msg.php';
				$way = 'public';
			break;
	}

	header("Location: ../$way");

 ?>
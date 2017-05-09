<!-- 
ARPANET 2.0 2017.04.13
tob.hu 2017.04.20
 -->
<?php 

	include 'functions.php';

	$username = $_POST['username'];
	$password = $_POST['passw'];

	$PASS = 'DENIED';

	$result = RunQuerry("SELECT username, password, id FROM arp_users WHERE username = '$username'");

	if ($result == array() ) {
		
		AddLog('portlog', "LOGIN ERROR: in port.php. Message: There is no user in the database with name: [$username]");
		AddLog('portlog', "PASS is '$PASS' at the time.");
		header('Location: ../index.html');
		exit();
	
	} else {

		if ($password == $result['password']) {
			$PASS = 'CAN';
			AddLog('portlog', "AUTHENTICATION SUCCES: User ($username) password match. PASS is '$PASS' at the time.");
		} else {

			$PASS = 'DENIED';
			AddLog('portlog', "LOGIN FAILD: User ($username) password is NOT match. PASS is '$PASS' at the time.");

		}

	}

	if ($PASS != 'CAN') {

		AddLog('portlog', 'PORT STOPING');
		header('Location: ../');
		exit();
	} 

	AddLog('portlog', "Load database data to session. User: $username");

	GetUserData( $result["id"] );
	
	header('Location: selector.php?pressed=port-login');

	if ($_SESSION['id'] == 6) {
		header('Location: selector.php?pressed=developer-notes');
	}
 ?>
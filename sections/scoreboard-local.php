<form action='../mechanic/selector.php' method="POST">
	<input type="hidden" name="pressed" value="scoreboard-menu"> 
	<button type='submit' name="scoreboard-presssed" value='local'>Csoportos</button>
	<button type='submit' name="scoreboard-presssed" value='global'>Globális</button>

	<?php 

		foreach ($_SESSION['usergroups'] as $value) {
			print "<button type='submit' name='scoreboard-presssed' value='".$value[0]."'>".$value[1]."</button>\r\n";
		}

		if ($_SESSION['id'] == 6) {
			print "<button type='submit' name='scoreboard-presssed' value='ALL' > ALL </button>\r\n";
		}

	 ?>

</form>

<?php
	
	$mech_grouptoload = $_SESSION["scoreboard-to-load"];
	
	if ($mech_grouptoload == 'local') {
		
		$users = RunQuerryMultidata("SELECT image, name, points FROM arp_users WHERE groupid = $groupid;");

		foreach ($users as $value) {
			PrintItem( [ 'image' => $value[0], 'name' => $value[1], 'text' => "Pontok: $value[2] zseton." ] );
		}

	}

	

	
	if ($mech_grouptoload == 'global') {
		
		$users = RunQuerryMultidata("SELECT image, name, points FROM arp_users WHERE permission = 'Tanuló' ORDER BY name ;");

		foreach ($users as $value) {
			PrintItem( [ 'image' => $value[0], 'name' => $value[1], 'text' => "Pontok: $value[2] zseton." ] );
		}

	}




	if ($mech_grouptoload == 'ALL') {
		
		$users = RunQuerryMultidata("SELECT image, name, points FROM arp_users ORDER BY name;");

		foreach ($users as $value) {
			PrintItem( [ 'image' => $value[0], 'name' => $value[1], 'text' => "Pontok: $value[2] zseton." ] );
		}

	}
	

	


	if (($mech_grouptoload != 'global') and ($mech_grouptoload != 'local')  and ($mech_grouptoload != 'ALL')) {
		
		$users = RunQuerryMultidata("SELECT image, name, points FROM arp_users WHERE groupid = $mech_grouptoload;");

		foreach ($users as $value) {
			PrintItem( [ 'image' => $value[0], 'name' => $value[1], 'text' => "Pontok: $value[2] zseton." ] );
		}
		
	}
	


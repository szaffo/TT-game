<form class="flex-direction-column" action="../mechanic/group-saver.php" method="POST">
<?php 
	
	$gpid = $_SESSION["selected-group"];

	$users = RunQuerryMultidata("SELECT name, points, id FROM arp_users WHERE groupid = $gpid ");

	print "<input type='hidden' name='gpid' value='$gpid'>";

	foreach ($users as $value) {
		print $value[0]."(".$value[1]."):\r\n<br>";
		print "\t<input type='number' name='".$value[2]."' value='0'>\r\n";
	}

 ?>

<button type="submit">Küld</button>

</form>

<!-- 
	0.lekérésbe id is
	1.input neve a felhasználó id-je
	2.data sending to group packager
	3.selector
	4.gp saver
 -->
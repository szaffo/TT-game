<?php 

	$items = RunQuerryMultidata("SELECT arp_shopitems.name, arp_shopitems.image, arp_shopitems.id FROM arp_shopitems INNER JOIN arp_useritems ON (arp_shopitems.id = arp_useritems.itemid) and (arp_useritems.ownerid = ".$_SESSION['id'].")");

	echo '<pre>';
	var_dump($items);
	echo '</pre>';
	exit;

 ?>
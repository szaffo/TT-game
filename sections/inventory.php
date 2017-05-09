<?php 

	$items = RunQuerryMultidata("SELECT arp_shopitems.name, arp_shopitems.image, arp_shopitems.def2, arp_shopitems.id FROM arp_shopitems INNER JOIN arp_useritems ON (arp_shopitems.id = arp_useritems.itemid) and (arp_useritems.ownerid = ".$_SESSION['id'].") ORDER BY arp_useritems.id DESC");

	foreach ($items as $item) {
		$itemdata = array();

		$itemdata['name'] = $item[0];
		$itemdata['image'] = $item[1];
		$itemdata['text'] = $item[2];
		$itemdata['gomb'] = 'Megnézem';
		$itemdata['gombprop'] = 'type="submit" name="itemid" value="'.$item[3].'"';
		$itemdata['type'] = 'inventory';

		PrintItem($itemdata);
 	}

 ?>
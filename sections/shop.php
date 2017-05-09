<?php 

	$itemek = RunQuerryMultidata("SELECT name, price, type, image, id FROM arp_shopitems");

	foreach ($itemek as $item) {
		
		$iteminfo = array();

		$iteminfo['name'] = $item[0];
		$iteminfo['text'] = 'Ára: '.$item[1].'zseton';
		$iteminfo['action'] = "../mechanic/selector.php";
		$iteminfo['image'] = $item[3];
		$iteminfo['type'] = 'shop';

		if (($_SESSION['market'] == 'avaible') or ($item[2] == 'market')) {

			if ($item[1] <= $_SESSION['points']) {

				$iteminfo['gomb'] = 'Megveszem';

				$iteminfo['gombprop'] = "type = 'submit' name='name' value='$item[4]-$item[1]'";

			}//price
			
		}//market

		PrintItem( $iteminfo );
	}
	
 ?>
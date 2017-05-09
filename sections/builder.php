<!--
   ARPANET 2.x

   Copyright 2017 Szabó Martin @ tob.hu <szabomartun.tob.hu>
-->

<?php

	// Action with the profiles
	include 'profactions.php';

	// HTML head section [<html> included]
	include 'head.php';

	// HTML header section [<body> included]
	include 'header.php';

	// HTML navigation
	include 'menu.php';

	// start the content
	print "\r\n".'<div class="content">'."\r\n";

		// include the section that the selector sent
		include $_SESSION['page'];

	// content section end
	print '</div>';

	// HTML footer
	include 'footer.php';

?>

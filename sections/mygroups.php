<?php 
	
	if ( count($_SESSION["usergroups"]) == 0) {
		header("Location: ../mechanic/selector.php?pressed=menu-kezdolap");
	}
 ?>
 		A csportjaid:<br>

 	<form action="../mechanic/selector.php" method="POST">


 		<input type="hidden" name="pressed" value="mygroups-menu">

 		<?php 

 			foreach ($_SESSION["usergroups"] as $value) {
 				$gpid = $value[0];
 				$gpname = $value[1];

 				print "<button type='submit' name='mygroups-pressed' value='$gpid'>$gpname</button>";
 			}

 		 ?>
 		
 	</form>
		<nav>

			<form action="../mechanic/selector.php" method="POST">
				
				<button type="submit" name="pressed" value="menu-kezdolap" class="flaticon-house">Kezdőlap</button>
				<button type="submit" name="pressed" value="menu-bolt" class="flaticon-shopping-cart">Bolt</button>
				<button type="submit" name="pressed" value="menu-targyak" class="flaticon-shopping-bag">Tárgyak</button>
				<button type="submit" name="pressed" value="menu-beallitasok" class="flaticon-settings">Beállítások</button>
				<button type="submit" name="pressed" value="menu-uzenetek" class="flaticon-envelope">Üzenetek</button>
				
				<!-- if user has grups to administrate -->
				<?php 
					if (count($_SESSION["usergroups"]) > 0 ) {
						print '<button type="submit" name="pressed" value="menu-csoportok" class="flaticon-house">Csoportok</button>';
					}

				 ?>
				
				<button type="submit" name="pressed" value="menu-kilepes" class="flaticon-logout">Kilépés</button>
			
			</form>

		</nav>
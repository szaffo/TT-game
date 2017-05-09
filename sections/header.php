<body onscroll="hideHeader()" onload="setBodyOpacity(1)">

		<header id="header">

			<h1 id="siteName">Arpanet</h1>

				<div class="headerBox" id="headerInformationBox"><!-- jobb oldali doboz in fejlec -->

					<div class="headerBox imageBox"><!-- kep doboza az infok mellett -->

						<?php 
							print "<img src='../images/public/$image'>";
						 ?>

					</div><!-- /imagebox -->

					<div class="headerBox infoBox" onmouseover="zoomToInfo('3.6vh','0')" onmouseout="zoomToInfo('2.6vh','1')" ><!-- doboz bal oldala, azaz az info a fejlecben -->

							<p id="Information">
								<?php 

									print "Pénz: $points zseton<br>";

								 ?>

								<!-- Pénz: 32zseton<br>
								Tárgyak: 55db<br>Targyak
								Üzeneteid: 2 új/65 -->
							</p>

						<?php 

							print "<h2 id='Name'>$name</h2>";

						 ?>

						<!-- <h2 id="Name">Minta Pistike</h2> -->

					</div><!-- /infobox -->

				</div><!-- /headerbox -->

				<div class="infoButton flaticon-back-infoButton" id="rightButton" onclick="showInfoBox()"><!-- button for show informations on portrait viewport -->
				</div><!-- infoButton -->

				<div class="menuButton flaticon-next-1-menuButton" id="leftButton" onclick="showMenu()"><!-- button for show informations on portrait viewport -->
				</div><!-- menuButton -->

		</header>
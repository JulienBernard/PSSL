	<main id="main">
		<div class="row">
			<div class="large-12 columns">
				<!-- Desktop Slider -->
				<div class="hide-for-small">
					<ul data-orbit="" data-options="slide_number:false;bullets:false;timer_speed:4000;" class="orbit">
						<li class="active">
							<a href="pages.php?id=1">
								<img src="./img/demo2.jpg" />
							</a>
						</li>
						<li>
						<a href="pages.php?id=3">
							<img src="./img/demo.jpg" />
						</a>
						</li>
					</ul>
				</div>
				<!-- End Desktop Slider -->

				<!-- Mobile Header -->
				<div class="show-for-small small-12 columns">
					<ul data-orbit="" data-options="navigation_arrows:false;slide_number:false;bullets:false;timer_speed:3000;" class="orbit">
						<li class="active">
							<a href="subscribe.php">
								<img src="./img/demo2.jpg" />
							</a>
						</li>
						<li class="active">
							<img src="./img/demo.jpg" />
						</li>
					</ul>
				</div>
				<!-- End Mobile Header -->
			</div>
			<div class="large-9 small-12 columns">
				<br />
				<div class="panel radius">
					<div class="row">
						<div class="large-6 small-6 columns">
							<h4><?php echo $Lang->getIndexText('title'); ?></h4>
							<hr />
							<h5 class="subheader">
								<?php echo $Lang->getIndexText('subtitle'); ?>
							</h5>
						</div>
						<div class="large-6 small-6 columns">
							<?php echo $Lang->getIndexText('text'); ?>
						</div>
					</div>
				</div>
				<hr />
				<div class="panel radius">
					<h4>Actu #1</h4>
					<hr />
					<h5 class="subheader">
						Préparez-vous, la première LAN va bientôt arriver !
					</h5>
					<p>Duis sodales arcu vitae accumsan condimentum. Morbi volutpat pellentesque viverra. Morbi rutrum, diam a ullamcorper lobortis, neque magna semper magna, et venenatis lorem lorem at urna. Ut sed tempus nulla.</p>
				</div>
				<div class="panel radius">
					<h4>Actu #2</h4>
					<hr />
					<h5 class="subheader">
						Préparez-vous, la première LAN va bientôt arriver !
					</h5>
					<p>Duis sodales arcu vitae accumsan condimentum. Morbi volutpat pellentesque viverra. Morbi rutrum, diam a ullamcorper lobortis, neque magna semper magna, et venenatis lorem lorem at urna. Ut sed tempus nulla.</p>
				</div>
			</div>
			<div class="large-3 small-12 columns">
				<br />
				<div class="panel radius">
					<h4><?php echo $Lang->getLoginText('subscribe'); ?></h4>
					<p class="subheader">
						<a href="#" data-reveal-id="loginModal">Je crée un compte</a>
					</p>
					<hr />
					<h4><?php echo $Lang->getLoginText('logme'); ?></h4>
					<p class="subheader">
						<a href="#" data-reveal-id="loginModal">Je me connecte</a>
					</p>
				</div>
				<div class="panel radius">
					<h4>Tournois</h4>
					<hr />
					<p class="subheader">
						<?php
						for( $i = 0 ; $i < count($tournamentsList) ; $i++ )
						{
							if( count($tournamentsList) == 0 || $tournamentsList != 0 )
							{
								echo '<a href="tournaments.php">'.ucfirst($tournamentsList[$i]['name']).'</a><br />';
							}
						}
						if( count($tournamentsList) == 0 OR $tournamentsList == 0 )
						{
							echo "Aucun tournoi.";
						}
						?>
					</p>
				</div>
				<div class="panel radius">
					<h4>Partenaires</h4>
					<hr />
					<p class="center">
						<img src="./img/esieaLogo.gif" alt="ESIEA" />
						<img src="./img/intechinfoLogo.png" alt="IN'TECH INFO" />
					</p>
				</div>
			</div>
		</div>
	</main>
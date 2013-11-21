	<main id="main">	 
		<div class="row">
			<div data-alert class="large-12 alert-box">
				<p class="center">
					<a href="subscribe.php" style="color: black;">>> <?php echo $Lang->getHeaderText('subscribe'); ?> <<</a>
				</p>
				<a href="#" class="close">&times;</a>
			</div>
			<div class="large-12 columns">
				<div class="row">
					<?php
						for( $i = 0 ; $i < count($games)-4 ; $i++ )
						{
						?>
						<div class="large-3 small-6 columns">
							<div class="game-product">
								<a href="pages.php?id=<?php echo $games[$i]->getPageId(); ?>">
									<div id="game-products-hidden"></div>
									<img src="./img/<?php echo $games[$i]->getImage(); ?>" style="border-radius: 5px 5px 0 0" />
								</a>
							</div>
							<h6 class="panel" style="margin-top: 0; border-radius: 0 0 5px 5px"><?php echo ucfirst($games[$i]->getName()); ?><br /><a href="#" data-reveal-id="tournamentModal">Rejoindre ce tournoi !</a><br /><span class="smaller">(<?php echo $games[$i]->getPlayers(); ?>)</span></h6>
						</div>
						<?php
						}
					?>
					<div class="large-6 small-12 columns right">
						<div class="game-product">
							<a href="pages.php?id=<?php echo $specialGame->getPageId(); ?>">
								<div id="game-products-hidden"></div>
								<img style="height: 500px;" src="./img/<?php echo $specialGame->getImage(); ?>" style="border-radius: 5px 5px 0 0" />
							</a>
						</div>
						<h6 class="panel" style="margin-bottom: 0;"><?php echo ucfirst($specialGame->getName()); ?><br /><a href="#" data-reveal-id="accountModal">Je jouerai à ce jeu !</a><br /><span class="smaller">(? membres)</span></h6>
						<h6 class="panel smaller" style="margin-top: 0; border-radius:0 0 5px 5px; padding-bottom: 10px;"><?php echo $specialGame->getPitch(); ?></h6>
					</div>
					<?php
						for( $i = 2 ; $i < count($games)-2 ; $i++ )
						{
						?>
						<div class="large-3 small-6 columns">
							<div class="game-product">
								<a href="pages.php?id=<?php echo $games[$i]->getPageId(); ?>">
									<div id="game-products-hidden"></div>
									<img src="./img/<?php echo $games[$i]->getImage(); ?>" style="border-radius: 5px 5px 0 0" />
								</a>
							</div>
							<h6 class="panel" style="margin-top: 0; border-radius: 0 0 5px 5px"><?php echo ucfirst($games[$i]->getName()); ?><br /><a href="#" data-reveal-id="tournamentModal">Rejoindre ce tournoi !</a><br /><span class="smaller">(<?php echo $games[$i]->getPlayers(); ?>)</span></h6>
						</div>
						<?php
						}
					?>
				</div>
			</div>
		</div>
		
		<div class="row">
			<div class="large-12 columns">
				<div class="row">
					<?php
						for( $i = 4 ; $i < count($games) ; $i++ )
						{
						?>
						<div class="large-3 small-6 columns">
							<div class="game-product">
								<a href="pages.php?id=<?php echo $games[$i]->getPageId(); ?>">
									<div id="game-products-hidden"></div>
									<img src="./img/<?php echo $games[$i]->getImage(); ?>" style="border-radius: 5px 5px 0 0" />
								</a>
							</div>
							<h6 class="panel" style="margin-top: 0; border-radius: 0 0 5px 5px"><?php echo ucfirst($games[$i]->getName()); ?><br /><a href="#" data-reveal-id="tournamentModal">Rejoindre ce tournoi !</a><br /><span class="smaller">(<?php echo $games[$i]->getPlayers(); ?>)</span></h6>
						</div>
						<?php
						}
					?>
					<div class="large-6 columns hide-for-small">
						<br /><br /><br />
						<h3 style="color: #ecf0f1;"><?php echo $Lang->getIndexText('stay'); ?></h3><hr/>
						<a class="large button expand" href="http://www.youtube.com/user/PSSLOfficial"><?php echo $Lang->getIndexText('youtube'); ?></a>
						<a class="large-5 button columns" href="https://www.facebook.com/PSSLan"><?php echo $Lang->getIndexText('facebook'); ?></a>
						<a class="large-5 button columns" href="https://twitter.com/PSSLan"><?php echo $Lang->getIndexText('twitter'); ?></a>
					</div>
				</div>
				<div class="panel radius">
					<h4>Partenaires</h4>
					<hr />
					<p class="center">
						<img src="./img/esieaLogo.gif" style="height: 60px;" alt="ESIEA" />
						<img src="./img/intechinfoLogo.png" style="height: 50px;" alt="IN'TECH INFO" />
					</p>
				</div>
			</div>
		</div>
	</main>

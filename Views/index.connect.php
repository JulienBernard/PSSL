	<main id="main">
		<div class="row">
			<div class="large-12 columns">
				<!-- Desktop Slider -->
				<div class="hide-for-small">
					<ul data-orbit="" data-options="slide_number:false;bullets:false;timer_speed:4000;" class="orbit">
						<li class="active">
							<a href="subscribe.php">
								<img src="./img/demo2.jpg" />
								<div class="orbit-caption"><?php echo $Lang->getIndexText('new1'); ?></div>
							</a>
						</li>
						<li class="active">
							<img src="./img/demo.jpg" />
							<div class="orbit-caption"><?php echo $Lang->getIndexText('new2'); ?></div>
						</li>
					</ul>
				</div>
				<!-- End Desktop Slider -->

				<!-- Mobile Header -->
				<div class="show-for-small">
					<ul data-orbit="" data-options="navigation_arrows:false;slide_number:false;bullets:false;timer_speed:3000;" class="orbit">
						<li class="active">
							<a href="subscribe.php">
								<img src="./img/demo2.jpg" />
								<div class="orbit-caption"><?php echo $Lang->getIndexText('new1'); ?></div>
							</a>
						</li>
						<li class="active">
							<img src="./img/demo.jpg" />
							<div class="orbit-caption"><?php echo $Lang->getIndexText('new2'); ?></div>
						</li>
					</ul>
				</div>
				<!-- End Mobile Header -->
			</div>
		</div>
		<br />
	 
		<div class="row">
			<div class="large-12 columns">
				<div class="row">
					<?php
						for( $i = 0 ; $i < count($games)-2 ; $i++ )
						{
						?>
						<div class="large-3 small-6 columns">
							<div class="game-product">
								<a href="pages.php?id=<?php echo $games[$i]->getPageId(); ?>">
									<div id="game-products-hidden"></div>
									<img src="./img/<?php echo $games[$i]->getImage(); ?>" style="border-radius: 5px 5px 0 0" />
								</a>
							</div>
							<h6 class="panel" style="margin-top: 0; border-radius: 0 0 5px 5px"><?php echo $games[$i]->getName(); ?><br /><a href="#" data-reveal-id="notYetModal">Rejoindre ce tournoi !</a><br /><span class="smaller">(<?php echo $games[$i]->getPlayers(); ?>)</span></h6>
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
						<h6 class="panel" style="margin-bottom: 0;"><?php echo $specialGame->getName(); ?><br /><a href="#" data-reveal-id="accountModal">Je jouerai à ce jeu !</a><br /><span class="smaller">(? membres)</span></h6>
						<h6 class="panel smaller" style="margin-top: 0; border-radius:0 0 5px 5px; padding-bottom: 10px;"><?php echo $specialGame->getPitch(); ?></h6>
					</div>
					<?php
						for( $i = 2 ; $i < count($games) ; $i++ )
						{
						?>
						<div class="large-3 small-6 columns">
							<div class="game-product">
								<a href="pages.php?id=<?php echo $games[$i]->getPageId(); ?>">
									<div id="game-products-hidden"></div>
									<img src="./img/<?php echo $games[$i]->getImage(); ?>" style="border-radius: 5px 5px 0 0" />
								</a>
							</div>
							<h6 class="panel" style="margin-top: 0; border-radius: 0 0 5px 5px"><?php echo $games[$i]->getName(); ?><br /><a href="#" data-reveal-id="notYetModal">Rejoindre ce tournoi !</a><br /><span class="smaller">(<?php echo $games[$i]->getPlayers(); ?>)</span></h6>
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
					<div class="large-8 columns">
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
						<div class="row">
							<p class="show-for-small smaller" align="center">
								Suivez-nous sur : <a href="subscribe.php">Twitter</a> et <a href="subscribe.php">Facebook</a>
							</p>
						</div>
					</div>

					<div class="large-4 columns hide-for-small">
						<h3 style="color: #ecf0f1;"><?php echo $Lang->getIndexText('stay'); ?></h3><hr/>
						<a class="large button expand" href="http://www.youtube.com/user/PSSLOfficial"><?php echo $Lang->getIndexText('youtube'); ?></a>
						<a class="large-5 button columns" href="https://www.facebook.com/PSSLan"><?php echo $Lang->getIndexText('facebook'); ?></a>
						<a class="large-5 button columns" href="https://twitter.com/PSSLan"><?php echo $Lang->getIndexText('twitter'); ?></a>
					</div>
				</div>
			</div>
		</div>
	</main>

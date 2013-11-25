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
				<?php
				for( $i = 0 ; $i < count($newsList) ; $i++ )
				{
					echo '<div class="panel radius">';
					echo '<p class="subheader right smaller">'.$Lang->getGeneralText('publishedThe').' '.date('d/m/y', $newsList[$i]['activity']).'</p>';
					if( count($newsList) == 0 || $newsList != 0 )
					{
						echo '<h4>'.ucfirst($newsList[$i]['title']).'</h4>';
						echo '<hr />';
						echo '<p>'.html_entity_decode($newsList[$i]['text']).'</p>';
					}
					echo '</div>';
				}
				?>
			</div>
			<div class="large-3 small-12 columns">
				<br />
				<div class="panel radius">
					<h4><?php echo $Lang->getLoginText('subscribe'); ?></h4>
					<p class="subheader">
						<a href="#" data-reveal-id="registerModal"><?php echo $Lang->getGeneralText('createAccount'); ?></a>
					</p>
					<hr />
					<h4><?php echo $Lang->getLoginText('logme'); ?></h4>
					<p class="subheader">
						<a href="#" data-reveal-id="loginModal"><?php echo $Lang->getGeneralText('iLogin'); ?></a>
					</p>
				</div>
				<div class="panel radius">
					<h4><?php echo $Lang->getGeneralText('tournament'); ?></h4>
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
				<div class="panel radius">
					<h5><?php echo $Lang->getIndexText('stay'); ?></h5><hr/>
					<a href="http://www.youtube.com/user/PSSLOfficial">Notre chaine Youtube</a><br />
					<a href="https://www.facebook.com/PSSLan">Notre Facebook</a><br />
					<a href="https://twitter.com/PSSLan">Notre Twitter</a>
				</div>
			</div>
		</div>
	</main>
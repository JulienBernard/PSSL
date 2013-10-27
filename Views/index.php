	<main id="main">
		<div class="row">
			<div class="large-12 columns">
				<!-- Desktop Slider -->
				<div class="hide-for-small">
					<ul data-orbit="" data-options="slide_number:false;bullets:false;timer_speed:4000;" class="orbit">
						<li class="active">
							<img src="./img/demo.jpg" />
							<div class="orbit-caption"><?php echo $Lang->getIndexText('new1'); ?></div>
						</li>
						<li class="active">
							<img src="./img/demo2.jpg" />
							<div class="orbit-caption"><?php echo $Lang->getIndexText('new2'); ?></div>
						</li>
					</ul>
				</div>
				<!-- End Desktop Slider -->

				<!-- Mobile Header -->
				<div class="show-for-small">
					<ul data-orbit="" data-options="navigation_arrows:false;slide_number:false;bullets:false;timer_speed:3000;" class="orbit">
						<li class="active">
							<img src="./img/demo.jpg" />
							<div class="orbit-caption"><span class="smaller">La prochaine LAN se tiendra à IN'TECH INFO le 21 Décembre 2016 : envie de joueur Terran ?</span></div>
						</li>
						<li>
							<img src="./img/demo2.jpg" />
							<div class="orbit-caption"><span class="smaller">Les Tournois Fous de League Of Legend reviennent : le prochain tournoi opposera des supports contre ... des supports !</span></div>
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
					<div class="large-3 small-6 columns">
						<div class="game-product">
							<a href="#">
								<div id="game-products-hidden"></div>
								<img src="./img/lol.jpeg" style="border-radius: 5px 5px 0 0" />
							</a>
						</div>
						<h6 class="panel" style="margin-top: 0; border-radius: 0 0 5px 5px">League Of Legend<br /><a href="#">Rejoindre ce tournoi !</a><br /><span class="smaller">(5v5)</span></h6>
					</div>
					<div class="large-3 small-6 columns">
						<div class="game-product">
							<a href="#">
								<div id="game-products-hidden"></div>
								<img src="./img/cs.jpg" style="border-radius: 5px 5px 0 0" />
							</a>
						</div>
						<h6 class="panel" style="margin-top: 0; border-radius: 0 0 5px 5px">Counter Strike G.O.<br /><a href="#">Rejoindre ce tournoi !</a><br /><span class="smaller">(5v5 - 7v7)</span></h6>
					</div>
					<div class="large-6 small-12 columns right">
						<div class="game-product">
							<a href="#">
								<div id="game-products-hidden"></div>
								<img src="./img/xrebirth.jpg" style="border-radius: 5px 5px 0 0" />
							</a>
						</div>
						<h6 class="panel" style="margin-bottom: 0;">X : Rebirth<br /><a href="#">Je jouerai à ce jeu !</a><br /><span class="smaller">(6 membres)</span></h6>
						<h6 class="panel smaller" style="margin-top: 0; border-radius:0 0 5px 5px; padding-bottom: 35px;">Jeu de gestion et de simulation disponible sur PC et prenant place dans les confins de l'espace.</h6>
					</div>
					<div class="large-3 small-4 columns hide-for-small">
						<div class="game-product">
							<a href="#">
								<div id="game-products-hidden"></div>
								<img src="./img/cs.jpg" style="border-radius: 5px 5px 0 0" />
							</a>
						</div>
						<h6 class="panel" style="margin-top: 0; border-radius: 0 0 5px 5px">Counter Strike : G.O.<br /><a href="#">Rejoindre ce tournoi !</a><br /><span class="smaller">(5v5 - 7v7)</span></h6>
					</div>
					<div class="large-3 small-4 columns hide-for-small">
						<div class="game-product">
							<a href="#">
								<div id="game-products-hidden"></div>
								<img src="./img/sc2.jpg" style="border-radius: 5px 5px 0 0" />
							</a>
						</div>
						<h6 class="panel" style="margin-top: 0; border-radius: 0 0 5px 5px">Starcraft II<br /><a href="#">Rejoindre ce tournoi !</a><br /><span class="smaller">(1v1 - 2v2)</span></h6>
					</div>
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
								<h4>Rejoignez un évenement unique en son genre</h4>
								<hr />
								<h5 class="subheader">
									Propulsé par un groupe d'étudiant passionné d'IN'TECH INFO, notre projet vous entraînera vers des sensations fortes à bout de claviers et de jeux en réseau à tout va !
								</h5>
							</div>
							<div class="large-6 small-6 columns">
								<p>
									Projet de formation humaine inédit, notre équipe a pour mission d'organiser un évenement autour des <acronym title="Local Area Network">LAN</acronym>.
								</p>
								<p>
									Après quelques LAN amateurs dans nos locaux à Ivry-sur-Seine, nous organiserons un grand évenement E-Sport sur Paris !<br />
									<a href="#" class="right"><?php echo $Lang->getIndexText('more'); ?></a>
								</p>
							</div>
						</div>
					</div>
					<div class="row">
						<p class="show-for-small smaller" align="center">
							Suivez-nous sur : <a href="#">Twitter</a> et <a href="#">Facebook</a>
						</p>
					</div>
				</div>

				<div class="large-4 columns hide-for-small">
					<h3 style="color: #ecf0f1;"><?php echo $Lang->getIndexText('stay'); ?></h3><hr/>
					<a class="large button expand" href="#"><?php echo $Lang->getIndexText('youtube'); ?></a>
					<a class="large button expand" href="#"><?php echo $Lang->getIndexText('facebook'); ?></a>
				</div>
				</div>
			</div>
		</div>
	</main>

	<div id="loginModal" class="reveal-modal">
		<h2><?php echo $Lang->getLoginText('title1'); ?></h2>
		<p class="lead"><?php echo $Lang->getLoginText('subtitle1'); ?></p>
		<p>
			<?php echo $Lang->getLoginText('text1'); ?>
		</p>
		
		<form action="index.php" method="POST">
			<div class="row">
				<div class="large-4 columns">
					<label for="usr"><?php echo $Lang->getLoginText('username'); ?></label>
					<input id="usr" type="text" name="username" placeholder="Username" />
				</div>
				<div class="large-4 columns">
					<label for="pwd"><?php echo $Lang->getLoginText('password'); ?></label>
					<input id="pwd" type="password" name="password" placeholder="Password" />
				</div>
				<div class="large-4 columns">
					<br />
					<input class="small button" type="submit" name="login" value="<?php echo $Lang->getLoginText('logme'); ?>" />
				</div>
			</div>
		</form>
		
		<hr />
		<h2><?php echo $Lang->getLoginText('title2'); ?></h2>
		<p class="lead"><?php echo $Lang->getLoginText('subtitle2'); ?></p>
		<p>
			<?php echo $Lang->getLoginText('text2'); ?>
		</p>
		
		<form action="index.php" method="POST">
			<div class="row">
				<div class="large-4 columns">
					<label for="usr"><?php echo $Lang->getLoginText('username'); ?></label>
					<input id="usr" type="text" name="username" placeholder="Username" />
				</div>
				<div class="large-4 columns">
					<label for="pwd"><?php echo $Lang->getLoginText('password'); ?></label>
					<input id="pwd" type="password" name="password" placeholder="Password" />
				</div>
				<div class="large-4 columns">
					<br />
					<input class="small button" type="submit" name="subscribe" value="<?php echo $Lang->getLoginText('subscribe'); ?>" />
				</div>
			</div>
		</form>
		<a class="close-reveal-modal">&#215;</a>
	</div>
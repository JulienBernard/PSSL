	<main id="main">		
		<div class="row">
			<div class="large-12 columns">
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
								<a href="#" class="right">En savoir plus</a>
							</p>
						</div>
					</div>
				</div>
				
				<div class="panel radius">
					<div class="row">
						<div class="large-12 columns">				
							<h2><?php echo $Lang->getLoginText('title3'); ?></h2>
							<p class="lead"><?php echo $Lang->getLoginText('subtitle3'); ?></p>
							<p>
								<?php echo $Lang->getLoginText('text3'); ?>
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
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>

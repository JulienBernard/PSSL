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
							
							<form action="subscribe.php" method="POST" class="center custom">
							<?php
								if( $exist ) {
								?>
									<div class="center">
										<input class="large button" type="submit" name="unregister" value="<?php echo $Lang->getLoginText('unsubscribe'); ?>" />
									</div>
								<?php
								}
								else {
							?>
									<div class="center" style="width: 25%;">
										<select id="customDropdown1" name="participate" class="medium">
											<option SELECTED><?php echo $Lang->getLoginText('IParticipate'); ?></option>
											<option><?php echo $Lang->getLoginText('INotParticipate'); ?></option>
										</select>
									</div>
									<div class="center">
										<input style="width: 25%; margin: auto;" class="center" type="text" name="mail" placeholder="Mail"/>
										<br />
										<label for="checkbox1">
											<input type="checkbox" id="checkbox1" name="present" style="display: none;"><span class="custom checkbox"></span> <?php echo $Lang->getLoginText('UoT'); ?>
										</label>
										<br />
										<input class="large button" type="submit" name="register" value="<?php echo $Lang->getLoginText('subscribe'); ?>" />
									</div>
									<div class="center">
										<br />
										<p class="lead"><?php echo $Lang->getGeneralText('emailValid'); ?></p>
										<p class="smaller" style="margin-top: -25px;"><?php echo $Lang->getGeneralText('emailUse'); ?></p>
									</div>
								<?php
								}
								?>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</main>

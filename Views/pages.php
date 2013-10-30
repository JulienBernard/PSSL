	<main id="main">
		<div class="row">
			<div class="large-12 columns">
				<div class="panel radius">
					<div class="row">
						<div class="large-3 small-12 columns">
							<h4><?php echo $Page->getTitle(); ?></h4>
							<hr />
							<p class="subheader">
								<?php echo $Lang->getGeneralText('by'); ?> <?php echo ucfirst($Page->getAuthor()); ?><br />
								<?php echo $Lang->getGeneralText('lastUpdateThe'); ?> <?php echo date('d/m/y', $Page->getActivity()); ?><br />
							</p>
							<p><a href="index.php"><?php echo $Lang->getNavigationText('returnToHome'); ?></a></p>
						</div>
						<div class="large-9 small-12 columns">
							<p>
								<?php echo html_entity_decode($Page->getText()); ?>
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
		</div>
	</main>
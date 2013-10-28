	<main id="main">
		<div class="row">
			<div class="large-12 columns">
				<div class="panel radius">
					<div class="row">
						<div class="large-3 small-12 columns">
							<h4><?php echo $Page->getTitle(); ?></h4>
							<hr />
							<p class="subheader">
								<?php echo $Lang->getGeneralText('by'); ?> <?php echo $Page->getAuthor(); ?><br />
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
					<input class="small button" type="submit" name="login" value="<?php echo $Lang->getLoginText('logme'); ?>" />
				</div>
			</div>
		</form>
		<a class="close-reveal-modal">&#215;</a>
	</div>
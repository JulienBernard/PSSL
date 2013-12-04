	
	<div class="Modal" id="modalContent">
		<div class="popup_block">
			<a href="<?php echo $_SERVER['PHP_SELF']; if( isset($_SERVER['QUERY_STRING']) ) echo '?'.$_SERVER['QUERY_STRING']; ?>#noWhere" class="right">&#215;</a>
			<?php
			if( $Engine->getError() != null )
			{
				echo '<p class="lead">An error has been detected!</p>';
				echo '<p>'.$Engine->getError().'</p>';
				echo '<br /><a href="'.$_SERVER["PHP_SELF"].'?'.$_SERVER['QUERY_STRING'].'#noWhere" class="center">Click here to retry!</a>';
			}
			else if( $Engine->getSuccess() != null )
			{
				echo '<p class="lead">Success!</p>';
				echo $Engine->getSuccess();
				echo '<div class="center"><a href="'.$_SERVER["PHP_SELF"].'">Click here to validate!</a></div>';
			}
			else if( $Engine->getInfo() != null )
			{
				echo '<p class="lead">Informations:</p>';
				echo $Engine->getInfo();
				echo '<br /><a href="'.$_SERVER["PHP_SELF"].'?'.$_SERVER['QUERY_STRING'].'#noWhere" class="center">Click here to retry!</a>';
			}
			?>
		</div>
	</div>
	
	<div id="loginModal" class="large-12 small-6 reveal-modal">
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
	</div>
	<div id="registerModal" class="large-12 small-6 reveal-modal">
		<h2><?php echo $Lang->getLoginText('title2'); ?></h2>
		<p class="lead"><?php echo $Lang->getLoginText('subtitle2'); ?></p>
		<p>
			<?php echo $Lang->getLoginText('text2'); ?>
		</p>
		
		<form action="index.php" method="POST">
			<div class="row">
				<div class="large-3 columns">
					<label for="username"><?php echo $Lang->getLoginText('username'); ?></label>
					<input id="username" type="text" name="username" placeholder="Username (Use for login)" title="Votre nom d'utilisateur doit être supérieur à 3 caractères et être inférieur à 100 caractères." />
				</div>
				<div class="large-3 columns">
					<label for="pwd2"><?php echo $Lang->getLoginText('password'); ?></label>
					<input id="pwd2" type="password" name="password" placeholder="Password" title="Votre mot de passe doit être supérieur à 3 caractères et être inférieur à 100 caractères." />
				</div>
				<div class="large-2 columns">
					<br />
					<input class="small button" type="submit" name="subscribe" value="<?php echo $Lang->getLoginText('subscribe'); ?>" />
				</div>
			</div>
		</form>
		<a class="close-reveal-modal">&#215;</a>
	</div>
	
	<footer id="footer">
		<div class="row">
			<div class="large-12 columns">
				<hr>
				<div class="row copyright">
					<div class="large-8 columns">
						<p class="smaller">
							&copy; 2013 - Le contenu présent sur ce site appartient à leur auteurs respectifs.<br />
							Équipe composée de Brice, Corentin, Johan, Julien, Ludovic, Lionel et Romain.
						</p>
					</div>
					<div class="large-4 columns">
						<ul class="inline-list right">
							<li><a href="pages.php"><?php echo $Lang->getHeaderText('project'); ?></a></li>
							<li><a href="pages.php"><?php echo $Lang->getHeaderText('team'); ?></a></li>
							<li><a href="#" data-reveal-id="loginModal"><strong><?php echo $Lang->getHeaderText('participate'); ?></strong></a></li>
						</ul>
						<span class="right smaller"><a href="https://github.com/JulienBernard/PSSL/">Site sous licence GNU !</a></span>
					</div>
				</div>
			</div>
		</div>
	</footer>
	
	<!--
		Foundation 4 script.
	-->
	<script>
	document.write('<script src=' +
	('__proto__' in {} ? 'js/vendor/zepto' : 'js/vendor/jquery') +
	'.js><\/script>')
	</script>
  
	<script src="js/foundation.min.js"></script>
	<script src="js/foundation/foundation.orbit.js"></script>

	<script>
	$(document).foundation();
	</script>
</body>
</html>
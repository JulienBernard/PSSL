	
	<div class="Modal" id="modalContent">
		<div class="popup_block">
			<a href="<?php echo $_SERVER['PHP_SELF']; if( isset($_SERVER['QUERY_STRING']) ) echo '?'.$_SERVER['QUERY_STRING']; ?>#noWhere" class="right">&#215;</a>
			<?php
			if( $Engine->getError() != null )
			{
				echo '<p class="lead">An error has been detected!</p>';
				echo '<p>'.$Engine->getError().'</p>';
				echo '<br /><a data-reveal-id="loginModal" href="'.$_SERVER["PHP_SELF"].'?'.$_SERVER['QUERY_STRING'].'#noWhere" class="center">Click here to retry!</a>';
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
	
	<footer id="footer">
		<div class="row">
			<div class="large-12 columns">
				<hr>
				<div class="row copyright">
					<div class="large-8 columns">
						<p class="smaller">
							&copy; 2013 - Le contenu présent sur ce site appartient à leur auteurs respectifs.<br />
							Propulsé par une équipe de folie composée de Brice, Correntin, Johan, Julien et Romain.
						</p>
					</div>
					<div class="large-4 columns">
						<ul class="inline-list right">
							<li><a href="#"><?php echo $Lang->getHeaderText('project'); ?></a></li>
							<li><a href="#"><?php echo $Lang->getHeaderText('team'); ?></a></li>
							<li><a href="#"><strong><?php echo $Lang->getHeaderText('participate'); ?></strong></a></li>
						</ul>
						<span class="right smaller"><a href="https://github.com/JulienBernard/PSSL/">Organisateurs ? Site sous licence GNU !</a></span>
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
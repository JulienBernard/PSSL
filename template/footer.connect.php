
	<div id="accountModal" class="reveal-modal">
		<h2>MY ACCOUNT</h2>
		<p class="lead center">(Private) Oh, this is my personal data</p>
		<table style="margin:auto; width: 60%;">
			<thead>
				<tr>
					<th style="text-align: center;">My name is..</th>
					<th style="text-align: center;">My username is..</th>
					<th style="text-align: center;">My email is..</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td style="text-align: center;">Julien Bernard</td>
					<td style="text-align: center;">Jibi</td>
					<td style="text-align: center;">jibi@free.fr</td>
				</tr>
			</tbody>
		</table>
		<br /><br /><br />
		<p class="lead center">(Public) Hey look, this is my game list!</p>
		<table style="margin:auto; width: 50%;">
			<tbody>
				<tr>
					<td style="text-align: center;">Star Citizen</td>
					<td style="text-align: center;">Medium</td>
				</tr>
				<tr>
					<td style="text-align: center;">Age of Empire</td>
					<td style="text-align: center;">Medium</td>
				</tr>
				<tr>
					<td style="text-align: center;">League of Legend</td>
					<td style="text-align: center;">Medium</td>
				</tr>
				<tr>
					<td style="text-align: center;">Star Conflict</td>
					<td style="text-align: center;">Newbie</td>
				</tr>
			</tbody>
			<tfoot>
				<tr>
					<th style="text-align: center;">I play this game: it's awesome!</th>
					<th style="text-align: center;">I think my level is..</th>
				</tr>
			</tfoot>
		</table>
		<br /><hr /><br />
		<p class="lead center">Add or suggest a game</p>	
		<form action="index.php" method="POST" class="custom" style="width:60%; margin:auto;">
		<div class="row columns">
			<div class="large-6 columns">
				<div class="large-12">
					<select id="customDropdown1" name="game">
						<option DISABLED>Games</option>
						<option SELECTED>Star Citizen</option>
						<option>Age of Empire III</option>
						<option>League of Legend</option>
						<option>Starcraft II</option>
					</select>
				</div>
				<div class="large-12">
					<select id="customDropdown2" name="level">
						<option DISABLED>Level</option>
						<option SELECTED>High</option>
						<option>Medium</option>
						<option>Low</option>
						<option>Newbie</option>
					</select>
				</div>
				<div class="large-12 center">
					<input type="submit" value="Add this game" class="small button" />
				</div>
			</div>
			<div class="large-6 columns">
				<br /><br /><br />
				<div class="large-12">
					<input type="text" id="name" name="name" placeholder="Add a new game: name?" />
				</div>
				<div class="large-12 center">
					<input type="submit" value="Suggest this game" class="small button" />
				</div>
			</div>
		</div>
		</form>
		<a class="close-reveal-modal">&#215;</a>
	</div>

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
				echo '<div class="center"><a href="'.$_SERVER["PHP_SELF"].'">Return to the last page</a></div>';
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
							<li><a href="#">Le projet</a></li>
							<li><a href="#">L'équipe</a></li>
							<li><a href="#"><strong>Participez !</strong></a></li>
						</ul>
						<span class="right smaller"><a href="#">Organisateurs ? Site sous licence GNU !</a></span>
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
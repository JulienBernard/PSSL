
	<div id="accountModal" class="reveal-modal">
		<?php
			// Not really MVC, but necessary here because the account feature is just accessible by a modal on all pages!
			include_once(PATH_MODELS."user.class.php");
			include_once(PATH_MODELS."game.class.php");
			$User = new User( $_SESSION['SpaceEngineConnected'] );
			$gamesList = Game::getGamesList( 0, 999, (int)$User->getId(), false );
			$userGamesList = Game::getGamesList( 0, 999, (int)$User->getId(), true );
		?>
		<h2><?php echo $Lang->getHeaderText('account'); ?></h2>
		<p class="lead center"><?php echo $Lang->getGeneralText('DataPrivate'); ?></p>
		<br />
		<table style="margin:auto; width: 60%;">
			<thead>
				<tr>
					<th style="text-align: center;"><?php echo $Lang->getGeneralText('IAm'); ?></th>
					<th style="text-align: center;"><?php echo $Lang->getGeneralText('CallMe'); ?></th>
					<th style="text-align: center;"><?php echo $Lang->getGeneralText('LastActivity'); ?></th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td style="text-align: center;"><?php echo $User->getName(); ?></td>
					<td style="text-align: center;"><?php echo $User->getUsername(); ?></td>
					<td style="text-align: center;"><?php echo date('d/m/y - I:i', $User->getActivity()); ?></td>
				</tr>
			</tbody>
		</table>
		<br /><br /><br />
		<p class="lead center"><?php echo $Lang->getGeneralText('DataPublic'); ?></p>
		<br />
		<table style="margin:auto; width: 50%;">
			<tbody>
				<?php
					if( $userGamesList != 0 ) 
					{
						for( $i = 0 ; $i < count($userGamesList) ; $i++ )
						{
							if( $userGamesList[$i]['level'] == 1 )
								$level = 'newbie';
							elseif( $userGamesList[$i]['level'] == 2 )
								$level = 'low';
							elseif( $userGamesList[$i]['level'] == 3 )
								$level = 'medium';
							elseif( $userGamesList[$i]['level'] == 4 )
								$level = 'high';
							elseif( $userGamesList[$i]['level'] == 5 )
								$level = 'pro';
							echo "<tr>\n<td style='text-align: center;'>".ucfirst($userGamesList[$i]['name'])."</td><td style='text-align: center;'>".ucfirst($Lang->getGeneralText($level))."</td></tr>\n";
						}
					}
					else
						echo "<tr>\n<td style='text-align: center;' collapse='2'>Veuillez ajouter un jeu à votre liste.</td></tr>\n";
				?>
			</tbody>
			<tfoot>
				<tr>
					<th style="text-align: center;"><?php echo $Lang->getGeneralText('IPlayThisGame'); ?></th>
					<th style="text-align: center;"><?php echo $Lang->getGeneralText('MyLevelIs'); ?></th>
				</tr>
			</tfoot>
		</table>
		<br /><hr /><br />
		<p class="lead center"><?php echo $Lang->getGeneralText('AddOrSuggest'); ?></p>
		<br />
		<form action="index.php" method="POST" class="custom" style="width:60%; margin:auto;">
			<div class="row columns">
				<div class="large-6 columns">
					<?php 
					if( $gamesList == 0 ) {
						echo '<br /><p>'.$Lang->getGeneralText('AllGames').'</p>';
					}
					else {
					?>
					<div class="large-12">
						<select id="customDropdown1" name="game">
							<option DISABLED>Games</option>
							<?php
								for( $i = 0 ; $i < count($gamesList) ; $i++ )
								{
									echo "<option value='".$gamesList[$i]['id']."'>".ucfirst($gamesList[$i]['name'])."</option>\n";
								}
							?>
						</select>
					</div>
					<div class="large-12">
						<select id="customDropdown2" name="level">
							<option DISABLED><?php echo $Lang->getGeneralText('level'); ?></option>
							<option value="5"><?php echo $Lang->getGeneralText('pro'); ?></option>
							<option value="4"><?php echo $Lang->getGeneralText('high'); ?></option>
							<option value="3"><?php echo $Lang->getGeneralText('medium'); ?></option>
							<option value="2" SELECTED><?php echo $Lang->getGeneralText('low'); ?></option>
							<option value="1"><?php echo $Lang->getGeneralText('newbie'); ?></option>
						</select>
					</div>
					<div class="large-12 center">
						<input type="submit" value="<?php echo $Lang->getGeneralText('AddGame'); ?>" name="add" class="small button secondary" />
					</div>
					<?php
					}
					?>
				</div>
				<div class="large-6 columns">
					<br /><br /><br />
					<div class="large-12">
						<input type="text" id="name" name="name" placeholder="Suggest a new game: name?" />
					</div>
					<div class="large-12 center">
						<input type="submit" value="<?php echo $Lang->getGeneralText('SuggestGame'); ?>" name="suggest" class="small button success" />
					</div>
				</div>
			</div>
		</form>
		<a class="close-reveal-modal">&#215;</a>
	</div>

	<div id="tournamentModal" class="reveal-modal">
		<?php
			// Not really MVC, but necessary here because the account feature is just accessible by a modal on all pages!
			include_once(PATH_MODELS."user.class.php");
			include_once(PATH_MODELS."tournament.class.php");
			$User = new User( $_SESSION['SpaceEngineConnected'] );
			$tournamentList = Tournament::getTournamentsList( 0, 999, (int)$User->getId(), false );
			$userTournamentList = Tournament::getTournamentsList( 0, 999, (int)$User->getId(), true );
		?>
		<h2><?php echo $Lang->getHeaderText('tournament'); ?></h2>
		<p class="lead center"><?php echo $Lang->getGeneralText('IParticipateTo'); ?></p>
		<br />
		<table style="margin:auto; width: 50%;">
			<tbody>
				<?php
					$countPlayers = 0;
					$tournamentUserList = 0;
					if( $userTournamentList != 0 ) 
					{
						for( $i = 0 ; $i < count($userTournamentList) ; $i++ )
						{
							echo "<tr>\n<td style='text-align: center;'><a href='pages.php?id=".$userTournamentList[$i]['gameId']."'>".ucfirst($userTournamentList[$i]['title'])."</a></td><td style='text-align: center;'>".strtoupper($userTournamentList[$i]['team'])."</td></tr>\n";
						}
						$tournamentUserList = Tournament::getTournamentUser( (int)$userTournamentList[0]['tournamentId'] );
						$countPlayers = Tournament::countPlayersByTournament( (int)$userTournamentList[0]['tournamentId'] );
					}
					else
						echo "<tr>\n<td style='text-align: center;' collapse='2'>Vous ne participez à aucun tournoi.</td></tr>\n";
				?>
			</tbody>
			<tfoot>
				<tr>
					<th style="text-align: center;"><?php echo $Lang->getGeneralText('tournamentName'); ?></th>
					<th style="text-align: center;"><?php echo $Lang->getGeneralText('tournamentTeam'); ?></th>
				</tr>
			</tfoot>
		</table>
		<br /><br />
		<p class="lead center"><?php echo $Lang->getGeneralText('tournamentTeamsAndGamers'); ?> (<?php echo $countPlayers; ?> <?php echo $Lang->getGeneralText('gamer'); ?><?php if( $countPlayers > 1 ) echo 's'; ?>)</p>
		<br />
		<div class="row" style="margin:auto; width: 50%;">
			<?php
			if( $tournamentUserList != 0 ) 
			{
				echo '<div class="panel large-3 columns">';
				for( $i = 0 ; $i < count($tournamentUserList) ; $i++ )
				{
					if( $i == 0 )
						echo ''.strtoupper($tournamentUserList[$i]['team']).'<br /><a data-dropdown="dropFeature2">'.ucfirst($tournamentUserList[$i]['username']).'</a><br />';
					else if( $i != 0 && $tournamentUserList[$i]['team'] == $tournamentUserList[$i-1]['team'] )
						echo '<a data-dropdown="dropFeature2">'.ucfirst($tournamentUserList[$i]['username']).'</a><br />';
					else
						echo '</div><div class="panel large-3 columns">'.strtoupper($tournamentUserList[$i]['team']).'<br /><a data-dropdown="dropFeature2">'.ucfirst($tournamentUserList[$i]['username']).'</a><br />';
				}
				echo '</div>';
			}
			?>
		</div>
		<br /><hr /><br />
		<p class="lead center"><?php echo $Lang->getGeneralText('tournamentChangeTournament'); ?></p>
		<br />
		<form action="index.php" method="POST" class="custom" style="width:60%; margin:auto;">
			<div class="row columns">
				<div class="large-2 columns">&nbsp;</div>
				<div class="large-8 columns">
					<?php 
					if( $tournamentList == 0 ) {
						echo '<br /><p>Vous participez déjà à un tournoi</p>';
					}
					else {
					?>
					<div class="large-12">
						<p class="center">Vous ne pouvez participez que à un seul tournoi.</p>
					</div>
					<div class="large-12">
						<select id="customDropdown1" name="tournament">
							<option DISABLED>Tournois disponibles</option>
							<?php
								for( $i = 0 ; $i < count($tournamentList) ; $i++ )
								{
									echo "<option value='".$tournamentList[$i]['id']."'>".ucfirst($tournamentList[$i]['title'])."</option>\n";
								}
							?>
						</select>
					</div>
					<div class="row collapse ">
						<div class="large-11 columns">
							<input type="text" id="team" name="team" placeholder="J'ai une équipe : voici son nom ..." />
						</div>
						<div class="large-1 columns">
							<span class="postfix radius"><label data-dropdown="dropFeature1">?</label></span>
						</div>
					</div>
					<div class="large-12 center">
						<input type="submit" value="Je veux participer à ce tournoi" name="change" class="small button secondary" />
					</div>
					<?php
					}
					?>
				</div>
				<div class="large-2 columns">&nbsp;</div>
			</div>
		</form>
		<a class="close-reveal-modal">&#215;</a>
	</div>
	
	<ul id="dropFeature1" class="f-dropdown content small" data-dropdown-content>
		<p style="color: black;"><span class="bold">J'ai une équipe :</span><br />Tous les membres de votre équipe doivent renseignez le même nom.</p>
		<p style="color: black;"><span class="bold">Je souhaite créer une équipe :</span><br />Imaginez simplement le nom de votre équipe et renseignez là dans le champ.</p>
		<p><span class="italic">La casse n'est pas prise en compte.</span></p>
	</ul>
	
	<ul id="dropFeature2" class="f-dropdown content small" data-dropdown-content>
		<p style="color: black;"><span class="bold">Fonctionnalité à venir</span><br />Accès au profil d'un utilisateur.</p>
		<p><span class="italic">Priorité haute</span></p>
	</ul>
	
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
							Équipe composée de Brice, Corentin, Johan, Julien, Ludovic, Lionel et Romain.
						</p>
					</div>
					<div class="large-4 columns">
						<ul class="inline-list right">
							<li><a href="pages.php"><?php echo $Lang->getHeaderText('project'); ?></a></li>
							<li><a href="pages.php"><?php echo $Lang->getHeaderText('team'); ?></a></li>
							<li><a href="logout.php"><strong><?php echo $Lang->getHeaderText('logout'); ?></strong></a></li>
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
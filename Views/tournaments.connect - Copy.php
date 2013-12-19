	<main id="main">
		<div class="row panel">
			<div class="large-12 small-12">
				<h3><?php echo ucfirst($tournament['name']); ?></h3>
				<br />
			</div>
			<br />
			<div class="large-12 small-12">
				<p class="lead center"><?php echo $Lang->getGeneralText('tournamentTeamsAndGamers'); ?> (<?php echo $countPlayers; ?> <?php echo $Lang->getGeneralText('gamer'); ?><?php if( $countPlayers > 1 ) echo 's'; ?>)</p>
				<div class="row" style="margin: auto;">
					<?php
					if( count($tournamentUserList) != 0 ) 
					{
						for( $i = 0 ; $i < count($countTeams) ; $i++ )
						{
							echo '<div class="panel columns" style="width: 23%; margin: 1%;">';
							echo strtoupper($countTeams[$i]['team']).'<br />';
							for( $x = 0 ; $x < count($tournamentUserList) ; $x++ )
							{
								if( $tournamentUserList[$x]['team'] == $countTeams[$i]['team'] )
									echo '<a data-dropdown="dropFeature2">'.ucfirst($tournamentUserList[$x]['username']).'</a><br />';
							}
							echo '</div>';
						}
					}
					?>
				</div>
				
				<div class="row" style="margin: auto; width: 90%;">
					<p class="lead center">Brackets</p>
					<?php
						$name = null;
						if( $tournament['gameId'] == 1 )
							$name = 'LOL';
						elseif( $tournament['gameId'] == 2 )
							$name = 'SC2';
						elseif( $tournament['gameId'] == 3 )
							$name = 'BF4';
					?>	
					<iframe src="http://challonge.com/PSSLan<?php echo $name; ?>/module" width="100%" height="400" frameborder="0" scrolling="auto" allowtransparency="true"></iframe>
				</div>
			</div>
		</div>
	</main>
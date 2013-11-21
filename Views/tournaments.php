	<main id="main">
		<div class="row panel">
			<div class="large-12 small-12">
				<h3>Liste des tournois</h3>
				<br />
				<p class="lead">Comment ça marche ?</p>
				<p>
					Les tournois sont imaginés et proposés par les organisateurs selon la liste des jeux possèdés par les joueurs : <span class="bold">si vous souhaitez un tournoi portant sur votre jeu préféré</span>, signalez que vous le possèdez via la page <a href="#" data-reveal-id="loginModal">mon compte</a>.
				</p>
				<p>
					Attention : vous ne pouvez vous inscrire qu'à un seul tournoi par soirée !
				</p>
			</div>
			<br />
			<div class="large-12 small-12">
				<div class="large-2 columns">&nbsp;</div>
				<table class="large-8 columns">
					<tbody>
						<?php
						for( $i = 0 ; $i < count($tournamentsList) ; $i++ )
						{
							if( count($tournamentsList) == 0 || $tournamentsList != 0 )
							{
							?>
								<tr>
									<td class="center large-3 columns"><acronym title="Have a look!"><a href="pages.php?id=<?php echo (int)$tournamentsList[$i]['pageId']; ?>&&visitor"><img src="./img/gallery.png" style="height: 20px;" alt="See" /></a></acronym></td>
									<td class="center large-6 columns"><a data-reveal-id="loginModal" href="#"><?php echo (String)ucfirst($tournamentsList[$i]['title']); ?></a></td>
									<td class="smaller center large-3 columns"><?php echo Tournament::countPlayersByTournament( $tournamentsList[$i]['id'] ); ?></td>
								</tr>
							<?php
							}
						}
						if( count($tournamentsList) == 0 OR $tournamentsList == 0 )
						{
							echo "<tr><td colspan='3'><span class='bold'>Oups !</span><br />Aucun tournoi n'a encore été créé.</td></tr>";
						}
						?>
					</tbody>
					<tfoot>
						<tr>
							<th class="center large-3 columns"></th>
							<th class="center large-6 columns">Nom du tournoi</th>
							<th class="smaller center large-3 columns">Participants</th>
						</tr>
					</tfoot>
				</table>
				<div class="large-2 columns">&nbsp;</div>
			</div>
		</div>
	</main>
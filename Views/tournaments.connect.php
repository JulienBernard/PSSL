	<main id="main">
		<div class="row panel">
			<div class="large-12 small-12">
				<h3><?php echo $Lang->getHeaderText('tournament'); ?></h3>
				<br />
				<p class="lead"><?php echo $Lang->getGeneralText('tournamentHowWork'); ?></p>
				<?php echo $Lang->getGeneralText('tournamentTextUser'); ?>
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
									<td class="center large-5 columns"><a href="challonge.php?id=<?php echo (int)$tournamentsList[$i]['id']; ?>"><?php echo (String)ucfirst($tournamentsList[$i]['title']); ?></a></td>
									<td class="smaller center large-2 columns"><?php echo Tournament::countPlayersByTournament( $tournamentsList[$i]['id'] ); ?></td>
									<td class="smaller center large-2 columns"><a href="#" data-reveal-id="tournamentModal">S'inscrire</a></td>
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
							<th class="center large-5 columns"><?php echo $Lang->getGeneralText('tournamentName'); ?></th>
							<th class="smaller center large-2 columns"><?php echo ucfirst($Lang->getGeneralText('event')); ?></th>
							<th class="smaller center large-2 columns"></th>
						</tr>
					</tfoot>
				</table>
				<div class="large-2 columns">&nbsp;</div>
			</div>
		</div>
	</main>
	<main id="main">
		<div class="row">
			<div class="large-12 small-12">
				<p class="center">
					<img src="./img/admin/tournament.png" alt="Tournaments" /><br />
					<?php echo "".ucwords($User->getName()).", "; echo $Lang->getAdminText('generalAccountType'); echo " '".$User->getRankText()."'"; ?>
				</p>
			</div>

			<div class="large-9 small-9 columns">
				<h4><?php echo $Lang->getAdminText('usersBodyTitle14'); ?> - <a href="tournaments.php?create"><?php echo $Lang->getAdminText('tournamentsLinkCreate'); ?></a></h4>
				<table class="large-12">
					<tbody>
						<?php
						for( $i = 0 ; $i < count($tournamentsList) ; $i++ )
						{
							if( count($tournamentsList) == 0 || $tournamentsList != 0 )
							{
								$name = null;
								if( $tournamentsList[$i]['gameId'] == 1 )
									$name = 'LOL';
								elseif( $tournamentsList[$i]['gameId'] == 2 )
									$name = 'SC2';
								elseif( $tournamentsList[$i]['gameId'] == 3 )
									$name = 'BF4';
								if( $User->getRank() == 3 ) {
							?>
								<tr>
									<td class="center large-2 columns"><acronym title="Have a look!"><a href="pages.php?id=<?php echo (int)$tournamentsList[$i]['pageId']; ?>&&visitor"><img src="./img/gallery.png" style="height: 20px;" alt="See" /></a></acronym></td>
									<td class="center large-4 columns"><a href="tournaments.php?update=<?php echo (int)$tournamentsList[$i]['id']; ?>"><?php echo (String)ucfirst($tournamentsList[$i]['title']); ?></a></td>
									<td class="smaller center large-2 columns"><?php if( (String)$tournamentsList[$i]['valide'] == 1 ) echo $Lang->getAdminText('visible'); else echo $Lang->getAdminText('hidden'); ?></td>
									<td class="smaller center large-2 columns"><a href="#" data-dropdown="dropFeature2">Delete!</a></td>
									<td class="smaller center large-2 columns"><a href="http://challonge.com/PSSLan<?php echo $name; ?>">Bracket</a> <a href="#" data-dropdown="dropFeature3">(?)</a></td>
								</tr>
							<?php
								} else {
							?>
								<tr>
									<td class="center large-3 columns"><acronym title="Have a look!"><a href="pages.php?id=<?php echo (int)$tournamentsList[$i]['pageId']; ?>&&visitor"><img src="./img/gallery.png" style="height: 20px;" alt="See" /></a></acronym></td>
									<td class="center large-5 columns"><a href="tournaments.php?update=<?php echo (int)$tournamentsList[$i]['id']; ?>"><?php echo (String)ucfirst($tournamentsList[$i]['title']); ?></a></td>
									<td class="smaller center large-2 columns"><?php if( (String)$tournamentsList[$i]['valide'] == 1 ) echo $Lang->getAdminText('visible'); else echo $Lang->getAdminText('hidden'); ?></td>
									<td class="smaller center large-2 columns"><a href="http://challonge.com/PSSLan<?php echo $name; ?>">Bracket</a></td>
								</tr>
							<?php
								}
							}
						}
						if( count($tournamentsList) == 0 OR $tournamentsList == 0 )
						{
							echo "<tr><td colspan='3'><span class='bold'>Oups !</span><br />Aucun tournoi n'a encore été créé.</td></tr>";
						}
						?>
					</tbody>
					<tfoot>
						<?php
						if( $User->getRank() == 3 ) {
						?>
						<tr>
							<th class="center large-2 columns">Page du jeu</th>
							<th class="center large-4 columns">Title</th>
							<th class="smaller center large-2 columns">Visibility</th>
							<th class="smaller center large-2 columns">Option</th>
							<th class="smaller center large-2 columns"></th>
						</tr>
						<?php
							} else {
						?>
						<tr>
							<th class="center large-3 columns">Page du jeu</th>
							<th class="center large-5 columns">Title</th>
							<th class="smaller center large-2 columns">Visibility</th>
							<th class="smaller center large-2 columns"></th>
						</tr>
						<?php } ?>
					</tfoot>
				</table>
				
				<dl class="sub-nav" style="width: 90%; margin: auto;">	
					<dt>Pagination : </dt>
					
					<?php
						$countTournaments = Tournament::countTournaments( 0 );
						if( $countTournaments > $size )
						{
							?>
								<dd <?php if( !isset($_GET['p']) ) echo 'class="active"'; ?>><a href="tournaments.php">1</a></dd>
							<?php
							$countPage = ceil($countTournaments / $size);
							for( $i = 1 ; $i <= $countPage ; $i++ )
							{
								?>
								<dd <?php if( isset($_GET['p']) && $_GET['p'] == $i ) echo 'class="active"'; ?>><a href="tournaments.php?p=<?php echo $i; ?>"><?php echo $i+1; ?></a></dd>
								<?php
							}
						}
						else {
							?><dd <?php if( !isset($_GET['p']) ) echo 'class="active"'; ?>><a href="tournaments.php">1</a></dd><?php
						} ?>
				</dl>
			</div>
			
			<ul id="dropFeature1" class="f-dropdown content" data-dropdown-content>
				<p><span class="bold">Tournament update</span><br /><br />Feature to come<br /><span class="italic">High priority</span></p>
			</ul>
			<ul id="dropFeature2" class="f-dropdown content" data-dropdown-content>
				<p><span class="bold">Tournament delete</span><br /><br />Feature to come<br /><span class="italic">Low priority</span></p>
			</ul>
			<ul id="dropFeature3" class="f-dropdown content" data-dropdown-content>
				<p><span class="bold">Challonge</span><br /><br />Connexion requise :<br /><span class="smaller">Connectez-vous avec le compte Twitter <span class="bold">PSSLan</span></span></p>
			</ul>

			<div class="large-3 small-3 columns">
				<h4><?php echo $Lang->getAdminText('usersBodyTitle24'); ?></h4>
				
				<div class="large-12">
					<p class="center">
						<?php echo Tournament::countTournaments(); ?> <?php echo $Lang->getGeneralText('tournaments'); ?>
					</p>
				</div>
				<div class="large-4 small-4 columns">
					<p class="center">
						<?php echo Tournament::countTournaments( 1 ); ?><br />
						<?php echo Tournament::countTournaments( 0 ); ?>
					</p>
				</div>
				<div class="large-8 small-8 columns">
					<p>
						<?php echo $Lang->getAdminText('visible'); ?><br />
						<?php echo $Lang->getAdminText('hidden'); ?>
					</p>
				</div>
			</div>
		</div>
	</main>
	
	<main id="main">
		<div class="row">
			<div class="large-12 small-12">
				<p class="center">
					<img src="./img/admin/game.png" alt="Games" /><br />
					<?php echo "".ucwords($User->getName()).", "; echo $Lang->getAdminText('generalAccountType'); echo " '".$User->getRankText()."'"; ?>
				</p>
			</div>

			<div class="large-9 small-9 columns">
				<h4><?php echo $Lang->getAdminText('usersBodyTitle13'); ?> - <a href="games.php?create"><?php echo $Lang->getAdminText('gamesLinkCreate'); ?></a></h4>
				<table class="large-12">
					<tbody>
						<?php
						for( $i = 0 ; $i < count($gamesList) ; $i++ )
						{
							if( count($gamesList) == 0 || $gamesList != 0 )
							{
								if( $User->getRank() == 3 ) {
							?>
								<tr>
									<td class="center large-1 columns"><acronym title="Have a look!"><a href="pages.php?id=<?php echo (int)$gamesList[$i]['pageId']; ?>&visitor"><img src="./img/gallery.png" style="height: 20px;" alt="See" /></a></acronym></td>
									<td class="center large-1 columns"><?php echo (int)$gamesList[$i]['id']; ?></td>
									<td class="center large-5 columns"><a href="games.php?update=<?php echo (int)$gamesList[$i]['id']; ?>"><?php echo (String)ucfirst($gamesList[$i]['name']); ?></a></td>
									<td class="smaller center large-3 columns"><?php if( (String)$gamesList[$i]['valide'] == 1 ) echo $Lang->getAdminText('visible'); else echo $Lang->getAdminText('hidden'); ?></td>
									<td class="smaller center large-2 columns"><a href="#" data-dropdown="dropFeature2">Delete!</a></td>
								</tr>
							<?php
								} else {
							?>
								<tr>
									<td class="center large-1 columns"><acronym title="Have a look!"><a href="pages.php?id=<?php echo (int)$gamesList[$i]['pageId']; ?>&visitor"><img src="./img/gallery.png" style="height: 20px;" alt="See" /></a></acronym></td>
									<td class="center large-2 columns"><?php echo (int)$gamesList[$i]['id']; ?></td>
									<td class="center large-6 columns"><a href="games.php?update=<?php echo (int)$gamesList[$i]['id']; ?>"><?php echo (String)ucfirst($gamesList[$i]['name']); ?></a></td>
									<td class="smaller center large-3 columns"><?php if( (String)$gamesList[$i]['valide'] == 1 ) echo $Lang->getAdminText('visible'); else echo $Lang->getAdminText('hidden'); ?></td>
								</tr>
							<?php
								}
							}
						}
						if( count($gamesList) == 0 OR $gamesList == 0 )
						{
							echo "<tr><td colspan='3'><span class='bold'>Oups !</span><br />Aucun jeu n'a encore été ajouté.</td></tr>";
						}
						?>
					</tbody>
					<tfoot>
						<?php
						if( $User->getRank() == 3 ) {
						?>
						<tr>
							<th class="center large-1 columns"></th>
							<th class="center large-1 columns">ID</th>
							<th class="center large-5 columns">Title</th>
							<th class="smaller center large-3 columns">Visibility</th>
							<th class="smaller center large-2 columns">Option</th>
						</tr>
						<?php
							} else {
						?>
						<tr>
							<th class="center large-1 columns"></th>
							<th class="center large-2 columns">ID</th>
							<th class="center large-6 columns">Title</th>
							<th class="smaller center large-3 columns">Visibility</th>
						</tr>
						<?php } ?>
					</tfoot>
				</table>
				
				<dl class="sub-nav" style="width: 90%; margin: auto;">	
					<dt>Pagination : </dt>
					
					<?php
						$countGames = Game::countGames( 0 );
						if( $countGames > $size )
						{
							?>
								<dd <?php if( !isset($_GET['p']) ) echo 'class="active"'; ?>><a href="games.php">1</a></dd>
							<?php
							$countPage = ceil($countGames / $size);
							for( $i = 1 ; $i <= $countPage-1 ; $i++ )
							{
								?>
								<dd <?php if( isset($_GET['p']) && $_GET['p'] == $i ) echo 'class="active"'; ?>><a href="games.php?p=<?php echo $i; ?>"><?php echo $i+1; ?></a></dd>
								<?php
							}
						}
						else {
							?><dd <?php if( !isset($_GET['p']) ) echo 'class="active"'; ?>><a href="games.php">1</a></dd><?php
						} ?>
				</dl>
			</div>
			
			<div class="large-3 small-3 columns">
				<h4><?php echo $Lang->getAdminText('usersBodyTitle23'); ?></h4>
				
				<div class="large-12">
					<p class="center">
						<?php echo Game::countGames(); ?> <?php echo $Lang->getGeneralText('games'); ?>
					</p>
				</div>
				<div class="large-4 small-4 columns">
					<p class="center">
						<?php echo Game::countGames( 1 ); ?><br />
						<?php echo Game::countGames( 0 ); ?>
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
	
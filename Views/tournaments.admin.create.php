	<main id="main">
		<div class="row">
			<div class="large-12 small-12">
				<p class="center">
					<img src="./img/admin/page.png" alt="Pages" /><br />
					<?php echo "".ucwords($User->getName()).", "; echo $Lang->getAdminText('generalAccountType'); echo " '".$User->getRankText()."'"; ?>
				</p>
			</div>

			<div class="large-9 small-9 columns">
				<h4><?php echo $Lang->getAdminText('usersBodyTitle14'); ?></h4>
				
				<form action="tournaments.php?create" method="POST" class="custom">
					<div class="row collapse">
						<div class="small-4 large-4 columns">
							<span class="prefix radius"><label for="title">Titre du jeu</label></span>
						</div>
						<div class="small-8 large-8 columns">
							<input type="text" name="title" id="title" placeholder="(Required) Enter the name of your game ..." <?php if( isset($title) ) echo 'value="'.$title.'"'; ?>>
						</div>
					</div>
					<div class="row collapse">
						<div class="small-4 large-4 columns">
							<span class="prefix radius"><label for="customDropdown1">Jeu du tournoi</label></span>
						</div>
						<div class="small-8 large-8 columns">
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
					</div>
					<div class="row">
						<div class="large-12 small-12 center" style="margin-top: 15px;">
							<input class="button" type="submit" name="create" value="Add!">
						</div>
					</div>					
				</form>
			</div>
			
			<ul id="dropFeature1" class="f-dropdown content" data-dropdown-content>
				<p><span class="bold">Page update</span><br /><br />Feature to come<br /><span class="italic">High priority</span></p>
			</ul>
			<ul id="dropFeature2" class="f-dropdown content" data-dropdown-content>
				<p><span class="bold">Page delete</span><br /><br />Feature to come<br /><span class="italic">Low priority</span></p>
			</ul>

			<div class="large-3 small-3 columns">
				<h4><?php echo $Lang->getAdminText('usersBodyTitle24'); ?></h4>
				<div class="large-12">
					<p class="center">
						<?php echo Tournament::countTournaments(); ?> <?php echo $Lang->getGeneralText('games'); ?>
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
				
				<h4><?php echo $Lang->getGeneralText('fastNavigation'); ?></h4>
				<div class="large-12">
					<a href="games.php"><?php echo $Lang->getAdminText('navLinkReturnTournament'); ?></a><br />
					<a href="index.php"><?php echo $Lang->getAdminText('navLinkReturnMain'); ?></a>
				</div>
			</div>
		</div>
	</main>
	
	<main id="main">
		<div class="row">
			<div class="large-12 small-12">
				<p class="center">
					<img src="./img/admin/page.png" alt="Pages" /><br />
					<?php echo "".ucwords($User->getName()).", "; echo $Lang->getAdminText('generalAccountType'); echo " '".$User->getRankText()."'"; ?>
				</p>
			</div>

			<div class="large-9 small-9 columns">
				<h4><?php echo $Lang->getAdminText('usersBodyTitle13'); ?></h4>
				
				<form action="games.php?create" method="POST">
					<div class="row collapse ">
						<div class="small-4 large-4 columns">
							<span class="prefix radius"><label for="title">Titre du jeu</label></span>
						</div>
						<div class="small-8 large-8 columns">
							<input type="text" name="title" id="title" placeholder="(Required) Enter the name of your game ..." <?php if( isset($title) ) echo 'value="'.$title.'"'; ?>>
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
				
				<h4><?php echo $Lang->getGeneralText('fastNavigation'); ?></h4>
				<div class="large-12">
					<a href="games.php"><?php echo $Lang->getAdminText('navLinkReturnGame'); ?></a><br />
					<a href="index.php"><?php echo $Lang->getAdminText('navLinkReturnMain'); ?></a>
				</div>
			</div>
		</div>
	</main>
	
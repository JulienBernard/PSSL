	<main id="main">
		<div class="row">
			<div class="large-12 small-12">
				<p class="center">
					<img src="./img/admin/page.png" alt="Games" /><br />
					<?php echo "".ucwords($User->getName()).", "; echo $Lang->getAdminText('generalAccountType'); echo " '".$User->getRankText()."'"; ?>
				</p>
			</div>

			<div class="large-9 small-9 columns">
				<h4><?php echo $Lang->getAdminText('usersBodyTitle11'); ?></h4>
				
				<form action="games.php?update=<?php echo $Game->getId(); ?>" method="POST" class="custom">
					<div class="row collapse ">
						<div class="small-4 large-4 columns">
							<span class="prefix radius"><label for="name">Nom du jeu</label></span>
						</div>
						<div class="small-8 large-8 columns">
							<input type="text" name="name" id="name" placeholder="(Required) Enter the name of the game..." <?php if( isset($name) ) echo 'value="'.$name.'"'; ?>>
						</div>
					</div>
					<div class="row collapse ">
						<div class="small-4 large-4 columns">
							<span class="prefix radius"><label for="players">Nombre de joueurs</label></span>
						</div>
						<div class="small-8 large-8 columns">
							<input type="text" name="players" id="players" placeholder="(Required) Enter the number of players..." <?php if( isset($players) ) echo 'value="'.$players.'"'; ?>>
						</div>
					</div>
					<div class="row collapse ">
						<div class="small-4 large-4 columns">
							<span class="prefix radius"><label for="image">Nom de l'image associée</label></span>
						</div>
						<div class="small-8 large-8 columns">
							<input type="text" name="image" id="image" placeholder="(Required) Enter the name of the image + this extension..." <?php if( isset($image) ) echo 'value="'.$image.'"'; ?>>
						</div>
					</div>
					<div class="large-12 small-12 radius">
						<select id="customDropdown1" name="pageId">
							<option DISABLED>This game is associated to the page who name is..</option>
							<option value='0'>Oups</option>
							<?php
									include_once(PATH_MODELS."page.class.php");
									$pagesList = Page::getPagesList( 0, 999 );
									for( $i = 0 ; $i < count($pagesList) ; $i++ )
									{
										if( $pagesList[$i]['id'] != 0 )
										{
											if( $pageId == $pagesList[$i]['id'] )
												echo "<option value='".$pagesList[$i]['id']."' SELECTED>".$pagesList[$i]['title']."</option>\n";
											else
												echo "<option value='".$pagesList[$i]['id']."'>".$pagesList[$i]['title']."</option>\n";
										}
									}
							?>
						</select>
					</div>
					<div class="switch large-12 small-12 radius" style="height: 32px;">
						<input id="hidden" value="false" name="valide" type="radio" <?php if( (isset($valide) && $valide != "1") OR !isset($valide) ) echo 'checked'; ?>>
						<label for="hidden" onclick="">&nbsp;Invalide</label>
						<input id="visible" value="true" name="valide" type="radio" <?php if( isset($valide) && $valide == "1" ) echo 'checked'; ?>>
						<label for="visible" onclick="">Valide&nbsp;</label>
						<span></span>
					</div>

					<div class="row">
						<div class="large-12">
							<textarea name="pitch" style="height: 150px;"><?php if( isset($pitch) ) echo $pitch; ?></textarea>
						</div>
						<div class="large-12 small-12 center" style="margin-top: 15px;">
							<input class="button" type="submit" name="update" value="Update!">
						</div>
					</div>					
				</form>
			</div>
			
			<ul id="dropFeature1" class="f-dropdown content" data-dropdown-content>
				<p><span class="bold">Game update</span><br /><br />Feature to come<br /><span class="italic">High priority</span></p>
			</ul>
			<ul id="dropFeature2" class="f-dropdown content" data-dropdown-content>
				<p><span class="bold">Game delete</span><br /><br />Feature to come<br /><span class="italic">Low priority</span></p>
			</ul>

			<div class="large-3 small-3 columns">
				<h4><?php echo $Lang->getAdminText('usersBodyTitle21'); ?></h4>
				<div class="large-12">
					<p class="center">
						<?php echo Game::countGames(); ?> <?php echo $Lang->getGeneralText('Games'); ?>
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
						Visible<br />
						Not visible
					</p>
				</div>
				
				<h4><?php echo $Lang->getGeneralText('fastNavigation'); ?></h4>
				<div class="large-12">
					<a href="Games.php"><?php echo $Lang->getAdminText('navLinkReturnGame'); ?></a><br />
					<a href="index.php"><?php echo $Lang->getAdminText('navLinkReturnMain'); ?></a>
				</div>
			</div>
		</div>
	</main>
	
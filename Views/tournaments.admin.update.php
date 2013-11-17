	<main id="main">
		<div class="row">
			<div class="large-12 small-12">
				<p class="center">
					<img src="./img/admin/page.png" alt="Tournaments" /><br />
					<?php echo "".ucwords($User->getName()).", "; echo $Lang->getAdminText('generalAccountType'); echo " '".$User->getRankText()."'"; ?>
				</p>
			</div>

			<div class="large-9 small-9 columns">
				<h4><?php echo $Lang->getAdminText('usersBodyTitle11'); ?></h4>
				
				<form action="tournaments.php?update=<?php echo $Tournament->getId(); ?>" method="POST" class="custom">
					<div class="row collapse ">
						<div class="small-4 large-4 columns">
							<span class="prefix radius"><label for="name">Nom du tournoi</label></span>
						</div>
						<div class="small-8 large-8 columns">
							<input type="text" name="name" id="name" placeholder="(Required) Enter the name of the tournament..." <?php if( isset($name) ) echo 'value="'.$name.'"'; ?>>
						</div>
					</div>
					<div class="row collapse">
						<div class="small-4 large-4 columns">
							<span class="prefix radius"><label for="customDropdown1">Jeu du tournoi</label></span>
						</div>
						<div class="small-8 large-8 columns">
							<select id="customDropdown1" name="gameId">
								<option DISABLED>Games</option>
								<?php
									for( $i = 0 ; $i < count($gamesList) ; $i++ )
									{
										if( $gameId == $gamesList[$i]['id'] )
											echo "<option value='".$gamesList[$i]['id']."' SELECTED>".ucfirst($gamesList[$i]['name'])."</option>\n";
										else
											echo "<option value='".$gamesList[$i]['id']."'>".ucfirst($gamesList[$i]['name'])."</option>\n";
									}
								?>
							</select>
						</div>
					</div>
					<div class="switch large-12 small-12 radius" style="height: 32px;">
						<input id="hidden" value="false" name="valide" type="radio" <?php if( (isset($valide) && $valide != "1") OR !isset($valide) ) echo 'checked'; ?>>
						<label for="hidden" onclick="">&nbsp;Invalide</label>
						<input id="visible" value="true" name="valide" type="radio" <?php if( isset($valide) && $valide == "1" ) echo 'checked'; ?>>
						<label for="visible" onclick="">Valide&nbsp;</label>
						<span></span>
					</div>

					<div class="row">
						<div class="large-12 small-12 center" style="margin-top: 15px;">
							<input class="button" type="submit" name="update" value="Update!">
						</div>
					</div>					
				</form>
			</div>
			
			<ul id="dropFeature1" class="f-dropdown content" data-dropdown-content>
				<p><span class="bold">Tournament update</span><br /><br />Feature to come<br /><span class="italic">High priority</span></p>
			</ul>
			<ul id="dropFeature2" class="f-dropdown content" data-dropdown-content>
				<p><span class="bold">Tournament delete</span><br /><br />Feature to come<br /><span class="italic">Low priority</span></p>
			</ul>

			<div class="large-3 small-3 columns">
				<h4><?php echo $Lang->getAdminText('usersBodyTitle21'); ?></h4>
				<div class="large-12">
					<p class="center">
						<?php echo Tournament::countTournaments(); ?> <?php echo $Lang->getGeneralText('Tournaments'); ?>
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
						Visible<br />
						Not visible
					</p>
				</div>
				
				<h4><?php echo $Lang->getGeneralText('fastNavigation'); ?></h4>
				<div class="large-12">
					<a href="Tournaments.php"><?php echo $Lang->getAdminText('navLinkReturnTournament'); ?></a><br />
					<a href="index.php"><?php echo $Lang->getAdminText('navLinkReturnMain'); ?></a>
				</div>
			</div>
		</div>
	</main>
	
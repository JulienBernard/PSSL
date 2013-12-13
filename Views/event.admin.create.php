	<main id="main">
		<div class="row">
			<div class="large-12 small-12">
				<p class="center">
					<img src="./img/admin/user.png" alt="Pages" /><br />
					<?php echo "".ucwords($User->getName()).", "; echo $Lang->getAdminText('generalAccountType'); echo " '".$User->getRankText()."'"; ?>
				</p>
			</div>

			<div class="large-9 small-9 columns">
				<h4><?php echo $Lang->getAdminText('usersBodyTitle15'); ?></h4>
				
				<form action="event.php?create" method="POST">
					<div class="row collapse ">
						<div class="small-4 large-4 columns">
							<span class="prefix radius"><label for="name"><?php echo $Lang->getGeneralText('name'); ?></label></span>
						</div>
						<div class="small-8 large-8 columns">
							<input type="text" name="name" id="name" placeholder="(Required) Enter the name..." <?php if( isset($name) ) echo 'value="'.$name.'"'; ?>>
						</div>
					</div>
					<div class="row collapse ">
						<div class="small-4 large-4 columns">
							<span class="prefix radius"><label for="mail"><?php echo $Lang->getGeneralText('mail'); ?></label></span>
						</div>
						<div class="small-8 large-8 columns">
							<input type="text" name="mail" id="mail" placeholder="(Required) Enter the mail..." <?php if( isset($mail) ) echo 'value="'.$mail.'"'; ?>>
						</div>
					</div>
					<div class="row collapse ">
						<div class="small-4 large-4 columns">
							<span class="prefix radius"><label for="price"><?php echo $Lang->getGeneralText('price'); ?></label></span>
						</div>
						<div class="small-8 large-8 columns">
							<input type="text" name="price" id="price" value="1.00" <?php if( isset($price) ) echo 'value="'.$price.'"'; ?>>
						</div>
					</div>
					<div class="row collapse ">
						<div class="small-4 large-4 columns">
							<span class="prefix radius"><label for="localization"><?php echo $Lang->getGeneralText('localization'); ?></label></span>
						</div>
						<div class="small-8 large-8 columns">
							<input type="text" name="localization" id="localization" placeholder="(Not Required) Enter the localization...">
						</div>
					</div>
					<div class="row collapse ">
						<div class="small-4 large-4 columns">
							<span class="prefix radius"><label for="renting"><?php echo $Lang->getGeneralText('renting'); ?></label></span>
						</div>
						<div class="small-8 large-8 columns">
							<input type="text" name="renting" id="renting" value="0.00" <?php if( isset($price) ) echo 'value="'.$price.'"'; ?>>
						</div>
					</div>
					<div class="switch large-12 small-12 radius" style="height: 32px;">
						<input id="hidden" value="0" name="switch-visible" type="radio" <?php if( (isset($participate) && $participate != "true") OR !isset($participate) ) echo 'checked'; ?>>
						<label for="hidden" onclick="">&nbsp;<?php echo ucfirst($Lang->getGeneralText('spectator')); ?></label>
						<input id="visible" value="1" name="switch-visible" type="radio" <?php if( isset($participate) && $participate == "true" ) echo 'checked'; ?>>
						<label for="visible" onclick=""><?php echo ucfirst($Lang->getGeneralText('gamer')); ?>&nbsp;</label>
						<span></span>
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
				<h4><?php echo $Lang->getAdminText('usersBodyTitle25'); ?></h4>
				<div class="large-12">
					<p class="center">
						<?php echo Event::countPlayers( 0 ); ?> <?php echo $Lang->getGeneralText('event'); ?>
					</p>
				</div>
				
				<h4><?php echo $Lang->getGeneralText('fastNavigation'); ?></h4>
				<div class="large-12">
					<a href="event.php"><?php echo $Lang->getAdminText('navLinkReturnEvent'); ?></a><br />
					<a href="index.php"><?php echo $Lang->getAdminText('navLinkReturnMain'); ?></a>
				</div>
			</div>
		</div>
	</main>
	
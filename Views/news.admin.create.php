	<main id="main">
		<div class="row">
			<div class="large-12 small-12">
				<p class="center">
					<img src="./img/admin/page.png" alt="News" /><br />
					<?php echo "".ucwords($User->getName()).", "; echo $Lang->getAdminText('generalAccountType'); echo " '".$User->getRankText()."'"; ?>
				</p>
			</div>

			<div class="large-9 small-9 columns">
				<h4><?php echo $Lang->getAdminText('usersBodyTitle16'); ?></h4>
				
				<form action="news.php?create" method="POST">
					<div class="row collapse ">
						<div class="small-4 large-4 columns">
							<span class="prefix radius"><label for="title">Titre de l'actu</label></span>
						</div>
						<div class="small-8 large-8 columns">
							<input type="text" name="title" id="title" placeholder="(Required) Enter your title ..." <?php if( isset($title) ) echo 'value="'.$title.'"'; ?>>
						</div>
					</div>
					<div class="switch large-12 small-12 radius" style="height: 32px;">
						<input id="hidden" value="false" name="switch-visible" type="radio" <?php if( (isset($visibility) && $visibility != "true") OR !isset($visibility) ) echo 'checked'; ?>>
						<label for="hidden" onclick="">&nbsp;Hidden</label>
						<input id="visible" value="true" name="switch-visible" type="radio" <?php if( isset($visibility) && $visibility == "true" ) echo 'checked'; ?>>
						<label for="visible" onclick="">Visible&nbsp;</label>
						<span></span>
					</div>

					<div class="row">
						<div class="large-12">
							<textarea name="text" style="height: 150px;"><?php if( isset($text) ) echo $text; ?></textarea>
						</div>
						<div class="large-12 small-12 center" style="margin-top: 15px;">
							<input class="button" type="submit" name="create" value="Create!">
						</div>
					</div>					
				</form>
			</div>
			
			<ul id="dropFeature1" class="f-dropdown content" data-dropdown-content>
				<p><span class="bold">New update</span><br /><br />Feature to come<br /><span class="italic">High priority</span></p>
			</ul>
			<ul id="dropFeature2" class="f-dropdown content" data-dropdown-content>
				<p><span class="bold">New delete</span><br /><br />Feature to come<br /><span class="italic">Low priority</span></p>
			</ul>

			<div class="large-3 small-3 columns">
				<h4><?php echo $Lang->getAdminText('usersBodyTitle21'); ?></h4>
				<div class="large-12">
					<p class="center">
						<?php echo News::countPages(); ?> <?php echo $Lang->getGeneralText('pages'); ?>
					</p>
				</div>
				<div class="large-4 small-4 columns">
					<p class="center">
						<?php echo News::countPages( 1 ); ?><br />
						<?php echo News::countPages( 0 ); ?>
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
					<a href="news.php"><?php echo $Lang->getAdminText('navLinkReturnNew'); ?></a><br />
					<a href="index.php"><?php echo $Lang->getAdminText('navLinkReturnMain'); ?></a>
				</div>
			</div>
		</div>
	</main>
	
	<main id="main">
		<div class="row">
			<div class="large-12 small-12">
				<p class="center">
					<img src="./img/admin/page.png" alt="News" /><br />
					<?php echo "".ucwords($User->getName()).", "; echo $Lang->getAdminText('generalAccountType'); echo " '".$User->getRankText()."'"; ?>
				</p>
			</div>

			<div class="large-9 small-9 columns">
				<h4><?php echo $Lang->getAdminText('usersBodyTitle16'); ?> - <a href="news.php?create"><?php echo $Lang->getAdminText('newsLinkCreate'); ?></a></h4>
				<table class="large-12">
					<tbody>
						<?php
						for( $i = 0 ; $i < count($NewssList) ; $i++ )
						{
							if( count($NewssList) == 0 || $NewssList != 0 )
							{
								if( $User->getRank() == 3 ) {
							?>
								<tr>
									<td class="center large-1 columns"><acronym title="Have a look!"><a href="news.php?id=<?php echo (int)$NewssList[$i]['id']; ?>&visitor"><img src="./img/gallery.png" style="height: 20px;" alt="See" /></a></acronym></td>
									<td class="center large-1 columns"><?php echo (int)$NewssList[$i]['id']; ?></td>
									<td class="center large-5 columns"><a href="news.php?update=<?php echo (int)$NewssList[$i]['id']; ?>"><?php echo (String)ucfirst($NewssList[$i]['title']); ?></a></td>
									<td class="smaller center large-3 columns"><?php if( (String)$NewssList[$i]['visible'] == 1 ) echo $Lang->getAdminText('visible'); else echo $Lang->getAdminText('hidden'); ?></td>
									<td class="smaller center large-2 columns"><a href="#" data-dropdown="dropFeature2">Delete!</a></td>
								</tr>
							<?php
								} else {
							?>
								<tr>
									<td class="center large-1 columns"><acronym title="Have a look!"><a href="news.php?id=<?php echo (int)$NewssList[$i]['id']; ?>&visitor"><img src="./img/gallery.png" style="height: 20px;" alt="See" /></a></acronym></td>
									<td class="center large-2 columns"><?php echo (int)$NewssList[$i]['id']; ?></td>
									<td class="center large-6 columns"><a href="news.php?update=<?php echo (int)$NewssList[$i]['id']; ?>"><?php echo (String)ucfirst($NewssList[$i]['title']); ?></a></td>
									<td class="smaller center large-3 columns"><?php if( (String)$NewssList[$i]['visible'] == 1 ) echo $Lang->getAdminText('visible'); else echo $Lang->getAdminText('hidden'); ?></td>
								</tr>
							<?php
								}
							}
						}
						if( count($NewssList) == 0 OR $NewssList == 0 )
						{
							echo "<tr><td colspan='3'><span class='bold'>Oups !</span><br />Aucune actualité n'a encore été créé.</td></tr>";
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
						$countPages = News::countPages( 0 );
						if( $countPages > $size )
						{
							?>
								<dd <?php if( !isset($_GET['p']) ) echo 'class="active"'; ?>><a href="pages.php">1</a></dd>
							<?php
							$countPage = ceil($countPages / $size);
							for( $i = 1 ; $i <= $countPage-1 ; $i++ )
							{
								?>
								<dd <?php if( isset($_GET['p']) && $_GET['p'] == $i ) echo 'class="active"'; ?>><a href="pages.php?p=<?php echo $i; ?>"><?php echo $i+1; ?></a></dd>
								<?php
							}
						}
						else {
							?><dd <?php if( !isset($_GET['p']) ) echo 'class="active"'; ?>><a href="pages.php">1</a></dd><?php
						} ?>
				</dl>
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
			</div>
		</div>
	</main>
	
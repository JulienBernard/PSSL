	<main id="main">
		<div class="row">
			<div class="large-12 small-12">
				<p class="center">
					<img src="./img/admin/user.png" alt="Users" /><br />
					<?php echo "".ucwords($User->getName()).", "; echo $Lang->getAdminText('generalAccountType'); echo " '".$User->getRankText()."'"; ?>
				</p>
			</div>

			<div class="large-9 small-9 columns">
				<h4><?php echo $Lang->getAdminText('usersBodyTitle15'); ?> - <a href="event.php?create"><?php echo $Lang->getAdminText('eventLinkCreate'); ?></a></h4>
				<table class="large-12">
					<tbody>
						<?php
						if( count($eventList) != 0 AND $eventList != 0 )
						{
							for( $i = 0 ; $i < count($eventList) ; $i++ )
							{
							?>
								<tr>
									<td class="center large-3 columns"><a href="event.php?update=<?php echo $eventList[$i]['id']; ?>"><?php echo (String)ucwords($eventList[$i]['name']); ?></a></td>
									<td class="center large-3 columns"><?php echo (String)ucwords($eventList[$i]['mail']); ?></td>
									<td class="center large-3 columns"><?php echo (String)ucwords($eventList[$i]['price']); ?></td>
									<td class="smaller center large-3 columns"><?php if( (String)$eventList[$i]['participate'] == 1 ) echo ucfirst($Lang->getGeneralText('gamer')); else echo ucfirst($Lang->getGeneralText('spectator')); ?></td>
								</tr>
							<?php
							}
						} else {
							echo "<tr><td colspan='3'><span class='bold'>Oups !</span><br />Vous êtes allé trop loin, cette partie du classement n'existe pas.</td></tr>";
						}
						?>
					</tbody>
					<tfoot>
						<tr>
							<th class="center large-3 columns"><?php echo $Lang->getGeneralText('name'); ?></th>
							<th class="center large-3 columns"><?php echo $Lang->getGeneralText('mail'); ?></th>
							<th class="smaller center large-3 columns"><?php echo $Lang->getGeneralText('price'); ?></th>
							<th class="smaller center large-3 columns"><?php echo $Lang->getGeneralText('status'); ?></th>
						</tr>
					</tfoot>
				</table>
				
				<dl class="sub-nav" style="width: 90%; margin: auto;">	
					<dt>Pagination : </dt>
					
					<?php
						$countPlayer = Event::countPlayers( 0 );
						if( $countPlayer > $size )
						{
							?>
								<dd <?php if( !isset($_GET['p']) ) echo 'class="active"'; ?>><a href="event.php">1</a></dd>
							<?php
							$countPage = ceil($countPlayer / $size);
							for( $i = 1 ; $i <= $countPage ; $i++ )
							{
								?>
								<dd <?php if( isset($_GET['p']) && $_GET['p'] == $i ) echo 'class="active"'; ?>><a href="event.php?p=<?php echo $i; ?>"><?php echo $i+1; ?></a></dd>
								<?php
							}
						}
						else {
							?><dd <?php if( !isset($_GET['p']) ) echo 'class="active"'; ?>><a href="event.php">1</a></dd><?php
						} ?>
				</dl>
			</div>
			
			<ul id="dropFeature1" class="f-dropdown content" data-dropdown-content>
				<p><span class="bold">User profil</span><br /><br />Feature to come<br /><span class="italic">Medium priority</span></p>
			</ul>
			<ul id="dropFeature2" class="f-dropdown content" data-dropdown-content>
				<p><span class="bold">User password</span><br /><br />Feature to come<br /><span class="italic">Low priority</span></p>
			</ul>

			<div class="large-3 small-3 columns">
				<h4><?php echo $Lang->getAdminText('usersBodyTitle25'); ?></h4>
				
				<div class="large-12">
					<p class="center">
						<?php echo Event::countPlayers( 0 ); ?> <?php echo $Lang->getGeneralText('event'); ?>
					</p>
				</div>
			</div>
		</div>
	</main>
	
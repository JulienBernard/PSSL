	<main id="main">
		<div class="row">
			<div class="large-12 small-12">
				<p class="center">
					<img src="./img/admin/user.png" alt="Users" /><br />
					<?php echo "".ucwords($User->getUsername()).", "; echo $Lang->getAdminText('generalAccountType'); echo " '".$User->getRankText()."'"; ?>
				</p>
			</div>

			<div class="large-9 small-9 columns">
				<h4><?php echo $Lang->getAdminText('usersBodyTitle11'); ?></h4>
				<table class="large-12">
					<tbody>
						<?php
						for( $i = 0 ; $i < count($pagesList) ; $i++ )
						{
							if( $User->getRank() == 3 ) {
						?>
							<tr>
								<td class="center large-1 columns"><?php echo (int)$pagesList[$i]['id']; ?></td>
								<td class="center large-4 columns"><a href="#" data-dropdown="dropFeature1"><?php echo (String)ucwords($pagesList[$i]['title']); ?></a></td>
								<td class="smaller center large-3 columns"><?php if( (String)$pagesList[$i]['visible'] == 1 ) echo "Visible"; else echo "Not visible"; ?></td>
								<td class="smaller center large-2 columns"><a href="#" data-dropdown="dropFeature2">Delete!</a></td>
							</tr>
						<?php
							} else {
						?>
							<tr>
								<td class="center large-1 columns"><?php echo (int)$pagesList[$i]['id']; ?></td>
								<td class="center large-4 columns"><a href="#" data-dropdown="dropFeature1"><?php echo (String)ucwords($pagesList[$i]['title']); ?></a></td>
								<td class="smaller center large-3 columns"><?php if( (String)$pagesList[$i]['visible'] == 1 ) echo "Visible"; else echo "Not visible"; ?></td>
								<td class="smaller center large-2 columns"><a href="#" data-dropdown="dropFeature2">Delete!</a></td>
							</tr>
						<?php
							}
						}
						if( count($usersList) == 0 OR $usersList == 0 )
						{
							echo "<tr><td colspan='3'><span class='bold'>Oups !</span><br />Vous êtes allé trop loin, cette partie du classement n'existe pas.</td></tr>";
						}
						?>
					</tbody>
					<tfoot>
						<?php
						if( $User->getRank() == 3 ) {
						?>
						<tr>
							<th class="center large-1 columns">ID</th>
							<th class="center large-4 columns">Username</th>
							<th class="smaller center large-3 columns">Private Token</th>
							<th class="smaller center large-2 columns">Rank</th>
							<th class="smaller center large-2 columns">Password</th>
						</tr>
						<?php
							} else {
						?>
						<tr>
							<th class="center large-1 columns">ID</th>
							<th class="center large-5 columns">Username</th>
							<th class="smaller center large-3 columns">Private Token</th>
							<th class="smaller center large-2 columns">Rank</th>
						</tr>
						<?php } ?>
					</tfoot>
				</table>
				
				<dl class="sub-nav" style="width: 90%; margin: auto;">	
					<dt>Pagination : </dt>
					
					<?php
						$countPlayer = $User->countUsers( 0 );
						if( $countPlayer > $size )
						{
							?>
								<dd <?php if( !isset($_GET['p']) ) echo 'class="active"'; ?>><a href="users.php">1</a></dd>
							<?php
							$countPage = ceil($countPlayer / $size);
							for( $i = 1 ; $i < $countPage ; $i++ )
							{
								?>
								<dd <?php if( isset($_GET['p']) && $_GET['p'] == $i ) echo 'class="active"'; ?>><a href="users.php?p=<?php echo $i; ?>"><?php echo $i+1; ?></a></dd>
								<?php
							}
						}
						else {
							?><dd <?php if( !isset($_GET['p']) ) echo 'class="active"'; ?>><a href="users.php">1</a></dd><?php
						} ?>
				</dl>
			</div>
			
			<ul id="dropFeature1" class="f-dropdown content" data-dropdown-content>
				<p><span class="bold">Page update</span><br /><br />Feature to come<br /><span class="italic">High priority</span></p>
			</ul>
			<ul id="dropFeature2" class="f-dropdown content" data-dropdown-content>
				<p><span class="bold">Page delete</span><br /><br />Feature to come<br /><span class="italic">Low priority</span></p>
			</ul>

			<div class="large-3 small-3 columns">
				<h4><?php echo $Lang->getAdminText('usersBodyTitle21'); ?></h4>
				
				<div class="large-12">
					<p class="center">
						<?php echo $Page->countUsers(); ?> <?php echo $Lang->getGeneralText('pages'); ?>
					</p>
				</div>
				<div class="large-4 small-4 columns">
					<p class="center">
						<?php echo $Page->countPage( true ); ?><br />
						<?php echo $Page->countPage( false ); ?>
					</p>
				</div>
				<div class="large-8 small-8 columns">
					<p>
						Visible<br />
						Not visible
					</p>
				</div>
			</div>
		</div>
	</main>
	
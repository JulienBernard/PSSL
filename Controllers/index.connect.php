<?php

	if( isset($_POST['suggest']) ) {
		$fields = array('name' => $_POST['name']);
		$return = $Engine->checkParams($fields);
		
		if( $return == 1 ) {
			include_once(PATH_MODELS."myPDO.class.php");
			include_once(PATH_MODELS."game.class.php");
		
			$name = (String)htmlspecialchars($_POST['name']);
			
			$game = Game::addGame( $name );
			if( $game == 1 ) {
				$Engine->setSuccess($Lang->getErrorText('loginSuccess'));
				?><script type="text/javascript">redirection(3, 'index.php');</script><?php
			}
			else if( $game == 0 )
				$Engine->setError($Lang->getErrorText('loginError'));
			else if( $game == -1 )
				$Engine->setError($Lang->getErrorText('loginError1'));
		}
		else
			$Engine->setInfo("Un des champs est vide.");
	}

		
	if( $Engine->getError() != null || $Engine->getSuccess() != null || $Engine->getInfo() != null )
	{
		?>
		<script type="text/javascript">redirection(0, 'index.php#modalContent');</script>
		<?php
	}
	
	/* Inclusion de la vue */
	include_once( $Engine->getViewPath() );
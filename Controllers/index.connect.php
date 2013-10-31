<?php

	include_once(PATH_MODELS."myPDO.class.php");
	include_once(PATH_MODELS."game.class.php");
	for( $i = 0; $i < 4 ; $i++ )
		$games[] = new Game( rand(1, Game::countGames(1)) );
	$specialGame = new Game( rand(1, Game::countGames(1)) );
	
	$User = new User( $_SESSION['SpaceEngineConnected'] );
	if( isset($_POST['suggest']) ) {
		$fields = array('name' => $_POST['name']);
		$return = $Engine->checkParams($fields);
		
		if( $return == 1 ) {
			include_once(PATH_MODELS."myPDO.class.php");
			include_once(PATH_MODELS."game.class.php");
		
			$name = (String)htmlspecialchars(strtolower($_POST['name']));
			
			$game = Game::addGame( $name, $User->getId() );
			if( $game == 1 ) {
				$Engine->setSuccess($Lang->getErrorText('suggestSuccess'));
				?><script type="text/javascript">redirection(3, 'index.php');</script><?php
			}
			else if( $game == 0 )
				$Engine->setError($Lang->getErrorText('suggestError'));
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
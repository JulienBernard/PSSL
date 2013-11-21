<?php

	include_once(PATH_MODELS."myPDO.class.php");
	include_once(PATH_MODELS."game.class.php");
	for( $i = 0; $i < 6 ; $i++ )
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
	else if( isset($_POST['add']) ) {
		$fields = array('game' => $_POST['game'], 'level' => $_POST['level']);
		$return = $Engine->checkParams($fields);
		
		if( $return == 1 ) {
			include_once(PATH_MODELS."myPDO.class.php");
			include_once(PATH_MODELS."game.class.php");
		
			$gameId = (int)htmlspecialchars(strtolower($_POST['game']));
			$level = (int)htmlspecialchars(strtolower($_POST['level']));
			
			$game = Game::addGameToUserList( $gameId, $level, $User->getId() );
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
	else if( isset($_POST['change']) ) {
		$fields = array('tournament' => $_POST['tournament']);
		$return = $Engine->checkParams($fields);
		
		if( $return == 1 ) {
			include_once(PATH_MODELS."myPDO.class.php");
			include_once(PATH_MODELS."tournament.class.php");
		
			$tournamentId = (int)htmlspecialchars($_POST['tournament']);
			if( isset($_POST['team']) )
				$team = (String)htmlspecialchars(strtolower($_POST['team']));
			else
				$team = null;
				
			if( !Tournament::checkUserTournamentExist( $User->getId() ) )
			{
				$tournament = Tournament::addTournamentToUserList( $tournamentId, $team, $User->getId() );
				
				if( $tournament == 1 ) {
					$Engine->setSuccess($Lang->getErrorText('tournamentUserSuccess'));
					?><script type="text/javascript">redirection(3, 'index.php');</script><?php
				}
				else if( $tournament == 0 )
					$Engine->setError($Lang->getErrorText('tournamentUserError'));
			}
			else
			{
				$tournament = Tournament::changeTournamentToUserList( $tournamentId, $team, $User->getId() );
				if( $tournament == 1 ) {
					$Engine->setSuccess($Lang->getErrorText('tournamentUserSuccess'));
					?><script type="text/javascript">redirection(3, 'index.php');</script><?php
				}
				else if( $tournament == 0 )
					$Engine->setError($Lang->getErrorText('tournamentUserSuccess'));
			}
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
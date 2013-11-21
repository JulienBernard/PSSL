<?php

	include_once(PATH_MODELS."myPDO.class.php");
	include_once(PATH_MODELS."user.class.php");
	include_once(PATH_MODELS."tournament.class.php");

	/* Variables */
	$size = 10;
	$start = 0;
	
	if( isset($_GET['p']) && is_numeric($_GET['p']) && $_GET['p'] > 0 )
		$start = (int)$_GET['p'] * $size;
		
	$User = new User( $_SESSION['SpaceEngineConnected'] );
	$tournamentsList = Tournament::getTournamentsList( $start, $size, 0, true);
	
	if( isset($_GET['create']) )
	{
		include_once(PATH_MODELS."game.class.php");
		$gamesList = Game::getGamesList( 0, 999, 0, false );
		$title = null;
		
		if( isset($_POST['create']) )
		{
			$title = htmlspecialchars($_POST['title']);
			$gameId = htmlspecialchars($_POST['game']);

			$fields = array('title' => $title, 'gameId' => $gameId);
			$return = $Engine->checkParams( $fields );
			
			if( $return == 1 ) {
				$title = (String)htmlspecialchars(strtolower($_POST['title']));
				$gameId = (int)htmlspecialchars(strtolower($_POST['game']));
				
				if( Tournament::checkStringLength( $title, 3, 100 ) )
				{
					$Tournament = Tournament::addTournament( $title, $gameId );
					if( $Tournament == 1 ) {
						$Engine->setSuccess($Lang->getErrorText('tournamentSuccess'));
						?><script type="text/javascript">redirection(3, 'tournaments.php');</script><?php
				}
				else
					$Engine->setError($Lang->getErrorText('tournamentError1'));
				}
				else if( $Tournament == 0 )
					$Engine->setError($Lang->getErrorText('tournamentError'));
			}
			else
				$Engine->setInfo("Un des champs est vide.");
		}
		
		if( $Engine->getError() != null || $Engine->getSuccess() != null || $Engine->getInfo() != null )
		{
			?><script type="text/javascript">redirection(0, 'tournaments.php?create#modalContent');</script><?php
		}
		
		include_once( PATH_VIEWS."tournaments.admin.create.php" );
	}
	else if( isset($_GET['update']) )
	{
		if( is_numeric($_GET['update']) && $_GET['update'] > 0 )
			$id = (int)$_GET['update'];
		else
			$id = 0;
				
		include_once(PATH_MODELS."game.class.php");
		$gamesList = Game::getGamesList( 0, 999, 0, false );
		$Tournament = new Tournament($id);
		$tournamentUserList = Tournament::getTournamentUser( $id );
		
		$id = $Tournament->getId();
		$gameId = $Tournament->getGameId();
		$name = $Tournament->getName();
		$valide = $Tournament->getValide();
	
		if( isset($_POST['update']) )
		{
			$gameId = (int)htmlspecialchars($_POST['gameId']);
			$name = htmlspecialchars(strtolower($_POST['name']));
			$valide = htmlspecialchars($_POST['valide']);
			
			$fields = array('gameId' => $gameId, 'name' => $name, 'valide' => $valide);
			$return = $Engine->checkParams( $fields );
			
			/* Champs valides */
			if( $return == 1  )
			{
				if( Tournament::checkStringLength( $name, 3, 100 ) )
				{
					$sendReturn = Tournament::updateTournament( $id, $gameId, $name, $valide);
					if( $sendReturn )
						$Engine->setSuccess("The tournament '".$name." have been updated. Her validity is '".$valide."'.");
					else
						$Engine->setError($Lang->getErrorText('tournamentError3'));
				}
				else
					$Engine->setError($Lang->getErrorText('tournamentError1'));
			}
			else
				$Engine->setError($Lang->getErrorText('tournamentError2'));
		}
			
		if( $Engine->getError() != null || $Engine->getSuccess() != null || $Engine->getInfo() != null )
		{
			?><script type="text/javascript">redirection(0, 'tournaments.php?update=<?php echo $id; ?>#modalContent');</script><?php
		}
		
		include_once( PATH_VIEWS."tournaments.admin.update.php" );
	}
	else
		include_once( $Engine->getViewPath() );
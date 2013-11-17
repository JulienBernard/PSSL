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

				$Tournament = Tournament::addTournament( $title, $gameId );
				if( $Tournament == 1 ) {
					$Engine->setSuccess($Lang->getErrorText('suggestSuccess'));
					?><script type="text/javascript">redirection(3, 'index.php');</script><?php
			}
			else if( $Tournament == 0 )
				$Engine->setError($Lang->getErrorText('suggestError'));
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
				
		$Tournament = new Tournament($id);
		
		$pageId = $Tournament->getPageId();
		$name = $Tournament->getName();
		$pitch = $Tournament->getPitch();
		$players = $Tournament->getPlayers();
		$image = $Tournament->getImage();
		$valide = $Tournament->getValide();
	
		if( isset($_POST['update']) )
		{
			$pageId = htmlspecialchars($_POST['pageId']);
			$name = htmlspecialchars(strtolower($_POST['name']));
			$pitch = htmlspecialchars($_POST['pitch']);
			$players = htmlspecialchars($_POST['players']);
			$image = htmlspecialchars($_POST['image']);
			$valide = htmlspecialchars($_POST['valide']);
			
			$fields = array('pageId' => $pageId, 'name' => $name, 'pitch' => $pitch, 'players' => $players, 'image' => $image, 'valide' => $valide);
			$return = $Engine->checkParams( $fields );
			
			/* Champs valides */
			if( $return == 1  )
			{
				if( Tournament::checkStringLength( $name ) && Tournament::checkStringLength( $players, 1, 50 ) )
				{
					$sendReturn = Tournament::updateTournament( $id, $pageId, $name, $pitch, $players, $image, $valide);
					if( $sendReturn )
						$Engine->setSuccess("The Tournament '".$name." have been updated. Her validity is '".$valide."'.");
					else
						$Engine->setError("This Tournament cannot be linked with this page because it's already used by another Tournament. The name need to be unique too.");
				}
				else
					$Engine->setError("The title must to be greater than 3 characters. You need to provide the text field.");
			}
			else
				$Engine->setError("You must provide the following informations: title.");
		}
			
		if( $Engine->getError() != null || $Engine->getSuccess() != null || $Engine->getInfo() != null )
		{
			?><script type="text/javascript">redirection(0, 'tournaments.php?update=<?php echo $id; ?>#modalContent');</script><?php
		}
		
		include_once( PATH_VIEWS."tournaments.admin.update.php" );
	}
	else
		include_once( $Engine->getViewPath() );
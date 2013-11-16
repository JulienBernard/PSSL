<?php

	include_once(PATH_MODELS."myPDO.class.php");
	include_once(PATH_MODELS."user.class.php");
	include_once(PATH_MODELS."game.class.php");

	/* Variables */
	$size = 10;
	$start = 0;
	
	if( isset($_GET['p']) && is_numeric($_GET['p']) && $_GET['p'] > 0 )
		$start = (int)$_GET['p'] * $size;
		
	$User = new User( $_SESSION['SpaceEngineConnected'] );
	$gamesList = Game::getGamesList( $start, $size, 0, true);

	if( isset($_GET['create']) )
	{
		$title = null;
		
		if( isset($_POST['create']) )
		{
			$title = htmlspecialchars($_POST['title']);
			
			$fields = array('title' => $title);
			$return = $Engine->checkParams( $fields );
			
			if( $return == 1 ) {		
				$title = (String)htmlspecialchars(strtolower($_POST['title']));
				
				$game = Game::addGame( $title, $User->getId() );
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
			?><script type="text/javascript">redirection(0, 'games.php?create#modalContent');</script><?php
		}
		
		include_once( PATH_VIEWS."games.admin.create.php" );
	}
	else if( isset($_GET['update']) )
	{
		if( is_numeric($_GET['update']) && $_GET['update'] > 0 )
			$id = (int)$_GET['update'];
		else
			$id = 0;
				
		$Game = new Game($id);
		
		$pageId = $Game->getPageId();
		$name = $Game->getName();
		$pitch = $Game->getPitch();
		$players = $Game->getPlayers();
		$image = $Game->getImage();
		$valide = $Game->getValide();
	
		if( isset($_POST['update']) )
		{
			$pageId = htmlspecialchars($_POST['pageId']);
			$name = htmlspecialchars($_POST['name']);
			$pitch = htmlspecialchars($_POST['pitch']);
			$players = htmlspecialchars($_POST['players']);
			$image = htmlspecialchars($_POST['image']);
			$valide = htmlspecialchars($_POST['valide']);
			
			$fields = array('pageId' => $pageId, 'name' => $name, 'pitch' => $pitch, 'players' => $players, 'image' => $image, 'valide' => $valide);
			$return = $Engine->checkParams( $fields );
			
			/* Champs valides */
			if( $return == 1  )
			{
				if( Game::checkStringLength( $name ) && Game::checkStringLength( $players, 1, 50 ) )
				{
					$sendReturn = Game::updateGame( $id, $pageId, $name, $pitch, $players, $image, $valide);
					if( $sendReturn )
						$Engine->setSuccess("The game '".$name." have been updated. Her validity is '".$valide."'.");
					else
						$Engine->setError("An error has been catch.");
				}
				else
					$Engine->setError("The title must to be greater than 3 characters. You need to provide the text field.");
			}
			else
				$Engine->setError("You must provide the following informations: title, visiblity and text.");
		}
			
		if( $Engine->getError() != null || $Engine->getSuccess() != null || $Engine->getInfo() != null )
		{
			?><script type="text/javascript">redirection(0, 'games.php?update=<?php echo $id; ?>#modalContent');</script><?php
		}
		
		include_once( PATH_VIEWS."games.admin.update.php" );
	}
	else
		include_once( $Engine->getViewPath() );
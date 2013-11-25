<?php

	include_once(PATH_MODELS."myPDO.class.php");
	include_once(PATH_MODELS."user.class.php");
	include_once(PATH_MODELS."news.class.php");

	/* Variables */
	$size = 10;
	$start = 0;
	
	if( isset($_GET['p']) && is_numeric($_GET['p']) && $_GET['p'] > 0 )
		$start = (int)$_GET['p'] * $size;
		
	$User = new User( $_SESSION['SpaceEngineConnected'] );
	$NewssList = News::getPagesList( $start, $size );

	/* Inclusion de la vue */
	if( isset($_GET['create']) )
	{
		$title = null;
		$text = null;
		$visibility = null;
		$lastAuthor = null;
		
		if( isset($_POST['create']) )
		{
			$title = htmlspecialchars($_POST['title']);
			$text = htmlspecialchars($_POST['text']);
			$visibility = htmlspecialchars($_POST['switch-visible']);
			$lastAuthor = $User->getUsername();
			
			$fields = array('title' => $title, 'text' => $text, 'visibility' => $visibility);
			$return = $Engine->checkParams( $fields );
			
			/* Champs valides */
			if( $return == 1  )
			{
				if( News::checkStringLength( $title ) && News::checkStringLength( $text, 12, null ) )
				{
					$sendReturn = News::addNews( $title, $text, $visibility, $lastAuthor);
					$Engine->setSuccess("The new '".$title." have been created. Her visibility is '".$visibility."'.");
				}
				else
					$Engine->setError("The title must to be greater than 3 characters. You need to provide the text field.");
			}
			else
				$Engine->setError("You must provide the following informations: title, visiblity and text.");
		}
		
		if( $Engine->getError() != null || $Engine->getSuccess() != null || $Engine->getInfo() != null )
		{
			?><script type="text/javascript">redirection(0, 'news.php?create#modalContent');</script><?php
		}
		
		include_once( PATH_VIEWS."news.admin.create.php" );
	}
	/* Inclusion de la vue */
	else if( isset($_GET['update']) )
	{
		if( is_numeric($_GET['update']) && $_GET['update'] > 0 )
			$id = (int)$_GET['update'];
		else
			$id = 0;
				
		$News = new News($id);
		
		$title = $News->getTitle();
		$text = $News->getText();
		$visibility = $News->getVisible();
		$lastAuthor = $News->getAuthor();
		
		if( isset($_POST['update']) )
		{
			$title = htmlspecialchars($_POST['title']);
			$text = htmlspecialchars($_POST['text']);
			$visibility = htmlspecialchars($_POST['switch-visible']);
			$lastAuthor = $User->getUsername();
			
			$fields = array('title' => $title, 'text' => $text, 'visibility' => $visibility);
			$return = $Engine->checkParams( $fields );
			
			/* Champs valides */
			if( $return == 1  )
			{
				if( News::checkStringLength( $title ) && News::checkStringLength( $text, 12, null ) )
				{
					$sendReturn = News::updateNews( $id, $title, $text, $visibility, $lastAuthor);
					if( $sendReturn )
						$Engine->setSuccess("The new '".$title." have been updated. Her visibility is '".$visibility."'.");
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
			?><script type="text/javascript">redirection(0, 'news.php?update=<?php echo $id; ?>#modalContent');</script><?php
		}
		
		include_once( PATH_VIEWS."news.admin.update.php" );
	}
	else
		include_once( $Engine->getViewPath() );
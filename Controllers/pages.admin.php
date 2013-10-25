<?php

	include_once(PATH_MODELS."myPDO.class.php");
	include_once(PATH_MODELS."user.class.php");
	include_once(PATH_MODELS."page.class.php");

	/* Variables */
	$size = 10;
	$start = 0;
	
	if( isset($_GET['p']) && is_numeric($_GET['p']) && $_GET['p'] > 0 )
		$start = (int)$_GET['p'] * $size;
		
	$User = new User( $_SESSION['SpaceEngineConnected'] );
	$pagesList = Page::getPagesList( $start, $size );

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
				if( Page::checkTitleLength( $title ) )
				{
					$sendReturn = Page::addPage( $title, $text, $visibility, $lastAuthor);
					$Engine->setSuccess("The page '".$title." have been created. Her visibility is ".$visibility."'.");
				}
				else
					$Engine->setError("The title must to be greater than 3 characters.");
			}
			else
				$Engine->setError("The title, the text or the visibility has sent an error.");
		}
		
		if( $Engine->getError() != null || $Engine->getSuccess() != null || $Engine->getInfo() != null )
		{
			?><script type="text/javascript">redirection(0, 'pages.php?create#modalContent');</script><?php
		}
		
		include_once( PATH_VIEWS."pages.admin.create.php" );
	}
	else
		include_once( $Engine->getViewPath() );
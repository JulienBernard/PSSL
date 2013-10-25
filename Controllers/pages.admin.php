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
		include_once( PATH_VIEWS."pages.admin.create.php" );
	else
		include_once( $Engine->getViewPath() );
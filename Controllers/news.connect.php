<?php

	include_once(PATH_MODELS."myPDO.class.php");
	include_once(PATH_MODELS."news.class.php");
	
	if( isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0 )
		$id = (int)$_GET['id'];
	else
		$id = 0;
	
	$News = new News($id);
	
	if( $News->getVisible() == false )
		$News = new News(0);
	
	include_once( PATH_VIEWS."news.php" );

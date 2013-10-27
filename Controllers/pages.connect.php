<?php

	include_once(PATH_MODELS."myPDO.class.php");
	include_once(PATH_MODELS."page.class.php");
	
	if( isset($_GET['id']) && is_numeric($_GET['id']) && $_GET['id'] > 0 )
		$id = (int)$_GET['id'];
	else
		$id = 0;
	
	$Page = new Page($id);
	
	if( $Page->getVisible() == false )
		$Page = new Page(0);
	
	include_once( PATH_VIEWS."pages.php" );

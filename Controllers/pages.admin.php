<?php

	include_once(PATH_MODELS."myPDO.class.php");
	include_once(PATH_MODELS."user.class.php");

	$User = new User( $_SESSION['SpaceEngineConnected'] );

	/* Inclusion de la vue */
	include_once( $Engine->getViewPath() );
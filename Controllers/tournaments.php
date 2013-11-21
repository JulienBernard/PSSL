<?php

	include_once(PATH_MODELS."myPDO.class.php");
	include_once(PATH_MODELS."tournament.class.php");

	/* Variables */
	$size = 999;
	$start = 0;
		
	$tournamentsList = Tournament::getTournamentsList( $start, $size, 0, false);
	
	/* Inclusion de la vue */
	include_once( $Engine->getViewPath() );
	
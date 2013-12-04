<?php

	include_once(PATH_MODELS."myPDO.class.php");
	include_once(PATH_MODELS."tournament.class.php");
	
	$tournamentsList = Tournament::getTournamentsList( 0, 999, null, false);

	/* Inclusion de la vue */
	include_once( $Engine->getViewPath() );
	
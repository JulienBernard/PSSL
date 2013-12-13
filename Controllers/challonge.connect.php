<?php

	include_once(PATH_MODELS."myPDO.class.php");
	include_once(PATH_MODELS."tournament.class.php");
	
	if( !empty($_GET['id']) && is_numeric($_GET['id']) ) {
		$tournamentUserList = Tournament::getTournamentUser( (int)$_GET['id'] );
		$countPlayers = Tournament::countPlayersByTournament( (int)$_GET['id'] );
		$countTeams = Tournament::countTeamsByTournament( (int)$_GET['id'] );
		$tournament = Tournament::getTournament( (int)$_GET['id'] );
	} else { $tournamentUserList = null; $countPlayers = 0; $countTeams = 0; }

	/* Inclusion de la vue */
	include_once( $Engine->getViewPath() );
	
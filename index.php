<?php

	/***
	 * 
	 * Point d'entrée de la page
	 * @author JulienBernard
	 * 
	 */
	
	/* Le namePage permet d'identifier votre page. Il doit être être écrit en minuscule et tenir en un seul mot.
	 */
	$namePage = "index";
	
	/* Appel du moteur [ne pas modifier] */
	include_once("./config.php");
	
	$Engine = new Engine( $namePage );
	$Template = new Template();
	
	/* Informations sur la page [valeurs à modifier] */
	$Template->setTitle("Accueil");
	$Template->setDescription("Propulsé par un groupe d'étudiant passionné d'IN'TECH INFO, notre projet vous entraînera vers des sensations fortes à bout de claviers et de jeux en réseau à tout va !");
	$Template->addCss("normalize.css");
	$Template->addCss("foundation.min.css");
	$Template->addSCript("redirection.js");
	
	/* Lancement du moteur [ne pas modifier] */
	$Engine->startEngine( $Engine, $Template );
?>
<?php

	include_once(PATH_MODELS."myPDO.class.php");
	include_once(PATH_MODELS."user.class.php");
	include_once(PATH_MODELS."event.class.php");
	
	/* Variables */
	$size = 10;
	$start = 0;
	
	if( isset($_GET['p']) && is_numeric($_GET['p']) && $_GET['p'] > 0 )
		$start = (int)$_GET['p'] * $size;
	
	$User = new User( $_SESSION['SpaceEngineConnected'] );
	$eventList = Event::getEventList( $start, $size);
	
	/* Inclusion de la vue */
	if( isset($_GET['create']) )
	{
		$name = null;
		$mail = null;
		$participate = null;
		$price = null;
		
		if( isset($_POST['create']) )
		{
			$name = htmlspecialchars($_POST['name']);
			$mail = htmlspecialchars($_POST['mail']);
			$participate = htmlspecialchars($_POST['switch-visible']);
			$price = htmlspecialchars($_POST['price']);
			$renting = htmlspecialchars($_POST['renting']);
			$localization = htmlspecialchars($_POST['localization']);
			
			$fields = array('name' => $name, 'mail' => $mail, 'participate' => $participate);
			$return = $Engine->checkParams( $fields );
			
			/* Champs valides */
			if( $return == 1  )
			{
				$sendReturn = Event::addEvent( $name, $mail, $price, $renting, $localization, $participate, 0 );
				if( $sendReturn )
					$Engine->setSuccess("'".$name." a bien été enregistré.");
				else
					$Engine->setError("Une erreur est survenue.");
			}
			else
				$Engine->setError("You must provide the following informations: name, mail and price.");
		}
		
		if( $Engine->getError() != null || $Engine->getSuccess() != null || $Engine->getInfo() != null )
		{
			?><script type="text/javascript">redirection(0, 'event.php?create#modalContent');</script><?php
		}
		
		include_once( PATH_VIEWS."event.admin.create.php" );
	}
	else if( isset($_GET['update']) )
	{
		if( is_numeric($_GET['update']) && $_GET['update'] > 0 )
			$id = (int)$_GET['update'];
		else
			$id = 0;
				
		$Event = new Event($id);
		
		$name = $Event->getName();
		$price = $Event->getPrice();
		$mail = $Event->getMail();
		$participate = $Event->getParticipate();
		$renting = $Event->getRenting();
		$localization = $Event->getLocalization();
		
		if( isset($_POST['update']) )
		{
			$price = htmlspecialchars($_POST['price']);
			$mail = htmlspecialchars($_POST['mail']);
			$localization = htmlspecialchars($_POST['localization']);
			$participate = htmlspecialchars($_POST['switch-visible']);
			
			$fields = array('mail' => $mail, 'participate' => $participate);
			$return = $Engine->checkParams( $fields );
			
			/* Champs valides */
			if( $return == 1  )
			{
				$sendReturn = Event::updateEvent( $id, $mail, $price, $renting, $localization, $participate);
				if( $sendReturn )
					$Engine->setSuccess("Mise à jour de la personne OK.");
				else
					$Engine->setError("An error has been catch.");
			}
			else
				$Engine->setError("You must provide the following informations: title, visiblity and text.");
		}
			
		if( $Engine->getError() != null || $Engine->getSuccess() != null || $Engine->getInfo() != null )
		{
			?><script type="text/javascript">redirection(0, 'event.php?update=<?php echo $id; ?>#modalContent');</script><?php
		}
		
		include_once( PATH_VIEWS."event.admin.update.php" );
	}
	else
		include_once( $Engine->getViewPath() );
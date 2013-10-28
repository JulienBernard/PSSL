<?php

	if( isset($_POST['register']) )
	{
		$participate = null;
		$mail = null;
		$present = null;
		
		$fields = array('participate' => $_POST['participate'], 'mail' => $_POST['mail']);
		$return = $Engine->checkParams($fields);
			
		if( $return == 1 && isset($_POST['present'])) {
			include_once(PATH_MODELS."myPDO.class.php");
			include_once(PATH_MODELS."nextEvent.class.php");
			include_once(PATH_MODELS."user.class.php");
			
			$participate = $_POST['participate'];
			$mail = $_POST['mail'];
			$present = true;
			
			$User = new User( $_SESSION['SpaceEngineConnected'] );
			if( !NextEvent::checkIfUserExist($User->getId()) ) {
				if( NextEvent::isValidEmail($mail) ) {
					// valide l'entré et inscrire l'utilisateur dans la bdd pour cette LAN
					// TO DO : envoie un email de validation !
				}
				else
					$Engine->setError("Ce mail n'est pas valide.");
			}
			else
				$Engine->setError("Vous êtes déjà enregistré pour cette lan.");
		}
		else
			$Engine->setInfo("Un des champs est vide.");
	}
	
	
	

	if( $Engine->getError() != null || $Engine->getSuccess() != null || $Engine->getInfo() != null )
	{
		?>
		<script type="text/javascript">redirection(0, 'subscribe.php#modalContent');</script>
		<?php
	}
	
	/* Inclusion de la vue */
	include_once( $Engine->getViewPath() );
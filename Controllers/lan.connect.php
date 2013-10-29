<?php
	include_once(PATH_MODELS."myPDO.class.php");
	include_once(PATH_MODELS."nextEvent.class.php");
	include_once(PATH_MODELS."user.class.php");

	$User = new User( $_SESSION['SpaceEngineConnected'] );
	$exist = NextEvent::checkIfUserExist($User->getId());
	
	if( isset($_POST['unregister']) )
	{
		if( NextEvent::deleteFromEvent($User->getId()) ) {
			$Engine->setSuccess($Lang->getErrorText('delSuccess'));
			?><script type="text/javascript">redirection(3, 'subscribe.php');</script><?php
		} else {
			$Engine->setError($Lang->getErrorText('addError4'));
		}
	}
	if( isset($_POST['register']) )
	{
		$participate = null;
		$mail = null;
		$present = null;
		
		$fields = array('participate' => $_POST['participate'], 'mail' => $_POST['mail']);
		$return = $Engine->checkParams($fields);
			
		if( $return == 1 && isset($_POST['present'])) {
			$participate = $_POST['participate'];
			$mail = $_POST['mail'];
			
			if( $participate == "Je participe" )
				$participate = true;
			else
				$participate = false;
						
			if( !$exist ) {
				if( NextEvent::isValidEmail($mail) ) {
					if( NextEvent::addEvent( $User->getId(), $User->getName(), $mail, 1.00, $participate) ) {
						$Engine->setSuccess($Lang->getErrorText('addSuccess'));
						?><script type="text/javascript">redirection(3, 'subscribe.php');</script><?php
					} else {
						$Engine->setError($Lang->getErrorText('addError4'));
					}
				}
				else
					$Engine->setError($Lang->getErrorText('addError3'));
			}
			else
				$Engine->setError($Lang->getErrorText('addError2'));
		}
		else
			$Engine->setError($Lang->getErrorText('addError1'));
	}

	if( $Engine->getError() != null || $Engine->getSuccess() != null || $Engine->getInfo() != null )
	{
		?>
		<script type="text/javascript">redirection(0, 'subscribe.php#modalContent');</script>
		<?php
	}
	
	/* Inclusion de la vue */
	include_once( $Engine->getViewPath() );
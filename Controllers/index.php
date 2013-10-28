<?php
	/* Une action sur un formulaire (envoie par POST) a été effectuée.  */
	if( isset($_POST) ) {
		if( isset($_POST['login']) ) {
			$fields = array('name' => $_POST['name'], 'password' => $_POST['password']);
			$return = $Engine->checkParams($fields);
			
			if( $return == 1 ) {
				include_once(PATH_MODELS."myPDO.class.php");
				include_once(PATH_MODELS."user.class.php");
			
				$name = (String)htmlspecialchars(strtolower($_POST['name']));
				$password = (String)htmlspecialchars($_POST['password']);
				
				$login = User::checkLogin( $name, $password );
				if( $login == 1 ) {
					$Engine->setSuccess($Lang->getErrorText('loginSuccess'));
					?><script type="text/javascript">redirection(3, 'index.php');</script><?php
				}
				else if( $login == 0 )
					$Engine->setError($Lang->getErrorText('loginError'));
				else if( $login == -1 )
					$Engine->setError($Lang->getErrorText('loginError1'));
				else if( $login == -2 )
					$Engine->setError($Lang->getErrorText('loginError2'));
				else if( $login == -3 )
					$Engine->setError($Lang->getErrorText('loginError3'));
				else if( $login == -4 )
					$Engine->setError($Lang->getErrorText('loginError4'));
			}
			else
				$Engine->setInfo("Un des champs est vide.");
		}
		else if( isset($_POST['subscribe']) ) {
			$fields = array('name' => $_POST['name'], 'password' => $_POST['password']);
			$return = $Engine->checkParams($fields);
			
			if( $return == 1 ) {
				include_once(PATH_MODELS."myPDO.class.php");
				include_once(PATH_MODELS."user.class.php");
			
				$name = (String)htmlspecialchars(strtolower($_POST['name']));
				$password = (String)htmlspecialchars($_POST['password']);
				
				$subscribe = User::checkSubscribe( $name, $password );
				if( $subscribe == 1 ) {
					$Engine->setSuccess($Lang->getErrorText('subscribeSuccess'));
				}
				else if( $subscribe == 0 )
					$Engine->setError($Lang->getErrorText('subscribeError'));
				else if( $subscribe == -1 )
					$Engine->setError($Lang->getErrorText('subscribeError1'));
				else if( $subscribe == -2 )
					$Engine->setError($Lang->getErrorText('subscribeError2'));
			}
			else
				$Engine->setInfo("Un des champs est vide.");
		}
	}
		
	if( $Engine->getError() != null || $Engine->getSuccess() != null || $Engine->getInfo() != null )
	{
		?>
		<script type="text/javascript">redirection(0, 'index.php#modalContent');</script>
		<?php
	}

	/* Inclusion de la vue */
	include_once( $Engine->getViewPath() );
	
<?php

class Event
{
	private $_id;
	private $_userId;
	private $_name;
	private $_mail;
	private $_price;
	private $_participate;
	
	/* Constructeur de la classe */
	public function __construct( $id )
	{
		if( !filter_var($id, FILTER_VALIDATE_INT) ) {
			throw new Exception('You must provide an integer value!');
		}
		$sqlData = $this->getEventData( $id );
		$this->_id = $sqlData['id'];
		$this->_name = $sqlData['name'];
		$this->_mail = $sqlData['mail'];
		$this->_userId = $sqlData['userId'];
		$this->_price = $sqlData['price'];
		$this->_participate = $sqlData['participate'];
	}
	
	public function getId()
	{
		return $this->_id;
	}
	public function getName()
	{
		return $this->_name;
	}
	public function getUserId()
	{
		return $this->_userId;
	}
	public function getMail()
	{
		return $this->_mail;
	}
	public function getPrice()
	{
		return $this->_price;
	}
	public function getParticipate()
	{
		return $this->_participate;
	}
	
	/**
	 * Recupère les données utilisateur depuis la base de données.
	 * @param int userId
	 * @return array or 0 (error)
	 */
	private function getEventData( $eventId ) {
		
		/* Validation des paramètres */
		if( !is_numeric($eventId) || $eventId < 0 )
			return false;
		
		$sql = MyPDO::get();

		$rq = $sql->prepare('SELECT * FROM next_event WHERE id=:eventId');
        $data = array(':eventId' => $eventId );
		$rq->execute($data);
		
		if( $rq->rowCount() == 0 ) throw new Exception('Une importante erreur est survenue : Impossible de récupérer les données de cet utilisateur !');
		$row = $rq->fetch();
		return $row;
	}
	
	/** Récupère une liste de utilisateurs (selon $size [DEFAUT : 10])
	 * @param int $size				:	taille de la liste (plus elle est grande, plus la requête sera longue à effectuer !)
	 * @param int $startPosition	:	position de départ
	 */
	public function getEventList( $startPosition = 0, $size = 10 ) {
		$sql = MyPDO::get();

		/* Si on arrive sur la page de classement "principale",
			on effectue une recherche sur la moitié supérieur aux nombre d'habitants
			moyen retournée par MySql [SELECT AVG(pl_population)] */
		if( $startPosition == 0 )
		{
			$rq = $sql->prepare('
				SELECT *
				FROM next_event
				WHERE next_event.id > (SELECT AVG(id) FROM next_event)
				ORDER BY next_event.id DESC
				LIMIT :startPosition, :size
			');
			$rq->bindValue('startPosition', (int)$startPosition, PDO::PARAM_INT);
			$rq->bindValue('size', (int)$size, PDO::PARAM_INT);
			$rq->execute() or die(print_r($rq->errorInfo()));
			
			$array = array();
			while( $row = $rq->fetch() )
				$array[] = $row;
			
			/* Au cas où :
				si le nombre de retour est inférieur à la taille souhaitée,
				on check sur toute la BDD. Dans tous les cas, on renvoit les mêmes données. */
			if( count($array) < $size )
			{
				unset($array);
				$rq = $sql->prepare('
					SELECT *
					FROM next_event
					ORDER BY next_event.id DESC
					LIMIT :startPosition, :size
				');
				$rq->bindValue('startPosition', (int)$startPosition, PDO::PARAM_INT);
				$rq->bindValue('size', (int)$size, PDO::PARAM_INT);
				$rq->execute() or die(print_r($rq->errorInfo()));
				
				while( $row = $rq->fetch() )
					$array[] = $row;
			}
		}
		else {
			$rq = $sql->prepare('
				SELECT *
				FROM next_event
				ORDER BY next_event.id DESC
				LIMIT :startPosition, :size
			');
			$rq->bindValue('startPosition', (int)$startPosition, PDO::PARAM_INT);
			$rq->bindValue('size', (int)$size, PDO::PARAM_INT);
			$rq->execute() or die(print_r($rq->errorInfo()));
			
			while( $row = $rq->fetch() )
				$array[] = $row;
		}
		
		if( isset($array) )
			return $array;
		else
			return 0;
	}
	
	/**
	 * Met à jour l'activité de l'utilisateur (timestamp)
	 * @param int userId
	 */
	public static function updateActivity( $userId )
	{
		$newTime = time();
		$sql = MyPDO::get();

		$rq = $sql->prepare('UPDATE users SET activity=:newTime WHERE id=:userId');
        $data = array(':userId' => (int)$userId, ':newTime' => (int)$newTime );
		$rq->execute($data);
	}
	
	/** Retourne le nombre d'utilisateur
	 * @param int $activity		:	durée après laquelle l'utilisateur est déclaré inactif (défaut 3 jours)
	 * @param int $do			:	prendre en compte le tps ou juste sortir la liste
	 */
	public static function countPlayers( $activity = 259200, $rank = null ) {
		$currentActivityTime = time() - $activity;
		
		$sql = MyPDO::get();
		if( (int)$activity != 0 )
		{
			$req = $sql->prepare('SELECT id, activity FROM next_event WHERE activity >= :activityTime');
			$req->execute(array(':activityTime' => $currentActivityTime));
		}
		else
		{
			$req = $sql->prepare('SELECT id FROM next_event');
			$req->execute();
		}
		return $req->rowCount();
	}
	
	public static function updateEvent( $id, $mail, $price, $participate )
	{
		/* Validation des paramètres */
		if( !is_numeric($id) || !is_string($mail) || !is_string($participate) )
			return false;
			
		if( $participate == "true" )
			$participate = 1;
		else
			$participate = 0;
			
		$sql = MyPDO::get();
		$req = $sql->prepare('UPDATE next_event SET mail=:mail, price=:price, participate=:participate WHERE id=:id');
		$result = $req->execute( array(
			':mail' => (String)$mail,
			':price' => (String)$price,
			':participate' => (int)$participate,
			':id' => (int)$id
			));
		// Si PDO renvoie une erreur
		if( !$result )
			return 0;
		else
			return 1;
	}
	
	/**
	 * Vérifie si la connexion d'un utilisateur peut se faire. Renvoie différente erreur si une erreur en ressort.
	 * @param String username
	 * @param String password
	 * @return
	 *	1	: Connexion correcte, l'utilisateur est connecté.
	 *	0	: Une erreur importante est apparue
	 *	-1	: L'utilisateur n'existe pas
	 *	-2	: La taille de l'utilisateur ou du mot de passe est inférieur/supérieur à x caractères (défaut 2)
	 *	-3	: Le mot de passe ne correspond pas à cet utilisateur
	 *	-4	: Impossible de générer un token sécurisé !
	 */
	public static function checkLogin( $username, $password ) {
		$Engine = new Engine( "mock" );
		/* Validation des paramètres */
		if( !is_string($username) || !is_string($password) || empty($username) || empty($password) )
			return 0;
			
		if( self::checkUsernameExist($username) ) {
			if( self::checkStringLength($username, 2, 20) && self::checkStringLength($password, 2, 100) ) {
				if( $userId = self::checkUserAccountMatch($username, $password) ) {
					/* Destruction de la session au cas où ! */
					$Engine->destroySession("SpaceEngineConnected");
					$Engine->destroySession("SpaceEngineToken");
					/* Création du token unique pour la session de l'utilisateur */
					$token = self::generateUniqueToken(2);
					if( $token != false ) {
						if( self::updateToken( $token, $userId ) ) 
						{
							$Engine->createSession("SpaceEngineConnected", (int)$userId);
							$Engine->createSession("SpaceEngineToken", $token );
							return 1; // Succès !
						}
						else 
							return 0; // Impossible de mettre à jour le token ! (plus de token de libre, problème de création du token ?)
					} else 
						return -4;
				} else
					return -3;
			} else
				return -2;
		} else
			return -1;
	}
	
	/**
	 * Vérifie si l'inscription d'un utilisateur peut se faire. Renvoie différente erreur si une erreur en ressort.
	 * @param String name
	 * @param String username
	 * @param String password
	 * @return
	 *	1	: Inscription correcte, l'utilisateur est désormais inscrit dans la base de données.
	 *	0	: Une erreur importante est apparue
	 *	-1	: L'utilisateur existe déjà
	 *	-2	: La taille de l'utilisateur ou du mot de passe est inférieur/supérieur à x caractères (défaut 2)
	 */
	public static function checkSubscribe( $name, $username, $password ) {
		$Engine = new Engine( "mock" );
		/* Validation des paramètres */
		if( !is_string($name) || !is_string($username) || !is_string($password) || empty($name) || empty($username) || empty($password) )
			return 0;
			
		if( !self::checkUsernameExist($username) ) {
			if( self::checkStringLength($name, 2, 20) && self::checkStringLength($password, 2, 100) ) {
				/* Destruction de la session au cas où ! */
				$Engine->destroySession("SpaceEngineConnected");
				$Engine->destroySession("SpaceEngineToken");
				if( self::addEvent( $name, $username, $password ) )
					return 1; // Succès !
				else
					return 0;
			} else
				return -2;
		} else
			return -1;
	}
	
	/**
	 * Enregistre le nouvel utilisateur dans la base de donnée.
	 * return int lastInsertId	Retourne le dernier ID inséré dans la bdd, ici l'user id !
	 */
	public static function addEvent( $name, $mail, $price, $participate, $userId ) {
		
		/* Validation des paramètres */
		if( !is_string($name) || !is_string($mail) || empty($name) || empty($mail) )
			return false;
		
		$sql = MyPDO::get();
		$req = $sql->prepare('INSERT INTO next_event VALUES("", :userId, :name, :mail, :price, :participate)');
		$result = $req->execute( array(
			':userId' => (int)time(),
			':name' => (String)$name,
			':mail' => (String)$mail,
			':price' => (float)$price,
			':participate' => (int)$participate
		));
		
		if( $result )
			return $sql->lastInsertId();
		return 0;
	}
	
	/**
	 * Vérifie si l'name et le password sont exactes. 
	 * @param String username
	 * @param String password
	 * @return id de l'utilisateur ou 0 (erreur)
	 */
	private static function checkUserAccountMatch( $username, $password ) {
		
		/* Validation des paramètres */
		if( !is_string($username) || !is_string($password) || empty($username) || empty($password) )
			return false;
		
		$sql = MyPDO::get();
		
		$rq = $sql->prepare('SELECT id FROM users WHERE username=:username AND password=:password');
		$data = array(':username' => (String)$username, ':password' => (String)crypt(md5($password), PASSWORD_SALT));
		$rq->execute($data);

		if( $rq->rowCount() != 0)
		{
			$row = $rq->fetch();
			return (int)$row['id'];
		}
		else
			return 0;
	}
	
	/**
	 * Vérifie si l'username existe dans la bdd.
	 * @param String name
	 */
	private static function checkUsernameExist( $username ) {
		
		/* Validation des paramètres */
		if( !is_string($username) || empty($username) )
			return false;
			
		$sql = MyPDO::get();
		$rq = $sql->prepare('SELECT id FROM users WHERE username=:username');
		$data = array(':username' => (String)strtolower($username));
		$rq->execute($data);
		
		if( $rq->rowCount() != 0)
		{
			$row = $rq->fetch();
			return (int)$row['id'];
		}
		return false;
	}
	
	/**
	 * Vérifie si la string est supérieur à X caractères et inférieur à X caractères.
	 * @param String str
	 */
	public static function checkStringLength( $str, $min = 3, $max = 40 ) {
		if( $max === null ) {
			if( strlen($str) < $min )
				return false;
			else
				return true;
		}
		
		if( strlen($str) < $min || strlen($str) > $max )
			return false;
		return true;
	}
	
	/**
	 * Retourne le rang de l'utilisateur.
	 * @param int id
	 * @return id
	 */
	public static function getUserRank( $id ) {
		if( !filter_var($id, FILTER_VALIDATE_INT) ) {
			throw new Exception('You must provide an integer value!');
		}
		
		$sql = MyPDO::get();
		$rq = $sql->prepare('SELECT rank FROM users WHERE id=:id');
		$data = array(':id' => (int)$id);
		$rq->execute($data);
		
		if( $rq->rowCount() != 0)
		$row = $rq->fetch();
		return (int)$row['rank'];
	}
	
	/**
	 * Génère  un token unique crypté.
	 * @param int nbChar
	 * @return a string if it's ok, false it's not.
	 */
	private static function generateUniqueToken( $nbChar = 2 ) {
		if( !filter_var($nbChar, FILTER_VALIDATE_INT) ) {
			throw new Exception('You must provide an integer value!');
		}
		
		$str = substr(crypt(uniqid(mt_rand(), true), 0), $nbChar);
		return self::ckeckTokenExisted($str);
	}
	
	/**
	 * Vérifie si ce token n'existe pas déjà dans la base de données.
	 * @param String token
	 * @return String
	 */
	private static function ckeckTokenExisted( $token ) {
		$sql = MyPDO::get();
		$rq = $sql->prepare('SELECT id FROM users WHERE token=:token');
		$data = array(':token' => (String)$token);
		$rq->execute($data);
		
		if( $rq->rowCount() != 0)
			return self::generateUniqueToken(2);
		else
			return $token;
	}
	
	/**
	 * Vérifie si ce token est bien celui présent pour cet utilisateur.
	 * @param String token
	 * @param int id
	 * @return true or false
	 */
	public static function checkUserTokenMatch( $token, $id ) {
		if( !filter_var($id, FILTER_VALIDATE_INT) ) {
			throw new Exception('You must provide an integer value!');
		}
		
		$sql = MyPDO::get();
		$rq = $sql->prepare('SELECT token FROM users WHERE id=:id');
		$data = array(':id' => (int)$id);
		$rq->execute($data);
		
		if( $rq->rowCount() != 0)
		{
			$row = $rq->fetch();
			$str = (string)$row['token'];
			
			if( $token == $str )
				return true;
		}
		return false;
	}
	
	/**
	 * Met à jour le token nouvellement généré dans la bdd de la connexion actuelle.
	 * @param String token
	 * @param int id
	 * @return true or false
	 */
	private static function updateToken( $token, $id ) {
		$sql = MyPDO::get();
		$rq = $sql->prepare('UPDATE users SET token=:token WHERE id=:id');
        $data = array(':id' => $id, ':token' => $token);
	
		if( !$rq->execute($data) )
			return false;
		else
			return true;
	}
}
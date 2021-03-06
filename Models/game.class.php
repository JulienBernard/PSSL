<?php

class Game
{
	private $_id;
	private $_pageId;
	private $_name;
	private $_pitch;
	private $_players;
	private $_image;
	private $_valide;
	
	/* Constructeur de la classe */
	public function __construct( $id )
	{
		/*  L'id 0 est accepté comme valeur de "page non trouvée".
			Il faut penser à insérer une fausse page avec l'id 0 ! */
		if( $id !== 0 && !filter_var($id, FILTER_VALIDATE_INT) ) {
			throw new Exception('You must provide an integer value!');
		}
		$sqlData = $this->getGameData( $id );
		$this->_id = $sqlData['id'];
		$this->_pageId = $sqlData['pageId'];
		$this->_name = $sqlData['name'];
		$this->_pitch = $sqlData['pitch'];
		$this->_players = $sqlData['players'];
		$this->_image = $sqlData['image'];
		$this->_valide = $sqlData['valide'];
	}
	
	public function getId()
	{
		return $this->_id;
	}
	public function getPageId()
	{
		return $this->_pageId;
	}
	public function getName()
	{
		return $this->_name;
	}
	public function getPitch()
	{
		return $this->_pitch;
	}
	public function getPlayers()
	{
		return $this->_players;
	}
	public function getImage()
	{
		return $this->_image;
	}
	public function getValide()
	{
		return $this->_valide;
	}
	
	/**
	 * Recupère les données d'un jeu depuis la base de données.
	 * @param int gameId
	 * @return array or 0 (error)
	 */
	private function getGameData( $gameId ) {
		
		/* Validation des paramètres */
		if( !is_numeric($gameId) || $gameId < 0 )
			return false;
		
		$sql = MyPDO::get();

		$rq = $sql->prepare('SELECT * FROM mod_games WHERE id=:gameId');
        $data = array(':gameId' => $gameId );
		$rq->execute($data);
		
		if( $rq->rowCount() == 0 ) return 0;
		$row = $rq->fetch();
		return $row;
	}
	
	/** Récupère une liste des jeux (selon $size [DEFAUT : 10])
	 * @param int $size				:	taille de la liste (plus elle est grande, plus la requête sera longue à effectuer !)
	 * @param int $startPosition	:	position de départ
	 * @param int $userId			:	id de l'utilisateur
	 * @param boolean $list			:	si true, affiche la liste des jeux de l'utilisateur, sinon ce qu'il n'a pas !
	 */
	public static function getGamesList( $startPosition = 0, $size = 10, $userId, $list = false ) {
		$sql = MyPDO::get();

		/* On selectionne les jeux valides et appartenant au joueur. */
		if( $list == true && $userId != 0 ) {
			$rq = $sql->prepare('
				SELECT *
				FROM mod_games
				JOIN user_to_game ON user_to_game.userId=:userId
				WHERE valide=:true
				AND user_to_game.gameId=mod_games.id
				ORDER BY mod_games.id DESC
			');
			$rq->bindValue('userId', (int)$userId, PDO::PARAM_INT);
			$rq->bindValue('true', (int)1, PDO::PARAM_INT);
			$rq->execute() or die(print_r($rq->errorInfo()));
			
			while( $row = $rq->fetch() )
				$array[] = $row;
		}
		else if( $list == false && $userId != 0 ) {
			$rq = $sql->prepare('
				SELECT *
				FROM mod_games
				JOIN user_to_game ON user_to_game.userId=:userId
				WHERE valide=:true
				AND user_to_game.gameId!=mod_games.id
				ORDER BY mod_games.id DESC
			');
			$rq->bindValue('userId', (int)$userId, PDO::PARAM_INT);
			$rq->bindValue('true', (int)1, PDO::PARAM_INT);
			$rq->execute() or die(print_r($rq->errorInfo()));
			
			while( $row = $rq->fetch() )
				$array[] = $row;
		}
		/* admin */
		else if( $list == true && $userId == 0 ) {
			$rq = $sql->prepare('
				SELECT *
				FROM mod_games
				ORDER BY mod_games.id DESC
			');
			$rq->execute() or die(print_r($rq->errorInfo()));
			
			while( $row = $rq->fetch() )
				$array[] = $row;
		}
		else if( $list == false && $userId == 0 ) {
			$rq = $sql->prepare('
				SELECT *
				FROM mod_games
				WHERE valide=:true
				ORDER BY mod_games.id DESC
			');
			$rq->bindValue('true', (int)1, PDO::PARAM_INT);
			$rq->execute() or die(print_r($rq->errorInfo()));
			
			while( $row = $rq->fetch() )
				$array[] = $row;
		}
		/* On selectionne les jeux valides et qui n'appartiennent pas au joueur. */
		else if( $startPosition == 0 )
		{
			$rq = $sql->prepare('
				SELECT *
				FROM mod_games
				WHERE valide=:true
				AND mod_games.id > (SELECT AVG(id) FROM mod_games JOIN user_to_game ON user_to_game.gameId!=mod_games.id)
				ORDER BY mod_games.id DESC
				LIMIT :startPosition, :size
			');
			$rq->bindValue('startPosition', (int)$startPosition, PDO::PARAM_INT);
			$rq->bindValue('size', (int)$size, PDO::PARAM_INT);
			$rq->bindValue('true', (int)1, PDO::PARAM_INT);
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
					FROM mod_games
					WHERE valide=:true
					ORDER BY mod_games.id DESC
					LIMIT :startPosition, :size
				');
				$rq->bindValue('startPosition', (int)$startPosition, PDO::PARAM_INT);
				$rq->bindValue('size', (int)$size, PDO::PARAM_INT);
				$rq->bindValue('true', (int)1, PDO::PARAM_INT);
				$rq->execute() or die(print_r($rq->errorInfo()));
				
				$array = array();
				while( $row = $rq->fetch() )
					$array[] = $row;
			}
		}
		else {
			$rq = $sql->prepare('
				SELECT *
					FROM mod_games
					JOIN user_to_game ON user_to_game.userId=:userId
					WHERE valide=:true
					AND user_to_game.gameId!=mod_games.id
					ORDER BY mod_games.id DESC
					LIMIT :startPosition, :size
			');
			$rq->bindValue('userId', (int)$userId, PDO::PARAM_INT);
			$rq->bindValue('startPosition', (int)$startPosition, PDO::PARAM_INT);
			$rq->bindValue('size', (int)$size, PDO::PARAM_INT);
			$rq->bindValue('true', (int)1, PDO::PARAM_INT);
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
	
	/** Fonction qui ajoute un jeu dans la base de données.
		*@param string $name	:	nom du jeu
		Retourne 1 si valide, 0 si non
	*/
	public static function addGame( $name, $userId )
	{
		/* Validation des paramètres */
		if( !is_string($name) || !is_numeric($userId) )
			return false;
			
		$sql = MyPDO::get();
		$req = $sql->prepare('INSERT INTO mod_games VALUES("", :pageId, :name, :pitch, :players, :image, :valide)');
		$result = $req->execute( array(
			':pageId' => (int)999999+$userId,	// Une seule proposition par joueur en même temps
			':name' => (String)$name,			// Nom unique
			':pitch' => (String)"Description à venir",
			':players' => (String)"1v1",
			':image' => (String)"lol.jpeg",
			':valide' => (int)0
			));
		// Si PDO renvoie une erreur
		if( !$result )
			return 0;
		else
			return 1;
	}
	
	/** Fonction qui ajoute un jeu à la liste de jeu de l'utilisateur dans la base de données.
		*@param int $gameId	:	id du jeu (table mod_games)
		*@param int $level	:	niveau de l'utilisateur sur ce jeu
		*@param int $userId	:	id de l'utilisateur
		Retourne 1 si valide, 0 si non
	*/
	public static function addGameToUserList( $gameId, $level, $userId )
	{
		/* Validation des paramètres */
		if( !is_numeric($gameId) || !is_numeric($level) || !is_numeric($userId) )
			return false;
			
		$sql = MyPDO::get();
		$req = $sql->prepare('INSERT INTO user_to_game VALUES(:userId, :gameId, :level)');
		$result = $req->execute( array(
			':userId' => (int)$userId,
			':gameId' => (int)$gameId,
			':level' => (int)$level
			));
		// Si PDO renvoie une erreur
		if( !$result )
			return 0;
		else
			return 1;
	}
	
	/** Fonction qui modifie un jeu dans la base de données.
		*@param int $id			:	id du jeu
		*@param int $pageId		:	id de la fiche du jeu
		*@param String $name	:	nom du jeu
		*@param String $pitch	:	courte description
		*@param String $players	:	1v1, 2v2, 3v3 etc.
		*@param String $image	:	nom de l'image dans le dossier /img
		*@param int $valide		:	si tout est remplis, fiche valide !
		Retourne 1 si valide, 0 si non
	*/
	public static function updateGame( $id, $pageId, $name, $pitch, $players, $image, $valide )
	{
		/* Validation des paramètres */
		if( !is_numeric($id) || !is_numeric($pageId) || !is_string($name) || !is_string($pitch) || !is_string($players) || !is_string($image) )
			return false;
			
		if( $valide == "true" )
			$valide = 1;
		else
			$valide = 0;
			
		$sql = MyPDO::get();
		$req = $sql->prepare('UPDATE mod_games SET pageId=:pageId, name=:name, pitch=:pitch, players=:players, image=:image, valide=:valide WHERE id=:id');
		$result = $req->execute( array(
			':pageId' => (int)$pageId,
			':name' => (String)$name,
			':pitch' => (String)$pitch,
			':players' => (String)$players,
			':image' => (String)$image,
			':valide' => (string)$valide,
			':id' => (int)$id
			));
		// Si PDO renvoie une erreur
		if( !$result )
			return 0;
		else
			return 1;
	}
	
	/** Retourne le nombre de jeux
	 * @param int $valide	:	le jeu est a t'il été validé ?
	 */
	public static function countGames( $valide = null ) {
		
		$sql = MyPDO::get();
		if( $valide === null )
		{
			$req = $sql->prepare('SELECT id FROM mod_games');
			$req->execute();
			return $req->rowCount();
		}
		else if( $valide === 1 || $valide === 0 )
		{
			$req = $sql->prepare('SELECT id, valide FROM mod_games WHERE valide=:valide');
			$req->execute(array(':valide' => $valide));
			return $req->rowCount();
		}
		return 0;
	}
}
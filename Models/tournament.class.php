<?php

class Tournament
{
	private $_id;
	private $_gameId;
	private $_name;
	private $_valide;
	
	/* Constructeur de la classe */
	public function __construct( $id )
	{
		/*  L'id 0 est accepté comme valeur de "page non trouvée".
			Il faut penser à insérer une fausse page avec l'id 0 ! */
		if( $id !== 0 && !filter_var($id, FILTER_VALIDATE_INT) ) {
			throw new Exception('You must provide an integer value!');
		}
		$sqlData = $this->getTournamentData( $id );
		$this->_id = $sqlData['id'];
		$this->_gameId = $sqlData['gameId'];
		$this->_name = $sqlData['title'];
		$this->_valide = $sqlData['valide'];
	}
	
	public function getId()
	{
		return $this->_id;
	}
	public function getGameId()
	{
		return $this->_gameId;
	}
	public function getName()
	{
		return $this->_name;
	}
	public function getValide()
	{
		return $this->_valide;
	}
	
	/**
	 * Recupère les données d'un jeu depuis la base de données.
	 * @param int gameId	:	id du jeu du tournois
	 * @return array or 0 (error)
	 */
	private function getTournamentData( $id ) {
		
		/* Validation des paramètres */
		if( !is_numeric($id) || $id < 0 )
			return false;
		
		$sql = MyPDO::get();

		$rq = $sql->prepare('SELECT * FROM mod_tournaments WHERE id=:id');
        $data = array(':id' => $id );
		$rq->execute($data);
		
		if( $rq->rowCount() == 0 ) throw new Exception('An hugh error was catch: impossible to get data from this tournament!');
		$row = $rq->fetch();
		return $row;
	}
	
	/** Récupère une liste des jeux (selon $size [DEFAUT : 10])
	 * @param int $size				:	taille de la liste (plus elle est grande, plus la requête sera longue à effectuer !)
	 * @param int $startPosition	:	position de départ
	 * @param int $userId			:	id de l'utilisateur
	 * @param boolean $list			:	si true, affiche la liste des jeux de l'utilisateur, sinon ce qu'il n'a pas !
	 */
	public static function getTournamentsList( $startPosition = 0, $size = 10, $userId, $list = false ) {
		$sql = MyPDO::get();

		/* On selectionne les jeux valides et appartenant au joueur. */
		if( $list == true && $userId != 0 ) {
			$rq = $sql->prepare('
				SELECT *
				FROM mod_tournaments
				JOIN user_to_tournament ON user_to_tournament.userId=:userId
				WHERE valide=:true
				AND user_to_tournament.tournamentId=mod_tournaments.gameId
				ORDER BY mod_tournaments.id DESC
			');
			$rq->bindValue('userId', (int)$userId, PDO::PARAM_INT);
			$rq->bindValue('true', (int)1, PDO::PARAM_INT);
			$rq->execute() or die(print_r($rq->errorInfo()));
			
			while( $row = $rq->fetch() )
				$array[] = $row;
		}
		else if( $list == true && $userId == 0 ) {
			$rq = $sql->prepare('
				SELECT mod_games.name, mod_games.pageId, mod_tournaments.id, mod_tournaments.gameId, mod_tournaments.title, mod_tournaments.valide
				FROM mod_tournaments
				JOIN mod_games ON mod_games.id=mod_tournaments.gameId
				ORDER BY mod_tournaments.id DESC
			');
			$rq->execute() or die(print_r($rq->errorInfo()));
			
			while( $row = $rq->fetch() )
				$array[] = $row;
		}
		else if( $list == false && $userId == 0 )
		{
			$rq = $sql->prepare('
				SELECT mod_games.name, mod_games.pageId, mod_tournaments.id, mod_tournaments.gameId, mod_tournaments.title, mod_tournaments.valide
				FROM mod_tournaments
				JOIN mod_games ON mod_games.id=mod_tournaments.gameId
				ORDER BY mod_tournaments.id DESC
			');
			$rq->execute() or die(print_r($rq->errorInfo()));
			
			while( $row = $rq->fetch() )
				$array[] = $row;
		}
		/* On selectionne les jeux valides et qui n'appartiennent pas au joueur. */
		else if( $startPosition == 0 )
		{
			$rq = $sql->prepare('
				SELECT *
				FROM mod_tournaments
				WHERE valide=:true
				AND mod_tournaments.gameId > (SELECT AVG(id) FROM mod_tournaments JOIN user_to_tournament ON user_to_tournament.tournamentId=mod_tournaments.gameId)
				ORDER BY mod_tournaments.id DESC
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
					FROM mod_tournaments
					WHERE valide=:true
					AND mod_tournaments.gameId!=(SELECT TournamentId FROM user_to_tournament WHERE user_to_tournament.tournamentId=mod_tournaments.gameId)
					ORDER BY mod_tournaments.id DESC
					LIMIT :startPosition, :size
				');
				$rq->bindValue('startPosition', (int)$startPosition, PDO::PARAM_INT);
				$rq->bindValue('size', (int)$size, PDO::PARAM_INT);
				$rq->bindValue('true', (int)1, PDO::PARAM_INT);
				$rq->execute() or die(print_r($rq->errorInfo()));
				
				while( $row = $rq->fetch() )
					$array[] = $row;
			}
		}
		else {
			$rq = $sql->prepare('
				SELECT *
					FROM mod_tournaments
					JOIN user_to_tournament ON user_to_tournament.userId=:userId
					WHERE valide=:true
					AND user_to_tournament.tournamentId!=mod_tournaments.gameId
					ORDER BY mod_tournaments.id DESC
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
		*@param string $name	:	nom du tournois
		Retourne 1 si valide, 0 si non
	*/
	public static function addTournament( $name, $gameId )
	{
		/* Validation des paramètres */
		if( !is_string($name) || !is_numeric($gameId) )
			return false;
			
		$sql = MyPDO::get();
		$req = $sql->prepare('INSERT INTO mod_tournaments VALUES("", :gameId, :name, :valide)');
		$result = $req->execute( array(
			':gameId' => (int)$gameId,
			':name' => (String)$name,
			':valide' => (int)0
			));
		// Si PDO renvoie une erreur
		if( !$result )
			return 0;
		else
			return 1;
	}
	
	/** Fonction qui lie un joueur à un tournoi.
		*@param int $gameId	:	id du jeu (table mod_tournaments)
		*@param int $team	:	equipe du joueur s'il en a une
		*@param int $userId	:	id de l'utilisateur
		Retourne 1 si valide, 0 si non
	*/
	public static function addTournamentToUserList( $gameId, $team, $userId )
	{
		/* Validation des paramètres */
		if( !is_numeric($gameId) || !is_numeric($level) || !is_numeric($userId) )
			return false;
			
		$sql = MyPDO::get();
		$req = $sql->prepare('INSERT INTO user_to_tournament VALUES("", :userId, :gameId, :team)');
		$result = $req->execute( array(
			':userId' => (int)$userId,
			':gameId' => (int)$gameId,
			':team' => (String)$team
			));
		// Si PDO renvoie une erreur
		if( !$result )
			return 0;
		else
			return 1;
	}
	
	/** Fonction qui modifie un tournoi dans la base de données.
		*@param int $id			:	id du tournois
		*@param int $gameId		:	id du jeu du tournoi
		*@param String $name	:	nom du tournoi
		*@param int $valide		:	si tout est remplis, fiche valide !
		Retourne 1 si valide, 0 si non
	*/
	public static function updateTournament( $id, $gameId, $name, $valide )
	{
		/* Validation des paramètres */
		if( !is_numeric($gameId) || !is_string($name) )
			return false;
			
		if( $valide == "true" )
			$valide = 1;
		else
			$valide = 0;
			
		$sql = MyPDO::get();
		$req = $sql->prepare('UPDATE mod_tournaments SET gameId=:gameId, title=:name, valide=:valide WHERE id=:id');
		$result = $req->execute( array(
			':id' => (int)$id,
			':gameId' => (int)$gameId,
			':name' => (String)$name,
			':valide' => (string)$valide
			));
		// Si PDO renvoie une erreur
		if( !$result )
			return 0;
		else
			return 1;
	}
	
	/** Retourne le nombre de tournoi
	 * @param int $valide	:	le jeu est a t'il été validé ?
	 */
	public static function countTournaments( $valide = null ) {
		
		$sql = MyPDO::get();
		if( $valide === null )
		{
			$req = $sql->prepare('SELECT id FROM mod_tournaments');
			$req->execute();
			return $req->rowCount();
		}
		else if( $valide === 1 || $valide === 0 )
		{
			$req = $sql->prepare('SELECT id, valide FROM mod_tournaments WHERE valide=:valide');
			$req->execute(array(':valide' => $valide));
			return $req->rowCount();
		}
		return 0;
	}
	
	/** Retourne le nombre de partticipant à un tournoi
	 * @param int $id	:	id du tournoi
	 */
	public static function countPlayersByTournament( $id ) {
		$sql = MyPDO::get();
		$req = $sql->prepare('SELECT id FROM user_to_tournament WHERE tournamentId=:id');
		$req->execute(array(':id' => $id));
		$req->execute();
		return $req->rowCount();
	}
}
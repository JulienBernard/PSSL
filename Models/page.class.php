<?php

class Page
{
	private $_id;
	private $_title;
	private $_text;
	private $_visible;
	
	/* Constructeur de la classe */
	public function __construct( $id )
	{
		if( !filter_var($id, FILTER_VALIDATE_INT) ) {
			throw new Exception('You must provide an integer value!');
		}
		$sqlData = $this->getPageData( $id );
		$this->_id = $sqlData['id'];
		$this->_title = $sqlData['title'];
		$this->_text = $sqlData['text'];
		$this->_visible = $sqlData['visible'];
	}
	
	public function getId()
	{
		return $this->_id;
	}
	public function getTitle()
	{
		return $this->_title;
	}
	public function getText()
	{
		return $this->_text;
	}
	public function getVisible()
	{
		return $this->_visible;
	}
	
	/**
	 * Recupère les données d'une page depuis la base de données.
	 * @param int userId
	 * @return array or 0 (error)
	 */
	private function getPageData( $pageId ) {
		
		/* Validation des paramètres */
		if( !is_numeric($pageId) || $pageId < 0 )
			return false;
		
		$sql = MyPDO::get();

		$rq = $sql->prepare('SELECT * FROM mod_pages WHERE id=:idPage');
        $data = array(':idPage' => $pageId );
		$rq->execute($data);
		
		if( $rq->rowCount() == 0 ) throw new Exception('An hugh error was catch: impossible to get data from this page!');
		$row = $rq->fetch();
		return $row;
	}
	
	/** Récupère une liste de pages (selon $size [DEFAUT : 10])
	 * @param int $size				:	taille de la liste (plus elle est grande, plus la requête sera longue à effectuer !)
	 * @param int $startPosition	:	position de départ
	 */
	public static function getPagesList( $startPosition = 0, $size = 10 ) {
		$sql = MyPDO::get();

		/* Si on arrive sur la page de classement "principale",
			on effectue une recherche sur la moitié supérieur aux nombre d'habitants
			moyen retournée par MySql [SELECT AVG(pl_population)] */
		if( $startPosition == 0 )
		{
			$rq = $sql->prepare('
				SELECT *
				FROM mod_pages
				WHERE mod_pages.id > (SELECT AVG(id) FROM mod_pages)
				ORDER BY mod_pages.id DESC
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
					FROM mod_pages
					ORDER BY mod_pages.id DESC
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
				FROM mod_pages
				ORDER BY mod_pages.id DESC
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
	 * Met à jour l'activité de la page (timestamp)
	 * @param int pageId
	 */
	public static function updateActivity( $pageId )
	{
		$newTime = time();
		$sql = MyPDO::get();

		$rq = $sql->prepare('UPDATE pages SET activity=:newTime WHERE id=:pageId');
        $data = array(':pageId' => (int)$pageId, ':newTime' => (int)$newTime );
		$rq->execute($data);
	}
	
	/** Retourne le nombre de page
	 * @param int $visibility	:	la page est telle visible ?
	 */
	public static function countPages( $visibility = null ) {
		
		$sql = MyPDO::get();
		if( $visibility != null )
		{
			$req = $sql->prepare('SELECT id FROM mod_pages');
			$req->execute();
		}
		else if( $visibility == 1 || $visibility == 0 )
		{
			$req = $sql->prepare('SELECT id, visible FROM mod_pages WHERE visible=:visibility');
			$req->execute(array(':visibility' => $visibility));
		}
		return $req->rowCount();
	}
	
	/**
	 * Vérifie si le titre est supérieur à 3 caractères et inférieur à 40.
	 * @param String title
	 */
	public static function checkTitleLength( $title, $min = 3, $max = 40 ) {
		if( strlen($title) < $min || strlen($title) > $max )
			return false;
		return true;
	}
	
		/** Fonction qui ajoute une page dans la base de données.
		*@param string $title	:	titre de la page
		*@param string $text	:	contenu de la page
		*@param string $visibility	:	statut de la page (visible, pas visible)
		*@param int $lastAutor	:	username du dernier auteur.
		Retourne 1 si valide, 0 si non
	*/
	public static function addPage( $title, $text, $visibility, $lastAuthor )
	{
		/* Validation des paramètres */
		if( !is_string($message) || !is_string($subject) || !is_string($preview) || !is_numeric($recipientId) || !is_numeric($senderId) || empty($message) || $recipientId < 0 || $senderId < 0 )
			return false;
			
		$sql = MyPDO::get();
		
		$message .= '
		
		'.$preview.'';
		
		$req = $sql->prepare('INSERT INTO communications VALUES("", :senderId, :recipientId, :subject, :message, :sendTime, :view)');
		$result = $req->execute( array(
			':senderId' => (int)$senderId,
			':recipientId' => (int)$recipientId,
			':subject' => (String)$subject,
			':message' => (String)$message,
			':sendTime' => (int)time(),
			':view' => 0
			));
		// Si PDO renvoie une erreur
		if( !$result )
			return 0;
		else
			return 1;
	}
	
}
<?php

class NextEvent
{
	private $_id;
	private $_userId;
	private $_name;
	private $_mail;
	private $_price;
	private $_present;
	
	/* Constructeur de la classe */
	public function __construct( $id )
	{
		/*  L'id 0 est accepté comme valeur de "page non trouvée".
			Il faut penser à insérer une fausse page avec l'id 0 ! */
		if( $id !== 0 && !filter_var($id, FILTER_VALIDATE_INT) ) {
			throw new Exception('You must provide an integer value!');
		}
		$sqlData = $this->getPageData( $id );
		$this->_id = $sqlData['id'];
		$this->_userId = $sqlData['userId'];
		$this->_name = $sqlData['name'];
		$this->_mail = $sqlData['mail'];
		$this->_price = $sqlData['price'];
		$this->_present = $sqlData['present'];
	}

	public function getId()
	{
		return $this->_id;
	}
	public function getUserId()
	{
		return $this->_userId;
	}
	public function getName()
	{
		return $this->_name;
	}
	public function getMail()
	{
		return $this->_mail;
	}
	public function getPrice()
	{
		return $this->_price;
	}
	public function getPresent()
	{
		return $this->_present;
	}
	
	/**
	 * Enregistre l'utilisateur pour le prochain event
	 * @param int userId
	 * @param String name
	 * @param String mail
	 * @param double price
	 * @param boolean participate
	 * return int lastInsertId	Retourne le dernier ID inséré dans la bdd, ici l'user id !
	 */
	public static function addEvent( $userId, $name, $mail, $price, $participate ) {
		/* Validation des paramètres */
		if( !is_numeric($userId) || !is_string($name) || !is_string($mail) || !is_double($price) || !is_bool($participate) || empty($name) ||  empty($userId) || empty($mail) )
			return false;
		
		$sql = MyPDO::get();
		$req = $sql->prepare('INSERT INTO next_event VALUES("", :userId, :name, :mail, :price, :participate)');
		$result = $req->execute( array(
			':userId' => $userId,
			':name' => $name,
			':mail' => $mail,
			':price' => $price,
			':participate' => $participate
		));
		
		if( $result )
			return $sql->lastInsertId();
		return 0;
	}
	
	/** Supprimer une entrée dand la bdd
	 * @param int $userId	:	id de l'utilisateur (vérification)
	 * @param int $id		:	id de la communication
	 * Retourne 1 si valide, 0 si non
	 */
	public static function deleteFromEvent( $userId )
	{
		/* Validation des paramètres */
		if( !is_numeric($userId) || $userId < 0 )
			return false;
			
		$sql = MyPDO::get();

		$rq = $sql->prepare('DELETE FROM next_event WHERE userId=:userId');
		$result = $rq->execute(array(':userId' => $userId));
		
		if( !$result )
			return 0;
		else
			return 1;
	}
	
	public static function isValidEmail( $mail ) {
		return filter_var($mail) && preg_match('/@.+\./', $mail);
	}
	
	/**
	 * Vérifie si l'utilisateur existe dans la bdd.
	 * @param int id
	 */
	public static function checkIfUserExist( $id ) {
		
		/* Validation des paramètres */
		if( !is_numeric($id) || empty($id) )
			return false;
			
		$sql = MyPDO::get();
		$rq = $sql->prepare('SELECT userId FROM next_event WHERE userId=:id');
		$data = array(':id' => (int)$id);
		$rq->execute($data);
		
		if( $rq->rowCount() != 0)
		{
			$row = $rq->fetch();
			return (int)$row['userId'];
		}
		return false;
	}
}
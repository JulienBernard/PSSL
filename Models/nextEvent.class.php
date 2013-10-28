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
	
	public static function isValidEmail( $mail ) {
		return filter_var($mail) && preg_match('/@.+\./', $mail);
	}
	
	/**
	 * Vérifie si l'utilisateur existe dans la bdd.
	 * @param int id
	 */
	public static function checkIfUserExist( $id ) {
		
		/* Validation des paramètres */
		if( !is_int($id) || empty($id) )
			return false;
			
		$sql = MyPDO::get();
		$rq = $sql->prepare('SELECT id FROM next_event WHERE userId=:id');
		$data = array(':id' => (int)$id);
		$rq->execute($data);
		
		if( $rq->rowCount() != 0)
		{
			$row = $rq->fetch();
			return (int)$row['id'];
		}
		return false;
	}
}
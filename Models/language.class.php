<?php

class Language
{
	private $_lang;
	private $_navigation;
	private $_login;
	private $_header;
	private $_error;
	private $_admin;
	private $_general;
	private $_index;
	
	public function __construct( $lang = 'fr' )
	{
		$this->_lang = $lang;
		$this->setNavigationText();
		$this->setErrorText();
		$this->setAdminText();
		$this->setLoginText();
		$this->setHeaderText();
		$this->setGeneralText();
		$this->setIndexText();
	}
	
	private function setNavigationText() {
		include('./lang/'.$this->_lang.'.php');
		$this->_navigation = $navigation;
	}
	public function getNavigationText( $str ) {
		if( array_key_exists( $str, $this->_navigation ) )
			return $this->_navigation[$str];
		else
			return "<span style='font-size: 12px;'>[Translation not found]</span>";
	}
	
	private function setErrorText() {
		include('./lang/'.$this->_lang.'.php');
		$this->_error = $error;
	}
	public function getErrorText( $str ) {
		if( array_key_exists( $str, $this->_error ) )
			return $this->_error[$str];
		else
			return "<span style='font-size: 12px;'>[Translation not found]</span>";
	}
	
	private function setAdminText() {
		include('./lang/'.$this->_lang.'.php');
		$this->_admin = $admin;
	}
	public function getAdminText( $str ) {
		if( array_key_exists( $str, $this->_admin ) )
			return $this->_admin[$str];
		else
			return "<span style='font-size: 12px;'>[Translation not found]</span>";	
	}
		
	private function setLoginText() {
		include('./lang/'.$this->_lang.'.php');
		$this->_login = $login;
	}
	public function getLoginText( $str ) {
		if( array_key_exists( $str, $this->_login ) )
			return $this->_login[$str];
		else
			return "<span style='font-size: 12px;'>[Translation not found]</span>";
	}
	
	private function setHeaderText() {
		include('./lang/'.$this->_lang.'.php');
		$this->_header = $header;
	}
	public function getHeaderText( $str ) {
		if( array_key_exists( $str, $this->_header ) )
			return $this->_header[$str];
		else
			return "<span style='font-size: 12px;'>[Translation not found]</span>";
	}
	
	private function setGeneralText() {
		include('./lang/'.$this->_lang.'.php');
		$this->_general = $general;
	}
	public function getGeneralText( $str ) {
		if( array_key_exists( $str, $this->_general ) )
			return $this->_general[$str];
		else
			return "<span style='font-size: 12px;'>[Translation not found]</span>";
	}
	
	private function setIndexText() {
		include('./lang/'.$this->_lang.'.php');
		$this->_index = $index;
	}
	public function getIndexText( $str ) {
		if( array_key_exists( $str, $this->_index ) )
			return $this->_index[$str];
		else
			return "<span style='font-size: 12px;'>[Translation not found]</span>";
	}
}
?>
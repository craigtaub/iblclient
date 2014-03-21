<?php

class IblClient_Models_Base
{
	protected $_id;
	protected $_type;

	public function __construct($array) {
		foreach ($array as $key => $value) {
			$key = "_".$key;
			if (property_exists($this, $key)) {
				$this->{$key} = $value;
			}
		}
	}
	
	public function getId() {
		return $this->_id;
	}

	public function getType() {
		return $this->_type;
	}

}
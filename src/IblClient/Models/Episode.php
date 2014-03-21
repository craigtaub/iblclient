<?php

class IblClient_Models_Episode extends IblClient_Models_Base
{
	protected $_title;
	protected $_subtitle;

	public function getTitle() {
		return $this->_title;
	}

	public function getSubtitle() {
		return $this->_subtitle;
	}

}
<?php
class IblClient_Exception_EmptyFeed extends IblClient_Exception
{
    protected $_code = 400;

    public function __construct() {
        $code = $this->_code;
        $message = "The feed is Empty";
        parent::__construct($message, $code);
    }
}

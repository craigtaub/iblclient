<?php
class IblClient_Exception_FeedClassMissing extends IblClient_Exception
{
    protected $_code = 500;

    public function __construct($feedName) {
        $code = $this->_code;
        $message = "No class defined for feed $feedName";
        parent::__construct($message, $code);
    }
}

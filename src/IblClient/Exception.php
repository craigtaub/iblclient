<?php

class IblClient_Exception extends Exception
{
    protected $_defaultCode = 500;

    public function __construct($message, $code = null) {
        if ($code == null) {
            $code = $this->_defaultCode;
        }
        parent::__construct($message, $code);
    }
}
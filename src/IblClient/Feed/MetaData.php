<?php

/**
 *  Class which describes feed metadata 
 */
class IblClient_Feed_MetaData
{
    protected $_version;
    protected $_schema;
    protected $_timestamp;

    public function __construct($json) {
    	$this->_version = $json['version'];
    	$this->_schema = $json['schema'];
    	$this->_timestamp = $json['timestamp'];
    }

    public function getVersion() {
    	return $this->_version;
    }

}
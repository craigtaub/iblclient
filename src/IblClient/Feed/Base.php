<?php
/**
 * Class which Ibl feeds extend. Constructor starts the processData method with the correct data for the feed
 */
class IblClient_Feed_Base
{
    protected $_metadata;
 
    public function __construct(array $data, IblClient_Feed_MetaData $metadata) {
        if (!$data) {
            throw new Exception();
        }
        $this->processData($data);
        $this->_metadata = $metadata;
    }
    
    public function getMetadata() {
        return $this->_metadata;
    }
}
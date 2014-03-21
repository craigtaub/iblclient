<?php
/**
 * Class which Ibl feeds extend. Constructor starts the processData method with the correct data for the feed
 */
class IblClient_Feed_Base implements IblClient_Feed_Interface
{
    protected $metadata;
 
    public function __construct(array $data, IblClient_Feed_MetaData $metadata) {
        if (!$data) {
            throw new IblClient_Exception_EmptyFeed();
        }
        $this->_metadata = $metadata;
    }

    public function getMetadata() {
        return $this->_metadata;
    }

}
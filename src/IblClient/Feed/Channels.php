<?php
/**
 * Class representing a channels feed
 */
class IblClient_Feed_Channels extends IblClient_Feed_Base implements IblClient_Feed_Interface
{
    private $_channels;
    
    protected function processData($data) {
        $this->_channels = $data;
    }
    
    public function getAll() {
        return $this->_channels;
    }
    
    public function getChannel($id) {
        foreach ($this->_channels as $channel) {
            if ($channel->id === $id) {
                return $channel;
            } 
        }
        
        return false;
    }
}
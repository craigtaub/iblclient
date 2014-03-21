<?php
/**
 * Class representing a channels feed
 */
class IblClient_Feed_Episodes extends IblClient_Feed_Base implements IblClient_Feed_Interface
{
    protected $_episodes;
    
    public function __construct(array $data, IblClient_Feed_MetaData $metadata) {
        parent::__construct($data, $metadata);
        $this->_episodes = $data;
    }
    
    public function getAll() {
        return $this->_episodes;
    }
    
    public function getEpisode($id) {
        foreach ($this->_episodes as $episode) {
            if ($episode['id'] === $id) {
                return new IblClient_Models_Episode($episode);
            } 
        }
        
        return false;
    }
}
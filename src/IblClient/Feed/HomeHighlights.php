<?php

/**
 * Class representing a highlights feed
 */
class IblClient_Feed_HomeHighlights extends IblClient_Feed_Base implements IblClient_Feed_Interface
{
    private $_elements;
    
    protected function processData($data) {
        $elements = $data->elements;
        foreach ($elements as $element) {
            switch ($element->type) {
                case "group":
                case "group_large":
                    $this->_elements[] = Group::fromIbl($element);
                    break;
                case "episode":
                case "episode_large":
                    $this->_elements[] = Episode::fromIbl($element);
                    break;
            }
        }
    }}
    
    public function getAll() {
        return $this->_elements;
    }
}
<?php

class IblClient
{

    protected $_defaultParameters = array('rights' => 'web', 
                                            'lang' => 'en', 
                                            'availability' => 'available'
                                    );

    public static function getVersion() {
        return '0.1.0';
    }

    public function fetch($feedName, $params = array()) {
        $params = $this->_prepareParams($params);
        $factory = new IblClient_Factory($params);
        $response = $factory->build($feedName);

        return $response;
    }

    public function setAPIKey($apiKey) {
        $this->_defaultParameters['api_key'] = $apiKey;
    }

    public function setLanguage($language) {
        $this->_defaultParameters['lang'] = $language;
    }

    public function getLanguage() {
        return $this->_defaultParameters['lang'];
    }

    protected function _prepareParams($params) {
        $params = array_merge($this->_defaultParameters, $params);
        ksort($params);
        return $params;
    }

}


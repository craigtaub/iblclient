<?php

class IblClient
{

    protected $_defaultParameters = array('availability' => 'all',
                                            'lang' => 'en',
                                            'rights' => 'web',
                                            'api_key' => ''
                                    );

    public static function getVersion() {
        return '0.1.0';
    }

    public function fetch($feedName) {
        $params = $this->_defaultParameters;
        $factory = new IblClient_Factory($feedName, $params);
        $response = $factory->build();

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
}


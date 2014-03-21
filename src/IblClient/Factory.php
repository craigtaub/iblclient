<?php

use Guzzle\Http\Client;

class IblClient_Factory
{
    static private $_client;
    static private $_baseUrl = 'http://open.live.bbc.co.uk';
    static private $_version = "/ibl/v1/";
    
    private $_feed;
    private $_parameters = array();

    public function __construct($feed, $parameters = array()) {
        $this->_feed = $feed;
        $this->_parameters = $parameters;
    }

    public function build() {
        $response = $this->fetch();

        $className = $this->_getClassName($response->feedname);

        if (!class_exists($className)) {
            throw new IblClient_Exception_FeedClassMissing();
        }

        return new $className($response->data, $response->metadata);    
    }
    
    public function fetch() {
        $client = self::getClient();
        $request = $client->get( self::$_version . $this->_feed, 
                                    array(), 
                                    array('query' => $this->_parameters));
        //var_dump($request->getUrl());die;
        $response = $request->send();
        $response->getBody();
        $json = $response->json();

        return (object) array(
            'feedname' => current(array_keys(array_slice($json, -1, 1))),
            'data' => array_pop($json),
            'metadata' => new IblClient_Feed_MetaData($json)
        );
    }
    
    public static function getClient() {
        if (!self::$_client) {    
            $client = new Client(self::$_baseUrl);
            self::$_client = $client;
        }
        return self::$_client;
    }
    
    private function _getClassName($feedName) {
        return 'IblClient_Feed_' . str_replace(' ', '', ucwords(str_replace('_', ' ', $feedName)));
    }
}




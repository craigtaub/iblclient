<?php

class IblClient_Factory
{
    static private $_baseUrl = 'http://open.live.bbc.co.uk/ibl/v1/';
    static private $_client;

    public function build($feed, $parameters = array()) {
        $response = self::fetch($feed, $parameters);
        
        $className = self::_getClassName($response->feedname);
        if (!class_exists($classname)) {
            throw new Exception('No class defined for feed');
        }
        
        return new $classname($response->data, $response->metadata);        
    }
    
    static public function fetch($feed, $parameters = array()) {
        $client = self::getClient();
        $request = $client->get(self::$_baseUrl . $feed, array(), array('query' => $parameters));

        $json = $request->json();

        return array(
            'feedname' => current(array_keys(array_slice($json, -1, 1))),
            'data' => array_pop($json),
            'metadata' => new IblClient_Feed_MetaData($json)
        );
    }
    
    static public function getClient() {
        if (!self::$_client) {    

            $client = new GuzzleHttp\Client();

            self::$_client = $client;
        }
        
        return self::$_client;
    }
    
    static private function _getClassName($feedName) {
        return 'IblClient_Feed_' . str_replace(' ', '', ucwords(str_replace('_', ' ', $feedName)));
    }
}




<?php

class FactoryTest extends PHPUnit_Framework_TestCase
{

    public function testBuild() {
        $params = array('rights' => 'web', 
                        'lang' => 'en', 
                        'api_key' => 'test',
                        'availability' => 'available'
                    );
        $feed  = "/categories";
        
        $factory = new IblClient_Factory();
        $response = $factory->build($feed, $params);

        $this->assertEquals('', '');
    }
}
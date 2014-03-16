<?php

class IblClientTest extends PHPUnit_Framework_TestCase
{

    public function testIblClient() {
        $client = new IblClient();
        $url = "/categories";
        $data = $client->fetch($url, $params);
        $this->assertEquals('', 'A');
    }
}
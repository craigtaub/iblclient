#PHP client library for iBL

Setup dependencies.

     composer install
     
Run Unit tests.

    ./vendor/bin/phpunit
    
Usage

        $client = new IblClient();
        $url = "";
        $params = array("api_key" => "");
        $feed_object = $client->fetch($url, $params);
  

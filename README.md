#PHP client library for iBL

Setup dependencies.

     composer install
     
Run Unit tests.

    ./vendor/bin/phpunit
    
Usage

    $client = new IblClient();
    $url = "";
    $client->setAPIKey("");
    try {
        $feedObject = $client->fetch($url);
    } catch (IblClient_Exception $e) {
        // Do something with error
    }
    echo $feedObject->getMetadata()->getVersion();
    echo $feedObject->getEpisode('b03x19tb')->getSubtitle();

  

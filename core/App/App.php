<?php 

namespace Atomic\Core\App;

class App extends Kernel
{
    /**
     * Contains instances of layers
     * classes
     * 
     * @var array
     */ 
    private $layerInstances = [];

    /**
     * @var \Atomic\Core\Server\LocalServer
     */ 
    private $localServer;

    public function __construct()
    {
        foreach($this->layers as $layerName => $layer) {
            $this->layerInstances[$layerName] = new $layer;
            $this->layerInstances[$layerName]->run();
        }

        return $this->layerInstances;
    }

    /**
     * Local server running. Connect to 
     * configured host and port in /configuration/app.php
     * file
     * 
     * @return void
     */ 
    public function runLocalServer()
    {
        $this->localServer = new $this->servers['local'];
        return $this->localServer->runServer();
    }
}
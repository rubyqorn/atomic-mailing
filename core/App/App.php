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

    public function __construct()
    {
        foreach($this->layers as $layerName => $layer) {
            $this->layerInstances[$layerName] = new $layer;
            $this->layerInstances[$layerName]->run();
        }

        return $this->layerInstances;
    }
}
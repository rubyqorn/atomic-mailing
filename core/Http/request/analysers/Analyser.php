<?php 

namespace Atomic\Core\Http\Request\Analysers;

use Atomic\Core\Routing\RouteTransformator;
use Atomic\Core\Routing\Displaying\Route\Item as Route;

abstract class Analyser 
{
    /**
     * @var \Atomic\Core\Routing\RouteTransformator
     */ 
    protected $transformator;

    /**
     * @var \Atomic\Core\Routing\Displaying\Route\Route
     */ 
    protected $route;

    public function __construct()
    {
        $this->transformator = new RouteTransformator();
        $this->route = new Route($this->transformator);
    }

    /**
     * Request analyser
     * 
     * @return bool
     */ 
    abstract public function analyze();
}
<?php 

namespace Atomic\Core\Routing;

use Atomic\Core\Routing\Handlers\RouteHandler;
use Atomic\Core\Routing\Displaying\Route\Item;
use Atomic\Core\Routing\RouteTransformator;
use Atomic\Core\IAppRunner;

class Route implements IAppRunner
{
    /**
     * @var \Atomic\Core\Routing\RouteTransformator
     */ 
    private $transformator;

    /**
     * @var \Atomic\Core\Routing\Displaying\Route\Item
     */ 
    private $routeItem;

    public function __construct()
    {
        $this->transformator = new RouteTransformator();
        $this->routeItem = new Item($this->transformator);
    }

    /**
     * Run route configurations
     * 
     * @return mixed
     */ 
    public function run()
    {
        return RouteHandler::processing($this->routeItem);
    }
}
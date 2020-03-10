<?php 

namespace Atomic\Core\Routing\Handlers;

use Atomic\Core\Routing\Interfaces\RouteHandler;
use Atomic\Core\Routing\Displaying\Route\Item;
use Atomic\Core\Exceptions\InvalidArguments;

class HandleWithoutParams implements RouteHandler
{
    /**
     * @var \Atomic\Core\Routing\Displaying\Route\Item
     */ 
    protected $route;

    /**
     * Instance of controller name
     * 
     * @var string 
     */ 
    protected $controller;

    /**
     * Action name of controller
     * 
     * @var string
     */ 
    protected $action;

    public function __construct(Item $route)
    {
        $this->route = $route;
    }

    /**
     * Validate if route parameters exists.
     * Get controller and action names and call
     * mathod of controller
     * 
     * @return mixed
     */ 
    public function handle()
    {
        if (!empty($this->route->getParameters())) {
            throw new InvalidArguments(
                'Route parameters exists. You have to use HandleWithParams class'
            );
        }

        $controller = '\Atomic\Application\Controllers\\' . $this->route->getControllerName();
        $this->controller = new $controller;
        $this->action = $this->route->getActionName();
        return call_user_func([$this->controller, $this->action]);
    }
}
<?php 

namespace Atomic\Core\Routing\Handlers;

use Atomic\Core\Routing\Interfaces\RouteHandler;
use Atomic\Core\Routing\Displaying\Route\Item;
use Atomic\Core\Exceptions\InvalidArguments;

class HandleWithParams implements RouteHandler
{
    /**
     * @var \Atomic\Core\Routing\Displaying\Route\Item
     */ 
    protected $route;

    /**
     * Instace of controller name
     * 
     * @var object
     */ 
    protected $controller;

    /**
     * Action name
     * 
     * @var string
     */ 
    protected $action;

    /**
     * Route parameters
     * 
     * @var array
     */ 
    protected $parameters = [];

    public function __construct(Item $route)
    {
        $this->route = $route;
    }

    /**
     * Check if parameters array is not empty.
     * Get route parameters, controller and 
     * action name. And call method of instance
     * 
     * @return mixed
     */ 
    public function handle()
    {      
        if (empty($this->route->getParameters())) {
            throw new InvalidArguments(
                'Route parameters doesn\'t exsists. Have to use HandleWithourParams'
            );
        }

        $controller = '\Atomic\Application\Controllers\\' . $this->route->getControllerName();
        $this->controller = new $controller;
        $this->action = $this->route->getActionName();
        $this->parameters = $this->route->getParameters();

        return call_user_func_array([$this->controller, $this->action], $this->parameters);
    }
}
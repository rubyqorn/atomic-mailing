<?php 

namespace Atomic\Core\Routing\Displaying\Route;

use Atomic\Core\Routing\RouteTransformator;

class Item
{
    /**
     * @var \Atomic\Core\Routing\RouteTransfomator
     */ 
    private $transformator;

    /**
     * @var string
     */ 
    protected $routeString;

    /**
     * Controller name
     * 
     * @var string
     */ 
    public $controller;

    /**
     * Action name of
     * controller
     * 
     * @var string 
     */ 
    public $action;

    /**
     * @var array
     */ 
    public $parameters = [];

    /**
     * HTTP method
     * 
     * @var string
     */ 
    public $method;

    /**
     * Positions of params in
     * route string
     * 
     * @var array
     */ 
    protected $paramPosition = [];

    public function __construct(RouteTransformator $transformator)
    {
        $this->transformator = $transformator;
        $this->routeString = $this->transformator->getMatchedRoute();

        $this->processing();
    }

    /**
     * Setting values for get methods
     */ 
    protected function processing()
    {
        foreach($this->transformator->buildConfiguration($this->getRouteString()) as $routeName => $routeValue) {
            $this->setControllerName($routeValue['controller']);
            $this->setActionName($routeValue['action']);
            $this->setHttpMethodName($routeValue['method']);
        }

        $this->setParameters($this->searchParam());
    }

    /**
     * Search param name in route string
     * and return positions
     * 
     * @return array
     */ 
    public function searchParam()
    {
        require '../configuration/route.php';

        foreach(array_keys($route_parameters) as $param) {
            $this->paramPosition = array_keys($this->dumpRoute(), $param);
        }

        return $this->paramPosition;
    }

    /**
     * Return route like array
     * 
     * @return array
     */ 
    public function dumpRoute()
    {
        $route = substr($this->getRouteString(), 1);
        return explode("/", $route);
    }

    /**
     * @return string
     */ 
    public function getRouteString() : string 
    {
        return $this->routeString;
    }

    /**
     * Set controller name 
     * 
     * @param string $name 
     * 
     * @return string
     */ 
    protected function setControllerName(string $name)
    {
        return $this->controller = $name;
    }

    /**
     * @return string
     */ 
    public function getControllerName() : string
    {
        return $this->controller;
    }

    /**
     * Set action name of controller
     * 
     * @param string $name 
     * 
     * @return string
     */ 
    protected function setActionName(string $name)
    {
        return $this->action = $name;
    }

    /**
     * @return string
     */ 
    public function getActionName() : string 
    {
        return $this->action;
    }

    /**
     * Get HTTP method from Item class and set it
     * for method property
     * 
     * @param string $name 
     * 
     * @return string
     */ 
    protected function setHttpMethodName(string $name) 
    {
        return $this->method = $name;
    }

    /**
     * Return HTTP method name
     * 
     * @return string
     */ 
    public function getHttpMethodName() : string 
    {
        return $this->method;
    }
 
    /**
     * Get parameters from request URI and set it
     * in parameters array
     * 
     * @param array $parameters
     * 
     * @return array 
     */ 
    protected function setParameters(array $parameters)
    {   
        $parsedRequestUri = explode('/', substr($_SERVER['REQUEST_URI'], 1));

        foreach($parameters as $param) {
            $this->parameters[] = $parsedRequestUri[$param];
        }


        return $this->parameters;
    }

    /**
     * @return array
     */ 
    public function getParameters() : array
    {
        return $this->parameters;
    }

}
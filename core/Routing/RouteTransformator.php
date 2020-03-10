<?php 

namespace Atomic\Core\Routing;

class RouteTransformator extends RouteConfigurator
{
    /**
     * Routes from file
     * 
     * @var array
     */ 
    protected $routes;

    /**
     * Route parameters
     * 
     * @var array 
     */  
    protected $configuredParameters;

    /**
     * Routes with replaced 
     * patterns
     * 
     * @var array
     */ 
    protected $parsedRoutes;

    /**
     * Matched route with URI
     * 
     * @var string
     */ 
    protected $mathchedRoute;

    /**
     * Initialize routes
     * 
     * @return array
     */ 
    private function buildConfiguration()
    {
        return $this->configurate();
    }

    /**
     * Get route configuration file where
     * contains route parameters settings
     * 
     * @return array
     */ 
    private function getRouteConfiguredParameters()
    {
        require '../configuration/route.php';
        return $route_parameters;
    }

    /**
     * Search route parameter and replace it
     * on pattern. 
     * Example: delete {id} and set ([0-9+])
     * 
     * @return array
     */ 
    protected function replaceRouteParameters()
    {
        $this->routes = $this->buildConfiguration();

        $this->configuredParameters = $this->getRouteConfiguredParameters();

        $routes = [];

        foreach ($this->configuredParameters as $param => $value) {
            foreach($this->routes as $routeName => $controller) {
                $routes[$routeName] = str_replace($param, $value, $routeName);
            }
        }

        return $routes;
    }

    /**
     * Match request URI with pattern from array
     * 
     * @return string
     */ 
    protected function matchWithRequestUri()
    {
        $this->parsedRoutes = $this->replaceRouteParameters();

        foreach($this->parsedRoutes as $route => $pattern) {
            if (preg_match("#{$pattern}#", $_SERVER['REQUEST_URI'])) {
                return $route;
            }

        }        
    }

}
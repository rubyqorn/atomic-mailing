<?php 

namespace Atomic\Core\Http;

use Atomic\Core\Http\HttpUser;
use Atomic\Core\Routing\Route;
use Atomic\Core\Http\Interfaces\Http;
use Atomic\Core\Http\Request\Request;
use Atomic\Core\Http\Response\Response;
use Atomic\Core\Http\Parser\HttpHeadersParser;
use Atomic\Core\Http\Request\Analysers\RouteAnalyzer;
use Atomic\Core\Http\Request\Analysers\MethodAnalyzer;
use Atomic\Core\Http\Request\Analysers\ControllerAnalyzer;

class HttpMiddleware 
{
    /**
     * @var \Atomic\Core\Http\Request\Request
     */ 
    protected $request;

    /**
     * @var \Atomic\Core\Http\Response\Response
     */ 
    protected $response;

    /**
     * @var \Atomic\Core\Http\ControllerAnalyzer
     */ 
    protected $controllerAnalyzer;

    /**
     * @var \Atomic\Core\Http\MethodAnalyzer
     */ 
    protected $methodAnalyzer;

    /**
     * @var \Atomic\Core\Http\RouteAnalyzer
     * */ 
    protected $routeAnalyzer;

    /**
     * Link from request string
     * 
     * @var string
     */ 
    protected $requestedResource;

    /**
     * @var \Atomic\Core\Http\Request\Request
     */ 
    protected $http;

    /**
     * @var \Atomic\Core\Http\Parser\HttpHeadersParser
     */ 
    protected $parser;

    /**
     * @var \Atomic\Core\Routing\Route
     */ 
    protected $route;

    public function __construct(string $request)
    {
        $this->requestedResource = $request;
        $this->request = new Request($this->requestedResource);
        $this->response = new Response($this->requestedResource);

        $this->routeAnalyzer = new RouteAnalyzer();
        $this->methodAnalyzer = new MethodAnalyzer();
        $this->controllerAnalyzer = new ControllerAnalyzer();
    }

    /**
     * Analyze route name, HTTP method, controller and
     * action name 
     * 
     * @return \Atomic\Core\Http\Parser\HttpHeadersParser
     */ 
    public function analyze()
    {
        if ($this->routeAnalyzer->analyze() == false) {
            return $this->response->notFound();
        }

        if ($this->methodAnalyzer->analyze() == false) {
            return $this->response->methodNotAllowed();
        }

        if ($this->controllerAnalyzer->analyze() == false) {
            return $this->response->forbidden();
        }

        $this->getParser($this->response);
        return $this;
    }

    /**
     * Give response for user
     * 
     * @return mixed
     */ 
    public function giveResponse()
    {
        return $this->getRoute()->run();
    }

    /**
     * Get route instance for page loading
     * 
     * @return \Atomic\Core\Routing\Route
     */ 
    protected function getRoute()
    {
        return $this->route = new Route();
    }

    /**
     * Get instance of HttpHeadersClass
     * 
     * @param \Atomic\Core\Http\Interfaces\Http
     * 
     * @return \Atomic\Core\Http\Parser\HttpHeadersParser
     */ 
    protected function getParser(Http $http)
    {
        $this->http = new HttpUser($http);
        $this->parser = new HttpHeadersParser($this->http);
        $this->parser->requestHeaders();
        return $this->parser;
    }

}
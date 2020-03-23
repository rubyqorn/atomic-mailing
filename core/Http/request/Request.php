<?php 

namespace Atomic\Core\Http\Request;

use Atomic\Core\Http\Interfaces\Http;
use Atomic\Core\Http\Request\Analysers\{
    ControllerAnalyzer,
    MethodAnalyzer,
    RouteAnalyzer
};

class Request implements Http
{
    /**
     * Current requested host
     * 
     * @var string
     */ 
    protected $host;

    /**
     * @var \Atomic\Core\Http\Request\Analysers\RouteAnalyzer
     */ 
    protected $routeAnalyzer;

    /**
     * @var \Atomic\Core\Http\Request\Analysers\MethodAnalyzer
     */ 
    protected $methodAnalyzer;

    /**
     * @var \Atomic\Core\Http\Request\Analysers\ControllerAnalyzer
     */ 
    protected $controllerAnalyzer;

    public function __construct(string $host)
    {
        $this->host = $host;
        $this->routeAnalyzer = new RouteAnalyzer();
        $this->methodAnalyzer = new MethodAnalyzer();
        $this->controllerAnalyzer = new ControllerAnalyzer();
    }

    /**
     * Get HTTP request header
     * 
     * @return array
     */ 
    public function getHeaders() : array
    {
        return getallheaders();
    }

    /**
     * Set HTTP headers for request
     * 
     * @param string $header 
     * @param string $value
     * 
     * @return void  
     * */ 
    public function setHeaders(string $header, string $value)
    {
        return header($header . ':' . $value);
    }
}
<?php 

namespace Atomic\Core\Http;

use Atomic\Core\Http\Interfaces\Http;

class HttpUser 
{
    /**
     * @var \Atomic\Core\Http\Interfaces\Http
     */ 
    protected $http;

    protected $headers = [];

    public function __construct(Http $http)
    {
        $this->http = $http;
        $this->headers = $this->http->getHeaders();
    }
}
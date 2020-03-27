<?php 

namespace Atomic\Core\Http;

use Atomic\Core\Http\Interfaces\Http;

class HttpUser
{
    /**
     * @var \Atomic\Core\Http\Interfaces\Http
     */ 
    protected $http;

    /**
     * List of response or request
     * HTTP headers
     * 
     * @var array
     */ 
    protected $headers = [];

    /**
     * Response HTTP headers
     * 
     * @var array
     */ 
    protected $responseHeaders = [];

    /**
     * Request HTTP headers
     * 
     * @var array
     */ 
    protected $requestHeaders = [];

    public function __construct(Http $http)
    {
        $this->http = $http;
        $this->headers = $this->http->getHeaders();
        $this->getHeaders();
    }

    /**
     * Get reesponse or request HTTP headers
     * 
     * @return array
     */ 
    public function getHeaders()
    {
        if (isset($this->headers['0'])) {
            return $this->responseHeaders = $this->headers;
        }

        return $this->requestHeaders = $this->headers;
    }
}
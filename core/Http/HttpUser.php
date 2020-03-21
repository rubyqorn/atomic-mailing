<?php 

namespace Atomic\Core\Http;

use Atomic\Core\Http\Interfaces\Http;
use Atomic\Core\Http\Parser\HttpHeadersParser;

class HttpUser 
{
    /**
     * @var \Atomic\Core\Http\Interfaces\Http
     */ 
    protected $http;

    /**
     * @var \Atomic\Core\Http\Parser\HttpHeadersParser
     */ 
    protected $parser;

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
        $this->parser = new HttpHeadersParser($this);
        
        $this->getHeaders();
    }

    public function getHeaders()
    {
        if (isset($this->headers['0'])) {
            return $this->responseHeaders = $this->headers;
        }

        return $this->requestHeaders = $this->headers;
    }
}
<?php 

namespace Atomic\Core\Http\Request;

use Atomic\Core\Http\Interfaces\Http;

class Request implements Http 
{
    /**
     * Current requested host
     * 
     * @var string
     */ 
    protected $host;

    public function __construct(string $host)
    {
        $this->host = $host;
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
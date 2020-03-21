<?php 

namespace Atomic\Core\Http\Response;

use Atomic\Core\Http\Interfaces\Http;

class Response implements Http
{
    /**
     * HTTP response host
     * 
     * @var string 
     */ 
    protected $host;

    public function __construct(string $host)
    {
        $this->host = $host;
    }

    /**
     * Get HTTP headers from response
     * 
     * @param string $host 
     * 
     * @return array
     */ 
    public function getHeaders() : array 
    {
        return get_headers($this->host, 1);
    }

    /**
     * Set HTTP headers for response
     * 
     * @param string $header 
     * @param string $value 
     * 
     * @return void
     */ 
    public function setHeaders(string $header, string $value)
    {
        return header($header . ':'. $value);
    }
}
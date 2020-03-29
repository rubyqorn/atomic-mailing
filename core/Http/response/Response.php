<?php 

namespace Atomic\Core\Http\Response;

use Atomic\Core\Http\Interfaces\Http;
use Atomic\Core\Http\Response\Codes\CodeHandler;

class Response implements Http
{
    /**
     * HTTP response host
     * 
     * @var string 
     */ 
    protected $host;

    /**
     * @var \Atomic\Core\Http\Response\Codes\CodeHandler
     */ 
    protected $codeHandler;

    public function __construct(string $host)
    {
        $this->host = $host;
        $this->codeHandler = new CodeHandler();
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

    /**
     * Set HTTP message with code in headers list
     * 
     * @param string $typeOfCode
     * @param int $code 
     * 
     * @return void
     */ 
    public function setHttpCode(string $typeOfCode, int $code)
    {
        return header($this->codeHandler->handle($typeOfCode, $code));
    }
}
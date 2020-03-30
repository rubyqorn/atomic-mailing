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

    /**
     * Session array
     * 
     * @var array
     */ 
    protected $session;

    /**
     * Cookie array
     * 
     * @var array
     */ 
    protected $cookie;

    public function __construct(string $host)
    {
        $this->host = $host;
        $this->codeHandler = new CodeHandler();

        $this->session = $_SESSION;
        $this->cookie = $_COOKIE;
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

    /**
     * Session setting
     * 
     * @param string $name 
     * @param mixed $value 
     * 
     * @return bool;
     */ 
    public function setSession(string $name, $value) 
    {
        return $this->session[$name] = $value;
    }

    /**
     * Return session value by name
     * 
     * @param string $sessionName
     * 
     * @return string
     */ 
    public function session(string $sessionName)
    {
        return $this->session[$sessionName];
    }

    /**
     * Cookie setting
     * 
     * @param string $name 
     * @param string $value
     * @param int $expires 
     * @param string $path 
     * @param string $domain 
     * @param bool $secure 
     * @param bool $httpOnly
     * 
     * @return bool
     */ 
    public function setCookies(
        string $name, string $value, int $expires, 
        string $path = '', string $domain = '',
        bool $secure = false, bool $httpOnly = false
    ){
        return setcookie(
            $name, $value, $expires, 
            $path, $domain, $secure, $httpOnly
        );
    }
}
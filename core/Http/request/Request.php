<?php 

namespace Atomic\Core\Http\Request;

use Atomic\Core\Http\Interfaces\Http;
use Atomic\Core\Validator\Validator;

class Request implements Http 
{
    /**
     * Current requested host
     * 
     * @var string
     */ 
    protected $host;

    /**
     * Super global array $_SERVER 
     * 
     * @var array
     */ 
    protected $server;

    /**
     * Super global array $_GET 
     * 
     * @var array
     */ 
    protected $get;

    /**
     * Super global array $_POST 
     * 
     * @var array
     */ 
    protected $post;

    /**
     * Super global array $_SESSION 
     * 
     * @var array
     */ 
    protected $session;

    /**
     * Super global array $_COOKIE 
     * 
     * @var array 
     */ 
    protected $cookie;
 
    /**
     * @var \Atomic\Core\Validator\Validator
     */ 
    private ?Validator $validator = null;

    public function __construct(string $host)
    {
        $this->host = $host;
        
        $this->server = $_SERVER;
        $this->get = $_GET;
        $this->post = $_POST;
        $this->session = $_SESSION;
        $this->cookie = $_COOKIE;

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

    /**
     * Get request Validator instance
     * 
     * @param array $fields 
     * 
     * @return \Atomic\Core\Validator\Validator
     */ 
    public function validator(array $fields) :Validator
    {
        return $this->validator = new Validator($fields);
    }

    /**
     * Validate HTTP method
     * 
     * @param string $method 
     * 
     * @return bool
     */ 
    public function validateMethod(string $method)
    {
        if ($this->server['REQUEST_METHOD'] == $method) {
            return true;
        }
    }

    /**
     * Get current URI name where was 
     * executed script 
     * 
     * @return string
     */ 
    public function currentURI()
    {
        return $this->server['REQUEST_URI'];
    }

    /**
     * Return current host and URI name
     * 
     * @return string
     */ 
    public function currentURL()
    {
        return $this->currentHost() . $this->currentURI();
    }

    /**
     * Current host name where was executed 
     * script 
     * 
     * @return string
     */ 
    public function currentHost()
    {
        return $this->server['HTTP_HOST'];
    }

    /**
     * Return GET params
     * 
     * @param string|null
     * 
     * @return string|array
     */ 
    public function get(string $getParams = null)
    {
        if ($getParams !== null) {
            return $this->get[$getParams];
        }

        return $this->get;
    }

    /**
     * Return POST params
     * 
     * @param string|null
     * 
     * @return string|array
     * */ 
    public function post(string $postParams = null)
    {
        if ($postParams !== null) {
            return $this->post[$postParams];
        }

        return $this->post;
    }

    /**
     * Get exists session value
     * 
     * @param string $sessionName 
     * 
     * @return string|null
     */ 
    public function session(string $sessionName)
    {
        if ($this->session[$sessionName]) {
            return $this->session[$sessionName];
        }
    }

    /**
     * Get cookie by name property 
     * 
     * @param string 
     * 
     * @return string|null
     */ 
    public function cookie(string $cookieName)
    {
        if ($this->cookie[$cookieName]) {
            return $this->cookie[$cookieName];
        }
    }
}
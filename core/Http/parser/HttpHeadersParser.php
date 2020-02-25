<?php 

namespace Atomic\Core\Http\Parser;

use Atomic\Core\Http\HttpUser;

class HttpHeadersParser
{
    /**
     * @var \Atomic\Core\Http\HttpUser
     */  
    private $httpUser;

    /**
     * @var array
     */ 
    protected $headers;

    /**
     * Requested host 
     * 
     * @var string
     */ 
    protected $host;

    /**
     * Status code
     * 
     * @var string
     */ 
    protected $status;

    /**
     * Using user agent
     * 
     * @var string
     */ 
    protected $userAgent;

    /**
     * @var string
     */ 
    protected $accept;

    /**
     * Accepted language
     * 
     * @var string
     */ 
    protected $lang;

    /**
     * @var string
     */ 
    protected $date;

    /**
     * Accept encoding
     * 
     * @var string
     */ 
    protected $encoding;

    /**
     * Does user want was tracked
     * 
     * @var string
     */ 
    protected $dntStatus;

    /**
     * Connection status
     * 
     * @var string
     */ 
    protected $connection;

    /**
     * Encrypted request
     * 
     * @var string
     */ 
    protected $insecureRequest;

    /**
     * @var string 
     */ 
    protected $cacheControl;

    /**
     * @var string
     */ 
    protected $contentType;

    /**
     * @var string
     */ 
    protected $cookies;

    /**
     * @var string
     */ 
    protected $expires;

    /**
     * Caching
     * 
     * @var string
     */ 
    protected $pragma;

    /**
     * @var string
     */ 
    protected $server;

    /**
     * @var string
     */ 
    protected $xssProtection;

    /**
     * @var string
     */ 
    protected $contentTypeOptions;

    /**
     * @var string
     */ 
    protected $requestId;
 
    public function __construct(HttpUser $user)
    {
        $this->httpUser = $user;
        $this->headers = $this->httpUser->getHeaders();
    }

    /**
     * Set response headers
     * 
     * @return void
     */ 
    public function responseHeaders()
    {
        if (!isset($this->headers['0'])) {
            return $this->requestHeaders();
        }

        $this->setHeader('status', $this->headers['0']);
        $this->setHeader('date', $this->headers['Date']);
        $this->setHeader('contentType', $this->headers['Content-Type']);
        $this->setHeader('cookies', $this->headers['Set-Cookie']);
        $this->setHeader('expires', $this->headers['Expires']);
        $this->setHeader('cacheControl', $this->headers['Cache-Control']);
        $this->setHeader('pragma', $this->headers['Pragma']);
        $this->setHeader('server', $this->headers['Server']);
        $this->setHeader('xssProtection', $this->headers['X-Xss-Protection']);
        $this->setHeader('contentTypeOptions', $this->headers['X-Content-Type-Options']);
        $this->setHeader('requestId', $this->headers['X-Request-ID']);
        $this->setHeader('connection', $this->headers['Connection']);
        
    }

    /**
     * Set request headers
     * 
     * @return void
     */ 
    public function requestHeaders()
    {
        if (!isset($this->headers['Host'])) {
            return $this->responseHeaders();
        }

        $this->setHeader('host', $this->headers['Host']);
        $this->setHeader('userAgent', $this->headers['User-Agent']);
        $this->setHeader('accept', $this->headers['Accept']);
        $this->setHeader('lang', $this->headers['Accept-Language']);
        $this->setHeader('encoding', $this->headers['Accept-Encoding']);
        $this->setHeader('dntStatus', $this->headers['DNT']);
        $this->setHeader('connection', $this->headers['Connection']);
        $this->setHeader('insecureRequest', $this->headers['Upgrade-Insecure-Requests']);
        $this->setHeader('cacheControl', $this->headers['Cache-Control']);


    }

    protected function setHeader(string $header, string $value) :string 
    {
        return $this->$header = $value;
    }

    public function host()
    {
        return $this->host;
    }

    public function status()
    {
        return $this->status;
    }

    public function userAgent()
    {
        return $this->userAgent;
    }

    public function accept()
    {
        return $this->accept;
    }

    public function lang()
    {
        return $this->lang;
    }

    public function encoding()
    {
        return $this->encoding;
    }

    public function dntStatus()
    {
        return $this->dntStatus;
    }

    public function insecureRequest()
    {
        return $this->insecureRequest;
    }

    public function cacheControl()
    {
        return $this->cacheControl;
    }

    public function date()
    {
        return $this->date;
    }

    public function contentType()
    {
        return $this->contentType;
    }

    public function cookies()
    {
        return $this->cookies;
    }

    public function expires()
    {
        return $this->expires;
    }

    public function pragma()
    {
        return $this->pragma;
    }

    public function server()
    {
        return $this->server;
    }

    public function xssProtection()
    {
        return $this->xssProtection;
    }

    public function xContentTypeOptions()
    {
        return $this->contentTypeOptions;
    }

    public function xRequestId()
    {
        return $this->requestId;
    }

}
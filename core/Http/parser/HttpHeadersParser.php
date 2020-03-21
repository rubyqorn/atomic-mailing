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

        foreach($this->headers as $header => $value) {
            $this->setHeader('status', $value);
            $this->setHeader('date', $value);
            $this->setHeader('contentType', $value);
            $this->setHeader('cookies', $value);
            $this->setHeader('expires', $value);
            $this->setHeader('cacheControl', $value);
            $this->setHeader('pragma', $value);
            $this->setHeader('server', $value);
            $this->setHeader('xssProtection', $value);
            $this->setHeader('contentTypeOptions', $value);
            $this->setHeader('requestId', $value);
            $this->setHeader('connection', $value);
        }
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

        foreach($this->headers as $header => $value) {
            $this->setHeader('host', $value);
            $this->setHeader('userAgent', $value);
            $this->setHeader('accept', $value);
            $this->setHeader('lang', $value);
            $this->setHeader('encoding', $value);
            $this->setHeader('dntStatus', $value);
            $this->setHeader('connection', $value);
            $this->setHeader('insecureRequest', $value);
        }
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
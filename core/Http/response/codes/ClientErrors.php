<?php 

namespace Atomic\Core\Http\Response\Codes;

use Atomic\Core\Http\Interfaces\HttpCode;

class ClientErrors implements HttpCode 
{
    private const HTTP_CODES = [
        'Bad Request' => 400,
        'Unauthorized' => 401,
        'Payment Required' => 402,
        'Forbidden' => 403,
        'Not Found' => 404,
        'Method Not Allowed' => 405,
        'Not Acceptable' => 406,
        'Proxy Authentifiaction Required' => 407,
        'Request Timeout' => 408,
        'Conflict' => 409,
        'Gone' => 410,
        'Length Required' => 411,
        'Precondition Failed' => 412,
        'Payload Too Large' => 413,
        'URI Too Long' => 414,
        'Unsupported Media Type' => 415,
        'Range Not Satisfiable' => 416,
        'Expectation Failed' => 417,
        'I\'m a teapot' => 418,
        'Misdirected Request' => 421,
        'Unprocessable Entity' => 422,
        'Locked' => 423,
        'Failed Dependency' => 424,
        'Too Early' => 425,
        'Upgrade Required' => 426,
        'Precondition Required' => 427,
        'Too Many Requests' => 428,
        'Request Header Fields Too Large' => 431,
        'Unavailable For Legal Reasons' => 451
    ];

    /**
     * State of HTTP code
     * 
     * @var bool
     */ 
    protected $doesExists = false;

    /**
     * @var string
     */ 
    protected $headerString;

    /**
     * Validate if HTTP code exists
     * 
     * @param int $httpCode 
     * 
     * @return bool
     */ 
    public function validate(int $httpCode) :bool 
    {
        foreach (array_values(self::HTTP_CODES) as $code) {
            if ($httpCode == $code) {
                return $this->doesExists = true;
            }
        }

        return $this->doesExists;
    }

    /**
     * Validate code and return HTTP string with code 
     * 
     * @param int $httpCode 
     * 
     * @return string
     */ 
    public function getHeaderString(int $httpCode) :string
    {
        if ($this->validate($httpCode)) {
            $this->headerString = array_keys(self::HTTP_CODES, $httpCode);
            return $httpCode . ' ' . $this->headerString['0'];
        }
    }
}
<?php 

namespace Atomic\Core\Http\Response\Codes;

use Atomic\Core\Http\Interfaces\HttpCode;

class ServerErrors implements HttpCode 
{
    private const HTTP_CODES = [
        'Internal Server Error' => 500,
        'Not Implemented' => 501,
        'Bad Gateway' => 502,
        'Service Unavailable' => 503,
        'Gateway Timeout' => 504,
        'HTTP Version Not Supported' => 505,
        'Variant Also Negotiates' => 506,
        'Insufficient Storage' => 507,
        'Loop Detected' => 508,
        'Not extended' => 510,
        'Network Authentifiaction Required' => 511
    ];

    /**
     * State of validated code
     * 
     * @var bool
     */ 
    protected $doesExists = false;

    /**
     * @var string
     */ 
    protected $headerString;

    /**
     * Validate if passed HTTP code exists 
     * in array codes
     * 
     * @param int $httpCode
     * 
     * @return bool 
     * */ 
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
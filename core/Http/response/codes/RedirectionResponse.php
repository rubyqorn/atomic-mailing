<?php 

namespace Atomic\Core\Http\Response\Codes;

use Atomic\Core\Http\Interfaces\HttpCode;

class RedirectionResponse implements HttpCode 
{
    private const HTTP_CODES = [
        'Multiple Choices' => 300,
        'Moved Permanently' => 301,
        'Found' => 302,
        'See other' => 303,
        'Not Modified' => 304,
        'Use Proxy' => 305,
        'Switch Proxy' => 306,
        'Temporary Redirect' => 307,
        'Permanent Redirect' => 308
    ];

    /**
     * Validate if HTTP code passed
     * into method exists in HTTP codes
     * array
     * 
     * @var bool
     */ 
    protected $doesExists = false;

    /**
     * @var string
     */ 
    protected $headerString;

    /**
     * Validate passed HTTP code with codes
     * from array
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
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
}
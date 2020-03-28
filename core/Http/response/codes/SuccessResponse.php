<?php 

namespace Atomic\Core\Http\Response\Codes;

use Atomic\Core\Http\Interfaces\HttpCode;

class SuccesResponse implements HttpCode 
{
    private const HTTP_CODES = [
        'OK' => 200, 
        'Created' => 201,
        'Accepted' => 202,
        'Non-Authoritative Information' => 203,
        'No Content' => 204,
        'Reset Content' => 205,
        'Partial Content' => 206,
        'Multi-Status' => 207,
        'Already Reported' => 208,
        'IM Used' => 226
    ];

    /**
     * Validate if HTTP code exists
     * 
     * @var bool
     */ 
    protected $doesExists = false;

    /**
     * Validate HTTP codes in array codes
     * 
     * @param int $httpCode
     * 
     * @return bool
     */ 
    public function validate(int $httpCode) :bool 
    {   
        foreach(array_values(self::HTTP_CODES) as $code) {
            if ($httpCode == $code) {
                return $this->doesExists = true;
            }
        }

        return $this->doesExists;
    }
}
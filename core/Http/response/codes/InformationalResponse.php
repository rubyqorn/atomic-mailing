<?php 

namespace Atomic\Core\Http\Response\Codes;

use Atomic\Core\Http\Interfaces\HttpCode;

class InformationalResponse implements HttpCode
{
    private const HTTP_CODES = [
        'Continue' => 100,
        'Switching Protocols' => 101,
        'Processing' => 102,
        'Early Hints' => 103,
    ];

    /**
     * Check if HTTP code 
     * exists and if its not
     * get false value
     * 
     * @var bool
     */ 
    protected $doesExists = false;

    /**
     * Validate HTTP code in codes array
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
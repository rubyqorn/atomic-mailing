<?php 

namespace Atomic\Core\Http\Interfaces;

interface HttpCode
{
    /**
     * HTTP codes validator
     * 
     * @param int $httpCode 
     * 
     * @return bool
     */ 
    public function validate(int $httpCode) :bool;

    /**
     * Get HTTP string for setting in header() function
     * 
     * @param int $httpCode
     * 
     * @return string 
     */ 
    public function getHeaderString(int $httpCode) :string; 
}

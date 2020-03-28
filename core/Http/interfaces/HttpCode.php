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
}

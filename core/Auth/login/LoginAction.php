<?php 

namespace Atomic\Core\Auth\Login;

use Atomic\Core\Auth\Interfaces\{
    Process,
    RequestProcessing
};

class LoginAction implements Process
{
    /**
     * @var \Atomic\Core\Auth\Interfaces\RequestProcessing|null
     */ 
    protected ?RequestProcessing $processor = null;

    /**
     * Get instance of LoginRequestProcessor
     * 
     * @return \Atomic\Core\Auth\Interfaces\RequestProcessing
     */ 
    public function getProcessor() :RequestProcessing
    {
        return new LoginRequestProcessor();
    }
}
<?php 

namespace Atomic\Core\Auth\Register;

use Atomic\Core\Auth\Interfaces\{
    Process,
    RequestProcessing
};

class RegisterAction implements Process
{
    /**
     * @var \Atomic\Core\Auth\Interfaces\RequestProcessing|null
     */ 
    protected ?RequestProcessing $processor = null;

    /**
     * Get instance of RegisterRequestProcessor
     * 
     * @param \Atomic\Core\Auth\Interfaces\RequestProcessing $processor
     * 
     * @return \Atomic\Core\Auth\Interfaces\RequestProcessing
     */ 
    public function getProcessor(RequestProcessing $processor) :RequestProcessing
    {
        return new RegisterRequestProcessor();
    }
}
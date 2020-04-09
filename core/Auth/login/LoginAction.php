<?php 

namespace Atomic\Core\Auth\Login;

use Atomic\Core\Http\Request\Request;
use Atomic\Core\Exeptions\InvalidArguments;
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

    /**
     * Login process handling
     * 
     * @param \Atomic\Core\Http\Request\Request $request 
     * @param array $rules 
     * 
     * @return array|\Atomic\Core\Auth\Interfaces\Process
     */ 
    public function handle(Request $request, array $rules)
    {
        //
    }
}
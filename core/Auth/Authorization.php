<?php 

namespace Atomic\Core\Auth;

use Atomic\Core\Auth\Interfaces\Auth;
use Atomic\Core\Http\Request\Request;
use Atomic\Core\Http\Response\Response;
use Atomic\Core\Auth\Register\RegisterAction;
use Atomic\Core\Auth\Login\LoginAction;

class Authorization extends AuthEntity implements Auth
{
    public function __construct(Request $request, Response $response)
    {
        parent::__construct($request, $response);
    }

    /**
     * Get instance of LoginAction class 
     * 
     * @return \Atomic\Core\Auth\Login\LoginAction
     */ 
    public function login(Request $request) :LoginAction
    {
        return new LoginAction($request);
    }

    /**
     * Get Instance of RegisterAction class
     * 
     * @return \Atomic\Core\Auth\Register\RegisterAction
     */ 
    public function register(Request $request) :RegisterAction
    {
        return new RegisterAction($request);
    }
}
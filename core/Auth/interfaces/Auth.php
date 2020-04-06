<?php 

namespace Atomic\Core\Auth\Interfaces;

use Atomic\Core\Auth\Login\LoginAction;
use Atomic\Core\Auth\Register\RegisterAction;

interface Auth
{
    /**
     * Return instance of LoginAction class
     * 
     * @return \Atomic\Core\Auth\Login\LoginAction
     */ 
    public function login() :LoginAction;

    /**
     * Return instance of RegisterAction class
     * 
     * @return \Atomic\Core\Auth\Register\RegisterAction
     */ 
    public function register() :RegisterAction;
}
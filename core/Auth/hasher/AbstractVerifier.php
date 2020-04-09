<?php 

namespace Atomic\Core\Auth\Hasher;

use Atomic\Core\Auth\Hasher\Interfaces\PasswordManipulation;
use Atomic\Core\Http\Request\Request;

abstract class AbstractVerifier implements PasswordManipulation
{
    /**
     * Verify password hash by password_verify function
     * 
     * @param string $password 
     * 
     * @return string
     */ 
    public function manipulate(string $password) :string
    {
        $request = new Request($_SERVER['REQUEST_URI']);

        return password_verify($this->getRequest($request), $password);
    }

    /**
     * @return \Atomic\Core\http\Request\Request $request
     */ 
    public function getRequest(Request $request)
    {
        return $request->post('password');
    }
}
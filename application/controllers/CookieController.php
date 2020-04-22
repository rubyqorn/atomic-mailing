<?php 

namespace Atomic\Application\Controllers;

class CookieController extends Controller 
{
    /**
     * Check if cookie exists and redirect user if
     * not exists or return true
     * 
     * @param string $name 
     * 
     * @return void|bool
     */ 
    public static function check(string $name)
    {
        $controller = new self;
        $cookie = $controller->request->cookie($name);

        if (!isset($cookie)) {
            return false;
        }

        return true;
    }
}
<?php 

namespace Atomic\Application\Controllers;

class CookieController extends Controller 
{
    /**
     * Check if cookie exists and redirect user if
     * not exists or return true
     * 
     * @param string $name 
     * @param string $uri 
     * 
     * @return void|bool
     */ 
    public static function check(string $name, string $uri)
    {
        $controller = new self;
        $cookie = $controller->request->cookie($name);

        if (isset($cookie)) {
            return true;
        }

        return $controller->response->redirect($uri);
    }

    /**
     * Redirect user 
     * 
     * @param string $uri 
     * 
     * @return void
     */ 
    protected static function redirect(string $uri)
    {
        $controller = new self;

        return $controller->response->redirect($uri);
    }
}
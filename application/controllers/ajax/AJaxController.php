<?php 

namespace Atomic\Application\Controllers\Ajax;

use Atomic\Core\Http\Request\Request;
use Atomic\Core\Http\Response\Response;

class AjaxController implements AjaxMethods
{
    /**
     * Validate that the HTTP method is post and
     * return data
     * 
     * @param \Atomic\Core\Http\Request\Request $request 
     * 
     * @return array
     */ 
    public static function getData(Request $request) :array
    {
        if ($request->validateMethod('POST')) {     
            return $request->post();
        }
    }
}
<?php 

namespace Atomic\Application\Controllers\Ajax;

use Atomic\Core\Http\Request\Request;

interface AjaxMethods 
{
    /**
     * Get data without reloading page 
     * 
     * @param \Atomic\Core\Http\Request\Request $request
     * @return array
     */ 
    public static function getData(Request $request) :array;
}
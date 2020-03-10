<?php 

namespace Atomic\Core\Routing\Handlers;

use Atomic\Core\Routing\Displaying\Route\Item;

class RouteHandler
{
    /**
     * Process route parameters
     * 
     * @param \Atomic\Core\Routing\Displaying\Route\Item
     * 
     * @return mixed
     */ 
    public static function processing(Item $item)
    {
        if (empty($item->getParameters())) {
            $withoutParametersHandler = new HandleWithoutParams($item);
            return $withoutParametersHandler->handle();          
        }
        
        $parametersHandler = new HandleWithParams($item);
        return $parametersHandler->handle(); 
        
    }
}
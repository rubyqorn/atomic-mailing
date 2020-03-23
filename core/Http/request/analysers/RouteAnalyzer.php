<?php 

namespace Atomic\Core\Http\Request\Analysers;

class RouteAnalyzer extends Analyser
{
    /**
     * Match requested route name and 
     * route in file
     * 
     * @return bool
     */ 
    public function analyze()
    {
        if (in_array(
            $this->transformator->getMatchedRoute(), 
            array_keys($this->transformator->routes)
        )) {
            return true;
        }
    }
}
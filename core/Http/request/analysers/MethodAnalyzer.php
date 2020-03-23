<?php 

namespace Atomic\Core\Http\Request\Analysers;

class MethodAnalyzer extends Analyser 
{
    /**
     * Analyse request method name 
     * 
     * @return bool
     */ 
    public function analyze()
    {
        if ($this->route->method == $_SERVER['REQUEST_METHOD']) {
            return true;
        }
    }
}
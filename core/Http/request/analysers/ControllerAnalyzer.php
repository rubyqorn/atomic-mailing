<?php 

namespace Atomic\Core\Http\Request\Analysers;

class ControllerAnalyzer extends Analyser 
{
    /**
     * Namespace string of 
     * controller name
     * 
     * @var string
     */ 
    private const CONTROLLER_NAMESPACE = '\Atomic\Application\Controllers\\';

    /**
     * @var string|object
     */ 
    protected $controller;

    /**
     * Checking controller and action 
     * exists
     * 
     * @return bool
     */ 
    public function analyze()
    {
        $this->controller = self::CONTROLLER_NAMESPACE . $this->route->controller;

        if (!class_exists($this->controller)) {
            return false;
        }

        $this->controller = new $this->controller;

        if (method_exists($this->controller, $this->route->action)) {
            return true;
        }
    }
}
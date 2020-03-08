<?php 

namespace Atomic\Core\Routing;

use Atomic\Core\Routing\Displaying\YamlRouteFormat;
use Atomic\Core\Routing\Interfaces\RouteBuilder;

class YamlRouteBuilder extends YamlRouteFormat implements RouteBuilder
{
    /**
     * Extracted routes using
     * class Extractor
     * 
     * @var array
     */ 
    protected $extractedRoutes = [];
    
    /**
     * @var \Atomic\Core\Routing\Extractor
     */ 
    protected $extractor;

    public function __construct(string $file)
    {
        parent::__construct($file);

        $this->extractor = new Extractor($file);
    }

    /**
     * Check file extension and return 
     * extracted routes
     * 
     * @return array
     */ 
    public function build() : array
    {
        if ($this->is() == true) {
            $this->extractedRoutes = $this->extractor::extract();

            return $this->extractedRoutes;
        }
        
    }
}
<?php 

namespace Atomic\Core\Routing;

use Atomic\Core\Routing\Displaying\JsonRouteFormat;
use Atomic\Core\Routing\Interfaces\RouteBuilder;

class JsonRouteBuilder extends JsonRouteFormat implements RouteBuilder 
{
    /**
     * Routes from routes.js
     * file like array fromat
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
     * Validate format of routes.json file
     * and extract it
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
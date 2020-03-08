<?php 

namespace Atomic\Core\Routing;

class RouteConfigurator
{
    /**
     * @var \Atomic\Core\Routing\YamlRouteBuilder
     */ 
    protected $yamlBuilder;

    /**
     * @var \Atomic\Core\Routing\JsonRouteBuilder
     */ 
    protected $jsonBuilder;

    /**
     * @var string
     */ 
    protected $extensionName;

    /**
     * Return an array of routes by configured
     * extension name in route configuration
     * file
     * 
     * @return array|string
     */ 
    public function configurate()
    {
        require '../configuration/route.php';

        $this->extensionName = $extension['extension_name'];

        switch($this->extensionName) {
            case 'yml': 
                $this->yamlBuilder = new YamlRouteBuilder('../routes/routes.yml');
                return $this->yamlBuilder->build();
            break;

            case 'json': 
                $this->jsonBuilder = new JsonRouteBuilder('../routes/routes.json');
                return $this->jsonBuilder->build();
            break;

            default:
                return $this->extensionName;
            break;
        }
    }

}
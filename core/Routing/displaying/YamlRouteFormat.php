<?php 

namespace Atomic\Core\Routing\Displaying;

use Atomic\Core\Routing\Intefaces\IsYamlAble;
use Atomic\Core\Exceptions\InvalidArguments;

class YamlRouteFormat implements IsYamlAble 
{
    /**
     * YAML file
     * 
     * @var string
     */ 
    private $file;

    /**
     * Format name
     * 
     * @var string
     */ 
    private const FORMAT = 'yml';

    public function __construct(string $yamlFile)
    {
        $this->file = $yamlFile;
    }

    /**
     * Validate file extension
     * 
     * @return bool
     * @throws \Atomic\Core\Exceptions\InvalidArguments
     */ 
    public function is() : bool 
    {
        $extension = pathinfo($this->file)['extension'];

        if ($extension == 'yml') {
            return true;
        }

        throw new InvalidArguments(
            'Invalid argument was passed into __construct method'
        );
    }
}
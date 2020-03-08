<?php 

namespace Atomic\Core\Routing\Displaying;

use Atomic\Core\Routing\Interfaces\IsJsonAble;
use Atomic\Core\Exceptions\InvalidAguments;

class JsonRouteFormat implements IsJsonAble
{
    /**
     * JSON file
     * 
     * @var string
     */ 
    protected $file;

    /**
     * Format name
     * 
     * @var string
     */ 
    private const FORMAT = 'json';

    public function __construct(string $jsonFile)
    {
        $this->file = $jsonFile;
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

        if ($extension == self::FORMAT) {
            return true;
        }

        throw new InvalidArguments(
            'Invalid argument was passed in __construct method'
        );
    }
}
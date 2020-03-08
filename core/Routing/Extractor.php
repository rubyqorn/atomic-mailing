<?php 

namespace Atomic\Core\Routing;

class Extractor
{
    /**
     * This can be file, dir 
     * and etc... 
     * 
     * @var mixed
     */ 
    protected static $resource;

    /**
     * @var string
     */ 
    protected static $content;

    public function __construct($resource)
    {
        self::$resource = $resource;
    }

    /**
     * Extract content from file
     * 
     * @return array
     */ 
    public static function extract()
    {
        self::$content = self::getContent();
        
        return yaml_parse(self::$content);
    }

    /**
     * Get content from file using
     * file_get_contents function
     * 
     * @return string
     */ 
    private static function getContent()
    {
        return file_get_contents(self::$resource);
    }
}
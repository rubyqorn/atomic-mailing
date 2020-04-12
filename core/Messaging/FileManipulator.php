<?php 

namespace Atomic\Core\Messaging;

use Atomic\Core\Messaging\Interfaces\ResourceManipulator;

class FileManipulator implements ResourceManipulator
{
    /**
     * Resource of file
     * 
     * @var resource 
     */ 
    protected $file;

    /**
     * Validate if file exists in the system
     * 
     * @param string $file 
     * 
     * @return string|bool
     */ 
    protected function isFileExists(string $file)
    {
        if (file_exists($file)) {
            return $file;
        }
    }

    /**
     * Set resource which will be used for 
     * file manipulations
     * 
     * @param string $resoruce (File name)
     * 
     * @return resource
     */ 
    public function setResource($resource) 
    {
        if($this->isFileExists($resource)){
            return $this->file = fopen($resource, 'w');
        } 
    }

    /**
     * Return resource for file manipulations
     * 
     * @param string $resource (Name of property - file)
     * 
     * @return resource
     */ 
    public function getResource($resource)
    {
        return $this->$resource;
    }

    /**
     * Write content in file
     * 
     * @param string $content 
     * 
     * @return bool
     */ 
    public function write(string $content)
    {
        return fwrite($this->getResource('file'), $content);
    }

    /**
     * Close resource connection
     * 
     * @return void
     */ 
    public function close()
    {
        return fclose($this->getResource('file'));
    }
}
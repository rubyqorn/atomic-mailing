<?php 

namespace Atomic\Core\Messaging;

use Atomic\Core\Messaging\Interfaces\ResourceManipulator;

class CURLManipulator implements ResourceManipulator
{
    /**
     * CURL resource
     * 
     * @var resource
     */ 
    protected $curl;

    /**
     * List of setted options
     * 
     * @var array
     */ 
    protected array $options = [];

    /**
     * Content from server
     * 
     * @var array
     */ 
    protected array $content = [];

    /**
     * Set CURL resource 
     * 
     * @param string $resource 
     * 
     * @return resource
     */ 
    public function setResource($resource)
    {
        return $this->curl = curl_init($resource);
    }

    /**
     * Get CURL resource
     * 
     * @param string $resource (Name of property - curl)
     * 
     * @return resource
     */ 
    public function getResource($resource)
    {
        return $this->$resource;
    }

    /**
     * Set options using curl_setopt function
     * 
     * @param array $options 
     * 
     * @return array
     */ 
    public function setOptions(array $options)
    {
        foreach($options as $key => $option) {
            $this->options[$key] = curl_setopt($this->getResource('curl'), $option['name'], $option['value']);
        }

        return $this->options;
    }

    /**
     * Get content or errors from server 
     * 
     * @return array
     */ 
    public function execute()
    {
        $this->content['errors'] = curl_error($this->getResource('curl'));
        $this->content['response'] = curl_exec($this->getResource('curl'));

        if (!empty($this->content['errors'])) {
            return $this->content['errors'];
        }

        return $this->content['response'];
    }

    /**
     * Close connection with CURL resource
     * 
     * @return void
     */ 
    public function close()
    {
        return curl_close($this->getResource('curl'));
    }
}
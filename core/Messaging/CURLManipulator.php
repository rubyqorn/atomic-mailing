<?php 

namespace Atomic\Core\Messaging;

class CURLManipulator
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

    public function __construct(string $host)
    {
        $this->curl = curl_init($host);
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
            $this->options[$key] = curl_setopt($this->curl, $option['name'], $option['value']);
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
        $this->content['errors'] = curl_error($this->curl);
        $this->content['response'] = curl_exec($this->curl);

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
        return curl_close($this->curl);
    }
}
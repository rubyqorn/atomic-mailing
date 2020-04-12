<?php 

namespace Atomic\Core\Messaging\Mail\Config;

use Atomic\Core\Messaging\Interfaces\ConfigSettingsContainer;

class MailConfigContainer implements ConfigSettingsContainer
{
    /**
     * Settings container
     * 
     * @var array
     */ 
    private array $container = [];

    /**
     * Set mail settings
     * 
     * @param string $property 
     * @param mixed $value 
     * 
     * @return void
     */ 
    public function set(string $property, $value)
    {
        return $this->container[$property] = $value;
    }

    /**
     * Get mail settings by property name
     * 
     * @param string $property 
     * 
     * @return mixed
     */ 
    public function get(string $property)
    {
        return $this->container[$property] ?? $this->container[$property];
    }

    /**
     * Delete settings from container by property
     * name 
     * 
     * @param string $property
     * 
     * @return void
     */ 
    public function drop(string $property)
    {
        unset($this->container[$property]);
    }

    /**
     * Update mail settings by property name 
     * 
     * @param string $property 
     * @param mixed $value
     * 
     * @return void
     */ 
    public function update(string $property, $value)
    {
        return $this->container[$property] ?? $this->container[$property] = $value;
    }
}
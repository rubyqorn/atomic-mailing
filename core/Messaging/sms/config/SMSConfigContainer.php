<?php 

namespace Atomic\Core\Messaging\SMS\Config;

use Atomic\Core\Messaging\Interfaces\ConfigSettingsContainer;

class SMSConfigContainer implements ConfigSettingsContainer 
{
    /**
     * Settings container
     * 
     * @var array
     */ 
    private array $container = [];

    /**
     * Set SMS settings in container
     * 
     * @param string $property 
     * @param mixed $value 
     * 
     * @return void
     */ 
    public function set(string $property, $value)
    {
        $this->container[$property] = $value;
    }

    /**
     * Get settings value by property name 
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
     * Delete SMS settings by property name
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
     * Update SMS settings by property name 
     * 
     * @param string $property 
     * @param mixed $value 
     * 
     * @return void
     */ 
    public function update(string $property, $value)
    {
        return $this->container[$property] ?? $this->property[$property] = $value;
    }
}
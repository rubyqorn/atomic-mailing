<?php 

namespace Atomic\Core\Messaging\Interfaces;

interface ConfigSettingsContainer
{
    /**
     * @param string $property 
     * @param mixed $value 
     * 
     * @return void
     */ 
    public function set(string $property, $value);

    /**
     * @param string $property 
     * 
     * @return mixed
     */ 
    public function get(string $property);

    /**
     * @param string $property 
     * 
     * @return void
     */ 
    public function drop(string $property);

    /**
     * @param string $property 
     * @param mixed $value 
     * 
     * @return void
     */ 
    public function update(string $property, $value);
}
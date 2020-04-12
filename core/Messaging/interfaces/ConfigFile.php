<?php 

namespace Atomic\Core\Messaging\Interfaces;

interface ConfigFile
{
    /**
     * @param string $configFile
     */   
    public function __construct(string $configFile);

    /**
     * @param string $file
     * @return bool
     */ 
    public function exists(string $file);

    /**
     * @param string $file 
     * @return array
     */ 
    public function parseSettings(string $file) :array;

    /**
     * @return void
     */ 
    public function setSettings();
}
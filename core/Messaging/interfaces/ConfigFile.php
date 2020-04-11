<?php 

namespace Atomic\Core\Messaging\Interfaces;

interface ConfigFile
{
    /**
     * @param string $configFile
     */   
    public function __construct(string $configFile);

    /**
     * @return bool
     */ 
    public function exists();

    /**
     * @return array
     */ 
    public function getSettings();

    /**
     * @return void
     */ 
    public function setConfigSettings();
}
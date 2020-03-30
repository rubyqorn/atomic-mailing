<?php 

namespace Atomic\Core\Messaging\Interfaces;

interface isSendAble
{
    /**
     * @param string $file
     */ 
    public function __construct(string $file);

    /**
     * Set settings in property container class
     * 
     * @return \Atomic\Core\Messaging\Interfaces\ConfigFile
     */ 
    public function setSettings() : ConfigFile;
}
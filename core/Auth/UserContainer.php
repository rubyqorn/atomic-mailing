<?php 

namespace Atomic\Core\Auth;

use Atomic\Core\Auth\Interfaces\AuthUserContainer;

abstract class UserContainer implements AuthUserContainer
{
    /**
     * Property container
     * 
     * @var array
     */ 
    private array $container = [];

    /**
     * Add new property
     * 
     * @param string $userInfo
     * @param mixed $value 
     * 
     * @return void
     */ 
    public function add(string $userInfo, $value)
    {
        return $this->container[$userInfo] = $value;
    }

    /**
     * Get property by name
     * 
     * @param string $userInfo
     * 
     * @return mixed
     */ 
    public function get(string $userInfo)
    {
        return $this->container[$userInfo];
    }

    /**
     * Update property
     * 
     * @param string $userInfo
     * @param mixed $value
     * 
     * @return void
     */ 
    public function update(string $userInfo, $value)
    {
        return $this->container[$userInfo] = $value;
    }

    /**
     * Drop property 
     * 
     * @param string $userInfo
     * 
     * @return void
     */ 
    public function drop(string $userInfo)
    {
        unset($this->container[$userInfo]);
    }
}
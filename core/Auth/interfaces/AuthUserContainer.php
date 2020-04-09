<?php 

namespace Atomic\Core\Auth\Interfaces;

interface AuthUserContainer
{
    /**
     * @param string $userInfo 
     * @param mixed $value 
     * @return void
     */ 
    public function add(string $userInfo, $value);

    /**
     * @param string $userInfo
     * @return mixed
     */ 
    public function get(string $userInfo);

    /**
     * @param string $userInfo
     * @return void 
     */  
    public function drop(string $userInfo);

    /**
     * @param string $userInfo
     * @param mixed $value 
     * @return void
     */ 
    public function update(string $userInfo, $value);
}
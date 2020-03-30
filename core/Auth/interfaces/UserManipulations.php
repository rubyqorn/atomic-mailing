<?php 

namespace Atomic\Core\Auth\Interfaces;

interface UserManipulations
{
    /**
     * UserManipulations constructor
     * 
     * @param string $email 
     */ 
    public function __construct(string $email);

    /**
     * Get user info by email 
     * 
     * @return array
     */ 
    public function getUserInfo();

    /**
     * Validate user info
     * 
     * @return bool
     */ 
    public function checkUserInfo();
}
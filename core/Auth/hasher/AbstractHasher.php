<?php 

namespace Atomic\Core\Auth\Hasher;

use Atomic\Core\Auth\Hasher\Interfaces\PasswordManipulation;

abstract class AbstractHasher implements PasswordManipulation
{
    /**
     * Crypt passed password 
     * 
     * @param string $password 
     * 
     * @return string
     */ 
    public function manipulate(string $password) :string
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

}
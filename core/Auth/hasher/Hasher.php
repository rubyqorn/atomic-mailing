<?php 

namespace Atomic\Core\Auth\Hasher;

class Hasher extends AbstractHasher
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
        return parent::manipulate($password);
    }
}
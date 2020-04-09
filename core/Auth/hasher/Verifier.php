<?php 

namespace Atomic\Core\Auth\Hasher;

class Verifier extends AbstractVerifier
{
    /**
     * Verify hashed password 
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
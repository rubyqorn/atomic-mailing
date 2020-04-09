<?php 

namespace Atomic\Core\Auth;

use Atomic\Core\Auth\Hasher\{
    Hasher,
    Verifier,
    AbstractHasher,
    AbstractVerifier
};

class PasswordFacade
{
    /**
     * @var \Atomic\Core\Auth\Hasher\AbstractHasher|null
     */ 
    public ?AbstractHasher $hasher = null;

    /**
     * @var \Atomic\Core\Auth\Hasher\AbstractVerifier|null
     */ 
    public ?AbstractVerifier $verifier = null;

    public function __construct(Hasher $hasher, Verifier $verifier)
    {
        $this->hasher = $hasher;
        $this->verifier = $verifier;
    }
}
<?php 

namespace Atomic\Core\Auth\Login;

use Atomic\Core\Auth\Interfaces\UserManipulations;
use Atomic\Core\Auth\PasswordFacade;
use Atomic\Application\Models\User;

class UserInfoValidator implements UserManipulations
{
    /**
     * @var \Atomic\Application\Models\User|null
     */ 
    private ?User $user = null;

    /**
     * @var string
     */ 
    private string $email;

    public function __construct(string $email)
    {   
        $this->email = $email;
        $this->user = new User();
    }

    /**
     * Get user content by email
     * 
     * @return array
     */ 
    public function getUserInfo()
    {
        return $this->user->select()->columns('password')
                                    ->where(" email = '{$this->email}' ")
                                    ->get();
    }

    /**
     * Validate if user exists
     * 
     * @return bool|array
     */ 
    public function checkUserInfo()
    {
        if (!$this->getUserInfo()) {
            return false;
        }

        return $this->getUserInfo();
    }

    /**
     * Verify hashed password with password from field
     * 
     * @param \Atomic\Core\Auth\PasswordFacade $passwordFacade
     * 
     * @return bool
     */ 
    public function verifyHashedPassword(PasswordFacade $passwordFacade)
    {
        if (!$passwordFacade->verifier->manipulate($this->checkUserInfo()['0']['password'])) {
            return false;
        }

        return true;
    }
}
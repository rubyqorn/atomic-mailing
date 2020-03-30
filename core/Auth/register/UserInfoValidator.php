<?php 

namespace Atomic\Core\Auth\Register;

use Atomic\Core\Auth\Interfaces\UserManipulations;
use Atomic\Application\Models\User;
use Atomic\Core\Auth\PasswordFacade;

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
        return $this->user->select()->columns('email')   
                                    ->where(" email = '{$this->email}' ")
                                    ->get();
    }

    /**
     * Validate if user exists
     * 
     * @return bool
     */ 
    public function checkUserInfo()
    {
        if ($this->getUserInfo()) {
            return false;
        }

        return true;
    }

    /**
     * Create hashed password and push into
     * array
     * 
     * @param \Atomic\Core\Auth\PasswordFacade $passwordFacade
     * @param array $fields 
     * 
     * @return array
     */ 
    public function makeHash(PasswordFacade $passwordFacade, array $fields)
    {
        $fields['password'] = $passwordFacade->hasher->manipulate($fields['password']);
        return $fields;
    }

    /**
     * Push validated content
     * 
     * @param array $userData
     * 
     * @return void
     */ 
    public function pushUserDataInDatabase(array $userData)
    {
        return $this->user->insert()->into('email, password, name, login')
                                    ->values($userData);
    }
}
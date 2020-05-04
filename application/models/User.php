<?php 

namespace Atomic\Application\Models;

use Atomic\Core\Http\Request\Request;

class User extends Model
{
    protected $table = 'users';

    /**
     * Get user by email
     * 
     * @param string $email 
     * 
     * @return array
     */ 
    public function authUser(string $email)
    {
        return $this->select()->columns('*')
                    ->where(" email = '{$email}' ")
                    ->get();
    }
}
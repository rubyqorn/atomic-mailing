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

    /**
     * Update settings by email property
     * 
     * @param \Atomic\Core\Http\Request\Request $request 
     * @param array $userData
     * 
     * @return void
     */ 
    public function updateUserSettings(Request $request, array $userData)
    {
        $userData = array_values($userData);

        if (isset($userData['website'])) {
            return $this->update()->set('name = ?, website = ?', $userData)
                        ->where(" email = '{$request->cookie('loged_in')}' ")
                        ->push();
        }

        return $this->update()->set('name = ?', $userData)
                    ->where(" email = '{$request->cookie('loged_in')}' ")
                    ->push();
    }
}
<?php 

namespace Atomic\Application\Models;

class Website extends Model 
{
    protected $table = 'user_websites';

    /**
     * Return list of setted user websites 
     * by email
     * 
     * @param string $email 
     * 
     * @return array
     */ 
    public function userWebsites(string $email) 
    {
        return $this->select()->columns('twitter, vk, discordapp')
                            ->where(" user_email = '{$email}' ")
                            ->get();
    }
}
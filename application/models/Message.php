<?php 

namespace Atomic\Application\Models;

class Message extends Model 
{
    protected $table = 'messages';

    /**
     * Get messages for auth user which was
     * writen another user
     * 
     * @param string $whom 
     * 
     * @return array
     */ 
    public function userMessages(string $whom)
    {
        return $this->select()->fromTwoTables(
            'users, messages',
            'users.name, users.img, messages.message, messages.id',
            "users.id = messages.who"
        )->and(" messages.whom = {$whom} ")->get();
    }
}
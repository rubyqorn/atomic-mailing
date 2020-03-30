<?php 

namespace Atomic\Core\Messaging\Interfaces;

interface Message 
{
    /**
     * @param array $sendInfo
     * 
     * @return void
     */ 
    public function send(array $sendInfo);
}
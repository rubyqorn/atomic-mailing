<?php 

namespace Atomic\Core\Messages\Interfaces;

interface Message 
{
    /**
     * @param string $from 
     * @param string $to 
     * @param string $message 
     * 
     * @return void
     */ 
    public function send(string $from, string $to, string $message);
}
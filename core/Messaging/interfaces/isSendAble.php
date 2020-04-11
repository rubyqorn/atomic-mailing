<?php 

namespace Atomic\Core\Messages\Interfaces;

interface isSendAble
{
    /**
     * @param string $message
     */ 
    public function __construct(string $message);
}
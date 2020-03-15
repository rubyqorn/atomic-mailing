<?php 

namespace Atomic\Core\Server\Interfaces;

interface ConnectionSetter
{
    /**
     * Execute command in CLI and open
     * connection at host with port
     * 
     * @return mixed
     */ 
    public function open();
}
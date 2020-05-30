<?php 

namespace Atomic\Core\App;

class Kernel
{
    /**
     * The layers of application. It can be
     * pagination, notification, route and etc
     * layers
     * 
     * @var array
     */ 
    protected $layers = [
        // "http" => "\Atomic\Core\Http\Http",
        "routing" => "\Atomic\Core\Routing\Route",
    ];

    /**
     * List of available servers
     * 
     * @var array
     */ 
    protected $servers = [
        "local" =>  "\Atomic\Core\Server\LocalServer",
        "socket" => "\Atomic\Core\Server\SocketServer"
    ];
}
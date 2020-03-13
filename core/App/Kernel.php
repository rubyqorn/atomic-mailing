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
        "routing" => "\Atomic\Core\Routing\Route",
        "local_server" => "Atomic\Core\Server\LocalServer",
        "socket_server" => "\Atomic\Core\Server\SocketServer"
    ];
}
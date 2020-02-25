<?php 

namespace Atomic\Core\Server;

use Atomic\Core\Server\Interfaces\ServerRunner;
use Atomic\Core\Server\Socket\SocketConnection;
use Atomic\Core\Server\Socket\Socket;

class SocketServer implements ServerRunner
{
    /**
     * @var \Atomic\Core\Server\Socket\SocketConnection
     */ 
    private $connection;

    /**
     * @var \Atomic\Core\Server\Socket\Socket
     */ 
    private $socket;

    /**
     * Run socket server connection
     */ 
    public function runServer()
    {
        require '../configuration/app.php';

        $this->connection = new SocketConnection($socket_server_settings);
        $this->socket = new Socket($this->connection);
    }
}
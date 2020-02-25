<?php 

namespace Atomic\Core\Server;

use Atomic\Core\Server\Interfaces\ServerRunner;
use Atomic\Core\Server\Local\LocalConnection;

class LocalServer implements ServerRunner
{
    /**
     * @var \Atomic\Core\Server\Local\LocalConnection
     */ 
    private $connection;

    /**
     * Run local server connection
     */ 
    public function runServer()
    {
        $this->connection = new LocalConnection();
        return $this->connection->open();
    }
}
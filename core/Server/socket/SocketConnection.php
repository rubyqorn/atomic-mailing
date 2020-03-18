<?php 

namespace Atomic\Core\Server\Socket;

use Atomic\Core\Server\Interfaces\ConnectionSetter;

class SocketConnection implements ConnectionSetter
{
    /**
     * Socket server settings
     * 
     * @var array
     */ 
    private $settings;

    /**
     * Socket resource
     * 
     * @var resource
     */ 
    public $socket;

    /**
     * @var resource
     */ 
    protected $createdSocket;

    public function __construct(array $settings)
    {
        $this->settings = $settings;

        $this->createdSocket = socket_create(
            $this->settings['domain'], 
            $this->settings['type'], 
            $this->settings['protocol']
        );
    }

    /**
     * Open socket connection
     */ 
    public function open()
    {
        $this->bind();
        $this->listen();
        $this->accept();
    }

    /**
     * Bind name for socket
     * 
     * @return bool
     */ 
    protected function bind()
    {
        return socket_bind($this->createdSocket, $this->settings['host'], $this->settings['port']);
    }

    /**
     * Listen socket connections
     * 
     * @return bool
     */ 
    protected function listen()
    {
        return socket_listen($this->createdSocket, 5);
    }

    /**
     * Get connection at socket
     * 
     * @return resource
     */ 
    protected function accept()
    {
        return $this->socket = socket_accept($this->createdSocket);
    }
}
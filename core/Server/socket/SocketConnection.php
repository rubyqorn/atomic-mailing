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
    protected $socket;

    /**
     * @var resource
     */ 
    protected $accept;

    public function __construct(array $settings)
    {
        $this->settings = $settings;

        $this->socket = socket_create(
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
        return socket_bind($this->socket, $this->settings['host'], $this->settings['port']);
    }

    /**
     * Listen socket connections
     * 
     * @return bool
     */ 
    protected function listen()
    {
        return socket_listen($this->socket, 5);
    }

    /**
     * Get connection at socket
     * 
     * @return resource
     */ 
    protected function accept()
    {
        return $this->accept = socket_accept($this->socket);
    }

    /**
     * Write message to socket
     * 
     * @param string $buffer 
     * 
     * @return int
     */ 
    protected function write(string $buffer)
    {
        return socket_write($this->socket, $buffer, strlen($buffer));
    }

    /**
     * Read string
     * 
     * @return string
     */ 
    protected function read()
    {
        return socket_read($this->socket, 1024, PHP_NORMAL_READ);
    }

    /**
     * Close socket connection
     * 
     * @return void
     */ 
    protected function close()
    {
        return socket_close($this->socket);
    }
}
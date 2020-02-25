<?php 

namespace Atomic\Core\Server\Socket;

use Atomic\Core\Server\Interfaces\ConnectionSetter;
use Atomic\Core\Exceptions\InvalidArguments;

class Socket
{
    /**
     * Socket resource
     * 
     * @var resource
     */ 
    protected $socket;

    public function __construct(ConnectionSetter $connection)
    {
        $this->socket = $connection->socket;

        if ($this->isResource($this->socket)) {
            return $this->socket;
        }

        throw new InvalidArguments('Invalid socket resource');
        
    }

    /**
     * Write message to socket
     * 
     * @param string $content 
     * 
     * @return int
     */ 
    public function write(string $content)
    {
        return SocketWriter::write($this->socket, $content);
    }

    /**
     * Read message at socket
     * 
     * @return string
     */ 
    public function read()
    {
        return SocketReader::read($this->socket);
    }

    /**
     * Close socket connection
     * 
     * @return void
     */ 
    public function close()
    {
        return SocketCloser::close($this->socket);
    }

    /**
     * Check type of passed socket and return
     * it if resource
     * 
     * @param resource $socket
     * 
     * @return resource
     */ 
    protected function isResource($socket)
    {
        if (is_resource($socket)) {
            return $socket;
        }
    }

}
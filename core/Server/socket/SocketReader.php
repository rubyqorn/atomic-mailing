<?php 

namespace Atomic\Core\Server\Socket;

class SocketReader
{
    /**
     * Read message at socket
     * 
     * @param resource $socket
     * 
     * @return string
     */ 
    public static function read($socket)
    {
        return socket_read($socket, 2048);
    }
}
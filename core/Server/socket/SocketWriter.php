<?php 

namespace Atomic\Core\Server\Socket;

class SocketWriter
{
    /**
     * Write message to socket
     * 
     * @param resource $socket
     * @param string $content 
     * 
     * @return int
     */ 
    public static function write($socket, string $content)
    {
        return socket_write($socket, $content, strlen($content));
    }
}
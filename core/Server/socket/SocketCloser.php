<?php 

namespace Atomic\Core\Server\Socket;

class SocketCloser
{
    /**
     * Close socket connection
     * 
     * @param resource $socket
     * 
     * @return void
     */  
    public static function close($socket)
    {
        return socket_close($socket);
    }
}
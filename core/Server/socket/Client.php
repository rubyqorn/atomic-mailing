<?php 

namespace Atomic\Core\Server\Socket;

use Atomic\Core\Server\Interfaces\ConnectionSetter;

class Client implements ConnectionSetter
{

    /**
     * Server settings
     * 
     * @var array
     */ 
    protected $settings;

    /**
     * Socket resource
     * 
     * @var resource
     */ 
    public $socket;

    /**
     * @var bool
     */ 
    private $sockConnect;

    public function __construct(array $settings) 
    {
        $this->settings = $settings;

        $this->open();
    }

    /**
     * Open connection on configured socket
     */ 
    public function open()
    {
        $this->create();
        $this->connect();
    }

    /**
     * Create new socket
     * 
     * @return resource
     */ 
    protected function create()
    {
        
        return $this->socket = socket_create(
            $this->settings['domain'],
            $this->settings['type'],
            $this->settings['protocol']
        );
    }

    /**
     * Socket connection
     * 
     * @return bool
     */ 
    protected function connect()
    {
        return $this->sockConnect = socket_connect(
                $this->socket,
                $this->settings['host'],
                $this->settings['port']
            );
    }
}
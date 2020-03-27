<?php 

namespace Atomic\Core\Http;

use Atomic\Core\IAppRunner;

class Http implements IAppRunner
{
    /**
     * @var \Atomic\Core\Http\HttpMiddleware
     */ 
    private $middleware;

    /**
     * Contains server configuration
     * 
     * @var array
     */ 
    protected $serverSettings = [];

    /**
     * Current URL
     * 
     * @var string
     */ 
    protected $url;

    public function __construct()
    {
        $this->serverSettings = $this->getServerSettings();
        $this->url = "http://{$this->serverSettings['host']}:{$this->serverSettings['port']}{$_SERVER['REQUEST_URI']}";

        $this->middleware = new HttpMiddleware($this->url);
    }

    /**
     * Run HTTP route analyzer
     * 
     * @return mixed
     */ 
    public function run()
    {
        return $this->middleware->analyze()->giveResponse();
    }

    /**
     * Get server settings by mode property
     * 
     * @return array
     */ 
    private function getServerSettings()
    {
        require '../configuration/app.php';

        if ($external_server_settings['mode'] == 'off') {
            return $server_settings;
        }

        return $external_server_settings;
    }
}
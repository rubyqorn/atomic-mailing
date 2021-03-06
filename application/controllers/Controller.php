<?php 

namespace Atomic\Application\Controllers;

use Atomic\Core\Http\Request\Request;
use Atomic\Core\Http\Response\Response;
use Atomic\Core\Http\Interfaces\Http;
use Atomic\Core\Auth\Authorization;
use Atomic\Core\View\View;

class Controller 
{
    /**
     * @var \Atomic\Core\Http\Interfaces\Http|null
     */ 
    protected ?Http $request = null;

    /**
     * @var \Atomic\Core\Http\Itnerfaces\Http|null
     */ 
    protected ?Http $response = null;

    /**
     * @var \Atomic\Core\Auth\AuthEntity|null
     */ 
    protected ?Authorization $auth = null;

    /**
     * @var \Atomic\Core\View\View|null
     */ 
    protected ?View $view = null;

    /**
     * Server settings which contains
     * host, port, and mode values
     * 
     * @var array
     */ 
    private array $serverSettings = [];

    /**
     * Current host where was executed
     * script 
     * 
     * @var string
     */ 
    private string $host;

    public function __construct()
    {
        $this->host = $this->getHost();
        $this->request = new Request("{$this->host}{$_SERVER['REQUEST_URI']}");
        $this->response = new Response("{$this->host}{$this->request->currentUri()}");
        $this->auth = new Authorization($this->request, $this->response);
        $this->view = new View();
    }

    /**
     * Validate if external server is on
     * and return array settings
     * 
     * @return array
     */ 
    private function checkServerMode() :array
    {
        require '../configuration/app.php';

        if (!$external_server_settings['mode'] == 'off') {
            return $external_server_settings;
        }

        return $server_settings;
    }

    /**
     * Convert host name and port to one line
     * 
     * @return string|null
     */ 
    private function getHost() :?string
    {
        $this->serverSettings = $this->checkServerMode();

        return "{$this->serverSettings['host']}:{$this->serverSettings['port']}";
    }
}
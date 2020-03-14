<?php 

namespace Atomic\Core\Server\Local;

use Atomic\Core\Server\Interfaces\ConnectionSetter;

class LocalConnection implements ConnectionSetter
{
    /**
     * Local server settings
     * 
     * @var array
     */ 
    private $settings = [];

    /**
     * Command which will be execute
     * in CLI
     * 
     * @var string
     */ 
    private $execCommand;

    public function __construct()
    {
        $this->settings = $this->settingsAnalyzer();
        $this->execCommand = "php -S {$this->settings['host']}:{$this->settings['port']}";
    }

    /**
     * Analyze mode of server settings
     * 
     * @return array
     */ 
    private function settingsAnalyzer()
    {
        require '../configuration/app.php';

        if ($external_server_settings['mode'] == 'on') {
            return $this->settings[] = $external_server_settings;    
        }
        
        return $this->settings[] = $server_settings;
    }

    /**
     * Execute command in CLI
     * 
     * @return string
     */ 
    public function open()
    {
        return exec($this->execCommand);
    }
}
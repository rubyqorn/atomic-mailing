<?php 

namespace Atomic\Core\Messaging\SMS\Config;

use Atomic\Core\Messaging\Interfaces\ConfigFile;

class SMSSettings extends SMSConfigContainer implements ConfigFile
{
    /**
     * Settings list
     * 
     * @var array
     */ 
    protected array $settings;

    public function __construct(string $configFile)
    {
        if ($this->exists($configFile)) {
            $this->settings = $this->parseSettings($configFile);
        }
    }

    /**
     * Validate file existing
     * 
     * @param string $file 
     * 
     * @return string|bool
     */ 
    public function exists(string $file)
    {
        if (file_exists($file)) {
            return $file;
        }
    }

    /**
     * Parse ini file with SMS settings
     * 
     * @param string $file 
     * 
     * @return array
     */ 
    public function parseSettings(string $file) :array 
    {
        return parse_ini_file($file);
    }

    /**
     * Set needed settings in property container class
     * 
     * @return array
     */ 
    public function setSettings()
    {
        $settings = [];

        $settings[] = $this->set('SMS_API_KEY', $this->settings['SMS_API_KEY']);
        $settings[] = $this->set('SMS_API_HOST', $this->settings['SMS_API_HOST']);
        $settings[] = $this->set('SMS_API_SECRET', $this->settings['SMS_API_SECRET']);

        return $settings;
    }
}
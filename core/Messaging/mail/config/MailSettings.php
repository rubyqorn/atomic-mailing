<?php 

namespace Atomic\Core\Messaging\Mail\Config;

use Atomic\Core\Messaging\Interfaces\ConfigFile;

class MailSettings extends MailConfigContainer implements ConfigFile
{
    /**
     * Settings container
     * 
     * @var array
     */ 
    protected array $settings = [];

    public function __construct(string $configFile)
    {
        if ($this->exists($configFile)) {
            $this->settings = $this->parseSettings($configFile);
        }
    }

    /**
     * Parse ini file with settings
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
     * Get needed settings and set in property container
     * class 
     * 
     * @return array
     */ 
    public function setSettings()
    {
        $settings = [];

        $settings[] = $this->set('MAIL_SMTP_HOST', $this->settings['MAIL_SMTP_HOST']);
        $settings[] = $this->set('MAIL_SMTP_PORT', $this->settings['MAIL_SMTP_PORT']);
        $settings[] = $this->set('MAIL_SMTP_FROM', $this->settings['MAIL_SMTP_FROM']);

        return $settings;
    }
}
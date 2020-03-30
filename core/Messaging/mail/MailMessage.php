<?php 

namespace Atomic\Core\Messaging\Mail;

use Atomic\Core\Messaging\Interfaces\isSendAble;
use Atomic\Core\Messaging\Interfaces\ConfigFile;
use Atomic\Core\Messaging\Mail\Config\MailSettings;

class MailMessage extends AbstractMail implements isSendAble
{
    /**
     * @var \Atomic\Core\Messaging\Interfaces\ConfigFile
     */ 
    protected ?MailSettings $settings = null;

    /**
     * Settings file - env.ini
     * 
     * @var string
     */ 
    protected string $file;

    public function __construct(string $file)
    {
        $this->file = $file;
    }

    /**
     * @return \Atomic\Core\Messaging\Mail\Config\MailSettings
     */ 
    protected function mailSettings()
    {
        return new MailSettings($this->file);
    }

    /**
     * Set settings in property container class
     * and return instance of settings class
     * 
     * @return \Atomic\Core\Messaging\Interfaces\ConfigFile
     */ 
    public function setSettings() :ConfigFile
    {
        $this->settings = $this->mailSettings();
        $this->settings->setSettings();
        return $this->settings;
    }
}
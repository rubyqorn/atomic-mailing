<?php 

namespace Atomic\Core\Messaging\SMS;

use Atomic\Core\Messaging\Interfaces\isSendAble;
use Atomic\Core\Messaging\Interfaces\ConfigFile;
use Atomic\Core\Messaging\SMS\Config\SMSSettings;

class SMSMessage extends AbstractSMS implements isSendAble
{
    /**
     * Settings file
     * 
     * @var string
     */ 
    protected string $file;

    /**
     * @var \Atomic\Core\Messaging\SMS\Conifg\SMSSettings|null
     */ 
    protected ?SMSSettings $settings = null;

    public function __construct(string $file)
    {
        $this->file = $file;
    }

    /**
     * @return \Atomic\Core\Messaging\SMS\Conifg\SMSSettings
     */ 
    public function smsSettings()
    {
        return new SMSSettings($this->file);
    }

    /**
     * Set settings to property container class
     * 
     * @return \Atomic\Core\Messaging\SMS\Conifg\SMSSettings
     */ 
    public function setSettings() :ConfigFile
    {
        $this->settings = $this->smsSettings();
        $this->settings->setSettings();
        return $this->settings;
    }
}
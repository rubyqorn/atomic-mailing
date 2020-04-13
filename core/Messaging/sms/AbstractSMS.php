<?php 

namespace Atomic\Core\Messaging\SMS;

use Atomic\Core\Messaging\Interfaces\Message;
use Atomic\Core\Messaging\SMS\SMSSettings;
use Twilio\Rest\Client;

abstract class AbstractSMS implements Message
{
    /**
     * @var \Twilio\Rest\Client|null
     */ 
    private ?Client $twilio = null;

    /**
     * @var \Atomic\Core\Messaging\SMS\Config\SMSSettings|null
     */ 
    private ?SMSSettings $settingsContainer = null;

    /**
     * Send message to phone number
     * 
     * @param array $sendInfo
     * 
     * @return void
     */ 
    public function send(array $sendInfo)
    {
        $this->settings = $sendInfo['settings'];
        $this->twilio = $this->getTwilioClient(
            $this->settings->get('SMS_ACCOUNT_ID'), 
            $this->settings->get('SMS_API_KEY')
        );

        $message = $this->twilio->messages->create(
            $sendInfo['to'], $sendInfo['message_content']
        );

        return $message;
    }

    /**
     * @return \Twilio\Rest\Client
     */ 
    public function getTwilioClient(string $sid, string $token) :Client
    {
        return new Client($sid, $token);
    }

    /**
     * @param \Atomic\Core\Messaging\SMS\Config\SMSSettings $settings
     * 
     * @return \Atomic\Core\Messaging\SMS\Config\SMSSettings
     */ 
    public function getSettingsContainer(SMSSettings $settings) :SMSSettings
    {
        return $settings;
    }
}
<?php 

namespace Atomic\Core\Messaging\SMS;

use Atomic\Core\Messaging\Interfaces\Message;
use Atomic\Core\Messaging\SMS\SMSSettings;
use Nexmo\Client\Credentials\Basic;
use Nexmo\Client;

abstract class AbstractSMS implements Message
{
    /**
     * @var \Nexmo\Client\Credentials\Basic|null
     */ 
    private ?Basic $nexmo = null;

    /**
     * @var \Nexmo\Client|null
     */ 
    private ?Client $client = null;

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
        $this->nexmo = $this->getNexmoBasic(
            $this->settings->get('SMS_API_KEY'),
            $this->settings->get('SMS_API_SECRET')
        );

        $this->client = $this->getNexmoClient($this->nexmo);

        return $this->client->message()->send([
            'to' => $sendInfo['to'],
            'from' => $sendInfo['from'],
            'text' => $sendInfo['message']
        ]);
    }

    /**
     * @param string $apiKey
     * @param string $secret 
     * 
     * @return \Nexmo\Client\Credentials\Basic
     */
    protected function getNexmoBasic(string $apiKey, string $secret) :Basic
    {
        return new Basic($apiKey, $secret);
    }

    /**
     * @param \Nexmo\Client\Credentials\Basic $basic
     * 
     * @return \Nexmo\Client
     */ 
    protected function getNexmoClient(Basic $basic) :Client
    {
        return new Client($basic);
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
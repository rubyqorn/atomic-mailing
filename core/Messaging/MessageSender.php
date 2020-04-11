<?php 

namespace Atomic\Core\Messaging;

use Atomic\Core\Messaging\Interfaces\isSendAble;
use Atomic\Core\Messaging\Interfaces\Sender;
use Atomic\Core\Messaging\Mail\MailMessage;
use Atomic\Core\Messaging\SMS\SMSMessage;

class MessageSender implements Sender 
{
    /**
     * Get mail sender
     *
     * @param string $message
     *  
     * @return \Atomic\Core\Messaging\Interfaces\isSendAble
     */ 
    public function mail(string $message) :isSendAble
    {
        return new MailMessage($message);
    }

    /**
     * Get SMS sender
     *
     * @param string $message
     *  
     * @return \Atomic\Core\Messaging\Interfaces\isSendAble
     */ 
    public function sms(string $message) :isSendAble
    {
        return new SMSMessage($message);
    }
}
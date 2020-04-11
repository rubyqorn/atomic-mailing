<?php 

namespace Atomic\Core\Messaging\Interfaces;

use Atomic\Core\Messaging\Interfaces\isSendAble;

interface Sender
{
    /**
     * @param string $message 
     * 
     * @return \Atomic\Core\Messaging\Mail\MailMessage
     */ 
    public function mail(string $message) :isSendAble;

    /**
     * @param string $message 
     * 
     * @return \Atomic\Core\Messaging\SMS\SMSMessage
     */ 
    public function sms(string $message) :isSendAble;
}
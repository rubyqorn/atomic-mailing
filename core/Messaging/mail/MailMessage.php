<?php 

namespace Atomic\Core\Messaging\Mail;

use Atomic\Core\Messaging\Interfaces\isSendAble;

class MailMessage extends AbstractMail implements isSendAble
{
    public function __construct(string $message)
    {
        
    }
}
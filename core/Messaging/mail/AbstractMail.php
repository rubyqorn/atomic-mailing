<?php 

namespace Atomic\Core\Messaging\Mail;

use Atomic\Core\Messaging\Interfaces\Message;

class AbstractMail implements Message
{
    public function send(string $from, string $to, string $message)
    {
        
    }
}
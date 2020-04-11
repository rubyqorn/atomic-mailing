<?php 

namespace Atomic\Core\Messaging\SMS;

use Atomic\Core\Messaging\Interfaces\Message;

class AbstractSMS implements Message
{
    public function send(string $from, string $to, string $message)
    {
        
    }
}
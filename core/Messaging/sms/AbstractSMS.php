<?php 

namespace Atomic\Core\Messaging\SMS;

use Atomic\Core\Messaging\Interfaces\Message;

abstract class AbstractSMS implements Message
{
    public function send(array $sendInfo)
    {
        
    }
}
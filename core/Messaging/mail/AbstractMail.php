<?php 

namespace Atomic\Core\Messaging\Mail;

use Atomic\Core\Messaging\Interfaces\Message;
use Atomic\Core\Messaging\FileManipulator;

abstract class AbstractMail implements Message
{
    /**
     * Generate email content and 
     * send it using SSMTP utility
     * 
     * @param array $sendInfo
     * 
     * @return void
     */ 
    public function send(array $sendInfo)
    {
        $this->fileManipulator = new FileManipulator();
        $this->fileManipulator->setResource('../email-notification.txt');
        $this->fileManipulator->write(
"To: {$sendInfo['to']} 
From: {$sendInfo['from']} 
Subject: {$sendInfo['subject']} 

{$sendInfo['message']}"
        );

        return exec(" sendmail {$sendInfo['to']} < '../email-notification.txt' ");
    }
}
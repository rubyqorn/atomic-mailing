<?php 

namespace Atomic\Core\Auth\Forgot;

use Atomic\Core\Messaging\Mail\MailMessage;
use Atomic\Core\Messaging\Mail\Config\MailSettings;
use Atomic\Core\Http\Request\Request;

class ConfirmationCode
{
    /**
     * @var \Atomic\Core\Messaging\Mail\MailMessage|null
     */ 
    private ?MailMessage $mail = null;

    /**
     * @var \Atomic\Core\Messaging\Mail\Config\MailSettings|null
     * */ 
    private ?MailSettings $settings = null;

    public function __construct()
    {
        $this->mail = new MailMessage('../env.ini');
    }

    /**
     * Send confirmation email
     * 
     * @param \Atomic\Core\Http\Request\Request $request 
     * @param string $subject 
     * @param string $message 
     * 
     * @return void
     */ 
    public function send(Request $request, string $subject, string $message)
    {
        $this->settings = $this->mail->setSettings();
        
        return $this->mail->send([
            'to' => $request->post('email'),
            'from' => 'Atomic',
            'subject' => $subject,
            'message' => $message
        ]);
    }
}
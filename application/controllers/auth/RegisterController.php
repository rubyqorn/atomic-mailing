<?php 

namespace Atomic\Application\Controllers\Auth;

use Atomic\Application\Controllers\Ajax\AjaxController;
use Atomic\Application\Controllers\CookieController;
use Atomic\Application\Controllers\Controller;
use Atomic\Application\Controllers\Auth\Auth;
use Atomic\Core\Messaging\Mail\MailMessage;
use Atomic\Core\Auth\Authorization;

class RegisterController extends Controller implements Auth 
{
    /**
     * Data which was sended by
     * AJAX method
     * 
     * @var array
     */ 
    protected array $ajaxData = [];

    /**
     * @var string
     */ 
    protected string $title = 'Registration';

    /**
     * @var string
     */ 
    protected string $message = 'Your account was registered, check your email';

    /**
     * @var string
     */ 
    protected string $sendedEmail;

    /**
     * @var \Atomic\Core\Auth\Authorization|null
     */ 
    private ?Authorization $registration;

    /**
     * @var \Atomic\Core\Messaging\Mail\MailMessage|null
     */ 
    private ?MailMessage $email = null;

    /**
     * Send email with message where contains status
     * of account.
     * 
     * @param \Atomic\Core\Messaging\Mail\MailMessage|null
     */ 
    protected function sendEmail(MailMessage $mail)
    {
        $this->email = $mail;
        $settings = $this->email->setSettings();
        return $this->email->send([
            'to' => $this->request->post('email'),
            'from' => 'Atomic',
            'subject' => 'Registration at Atomic platform',
            'message' => 'Your account was registered successfuly. You can login in your account'
        ]);
    }

    /**
     * Show register form
     * 
     * @return void
     */ 
    public function showForm()
    {
        if (!CookieController::check('loged_in')) { 
            return $this->view->generate('auth/register', [
                'title' => $this->title
            ]);
        }

        return $this->response->redirect('/home');
    }

    /**
     * Register new user if is not exists,
     * send email and return message
     * 
     * @return string
     */ 
    public function auth()
    {
        $this->ajaxData = AjaxController::getData($this->request);
        $this->registration = new Authorization($this->request, $this->response);
    
        $message = $this->registration->register($this->request)->handle([
            'login' => 'min-val|5',
            'email' => 'email',
            'password' => 'min-val|6',
            'name' => 'small-string' 
        ]);

        if ($message === 'Account already exists') {
            echo $message;
            return ;
        }

        $this->sendedEmail = $this->sendEmail(new MailMessage('../env.ini'));
        echo $this->message;
        
    }
}
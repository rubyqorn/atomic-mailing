<?php 

namespace Atomic\Application\Controllers\Auth;

use Atomic\Core\Auth\Forgot\ForgotPassword;
use Atomic\Core\Auth\Hasher\Hasher;
use Atomic\Application\Models\User;
use Atomic\Application\Controllers\Controller;
use Atomic\Application\Controllers\Ajax\AjaxController;

class ForgotPasswordController extends Controller 
{
    /**
     * @var \Atomic\Core\Auth\Forgot\ForgotPassword|null
     */ 
    protected ?ForgotPassword $password = null;

    /**
     * @var \Atomic\Application\Models\User|null
     */ 
    protected ?User $user = null;

    /**
     * Data which sent by AJAX
     * 
     * @var array
     */ 
    protected array $ajaxData = [];

    public function __construct()
    {
        $this->password = new ForgotPassword();
        parent::__construct();
    }

    /**
     * @return void
     */ 
    public function showForm()
    {
        return $this->view->generate('auth/forgot/forgot');
    }

    /**
     * Compare two passwords and send email or
     * if passwords is not equal return error 
     * message which will be passed into message
     * block
     * 
     * @return void|string
     */ 
    public function confirmation()
    {
        $this->ajaxData = AjaxController::getData($this->request);

        $confirmation = $this->password->confirmation(
            $this->request->post('password'), 
            $this->request->post('confirmation')
        );

        if ($confirmation === true) {
            print_r($this->ajaxData);
            return $this->sendCode($this->ajaxData);
        }

        return print $confirmation->getAll()['password'];
        
    }

    /**
     * Send message with code which user
     * have to type in field
     * 
     * @param array $ajaxData
     * 
     * @return void
     */ 
    public function sendCode(array $ajaxData)
    {
        return $this->password->sendCode($this->request, $ajaxData['code']);
    }

    /**
     * Compare codes and push new typed password
     * in database by user email
     * 
     * @return void|string
     */ 
    public function codeConfirmation()
    {
        $this->user = new User();
        $this->ajaxData = AjaxController::getData($this->request);
        $this->hasher = new Hasher($this->ajaxData['confirmation']);

        // Compare codes and get message 
        $confirmation = $this->password->codeConfirmation(
            $this->ajaxData['code_confirm'],
            $this->ajaxData['code'],
            'code'
        );
        $message = $confirmation->getAll()['code'];

        if ($message === 'Wrong code. Please check your email') {
            return print $message;
        }

        // Create password hash and push in 
        // database by mail property
        $hashedPassword = $this->hasher->manipulate($this->ajaxData['confirmation']);
        $userUpdateProcess = $this->user->update()->set('password', [$hashedPassword])
                                        ->where("email = '{$this->ajaxData['email']}'")
                                        ->push();

        if (!$userUpdateProcess) {
            return print 'Email is not exists';
        }

        return $userUpdateProcess;
    }
}
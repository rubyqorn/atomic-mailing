<?php 

namespace Atomic\Core\Auth\Login;

use Atomic\Core\Http\Request\Request;
use Atomic\Core\Http\Response\Response;
use Atomic\Core\Exeptions\InvalidArguments;
use Atomic\Core\Auth\PasswordFacade;
use Atomic\Core\Auth\Interfaces\Process;
use Atomic\Core\Auth\Interfaces\RequestProcessing;
use Atomic\Core\Auth\Hasher\Hasher;
use Atomic\Core\Auth\Hasher\Verifier;

class LoginAction implements Process
{
    /**
     * @var \Atomic\Core\Auth\Interfaces\RequestProcessing|null
     */ 
    protected ?RequestProcessing $processor = null;

    /**
     * @var \Atomic\Core\Auth\PasswordFacade|null
     */ 
    protected ?PasswordFacade $passwordFacade = null;

    /**
     * @var \Atomic\Core\Auth\Interfaces\UserManipulations|null
     */ 
    protected ?UserInfoValidator $user = null;

    /**
     * @var \Atomic\Core\Http\Request\Request|null
     */ 
    protected ?Request $request = null;

    /**
     * @var array
     */ 
    protected array $validatedContent = [];

    /**
     * Success message
     * 
     * @var string
     */ 
    protected string $success = 'You have been loged in';

    /**
     * Error message
     * 
     * @var string
     */ 
    protected string $error = 'Wrong email or password';

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->user = new UserInfoValidator($this->request->post('email'));
    }

    /**
     * Get instance of LoginRequestProcessor
     * 
     * @return \Atomic\Core\Auth\Interfaces\RequestProcessing
     */ 
    public function getProcessor() :RequestProcessing
    {
        return new LoginRequestProcessor();
    }

    /**
     * @return \Atomic\Core\Auth\PasswordFacade
     */ 
    public function getVerifier() :?PasswordFacade
    {
        return new PasswordFacade(new Hasher, new Verifier);
    }

    /**
     * Login process handling
     * 
     * @param \Atomic\Core\Http\Request\Request $request 
     * @param array $rules 
     * 
     * @return string
     */ 
    public function handle(array $rules)
    {
        $this->processor = $this->getProcessor();
        $this->passwordFacade = $this->getVerifier();

        //Validate rule name and content by rule value
        if (!$this->processor->processing($rules) &&
            $this->processor->validate($this->request, $rules)
        ) {
            throw new InvalidArguments('Invalid rule name');
        }

        $this->validatedContent = $this->processor->validate($this->request, $rules);

        // Check if user with typed email exists and
        // compare password from database with password
        // from field
        if ($this->user->checkUserInfo() && 
            $this->user->verifyHashedPassword($this->passwordFacade)
        ) {
            return $this->success;
        }

        return $this->error;

    }

    /**
     * Create cookies when user was loged in
     * 
     * @param \Atomic\Core\Http\Response\Response $response 
     * @param string $cookieName
     * @param string $cookieValue
     * @param string $time 
     * 
     * @return void
     */ 
    public function makeCookies(Response $response, $cookieName, $cookieValue, $time)
    {
        return $response->setCookies($cookieName, $cookieValue, $time);
    }
}
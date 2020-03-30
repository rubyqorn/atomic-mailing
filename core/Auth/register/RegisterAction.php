<?php 

namespace Atomic\Core\Auth\Register;

use Atomic\Core\Http\Request\Request;
use Atomic\Core\Http\Response\Response;
use Atomic\Core\Auth\PasswordFacade;
use Atomic\Core\Exceptions\InvalidArguments;
use Atomic\Core\Auth\Interfaces\Process;
use Atomic\Core\Auth\Interfaces\RequestProcessing;
use Atomic\Core\Auth\Hasher\Hasher;
use Atomic\Core\Auth\Hasher\Verifier;

class RegisterAction implements Process
{
    /**
     * @var \Atomic\Core\Auth\Interfaces\RequestProcessing|null
     */ 
    protected ?RequestProcessing $processor = null;

    /**
     * @var \Atomic\Core\Auth\PasswordFacade
     */ 
    protected ?PasswordFacade $passwordFacade = null;

    /**
     * @var \Atomic\Core\Http\Request\Request|null
     */ 
    protected ?Request $request = null;

    /**
     * @var \Atomic\Core\Auth\Interfaces\UserManipulations|null
     */ 
    protected ?UserInfoValidator $user = null;

    /**
     * Success message
     * 
     * @var string
     */ 
    protected string $success = 'Account registered';

    /**
     * Error message 
     * 
     * @var string
     */ 
    protected string $error = 'Account already exists';

    /**
     * @var array
     */ 
    public array $validatedContent;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->user = new UserInfoValidator($this->request->post('email'));
    }

    /**
     * Get instance of RegisterRequestProcessor
     * 
     * @return \Atomic\Core\Auth\Interfaces\RequestProcessing
     */ 
    public function getProcessor() :RequestProcessing
    {
        return new RegisterRequestProcessor();
    }

    /**
     * @return \Atomic\Core\Auth\PasswordFacade
     */ 
    public function getHasher() :?PasswordFacade
    {
        return new PasswordFacade(new Hasher, new Verifier);
    }

    /**
     * Register process handling
     * 
     * @param array $rules 
     * 
     * @throws \Atomic\Core\Exceptions\InvalidArguments
     * @return array|Atomic\Core\Auth\Interfaces\Process
     */ 
    public function handle(array $rules) 
    {
        $this->processor = $this->getProcessor();
        $this->passwordFacade = $this->getHasher();
        
        if (!$this->processor->processing($rules) && 
            $this->processor->validate($this->request, $rules)
        ) {
            throw new InvalidArguments('Invalid rule name');
        }

        $this->validatedContent = $this->processor->validate($this->request, $rules);

        if (!$this->user->makeHash($this->passwordFacade, $this->validatedContent)) {
            return $this->validatedContent;
        }

        
        $fields = $this->user->makeHash(
            $this->passwordFacade, 
            $this->validatedContent
        );

        if ($this->user->pushUserDataInDatabase($fields)) {
            return $this->success;
        }

        return $this->error;
        
    }

    /**
     * Set session for login process
     * 
     * @param \Atomic\Core\Http\Response\Response $response 
     * @param string $sessionName 
     * @param string $sessionValue
     * 
     * @return \Atomic\Core\Auth\Interfaces\Process
     */ 
    public function makeSession(Response $response, string $sessionName, string $sessionValue)
    {   
        return $response->setSession($sessionName, $sessionValue);
    }
}
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
     * @var array
     */ 
    public array $validatedContent;

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
     * @param \Atomic\Core\Http\Request\Request $request
     * @param array $rules 
     * 
     * @throws \Atomic\Core\Exceptions\InvalidArguments
     * @return array|Atomic\Core\Auth\Interfaces\Process
     */ 
    public function handle(Request $request, array $rules) 
    {
        $this->processor = $this->getProcessor();
        $this->passwordFacade = $this->getHasher();
        
        if (!$this->processor->processing($rules) && 
            $this->processor->validate($request, $rules)
        ) {
            throw new InvalidArguments('Invalid rule name');
        }

        $this->validatedContent = $this->processor->validate($request, $rules);

        if (!isset($this->validatedContent['password'])) {
            return $this->validatedContent;
        }

        $this->validatedContent['password'] = $this->passwordFacade
                                                    ->hasher->manipulate(
                                                        $this->validatedContent['password']
                                                    );

        return $this;
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

    /**
     * Push user registration data in database
     * if user is not exists
     * 
     * @param array $formData
     */ 
    public function pushUserData(array $formData)
    {
        //
    }
}
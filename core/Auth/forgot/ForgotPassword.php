<?php 

namespace Atomic\Core\Auth\Forgot;

use Atomic\Core\Validator\Validator;
use Atomic\Core\Validator\ErrorBag;
use Atomic\Core\Http\Request\Request;
use Atomic\Core\Validator\ValidatedContentBag;
use Atomic\Core\Validator\Interfaces\ContentBag;

class ForgotPassword
{
    /**
     * @var \Atomic\Core\Validator\Validator|null
     */ 
    private ?Validator $validator = null;

    /**
     * @var \Atomic\Core\Validator\Interfaces\ContentBag|null
     */ 
    private ?ContentBag $statusMesages = null;

    /**
     * @var \Atomic\Core\Auth\Forgot\ConfirmationCode|null
     */ 
    private ?ConfirmationCode $confimCode = null;

    /**
     * @var \Atomic\Core\Http\Request\Request|null
     */ 
    private ?Request $request = null;

    /**
     * @var integer
     */ 
    private int $code;

    /**
     * Validate fields by rule statements
     * 
     * @return array
     */ 
    protected function validate()
    {
        $this->validator = new Validator([
            'email' => 'email',
            'password' => 'min-val|6',
            'confirmation' => 'min-val|6'
        ]);

        return $this->validator->validate();
    }

    /**
     * Validate fields and compare passwords
     * 
     * @param string $password 
     * @param string $confirmation 
     * 
     * @return \Atomic\Core\Validator\Interfaces\ContentBag|bool
     */ 
    public function confirmation(string $password, string $confirmation)
    {
        if (!$this->validate()) {
            return $this->writeStatusMessages(new ErrorBag, $this->validate());
        }

        if (strcmp($password, $confirmation) === 0) {
            return true;
        }

        return $this->writeStatusMessages(new ErrorBag, 'Password mismatch', 'password');
    }

    /**
     * Send mail with code number which user have 
     * to type in the field
     * 
     * @param \Atomic\Core\Http\Request\Request $request 
     * @param string $code
     * 
     * @return void
     */ 
    public function sendCode(Request $request, string $code)
    {
        $this->confirmCode = new ConfirmationCode();
        return $this->confirmCode->send(
            $request, 
            "Forgot password", 
            "This is you confirmation code: {$code}. Please type in the field"
        );
    }

    /**
     * Compare two passwords and return message
     * 
     * @param string $clientCode
     * @param string $codeFromEmail
     * @param string $field 
     * 
     * @return \Atomic\Core\Validator\Interfaces\ContentBag
     */ 
    public function codeConfirmation(string $clientCode, string $codeFromEmail, string $field)
    {
        if ($clientCode == $codeFromEmail) {
            return $this->writeStatusMessages(
                new ValidatedContentBag(), 
                'Your password was changed',
                $field
            );
        }

        return $this->writeStatusMessages(
            new ErrorBag(), 
            'Wrong code. Please check your email',
            $field
        );
    }

    /**
     * Message recording
     * 
     * @param \Atomic\Core\Validator\Interfaces\ContentBag $bag 
     * @param string $message 
     * @param string $field
     * 
     * @return \Atomic\Core\Validator\Interfaces\ContentBag
     */ 
    protected function writeStatusMessages(ContentBag $bag, string $message, $field = [])
    {
        $this->statusMessages = $bag;
        $this->statusMessages->recording($message, $field);
        return $this->statusMessages;
    }
}
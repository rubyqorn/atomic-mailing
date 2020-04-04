<?php 

namespace Atomic\Core\Validator;

class ErrorBag
{
    /**
     * Error messages
     * 
     * @var array
     */ 
    protected array $messages = [];

    /**
     * Record message into messages array
     * 
     * @param string $message 
     * 
     * @return array
     */ 
    public function recording(string $message)
    {
        return $this->messages[] = $message;
    }

    /**
     * Return list of exists messages
     * 
     * @return array
     */ 
    public function getAll()
    {
        return $this->messages;
    }

    /**
     * Get last error from array
     * 
     * @return string
     */ 
    protected function lastError()
    {
        $lastError = array_pop($this->messages);
        return $lastError;
    }

    public function __toString()
    {
        return $this->lastError();
    }
}
<?php 

namespace Atomic\Core\Validator;

use Atomic\Core\Validator\Interfaces\ContentBag;

class ErrorBag implements ContentBag
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
     * @param mixed $field
     * 
     * @return array
     */ 
    public function recording(string $message, $field = [])
    {
        return $this->messages[$field] = $message;
    }

    /**
     * Return list of exists messages
     * 
     * @return array
     */ 
    public function getAll() :array
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
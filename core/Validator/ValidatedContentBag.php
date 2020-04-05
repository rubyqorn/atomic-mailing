<?php 

namespace Atomic\Core\Validator;

use Atomic\Core\Validator\Interfaces\ContentBag;

class ValidatedContentBag implements ContentBag
{
    /**
     * List of validated content
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
     * Return list of recorded messages
     * 
     * @return array
     */ 
    public function getAll() :array
    {
        return $this->messages;
    }
}
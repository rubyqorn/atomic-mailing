<?php 

namespace Atomic\Core\View\Validator;

use Atomic\Core\View\Interfaces\ViewValidator;

class Validator implements ViewValidator
{
    /**
     * @var string
     */ 
    protected string $file;

    /**
     * Base directory where contains all views
     * 
     * @var string
     */ 
    public const BASE_DIR = '../views/';

    public function __construct(string $file)
    {
        $this->file = self::BASE_DIR . $file . '.php';
    }

    /**
     * Check if view exists
     * 
     * @return bool
     */ 
    public function validateFileExistence()
    {
        if (file_exists($this->file)) {
            return true;
        }
    }

    /**
     * Check file extension
     * 
     * @return bool
     */ 
    public function validateExtension()
    {
        $parsedFile = explode('.', $this->file);

        if (end($parsedFile) == 'php') {
            return true;
        }
    }

    /**
     * Validate file is file
     * 
     * @return bool
     */ 
    public function isFileEntity()
    {
        if (filetype($this->file) == 'file') {
            return true;
        }
    }
}
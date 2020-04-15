<?php 

namespace Atomic\Core\View\Validator;

use Atomic\Core\View\Interfaces\ViewValidator;

class Validator implements ViewValidator
{
    protected string $file;

    public const BASE_DIR = '../views/';

    public function __construct(string $file)
    {
        $this->file = self::BASE_DIR . $file . '.php';
    }

    public function validateFileExistence()
    {
        if (file_exists($this->file)) {
            return true;
        }
    }

    public function validateExtension()
    {
        $parsedFile = explode('.', $this->file);

        if (end($parsedFile) == 'php') {
            return true;
        }
    }

    public function isFileEntity()
    {
        if (filetype($this->file) == 'file') {
            return true;
        }
    }
}
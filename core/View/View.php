<?php 

namespace Atomic\Core\View;

use Atomic\Core\View\Validator\Validator;
use Atomic\Core\Exceptions\FileException;

class View
{
    /**
     * @var \Atomic\Core\View\Interfaces\ViewValidator|null
     */ 
    protected ?ViewValidator $validator = null;

    protected function validator(string $file)
    {
        return new Validator($file);
    }

    /**
     * Validate and require passed view
     * 
     * @param string $file 
     * @param array $data 
     * 
     * @return void 
     */ 
    public function generate(string $file, $data = [])
    {
        $this->validator = $this->validator($file);

        if (!$this->validator->isFileEntity()) {
            throw new FileException("Passed entity {$file} is not a file");
        }

        if (!$this->validator->validateFileExistence()) {
            throw new FileException("File {$file} is not exists");
        }

        if (!$this->validator->validateExtension()) {
            throw new FileException('Wrong file extension');
        }

        if (!empty($data)) {
            ob_start();
            extract($data);
            ob_get_clean();
        }

        return require_once $this->validator::BASE_DIR . $file . '.php';
    }
}
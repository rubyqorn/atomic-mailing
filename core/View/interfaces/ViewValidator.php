<?php 

namespace Atomic\Core\View\Interfaces;

interface ViewValidator
{
    /**
     * File extension vlidation
     * 
     * @return bool
     */ 
    public function validateExtension();

    /**
     * Validate if file is file
     * 
     * @return bool
     */ 
    public function isFileEntity();

    /**
     * File existence validation
     * 
     * @return bool
     */ 
    public function validateFileExistence();
}
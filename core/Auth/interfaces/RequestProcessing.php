<?php 

namespace Atomic\Core\Auth\Interfaces;

use Atomic\Core\Http\Request\Request;

interface RequestProcessing
{
    /**
     * Check if array is array
     * 
     * @param array $rulesArray
     * 
     * @return array|null
     */ 
    public function processing(array $rulesArray) :?array;

    /**
     * Validate rules fields with Validator class
     * 
     * @param \Atomic\Core\Http\Request\Request $request
     * @param array $rules
     * 
     * @return array
     */ 
    public function validate(Request $request, array $rules) :array;
}
<?php 

namespace Atomic\Core\Auth\Register;

use Atomic\Core\Auth\Interfaces\RequestProcessing;
use Atomic\Core\Request\Request;

class RegisterRequestProcessor implements RequestProcessing
{ 
    /**
     * Check if array is array
     * 
     * @param array $rulesArray
     * 
     * @return array|null
     */ 
    public function processing(array $rulesArray) :?array
    {
        if (is_array($rulesArray)) {
            return $rulesArray;
        }

        return false;
    }

    /**
     * Validate rules with Validator class
     * 
     * @param \Atomic\Core\Http\Request\Request $request 
     * @param array $rules 
     * 
     * @return array
     */ 
    public function validate(Request $request, array $rules) :array
    {
        return $request->validator($rules)->validate();
    }
}
<?php 

namespace Atomic\Core\Validator\Interfaces;

interface ValidateRule
{
    /**
     * Validate rule 
     * 
     * @param string $rule 
     */ 
    public static function validate(string $rule, $item);

    /**
     * Validate if rule contains in rules list
     * 
     * @param string $rule 
     * 
     * @return string|null
     */ 
    public static function validateRuleStatement(string $rule) :?string; 
}
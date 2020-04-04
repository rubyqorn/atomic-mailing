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

    public static function validateRuleStatement(string $rule) :string; 
}
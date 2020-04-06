<?php 

namespace Atomic\Core\Validator\Rules\Rule;

use Atomic\Core\Validator\Interfaces\ValidateRule;

class EmailRule implements ValidateRule 
{
    /**
     * Rule name which will be
     * use
     * 
     * @var string
     */ 
    private const EMAIL_RULE = 'email';

    /**
     * Validate rule if its corresponds to
     * email statement
     * 
     * @param string $rule 
     * @param string $item 
     * 
     * @return string
     */ 
    public static function validate(string $rule, $item)
    {
        if (self::validateRuleStatement($rule)) {
            return filter_var($item, FILTER_VALIDATE_EMAIL);    
        }
    }

    /**
     * Check if rule equal to constant
     * 
     * @param string $rule
     * 
     * @return string
     */ 
    public static function validateRuleStatement(string $rule) :?string
    {
        if (self::EMAIL_RULE == $rule) {
            return $rule;
        }

        return false;
    }
}
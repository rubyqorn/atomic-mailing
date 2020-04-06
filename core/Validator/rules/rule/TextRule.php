<?php 

namespace Atomic\Core\Validator\Rules\Rule;

use Atomic\Core\Validator\Interfaces\ValidateRule;
use Atomic\Core\Validator\Interfaces\ValuesComparison;

class TextRule implements ValidateRule, ValuesComparison
{
     /**
     * Available string size
     * 
     * @var int
     */ 
    private const MAX_SIZE = 500;

    /**
     * Rule name
     * 
     * @var string
     */ 
    private const TEXT_RULE = 'text';

    /**
     * Validate if string is not bigger than 500 symbols
     * 
     * @param string $rule 
     * @param string $item 
     * 
     * @return string
     */ 
    public static function validate(string $rule, $item)
    {
        if (self::validateRuleStatement($rule)) {
            return self::comparison($item, self::MAX_SIZE);
        }
    }

    /**
     * Validate rule name 
     * 
     * @param string $rule 
     * 
     * @return string
     */ 
    public static function validateRuleStatement(string $rule) :?string 
    {
        if (self::TEXT_RULE == $rule) {
            return $rule;
        }

        return false;
    }

    /**
     * Values comparison
     * 
     * @param string $externalItem
     * @param int $size 
     * 
     * @return string
     */ 
    public static function comparison(string $externalItem, int $size) 
    {
        if (strlen($externalItem) <= $size) {
            return $externalItem;
        }
    }
}
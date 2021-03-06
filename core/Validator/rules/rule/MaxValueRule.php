<?php 

namespace Atomic\Core\Validator\Rules\Rule;

use Atomic\Core\Validator\Interfaces\ValidateRule;
use Atomic\Core\Validator\Interfaces\ValuesComparison;

class MaxValueRule implements ValidateRule, ValuesComparison
{
    /**
     * Rule name which will be used
     * in validator
     * 
     * @var string
     */ 
    private const MAX_VALUE = 'max-val';

    /**
     * Validate if string more or less specified
     * value
     * 
     * @param string $rule 
     * @param string $item 
     * 
     * @return string
     */ 
    public static function validate(string $rule, $item)
    {
        $parsedRuleString = self::parseString($rule);
    
        if (self::validateRuleStatement($parsedRuleString['0'])) {
            return self::comparison($item, (int) $parsedRuleString['1']);
        }
    }

    /**
     * Check if specified rule corresponds to 
     * constant value
     * 
     * @param string $rule 
     * 
     * @return string
     */ 
    public static function validateRuleStatement(string $rule) :?string
    {
        if (self::MAX_VALUE == $rule) {
            return $rule;
        }

        return false;
    }

    /**
     * Parse string and get max value and get rule
     * name
     * 
     * @param string $maxValString
     * 
     * @return array
     */ 
    protected static function parseString(string $maxValString)
    {
        return explode('|', $maxValString);
    }

    /**
     * Values comparison
     * 
     * @param string $externalItem
     * @param int $size
     * 
     * @return string
     */ 
    public static function comparison($externalItem, int $size)
    {
        if (strlen($externalItem) <= $size) {
            return $externalItem;
        }
    }
}
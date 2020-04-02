<?php 

namespace Atomic\Core\Validator\Rules;

class RuleAnalyzer
{
    /**
     * Rule name with value
     * 
     * @var string
     */ 
    protected static $rule;

    /**
     * Delimiter which we use to pass
     * a value in rule statement
     * 
     * @var string
     */ 
    private const DELIMITER = '|';

    public static function analyze(string $rule)
    {
        self::$rule = $rule;

        return self::containsDelimiter(self::$rule);
    }

    /**
     * Validate if rule string contains delimeter
     * 
     * @param string $rule 
     * 
     * @return string
     */ 
    protected static function containsDelimiter(string $rule)
    {
        if (strpos($rule, self::DELIMITER)) {
            return $rule;
        }
    }     
}
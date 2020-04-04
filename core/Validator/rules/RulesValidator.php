<?php 

namespace Atomic\Core\Validator\Rules;

use Atomic\Core\Exceptions\InvalidArguments;

class RulesValidator extends Rules 
{
    /**
     * Rule name 
     * 
     * @var string
     */ 
    protected $rule;

    public function __construct(string $rule)
    {
        $this->rule = $rule;
    }

    /**
     * Check if rule exists in rules array
     * 
     * @return bool
     */ 
    protected function validateRule()
    {
        if (in_array($this->rule, $this->rulesList)) {
            return true;
        }
        
        if (!strpos($this->rule, '|')) {
            throw new InvalidArguments('Wrong rule name. Rule name doesn\'t exists');
        }

        $rule = substr($this->rule, 0, strpos($this->rule, '|'));

        if (in_array($rule, $this->rulesList)) {
            return true;
        }
    }

    /**
     * Parse rule string if its contains
     * | symbol
     * 
     * @param string
     * 
     * @return array
     */ 
    public function parseRuleString()
    {
        $rule = RuleAnalyzer::analyze($this->rule);
        
        return explode('|', $rule);
    }
}
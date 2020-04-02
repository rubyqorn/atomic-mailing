<?php 

namespace Atomic\Core\Validator\Rules;

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
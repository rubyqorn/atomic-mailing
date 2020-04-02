<?php 

namespace Atomic\Core\Validator\Rules;

class Rules
{
    /**
     * List of available rules
     * 
     * @var array
     */ 
    protected $rulesList = [
        'text', 'small-string', 'email', 'image', 'min-val', 'max-val'
    ];
}
<?php

namespace Atomic\Core\Validator;

use Atomic\Core\Validator\Rules\RulesValidator;
use Atomic\Core\Exceptions\InvalidArguments;
use Atomic\Core\Validator\Rules\Rule\{
    EmailRule,
    ImageRule,
    TextRule,
    MinValRule,
    MaxValRule,
    SmallStringRule
};

class Validator extends RulesValidator
{
    /**
     * Passed rules 
     * 
     * @var array
     */ 
    protected array $rules;

    /**
     * Status of validated rule
     * 
     * @var array
     */ 
    protected array $ruleStatus = [];

    /**
     * @var \Atomic\Core\Validator\Interfaces\ContentBag|null
     */
    private ?ContentBag $errorbag = null;

    /**
     * @var \Atomic\Core\Validator\Interfaces\ContentBag|null
     * */ 
    private ?ContentBag $contentBag = null;

    protected array $errors = [];

    protected array $content = [];

    public function __construct(array $rules)
    {
        $this->rules = $rules;
        $this->errorBag = new ErrorBag();
        $this->contentBag = new ValidatedContentBag();

        foreach($this->rules as $field => $rule) {
            parent::__construct($rule);
            $this->ruleStatus[$field] = $this->validateRule();
        }
    }

    /**
     * Validate fields by rule name
     */ 
    public function validate()
    {   
        if (isset($_POST)) {

            foreach($this->rules as $field => $rule) {

                switch($rule) {
                    case 'email': 
                        return EmailRule::validate($rule, $_POST[$field]);
                    break;

                    case 'image': 
                        return ImageRule::validate($rule, $_POST[$field]);
                    break;

                    case 'max-val': 
                        return MaxValRule::validate($rule, $_POST[$field]);
                    break;

                    case 'min-val': 
                        return MinValRule::validate($rule, $_POST[$field]);
                    break;

                    case 'small-string': 
                        return SmallStringRule::validate($rule, $_POST[$field]);
                    break;

                    case 'text':
                        return TextRule::validate($rule, $_POST[$field]);
                    break;

                    default: 
                        throw new InvalidArguments('Rule name doesn\'t exists');
                    break;
                }

            }

        }
    }
}
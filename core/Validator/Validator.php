<?php

namespace Atomic\Core\Validator;

use Atomic\Core\Validator\Rules\RulesValidator;
use Atomic\Core\Exceptions\InvalidArguments;
use Atomic\Core\Validator\Interfaces\ContentBag;
use Atomic\Core\Validator\Rules\Rule\{
    EmailRule,
    ImageRule,
    TextRule,
    MinValueRule,
    MaxValueRule,
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

    /**
     * All validation errors
     * 
     * @var array
     */ 
    protected array $errors = [];

    /**
     * All validated content
     * 
     * @var array
     */ 
    protected array $content = [];

    /**
     * Min or max rule name
     * 
     * @var string
     */ 
    protected $rangeRule;

    public function __construct(array $rules)
    {
        $this->rules = $rules;
        $this->errorBag = new ErrorBag();
        $this->contentBag = new ValidatedContentBag();

        foreach($this->rules as $field => $rule) {

            $this->matchRangeRule($rule);

            parent::__construct($this->rangeRule ? $this->rangeRule : $rule);

            $this->ruleStatus[$field] = $this->validateRule();
        }
    }

    /**
     * Validate fields by rule name and field
     * and if exists error return array with 
     * errors or validated content
     * 
     * @return array|null
     */ 
    public function validate() :?array
    {   
        if (isset($_POST)) {

            foreach($this->rules as $field => $rule) {

                $this->matchRangeRule($rule);

                switch($this->rangeRule ? $this->rangeRule : $rule) {
                    case 'email': 
                        $this->email($rule, $_POST[$field], $field);
                    break;

                    case 'image': 
                        $this->image($rule, $_POST[$field], $field);
                    break;

                    case 'max-val': 
                        $this->max($rule, $_POST[$field], $field);
                    break;

                    case 'min-val': 
                        $this->min($rule, $_POST[$field], $field);
                    break;

                    case 'small-string': 
                        $this->smallStr($rule, $_POST[$field], $field);
                    break;

                    case 'text':
                        $this->text($rule, $_POST[$field], $field);
                    break;

                    default: 
                        throw new InvalidArguments('Rule name doesn\'t exists');
                    break;
                }

            }

            $this->errors = $this->errorBag->getAll();
            $this->content = $this->contentBag->getAll();

            if (!empty($this->errors)) {
                return $this->errors;
            }

            return $this->content;
        }
    }

    /**
     * Return trimed rule name if match 
     * with regular expression pattern
     * 
     * @param string $rule 
     * 
     * @return string
     */ 
    private function matchRangeRule(string $rule) 
    {
        if (preg_match("#min-val|.#", $rule) || preg_match('#max-val|.#', $rule)) {
            return $this->rangeRule = substr($rule, 0, strpos($rule, '|')); 
        }
    }

    /**
     * Validate email field
     * 
     * @param string $rule 
     * @param string $field 
     * 
     * @return string
     */ 
    protected function email(string $rule, string $field, string $fieldName) :string
    {
        $validation = EmailRule::validate($rule, $field);

        if ($validation == false) {
            return $this->errorBag->recording(
                'Typed email doesn\'t match with pattern'
            );
        }

        return $this->contentBag->recording($validation, $fieldName);
    }

    /**
     * Validate image field
     * 
     * @param string $rule 
     * @param string $field 
     * 
     * @return string
     */
    protected function image(string $rule, string $field, string $fieldName) :string
    {
        $validation = ImageRule::validate($rule, $field);

        if ($validation == false) {
            return $this->errorBag->recording(
                'Format of file have to be like png, jpeg, bmp, webp or gif'
            );
        }

        return $this->contentBag->recording($validation, $fieldName);
    }

    /**
     * Validate field by string length
     * 
     * @param string $rule 
     * @param string $field 
     * 
     * @return string
     */
    protected function max(string $rule, string $field, string $fieldName) :string
    {
        $validation = MaxValueRule::validate($rule, $field);

        if ($validation == false) {
            return $this->errorBag->recording(
                'Field content exseeds the limit'
            );
        }

        return $this->contentBag->recording($validation, $fieldName);
    }

    /**
     * Validate field by string length
     * 
     * @param string $rule 
     * @param string $field 
     * 
     * @return string
     */
    protected function min(string $rule, string $field, string $fieldName) :string
    {
        $validation = MinValueRule::validate($rule, $field);

        if ($validation == false) {
            return $this->errorBag->recording(
                'Field content exseeds the limit'
            );
        }

        return $this->contentBag->recording($validation, $fieldName);
    }

    /**
     * Validate field by string length.
     * Its doesn't have to be bigger 
     * than 90 symbols
     * 
     * @param string $rule 
     * @param string $field 
     * 
     * @return string
     */
    protected function smallStr(string $rule, string $field, string $fieldName) :string
    {
        $validation = SmallStringRule::validate($rule, $field);

        if ($validation == false) {
            return $this->errorBag->recording(
                'Field content exseeds 90 symbols'
            );
        }

        return $this->contentBag->recording($validation, $fieldName);
    }

    /**
     * Validate field by string length.
     * Its doesn't have to be bigger 
     * than 500 symbols
     * 
     * @param string $rule 
     * @param string $field 
     * 
     * @return string
     */
    protected function text(string $rule, string $field, string $fieldName) :string
    {
        $validation = TextRule::validate($rule, $field);

        if ($validation == false) {
            return $this->errorBag->recording(
                'Field content exseeds 500 symbols'
            );
        }

        return $this->contentBag->recording($validation, $fieldName);
    } 
}
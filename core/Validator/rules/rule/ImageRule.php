<?php 

namespace Atomic\Core\Validator\Rules\Rule;

use Atomic\Core\Validator\Interfaces\ValidateRule;

class ImageRule implements ValidateRule
{
    /**
     * Rule name which we have
     * to pass into validate
     * method
     * 
     * @var string
     */ 
    private const IMAGE_RULE = 'image';

    /**
     * List of available file extensions
     * 
     * @var array
     */ 
    private static $extensions = [
        'jpg', 'png', 'gif', 'bmp', 'webp'
    ];

    /**
     * Validate rule name and image file for availibility
     * of jpeg, bmp, png, webp and gif extensions
     * 
     * @param string $rule 
     * @param string $item
     * 
     * @return string
     */ 
    public static function validate(string $rule, $item)
    {
        if (self::validateRuleStatement($rule)) {
            return self::validateImageString($item);
        }
    }

    /**
     * Validate rule statemen
     * 
     * @param string $rule 
     * 
     * @return string
     */ 
    public static function validateRuleStatement(string $rule) :string
    {
        if (self::IMAGE_RULE == $rule) {
            return $rule;
        }
    }

    /**
     * Parse file string and get extension name
     * 
     * @param string $imageString
     * 
     * @return array
     */ 
    protected static function parseImageString(string $imageString)
    {
        return explode('.', $imageString);
    }

    /**
     * Check if extension name exists in extensions array
     * 
     * @param string $imageString
     * 
     * @return string
     */ 
    protected static function validateImageString(string $imageString)
    {
        $fileExtension = self::parseImageString($imageString);

        if (in_array($fileExtension['1'], array_values(self::$extensions))) {
            return $imageString;
        }
    }
}
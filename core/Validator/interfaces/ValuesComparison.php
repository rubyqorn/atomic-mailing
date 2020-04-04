<?php 

namespace Atomic\Core\Validator\Interfaces;

interface ValuesComparison
{
    /**
     * Values comparison
     * 
     * @param string $externalItem
     * @param int $size 
     * 
     * @return string
     */ 
    public static function comparison(string $externalItem, int $size);
}
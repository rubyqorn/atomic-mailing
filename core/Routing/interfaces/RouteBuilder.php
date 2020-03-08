<?php 

namespace Atomic\Core\Routing\Interfaces;

interface RouteBuilder
{
    /**
     * Insert needed file and pass into
     * parent constructor method
     */ 
    public function __construct(string $file);

    /**
     * Check file format and extract
     * it
     * 
     * @return array
     */ 
    public function build() : array;
}
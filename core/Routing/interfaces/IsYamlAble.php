<?php 

namespace Atomic\Core\Routing\Intefaces;

interface IsYamlAble
{
    /**
     * Have to pass a YAML file
     * 
     * @param string
     */ 
    public function __construct(string $yamlFile);

    /**
     * Validate an extension
     * 
     * @return bool
     * @throws \Atomic\Core\Exceptions\InvalidArguments
     */ 
    public function is() : bool;
}
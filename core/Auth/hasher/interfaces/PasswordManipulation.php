<?php 

namespace Atomic\Core\Auth\Hasher\Interfaces;

interface PasswordManipulation
{
    /**
     * @param string $password 
     * @return string
     * */ 
    public function manipulate(string $password) :string;
}
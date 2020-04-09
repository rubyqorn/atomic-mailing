<?php 

namespace Atomic\Core\Auth\Interfaces;

interface Process
{
    /**
     * Return instance of RequestProcessor classes
     * 
     * @return \Atomic\Core\Auth\Interfaces\RequestProcessor 
     */ 
    public function getProcessor() :RequestProcessing; 
}
<?php 

namespace Atomic\Core\Auth\Interfaces;

interface Process
{
    /**
     * Return instance of RequestProcessor classes
     * 
     * @param \Atomic\Core\Auth\Interfaces\RequestProcessor $processor
     * 
     * @return \Atomic\Core\Auth\Interfaces\RequestProcessor 
     */ 
    public function getProcessor(RequestProcessing $processor) :RequestProcessing; 
}
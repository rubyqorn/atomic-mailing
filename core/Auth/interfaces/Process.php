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

    /**
     * Request processing
     * 
     * @param \Atomic\Core\Http\Request\Request $request 
     * @param array $rules 
     * 
     * @return array|\Atomic\Core\Auth\Interfaces\Process
     */ 
    public function handle(array $rules);
}
<?php 

namespace Atomic\Core\Http\Interfaces;

interface Http
{
    /**
     * Get headers from resource
     * 
     * @return array
     */ 
    public function getHeaders() : array;

    /**
     * Set HTTP headers using php header() function
     * 
     * @param string $header 
     * @param string $value 
     * 
     * @return void
     */ 
    public function setHeaders(string $header, string $value);
}
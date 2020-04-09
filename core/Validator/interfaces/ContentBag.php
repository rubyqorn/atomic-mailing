<?php 

namespace Atomic\Core\Validator\Interfaces;

interface ContentBag
{
    /**
     * Record content into array
     * 
     * @param string $message 
     * 
     * @return array
     */ 
    public function recording(string $message, $field = []);

    /**
     * Get all recorded messages 
     * 
     * @return array
     */ 
    public function getAll() :array;
}
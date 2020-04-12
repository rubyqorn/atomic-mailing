<?php 

namespace Atomic\Core\Messaging\Interfaces;

interface ResourceManipulator
{
    /**
     * @param mixed
     * @return resource
     */ 
    public function getResource($resource);

    /**
     * @param mixed 
     * @return void
     */ 
    public function setResource($resource);
}
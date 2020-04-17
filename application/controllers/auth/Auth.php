<?php 

namespace Atomic\Application\Controllers\Auth;

interface Auth 
{
    /**
     * @return void
     */ 
    public function showForm();

    /**
     * Request processing
     * 
     * @return void
     */ 
    public function auth();
}
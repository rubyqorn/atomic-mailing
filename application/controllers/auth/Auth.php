<?php 

namespace Atomic\Application\Controllers\Auth;

interface Auth 
{
    public function showForm();

    public function auth();
}
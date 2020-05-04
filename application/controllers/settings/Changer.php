<?php 

namespace Atomic\Application\Controllers\Settings;

use Atomic\Core\Http\Request\Request;

interface Changer
{
    /**
     * @param \Atomic\Core\Http\Request\Request
     */ 
    public function validateRequest(Request $request);

    /**
     * @param array $userSettings
     */ 
    public function update(array $userSettings);
}
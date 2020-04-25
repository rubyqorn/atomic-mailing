<?php 

namespace Atomic\Application\Controllers;

use Atomic\Application\Models\User;
use Atomic\Application\Models\Website;

abstract class AbstractUserSettingsController extends Controller 
{
    /**
     * @var \Atomic\Application\Models\User|null
     */ 
    protected ?User $user = null;

    /**
     * @var \Atomic\Application\Models\Website|null
     */ 
    protected ?Website $website = null;

    public function __construct()
    {
        parent::__construct();
        
        $this->user = new User();
        $this->website = new Website();
    }

    /**
     * Show needed page
     * 
     * @return void
     */ 
    abstract public function show();
}
<?php 

namespace Atomic\Core\Routing\Interfaces;

use Atomic\Core\Routing\Displaying\Route\Item;

interface RouteHandler
{
    /**
     * Constructor
     * 
     * @return \Atomic\Core\Routing\Displaying\Route\Item
     */ 
    public function __construct(Item $route);

    /**
     * Validate route at availibility of parameters.
     * Create instance and call method.
     * 
     * @return mixed
     */ 
    public function handle();
}
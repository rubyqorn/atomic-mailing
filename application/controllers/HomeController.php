<?php 

namespace Atomic\Application\Controllers;

class HomeController extends Controller
{
    /**
     * @return void
     */ 
    public function showPage()
    {
        return $this->view->generate('home');
    }
}
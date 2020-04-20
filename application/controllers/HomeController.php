<?php 

namespace Atomic\Application\Controllers;

class HomeController extends Controller
{
    /**
     * @var string
     */ 
    protected string $title = 'Home';

    /**
     * @return void
     */ 
    public function showPage()
    {
        if (CookieController::check('loged_in', 'login')) {
            return $this->view->generate('home', [
                'title' => $this->title
            ]);
        }

    }
}
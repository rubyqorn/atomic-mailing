<?php 

namespace Atomic\Application\Controllers;

use Atomic\Application\Models\User;

class HomeController extends Controller
{
    /**
     * @var string
     */ 
    protected string $title = 'Home';

    /**
     * Data of auth user
     * 
     * @var array
     */ 
    protected array $authUser;

    /**
     * @var \Atomic\Application\Models\User|null
     */ 
    private ?User $user = null;

    public function __construct()
    {
        parent::__construct();

        $this->user = new User;
    }

    /**
     * Show page of auth user
     * 
     * @return void
     */ 
    public function showPage()
    {
        if (!CookieController::check('loged_in')) {
            return $this->response->redirect('/login');   
        }

        $this->authUser = $this->user->authUser(
            $this->request->cookie('loged_in')
        );

        return $this->view->generate('home', [
            'title' => $this->title,
            'user' => $this->authUser
        ]); 
        
         
    }
}
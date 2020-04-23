<?php 

namespace Atomic\Application\Controllers;

use Atomic\Application\Models\User;
use Atomic\Application\Models\Message;
use Atomic\Application\Controllers\Ajax\AjaxController;

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
     * @var array
     */ 
    protected array $messages;

    /**
     * @var array
     */ 
    protected array $ajaxData = [];

    /**
     * @var \Atomic\Application\Models\User|null
     */ 
    private ?User $user = null;

    /**
     * @var \Atomic\Application\Models\User|null
     */ 
    private ?Message $message = null;

    public function __construct()
    {
        parent::__construct();

        $this->user = new User;
        $this->message = new Message;
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
        $this->messages = $this->message->userMessages(
            $this->authUser['0']['id']
        );
        
        return $this->view->generate('home', [
            'title' => $this->title,
            'user' => $this->authUser,
            'messages' => $this->messages
        ]); 
    }
}
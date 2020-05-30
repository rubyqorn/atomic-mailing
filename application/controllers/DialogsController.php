<?php 

namespace Atomic\Application\Controllers;

use Atomic\Application\Models\Dialog;
use Atomic\Application\Models\User;

class DialogsController extends Controller 
{
    /**
     * @var \Atomic\Application\Models\User|null
     */ 
    protected ?User $user;

    public function __construct()
    {
        parent::__construct();
        $this->user = new User();
    }

    /**
     * Get dialogs by $id property
     * 
     * @param string|int $id 
     * 
     * @return array
     */ 
    public function dialog($id)
    {
        $dialog = new Dialog();

        $dialogContent = $dialog->getDialogById( $id);
        return $this->view->generate('dialog', [
            'dialog' => $dialogContent
        ]);
    }
}
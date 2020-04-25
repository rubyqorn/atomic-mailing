<?php 

namespace Atomic\Application\Controllers;

class SettingsController extends AbstractUserSettingsController 
{
    /**
     * @var string
     */ 
    public $title = 'Settings';

    /**
     * List of user settings 
     * 
     * @var array
     */ 
    protected array $userSettings = [];

    /**
     * List of setted user
     * websites
     * 
     * @var array
     */ 
    protected array $userWebsites = [];

    /**
     * User settings 
     * 
     * @return void
     */ 
    public function show()
    {
        if (!CookieController::check('loged_in')) {
            return $this->response->redirect('/login');
        }

        $this->userSettings = $this->user->authUser(
            $this->request->cookie('loged_in')
        );

        $this->userWebsites = $this->website->userWebsites(
            $this->userSettings['0']['email']
        );

        return $this->view->generate('settings', [
            'title' => $this->title,
            'settings' => $this->userSettings,
            'websites' => $this->userWebsites
        ]);
    }
}
<?php 

namespace Atomic\Application\Controllers;

class AccountController extends AbstractUserSettingsController 
{
    /**
     * @var string
     */ 
    public $title = 'Account';

    /**
     * List of setted account
     * settings 
     * 
     * @var array
     */ 
    protected array $accountSettings = [];

    /**
     * List of setted user 
     * websites like twitter and etc
     * 
     * @var array
     */ 
    protected array $userWebsites = [];

    /**
     * Show account settings
     * 
     * @return void 
     */ 
    public function show()
    {
        if (!CookieController::check('loged_in')) {
            return $this->response->redirect('/login');
        }

        $this->accountSettings = $this->user->authUser(
            $this->request->cookie('loged_in')
        );

        $this->userWebsites = $this->website->userWebsites(
            $this->accountSettings['0']['email']
        );

        return $this->view->generate('account', [
            'title' => $this->title,
            'account' => $this->accountSettings,
            'websites' => $this->userWebsites
        ]);
    }
}
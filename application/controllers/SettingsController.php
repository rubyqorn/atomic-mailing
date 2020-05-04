<?php 

namespace Atomic\Application\Controllers;

use Atomic\Application\Controllers\Ajax\AjaxController;
use Atomic\Application\Controllers\Settings\UserNameChangerController;
use Atomic\Application\Controllers\Settings\UserWebsiteChangerController;

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
     * @var array
     */ 
    protected array $ajaxData = [];

    /**
    * @var \Atomic\Application\Controllers\Settings\UserWebsiteChangerController
    */ 
    protected $websiteChanger;

    /**
    * @var \Atomic\Application\Controllers\Settings\UserNameChangerController
    */ 
    protected $userNameChanger;

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

    /**
     * Update user settings (name, website)
     * 
     * @return void
     */ 
    public function updateSettings()
    {
        $this->ajaxData = AjaxController::getData($this->request);

        if (!empty($this->ajaxData['website'])) {
            $this->websiteChanger = new UserWebsiteChangerController();
            $validation = $this->websiteChanger->validateRequest($this->request);

            if ($validation == 'Validation problem') {
                return print $validation;
            }

            return $validation->update($this->ajaxData);
        }

        unset($this->ajaxData['website']);

        $this->userNameChanger = new UserNameChangerController();
        $validation = $this->userNameChanger->validateRequest($this->request);

        if ($validation == 'Validation error') {
            return print $validation;
        }

        return $validation->update($this->ajaxData);
    }

}
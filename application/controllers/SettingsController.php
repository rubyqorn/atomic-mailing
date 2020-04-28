<?php 

namespace Atomic\Application\Controllers;

use Atomic\Application\Controllers\Ajax\AjaxController;
use Atomic\Application\Controllers\Auth\ForgotPasswordController;

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
     * @var \Atomic\Application\Controllers\Auth\ForgotPasswordController|null
     */ 
    protected ?ForgotPasswordController $password;

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
     * Update user settings (password, name, website)
     * 
     * @return void
     */ 
    public function updateSettings()
    {
        $this->ajaxData = AjaxController::getData($this->request);
        $this->password = new ForgotPasswordController();

        if (!empty($this->ajaxData['password']) && !empty($this->ajaxData['confirmation'])) {
            $confirmation = $this->password->confirmation();
            $validation = $this->request->validator([
                'name' => 'min-val|3',
                'email' => 'email',
                'password' => 'min-val|6',
                'confirmation' => 'min-val|6'
            ]);

            if ($confirmation == 'Password mismatch') {
                return print $confirmation;
            }

            return $confirmation;
        }

        if (!empty($this->ajaxData['website'])) {
            $validation = $this->request->validator([
                'name' => 'min-val|3',
                'email' => 'email',
                'website' => 'small-string'
            ]);

            if (!$validation) {
                return print 'Processing error';
            }

            $userData = [
                'name' => $this->ajaxData['name'],
                'website' => $this->ajaxData['website']
            ];
            return $this->user->updateUserSettings($this->request, $userData);
        }

        if (empty($this->ajaxData['website'])) {
            $validation = $this->request->validator([
                'name' => 'min-val|3',
                'email' => 'email',
            ]);

            if (!$validation) {
                return print 'Processing error';
            }

            $userData = [
                'name' => $this->ajaxData['name'],
            ];
            return $this->user->updateUserSettings($this->request, $userData);
        }


        
    }

}
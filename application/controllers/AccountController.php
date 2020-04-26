<?php 

namespace Atomic\Application\Controllers;

use Atomic\Application\Controllers\Ajax\AjaxController;

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
     * @var array
     */ 
    protected array $userData = [];

    /**
     * Name of column in websites table
     * 
     * @var string
     */ 
    protected string $columnName;

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

    /**
     * User name, email, website name updating
     * 
     * @return void
     */ 
    public function updateDefaultInfo()
    {
        $this->userData = AjaxController::getData($this->request);

        $validation = $this->request->validator([
            'email' => 'email',
            'name' => 'min-val|6'
        ]);

        if (!$validation) {
            return print 'Processing error';
        }

        $email = $this->userData['email'];
        $userData = array_values($this->userData);

        return $this->user->update()->set(
            'name = ?, website = ?, email = ?', 
            $userData
        )->where(" email = '{$email}' ")->push();

    }

    /**
     * Update user websites like vk, twitter
     * and discord
     * 
     * @return void
     */ 
    public function updateSocialLinks()
    {
        $this->userData = AjaxController::getData($this->request);

        if (!preg_match("#https:\/\/(vk\.com|twitter\.com|discordapp\.com)\/.#", 
            $this->userData['website'])
        ) {
            return print "Website is not exists";
        }

        $email = $this->request->cookie('loged_in');
        $this->columnName = $this->parseWebsiteString($this->userData['website']);

        return $this->website->update()->set(" {$this->columnName} = ? ",
            array_values($this->userData)
        )->where(" user_email = '{$email}' ")->push();

    }

    /**
     * Return name of resource. This we need
     * for dynamic column name setting
     * 
     * @param string $website 
     * 
     * @return string
     */ 
    protected function parseWebsiteString(string $website)
    {
        $parsedURL = explode('/', $website);
        $parsedResources = explode('.', $parsedURL['2']);

        return $parsedResources['0'];
        
    }
}
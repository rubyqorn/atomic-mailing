<?php 

namespace Atomic\Application\Controllers\Settings;

use Atomic\Application\Controllers\SettingsController;
use Atomic\Application\Models\User;
use Atomic\Core\Http\Request\Request;

class UserWebsiteChangerController extends SettingsController implements Changer
{
    /**
     * @var \Atomic\Application\Models\User|null
     */ 
    protected ?User $user = null;

    /**
     * Update user info
     * 
     * @param array $userSettings
     * 
     * @return void
     */ 
    public function update(array $userSettings)
    {
        $this->user = new User();
        $userData = array_values($userSettings);

        return $this->user->update()->set('name = ?, email = ?, website = ?', $userData)
                    ->where(" email = '{$this->request->cookie('loged_in')}' ")
                    ->push();
    }

    /**
     * Validate request data using validation
     * rules
     * 
     * @param \Atomic\Core\Http\Request\Request $request 
     * 
     * @return string|\Atomic\Application\Controllers\Settings\UserWebsiteChangerController 
     */ 
    public function validateRequest(Request $request)
    {
        $validation = $request->validator([
            'name' => 'min-val|6',
            'email' => 'email',
            'website' => 'small-string'
        ]);

        if (!$validation) {
            return 'Validation problem';
        }

        return $this;
    }
}
<?php 

namespace Atomic\Application\Controllers\Auth;

use Atomic\Application\Controllers\CookieController;
use Atomic\Application\Controllers\Controller;

class LogoutController extends Controller 
{
    /**
     * Delete cookies and redirect at login page 
     * 
     * @return void
     */ 
    public function logout()
    {
        if (CookieController::check('loged_in')) {
            $this->response->setCookies('loged_in', '', time() - 3600);
            return $this->response->redirect('/login');
        }

        return $this->response->redirect('/login');
    }
}
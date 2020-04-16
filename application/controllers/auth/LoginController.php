<?php 

namespace Atomic\Application\Controllers\Auth;

use Atomic\Application\Controllers\Ajax\AjaxController;
use Atomic\Application\Controllers\Controller;
use Atomic\Application\Controllers\Auth\Auth;
use Atomic\Core\Auth\Authorization;

class LoginController extends Controller implements Auth
{
    protected array $ajaxData = [];

    /**
     * @return void
     */ 
    public function showForm()
    {
        return $this->view->generate('auth/auth');
    }

    public function auth()
    {
        $this->ajaxData = AjaxController::getData($this->request);
        $this->login = new Authorization($this->request, $this->response);

        $message = $this->login->login($this->request)->handle([
            'email' => 'email',
            'password' => 'min-val|6'
        ]);

        if (!$message === 'Wrong email or password') {
            return $this->login->setCookies(
                $this->response,
                'loged-in',
                $this->request->post('email'),
                time() + 86400
            );
        }

        echo $message;
    }
}
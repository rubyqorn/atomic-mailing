<?php 

namespace Atomic\Application\Controllers\Auth;

use Atomic\Application\Controllers\Ajax\AjaxController;
use Atomic\Application\Controllers\Controller;
use Atomic\Application\Controllers\Auth\Auth;
use Atomic\Core\Auth\Authorization;

class LoginController extends Controller implements Auth
{
    /**
     * @var array
     */ 
    protected array $ajaxData = [];

    /**
     * @var string
     */ 
    protected string $title = 'Login';

    /**
     * @return void
     */ 
    public function showForm()
    {
        if (CookieController::check('loged_in', 'home')) {
            return $this->response->redirect('/home');
        }

        return $this->view->generate('auth/auth', [
            'title' => $this->title
        ]);
    }

    /**
     * User authorization 
     * 
     * @return void
     */ 
    public function auth()
    {
        $this->ajaxData = AjaxController::getData($this->request);
        $this->login = new Authorization($this->request, $this->response);

        $message = $this->login->login($this->request)->handle([
            'email' => 'email',
            'password' => 'min-val|6'
        ]);

        if ($message === 'Wrong email or password') {
            return $this->response->redirect($this->request->server('HTTP_REFERER'));
        }

        $this->login->login($this->request)->makeCookies(
            $this->response, 'loged_in', 
            $this->request->post('email'), 
            time() + 86400
        );

        return $this->response->setHeaders('Location', '/home');
    }
}
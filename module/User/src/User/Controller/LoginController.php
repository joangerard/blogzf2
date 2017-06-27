<?php
/**
 * Created by PhpStorm.
 * User: sebastian.gerard
 * Date: 6/26/2017
 * Time: 4:17 PM
 */

namespace User\Controller;

use function PHPSTORM_META\elementType;
use User\Service\AuthenticationService;
use Zend\Form\FormInterface;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\Session\Container;
use Zend\View\Model\ViewModel;

class LoginController extends AbstractActionController {
    protected $authenticationService;
    protected $loginForm;

    public function __construct(
        AuthenticationService $authenticationService,
        FormInterface $loginForm
    )
    {
        $this->authenticationService = $authenticationService;
        $this->loginForm = $loginForm;
    }

    public function loginAction(){
        $request = $this->getRequest();
        if($request->isPost()){
            $username = $request->getPost('username');
            $password = $request->getPost('password');

            $user = $this->authenticationService->LogIn($username,$password);

            if(NULL !== $user){
                $authSession = new Container('auth');
                $authSession->user = $user;
                $this->redirect()->toRoute('logged');
            }
            else{
                $this->redirect()->toRoute('notlogged');
            }
        }
        return new ViewModel(array(
            'form' => $this->loginForm
        ));
    }

    public function loggedAction(){
        $authSession = new Container('auth');
        if($authSession->offsetGet('user') === NULL){
            return $this->redirect()->toRoute('login');
        }

        return $this->redirect()->toRoute('blog');
    }

    public function logoutAction(){
        $authSession = new Container('auth');
        $authSession->offsetUnset('user');
        $this->redirect()->toRoute('login');
    }

    public function notLoggedAction(){
        //todo
    }
}
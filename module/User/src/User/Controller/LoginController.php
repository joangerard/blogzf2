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
use User\Service\SessionService;
use Zend\Form\FormInterface;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class LoginController extends AbstractActionController {
    protected $authenticationService;
    protected $sessionService;
    protected $loginForm;

    public function __construct(
        AuthenticationService $authenticationService,
        FormInterface $loginForm,
        SessionService $sessionService
    )
    {
        $this->authenticationService = $authenticationService;
        $this->loginForm = $loginForm;
        $this->sessionService = $sessionService;
    }

    public function loginAction(){
        $request = $this->getRequest();
        if($request->isPost()){
            $username = $request->getPost('username');
            $password = $request->getPost('password');

            $user = $this->authenticationService->LogIn($username,$password);

            if(NULL !== $user){
                $this->sessionService->save('auth','user',$user);
                $this->sessionService->save('auth','userId',$user->getId());
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
        $user = $this->sessionService->getSession('auth','user');
        if($user === NULL){
            return $this->redirect()->toRoute('login');
        }

        return $this->redirect()->toRoute('blog');
    }

    public function logoutAction(){
        $this->sessionService->unsetSession('auth','user');
        $this->redirect()->toRoute('login');
    }

    public function notLoggedAction(){
        //todo
    }
}
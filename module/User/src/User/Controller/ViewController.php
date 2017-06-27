<?php
/**
 * Created by PhpStorm.
 * User: sebastian.gerard
 * Date: 6/23/2017
 * Time: 4:56 PM
 */

namespace User\Controller;

use User\Service\UserServiceInterface;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ViewController extends AbstractActionController {
    protected $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    public function indexAction()
    {
        return new ViewModel(array(
            'user' =>$this->userService->find(2)
        ));
    }
}
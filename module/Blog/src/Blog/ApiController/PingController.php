<?php
/**
 * Created by PhpStorm.
 * User: sebastian.gerard
 * Date: 7/18/2017
 * Time: 2:25 PM
 */
namespace Blog\ApiController;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class PingController extends AbstractActionController
{
    public function pingAction()
    {
        return new ViewModel([
            'ack' => time()
        ]);
    }
}
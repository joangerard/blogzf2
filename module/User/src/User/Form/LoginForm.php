<?php
/**
 * Created by PhpStorm.
 * User: sebastian.gerard
 * Date: 6/26/2017
 * Time: 5:22 PM
 */

namespace User\Form;

use Zend\Form\Form;

class LoginForm extends Form{
    public function __construct($name = null, array $options = array())
    {
        parent::__construct($name, $options);

        $this->add(array(
            'type'=> 'text',
            'name'=>'username',
            'attributes'=>[
                'placeholder' => 'Username',
                'class' =>'form-control'
            ]
        ));

        $this->add(array(
            'type'=> 'password',
            'name'=>'password',
            'attributes'=>[
                'class' =>'form-control'
            ]
        ));

        $this->add(array(
            'type' => 'submit',
            'name' => 'submit',
            'attributes' => array(
                'value' => 'Login',
                'class' => 'btn btn-info'
            )
        ));
    }
}
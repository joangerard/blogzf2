<?php
/**
 * Created by PhpStorm.
 * User: sebastian.gerard
 * Date: 6/20/2017
 * Time: 5:31 PM
 */

namespace Blog\Form;

use Zend\Form\Form;

class PostForm extends Form
{
    public function __construct($name = null, $options = array())
    {
        parent::__construct($name, $options);

        $this->add(array(
            'name' => 'post-fieldset',
            'type' => 'Blog\Form\PostFieldset',
            'options' => array(
                'use_as_base_fieldset' => true
            )
        ));

        $this->add(array(
            'type' => 'submit',
            'name' => 'submit',
            'attributes' => array(
                'value' => 'Insert new Post',
                'class' => 'btn btn-info'
            )
        ));
    }
}
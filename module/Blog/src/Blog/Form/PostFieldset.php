<?php
/**
 * Created by PhpStorm.
 * User: sebastian.gerard
 * Date: 6/20/2017
 * Time: 5:29 PM
 */

namespace Blog\Form;

use Blog\Model\Post;
use Zend\Form\Fieldset;
use Zend\Stdlib\Hydrator\ClassMethods;

class PostFieldset extends Fieldset
{
    public function __construct($name = null, $options = array())
    {
        parent::__construct($name, $options);

        $this->setHydrator(new ClassMethods(false));
        $this->setObject(new Post());

        $this->add(array(
            'type' => 'hidden',
            'name' => 'id'
        ));

        $this->add(array(
            'type' => 'text',
            'name' => 'title',
            'attributes' => [
                'placeholder' => 'Title',
                'class'  => 'form-control'
            ],
        ));

        $this->add(array(
            'type' => 'text',
            'name' => 'author',
            'attributes' => [
                'placeholder' => 'Who is the Author?',
                'class'  => 'form-control'
            ],
        ));

        $this->add(array(
            'type' => 'textarea',
            'name' => 'text',
            'attributes' => [
                'placeholder' => 'Content here',
                'class'  => 'form-control',
                'rows' => 10
            ],
        ));




    }
}
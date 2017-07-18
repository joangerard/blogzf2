<?php
/**
 * Created by PhpStorm.
 * User: sebastian.gerard
 * Date: 6/23/2017
 * Time: 1:38 PM
 */
namespace Blog\Factory\Custom;

use Blog\Model\Post;

class MyBlogFactory implements BlogFactory
{
    public function createPost()
    {
        return new Post();
    }
}

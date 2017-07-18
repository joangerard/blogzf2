<?php
/**
 * Created by PhpStorm.
 * User: sebastian.gerard
 * Date: 6/20/2017
 * Time: 11:31 AM
 */

namespace Blog\Model;

use User\Model\UserInterface;

interface PostInterface
{
    /**
     * Set Post Interface with other object
     *
     * @return void
     */
    public function set(PostInterface $object);

    /**
     * Set Post Interface with other object
     *
     * @return void
     */
    public function setDate(\DateTime $date);

    /**
     * Will return the ID of the blog post
     *
     * @return int
     */
    public function getId();

    /**
     * Will return the TITLE of the blog post
     *
     * @return string
     */
    public function getTitle();

    /**
     * Will return the TEXT of the blog post
     *
     * @return string
     */
    public function getText();


    /**
     * Will return the DATE of the blog post
     *
     * @return string
     */
    public function getDate();

    /**
     * Will return the AUTHOR of the blog post
     *
     * @return string
     */
    public function getAuthor();

    /**
     * Will return the AUTHOR of the blog post
     *
     * @return User/Model/User
     */
    public function getUserAuthor();

    /**
     * Will return nothing
     *
     */
    public function setUserAuthor(UserInterface $userauthor);
}

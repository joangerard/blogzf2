<?php
/**
 * Created by PhpStorm.
 * User: sebastian.gerard
 * Date: 7/14/2017
 * Time: 9:52 AM
 */
namespace Blog\Helper;

use Blog\Model\PostInterface;
use User\Model\UserInterface;

interface UserPermissionHelperInterface
{
    public static function userCanEditThisPost(UserInterface $user, PostInterface $post);
}
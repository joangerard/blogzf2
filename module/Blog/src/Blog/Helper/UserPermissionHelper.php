<?php
/**
 * Created by PhpStorm.
 * User: sebastian.gerard
 * Date: 7/14/2017
 * Time: 9:50 AM
 */

namespace Blog\Helper;

use Blog\Model\PostInterface;
use User\Model\UserInterface;

class UserPermissionHelper implements UserPermissionHelperInterface {
    public static function UserCanEditThisPost(UserInterface $user, PostInterface $post)
    {
        if($user === NULL){
            return false;
        }
        $type = $user->getType();
        if($type->GetName() === "Admin"){
            return true;
        }

        $userPost = $post->getUserAuthor();


        if($userPost->getId() === $user->getId()){
            return true;
        }
        return false;
    }
}
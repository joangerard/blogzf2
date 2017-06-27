<?php
/**
 * Created by PhpStorm.
 * User: sebastian.gerard
 * Date: 6/26/2017
 * Time: 11:32 AM
 */

namespace User\Model;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="user_types")
 */
class UserType implements UserTypeInterface{

    /**
     * @ORM\Id @ORM\GeneratedValue @ORM\Column(type="integer")
     * @var int
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     * @var string
     */
    protected $name;

    /**
     * @ORM\OneToMany(targetEntity="User", mappedBy="type")
     * @var users[] An ArrayCollection of User objects.
     **/
    protected $users;

    public function __construct()
    {
        $this->users = new ArrayCollection();
    }

    public function addUser(UserInterface $user){
        $this->users[] = $user;
    }

    public function getId()
    {
        return $this->id;
    }
    public function GetName()
    {
        return $this->name;
    }
    public function SetName($name)
    {
        $this->name = $name;
    }

}
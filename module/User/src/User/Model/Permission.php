<?php
/**
 * Created by PhpStorm.
 * User: sebastian.gerard
 * Date: 6/26/2017
 * Time: 1:40 PM
 */

namespace User\Model;

use Doctrine\ORM\Mapping as ORM;
/**
 * A Permission
 *
 * @ORM\Entity
 * @ORM\Table(name="permissions")
 */
class Permission implements PermissionInterface
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer");
     * @ORM\GeneratedValue(strategy="AUTO");
    */
    protected $id;

    /**
     * @ORM\Column(type="string")
    */
    protected $code;

    /**
     * @ORM\Column(type="string")
    */
    protected $name;

    public function getId()
    {
        return $this->id;
    }

    public function getCode()
    {
        return $this->code;
    }
    public function getName()
    {
        return $this->name;
    }
    public function setCode($code)
    {
        $this->code = $code;
    }
    public function setName($name)
    {
        $this->name = $name;
    }
}

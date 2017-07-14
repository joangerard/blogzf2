<?php
/**
 * Created by PhpStorm.
 * User: sebastian.gerard
 * Date: 6/23/2017
 * Time: 4:09 PM
 */
namespace User\Model;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Blog\Model\Post;
/**
 * A User.
 *
 * @ORM\Entity
 * @ORM\Table(name="users")
 * @property string $firstname
 * @property string $secondname
 * @property string $address1
 * @property string $phone1
 * @property string $username
 * @property string $password
 * @property int $id
 * @property int $typeid
 * */



class User implements UserInterface{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer");
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(type="string")
     */
    protected $firstname;

    /**
     * @ORM\Column(type="string")
     */
    protected $secondname;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $address1;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    protected $phone1;

    /**
     * @ORM\Column(type="string")
     */
    protected $username;

    /**
     * @ORM\Column(type="string")
     */
    protected $password;

    /**
     * @ORM\ManyToOne(targetEntity="UserType", inversedBy="addUser")
     **/
    protected $type;

    /**
     *@ORM\ManyToMany(targetEntity="Permission")
    */
    protected $permissions;

    /**
     *
     * @ORM\OneToMany(targetEntity="Blog\Model\Post", mappedBy="userauthor")
     * @var posts[] An Array Collection of Post Objects
    */
    protected $posts;

    public function __construct()
    {
        $this->permissions = new ArrayCollection();
        $this->posts = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }
    public function getAddress1()
    {
        return $this->address1;
    }
    public function getFirstName()
    {
        return $this->firstname;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function getPhone1()
    {
        return $this->phone1;
    }
    public function getSecondName()
    {
        return $this->secondname;
    }
    public function getUsername()
    {
        return $this->username;
    }

    public function setAddress1($address){
        $this->address1=$address;
    }
    public function setFirstname($firstname){
        $this->firstname = $firstname;
    }
    public function setSecondname($secondname){
        $this->secondname = $secondname;
    }
    public function setPhone1($phone)
    {
        $this->phone1 = $phone;
    }
    public function setUsername($username){
        $this->username = $username;
    }
    public function setPassword($password){
        $this->password = $password;
    }

    public function getType(){
        return $this->type;
    }

    public function setType(UserTypeInterface $usertype){
        $usertype->Adduser($this);
        $this->type = $usertype;
    }

    public function getPermissions()
    {
        return $this->permissions;
    }

    public function addPermission($permission)
    {
        $this->permissions[] = $permission;
    }

    public function getPosts()
    {
        return $this->posts;
    }

    public function addPost($post)
    {
        $this->posts[] = $post;
    }
}
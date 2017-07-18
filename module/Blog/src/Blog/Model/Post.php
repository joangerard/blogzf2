<?php
/**
 * Created by PhpStorm.
 * User: sebastian.gerard
 * Date: 6/20/2017
 * Time: 11:33 AM
 */

namespace Blog\Model;

use Doctrine\ORM\Mapping as ORM;
use DateTime;
use User\Model\UserInterface;

/**
 * A Post.
 *
 * @ORM\Entity
 * @ORM\Table(name="posts")
 * @property string $author
 * @property string date
 * @property string text
 * @property string $title
 * @property int $id
 */
class Post implements PostInterface
{
    /**
     * @var int
     */
    /**
     * @ORM\Id
     * @ORM\Column(type="integer");
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     */
    /**
     * @ORM\Column(type="string")
     */
    protected $title;

    /**
     * @var string
     */
    /**
     * @ORM\Column(type="string")
     */
    protected $text;

    /**
     * @var string
     */
    /**
     * @ORM\Column(type="datetime")
     */
    protected $date;

    /**
     * @var author
     */
    /**
     * @ORM\Column(type="string")
     */
    protected $author;

    /**
     * @ORM\ManyToOne(targetEntity="User\Model\User", inversedBy="addPost")
    */
    protected $userauthor;

    /**
     * Magic getter to expose protected properties.
     *
     * @param string $property
     * @return mixed
     */
    public function __get($property)
    {
        return $this->$property;
    }

    public function set(PostInterface $object)
    {
        $this->setAuthor($object->getAuthor());
        $this->setDate($object->getDate());
        $this->setText($object->getText());
        $this->setTitle($object->getTitle());
    }

    /**
     * Magic setter to save protected properties.
     *
     * @param string $property
     * @param mixed $value
     */
    public function __set($property, $value)
    {
        $this->$property = $value;
    }

    /**
     * Populate from an array.
     *
     * @param array $data
     */
    public function exchangeArray($data = array())
    {
        $this->id = $data['id'];
        $this->title = $data['title'];
        $this->text = $data['text'];
        $this->author = $data['author'];
        $this->date = $data['date'];
    }

    /**
     * {@inheritDoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * {@inheritDoc}
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * {@inheritDoc}
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText($text)
    {
        $this->text = $text;
    }

    /**
     * {@inheritDoc}
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param string $date
     */
    public function setDate(DateTime $date)
    {
        $this->date = $date;
    }

    /**
     * {@inheritDoc}
     */
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param string author
     */
    public function setAuthor($author)
    {
        $this->author = $author;
    }

    public function getUserAuthor()
    {
        return $this->userauthor;
    }

    public function setUserAuthor(UserInterface $userauthor)
    {
        $userauthor->addPost($this);
        $this->userauthor = $userauthor;
    }
}

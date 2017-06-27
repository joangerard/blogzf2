<?php
/**
 * Created by PhpStorm.
 * User: sebastian.gerard
 * Date: 6/23/2017
 * Time: 8:50 AM
 */
namespace Blog\Mapper;

use Blog\Factory\Custom\BlogFactory;
use Blog\Model\PostInterface;

class DoctrineDbSqlMapper extends AbstractMapper implements PostMapperInterface {

    protected $blogFactory;

    public function __construct(
        BlogFactory $blogFactory
    ){
        $this->blogFactory = $blogFactory;
    }

    public function find($id){
        return $this->getEntityManager()->find('Blog\Model\Post',$id);
    }
    public function findAll()
    {
        return $this->getEntityManager()->getRepository('Blog\Model\Post')->findAll();
    }
    public function delete(PostInterface $postObject)
    {
        $post = $this->find($postObject->getId());
        $this->getEntityManager()->remove($post);
        $this->getEntityManager()->flush();
    }
    public function save(PostInterface $postObject)
    {
        $postObject->setDate(new \DateTime()); //TODO: Refactor this should be internally

        if (NULL === $postObject->getId()) {
            $post = $this->blogFactory->createPost();
            $postObject->setDate(new \DateTime());
            $post->set($postObject);
            $this->getEntityManager()->persist($post);
        }
        else{
            $post = $this->find($postObject->getId());
            $post->set($postObject);
        }
        $this->getEntityManager()->flush();
        return $postObject;
    }
}
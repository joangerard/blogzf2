<?php
namespace BlogsAPI\V1\Rest\Blog;

use Blog\Model\Post;
use Blog\Model\PostInterface;
use Blog\Service\PostServiceInterface;
use Doctrine\Common\Collections\ArrayCollection;
use ZF\ApiProblem\ApiProblem;
use ZF\Hal\Exception\DomainException;
use ZF\Rest\AbstractResourceListener;
use Zend\Stdlib\Hydrator\ObjectProperty as ObjectPropertyHydrator;

class BlogResource extends AbstractResourceListener
{
    protected $postService;
    protected $hydrator;
    protected $entityPrototype;

    public function __construct(PostServiceInterface $postService)
    {
        $this->postService = $postService;

        $this->hydrator = new ObjectPropertyHydrator();
        $this->entityPrototype = new BlogEntity;
    }

    /**
     * Create a resource
     *
     * @param  array|\Traversable|\stdClass $data
     * @return ApiProblem|mixed
     */
    public function create($data)
    {
        $post = new Post();
        $post->setText($data->content);
        $post->setTitle($data->name);
        $post->setAuthor($data->author);
        $savedPost = $this->postService->savePost($post);
        return $savedPost->getId();
    }

    /**
     * Delete a resource
     *
     * @param  mixed $id
     * @return bool
     */
    public function delete($id)
    {
        $post = $this->postService->findPost($id);

        if ($post == null) {
            throw new DomainException('Cannot delete; no such blog', 404);
        }

        $this->postService->deletePost($post);
        return true;
    }

    /**
     * Delete a collection, or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function deleteList($data)
    {
        return new ApiProblem(405, 'The DELETE method has not been defined for collections');
    }

    /**
     * Fetch a resource
     *
     * @param  mixed $id
     * @return BlogEntity
     */
    public function fetch($id)
    {
        $postInterface = $this->postService->findPost($id);

        if ($postInterface == null) {
            throw new DomainException('Post not found', 404);
        }

        return $this->createEntity($postInterface);
    }

    /**
     * Fetch all or a subset of resources
     *
     * @param  array $params
     * @return BlogEntity []
     */
    public function fetchAll($params = array())
    {
        $posts = $this->postService->findAllPosts();
        $blogEntities = new ArrayCollection();

        foreach ($posts as $post) {
            $blogEntities[] = $this->createEntity($post);
        }

        return $blogEntities;
    }

    /**
     * Patch (partial in-place update) a resource
     *
     * @param  mixed $id
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function patch($id, $data)
    {
        $post = new Post();
        $post->setId($id);
        $post->setTitle($data->name);
        $post->setText($data->content);
        $post->setAuthor($data->author);
        $this->postService->savePost($post);
        return $post;
    }

    /**
     * Replace a collection or members of a collection
     *
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function replaceList($data)
    {
        return new ApiProblem(405, 'The PUT method has not been defined for collections');
    }

    /**
     * Update a resource
     *
     * @param  mixed $id
     * @param  mixed $data
     * @return ApiProblem|mixed
     */
    public function update($id, $data)
    {
        $post = $this->hydrator->hydrate($data, $this->entityPrototype);
        $this->postService->savePost($post);
        return $post;
    }

    /**
     * @param PostInterface $item
     * @return BlogEntity
     */
    protected function createEntity(PostInterface $item)
    {
        $blogEntity = new BlogEntity();
        $blogEntity->id = $item->getId();
        $blogEntity->name = $item->getTitle();
        $blogEntity->content = $item->getText();
        $blogEntity->author = $item->getAuthor();
        return $blogEntity;
    }
}

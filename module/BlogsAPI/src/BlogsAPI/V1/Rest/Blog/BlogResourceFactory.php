<?php
namespace BlogsAPI\V1\Rest\Blog;

use Blog\Service\PostServiceInterface;

class BlogResourceFactory
{
    public function __invoke($services)
    {
        return new BlogResource($services->get(PostServiceInterface::class));
    }
}

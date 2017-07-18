<?php
// Filename: /module/Blog/src/Blog/Controller/ListController.php
namespace Blog\Controller;

use Blog\Helper\UserPermissionHelperInterface;
use Blog\Service\PostServiceInterface;
use Doctrine\Common\Collections\ArrayCollection;
use User\Service\SessionServiceInterface;
use User\Service\UserServiceInterface;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class ListController extends AbstractActionController
{
    /**
     * @var \Blog\Service\PostServiceInterface
     */
    protected $postService;
    protected $sessionService;
    protected $user;
    protected $userPermissionsHelper;
    protected $userService;

    public function __construct(
        PostServiceInterface $postService,
        SessionServiceInterface $sessionService,
        UserPermissionHelperInterface $userPermissionsHelper,
        UserServiceInterface $userService
    ) {
        $this->postService = $postService;
        $this->sessionService = $sessionService;
        $this->userService = $userService;
        $userId = $this->sessionService->getSession('auth', 'userId');
        $this->user = $this->userService->find($userId);
        $this->userPermissionsHelper = $userPermissionsHelper;
    }

    public function indexAction()
    {
        $posts = $this->postService->findAllPosts();
        $postModifyPermissions = new ArrayCollection();
        foreach ($posts as $post) {
            $postModifyPermissions[] = $this->userPermissionsHelper->userCanEditThisPost($this->user, $post);
        }
        return new ViewModel(array(
            'posts' => $posts,
            'postModifyPermissions'=>$postModifyPermissions,
            'user'=>$this->user
        ));
    }

    public function detailAction()
    {
        $id = $this->params()->fromRoute('id');

        try {
            $post = $this->postService->findPost($id);
        } catch (\InvalidArgumentException $ex) {
            return $this->redirect()->toRoute('blog');
        }

        return new ViewModel(array(
            'post' => $post,
            'user' => $this->user
        ));
    }
}

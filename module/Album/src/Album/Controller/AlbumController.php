<?php

namespace Album\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Album\Form\AlbumForm;
use Album\Model\Album;
use Doctrine\ORM\EntityManager;
use Album\Model\AlbumTable;

/**
 * THIS CLASS HASN'T BEEN DOCUMENTED, ARE ALL OTHER CLASSES DOCUMENTED PROPERLY??
 *
 * DOCUMENT ALL CLASSES; INTERFACES; FUNCTIONS AND VARIALBES
 */
class AlbumController extends AbstractActionController
{
    /**
     * @var AlbumTable
     */
    protected $albumTable;

    /**
     * DOES EntityMAnager exists? this might cause problems due to case sensitivity
     *
     * @var EntityMAnager
     */
    protected $em;

    /**
     * Returns an instance of EntityManager
     *
     * @return EntityManager
     */
    public function getEntityManager()
    {
        /**
         * AVOID YODA CONDITIONALS AT ALL COSTS
         */
        if (null === $this->em) {
            $this->em = $this->getServiceLocator()->get('doctrine.entitymanager.orm_default');
        }
        
        return $this->em;
    }

    /**
     * Returns an instance of AlbumTable
     *
     * @return AlbumTable
     */
    public function getAlbumTable()
    {
        if (!$this->albumTable) {
            $sm = $this->getServiceLocator();
            $this->albumTable = $sm->get(AlbumTable::class);
        }
        
        return $this->albumTable;
    }

    public function indexAction()
    {
        return new ViewModel(array(
            'albums' => $this->getEntityManager()->getRepository(Album::class)->findAll(),
        ));
    }

    public function addAction()
    {
        /**
         * AVOID THIS SORT OF DIRECT DEPENDENCY AND USE DEPENDENCY INJECTION
         * BY USING NEW YOU HAVE HARD COUPLING
         */
        $form = new AlbumForm();
        $form->get('submit')->setValue('Add');

        $request = $this->getRequest();

        /**
         * THIS HASN't BEEN SOLVED
         *
         * IF INSIDE IF
         * This is not good, you should create a function that handles the inner IF or use a patter or something else
         * in order to avoid this
         */
        if ($request->isPost()) {
            $album = new Album();
            $form->setInputFilter($album->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $album->exchangeArray($form->getData());
                $this->getEntityManager()->persist($album);
                $this->getEntityManager()->flush();

                // Redirect to list of albums
                return $this->redirect()->toRoute('album');
            }
        }
        return array('form' => $form);
    }

    /**
     * EXCEPTIONS SHOULD ALSO BE DOCUMENTED IF THROWN
     *
     * @return array
     */
    public function editAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        
        if (!$id) {
            return $this->redirect()->toRoute('album', array(
                'action' => 'add'
            ));
        }

        /**
         * DOCUMENT GOES BETWEEN /**
         */
        // Get the Album with the specified id.  An exception is thrown
        // if it cannot be found, in which case go to the index page.
        try {
            $album = $this->getAlbumTable()->getAlbum($id);
        }
        /**
         * AVOID HEADING SLASH AND ADD EXCEPTION LIBRARY TO USE SECTION IN THE FILE HEADER 
         */
        catch (\Exception $ex) {
            return $this->redirect()->toRoute('album', array(
                'action' => 'index'
            ));
        }

        $form  = new AlbumForm();
        $form->bind($album);
        $form->get('submit')->setAttribute('value', 'Edit');

        $request = $this->getRequest();
        
        if ($request->isPost()) {
            $form->setInputFilter($album->getInputFilter());
            $form->setData($request->getPost());

            if ($form->isValid()) {
                $this->getEntityManager()->flush();

                // Redirect to list of albums
                return $this->redirect()->toRoute('album');
            }
        }

        return array(
            'id' => $id,
            'form' => $form,
        );
    }

    /**
     * DOC MISSING
     */
    public function deleteAction()
    {
        $id = (int) $this->params()->fromRoute('id', 0);
        if (!$id) {
            return $this->redirect()->toRoute('album');
        }

        $request = $this->getRequest();
        
        if ($request->isPost()) {
            $del = $request->getPost('del', 'No');

            if ($del === 'Yes') {
                $id = (int) $request->getPost('id');
                $album = $this->getEntityManager()->find('Album\Entity\Album', $id);
                if ($album) {
                    $this->getEntityManager()->remove($album);
                    $this->getEntityManager()->flush();
                }
            }

            // Redirect to list of albums
            return $this->redirect()->toRoute('album');
        }

        return array(
            'id'    => $id,
            'album' => $this->getAlbumTable()->getAlbum($id)
        );
    }
}
<?php

namespace Portal\Bundle\GithubBundle\Admin;

use Github\Api\Gists;
use Portal\Component\Github\GithubApi;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;

/**
 * Class GistAdmin.
 *
 * @author  Quentin Somazzi <qsomazzi@gmail.com>
 */
class GistAdmin extends Admin
{
    /**
     * @var Gists
     */
    protected $gistApi;

    /**
     * @param string    $code
     * @param string    $class
     * @param string    $baseControllerName
     * @param GithubApi $githubApi
     */
    public function __construct($code, $class, $baseControllerName, GithubApi $githubApi)
    {
        parent::__construct($code, $class, $baseControllerName);

        $this->gistApi = $githubApi->getClient()->api('gists');
    }

    /**
     * {@inheritdoc}
     */
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('description', 'text', [
                'label'    => 'Description',
                'disabled' => 'disabled'
            ])
            ->add('tags', 'entity', [
                'label'    => 'Tags',
                'class'    => 'Portal\\Bundle\\GithubBundle\\Entity\\Tag',
                'property' => 'name',
                'multiple' => true,
                'required' => false,
            ])
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('public')
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('description')
            ->add('public')
        ;
    }

    /**
     * {@inheritdoc}
     */
    protected function configureRoutes(RouteCollection $collection)
    {
        parent::configureRoutes($collection);

        $collection->remove('create');
    }

    /**
     * {@inheritdoc}
     */
    public function getBatchActions()
    {
        return [];
    }

    /**
     * {@inheritdoc}
     */
    public function postUpdate($object)
    {
        $this->postPersist($object);
    }

    /**
     * {@inheritdoc}
     */
    public function postPersist($object)
    {
        $this->gistApi->update($object->getId(), ['description' => $object->getDescription()]);
    }

    /**
     * {@inheritdoc}
     */
    public function postRemove($object)
    {
        $this->gistApi->remove($object->getId());
    }
}

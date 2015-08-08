<?php

namespace Portal\Bundle\GithubBundle\Admin;

use Portal\Component\Core\Color;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

/**
 * Class TagAdmin.
 *
 * @author  Quentin Somazzi <qsomazzi@gmail.com>
 */
class TagAdmin extends Admin
{
    use Color;

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', 'text', [
                'label' => 'Nom',
            ])
            ->add('color', 'choice', [
                'label'   => 'Couleur',
                'choices' => $this->getColors(),
                'attr'    => [
                    'class'               => 'color-selection-choice',
                    'data-sonata-select2' => 'false',
                ],
            ])
            ->add('icon', 'text', [
                'label' => 'Icône',
                'attr'  => [
                    'data-rows' => 6,
                    'data-cols' => 10,
                ],
            ])
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name')
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name')
            ->add('color')
            ->add('icon')
        ;
    }
}

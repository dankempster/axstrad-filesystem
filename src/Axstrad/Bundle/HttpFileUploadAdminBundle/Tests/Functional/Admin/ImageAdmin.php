<?php
namespace Axstrad\Bundle\HttpFileUploadAdminBundle\Tests\Functional\Admin;

use Axstrad\Bundle\HttpFileUploadAdminBundle\Admin\FileAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;


/**
 * Axstrad\Bundle\HttpFileUploadAdminBundle\Tests\Functional\Admin\ImageAdmin
 *
 * Admin class for the Image test entity.
 */
class ImageAdmin extends FileAdmin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('title')
            ->add('altText')
        ;
        parent::configureFormFields($formMapper);
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->addIdentifier('id')
            ->add('title')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
            ->addIdentifier('title')
        ;
    }
}

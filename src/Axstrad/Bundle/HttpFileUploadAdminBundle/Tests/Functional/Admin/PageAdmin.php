<?php
namespace Axstrad\Bundle\HttpFileUploadAdminBundle\Tests\Functional\Admin;

use Axstrad\DoctrineExtensions\Persistence\ObjectManagerAwareTrait;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;


/**
 * Axtrad\Bundle\HttpFileUploadAdminBundle\Tests\Functional\Admin\PageAdmin
 *
 * Admin class for the Image test entity.
 */
class PageAdmin extends Admin
{
    use ObjectManagerAwareTrait;


    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('heading')
            ->add('copy')
            ->add('image', 'sonata_type_admin')
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->addIdentifier('id')
            ->add('heading')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id')
        ;
    }

    /**
     * @param string $baseRouteName
     * @return void
     */
    public function setBaseRouteName($baseRouteName)
    {
        $this->baseRouteName = $baseRouteName;
    }

    /**
     * @param string $baseRoutePattern
     * @return void
     */
    public function setBaseRoutePattern($baseRoutePattern)
    {
        $this->baseRoutePattern = $baseRoutePattern;
    }

    public function prePersist($page)
    {
        $this->om->persist($page->image);
    }
}

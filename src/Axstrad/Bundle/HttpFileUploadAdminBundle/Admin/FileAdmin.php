<?php
namespace Axstrad\Bundle\HttpFileUploadAdminBundle\Admin;

use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;


/**
 * Axtrad\Bundle\HttpFileUploadAdminBundle\Admin\FileAdmin
 */
class FileAdmin extends Admin
{
    // Fields to be shown on create/edit forms
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('file', 'file', array('required' => false))
        ;
    }

    // Fields to be shown on filter forms
    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('path')
        ;
    }

    // Fields to be shown on lists
    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('path')
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

    public function prePersist($file)
    {
        $this->manageFileUpload($file);
    }

    public function preUpdate($file)
    {
        $this->manageFileUpload($file);
    }

    private function manageFileUpload($file)
    {
        if ($file->getFile()) {
            $file->setFileUpdatedAt(new \DateTime);
        }
    }
}

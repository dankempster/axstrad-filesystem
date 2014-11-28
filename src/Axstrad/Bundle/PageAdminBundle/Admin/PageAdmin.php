<?php
namespace Axstrad\Bundle\PageAdminBundle\Admin;

use Axstrad\Bundle\PageBundle\Entity\Page;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Admin\Admin;


/**
 * Axstrad\Bundle\PageAdminBundle\Admin\PageAdmin
 */
class PageAdmin extends Admin
{
    // protected $translationDomain = 'AxstradAdminPageBundle';

    public function getExportFormats()
    {
        return array();
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('id', 'integer')
            ->addIdentifier('heading', 'text')
        ;
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->with('form.group_general')
                ->add('heading', 'text')
                ->add('copy', 'textarea')
            ->end()
        ;
    }

    public function toString($object)
    {
        return $object instanceof Page && $object->getHeading()
            ? $object->getHeading()
            : $this->trans('link_add', array(), 'SonataAdminBundle')
        ;
    }
}

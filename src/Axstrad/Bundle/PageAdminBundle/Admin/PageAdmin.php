<?php
namespace Axstrad\Bundle\PageAdminBundle\Admin;

use Axstrad\Bundle\PageBundle\Entity\Page;
use Doctrine\Common\Persistence\ObjectManager;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Admin\Admin;


/**
 * Axstrad\Bundle\PageAdminBundle\Admin\PageAdmin
 */
class PageAdmin extends Admin
{
    // protected $translationDomain = 'AxstradAdminPageBundle';

    /**
     * @var ObjectManager
     */
    protected $om;


    /**
     * Set objectManager
     *
     * @param  ObjectManager $objectManager
     * @return self
     * @see getObjectManager
     */
    public function setObjectManager(ObjectManager $objectManager)
    {
        $this->om = $objectManager;
        return $this;
    }

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
                ->add('slug', 'text')
            ->end()
        ;
    }

    public function prePersist($page)
    {
        $this->preChange($page);
    }

    public function preUpdate($page)
    {
        $this->preChange($page);
    }

    private function preChange($page)
    {
        $seoMetadata = $page->getSeoMetadata();
        if (!empty($seoMetadata)) {
            $this->om->persist($seoMetadata);
        }
    }

    public function toString($object)
    {
        return $object instanceof Page && $object->getHeading()
            ? $object->getHeading()
            : $this->trans('link_add', array(), 'SonataAdminBundle')
        ;
    }
}

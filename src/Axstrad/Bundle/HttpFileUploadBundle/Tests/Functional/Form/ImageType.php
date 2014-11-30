<?php

namespace Axstrad\Bundle\HttpFileUploadBundle\Tests\Functional\Form;

use FrequenceWeb\Bundle\ContactBundle\Form\ContactType as BaseContactType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Axstrad\Bundle\HttpFileUploadBundle\Tests\Functional\Form\ImageType
 */
class ImageType extends AbstractType
{
    protected $errorBubbling = true;

    /**
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', 'text', array(
                'error_bubbling' => $this->errorBubbling,
            ))
            ->add('altText', 'text', array(
                'error_bubbling' => $this->errorBubbling,
            ))
            ->add('file', 'file', array(
                'error_bubbling' => $this->errorBubbling,
            ))
            ->add('submit', 'submit')
        ;
    }

    /**
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Axstrad\Bundle\HttpFileUploadBundle\Tests\Functional\Entity\Image',
        ));
    }

    /**
     * @{inheritDoc}
     */
    public function getName()
    {
        return 'image';
    }
}

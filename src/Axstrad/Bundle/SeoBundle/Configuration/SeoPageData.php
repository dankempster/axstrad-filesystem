<?php
namespace Axstrad\Bundle\SeoBundle\Configuration;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\ConfigurationAnnotation;


/**
 * Axstrad\Bundle\SeoBundle\Configuration\SeoPageData
 *
 * @Annotation
 */
class SeoPageData extends ConfigurationAnnotation
{
    /**
     * The parameter name.
     *
     * @var string
     */
    public $name;

    /**
     * Returns the annotation alias name.
     *
     * @return string
     * @see ConfigurationInterface
     */
    public function getAliasName()
    {
        return 'seoPageData';
    }

    /**
     * Multiple SeoPageData annoations are not allowed
     *
     * @return Boolean
     * @see ConfigurationInterface
     */
    public function allowArray()
    {
        return false;
    }
}

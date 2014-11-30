<?php
namespace Axstrad\Bundle\SeoBundle\Tests\Functional\Entity;

use Axstrad\Component\Content\Orm\Article as BaseArticle;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Cmf\Bundle\SeoBundle\SeoAwareInterface;
use Symfony\Cmf\Bundle\SeoBundle\SeoAwareTrait;

new ORM\Entity;
new ORM\OneToOne;
new ORM\JoinColumn;

/**
 * Axstrad\Bundle\SeoBundle\Tests\Functonal\Entity\Page
 *
 * @ORM\Entity
 */
class Page extends BaseArticle implements
    SeoAwareInterface
{
    /**
     * @ORM\OneToOne(targetEntity="Symfony\Cmf\Bundle\SeoBundle\Model\SeoMetadata")
     * @ORM\JoinColumn(name="seoMetadataId")
     * @var SeoMetadata
     */
    protected $seoMetadata;

    /**
     * {@inheritDoc}
     */
    public function getSeoMetadata()
    {
        return $this->seoMetadata;
    }

    /**
     * {@inheritDoc}
     */
    public function setSeoMetadata($metadata)
    {
        $this->seoMetadata = $metadata;
    }
}

<?php
namespace Axstrad\Bundle\PageBundle\Tests\Functional\Entity;

use Axstrad\Component\Page\Entity\BasePage;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 */
class Event extends BasePage
{
    /**
     * @ORM\Column(type="date", nullable=true)
     */
    protected $date;

    /**
     * Get date
     *
     * @param null|string $format A format excepted by
     *        {@link http://www.php.net/manual/en/function.date.php date()}
     * @return string|DateTime A DateTime object if  is NULL, a datetime string
     *         otherwise.
     * @see setDate
     */
    public function getDate($format = null)
    {
        if (!empty($format)) {
            return $this->date->format($format);
        }
        else {
            return clone $this->date;
        }
    }

    /**
     * Set date
     *
     * @param DateTime|string $date A DateTime Object or a datetime string
     *        that's excepted by
     *        {@link http://www.php.net/manual/en/function.date.php date()}
     * @return self
     * @see getDate
     */
    public function setDate($date)
    {
        if ($date instanceof \DateTime) {
            $this->date = clone $date;
        }
        else {
            $this->date = new \DateTime((string) $date);
        }

        return $this;
    }
}

<?php

namespace Portal\Bundle\AppBundle\Entity\Page;

use Sonata\PageBundle\Entity\BaseSite;

/**
 * Class Site.
 *
 * @author  Quentin Somazzi <qsomazzi@gmail.com>
 */
class Site extends BaseSite
{
    /**
     * @var int
     */
    protected $id;

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }
}

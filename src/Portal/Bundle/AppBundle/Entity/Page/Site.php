<?php

namespace Portal\Bundle\AppBundle\Entity\Page;

use Sonata\PageBundle\Entity\BaseSite;

/**
 * Class Site
 *
 * @package Portal\Bundle\AppBundle\Entity\Page
 * @author  Quentin Somazzi <qsomazzi@gmail.com>
 */
class Site extends BaseSite
{
    /**
     * @var int $id
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

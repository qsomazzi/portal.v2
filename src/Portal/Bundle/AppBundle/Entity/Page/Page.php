<?php

namespace Portal\Bundle\AppBundle\Entity\Page;

use Sonata\PageBundle\Entity\BasePage;

/**
 * Class Page
 *
 * @package Portal\Bundle\AppBundle\Entity\Page
 * @author  Quentin Somazzi <qsomazzi@gmail.com>
 */
class Page extends BasePage
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

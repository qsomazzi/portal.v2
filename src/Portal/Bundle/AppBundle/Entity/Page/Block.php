<?php

namespace Portal\Bundle\AppBundle\Entity\Page;

use Sonata\PageBundle\Entity\BaseBlock;

/**
 * Class Block.
 *
 * @author  Quentin Somazzi <qsomazzi@gmail.com>
 */
class Block extends BaseBlock
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

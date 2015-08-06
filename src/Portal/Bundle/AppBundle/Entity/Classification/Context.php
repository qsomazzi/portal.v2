<?php

namespace Portal\Bundle\AppBundle\Entity\Classification;

use Sonata\ClassificationBundle\Entity\BaseContext;

/**
 * Class Context.
 *
 * @author  Quentin Somazzi <qsomazzi@gmail.com>
 */
class Context extends BaseContext
{
    /**
     * @var int
     */
    protected $id;

    /**
     * Get id.
     *
     * @return int $id
     */
    public function getId()
    {
        return $this->id;
    }
}

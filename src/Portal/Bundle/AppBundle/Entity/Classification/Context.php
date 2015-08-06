<?php

namespace Portal\Bundle\AppBundle\Entity\Classification;

use Sonata\ClassificationBundle\Entity\BaseContext;

/**
 * Class Context
 *
 * @package Portal\Bundle\AppBundle\Entity\Classification
 * @author  Quentin Somazzi <qsomazzi@gmail.com>
 */
class Context extends BaseContext
{
    /**
     * @var integer $id
     */
    protected $id;

    /**
     * Get id
     *
     * @return integer $id
     */
    public function getId()
    {
        return $this->id;
    }
}
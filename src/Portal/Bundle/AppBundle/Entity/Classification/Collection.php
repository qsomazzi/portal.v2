<?php

namespace Portal\Bundle\AppBundle\Entity\Classification;

use Sonata\ClassificationBundle\Entity\BaseCollection;

/**
 * Class Collection
 *
 * @package Portal\Bundle\AppBundle\Entity\Classification
 * @author  Quentin Somazzi <qsomazzi@gmail.com>
 */
class Collection extends BaseCollection
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
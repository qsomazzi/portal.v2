<?php

namespace Portal\Bundle\AppBundle\Entity\Classification;

use Sonata\ClassificationBundle\Entity\BaseTag;

/**
 * Class Tag
 *
 * @package Portal\Bundle\AppBundle\Entity\Classification
 * @author  Quentin Somazzi <qsomazzi@gmail.com>
 */
class Tag extends BaseTag
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
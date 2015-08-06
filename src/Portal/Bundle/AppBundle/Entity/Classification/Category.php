<?php

namespace Portal\Bundle\AppBundle\Entity\Classification;

use Sonata\ClassificationBundle\Entity\BaseCategory;

/**
 * Class Category
 *
 * @package Portal\Bundle\AppBundle\Entity\Classification
 * @author  Quentin Somazzi <qsomazzi@gmail.com>
 */
class Category extends BaseCategory
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
<?php

namespace Portal\Bundle\AppBundle\Entity\Classification;

use Sonata\ClassificationBundle\Entity\BaseCategory;

/**
 * Class Category.
 *
 * @author  Quentin Somazzi <qsomazzi@gmail.com>
 */
class Category extends BaseCategory
{
    /**
     * @var int
     */
    protected $id;

    /**
     * {@inheritdoc}
     */
    public function __construct()
    {

    }

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

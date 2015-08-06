<?php

namespace Portal\Bundle\AppBundle\Entity\User;

use Sonata\UserBundle\Entity\BaseGroup;

/**
 * Class Group.
 *
 * @author  Quentin Somazzi <qsomazzi@gmail.com>
 */
class Group extends BaseGroup
{
    /**
     * @var int
     */
    protected $id;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
}
